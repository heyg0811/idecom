<?php

/**
 * @brif    募集ページ関連ファイル
 * @author  Sakamoto
 * @date    2014/09/13
 */

/**
 * @brif    募集ページ用
 * @package app
 * @extends Controller_Template
 */
class Controller_Recruit extends Controller_Template {

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
    // 決まり文句
    parent::before();

    $this->template->title = '募集';
  }

  /**
   * @brif     後処理
   * @detail   $response をパラメータとして追加し、after() を Controller_Template 互換にする
   * @access  public
   * @return   Response
   */
  public function after($response) {
    // 決まり文句
    $response = parent::after($response);
    return $response;
  }

  /**
   * @brif    募集一覧
   * @access  public
   * @return
   */
  public function action_list() {
    $this->template->subtitle = '一覧';
    $this->template->content = View::forge('recruit/list');

    $options = array(
      'where'    => array('status' => Config::get('PROJECT.STATUS.ENABLE')),
      'order_by' => array('created_at' => 'desc'),
    );

    $this->template->content->recruits = Model_Recruit::find('all',$options);
  }

  /**
   * @brif    募集詳細
   * @access  public
   * @return
   */
  public function action_detail() {
    $this->template->subtitle = '詳細';
    $this->template->content = View::forge('recruit/detail');

    if (!$id = Input::param('id',null)) {
      Response::redirect('recruit/list');
    }

    
    $recruit_model = new Model_Recruit();

    $recruit_model->updateCount($id);
    $recruit = $recruit_model->find($id);
    $temp = array();
    foreach($recruit as $key => $val){
      
      $temp[$key]=$val;
      if('skill'===$key){
        $temp[$key] = json_decode($val);
      }
    }
    $join = Model_Recruitjoin::check($id);
    
    

    $this->template->content->set_safe('recruit',$temp);
    $this->template->content->joint = $join;
    
    
    // 初期表示時
    if (!Security::check_token()) {
      return;
    }
    //コメント格納
    $validation    = Model_Comment::validate();
    $comment_data  = $validation->validated();
    $text= Input::param('comment');
    $recruit_path  = Config::get('UPLOAD_DIR') . $recruit['user_id'] . '/recruit/' . $recruit['recruit_id'];
    $comment_data = array('user_id'=>Auth::get('id'),'comment'=>$text['comment'],'com_url'=>$recruit_path);
    $insert_id     = Model_comment::insert($comment_data);
  }

  /**
   * @brif    募集追加
   * @access  public
   * @return
   */
  public function action_add() {
    $this->template->subtitle = '追加';
    $this->template->content = View::forge('recruit/add');

    $recruit_model = new Model_Recruit();
    $project_type  = Session::get('project.type');
    $recruit_id    = Session::get('project.recruit.id');
    $status        = Session::get('project.recruit.status');
    if ($project_type !== 'recruit' || $status !== 'add') {
      $recruit_id  = $recruit_model->insertEmpty();
      Session::set('project', array(
        'recruit'  => array(
          'id'     => $recruit_id,
          'status' => 'add',
        ),
        'type'     => 'recruit',
      ));
    }

    // 初期表示時
    if (!Security::check_token()){
      return ;
    }

    // バリデーション
    $user_id    = Auth::get('id');
    $validation = $recruit_model->validate();
    $errors     = $validation->error();
    if (!empty($errors)) {
      // エラー設定
      MyUtil::set_alert('danger','入力エラーがあります',$validation->show_errors());
      return ;
    }
    $recruit_data = $validation->validated();
    $recruit_data['skill']      = json_encode($recruit_data['skill']);
    $recruit_data['status']     = Config::get('PROJECT.STATUS.ENABLE');
    $recruit_data['created_at'] = time();

    // パスを設定
    $recruit_path = Config::get('UPLOAD_DIR') . $user_id . '/recruit/' . $recruit_id;

    // フォルダ確認
    if (!file_exists($recruit_path)) {
      // フォルダ作成
      $structure = $recruit_path . '/other';
      mkdir($structure, 0755, true);
    }

    // アップロード
    $temp_file = Input::file('thumbnail');
    if ($temp_file['size'] !== 0) {
    	$config  = array(
    		'path' => $recruit_path,
    		'auto_rename'   => true,
    		'ext_whitelist' => Config::get('FILE.EXT'),
    	);
    	Upload::process($config);
    	if (!Upload::is_valid()) {
    	  MyUtil::set_alert('danger','ファイルアップロードに失敗しました');
    		return ;
    	}
    	Upload::save();
    	if($file = Upload::get_files(0)){
    	  $recruit_data += array('thumbnail'   => $user_id. '/recruit/' . $recruit_id . '/' .$file['saved_as']);
    	}
    }

    // データの追加
    if ($recruit_model->updateById($recruit_id, $recruit_data) !== true) {
      // エラー設定
      MyUtil::set_alert('danger','投稿時にエラーが発生しました');
      return ;
    }

    // 不要セッションを削除し一覧へ
    MyUtil::set_alert('success','募集を投稿しました');
    Response::redirect('admin/recruit');
  }

  /**
   * @brif    募集編集
   * @access  public
   * @return
   */
  public function action_edit() {
    // 他ユーザーの作品は開かせない
    $user_id = Auth::get('id');
    if (!$recruit_id = Input::get('id', null)) {
      Response::redirect('admin/recruit');
    }
    $recruit_model = new Model_Recruit();
    $recruit       = $recruit_model->find($recruit_id);
    if ($recruit['user_id'] != $user_id || $recruit['status'] == '0') {
      Response::redirect('admin/recruit');
    }

    $this->template->subtitle = '編集';
    $this->template->content = View::forge('recruit/edit');

    Session::set('project', array(
      'recruit'  => array(
        'id'     => $recruit_id,
        'status' => 'edit',
      ),
      'type'     => 'recruit',
    ));

    // 初期表示時
    if (!Security::check_token()) {
      $recruit_model->setFormData($recruit_id,array('skill'));
      return ;
    }

    // バリデーション
    $user_id    = Auth::get('id');
    $validation = $recruit_model->validate();
    $errors     = $validation->error();
    if (!empty($errors)) {
      // エラー設定
      MyUtil::set_alert('danger','入力エラーがあります',$validation->show_errors());
      return ;
    }

    $recruit_data = $validation->validated();
    $recruit_data['skill'] = json_encode($recruit_data['skill']);

    // パスを設定
    $recruit_path = Config::get('UPLOAD_DIR') . $user_id . '/recruit/' . $recruit_id;

    // フォルダ確認
    if (!file_exists($recruit_path)) {
      // フォルダ作成
      $structure = $recruit_path . '/other';
      mkdir($structure, 0755, true);
    }

    // アップロード
    $temp_file  = Input::file('thumbnail');
    if ($temp_file['size'] !== 0) {
    	$config   = array(
    		'path'          => $recruit_path,
    		'auto_rename'   => true,
    		'ext_whitelist' => Config::get('FILE.EXT'),
    	);
    	Upload::process($config);
    	if (!Upload::is_valid()) {
    		MyUtil::set_alert('danger','ファイルアップロードに失敗しました');
    		return Response::redirect('recruit/edit?id='.$recruit_id);
    	}
    	Upload::save();
    	if($file = Upload::get_files(0)){
    	  $recruit_data += array('thumbnail'   => $user_id. '/recruit/' . $recruit_id . '/' .$file['saved_as']);
    	}
    }

    // データの追加
    if ($recruit_model->updateById($recruit_id, $recruit_data) !== true) {
      // エラー設定
      MyUtil::set_alert('danger','投稿時にエラーが発生しました');
      return ;
    }

    // 不要セッションを削除し一覧へ
    MyUtil::set_alert('success','募集を更新しました');
    Response::redirect('admin/recruit');
  }

  public function action_delete() {
    //  データの削除
    $this->template->subtitle = '募集';
    $this->template->content = View::forge('admin/recruit');
    $options = array(
      'where'    => array('status' => Config::get('PROJECT.STATUS.ENABLE')),
      'order_by' => array('created_at' => 'desc'),
    );
    $this->template->content->recruits = Model_Recruit::find('all',$options);

      $user_id = Auth::get('id');
      if (!$recruit_id = Input::get('id', null)) {
        Response::redirect('admin/recruit');
        $recruit_model = new Model_Recruit();
        $recruit       = $recruit_model->find($recruit_id);
        if ($recruit['user_id'] != $user_id || $recruit['status'] == '0') {
          Response::redirect('admin/recruit');
        }
        Model_Recruit::DeleteEmpty($recruit_id);
        Response::redirect('admin/recruit');
      }
       Model_Recruit::DeleteEmpty($recruit_id);
       // 不要セッションを削除し一覧へ
       MyUtil::set_alert('success','   削除されました');
       Response::redirect('admin/recruit');
  }
  
  /**
   * @brif    募集への参加
   * @access  public
   * @return
   */
   public function action_join()
  {
    $id = Input::get('id',null);
    if (empty($id)) {
      MyUtil::set_alert('danger','リクエストが不正です');
      Response::redirect(Input::referrer());
    }
    
    $recruit = Model_Recruit::find($id);
    if ($recruit['user_id'] == Auth::get('id')) {
      MyUtil::set_alert('danger','リクエストが不正です');
      Response::redirect(Input::referrer());
    }
    
    $recruitjoin_model = new Model_Recruitjoin();
    $recruitjoin_model->insert($id);
    
    MyUtil::set_alert('success','参加しました');
    Response::redirect(Input::referrer());
  }
  
   /**
   * @brif    募集への参加を削除
   * @access  public
   * @return
   */
  public function action_unjoin()
  {
    if (!$id = Input::get('id',null)) {
      MyUtil::set_alert('danger','リクエストが不正です');
      Response::redirect(Input::referrer());
    }
     
    $recruitjoin_model = new Model_Recruitjoin();
    $recruitjoin_model->deleterecruit($id);
    
    MyUtil::set_alert('danger','参加はキャンセルされました');
    Response::redirect(Input::referrer());
  }
}


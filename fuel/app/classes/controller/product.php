<?php

/**
 * @brif    作品ページ関連ファイル
 * @author  Sakamoto
 * @date    2014/09/13
 */

/**
 * @brif    作品ページ用
 * @package app
 * @extends Controller_Template
 */
class Controller_Product extends Controller_Template {

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
    // 決まり文句
    parent::before();
    $this->template->title = '作品';

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
   * @brif    作品一覧
   * @access  public
   * @return
   */
  public function action_list() {
    $this->template->subtitle = '一覧';
    $this->template->content  = View::forge('product/list');

    $options = array(
      'where'    => array('status'     => Config::get('PROJECT.STATUS.ENABLE')),
      'order_by' => array('created_at' => 'desc'),
    );
    $this->template->content->products = Model_Product::find('all',$options);
  }

  /**
   * @brif    作品詳細
   * @access  public
   * @return
   */
  public function action_detail() {
    $this->template->subtitle = '詳細';
    $this->template->content = View::forge('product/detail');

    if (!$id = Input::get('id',null)) {
      Response::redirect('product/list');
    }
    Model_Product::updateCount($id);
    $product     = Model_Product::find($id);
    $image_names = array();
    $dir_path    = Config::get('UPLOAD_DIR').$product['user_id'].'/product/'.$id.'/other/';
    $dir_url     = Config::get('UPLOAD_URL').$product['user_id'].'/product/'.$id.'/other/';
    $dir         = dir($dir_path);
    while (FALSE !== ($file_name =  $dir->read())) {
      $path = $dir->path.$file_name;
      if (@getimagesize($path)) {
        $image_names[] = $dir_url.$file_name;
      }
    }
    $product['images'] = $image_names;
    $this->template->content->set_safe('product', $product);

    //コメント格納
    $validation    = Model_Comment::validate();
    $comment_data  = $validation->validated();
    $product_path  = Config::get('UPLOAD_DIR') . $user_id . '/product/' . $product_id;
    $comment_data += array('user_id'=>Auth::get('id'),'com_url'=>$product_path);
    $insert_id     = Model_comment::insert($comment_data);
  }

  /**
   * @brif    作品追加
   * @access  public
   * @return
   */
  public function action_add() {
    $this->template->subtitle = '追加';
    $this->template->content  = View::forge('product/add');

    $product_model = new Model_Product();
    $project_type  = Session::get('project.type');
    $product_id    = Session::get('project.product.id');
    $status        = Session::get('project.product.status');
    if ($project_type !== 'product' || $status !== 'add') {
      $product_id  = $product_model->insertEmpty();
      Session::set('project', array(
        'product'  => array(
          'id'     => $product_id,
          'status' => 'add',
        ),
        'type'     => 'product',
      ));
    }

    // 初期表示時
    if (!Security::check_token()){
      return ;
    }

    // バリデーション
    $user_id    = Auth::get('id');
    $validation = $product_model -> validate();
    $errors     = $validation    -> error();
    if (!empty($errors)) {
      // エラー設定
      MyUtil::set_alert('danger','入力エラーがあります',$validation->show_errors());
      return ;
    }
    $product_data = $validation -> validated();
    $product_data['skill']      = json_encode($product_data['skill']);
    $product_data['status']     = Config::get('PROJECT.STATUS.ENABLE');
    $product_data['created_at'] = time();

    // パスを設定
    $product_path = Config::get('UPLOAD_DIR') . $user_id . '/product/' . $product_id;

    // フォルダ確認
    if (!file_exists($product_path)) {
      // フォルダ作成
      $structure = $product_path . '/other';
      mkdir($structure, 0755, true);
    }

    // アップロード
    $temp_file  = Input::file('thumbnail');
    if ($temp_file['size'] !== 0) {
    	$config = array(
    		'path'          => $product_path,
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
    	  $product_data += array('thumbnail'   => $user_id. '/product/' . $product_id . '/' .$file['saved_as']);
    	}
    }

    // データの追加
    if ($product_model->updateById($product_id, $product_data) !== true) {
      // エラー設定
      MyUtil::set_alert('danger','投稿時にエラーが発生しました');
      return ;
    }

    // 不要セッションを削除し一覧へ
    MyUtil::set_alert('success','作品を投稿しました');
    Response::redirect('admin/product');
  }

  /**
   * @brif    作品編集
   * @access  public
   * @return
   */
  public function action_edit() {
    // 他ユーザーの作品は開かせない
    $user_id = Auth::get('id');
    if (!$product_id = Input::get('id', null)) {
      Response::redirect('admin/product');
    }
    $product_model = new Model_Product();
    $product       = $product_model->find($product_id);
    if ($product['user_id'] != $user_id || $product['status'] == '0') {
      Response::redirect('admin/product');
    }

    $this->template->subtitle = '編集';
    $this->template->content  = View::forge('product/edit');

    Session::set('project', array(
      'product'  => array(
        'id'     => $product_id,
        'status' => 'edit',
      ),
      'type'     => 'product',
    ));

    // 初期表示時
    if (!Security::check_token()) {
      $product_model->setFormData($product_id,array('skill'));
      return ;
    }

    // バリデーション
    $user_id    = Auth::get('id');
    $validation = $product_model->validate();
    $errors     = $validation->error();
    if (!empty($errors)) {
      // エラー設定
      MyUtil::set_alert('danger','入力エラーがあります',$validation->show_errors());
      return ;
    }

    $product_data          = $validation->validated();
    $product_data['skill'] = json_encode($product_data['skill']);

    // パスを設定
    $product_path = Config::get('UPLOAD_DIR') . $user_id . '/product/' . $product_id;

    // フォルダ確認
    if (!file_exists($product_path)) {
      // フォルダ作成
      $structure = $product_path . '/other';
      mkdir($structure, 0755, true);
    }

    // アップロード
    $temp_file = Input::file('thumbnail');
    if ($temp_file['size'] !== 0) {
    	$config  = array(
    		'path'          => $product_path,
    		'auto_rename'   => true,
    		'ext_whitelist' => Config::get('FILE.EXT'),
    	);
    	Upload::process($config);
    	if (!Upload::is_valid()) {
    		MyUtil::set_alert('danger','ファイルアップロードに失敗しました');
    		return Response::redirect('product/edit?id='.$product_id);
    	}
    	Upload::save();
    	if($file = Upload::get_files(0)){
    	  $product_data += array('thumbnail' => $user_id. '/product/' . $product_id . '/' .$file['saved_as']);
    	}
    }

    // データの追加
    if ($product_model->updateById($product_id, $product_data) !== true) {
      // エラー設定
      MyUtil::set_alert('danger','投稿時にエラーが発生しました');
      return ;
    }

    // 不要セッションを削除し一覧へ
    MyUtil::set_alert('success','作品を更新しました');
    Response::redirect('admin/product');
  }
}

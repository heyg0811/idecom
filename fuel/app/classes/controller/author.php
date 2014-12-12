<?php

/**
 * @brif    作品ページ関連ファイル
 * @author  Ouchi
 * @date    2014/10/24
 */

/**
 * @brif    作者ページ用
 * @package app
 * @extends Controller_Template
 */
class Controller_Author extends Controller_Template {

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
    // 決まり文句
    parent::before();

    $this->template->title = '作者';
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
   * @brif    作者一覧
   * @access  public
   * @return
   */
  public function action_list() {
    $this->template->subtitle = '一覧';
    $this->template->content = View::forge('author/list');
  }

  /**
   * @brif    作者詳細
   * @access  public
   * @return
   */
  public function action_detail() {
    
    $this->template->subtitle = '詳細';
    $this->template->content = View::forge('author/detail');
    //表示するuser_id取得
    $dev_id = Input::param('id');
    //developer情報取得
    $dev = Controller_Author::developer_get($dev_id);
  
    //タイムラインの取得
    $timeline = Controller_Author::timeline_get($dev_id);
    //メッセージの取得
    $messages = Model_Message::find('all', array(
      'where'    => array(array('host_id','=',$dev_id)),
      'order_by' => array('id'=>'desc'),
    ));
    
    $this->template->content->messages = $messages;
    $this->template->content->newest_id = empty($key = key($messages)) ? 0 : $key;
    $this->template->content->timeline = $timeline;
    $this->template->content->developer = $dev;
    
  }

  /**
   * @brif    作者編集
   * @access  public
   * @return
   */
  public function action_edit() {
    
    $this->template->subtitle = '編集';
    $this->template->content = View::forge('author/edit');

    //user_id取得
    $user_id = Auth::get('id');
    //developer情報取得
    $dev = Controller_Author::developer_get($user_id);
    // 初期表示時
    if (!Security::check_token()) {
      $this->template->content->developer = $dev;
      return;
    }

    //editデータ取得
    $input_data = Input::post('developer');
    $input_data['nickname'] = Auth::get('username');
    //更新時
    $validation = Model_Developer::validate();
    $errors = $validation->error();
    if (!empty($errors)) {
      // エラーの設定
      $result_validate = $validation->show_errors();
      $this->template->content->set_safe('errmsg', $result_validate);
      $this->template->content->developer = $input_data;
      return;
    }

    //インスタンス生成
    $developer_model = Model_Developer::forge();
    
    //developerデータ取得
    $user = $developer_model->find('all', array('where' => array('user_id' => $user_id)));

    //値設定
    $data = array(
      'user_id' => $user_id,
      'grade' => $input_data["grade"],
      'major' => $input_data["major"],
      'skill' => Model_Developer::technology_encode($input_data['skill']),
    );
    //Developer更新
    foreach($user as $val)
    {
      $val->set($data)->save();
    }
    //developerデータ再取得
    $dev = Controller_Author::developer_get($user_id);

    $this->template->content->developer = $dev;
  }

  /**
   * @brif    タイムライン情報取得
   * @access  public
   * @return  timeline
   */
  public static function timeline_get($user_id) {

    $timeline = array();
    //timeline_model取得
    $timeline_model = Model_Timeline::forge();
    //timelineデータ取得
    $data = $timeline_model::find('all',array('where' => array(array('user_id', $user_id))));

    //データ整形
    foreach ($data as $value) {
      $temp['title'] = $value['title'];
      $temp['icon'] = Config::get('TIMELINE.'.$value['icon']);
      $temp['text'] = $value['text'];
      $temp['date'] = $value['date'];
      
      array_push($timeline, $temp);
    }
    return $timeline;
  }

  /**
   * @brif    developer情報取得 
   * @access  public
   * @return  temp
   */
  public static function developer_get($user_id) {
    
    $temp = array();
    $developer = array();
    //developer_model取得
    $developer_model = Model_Developer::forge();
    //developer情報取得 
    $dev = $developer_model->find('all',array('where' => array(array('user_id', $user_id))));
    
    //データ整形
    $temp['nickname'] = Auth::get('username');
    foreach($dev as $val){
      $temp['user_id'] = $val['user_id'];  
      $temp['grade'] = $val['grade'];  
      $temp['major'] = $val['major'];
      $temp['skill'] = Model_Developer::technology_decode($val['skill']);
    }
    return $temp;
  }
  
  /**
   * @brif    timeline挿入
   * @access  public
   * @return  TRUE or FALSE
   */
  public static function timeline_insert($user_id,$title,$icon,$text)
  {
    //timeline_model取得
    $timeline = Model_Timeline::forge();
    
    $validation = Model_Timeline::validate($user_id,$title,$icon,$text);
    $errors = $validation->error();
    if (!empty($errors)) {
      // エラーの設定
      $result_validate = $validation->show_errors();
      //エラーを返す
      return $result_validate;
    }
    
    $data = array(
      'user_id' => $user_id,
      'title' => $title,
      'icon' => $icon,
      'text' => $text,
    );
    
    if(!$timeline->set($data)->save())
    {
      //失敗
      return FALSE;
    }else{
      //成功
      return TRUE;
    }
  }
}

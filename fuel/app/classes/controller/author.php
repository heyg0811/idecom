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

    $user_id = 1;

    $dev = Model_Developer::find('all', array('where' => array('user_id' => $user_id)));
    $dev[1]['technology'] = Model_Developer::technology_decode($dev[1]['technology']);
    
    $timeline=Controller_Author::timeline($user_id);
    
    $this->template->content->developer = $dev[1];
    $this->template->content->timeline = $timeline;
  }

  /**
   * @brif    作者編集
   * @access  public
   * @return
   */
  public function action_edit() {
    $this->template->subtitle = '編集';
    $this->template->content = View::forge('author/edit');

    $user_id = 1;




    // 初期表示時
    if (!Security::check_token()) {
      $dev = Model_Developer::find('all', array('where' => array('user_id' => $user_id)));
      $dev[1]['technology'] = Model_Developer::technology_decode($dev[1]['technology']);
      $this->template->content->developer = $dev[1];
      return;
    }

    //editデータ取得
    $input_data = Input::post();

    //更新時
    $validation = Model_Developer::validate();
    $errors = $validation->error();
    if (!empty($errors)) {
      // エラーの設定
      $result_validate = $validation->show_errors();
      $this->template->content->set_safe('errmsg', $result_validate);
      $dev = Model_Developer::find('all', array('where' => array('user_id' => $user_id)));
      $dev[1]['technology'] = Model_Developer::technology_decode($dev[1]['technology']);
      $this->template->content->developer = $dev[1];
      return;
    }

    //Developer更新
    //インスタンス生成
    $developer_model = Model_Developer::forge();

    //値設定
    $data = array(
        'nickname' => $input_data["nickname"],
        'grade' => $input_data["grade"],
        'major' => $input_data["major"],
        'technology' => Model_Developer::technology_encode($input_data['skil']),
    );

    $user = $developer_model->find('all', array('where' => array('user_id' => $user_id)));
    //updata
    if (!$user[1]->set($data)->save()) {
      //失敗
    }
    $dev = Model_Developer::find('all', array('where' => array('user_id' => $user_id)));
    $dev[1]['technology'] = Model_Developer::technology_decode($dev[1]['technology']);
    $this->template->content->developer = $dev[1];
  }

  public static function timeline($user_id) {

    $timeline = array();

    $data=Model_Timeline::find('all', array('where' => array('user_id' => $user_id)));
    
    foreach ($data as $key => $value) {
      $temp['title']=$value['title'];
      $temp['icon']=$value['icon'];
      $temp['text']=$value['text'];
      $temp['date']=$value['date'];
      
      array_push($timeline,$temp);
    }
    return $timeline;
  }
}

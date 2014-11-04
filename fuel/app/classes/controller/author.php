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

    $this->template->content->author = Model_Developer::find('1');
  }

  /**
   * @brif    作者編集
   * @access  public
   * @return
   */
  public function action_edit() {
    $this->template->subtitle = '編集';
    $this->template->content = View::forge('author/edit');

    // 初期表示時
    if (!Security::check_token()) {
      $this->template->content->developer = Model_Developer::find(1);
      return;
    }

    //更新時
    $validation = Model_Developer::developerValidate();
    $errors = $validation->error();
    if (!empty($errors)) {
      // エラーの設定
      $result_validate = $validation->show_errors();
      $this->template->content->set_safe('errmsg', $result_validate);
      return;
    }

    //editデータ取得
    $input_data = Input::get();
    //データ整形
    $keys = array("NickName", "Address", "Grade", "Major", "Technology");
    $val = array($input_data["NickName"], $input_data["Address"], $input_data["Grade"], $input_data["Major"], $input_data['skil']);
    $data = array_combine($keys, $val);

    //Developer更新
    Model_Developer::updata(1, $data);

    $this->template->content->developer = Model_Developer::find(1);
  }

}

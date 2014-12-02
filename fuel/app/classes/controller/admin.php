<?php

/**
 * @brif    解析ページ関連ファイル
 * @author  Sakamoto
 * @date    2014/09/13
 */

/**
 * @brif    解析ページ用
 * @package app
 * @extends Controller_Template
 */
class Controller_Admin extends Controller_Template {

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
    // 決まり文句
    parent::before();

    $this->template->title = '管理';
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
   * @brif    お知らせ一覧を表示
   * @access  public
   * @return
   */
  public function action_dashboard() {
    $this->template->subtitle          = '一覧';
    $this->template->content           = View::forge('admin/dashboard');
    $messages = Model_Message::find('all', array(
      'where'    => array(array('host_id','=',Auth::get('id'))),
      'order_by' => array('id'=>'desc'),
    ));
    $this->template->content->messages = $messages;
    if (empty($key = key($messages))) {
      $key = 0;
    }
    $this->template->content->newest_id = $key;
  }

  /**
   * @brif    作品管理
   * @access  public
   * @return
   */
  public function action_product() {
    $this->template->subtitle = '作品';
    $this->template->content = View::forge('admin/product');
    $this->template->content->products = Model_Product::getAll();
  }

  /**
   * @brif    募集管理
   * @access  public
   * @return
   */
  public function action_recruit() {
    $this->template->subtitle = '募集';
    $this->template->content = View::forge('admin/recruit');
  }

  /**
   * @brif    募集管理
   * @access  public
   * @return
   */
  public function action_view() {
    $this->template->subtitle = 'アクセスカウンタ';
    $this->template->content = View::forge('admin/view');
  }

  /**
   * @brif    募集管理
   * @access  public
   * @return
   */
  public function action_subscription() {
    $this->template->subtitle = 'プロジェクト応募数';
    $this->template->content = View::forge('admin/subscription');
  }

  /**
   * @brif    募集管理
   * @access  public
   * @return
   */
  public function action_comment() {
    $this->template->subtitle = '自分へのコメント';
    $this->template->content = View::forge('admin/comment');
  }

  /**
   * @brif    募集管理
   * @access  public
   * @return
   */
  public function action_nice() {
    $this->template->subtitle = 'イイネ!!';
    $this->template->content = View::forge('admin/nice');
    $this->template->content->products = Model_Product::find('all');

  }

}

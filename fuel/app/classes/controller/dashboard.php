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
class Controller_Dashboard extends Controller_Template
{
  /**
  * @brif   前処理
  * @access public
  * @return
  */
  public function before()
  {
    // 決まり文句
    parent::before();

    $this->template->title = '解析';
  }

  /**
  * @brif     後処理
  * @detail   $response をパラメータとして追加し、after() を Controller_Template 互換にする
  * @access  public
  * @return   Response
  */
  public function after($response)
  {
    // 決まり文句
    $response = parent::after($response);
    return $response;
  }

  /**
   * @brif    お知らせ一覧を表示
   * @access  public
   * @return
   */
  public function action_index()
  {
    $this->template->subtitle = '一覧';
    $this->template->content = View::forge('dashboard/index');
  }
}

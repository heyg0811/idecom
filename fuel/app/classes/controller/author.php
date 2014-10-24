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
class Controller_Author extends Controller_Template
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

    $this->template->title = '作者';
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
   * @brif    作者詳細
   * @access  public
   * @return
   */
  public function action_Detail()
  {
    $this->template->subtitle = '詳細';
    $this->template->content = View::forge('author/Detail');
  }


}
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
class Controller_Product extends Controller_Template
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

    $this->template->title = '作品';
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
   * @brif    作品一覧
   * @access  public
   * @return
   */
  public function action_list()
  {
    $this->template->subtitle = '一覧';
    $this->template->content = View::forge('product/list');
  }

  /**
   * @brif    作品詳細
   * @access  public
   * @return
   */
  public function action_detail()
  {
    $this->template->subtitle = '詳細';
    $this->template->content = View::forge('product/detail');
  }
}

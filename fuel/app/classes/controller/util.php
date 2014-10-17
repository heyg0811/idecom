<?php
/**
 * @brif    トップページ関連ファイル
 * @author  Sakamoto
 * @date    2014/09/13
 */

/**
 * @brif    トップページ用
 * @package app
 * @extends Controller_Template
 */
class Controller_Util extends Controller_Template
{
  /**
  * @brif   前処理
  * @access public
  * @return
  */
  public function before() {
    // 決まり文句
    parent::before();

    $this->template->title = '404';
  }

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
    $this->template->subtitle = 'NotFound';
    $this->template->content = View::forge('util/404');
	}
}

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
class Controller_Welcome extends Controller_Template
{
  /**
  * @brif   前処理
  * @access public
  * @return
  */
  public function before() {
    // 決まり文句
    parent::before();
  }

  /**
   * @brif    トップを表示
   * @access  public
   * @return
   */
	public function action_index()
	{
		$this->template->content = View::forge('welcome/index');
	}

  /**
   * @brif    作品を表示
   * @access  public
   * @return
   */
	public function action_writer()
	{
		$this->template->content = View::forge('welcome/writer');
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}

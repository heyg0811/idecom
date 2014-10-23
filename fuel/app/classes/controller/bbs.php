<?php
/**
 * @brif    掲示板関連ファイル
 * @author  Sakamoto
 * @date    2014/09/13
 */

/**
 * @brif    掲示板用
 * @package app
 * @extends Controller_Template
 */
class Controller_Bbs extends Controller_Template
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

    $this->template->title = '掲示板';
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
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->subtitle = 'スレッド一覧';
		$this->template->content = View::forge('bbs/index');
	}

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_thread()
	{
		$this->template->subtitle = 'スレッド詳細';
		$this->template->content = View::forge('bbs/thread');
	}


}

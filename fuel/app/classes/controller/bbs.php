<?php

/**
 * @brif    掲示板関連ファイル
 * @author  Sakamoto
 * @date    2014/10/31
 */

/**
 * @brif    掲示板用
 * @package app
 * @extends Controller_Template
 */
class Controller_Bbs extends Controller_Template {

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
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
  public function after($response) {
    // 決まり文句
    $response = parent::after($response);
    return $response;
  }


  public function action_list() {
    $this->template->subtitle = 'スレッド一覧';
    $this->template->content = View::forge('bbs/list');
  }


  public function action_thread() {
    $this->template->subtitle = 'スレッド詳細';
    $this->template->content = View::forge('bbs/thread');
    // 初期表示時

    //thread_idを取得 1はテストデータ
    $get_thread = 1;
    //取得したthread_idと同じthrea_idのものをshow_dataに格納
    $show_data = Model_Bbsthread::find('last', array('select' => array('date', 'user_id','comment'),
                                                     'where' => array(array('thread_id', $get_thread),),
                                                     'order_by' => array('date' => 'desc'), ));

    //var_dump($show_data);exit();
    if (!Security::check_token())
    {
      return ;
    }

    //$bbslist_model = new Model_Bbslist();
    //$thread_id = listテーブルのthread_id;
    $validation = Model_Bbsthread::validate();
    $thread_data = $validation->validated();
    $bbsthread_model = new Model_Bbsthread();
    $bbsthread_model->set(array(
      //threa_idはテストデータ
                          'thread_id'  => 1/*$thread_id['thread_id']*/,
                          'user_id'  => 'B1123547',
                          'comment' => $thread_data['comment'],
                          'date' => date("Y/m/d H:i:s"),
                          ));
    $bbsthread_model->save();

  }

}

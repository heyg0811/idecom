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


  public function action_thread() {
    $this->template->subtitle = 'スレッド一覧';
    $this->template->content = View::forge('bbs/thread');
    // 初期表示時

    //threadテーブルからデータ取得
    $threads = Model_Bbsthread::find('all', array(
      'select' => array('user_id', 'title','date'),
      'order_by' => array('date' => 'desc'),
     ));

    $this->template->content->threads = $threads;
    //commentテーブルから最初のコメントを取得
    $first_comment = Model_Bbscomment::find('all', array(
      'select' => array('comment'),
      'where' => array(array('comment_id', 1),),
     ));
    $this->template->content->first_comment = $first_comment;

    if (!Security::check_token())
    {
      return ;
    }

    //$bbslist_model = new Model_Bbslist();
    //$thread_id = listテーブルのthread_id;
    $validation = Model_Bbsthread::validate();
    $thread_data = $validation->validated();
    $bbsthread_model = new Model_Bbsthread();
    $bbscomment_model = new Model_Bbscomment();
    $bbsthread_model->set(array(
                          'user_id'  => 'B1123547',
                          'title' => $thread_data['title'],
                          'date' => date("Y/m/d H:i:s"),
                          ));

    $bbscomment_model->set(array(
                          'comment' => $thread_data['comment'],
                          ));
    $bbsthread_model->save();
    $bbscomment_model->save();

    }

//---------------------------ここからコメント一覧のコード---------------------------------------
  public function action_comment() {
    $this->template->subtitle = 'レス一覧';
    $this->template->content = View::forge('bbs/comment');
    // 初期表示時

    //thread_idを取得
    $get_thread = 11;

    //取得したthread_idと同じthrea_idのものをshow_dataに格納
    $comments = Model_Bbscomment::find('all', array(
      'select' => array('date', 'user_id','comment'),
      'where' => array(array('thread_id', $get_thread),),
      'order_by' => array('date' => 'desc'),
     ));

    $this->template->content->comments = $comments;


    if (!Security::check_token())
    {
      return ;
    }

    //$bbslist_model = new Model_Bbslist();
    //$thread_id = listテーブルのthread_id;
    $validation = Model_Bbscomment::validate();
    $comment_data = $validation->validated();
    $bbscomment_model = new Model_Bbscomment();
    $bbscomment_model->set(array(
      //threa_idはテストデータ
                          'thread_id'  => 11/*今いるスレッドのthread_idの値*/,
                          'user_id'  => 'B1123547',
                          'comment' => $comment_data['comment'],
                          'date' => date("Y/m/d H:i:s"),
                          ));
    $bbscomment_model->save();

  }

}

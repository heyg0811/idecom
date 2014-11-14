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

    //threadテーブルからデータ取得
   $threads = DB::select('bbs_thread.id','title','bbs_comment.id','bbs_comment.comment','bbs_thread.date')
                                ->from('bbs_thread')
                                ->distinct(true)
                                ->join('bbs_comment','inner')
                                ->on('bbs_thread.id', '=', 'bbs_comment.thread_id')
                                ->order_by('bbs_comment.id','desc')
                                ->execute()
                                ->as_array();

    $this->template->content->threads = $threads;

    // 初期表示時
    if (!Security::check_token())
    {
      return ;
    }

    $validation = Model_Bbsthread::validate();
    $thread_data = $validation->validated();
    $bbsthread_model = new Model_Bbsthread();
    $bbsthread_model->set(array(
                          'user_id'  => 'B1515',
                          'title' => $thread_data['title'],
                          'date' => date("Y/m/d H:i:s"),
                          ));
    $bbsthread_model->save();

    $bbscomment_model = new Model_Bbscomment();
    $bbscomment_model->set(array(
                          // 'thread_id'  => 11/*今いるスレッドのthread_idの値を取ってくる*/,
                          // 'user_id'  => 'B1123547',/*user_idを取得する*/
                          'comment' => $thread_data['comment'],
                          // 'date' => date("Y/m/d H:i:s"),
                          ));
    $bbscomment_model->save();

  }

//---------------------------ここからコメント一覧のコード---------------------------------------
  public function action_comment() {
    $this->template->subtitle = 'コメント一覧';
    $this->template->content = View::forge('bbs/comment');
    // 初期表示時

    //thread_idを取得
    $get_thread = 11;

    //取得したthread_idと同じthrea_idのものをcommentsに格納
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

    //$bbsthread_model = new Model_Bbsthread();
    //$thread_id = threadテーブルのthread_id;
    $validation = Model_Bbscomment::validate();
    $comment_data = $validation->validated();
    $bbscomment_model = new Model_Bbscomment();
    $bbscomment_model->set(array(
      //threa_idはテストデータ
                          'thread_id'  => 11/*今いるスレッドのthread_idの値を取ってくる*/,
                          'user_id'  => 'B1123547',/*user_idを取得する*/
                          'comment' => $comment_data['comment'],
                          'date' => date("Y/m/d H:i:s"),
                          ));
    $bbscomment_model->save();

  }

}

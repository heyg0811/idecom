<?php

/**
 * @brif    掲示板関連ファイル
 * @author  Yoshioka,Matsumoto
 * @date    2014/11/18
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
    $this->template->content  = View::forge('bbs/thread');

    // 初期表示時

    //threadテーブルからデータ取得
    $threads = Model_Bbsthread::get_thread();
    $this->template->content->threads = $threads;

    if (!Security::check_token())
    {
      return ;
    }
    //threadテーブルにデータ挿入
    $validation    = Model_Bbsthread::validate();
    $thread_data   = $validation->validated();
    $thread_data  += array('user_id'=>Auth::get('id'),'date'=>date('Y-m-d H:i:s'));
    $comment       = $thread_data['comment'];
    unset($thread_data['comment']);
    $insert_id     = Model_Bbsthread::insert($thread_data);
    //コメントはcommentテーブルに
    $comment_data  = array('thread_id'=>$insert_id,'user_id'=>Auth::get('id'),'comment'=>$comment, 'date'=>date('Y-m-d H:i:s'));
    if (!$insert_id || !Model_Bbscomment::insert($comment_data)) {
      echo '投稿時にエラーが発生しました';
      return;
    }
    Response::redirect('bbs/thread');

  }

//---------------------------ここからコメント一覧のコード---------------------------------------
  public function action_comment() {
    $this->template->subtitle = 'コメント一覧';
    $this->template->content  = View::forge('bbs/comment');
    // 初期表示時

    //GETでthread_idを取得, DBからコメントデータを取得
    $thread_id = Input::param('id',null);
    $options   = array('where' => array('thread_id' => $thread_id), );
    $comments  = Model_Bbscomment::find('all', $options);
    //var_dump($comments);exit(); NULLが入るWarning無視すれば普通に動く
    $this->template->content->comments = $comments;
    $this->template->content->id = $thread_id;
    if (!Security::check_token())
    {
      return ;
    }

    //コメントデータをDBに格納
    $validation    = Model_Bbscomment::validate();
    $comment_data  = $validation->validated();
    $comment_data += array('user_id'=>Auth::get('id'),'thread_id'=>$thread_id,'comment'=>Input::post('comment'),'date'=>date('Y-m-d H:i:s'));
    $insert_id     = Model_Bbscomment::insert($comment_data);

    Response::redirect('bbs/comment?id='.$thread_id);
  }


}
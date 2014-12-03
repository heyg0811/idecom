<?php
class Model_Bbsthread extends \Model_Crud
{
  // テーブル情報を設定
  protected static $_table_name = 'bbs_thread';
  protected static $_properties = array(
    'id',
    'user_id',
    'title',
    'date',
  );
  protected static $primary_key = array('id');
	/**
	 * @brif    入力チェック
	 * @access  private
	 * @return
	 */
  public static function validate(){
		$validation = Validation::forge();
		$validation->add('comment', 'コメント')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 500);
		$validation->add('title', 'タイトル')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 100);

		$validation->run();
		return $validation;
	}

	public static function insert($data){
	  list($insert_id,$row) = DB::insert(static::$_table_name)
	  ->set($data)
	  ->execute();

	  return $insert_id;
	}

	public static  function get_thread(){
		 $threads = DB::select('bbs_thread.id','title',array(
		 	'bbs_comment.id','comment_id'),'bbs_comment.comment','bbs_thread.date')
      ->from('bbs_thread')
      ->join(DB::expr('(select id, comment, thread_id from
        bbs_comment group by thread_id) as bbs_comment'),'inner')
      ->on('bbs_thread.id', '=', 'bbs_comment.thread_id')
      ->order_by('bbs_thread.id','desc')
      ->execute()
      ->as_array();
      return $threads;
	}

}
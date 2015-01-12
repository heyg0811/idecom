<?php
class Model_Bbsthread extends \Model_Crud
{
  // テーブル情報を設定
  protected static $_table_name = 'bbs_thread';
  protected static $_properties = array(
    'id',
    'user_id',
    'title',
    'category',
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
		$validation->add('category', 'カテゴリー')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 10);

		$form_data = Input::post(static::$_table_name, null);
	  $validation->run($form_data , static::$_table_name);
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
		 	'bbs_comment.id','comment_id'),'bbs_comment.comment','bbs_thread.category','bbs_thread.date')
      ->from('bbs_thread')
      ->join(DB::expr('(select id, comment, thread_id from
        bbs_comment group by thread_id) as bbs_comment'),'inner')
      ->on('bbs_thread.id', '=', 'bbs_comment.thread_id')
      ->order_by('bbs_thread.id','desc')
      ->execute()
      ->as_array();
      return $threads;
	}
	public static function getTitle($id) {
    $user_data = DB::select('title')
    ->from(static::$_table_name)
    ->where('id', $id)
    ->execute()
    ->as_array();
    return $user_data[0]['title'];
  }

}
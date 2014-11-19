<?php
class Model_Bbscomment extends \Model_Crud
{
  // テーブル情報を設定
  protected static $_table_name = 'bbs_comment';
  protected static $_properties = array(
  	'id',
    'thread_id',
    'user_id',
    'comment',
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
		$validation->add('thread_id', 'thread_id')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 10);

		$validation->run();
		return $validation;
	}

	public static function insert($data){
    list($insert_id,$row) = DB::insert(static::$_table_name)
    ->set($data)
    ->execute();

    return $insert_id;
	}

	// public static  function get_comment(){
	// 	 $comennt = DB::select('thread_id','user_id','comment','date')
 //      ->from('bbs_comment')
 //      ->where('thread_id', '=', 32)
 //      ->order_by('date','asc')
 //      ->execute()
 //      ->as_array();
 //      return $comennt;
	// }

}
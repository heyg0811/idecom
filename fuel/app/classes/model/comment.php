<?php
class Model_Comment extends MyModel
{
  // テーブル情報を設定
  protected static $_table_name = 'comment';
  protected static $_properties = array(
  	'id',
    'user_id',
    'comment',
    'comment_url',
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

		$form_data = Input::post(static::$_table_name, null);

	  $validation->run($form_data , static::$_table_name);
		return $validation;
	}

	public static function getComment_pro(){
		 $comment_data = DB::select('user_id','comment','date')
    ->from(static::$_table_name)
    ->where('comment_url', 'like','product')
    ->execute()
    ->as_array();
    return $comment_data;

	}

	public static function getComment_rec(){
		 $comment_data = DB::select('user_id','comment','date')
    ->from(static::$_table_name)
    ->where('comment_url', 'like','recruit')
    ->execute()
    ->as_array();
    return $comment_data;
	}





}
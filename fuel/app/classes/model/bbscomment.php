<?php
class Model_Bbscomment extends \Orm\Model
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
  protected static $_primary_key = array('id');
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

		$validation->run();
		return $validation;
	}
}
?>
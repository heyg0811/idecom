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

}
?>
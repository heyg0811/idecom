<?php
class Model_Nice extends \Orm\Model
{
  // テーブル情報を設定
  protected static $_table_name = 'nice';
  protected static $_properties = array(
  	'id',
    'product_id',
    'user_id',
    'nice',
  );
  protected static $primary_key = array('id');
	/**
	 * @brif    入力チェック
	 * @access  private
	 * @return
	 */
  public static function validate(){
		$validation = Validation::forge();
		$validation->add('nice', 'nice')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 10);

		$validation->run();
		return $validation;
	}
	public static function updateNice($id) {
    DB::query('UPDATE $_table_name SET nice = nice + 1 WHERE id = '. $id)->execute();
  }
}

<?php
class Model_Recruit extends \Orm\Model
{
  // テーブル情報を設定
  protected static $_table_name = 'recruit';
  protected static $_properties = array(
    'id',
    'user_id',
    'title',
    'skill',
    'description',
    'detail',
    'subscriber',
    'thumbnail',
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
		$validation->add('title', '題目')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 100);
		$validation->add('skill', '募集技術')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 100);
		$validation->add('description', '募集内容')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 1000);
		$validation->add('detail', '詳細内容')
		->add_rule('required')
		->add_rule('min_length', 1)
		->add_rule('max_length', 1500);

		$validation->run();
		return $validation;
	}


}
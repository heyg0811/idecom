<?php
class Model_Recruit extends MyModel
{
  // テーブル情報を設定
  protected static $_table_name = 'recruit';
  protected static $_properties = array(
    'id',
    'user_id',
    'title',
    'skill',
    'outline',
    'detail',
    'thumbnail',
    'category',
    'count',
    'status',
    'created_at',
  );
  protected static $primary_key = array('id');

	/**
   * @brif    入力チェック
   * @access  public
   * @return
   */
  public static function validate()
  {
    $validation = Validation::forge();

    $validation->add('title', '題目')
    ->add_rule('required')
    ->add_rule('min_length', 4)
    ->add_rule('max_length', 15);

    $validation->add('category', '分類')
    ->add_rule('required')
    ->add_rule('numeric_min', 0)
    ->add_rule('numeric_max', 10);

    $validation->add('outline', '概要')
    ->add_rule('required')
    ->add_rule('min_length', 0)
    ->add_rule('max_length', 150);

    $validation->add('detail', '詳細')
    ->add_rule('required')
    ->add_rule('min_length', 0)
    ->add_rule('max_length', 65535);

    $form_data = Input::post(static::$_table_name, null);

    foreach ($form_data['skill'] as $key => $val) {
      $validation->add('skill.' . $key, '技術')
      ->add_rule('max_length', 20);
    }

    $validation->run($form_data , static::$_table_name);
    return $validation;
  }

  /**
   * @brif    空のインサート
   * @access  public
   * @return
   */
  public static function insertEmpty()
  {
    $insert_data = array(
      'user_id' => Auth::get('id'),
      'status'  => 0,
    );
    return static::insert($insert_data);
  }
}
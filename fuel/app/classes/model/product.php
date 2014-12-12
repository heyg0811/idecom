<?php
class Model_Product extends \Orm\Model
{
  // テーブル情報を設定
  protected static $_table_name = 'product';
  protected static $_properties = array(
    'id' => array(
      'skip' => true,
    ),
    'user_id' => array(
      'skip' => true,
    ),
    'title' => array(
      'data_type' => 'varchar',
      'label'     => '題名',
      'validation' => array(
        'required',
        'min_length' => array(3),
      ),
    'form' => array(
        'type' => 'text',
        'class' => 'form-control',
      ),
    ),
    'category' => array(
      'data_type' => 'varchar',
      'label' => '使用技術',
      'validation' => array('required'),
      'form' => array(
        'type'    => 'text',
        'class'   => 'form-control',
      ),
    ),
    'skill' => array(
      'data_type' => 'varchar',
      'label' => '使用技術',
      'validation' => array('required'),
      'form' => array(
        'type'  => 'text',
        'class' => 'form-control',
      ),
    ),
    'outline' => array(
      'data_type' => 'text',
      'label' => '概要',
      'validation' => array('required'),
      'form' => array(
        'type'  => 'textarea',
        'class' => 'form-control',
      ),
    ),
    'detail' => array(
      'data_type' => 'text',
      'label' => '詳細',
      'validation' => array('required'),
      'rows' =>"5",
      'form' => array(
        'type'  => 'textarea',
        'class' => 'form-control ckeditor',
      ),
    ),
    'thumbnail' => array(
      'data_type' => 'file',
      'label' => 'サムネイル',
      'form' => array('type' => 'file'),
    ),
    'nice' => array(
      'skip' => true,
    ),
    'status' => array(
      'skip' => true,
    ),
    'count' => array(
      'skip' => true,
    ),
    'source' => array(
      'skip' => true,
    ),
    'created_at' => array(
      'skip' => true,
    ),
  );
  protected static $primary_key = array('id');

    /**
   * @brif    フォーム用データ取得
   * @access  public
   * @return
   */
  public static function getAll() {
    return static::find('all',array(
      'order_by' => array('created_at' => 'desc'),
    ));
  }

  /**
   * @brif    作品チェック
   * @access  public
   * @return
   */
  public static function addValidate(&$form) {
    $form->field('title')
    ->add_rule('required')
    ->add_rule('min_length', 4);
    $form->field('skill')
    ->add_rule('required');
    $form->field('category')
    ->add_rule('required');
    $form->field('outline')
    ->add_rule('required')
    ->add_rule('min_length', 6);
    $form->field('detail')
    ->add_rule('required');
  }

  /**
   * @brif    ログイン入力チェック
   * @access  public
   * @return
   */
  public static function validate() {
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
   * @brif    インサート
   * @access  public
   * @return
   */
  public static function insert($insert_data) {
    list($insert_id, $rows_affected) = DB::insert(static::$_table_name)
    ->set($insert_data)
    ->execute();

    return $insert_id;
  }

  /**
   * @brif    アクセスカウント
   * @access  public
   * @return
   */
  public static function updateCount($id) {
    DB::query('UPDATE product SET count = count + 1 WHERE id = '. $id)->execute();
  }
  public static function updateNice($id) {
    DB::query('UPDATE product SET nice = nice + 1 WHERE id = '. $id)->execute();
  }
}
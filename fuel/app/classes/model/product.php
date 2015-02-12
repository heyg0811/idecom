<?php
class Model_Product extends MyModel
{
  // テーブル情報を設定
  protected static $_table_name = 'product';
  protected static $_properties = array(
    'id',
    'user_id',
    'title',
    'category',
    'skill',
    'outline',
    'detail',
    'thumbnail',
    'nice',
    'status',
    'count',
    'source',
    'created_at',
    'zip',
    'zip_name',
  );
  protected static $primary_key = array('id');

  /**
   * @brif    バリデーション
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

  /**
   * @brif    ナイスの更新
   * @access  public
   * @return
   */
  public static function updateNice($id) {
    DB::query('UPDATE product SET nice = nice + 1 WHERE id = '. $id)->execute();
  }

  /**
   * @brif    全ての閲覧数
   * @access  public
   * @return  String
   */
  public static function showCount(){
    $query =  DB::query('select SUM(count) as count from product where status = '. Config::get('PROJECT.STATUS.ENABLE') .' AND user_id = ' . Auth::get('id'))->execute()->as_array();
    return $query[0]['count'];
  }
  
  
        /**
   * @brif    作品を削除
   * @access  public
   * @return　
   */
   public static function DeleteEmpty($id)
  {
    $query = DB::delete('product')
              ->where('id',$id)
              ->execute();
  }
  
  public static function addNice($id) {
    DB::query('UPDATE product SET nice = nice + 1 WHERE id = '. $id)->execute();
  }
  
  public static function rmNice($id) {
    DB::query('UPDATE product SET nice = nice - 1 WHERE id = '. $id)->execute();
  }
}
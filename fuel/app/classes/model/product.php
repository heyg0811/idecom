<?php
class Model_Product extends \Orm\Model
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
  );
  protected static $primary_key = array('id');

  /**
   * @brif    ログイン入力チェック
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
   * @brif    インサート
   * @access  public
   * @return
   */
  public static function insert($insert_data)
  {
    list($insert_id, $rows_affected) = DB::insert(static::$_table_name)
    ->set($insert_data)
    ->execute();

    return $insert_id;
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
    list($insert_id, $rows_affected) = DB::insert(static::$_table_name)
    ->set($insert_data)
    ->execute();

    return $insert_id;
  }
  
  /**
   * @brif    idを使用した更新
   * @access  public
   * @return
   */
  public static function updateById($id, $insert_data)
  {
    return Model_Product::find($id)->set($insert_data)->save();
  }
  
  public static function setFormData($id, $json_list=array())
  {
    $data = DB::select('*')
    ->from(static::$_table_name)
    ->where('id','=',$id)
    ->execute()
    ->as_array();
    
    foreach ($data[0] as $key => $value) {
      if (in_array($key, $json_list)) {
        $json_data = json_decode($value);
        foreach ($json_data as $json_key => $json_val) {
          Session::set_flash($key.'.'.$json_key, $json_val);
        }
      } else {
        Session::set_flash($key,$value);
      }
    }
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
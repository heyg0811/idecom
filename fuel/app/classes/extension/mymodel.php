<?php
/**
 * @brif      Orm\Model拡張ファイル
 * @author    Sakamoto
 * @date      2014/12/25
 */

/**
 * @brif      独自関数を追加
 * @package   app
 * @extends   Orm\Model
 */
class MyModel extends \Orm\Model
{
  /**
   * @brif    インサート
   * @access  public
   * @return  インサートid
   */
  public static function insert($insert_data)
  {
    list($insert_id, $rows_affected) = DB::insert(static::$_table_name)
    ->set($insert_data)
    ->execute();

    return $insert_id;
  }
  
  /**
   * @brif    idを使用した更新
   * @access  public
   * @return  更新したカラム数
   */
  public static function updateById($id, $insert_data)
  {
    return Model_Product::find($id)->set($insert_data)->save();
  }
  
  /**
   * @brif    idよりデータベースの値をフォームにセット
   * @access  public
   * @return
   */
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
}

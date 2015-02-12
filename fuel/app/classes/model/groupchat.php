<?php
/**
 * Description of groupchat
 *
 * @author b1225
 */
class Model_GroupChat extends MyModel {
  // テーブル情報を設定
  protected static $_table_name = 'groupchat';
  protected static $_properties = array(
    'id',
    'host_id',
    'partner_id',
  );
  
  /**
   * @brif    作成済みかチェック
   * @access  public
   * @return
   */
  public static function check($host_id, $partner_id)
  {
    $params = array(static::$_table_name,$host_id,$partner_id,$partner_id,$host_id);
    $query = vsprintf('SELECT * FROM %s WHERE (host_id = %s AND partner_id = %s) OR (host_id = %s AND partner_id = %s)',$params);
    return DB::query($query)->as_object()->execute();
  }
}
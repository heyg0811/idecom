<?php
/**
 * Description of groupchat
 *
 * @author b1225
 */
class Model_Groupchat extends \Orm\Model {
  // テーブル情報を設定
  protected static $_table_name = 'groupchat';
  protected static $_properties = array(
    'id',
    'host_id',
    'member',
    'name',
  );
  
  
}
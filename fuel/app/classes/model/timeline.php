<?php

/**
 * Description of developer
 *
 * @author b1225
 */
class Model_Timeline extends \Orm\Model {

  // テーブル情報を設定
  protected static $_table_name = 'timeline';
  protected static $_properties = array(
    'id',
    'user_id',
    'title',
    'icon',
    'text',
    'date',
  );
  protected static $_primary_key = array('id');

  /**
   * @brif    入力チェック
   * @access  private
   * @return
   */
   
}

<?php
class Model_ProductNice extends MyModel
{
  // テーブル情報を設定
  protected static $_table_name = 'product_nice';
  protected static $_properties = array(
  	'id',
    'product_id',
    'user_id',
    'created_at',
  );
  protected static $primary_key = array('id');
}
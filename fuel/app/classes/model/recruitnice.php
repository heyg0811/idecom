<?php
class Model_RecruitNice extends MyModel
{
  // テーブル情報を設定
  protected static $_table_name = 'recruit_nice';
  protected static $_properties = array(
  	'id',
    'recruit_id',
    'user_id',
    'created_at',
  );
  protected static $primary_key = array('id');
}
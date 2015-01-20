<?php
class Model_Nice extends MyModel
{
  // テーブル情報を設定
  protected static $_table_name = 'nice';
  protected static $_properties = array(
  	'id',
    'product_id',
    'user_id',
    'nice',
  );
  protected static $primary_key = array('id');

  public static function get_nice_btn(){
    MyUtil::parse_uri($_SERVER["REQUEST_URI"],$id,$path);
    $result = DB::select('id')->from('nice')->where('user_id',Auth::get('id'))->where('path',$path)->execute()->as_array();
    if (count($result)) {
      return "<i class='fa fa-thumbs-o-down'></i> 取り消す";
    } else {
      return "<i class='fa fa-thumbs-o-up'></i> いいね";
    }
  }
}

<?php
/**
 * Description of groupchat_comment
 *
 * @author b1225
 */
class Model_Groupchatcomment extends \Orm\Model {
  // テーブル情報を設定
  protected static $_table_name = 'groupchat_comment';
  protected static $_properties = array(
    'id',
    'group_id',
    'user_id',
    'text',
    'date',
  );
  
  public static function insert($group_id, $body){
    list($insert_id, $rows_affected) = DB::insert('groupchat_comment')->set(array(
      'group_id'    => $group_id,
      'user_id'    => Auth::get('id'),
      'text'       => $body,
      'date' => time(),
    ))->execute();
    return $insert_id;
  }

  public static function getDiff($group_id, $newest_id){
    // 新しいデータ取得
    $message_diffs = DB::select()
    ->from('groupchat_comment')
    ->where('group_id','=',$group_id)
    ->where('id','>',$newest_id)
    ->execute()
    ->as_array();

    // フォーム用に整形
    foreach ($message_diffs as &$message) {
      $user_data = Model_User::getUser($message['user_id']);
      $message['date']      = date('Y-m-d H:i:s',$message['date']);
      $message['user_name'] = Model_User::getName($message['user_id']);
      $message['thumbnail'] = $user_data[0]['thumbnail'];
    }
    return $message_diffs;
  }
}
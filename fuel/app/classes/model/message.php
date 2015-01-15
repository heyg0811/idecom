<?php
class Model_Message extends \Orm\Model
{
  // テーブル情報を設定
  protected static $_table_name = 'message';
  protected static $_properties = array(
    'id',
    'host_id',
    'user_id',
    'body',
    'created_at',
  );
  protected static $_primary_key = array('id');

  /**
   * @brif    入力チェック
   * @access  private
   * @return
   */
  public static function validate(){
    $validation = Validation::forge();
    $validation->add('comment', 'コメント')
    ->add_rule('required')
    ->add_rule('min_length', 1)
    ->add_rule('max_length', 500);

    $validation->run();
    return $validation;
  }

  public static function insert($host_id, $body){
    list($insert_id, $rows_affected) = DB::insert('message')->set(array(
      'host_id'    => $host_id,
      'user_id'    => Auth::get('id'),
      'body'       => $body,
      'created_at' => time(),
    ))->execute();
    return $insert_id;
  }

  public static function getDiff($host_id, $newest_id){
    // 新しいデータ取得
    $message_diffs = DB::select()
    ->from('message')
    ->where('host_id','=',$host_id)
    ->where('id','>',$newest_id)
    ->execute()
    ->as_array();

    // フォーム用に整形
    foreach ($message_diffs as &$message) {
      $user_data = Model_User::getUser($message['user_id']);
      $message['date']      = date('Y-m-d H:i:s',$message['created_at']);
      $message['user_name'] = Model_User::getName($message['user_id']);
      $message['thumbnail'] = $user_data[0]['thumbnail'];
    }
    return $message_diffs;
  }
  
  
}
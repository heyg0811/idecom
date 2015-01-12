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
   public static function validate($user_id,$title,$icon,$text) {
    
    $validation = Validation::forge();
    $validation->add('user_id.' . $user_id, 'ユーザーid')
            ->add_rule('required');
    $validation->add('title.' . $title, 'タイトル')
            ->add_rule('required')
            ->add_rule('min_length', 1)
            ->add_rule('max_length', 20);
    $validation->add('icon.' . $icon, 'アイコン')
            ->add_rule('required');
    $validation->add('text.' . $text, 'テキスト')
            ->add_rule('required')
            ->add_rule('min_length', 1)
            ->add_rule('max_length', 255);
    $validation->run();
    return $validation;
  }
  /**
   * @brif    timeline挿入
   * @access  public
   * @return  TRUE or FALSE
   */
  public static function timeline_insert($user_id,$title,$icon,$text)
  {
    //timeline_model取得
    $timeline = Model_Timeline::forge();
    
    $validation = Model_Timeline::validate($user_id,$title,$icon,$text);
    $errors = $validation->error();
    if (!empty($errors)) {
      // エラーの設定
      $result_validate = $validation->show_errors();
      //エラーを返す
      return $result_validate;
    }
    $data = array(
      'user_id' => $user_id,
      'title' => $title,
      'icon' => $icon,
      'text' => $text,
    );
    
    if(!$timeline->set($data)->save())
    {
      //失敗
      return FALSE;
    }else{
      //成功
      return TRUE;
    }
  }
}

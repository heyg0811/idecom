<?php

class Model_User extends \Orm\Model
{
  // テーブル情報を設定
  protected static $_table_name = 'user';
  protected static $_properties = array(
    'id',
    'username',
    'password',
    'group',
    'email',
    'last_login',
    'login_hash',
    'profile_fields',
    'thumbnail',
    'created_at',
    'updated_at'
  );
  protected static $_primary_key = array('id');

  /**
   * @brif    ログイン入力チェック
   * @access  public
   * @return
   */
  public static function loginValidate(){
    $validation = Validation::forge();

    $validation->add('username', 'ユーザーID or メールアドレス')
    ->add_rule('required')
    ->add_rule('min_length', 4)
    ->add_rule('max_length', 15);

    $validation->add('password', 'パスワード')
    ->add_rule('required')
    ->add_rule('min_length', 6)
    ->add_rule('max_length', 20);

    $validation->run();
    return $validation;
  }

    /**
   * @brif    パスワード設定入力チェック
   * @access  public
   * @return
   */
  public static function passwordValidate(){
    $validation = Validation::forge();

    $validation->add('password1', 'パスワード')
    ->add_rule('required')
    ->add_rule('min_length', 6)
    ->add_rule('max_length', 20);

    $validation->add('password2', '確認パスワード')
    ->add_rule('required')
    ->add_rule('min_length', 6)
    ->add_rule('max_length', 20);

    $validation->run();
    return $validation;
  }

  public static function getUser($id) {
    return DB::select()
    ->from(static::$_table_name)
    ->where('id', $id)
    ->execute()
    ->as_array();
  }

  /**
   * @brif    ニックネーム取得
   * @access  public
   * @return
   */
  public static function getName($id) {
    $user_data = DB::select('profile_fields')
    ->from(static::$_table_name)
    ->where('id', $id)
    ->execute()
    ->as_array();
    
    
    $profile_data = @unserialize($user_data[0]['profile_fields']);
    
    return $profile_data['nickname'];
  }

  /**
   * @brif    サムネイル取得
   * @access  public
   * @return
   */
  public static function getThumbnail($id) {
    $user_data = DB::select('thumbnail')
    ->from(static::$_table_name)
    ->where('id', $id)
    ->execute()
    ->as_array();

    return $user_data[0]['thumbnail'];
  }
}
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
    'thumbnail',
    'nickname',
    'grade',
    'major',
    'genre',
    'skill',
    'status',
    'password_change',
    'last_login',
    'login_hash',
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

    $validation->run(Input::post(static::$_table_name, null), static::$_table_name);
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
    $validation->run(Input::post(static::$_table_name, null), static::$_table_name);
    return $validation;
  }
  
  public static function profile_validate() {
    $validation = Validation::forge();
    
    $validation->add('nickname', '名前')
            ->add_rule('required');
    $validation->add('grade', '学年')
            ->add_rule('numeric_min', 1)
            ->add_rule('numeric_max', 4);
    $validation->add('major', '専攻')
            ->add_rule('max_length', 50);
    $validation->add('genre', 'ジャンル')
            ->add_rule('max_length', 50);
    $form_data = Input::post(static::$_table_name, null);
    foreach ($form_data['skill'] as $key => $val) {
      $validation->add('skill.' . $key, '技術')
        ->add_rule('min_length', 1)
        ->add_rule('max_length', 3)
        ->add_rule('numeric_min', 0)
        ->add_rule('numeric_max', 100)
        ->add_rule('match_pattern',"/^[0-9]{1,3}$/");
    }
    $validation->add('status', '表示')
            ->add_rule('required');
    $validation->run($form_data , static::$_table_name);
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
    $user_data = DB::select('nickname')
    ->from(static::$_table_name)
    ->where('id', $id)
    ->execute()
    ->as_array();
    return $user_data[0]['nickname'];
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
  
  //technologyをjson形式にencode
  public static function technology_encode($technology) {
    return json_encode($technology);
  }
  //technologyをjson形式からdecode
  public static function technology_decode($technology) {
    return json_decode($technology);
  }
}
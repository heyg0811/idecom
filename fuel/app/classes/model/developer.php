<?php

/**
 * Description of developer
 *
 * @author b1225
 */
class Model_Developer extends \Orm\Model {

  // テーブル情報を設定
  protected static $_table_name = 'developer';
  protected static $_properties = array(
      'id',
      'user_id',
      'nickname',
      'address',
      'grade',
      'major',
      'technology',
  );
  protected static $_primary_key = array('id');

  /**
   * @brif    入力チェック
   * @access  private
   * @return
   */
//technologyをjson形式にencode
  public static function technology_encode($technology) {
    return json_encode($technology);
  }

//technologyをjson形式からdecode
  public static function technology_decode($technology) {
    return json_decode($technology);
  }

  public static function validate() {
    $validation = Validation::forge();
    $validation->add('nickname', '名前')
            ->add_rule('min_length', 2)
            ->add_rule('max_length', 50);
    $validation->add('address', 'メール')
            ->add_rule('valid_email');
    $validation->add('grade', '学年')
            ->add_rule('exact_length', 1)
            ->add_rule('numeric_min', 1)
            ->add_rule('numeric_max', 4)
            ->add_rule('numeric');
    $validation->add('major', '専攻')
            ->add_rule('max_length', 50);
    if (!$validation->run()) {
      //失敗
      $errors = $validation->error();
      return $errors;
    }
    return $validation;
  }

}

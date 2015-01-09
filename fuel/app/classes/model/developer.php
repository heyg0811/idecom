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
    'grade',
    'major',
    'genre',
    'skill',
  );
  protected static $_primary_key = array('id');
  
//technologyをjson形式にencode
  public static function technology_encode($technology) {
    return json_encode($technology);
  }
//technologyをjson形式からdecode
  public static function technology_decode($technology) {
    return json_decode($technology);
  }
  /**
   * @brif    入力チェック
   * @access  private
   * @return
   */
  public static function validate() {
    
    $validation = Validation::forge();
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

    $validation->run($form_data , static::$_table_name);
    return $validation;
  }
}
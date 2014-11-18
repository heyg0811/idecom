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
    $validation->add('grade', '学年')
            ->add_rule('exact_length', 1)
            ->add_rule('numeric_min', 1)
            ->add_rule('numeric_max', 4);
    $validation->add('major', '専攻')
            ->add_rule('max_length', 50);
    if (Input::post('skil')) {
      $form_options = Input::post('skil');
      foreach ($form_options as $form_id => $option) {
        $validation->add('skil.' . $form_id, '技術')
                ->add_rule('min_length', 1)
                ->add_rule('max_length', 3)
                ->add_rule('numeric_min', 0)
                ->add_rule('numeric_max', 100)
                ->add_rule('match_pattern',"/^[0-9]{1,3}$/");
      }
    }
    $validation->run();
    return $validation;
  }
}
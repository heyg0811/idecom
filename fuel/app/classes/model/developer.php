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
    /*
      'id' => array(
          'skip' =>true,
      ),
      'user_id' => array(
          'skip' =>true,
      ),
      'grade' => array(
          'data_type' => 'int',
          'label'     => '学年',
          'validation'=> array('exact_length' => array(1),'numeric_min' => array(1),'numeric_max' => array(4)),
          'form'      => array(
            'type' => 'text',
            'class'=> 'form-collatol',
          ),
      ),
      'major' => array(
          'data_type' => 'varchar',
          'label'     => '学科',
          'validation'=> array('max_length' => array(30)),
          'form'      => array(
            'type' => 'text',
            'class'=> 'form-collatol',
          ),
      ),
      */
      
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
            ->add_rule('exact_length', 1)
            ->add_rule('numeric_min', 1)
            ->add_rule('numeric_max', 4);
    $validation->add('major', '専攻')
            ->add_rule('max_length', 50);
    if (Input::post('skil')) {
      $skil = Input::post('skil');
      foreach ($skil as $key => $val) {
        $validation->add('skil.' . $key, '技術')
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
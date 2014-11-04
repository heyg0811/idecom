<?php

/**
 * Description of developer
 *
 * @author b1225
 */
class Model_Developer extends Orm\Model {

  protected static $_table_name = 'developer';
  protected static $_properties = array(
      'DeveloperId',
      'NickName',
      'Address',
      'Grade',
      'Major',
      'Technology',
  );
  protected static $_primariy = array('DeveloperId');

  //developerテーブルにinsert
  public static function insert($user) {
    $column = array('NickName', 'Address', 'Grade', 'Mojor', 'Technology');

    \DB::insert("developer")
            ->columns($column)
            ->values($user)
            ->execute();
  }

  //developer情報の更新
  public static function updata($deve_id, $deve) {
    \DB::update("developer")
            ->set(array(
                'NickName' => $deve['NickName'],
                'Address' => $deve['Address'],
                'Grade' => $deve['Grade'],
                'Major' => $deve['Major'],
                'Technology' => Model_Developer::technology_encode($deve['Technology']),
            ))
            ->where("DeveloperId", $deve_id)
            ->execute();
  }

  //developer検索
  public static function find($id = null, array $options = array()) {

    //全件検索
    if ($id === 'all') {
      $result = DB::select('*')
              ->from('Developer')
              ->execute()
              ->as_array();
      foreach ($result as $key => $val) {
        $val['Technology'] = Model_Developer::technology_decode($val['Technology']);
      }
    } else {
      //１件検索
      $result = DB::select('*')
              ->from('Developer')
              ->where('DeveloperId', $id)
              ->execute()
              ->as_array();
      $result[0]['Technology'] = Model_Developer::technology_decode($result[0]['Technology']);
    }

    return $result;
  }

  //technologyをjson形式にencode
  public static function technology_encode($technology) {
    return json_encode($technology);
  }

  //technologyをjson形式からdecode
  public static function technology_decode($technology) {
    return json_decode($technology);
  }

  public static function developerValidate() {
    $validation = Validation::forge();
    $validation->add('NickName', 'ユーザー名')
            ->add_rule('min_length', 2)
            ->add_rule('max_length', 50);
    $validation->add('Address', 'Eメール')
            ->add_rule('valid_email');
    $validation->add('Grade', '学年')
            ->add_rule('exact_length', 1);
    $validation->add('Major', '専攻')
            ->add_rule('max_length', 50);
    $validation->run();
    return $validation;
  }

}

<?php

/**
 * @brif    作品ページ関連ファイル
 * @author  Sakamoto
 * @date    2014/09/13
 */

/**
 * @brif    作品ページ用
 * @package app
 * @extends Controller_Template
 */
class Controller_Product extends Controller_Template {

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
    // 決まり文句
    parent::before();
    
    // フォームが必要かチェック
    $form_methods = array(
      'add',
      'edit',
    );
    $this->form_flag = in_array(Uri::segment(2), $form_methods);
    
    $this->template->title = '作品';
    
  }

  /**
   * @brif     後処理
   * @detail   $response をパラメータとして追加し、after() を Controller_Template 互換にする
   * @access  public
   * @return   Response
   */
  public function after($response) {
    if ($this->form_flag) {
      $this->template->content->set_safe('form', $this->product_form->build(), false);
    }
    
    // 決まり文句
    $response = parent::after($response);
    return $response;
  }

  /**
   * @brif    作品一覧
   * @access  public
   * @return
   */
  public function action_list() {
    $this->template->subtitle = '一覧';
    $this->template->content = View::forge('product/list');
    $this->template->content->products = Model_Product::find('all');
  }

  /**
   * @brif    作品詳細
   * @access  public
   * @return
   */
  public function action_detail() {
    $this->template->subtitle = '詳細';
    $this->template->content = View::forge('product/detail');
    
    if (!$id = Input::get('id',null)) {
      Response::redirect('product/list');
    }
    Model_Product::updateCount($id);
    $this->template->content->product = Model_Product::find($id);
  }

  /**
   * @brif    作品追加
   * @access  public
   * @return
   */
  public function action_add() {
    $this->template->subtitle = '追加';
    $this->template->content = View::forge('product/add');
    
    // フォーム設定
    $product_form = Fieldset::forge('product_edit');
    $product_form->add_model('Model_Product');
    $product_form->add('other','その他画像',array(
      'type'=>'other',
      'value'=>'<iframe src="/assets/js/plugin/kcfinder/browse.php?type=images&CKEditor=inputIntro&CKEditorFuncNum=1&langCode=en" width="99%" height="250px"></iframe>')
    );
    $product_form->add(Config::get('security.csrf_token_key'),'',array('type'=>'hidden', 'value'=>Security::fetch_token()));
    $product_form->add('submit', '', array('type'=>'submit','class'=>'btn btn-danger','value'=>'投稿'));
    $product_form->field('submit')->add_rule('skip',true);
    $product_form->repopulate();
    $this->product_form = $product_form;
    
    // 初期表示時
    if (!Security::check_token()){
      return ;
    }
    
    // バリデーション
    $user_id    = Auth::get('id');
    $validation = $product_form->validation();
    if (!$validation->run()) {
      // エラーの設定
      $this->template->content->errmsg = '入力エラーがあります';
      return ;
    }
    $valid_data = $validation->validated();
    $product_data = array(
      'title'      => $valid_data['title'],
      'skill'      => $valid_data['skill'],
      'outline'    => $valid_data['outline'],
      'detail'     => $valid_data['detail'],
      'user_id'    => $user_id,
      'created_at' => time(),
    );
    
    // データの追加
    if (!$insert_id = Model_Product::insert($product_data)) {
      $this->template->content->errmsg = '追加時にエラーが発生しました';
      return ;
    }
    
    // パスを設定
    $product_path = Config::get('USER_IMG_DIR') . $user_id . '/product/' . $insert_id;
    
    // フォルダ確認
    if (!file_exists(Config::get('USER_IMG_DIR') . $user_id) && !file_exists($product_path)) {
      // フォルダ作成
      $structure = $product_path . '/other';
      mkdir($structure, 0755, true);
    }
    
    // アップロード
    $temp_file  = Input::file('thumbnail');
    $product_model = Model_Product::find_by_pk($insert_id);
    if ($temp_file['size'] !== 0) {
    	$config = array(
    		'path' => $product_path,
    		'auto_rename' => true,
    		'ext_whitelist' => Config::get('FILE.EXT'),
    	);
    	Upload::process($config);
    	if (!Upload::is_valid()) {
    		Session::set_flash('errmsg', "ファイルアップロードに失敗しました");
    		return Response::redirect('product/edit?id='.$insert_id);
    	}
    	Upload::save();
    	if($file = Upload::get_files(0)){
    		$product_model->set(array(
    			'thumbnail'   => $user_id. '/product/' . $insert_id . '/' .$file['saved_as'],
    		));
    		$product_model->save();
    	}
    	return Response::redirect('admin/product');
    }
    
    Response::redirect('admin/product');
  }

  /**
   * @brif    作品編集
   * @access  public
   * @return
   */
  public function action_edit() {
    // 他ユーザーの作品は開かせない
    $user_id = Auth::get('id');
    if (!$id = Input::get('id', null)) {
      Response::redirect('admin/product');
    }
    $product = Model_Product::find($id);
    if ($product['user_id'] != $user_id) {
      Response::redirect('admin/product');
    }
    
    $this->template->subtitle = '編集';
    $this->template->content = View::forge('product/edit');
    
    // フォーム設定
    $product_form = Fieldset::forge('product_edit');
    $product_form->add_model('Model_Product',$product);
    $product_form->add('other','その他画像',array(
      'type'=>'other',
      'value'=>'<iframe src="/assets/js/plugin/kcfinder/browse.php?type=images&CKEditor=inputIntro&CKEditorFuncNum=1&langCode=en" width="99%" height="250px"></iframe>')
    );
    $product_form->add(Config::get('security.csrf_token_key'),'',array('type'=>'hidden', 'value'=>Security::fetch_token()));
    $product_form->add('submit', '', array('type'=>'submit','class'=>'btn btn-danger','value'=>'更新'));
    $this->product_form = $product_form;
    
    // 初期表示時
    if (!Security::check_token()){
      return ;
    }
    
    // バリデーション
    $user_id    = Auth::get('id');
    $validation = $product_form->validation();
    if (!$validation->run()) {
      // エラーの設定
      $this->template->content->errmsg = '入力エラーがあります';
      return ;
    }
  }
}

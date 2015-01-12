<?php

/**
 * @brif    認証関連ファイル
 * @author  Sakamoto
 * @date    2014/09/13
 */

/**
 * @brif    認証用
 * @package app
 * @extends Controller_Template
 */
class Controller_Auth extends Controller_Template {

  // テンプレートファイルを設定
  public $template = 'template_auth';

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
    // 決まり文句
    parent::before();
  }

  /**
   * @brif     後処理
   * @detail   $response をパラメータとして追加し、after() を Controller_Template 互換にする
   * @access  public
   * @return   Response
   */
  public function after($response) {
    // 決まり文句
    $response = parent::after($response);

    return $response;
  }

  /**
   * @brif    お知らせ一覧を表示
   * @access  public
   * @return
   */
  public function action_login() {
    $this->template->content = View::forge('auth/login');

    // 初期表示時
    if (!Security::check_token()) {
      return ;
    }

    // バリデーション
    $validation = Model_User::loginValidate();
    $errors = $validation->error();
    if (!empty($errors)) {
      // エラーの設定
      $errmsg = $validation->show_errors();
      $this->template->content->set_safe('errmsg', $errmsg);
      return ;
    }

    // ログイン処理
    $auth = Auth::instance();
    $user_data = $validation->validated();
    if (!$auth->login($user_data['username'], $user_data['password'])) {
      // エラー処理
      $errmsg = "ログインに失敗しました。";
      $this->template->content->set_safe('errmsg', $errmsg);
      return ;
    }

    // ログイン成功
    Response::redirect('/');
  }

  /**
   * @brif    お知らせ一覧を表示
   * @access  public
   * @return
   */
  public function action_register() {
    // ログインしていない状態は受け付けない
    if (!Auth::check()) {
      return Response::redirect('auth/login');
    }

    $this->template->content = View::forge('auth/register');

    // 初期表示時
    if (!Security::check_token()) {
      return ;
    }

    // バリデーション
    $validation = Model_User::passwordValidate();
    $errors = $validation->error();
    if (!empty($errors)) {
      // エラーの設定
      $errmsg = $validation->show_errors();
      $this->template->content->set_safe('errmsg', $errmsg);
      return ;
    }

    // パスワード設定
    $passwords = $validation->validated();
    if ($passwords['password1'] !== $passwords['password2']) {
      // エラーの設定
      $this->template->content->set_safe('errmsg','パスワードが一致しません');
      return ;
    }

    $new_password = Auth::reset_password(Auth::get('username'));

    if (!Auth::change_password($new_password,$passwords['password1'])) {
      // エラーの設定
      $this->template->content->set_safe('errmsg','パスワード設定中にエラーが発生しました');
      return ;
    }

    Controller_Auth::update_user(array('password_change'=>true));
    
    //インスタンス生成
    $developer_model = Model_Developer::forge();
    
    //値設定
    $data = array(
      'user_id' => Auth::get('id'),
    );
    //Developer登録
    foreach($developer_model as $val)
    {
      $val->set($data)->save();
    }
    
    Response::redirect('/');
  }

  public function action_oauth($provider = null) {
    // bail out if we don't have an OAuth provider to call
    if ($provider === null)
    {
        // \Messages::error(__('login-no-provider-specified'));
        \Response::redirect_back();
    }
    // load Opauth, it will load the provider strategy and redirect to the provider
    \Auth_Opauth::forge();
  }

  public function action_callback(){
    // Opauth can throw all kinds of nasty bits, so be prepared
    try
    {
      // get the Opauth object
      $opauth = \Auth_Opauth::forge(false);

      // and process the callback
      $status = $opauth->login_or_register();

      // fetch the provider name from the opauth response so we can display a message
      $provider = $opauth->get('auth.provider', '?');

      // deal with the result of the callback process
      switch ($status)
      {
        // a local user was logged-in, the provider has been linked to this user
        case 'linked':
        case 'logged_in':
        case 'registered':
          if (Auth::get('password_change')) {
            $url = '/';
          } else {
            $url = 'auth/register';
          }
        break;

        default:
          throw new \FuelException('Auth_Opauth::login_or_register() has come up with a result that we dont know how to handle.');
      }

      // redirect to the url set
      \Response::redirect($url);
    }

    // deal with Opauth exceptions
    catch (\OpauthException $e)
    {
      // \Messages::error($e->getMessage());
      \Response::redirect_back();
    }

    // catch a user cancelling the authentication attempt (some providers allow that)
    catch (\OpauthCancelException $e)
    {
      // you should probably do something a bit more clean here...
      exit('It looks like you canceled your authorisation.'.\Html::anchor('users/oauth/'.$provider, 'Click here').' to try again.');
    }
  }

  public function action_logout(){
    Auth::logout();
    Response::redirect('/');
  }

  public function action_error(){
    $this->template->content = View::forge('auth/error');
  }
  
  public function update_user($values, $username = null)
	{
		$username = $username ?: $this->user['username'];
		$current_values = \DB::select_array(\Config::get('simpleauth.table_columns', array('*')))
			->where('username', '=', $username)
			->from(\Config::get('simpleauth.table_name'))
			->execute(\Config::get('simpleauth.db_connection'));

		if (empty($current_values))
		{
			throw new \SimpleUserUpdateException('Username not found', 4);
		}

		$update = array();
		if (array_key_exists('username', $values))
		{
			throw new \SimpleUserUpdateException('Username cannot be changed.', 5);
		}
		if (array_key_exists('password', $values))
		{
			if (empty($values['old_password'])
				or $current_values->get('password') != $this->hash_password(trim($values['old_password'])))
			{
				throw new \SimpleUserWrongPassword('Old password is invalid');
			}

			$password = trim(strval($values['password']));
			if ($password === '')
			{
				throw new \SimpleUserUpdateException('Password can\'t be empty.', 6);
			}
			$update['password'] = $this->hash_password($password);
			unset($values['password']);
		}
		if (array_key_exists('old_password', $values))
		{
			unset($values['old_password']);
		}
		if (array_key_exists('email', $values))
		{
			$email = filter_var(trim($values['email']), FILTER_VALIDATE_EMAIL);
			if ( ! $email)
			{
				throw new \SimpleUserUpdateException('Email address is not valid', 7);
			}
			$matches = \DB::select()
				->where('email', '=', $email)
				->where('id', '!=', $current_values[0]['id'])
				->from(\Config::get('simpleauth.table_name'))
				->execute(\Config::get('simpleauth.db_connection'));
			if (count($matches))
			{
				throw new \SimpleUserUpdateException('Email address is already in use', 11);
			}
			$update['email'] = $email;
			unset($values['email']);
		}
		if (array_key_exists('group', $values))
		{
			if (is_numeric($values['group']))
			{
				$update['group'] = (int) $values['group'];
			}
			unset($values['group']);
		}
		if (array_key_exists('nickname', $values))
		{
			if (is_numeric($values['nickname']))
			{
				$update['nickname'] = (int) $values['nickname'];
			}
			unset($values['nickname']);
		}
		if ( ! empty($values))
		{
			$profile_fields['password_change'] = $current_values->get('password_change') ?: array();
			foreach ($values as $key => $val)
			{
				if ($val === null)
				{
					unset($profile_fields[$key]);
				}
				else
				{
					$profile_fields[$key] = $val;
				}
			}
			$update['password_change'] = $profile_fields['password_change'];
		}

		$update['updated_at'] = \Date::forge()->get_timestamp();

		$affected_rows = \DB::update(\Config::get('simpleauth.table_name'))
			->set($update)
			->where('username', '=', $username)
			->execute(\Config::get('simpleauth.db_connection'));

		// Refresh user
		if ($this->user['username'] == $username)
		{
			$this->user = \DB::select_array(\Config::get('simpleauth.table_columns', array('*')))
				->where('username', '=', $username)
				->from(\Config::get('simpleauth.table_name'))
				->execute(\Config::get('simpleauth.db_connection'))->current();
		}

		return $affected_rows > 0;
	}
}
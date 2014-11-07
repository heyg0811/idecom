<?php
/**
 * @brif      Core\Auth\Opauth拡張ファイル
 * @author    Sakamoto
 * @date      2014/11/07
 */

/**
 * @brif      Core\Auth\Opauth拡張
 * @package   app
 * @extends   Fuel\Core\Auth\Opauth
 */
class Auth_Opauth extends Auth\Auth_Opauth
{
  /**
   * New Opauth login. If we know this user, we can perform a login, if
   * not, we need to register the user first
   */
  public function login_or_register()
  {
    // process the callback data
    $this->callback();

    $email = explode('@',$this->get('auth.info.email'));
    if ($email[count($email)-1] !== 'oic.jp') {
      // redirect to the url set
      \Response::redirect('auth/error');
    }

    // if there is no UID we don't know who this is
    if ($this->get('auth.uid', null) === null)
    {
      throw new \OpauthException('No uid in response from the provider, so we have no idea who you are.');
    }

    // we have a UID and logged in? Just attach this authentication to a user
    if (\Auth::check())
    {
      list(, $user_id) = \Auth::instance()->get_user_id();

      $result = \DB::select(\DB::expr('COUNT(*) as count'))->from($this->config['table'])->where('parent_id', '=', $user_id)->execute(static::$db_connection);
      $num_linked = ($result and $result = $result->current()) ? $result['count'] : 0;

      // allowed multiple providers, or not authed yet?
      if ($num_linked === 0 or \Config::get('opauth.link_multiple_providers') === true)
      {
        // attach this account to the logged in user
        $this->link_provider(array(
          'parent_id'   => $user_id,
          'provider'    => $this->get('auth.provider'),
          'uid'       => $this->get('auth.uid'),
          'access_token'  => $this->get('auth.credentials.token', null),
          'secret'    => $this->get('auth.credentials.secret', null),
          'expires'     => $this->get('auth.credentials.expires', null),
          'refresh_token' => $this->get('auth.credentials.refresh_token', null),
          'created_at'  => time(),
        ));

        // attachment went ok so we'll redirect
        return 'linked';
      }

      else
      {
        $result = \DB::select()->from($this->config['table'])->where('parent_id', '=', $user_id)->limit(1)->as_object()->execute(static::$db_connection);
        $auth = $result ? $result->current() : null;
        throw new \OpauthException(sprintf('This user is already linked to "%s" and can\'t be linked to another provider.', $auth->provider));
      }
    }

    // the user exists, so send him on his merry way as a user
    elseif ($authentication = \DB::select()->from($this->config['table'])->where('uid', '=', $this->get('auth.uid'))->where('provider', '=', $this->get('auth.provider'))->as_object()->execute(static::$db_connection) and $authentication->count())
    {
      // force a login with this username
      $authentication = $authentication->current();
      if (\Auth::instance()->force_login((int) $authentication->parent_id))
      {
          // credentials ok, go right in
          return 'logged_in';
      }

      throw new \OpauthException('This user could not be logged in.');
    }

    // not an existing user of any type, so we need to create a user somehow
    else
    {
      // generate a dummy password if we don't have one, and want auto registration for this user
      if ($this->config['auto_registration'])
      {
        $this->get('auth.info.password') or $this->response['auth']['info']['password'] = \Str::random('sha1');
      }

      // did the provider return enough information to log the user in?
      if (($this->get('auth.info.nickname') or $this->get('auth.info.email')) and $this->get('auth.info.password'))
      {
        // make sure we have a nickname, if not, use the email address
        if (empty($this->response['auth']['info']['nickname']))
        {
          // 変更
          $userid = explode('@',$this->response['auth']['info']['email']);
          $this->response['auth']['info']['nickname'] = $userid[0];
        }

        // make a user with what we have
        $user_id = $this->create_user($this->response['auth']['info']);

        // attach this authentication to the new user
        $insert_id = $this->link_provider(array(
          'parent_id'   => $user_id,
          'provider'    => $this->get('auth.provider'),
          'uid'       => $this->get('auth.uid'),
          'access_token'  => $this->get('auth.credentials.token', null),
          'secret'    => $this->get('auth.credentials.secret', null),
          'expires'     => $this->get('auth.credentials.expires', null),
          'refresh_token' => $this->get('auth.credentials.refresh_token', null),
          'created_at'  => time(),
        ));

        // force a login with this users id
        if ($insert_id and \Auth::instance()->force_login((int) $user_id))
        {
            // credentials ok, go right in
            return 'registered';
        }

        throw new \OpauthException('We tried automatically creating a user but that just really did not work. Not sure why...');
      }

      // they aren't a user and cant be automatically registerd, so redirect to registration page
      else
      {
        \Session::set('auth-strategy', array(
          'user' => $this->get('auth.info'),
          'authentication' => array(
            'provider'    => $this->get('auth.provider'),
            'uid'       => $this->get('auth.uid'),
            'access_token'  => $this->get('auth.credentials.token', null),
            'secret'    => $this->get('auth.credentials.secret', null),
            'expires'     => $this->get('auth.credentials.expires', null),
            'refresh_token' => $this->get('auth.credentials.refresh_token', null),
          ),
        ));

        return 'register';
      }
    }
  }

  /**
   * use Auth to create a new user, in case we've received enough information to do so
   *
   * @param  array  array with the raw Opauth response user fields
   *
   * @return  mixed  id of the user record created, or false if the create failed
   */
  protected function create_user(array $user)
  {
    $user_id = \Auth::create_user(

      // username
      isset($user['nickname']) ? $user['nickname'] : null,

      // password (random string will do if none provided)
      isset($user['password']) ? $user['password'] : \Str::random(),

      // email address
      isset($user['email']) ? $user['email'] : null,

      // which group are they in?
      \Config::get('opauth.default_group', -1),

      // extra information
      array(
        // got their name? full name? or first and last to make up a full name?
        'fullname' => isset($user['name']) ? $user['name'] : (
          isset($user['full_name']) ? $user['full_name'] : (
            isset($user['first_name'], $user['last_name']) ? $user['first_name'].' '.$user['last_name'] : null
          )
        ),
        'password_change' => false,
      )
    );

    return $user_id ?: false;
  }
}
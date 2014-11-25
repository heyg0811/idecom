<?php
/**
 * @brif      Core\Controller\拡張ファイル
 * @author    Sakamoto
 * @date      2014/11/07
 */

/**
 * @brif      Core\Validation拡張
 * @package   app
 * @extends   Fuel\Core\Validation
 */
abstract class Controller_Template extends Fuel\Core\Controller_Template
{

  /**
   * Load the template and create the $this->template object
   */
  public function before()
  {
    if ( ! empty($this->template) and is_string($this->template))
    {
      // Load the template
      $this->template = \View::forge($this->template);
    }
    $segment = Uri::segment(1);
    if ( $segment !== 'auth' && !Auth::check()) {
      Response::redirect('auth/login');
    }
    return parent::before();
  }

}
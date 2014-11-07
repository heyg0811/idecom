<?php
/**
 * @brif      Core\Validation拡張ファイル
 * @author    Sakamoto
 * @date      2014/10/07
 */

/**
 * @brif      Core\Validation拡張
 * @package   app
 * @extends   Fuel\Core\Validation
 */
class Validation extends Fuel\Core\Validation
{
  /**
   * Show errors
   *
   * Returns all errors in a list or with set markup from $options param
   *
   * @param   array  uses keys open_list, close_list, open_error, close_error & no_errors
   * @return  string
   */
  public function show_errors($options = array())
  {
    $default = array(
      'open_list'    => \Config::get('validation.open_list', ''),
      'close_list'   => \Config::get('validation.close_list', ''),
      'open_error'   => \Config::get('validation.open_error', ''),
      'close_error'  => \Config::get('validation.close_error', '<br>'),
      'no_errors'    => \Config::get('validation.no_errors', '')
    );
    $options = array_merge($default, $options);

    if (empty($this->errors))
    {
      return $options['no_errors'];
    }

    $output = $options['open_list'];
    foreach($this->errors as $e)
    {
      $output .= $options['open_error'].$e->get_message().$options['close_error'];
    }
    $output .= $options['close_list'];

    return $output;
  }
}

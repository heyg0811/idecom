<?php
/**
 * @brif      Core\Uri拡張ファイル
 * @author    Sakamoto
 * @date      2014/01/13
 */

/**
 * @brif      Core\Uri拡張
 * @package   app
 * @extends   Fuel\Core\Uri
 */
class Uri extends Fuel\Core\Uri
{
  /**
   * @brif   現在のUriがアクティブか
   * @access public
   * @return 
   */
  public static function active($controller=null, $params=array())
  {
    if (static::segment(1) !== $controller) {
      return '';
    }
    if (!empty($params)){
      foreach ($params as $key => $param) {
        if (static::segment($key+2) !== $param) {
          return '';
        }
      }
    }
    return 'active';
  }
}

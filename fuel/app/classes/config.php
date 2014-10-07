<?php
/**
 * @brif      Core\Config拡張ファイル
 * @author    Sakamoto
 * @date      2014/10/07
 */

/**
 * @brif      Core\Config拡張
 * @package   app
 * @extends   Fuel\Core\Cofig
 */
class Config extends Fuel\Core\Config
{

/**
   * Loads a config file.
   *
   * @param    mixed    $file         string file | config array | Config_Interface instance
   * @param    mixed    $group        null for no group, true for group is filename, false for not storing in the master config
   * @param    bool     $reload       true to force a reload even if the file is already loaded
   * @param    bool     $overwrite    true for array_merge, false for \Arr::merge
   * @return   array                  the (loaded) config array
   */
  public static function load($file, $group = null, $reload = false, $overwrite = false)
  {
    // selfファイル群を設定
    $self_files = array(
      "env",
    );

    // selfファイル群かどうか
    if(in_array($file,$self_files))
    {
      // リクエストファイル_self.phpがあれは
      if (file_exists(APPPATH.'config/'.$file.'_self.php')) {
        $file = $file."_self";
      }
    }

    // 設定した変数で親のloadを呼び出す
    return parent::load($file,$group,$reload,$overwrite);
  }
}

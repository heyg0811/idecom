<?php

/**
 * @brif    自作関数ファイル
 * @author  Sakamoto
 * @date    2014/12/29
 */

/**
 * @brif    自作関数用
 * @package app
 * @extends Controller
 */
class MyUtil {

  /**
   * @brif    アラートをセット
   * @access  public
   * @return
   */
	public static function set_alert($type,$title,$body=null)
	{
    $alert = array(
      'title' => $title,
      'type'  => $type,
    );
    if (!empty($body)) {
      $alert['body'] = $body;
    }
    if ($type == 'success') {
      Session::delete_flash();
      Session::delete('project.type');
      Session::delete('project.product');
      Session::delete('project.recruit');
    }
	  Session::set_flash('alert',$alert);
	}
	
	public static function get_device(){
    //ユーザーエージェント取得
		$ua = $_SERVER['HTTP_USER_AGENT'];

		if(strpos($ua,'iPhone') !== false || strpos($ua,'iPad') !== false){
      //iPhone
			$ua = 'iOS';
		}
		elseif(strpos($ua,'Android') !== false || (strpos($ua, 'Mobile') !== false)){
      //Android
			$ua = 'Android';
		}
		else{
			$ua = 'PC';
		}

		return $ua;
	}
	
	public static function parse_uri($url, &$id, &$path) {
	  $id   = str_replace('id=','',parse_url($url, PHP_URL_QUERY));
	  $path = parse_url($url, PHP_URL_PATH) . '?id=' .$id;
	}
	
	public static function is_active($val,$set_val){
		if ($val == $set_val) {
			return 'active';
		}
		return '';
	}
}
<?php

/**
 * @brif    AjaxのNice用
 * @author  Sakamoto
 * @date    2014/01/10
 */

/**
 * @brif    Ajaxのイイね用
 * @package app
 * @extends Controller_Rest
 */
class Controller_Ajax_Nice extends Controller_Rest {

  public static function post_add(){
    MyUtil::parse_uri(Input::referrer(),$id,$path);
    Model_Nice::insert(array(
      'user_id' => Auth::get('id'),
      'path' => $path,
    ));
    if (strpos($path,'product') !== false) {
      Model_Product::addNice($id);
    } elseif (strpos($path, 'recruit') !== false) {
      Model_Recruit::addNice($id);
    }
  }
  
  public static function post_remove(){
    MyUtil::parse_uri(Input::referrer(),$id,$path);
    DB::delete('nice')->where('user_id',Auth::get('id'))->where('path',$path)->execute();
    if (strpos($path,'product') !== false) {
      Model_Product::rmNice($id);
    } elseif (strpos($path, 'recruit') !== false) {
      Model_Recruit::rmNice($id);
    }
  }
}

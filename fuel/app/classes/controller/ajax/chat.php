<?php

/**
 * @brif    AjaxのMessage用
 * @author  Sakamoto
 * @date    2014/11/14
 */

/**
 * @brif    AjaxのMessage用
 * @package app
 * @extends Controller_Template
 */
class Controller_Ajax_Chat extends Controller_Rest {

  /**
   * @brif    チャットの投稿
   * @access  public
   * @return
   */
  public function post_transmit() {
    $body = Input::post('body', null);
    // ボディの空チェック
    if (empty($body)){
      header('HTTP', true, 500);
      echo json_encode(false);
    }
    $request_path  = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
    if (!$group_id = Input::post('group_id')) {
      $group_id = Input::post('group_id');
    }
    $newest_id     = Input::post('newest_id', null);
    Model_Groupchatcomment::insert($group_id,Input::post('body', null));
    $message_diffs = Model_Groupchatcomment::getDiff($group_id, $newest_id);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($message_diffs);
  }

  /**
   * @brif    チャットの更新
   * @access  public
   * @return
   */
  public function post_refresh() {
    $request_path  = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
    $group_id      = Input::post('group_id');
    $newest_id     = Input::post('newest_id', null);
    $message_diffs = Model_Message::getDiff($group_id, $newest_id);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($message_diffs);
  }
}

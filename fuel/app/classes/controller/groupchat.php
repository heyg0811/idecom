<?php

/**
 * @brif    グループチャットページ関連ファイル
 * @author  Ouchi
 * @date    2015/01/12
 */

/**
 * @brif    グループチャットページ用
 * @package app
 * @extends Controller_Template
 */
class Controller_Groupchat extends Controller_Template {

  /**
   * @brif   前処理
   * @access public
   * @return
   */
  public function before() {
    // 決まり文句
    parent::before();

    $this->template->title = 'チャット';
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
  
  public function action_chatroom(){
    $this->template->subtitle = 'チャット';
    $this->template->content = View::forge('groupchat/chat');
    $groupchat_id = Input::get("name");
    $user_id = Auth::get('id');
    
    $chat=array();
    if(!empty($groupchat_id)){
      $groupchat = Model_Groupchatcomment::find('all', array(
        'where'    => array(array('group_id','=',$groupchat_id)),
      ));
      foreach($groupchat as $val){
        $temp['id'] = $val['id'];
        $temp['group_id'] = $val['group_id'];
        $temp['user_id'] = $val['user_id'];
        $temp['text'] = $val['text'];
        $temp['date'] = $val['date'];
        $temp['thumbnail'] = Model_User::getThumbnail($val['user_id']);
        
        array_push($chat,$temp);
      }
    }
    $groupchatlist = Model_Groupchat::find('all', array(
      'where' => array(array('member', 'like', '%'.$user_id.'%'),
      'or' => array(array('host_id','=',$user_id,),
    ))));
    $this->template->content->user = $user_id;
    $this->template->content->messages = $chat;
    $this->template->content->group_id = $groupchat_id;
    $this->template->content->list = $groupchatlist;
    $this->template->content->newest_id = '2';
  }
  
  public static function get_host_id($id) {
      $data = Model_Groupchat::find('all',array('where' => array(array('id', $id))))[1];
      return $data['host_id'];
  }
  public static function get_menber($id) {
      $data = Model_Groupchat::find('all',array('where' => array(array('id', $id))))[1];
      return $data['menber'];
  }
  
  
}
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
    $groupchat_id = Input::get("num");
    $user_id = Auth::get('id');
    
    
    $chat=array();
    if(!empty($groupchat_id)){
      $groupchat = Model_Groupchatcomment::find('all', array(
        'where'    => array(array('group_id','=',$groupchat_id)),
        'order_by' => array('id'=>'desc'),
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
      $this->template->content->newest_id = empty($key = key($groupchat)) ? 0 : $key;
    }else{
      $this->template->content->newest_id = 0;
    }
    $templist = Model_Groupchat::find('all', array(
      'where' => array(array('member', '=', $user_id),
      'or' => array(array('host_id','=',$user_id,),
    ))));
    $groupchatlist = array();
    foreach($templist as $val){
      $temp['id'] = $val['id'];
      if($val['host_id']===$user_id){
        $temp['name'] = Model_User::getName($val['member']);
      }else{
        $temp['name'] = Model_User::getName($val['host_id']);
      }
      array_push($groupchatlist,$temp);
    }
    $this->template->content->user = $user_id;
    $this->template->content->messages = $chat;
    $this->template->content->group_id = $groupchat_id;
    $this->template->content->chatlist = $groupchatlist;
    
  }
  public function action_chatcreate() {
    $dev_id = Input::post('dev_id');
    $my_id  = Auth::get('id');
    $result=DB::query('select * from groupchat where (host_id = '.$my_id.' and member = '.$dev_id.') or (host_id = '.$dev_id.' and member = '.$my_id.')')->execute()->as_array();
    
    if(count($result)===1){
      //ある場合
      Response::redirect('groupchat/chatroom?num='.$result[0]['id']);
    }else{
      //ない場合
      $chat = Model_Groupchat::forge();
      //値設定
      $data = array(
        'host_id'  => $my_id,
        'member'   => $dev_id,
      );
      $chat->set($data)->save();

      Response::redirect('groupchat/chatroom?num='.$result[0]['id']);
    }
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
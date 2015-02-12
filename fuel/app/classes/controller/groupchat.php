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
    $user_id = Auth::get('id',null);
    $groupchat_id = Input::get("num",null);
    if (empty($groupchat_id)) {
      $templist = Model_GroupChat::find('first', array(
        'where' => array(
          array('host_id', '=', $user_id),
          'or' => array(array('partner_id','=',$user_id,))
        ),
      ));
      Response::redirect('groupchat/chatroom?num='.$templist['id']);
    }
    
    $groupchat = Model_GroupChatComment::find('all', array(
      'where'    => array(array('group_id','=',$groupchat_id)),
      'order_by' => array('id'=>'desc'),
    ));
    $templist = Model_GroupChat::find('all', array(
      'where' => array(
        array('host_id', '=', $user_id),
        'or' => array(array('partner_id','=',$user_id,))
      ),
    ));
    $groupchatlist = array();
    foreach($templist as $val){
      $temp['id'] = $val['id'];
      if($val['host_id']===$user_id){
        $temp['name'] = Model_User::getName($val['partner_id']);
        $temp['user_id'] = $val['host_id'];
      }else{
        $temp['name'] = Model_User::getName($val['host_id']);
        $temp['user_id'] = $val['partner_id'];
      }
      array_push($groupchatlist,$temp);
    }
    $this->template->content->newest_id = key($groupchat);
    $this->template->content->messages  = $groupchat;
    $this->template->content->chatlist  = $groupchatlist;
    
  }
  public function action_chatcreate() {
    $partner_id = Input::get('id');
    $host_id  = Auth::get('id');
    if ($partner_id == $host_id) {
      MyUtil::set_alert('danger','自身とはプライベートチャットを作成できません');
      Response::redirect(Input::referrer());
    }
    
    if($chat = Model_GroupChat::check($host_id,$partner_id)
    and $chat->count()){
      //ある場合
      $chat = $chat->current();
      Response::redirect('groupchat/chatroom?num='.$chat->id);
    }else{
      //ない場合
      $data = array(
        'host_id'  => $host_id,
        'partner_id'   => $partner_id,
      );
      $insert_id = Model_GroupChat::insert($data);

      Response::redirect('groupchat/chatroom?num='.$insert_id);
    }
  }
  
  public static function get_host_id($id) {
      $data = Model_GroupChat::find('all',array('where' => array(array('id', $id))));
      return $data[1]['host_id'];
  }
  public static function get_menber($id) {
      $data = Model_GroupChat::find('all',array('where' => array(array('id', $id))));
      return $data[1]['menber'];
  }
  
  
  
  
}
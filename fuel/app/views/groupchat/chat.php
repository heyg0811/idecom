
<div class="row">
  <div class="col-xs-3">
    <div class="box box-success">
        <div class="box-header">
          <i class="fa fa-comments-o"></i>
          <h3 class="box-title">List</h3>
        </div>
        <div class="box-body " id="">
          <div class="item" style="margin-bottom: 20px;">
            <?php foreach($chatlist as $val):?>
              <div class="row">
                <div class="col-xs-12">
                  <?php echo Html::anchor('/groupchat/chatroom?num='.$val['id'], $val["name"]);?>
                </div>
              </div>
            <?php endforeach?>
          </div>
        </div>
        <div class="box-footer">
          
        </div>
      </div>
  </div>
  <div class="col-xs-9">
    <section class="col-lg-12 connectedSortable">
      <!-- Chat box -->
      <div class="box box-success">
        <div class="box-header">
          <i class="fa fa-comments-o"></i>
          <h3 class="box-title">Chat</h3>
          <div class="box-tools pull-right">
            <button id="message_refresh" type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          </div>
        </div>
        <div class="box-body chat" id="chat-box">
          <?php foreach ($messages as $message): ?>
            <!-- chat item -->
            <div class="item" style="margin-bottom: 20px;">
              <img src="<?php  echo $message['thumbnail']?>" class='online'>
              <p class="message">
                <a href="/author/detail?id=<?php echo $message['user_id']?>" class="name">
                  <small class="text-muted pull-right">
                    <i class="fa fa-clock-o"></i> <?php echo date('Y-m-d H:i:s',$message['date']);?>
                  </small>
                  <?php echo Model_User::getName($message['user_id']); ?>
                </a>
                <?php echo $message['text']; ?>
              </p>
            </div><!-- /.item -->
          <?php endforeach?>
        </div><!-- /.chat -->
        <div class="box-footer">
          <form id="message_form">
            <div class="input-group">
              <input id="message_body" class="form-control" placeholder="Type message..."/>
              <div class="input-group-btn">
                <button class="btn btn-success"><i class="fa fa-plus"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.box (chat box) -->
    </section><!-- right col -->
  </div>
</div><!-- /.row (main row) -->




<script type="text/javascript">
  $(function(){
    var newest_id = <?php echo $newest_id;?>;
    // メッセージ投稿
    $('#message_form').on('click',function(){
      // HTMLでの送信をキャンセル
      event.preventDefault();
      // 未入力時
      if ($('#message_body').val() == '') {
        return ;
      }
      $.ajax({
        url: '/ajax/chat/transmit',
        type: 'POST',
        data: {
          "body":$('#message_body').val(),
          "newest_id":newest_id,
          "group_id":<?php echo $group_id;?>
        },
      }).done(function(message_diffs){
        prependChatItem(message_diffs);
        $('#message_body').val('');
      }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        alert('投稿時にエラーが発生しました');
      });
    });
    $('#message_refresh').on('click',function(){
      $.ajax({
        url: '/ajax/chat/refresh',
        type: 'POST',
        data: {
            "newest_id":newest_id,
            "group_id":<?php echo $group_id;?>
        },
      }).done(function(message_diffs){
        prependChatItem(message_diffs);
      }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        alert('更新時にエラーが発生しました');
      });
    });
    function prependChatItem(messages){
      
      for (var i=0;i<messages.length;i++){
        var chat_item = '<div class="item"><img src="<?php ;?>' + messages[i]['thumbnail'] + '" alt="user image" class="online" /><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '+ messages[i]['date'] + '</small>' + messages[i]['user_name'] +'</a>' + messages[i]['body'] + '</p></div>';
        $('#chat-box').prepend(chat_item);
        newest_id = messages[i]['id'];
      }
    }
  });
</script>
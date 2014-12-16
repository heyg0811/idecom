
<div class="col-xs-12 col-sm-4 col-md-4" id="user-box">
  <div class="box box-solid bg-green-gradient">
    <div class="box-header">
      <h3 class="box-title "><?php echo $developer['nickname']; ?></h3>
    </div>
    <div class="box-body">
      <img src="<?php echo $developer['thumbnail']; ?>" class="author-thumbnail">
      <div>
        <hr>
        <div class="row">
          <div class="col-xs-4 author-grade">学年</div><div class="col-xs-8 author-grade responsib"><?php echo $developer['grade']; ?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-4 author-grade">専攻</div><div class="col-xs-8 author-grade"><?php echo $developer['major']; ?></div>
        </div>
        <hr>
      </div>
    </div>
    <div class="box-footer no-border text-black">
      <h3 class="box-title text-center">技術</h3>
      <div class="row">
        <div class="col-sm-12">
          <?php $i = 0; ?>
          <?php if(!empty($developer['skill'])):?>
          <?php foreach ($developer['skill'] as $tec): ?>
            <?php if (!empty($tec)): ?>
              <div class="clearfix">
                <span class="pull-left"><p><?php echo Config::get('TECHNOLOGY.' . $i); ?></p></span>
                <small class="pull-right"><?php echo $tec; ?>%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: <?php echo $tec; ?>%;"></div>
              </div>
            <?php endif; ?>
            <?php $i++; ?>
          <?php endforeach; ?>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-8 col-md-8">
  <div class="box box-success">
    <div class="author-timeline">
      <div class="box-header">
        <i class="fa fa-envelope"></i>
        <h3 class="box-title">TimeLine</h3>
      </div>
      <div id="timeline-box">
        <ul class="timeline" >
          <?php foreach ($timeline as $value): ?>
            <li>
              <i class="fa <?php echo $value['icon']; ?>"></i>
              <div class="timeline-item box box-solid timeline-body collapsed-box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $value['title']; ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                  <span class="time pull-right"><i class="fa fa-clock-o"></i><?php echo $value['date']; ?></span>
                </div>
                <div class="box-body" style="display: none">
                  <?php echo $value['text']; ?>
    
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul> 
      </div>
    </div>
  </div>
  <hr>
  <div class="box box-success" id="message-box">
    <!-- Chat box -->
    <div class="box box-success">
      <div class="box-header">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Chat</h3>
        <div class="box-tools pull-right">
          <button id="message_refresh" type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <div class="chat" id="chat-box">
        <?php foreach ($messages as $message): ?>
          <!-- chat item -->
          <div class="item">
            <img src='<?php echo $message['thumbnail'];?>' class='online'>
            <p class="message">
              <a href="/author/detail?id=<?php echo $message['user_id'];?>" class="name">
                <small class="text-muted pull-right">
                  <i class="fa fa-clock-o"></i> <?php echo date('Y-m-d H:i:s',$message['created_at']);?>
                </small>
                <?php echo Model_User::getName($message['user_id']); ?>
              </a>
              <?php echo $message['body']; ?>
            </p>
          </div><!-- /.item -->
        <?php endforeach; ?>
      </div><!-- /.chat -->
      <div class="box-footer">
        <form id="message_form">
          <input type="hidden" name="id" value="<?php echo $developer["user_id"];?>">
          <div class="input-group">
            <input id="message_body" class="form-control" placeholder="Type message..."/>
            <div class="input-group-btn">
              <button class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.box (chat box) -->
  </div>
</div>

<script type="text/javascript">
  $(window).load(function () {
    Height = ($('#user-box').height()/2)-61;
    $('div#timeline-box').css('height',Height+'px');
  });

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
        url: '/ajax/message/transmit',
        type: 'POST',
        data: {
          "body":$('#message_body').val(),
          "newest_id":newest_id,
          "host_id":<?php echo $developer["user_id"];?>
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
        url: '/ajax/message/refresh',
        type: 'POST',
        data: {"newest_id":newest_id},
      }).done(function(message_diffs){
        prependChatItem(message_diffs);
      }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        alert('更新時にエラーが発生しました');
      });
    });
    function prependChatItem(messages){
      
      for (var i=0;i<messages.length;i++){
        var chat_item = '<div class="item"><img src="<?php //echo Config::get("THUMBNAIL_URL");?>' + messages[i]['thumbnail'] + '" alt="user image" class="online" /><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '+ messages[i]['date'] + '</small>' + messages[i]['user_name'] +'</a>' + messages[i]['body'] + '</p></div>';
        $('#chat-box').prepend(chat_item);
        newest_id = messages[i]['id'];
      }
    }
  });
</script>

<style>
  /* 応急処置 */
  @media screen and (max-width: 575px){
	  .content{
	    width: 100%;
	  }
  }
</style>
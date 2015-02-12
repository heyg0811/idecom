<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-sm-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>
          <?php echo Model_Product::showCount(); ?>
        </h3>
        <p>
          作品閲覧数
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-ios7-speedometer-outline"></i>
      </div>
      <a href="/admin/view" class="small-box-footer">
        詳細 <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div><!-- ./col -->
  <div class="col-sm-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>
         <?php echo Model_Recruitjoin::countByUserId(); ?>
        </h3>
        <p>
          応募数
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-connection-bars"></i>
      </div>
      <a href="/admin/subscription" class="small-box-footer">
        詳細 <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div><!-- ./col -->
</div><!-- /.row -->

<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-12 connectedSortable">


    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
      <!-- Tabs within a box -->
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#projects-chart" data-toggle="tab">Projects</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Access Counter</li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="projects-chart" style="position: relative; height: 300px;"></div>
      </div>
    </div><!-- /.nav-tabs-custom -->

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
          <div class="item">
            <img src='<?php echo Config::get("USER_IMG_URL").Model_User::getThumbnail($message["user_id"]); ?>' class='online'>
            <p class="message">
              <a href="/author/detail?id=<?php echo $message['user_id']?>" class="name">
                <small class="text-muted pull-right">
                  <i class="fa fa-clock-o"></i> <?php echo date('Y-m-d H:i:s',$message['created_at']);?>
                </small>
                <?php echo Model_User::getName($message['user_id']); ?>
              </a>
              <?php echo $message['body']; ?>
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
        url: '/ajax/message/transmit',
        type: 'POST',
        data: {
          "body":$('#message_body').val(),
          "newest_id":newest_id,
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
        var chat_item = '<div class="item"><img src="<?php echo Config::get("USER_IMG_URL");?>' + messages[i]['thumbnail'] + '" alt="user image" class="online" /><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '+ messages[i]['date'] + '</small>' + messages[i]['user_name'] +'</a>' + messages[i]['body'] + '</p></div>';
        $('#chat-box').prepend(chat_item);
        newest_id = messages[i]['id'];
      }
    }
    
    var area = new Morris.Area({
        element: 'projects-chart',
        resize: true,
        data: [
            {y: '2015-01', item1: 6, item2: 6},
            {y: '2014-12', item1: 8, item2: 4},
            {y: '2014-11', item1: 2, item2: 9},
            {y: '2014-10', item1: 7, item2: 7},
            {y: '2014-09', item1: 2, item2: 4},
            {y: '2014-08', item1: 10, item2: 3},
            {y: '2014-07', item1: 5, item2: 5},
            {y: '2014-06', item1: 3, item2: 7},
            {y: '2014-05', item1: 7, item2: 10},
            {y: '2014-04', item1: 8, item2: 3}
        ],
        xkey: 'y',
        ykeys: ['item1', 'item2'],
        labels: ['Item 1', 'Item 2'],
        lineColors: ['#a0d0e0', '#3c8dbc'],
        hideHover: 'auto'
    });
    //SLIMSCROLL FOR CHAT WIDGET
    $('#chat-box').slimScroll({
        height: '350px'
    });
  });
</script>
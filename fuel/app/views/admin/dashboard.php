<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>
          150
        </h3>
        <p>
          New Orders
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>
          53<sup style="font-size: 20px">%</sup>
        </h3>
        <p>
          Bounce Rate
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>
          44
        </h3>
        <p>
          User Registrations
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>
          65
        </h3>
        <p>
          Unique Visitors
        </p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div><!-- ./col -->
</div><!-- /.row -->

<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-7 connectedSortable">


    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
      <!-- Tabs within a box -->
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
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
            <img src='<?php echo Config::get("THUMBNAIL_PATH"), Auth::get("thumbnail"); ?>' class='online'>
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

    <!-- TO DO List -->
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">To Do List</h3>
        <div class="box-tools pull-right">
          <ul class="pagination pagination-sm inline">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <ul class="todo-list">
          <li>
            <!-- drag handle -->
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <!-- checkbox -->
            <input type="checkbox" value="" name=""/>
            <!-- todo text -->
            <span class="text">Design a nice theme</span>
            <!-- Emphasis label -->
            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
            <!-- General tools such as edit or delete-->
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name=""/>
            <span class="text">Make the theme responsive</span>
            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name=""/>
            <span class="text">Let theme shine like a star</span>
            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name=""/>
            <span class="text">Let theme shine like a star</span>
            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name=""/>
            <span class="text">Check your messages and notifications</span>
            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            <input type="checkbox" value="" name=""/>
            <span class="text">Let theme shine like a star</span>
            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
        </ul>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix no-border">
        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
      </div>
    </div><!-- /.box -->

    <!-- quick email widget -->
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-envelope"></i>
        <h3 class="box-title">Quick Email</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
      </div>
      <div class="box-body">
        <form action="#" method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject"/>
          </div>
          <div>
            <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
        </form>
      </div>
      <div class="box-footer clearfix">
        <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>

  </section><!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <section class="col-lg-5 connectedSortable">

    <!-- Map box -->
    <div class="box box-solid bg-light-blue-gradient">
      <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
          <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->

        <i class="fa fa-map-marker"></i>
        <h3 class="box-title">
          Visitors
        </h3>
      </div>
      <div class="box-body">
        <div id="world-map" style="height: 250px;"></div>
      </div><!-- /.box-body-->
      <div class="box-footer no-border">
        <div class="row">
          <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <div id="sparkline-1"></div>
            <div class="knob-label">Visitors</div>
          </div><!-- ./col -->
          <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <div id="sparkline-2"></div>
            <div class="knob-label">Online</div>
          </div><!-- ./col -->
          <div class="col-xs-4 text-center">
            <div id="sparkline-3"></div>
            <div class="knob-label">Exists</div>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </div>
    </div>
    <!-- /.box -->

    <!-- solid sales graph -->
    <div class="box box-solid bg-teal-gradient">
      <div class="box-header">
        <i class="fa fa-th"></i>
        <h3 class="box-title">Sales Graph</h3>
        <div class="box-tools pull-right">
          <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body border-radius-none">
        <div class="chart" id="line-chart" style="height: 250px;"></div>
      </div><!-- /.box-body -->
      <div class="box-footer no-border">
        <div class="row">
          <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
            <div class="knob-label">Mail-Orders</div>
          </div><!-- ./col -->
          <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
            <div class="knob-label">Online</div>
          </div><!-- ./col -->
          <div class="col-xs-4 text-center">
            <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
            <div class="knob-label">In-Store</div>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </div><!-- /.box-footer -->
    </div><!-- /.box -->

    <!-- Calendar -->
    <div class="box box-solid bg-green-gradient">
      <div class="box-header">
        <i class="fa fa-calendar"></i>
        <h3 class="box-title">Calendar</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <!-- button with a dropdown -->
          <div class="btn-group">
            <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li><a href="#">Add new event</a></li>
              <li><a href="#">Clear events</a></li>
              <li class="divider"></li>
              <li><a href="#">View calendar</a></li>
            </ul>
          </div>
          <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
      </div><!-- /.box-body -->
      <div class="box-footer text-black">
        <div class="row">
          <div class="col-sm-6">
            <!-- Progress bars -->
            <div class="clearfix">
              <span class="pull-left">Task #1</span>
              <small class="pull-right">90%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
            </div>

            <div class="clearfix">
              <span class="pull-left">Task #2</span>
              <small class="pull-right">70%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
            </div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="clearfix">
              <span class="pull-left">Task #3</span>
              <small class="pull-right">60%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
            </div>

            <div class="clearfix">
              <span class="pull-left">Task #4</span>
              <small class="pull-right">40%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div><!-- /.box -->

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
        var chat_item = '<div class="item"><img src="<?php echo Config::get("THUMBNAIL_PATH");?>' + messages[i]['thumbnail'] + '" alt="user image" class="online" /><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '+ messages[i]['date'] + '</small>' + messages[i]['user_name'] +'</a>' + messages[i]['body'] + '</p></div>';
        $('#chat-box').prepend(chat_item);
        newest_id = messages[i]['id'];
      }
    }
  });
</script>
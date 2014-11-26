
<div class="col-sm-4" id="user-box">
  <div class="box box-solid bg-green-gradient">
    <div class="box-header">
      <h3 class="box-title "><?php echo $developer['name']; ?></h3>
    </div>
    <div class="box-body">
      <?php echo Asset::img('noimage.jpg', array('class' => 'author-thumbnail')); ?>
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
          <?php if(!empty($developer['technology'])):?>
          <?php foreach ($developer['technology'] as $tec): ?>
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
<div class="col-sm-8">
  <div class="row author-timeline" id="right-box">
    <ul class="timeline">
      <?php foreach ($timeline as $value): ?>
        <li>
          <i class="fa <?php echo $value['icon']; ?>"></i>
          <div class="timeline-item box box-solid timeline-box collapsed-box">
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
  <hr>
  <div class="box box-success" id="message-box">
      <div class="box-header">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Chat</h3>
        <div class="box-tools pull-right">
          <button id="message_refresh" type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <div class="box-body chat" id="chat-box">
          <!-- chat item -->
          <div class="item">
            <img src='<?php echo Config::get("THUMBNAIL_PATH"), Auth::get("thumbnail"); ?>' class='online'>
            <p class="message">
              <a href="/author/detail?id=" class="name">
                <small class="text-muted pull-right">
                  <i class="fa fa-clock-o"></i> 
                </small>
              </a>
            </p>
          </div><!-- /.item -->
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
</div>

<script>
$(window).load(function () {
  Height = ($('#user-box').height()/2)-61;
  $('div#right-box').css('height',Height+'px'); 
  $('div#message-box').css('height',Height+'px'); 
});
</script>

<style>
  .author-thumbnail
  {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    width: 100%;
  }
  .timeline-box
  {
    width: 90%
  }
  .time
  {
    padding-top: 20px;
  }
  #right-box
  {
    overflow-y: scroll;
  }
</style>
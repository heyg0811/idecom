<style>
  .author-thumbnail
  {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    width: 100%;
  }
</style>
<div class="col-sm-4">
  <div class="box box-solid bg-green-gradient">
    <div class="box-header">
      <h3 class="box-title "><?php echo $developer['nickname']; ?></h3>
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
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-8">
  <div class="row author-timeline">
    <ul class="timeline">
      <!-- timeline time label -->
      <li class="time-label">
        <span class="bg-red">
          10 Feb. 2014
        </span>
      </li>
      <!-- /.timeline-label -->
      <!-- timeline item -->
      <li>
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
          <h3 class="timeline-header"><a href="#">Support Team</a> sent you and email</h3>
          <div class="timeline-body">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo...
          </div>
          <div class="timeline-footer">
          </div>
        </div>
      </li>
      <!-- END timeline item -->
      <!-- timeline item -->
      <li>
        <i class="fa fa-user bg-aqua"></i>
        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
          <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
        </div>
      </li>
      <!-- END timeline item -->
      <!-- timeline item -->
      <li>
        <i class="fa fa-comments bg-yellow"></i>
        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
          <div class="timeline-body">
            Take me to your leader!
            Switzerland is small and neutral!
            We are more like Germany, ambitious and misunderstood!
          </div>
        </div>
      </li>
      <!-- END timeline item -->
      <!-- timeline time label -->
      <li class="time-label">
        <span class="bg-green">
          3 Jan. 2014
        </span>
      </li>
      <li>
        <i class="fa fa-clock-o"></i>
      </li>
    </ul>
  </div>
</div>

<div class="author-box">
  <aside class="author col-xs-12 col-sm-12">
    <div class="author-frame">
      <div class="row">
        <div class="col-xs-12 author-grade">山田健二</div>
      </div>
    </div>
    <div class="author-frame">
      <div class="row">
        <?php echo Asset::img('noimage.jpg', array('class' => 'author-thumbnail')); ?>
      </div></div>
    <div class="author-frame">
      <div class="row">
        <div class="col-xs-4 author-grade">学年</div><div class="col-xs-8 author-grade">3A</div>
      </div>
    </div>
    <div class="author-frame">
      <div class="row">
        <div class="col-xs-4 author-grade">専攻</div><div class="col-xs-8 author-grade">ITスペシャリスト</div>
      </div>
    </div>
    <div class="author-frame">
      <div class="row">
        <div class="col-xs-12 author-grade">スキル</div>
      </div>
    </div>
    <div class="author-frame">
      <div class="row">
        <div class="col-xs-12 author-grade">
          <div class="pg_logo"><?php echo Asset::img('pg_logo/Java.svg', array('class' => 'pg_logo')); ?></div>
          <div class="progress pg_logo_ber">
            <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
              <span class="sr-only">40% Complete (success)</span>
            </div>
          </div>
        </div>
        <div class="col-xs-12 author-grade">
          <div class="pg_logo"><?php echo Asset::img('pg_logo/C_sharp.svg', array('class' => 'pg_logo')); ?></div>
          <div class="progress pg_logo_ber">
            <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
              <span class="sr-only">40% Complete (success)</span>
            </div>
          </div>
        </div>
        <div class="col-xs-12 author-grade">
          <div class="pg_logo"><?php echo Asset::img('pg_logo/PHP.svg', array('class' => 'pg_logo')); ?></div>
          <div class="progress pg_logo_ber padding-left-5">
            <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
              <span class="sr-only">40% Complete (success)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>

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
<style>
  /*                      author css                                      */
  .author-box
  {
    width: 100%;
  }
  .author
  {
    position: relative;
    top: 0;
    bottom:100%;
    width: 240px;
    background-color: #39cccc;
    color: rgba(255, 255, 255, 0.9);
    float:left;
  }
  .author-frame
  {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }
  .author-timeline
  {
    float:left;
    width: -webkit-calc(100% - 240px) ;
    padding-left: 20px;
  }
  @media screen and (max-width: 991px) {
    /* 991px以下の場合 */
    .author
    {
      padding-left: 0;
      position: relative;
      top: 0;
      bottom:100%;
      width: 100%;
      background-color: #39cccc;
      color: rgba(255, 255, 255, 0.9);
    }
    img.author-thumbnail
    {
      display: block;
      margin-left: auto;
      margin-right: auto;

    }
    .author-timeline
    {
      float:left;
      width: 100%;
      padding-top: 20px;
    }
  }

  .author-grade
  {
    text-align: center;
  }
  img.author-thumbnail {
    width: 200px;
    height: 200px;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  .pg_logo
  {
    float:left;
    width: 50px;
  }
  img.pg_logo
  {
    width: 50px;
    height: 50px;
  }
  .pg_logo_ber
  {
    margin-top: 15px;
  }
</style>
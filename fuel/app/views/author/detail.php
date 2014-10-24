
<div class="author-box">
  <aside class="author col-xs-12 col-sm-12">
    <div class="box box-solid bg-green">
      <div class="box-header">
        <h3 class="box-title ">山田健二</h3>
      </div>
        <div class="box-body">
          <?php echo Asset::img('noimage.jpg', array('class' => 'author-thumbnail')); ?>
          <div>
            <hr>
            <div class="row">
              <div class="col-xs-4 author-grade">学年</div><div class="col-xs-8 author-grade responsib">3A</div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xs-4 author-grade">専攻</div><div class="col-xs-8 author-grade">ITスペシャリスト</div>
            </div>
            <hr>
          </div>                                 
        </div><!-- /.box-body -->
        <div class="box-footer no-border text-black">
          <h3 class="box-title text-center">技術</h3>
            <div class="row">
              <div class="col-sm-12">
                <!-- Progress bars -->
                <div class="clearfix">
                  <span class="pull-left"><p>JAVA</p></span>
                  <small class="pull-right">50%</small>
                </div>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-green" style="width: 50%;"></div>
                </div>
                <div class="clearfix">
                  <span class="pull-left"><p>C#</p></span>
                  <small class="pull-right">40%</small>
                </div>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                </div>
                <div class="clearfix">
                  <span class="pull-left"><p>PHP</p></span>
                  <small class="pull-right">60%</small>
                </div>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                </div>
              </div>
            </div>
        </div><!-- /.box-footer -->
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
    color: #000;
    float:left;
    border-radius: 50px;
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
      color: #000;
    }
    img.author-thumbnail
    {
      display: block;
      margin-left: auto;
      margin-right: auto;
      max-width: 100%;
      width: 100%;
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
    max-width: 200px;
    height: auto;
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
  .progress {
    height: 15px;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f5f5f5;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
  }
</style>
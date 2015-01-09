<div class="col-md-10" id="list">
  <?php foreach ($recruits as $recruit): ?>
    <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('CATEGORY.'.$recruit['category']); ?>">
      <div class="small-box bg-red">
        <img src="<?php echo Config::get('UPLOAD_URL') . $recruit['thumbnail']; ?>" class="img-responsive">
        <div class="inner">
          <h2>
            <i class="fa fa-desktop" style="margin-right:4px;"></i>
            <?php echo $recruit['title'];?>
          </h2>
          <h4>
            <div style="margin-left:25%;">
               <?php echo '募集数：'.$recruit['subscriber'];?>
            </div>
          </h4>
        </div>
        <a href="detail?id=<?php echo $recruit['id']; ?>" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach;?>
</div>
<div class="col-md-12" id="list">
  <?php foreach ($recruits as $recruit): ?>
    <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('CATEGORY.'.$recruit['category']); ?>">
      <div class="small-box bg-red">
        <img src="<?php echo Config::get('UPLOAD_URL') . $recruit['thumbnail']; ?>" class="img-responsive">
        <div class="inner text-center">
          <h4><i class="fa fa-desktop" style="margin-right:4px;"></i> <?php echo $recruit['title']; ?></h4>
          <p><?php echo '応募数：'.(Model_Recruitjoin::countByRecruitId($recruit['id']));  ?></p>
        </div>
        <a href="joinlist?id=<?php echo $recruit['id']; ?>" class="small-box-footer">
          Join list <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach;?>
</div>
<div class="col-md-10" id="list">
  <?php foreach ($products as $product): ?>
    <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('CATEGORY.'.$product['category']); ?>">
      <div class="small-box bg-blue">
        <img src="<?php echo Config::get('UPLOAD_URL') . $product['thumbnail']; ?>" class="img-responsive">
        <div class="inner">
          <h2>
            <i class="fa fa-desktop" style="margin-right:4px;"></i>
            <?php echo $product['title'];?>
          </h2>
          <h4>
            <div style="margin-left:25%;">
               <?php echo '作品閲覧数：'.$product['count'];?>
            </div>
          </h4>
        </div>
        <a href="../product/detail?id=<?php echo $product['id']; ?>" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach;?>
</div>
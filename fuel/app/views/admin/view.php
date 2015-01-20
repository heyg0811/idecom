<div class="col-xs-12" id="list">
  <?php foreach ($products as $product): ?>
    <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('CATEGORY.'.$product['category']); ?>">
      <div class="small-box bg-blue">
        <img src="<?php echo Config::get('UPLOAD_URL') . $product['thumbnail']; ?>" class="img-responsive">
        <div class="inner">
          <h4>
            <i class="fa fa-desktop" style="margin-right:4px;"></i>
            <?php echo $product['title'];?>
          </h4>
          <div class="text-center">
             <?php echo '作品閲覧数：'.$product['count'];?>
          </div>
        </div>
        <a href="/product/edit?id=<?php echo $product['id']; ?>" class="small-box-footer">
          Edit <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach;?>
</div>
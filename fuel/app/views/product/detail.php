<div class="row" style="margin-bottom:15px;">
  <div class="col-xs-12">
    <div class="pull-right">
      <button class="btn btn-default btn-lg" id="nice"><?php echo Model_Nice::get_nice_btn();?></button>
    </div>
  </div>
</div>
<div class="col-sm-7 col-xs-12" id="product">
  <div class="row">
    <div class="small-box bg-blue">
      <img src="<?php echo Config::get('UPLOAD_URL') . $product['thumbnail']; ?>" class="img-responsive">
      <div class="inner">
        <h4><i class="fa fa-desktop" style="margin-right:4px;"></i> <?php echo $product['title']; ?></h4>
        <div class="col-xs-6 text-center">
          <h4><i class="fa fa-thumbs-o-up"></i> <?php echo $product['nice']; ?></h4>
        </div>
        <div class="col-xs-6 text-center">
          <h4><i class="fa fa-eye"></i> <?php echo $product['count']; ?></h4>
        </div>
        <p>
          <?php echo $product['detail']?>
        </p>
      </div>
      <a href="/author/detail?id=<?php echo $product['user_id']?>" class="small-box-footer">
        <h4>
          <i class="fa fa-desktop" style="margin-right:4px;"></i> <?php echo Model_User::getName($product['user_id']); ?>
        </h4>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-5 col-xs-12" id="product-etc">
  <?php foreach ($product['images'] as $image): ?>
    <div class="col-sm-4 col-xs-6">
      <div class="thumbnail">
        <img src='<?php echo $image; ?>' class='img-responsive'>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<form action="detail?id=<?php echo $product['id'];?>" method="post">
    <?php echo \Form::csrf(); ?>
    <input type="hidden" value="<?php echo $product['id'];?>" name="id">
    <div class="box-footer">
      <div class="form-group">
        <label for="">製作者へのコメント</label>
        <textarea name="comment[comment]" class="form-control" rows="5" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="投稿" class="btn btn-success btn-lg"/>
    </div>
</form>

<form action="/product/download" method="post">
  <input type="hidden" value="<?php echo $product['id'];?>" name="id">
  <input type="hidden" value="<?php echo $product['zip'].$product['zip_name'];?>" name="zip_path">
    <div class="box-footer">
      <input type="submit" value="ダウンロード" class="btn btn-success btn-lg"/>
    </div>
</form>

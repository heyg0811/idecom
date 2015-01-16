<div>
<div class="col-sm-6 col-xs-12">
  <div class="col-xs-12" id="product">
    <div class="col-xs-12">
      <div class="small-box bg-blue">
        <img src="<?php echo Config::get('UPLOAD_URL') . $product['thumbnail']; ?>" class="img-responsive">
        <div class="inner">
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
</div>
<div class="col-sm-6 col-xs-12" id="product-etc">
  <?php foreach ($product['images'] as $image): ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
      <div class="thumbnail">
        <img src='<?php echo $image; ?>' class='img-responsive'>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</div>

<form action="product" method="post">
    <?php echo \Form::csrf(); ?>
    <div class="box-footer">
      <div class="form-group">
        <label for="">製作者へのコメント</label>
        <textarea name="comment" class="form-control" rows="5" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="投稿" class="btn btn-success btn-lg"/>
    </div>
</form>
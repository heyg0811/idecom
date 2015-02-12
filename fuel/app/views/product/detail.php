<div class="row" style="margin-bottom:15px;">
  <div class="col-xs-12">
    <div class="pull-right box-tools">
      <a href="/product/download?id=<?php echo $product['id'];?>&zip_path=<?php echo $product['zip'].$product['zip_name'];?>" class="btn btn-default btn-lg">ソースコード</a>
      <button class="btn btn-default btn-lg" id="nice"><?php echo Model_Nice::get_nice_btn();?></button>
    </div>
  </div>
</div>
<div class="col-sm-7 col-xs-12" id="product">
  <div class="row">
    <div class="small-box bg-blue">
      <img src="<?php echo Config::get('UPLOAD_URL') . $product['thumbnail']; ?>" class="img-responsive" style="margin-left:auto;margin-right:auto;">
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#nice').on('click', function(event){
      $('#nice').attr('disabled', true);
      if ($('#nice').text() == ' いいね') {
        $.ajax({
        url: '/ajax/nice/add',
        type: 'POST',
        }).done(function(){
          $('#nice').html("<i class='fa fa-thumbs-o-down'></i> 取り消す");
          $('#nice').attr('disabled', false);
        }).fail(function(XMLHttpRequest, textStatus, errorThrown){
          alert('いいね中にエラーが発生しました');
          $('#nice').attr('disabled', false);
        });
      } else if ($('#nice').text() == ' 取り消す') {
        $.ajax({
        url: '/ajax/nice/remove',
        type: 'POST',
        }).done(function(){
          $('#nice').html("<i class='fa fa-thumbs-o-up'></i> いいね");
          $('#nice').attr('disabled', false);
        }).fail(function(XMLHttpRequest, textStatus, errorThrown){
          alert('取り消し中にエラーが発生しました');
          $('#nice').attr('disabled', false);
        });
      }
    });
  });
</script>

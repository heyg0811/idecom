<div class="col-xs-12">
  <a href="/product/add" class="btn btn-primary pull-right">新規登録</a>
</div>
<div class="col-xs-12" style="margin-top:15px">
  <?php foreach ($products as $product): ?>
    <div class="panel box box-primary">
      <div class="row">
        <div class="col-sm-4">
          <a href="/product/detail?id=<?php echo $product['id']; ?>"><img src="<?php echo Config::get('UPLOAD_URL') . $product['thumbnail']; ?>" class="img-responsive"></a>
        </div>
        <div class="col-sm-7 bbs-box">
          <div class="box-header">
            <div class="box-title">
              <a href="/product/detail?id=<?php echo $product['id']; ?>"><i class="fa fa-fw fa-comment-o"></i> <?php echo $product['title']; ?></a>
            </div>
            <div class="text-muted pull-right" style="margin-top:10px;">
              <i class="fa fa-clock-o"></i>
              <?php echo date('Y-m-d H:i:s',$product['created_at']); ?>
            </div>
          </div>
          <div class="panel-collapse collapse in">
            <div class="body">
              <p class="text-black">
                <?php echo $product['outline']; ?>
              </p>
            </div>
          </div>
          <div class="pull-right">
            <a href="/product/edit?id=<?php echo $product['id']; ?>" class="btn btn-success">編集</a>
            <a href="/product/delete?id=<?php echo $product['id']; ?>" class="btn btn-danger" onclick="return confirm('削除すると復元出来ません、よろしいですか？')">削除</a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<style>
  .bbs-box
  {
    margin: 10px -10px 10px 10px;
  }
  @media screen and (max-width: 991px) {
    /* 991px以下の場合 */
    .bbs-box
    {
      margin: 10px;
    }
  }
</style>
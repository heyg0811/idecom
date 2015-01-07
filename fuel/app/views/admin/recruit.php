<div class="col-xs-12">
  <a href="/recruit/add" class="btn btn-danger pull-right">新規登録</a>
</div>
<div class="col-xs-12" style="margin-top:15px">
  <?php foreach ($recruits as $recruit): ?>
    <div class="panel box box-danger">
      <div class="row">
        <div class="col-sm-4">
          <img src="<?php echo Config::get('UPLOAD_URL') . $recruit['thumbnail']; ?>" class="img-responsive">
        </div>
        <div class="col-sm-7 bbs-box">
          <div class="box-header">
            <div class="box-title">
              <i class="fa fa-fw fa-comment-o"></i> <?php echo $recruit['title']; ?>
            </div>
            <div class="text-muted pull-right" style="margin-top:10px;">
              <i class="fa fa-clock-o"></i>
              <?php echo date('Y-m-d H:i:s',$recruit['created_at']); ?>
            </div>
          </div>
          <div class="panel-collapse collapse in">
            <div class="body">
              <p class="text-black">
                <?php echo $recruit['outline']; ?>
              </p>
            </div>
          </div>
          <div class="pull-right">
            <a href="/recruit/edit?id=<?php echo $recruit['id']; ?>" class="btn btn-success">編集</a>
            <a href="/recruit/delete?id=<?php echo $recruit['id']; ?>" class="btn btn-danger" onclick="return confirm('削除すると復元出来ません、よろしいですか？')">削除</a>
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
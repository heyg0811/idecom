<div class="col-xs-12">
  <a href="/product/add" class="btn btn-primary pull-right">新規登録</a>
</div>
<div class="col-xs-12" style="margin-top:15px">
  <?php for ($i = 0; $i < 10; $i++): ?>
    <div class="panel box box-primary">
      <div class="row">
        <div class="col-sm-4">
          <?php echo Asset::img('noimage.jpg', array('class' => 'img-responsive thread-img')); ?>
        </div>
        <div class="col-sm-7 bbs-box">
          <div class="box-header">
            <div class="box-title">
              <i class="fa fa-fw fa-comment-o"></i>さくひん<?php echo $i+1 ?>
            </div>
          </div>
          <div class="panel-collapse collapse in">
            <div class="body">
              <p class="text-black">本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん</p>
            </div>
          </div>
          <div class="pull-right">
            <a href="/product/edit" class="btn btn-success">編集</a>
            <a href="" class="btn btn-danger">削除</a>
          </div>
        </div>
      </div>
    </div>
  <?php endfor; ?>
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
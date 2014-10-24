<style>
  .thread:hover{
    opacity:0.5;
  }
</style>
<?php for ($i = 0; $i < 20; $i++): ?>
  <div class="row" style="margin:10px;">

    <div class="col-sm-12">
      <a href="/bbs/thread">
      <div class="panel box box-success thread">
        <div class="row">
          <div class="col-sm-4">
            <?php echo Asset::img('noimage.jpg', array('class' => 'img-responsive thread-img')); ?>
          </div>
          <div class="col-sm-7 bbs-box">
            <div class="box-header">
              <div class="box-title">
                <i class="fa fa-fw fa-comment-o"></i>スレッド<?php echo $i ?>
              </div>
            </div>
            <div class="panel-collapse collapse in">
              <div class="body">
                <p class="text-black">本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div>
<?php endfor; ?>
<div class="box">
  <div class="box-header">
    <div class="box-title">
      <p>スレッド投稿</p>
    </div>
  </div>
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        <label for="">タイトル</label>
        <input class="form-control" type="text" name="title">
      </div>
      <div class="form-group">
        <label for="">スレッド</label>
        <textarea class="form-control" rows="10" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <button class="btn btn-success btn-lg">投稿</button>
    </div>
  </form>
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
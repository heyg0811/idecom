
  <?php for ($i=0; $i < 20; $i++): ?>
    <div class="row" style="margin:10px;">
      <div class="col-sm-4">
        <?php echo Asset::img('noimage.jpg', array('class' => 'img-responsive')); ?>
      </div>
      <div class="col-sm-8">
        <div class="panel box box-success" style="padding:10px;">
          <div class="box-header">
            <div class="box-title">
              <a href="/bbs/bbs"><i class="fa fa-fw fa-comment-o"></i>スレッド<?php echo $i?></a>
            </div>
          </div>
          <div class="panel-collapse collapse in">
            <div class="body">
              本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん
            </div>
          </div>
        </div>
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
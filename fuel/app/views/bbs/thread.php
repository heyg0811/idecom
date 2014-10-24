<div class="box box-success">
  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h3 class="box-title">スレッドタイトル</h3>
  </div>
  <div class="box-body chat" id="chat-box">
    <?php for ($i = 0; $i < 20; $i++): ?>
      <hr />
      <div class="item">
        <img src="img/avatar.png" alt="user image" class="online"/>
        <p class="message">
          <a href="/author/detail" class="name">
            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
            ゆーざー
          </a>
          本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん
        </p>
      </div><!-- /.item -->
    <?php endfor ?>
  </div><!-- /.chat -->
  <form action="">
    <div class="box-footer">
      <div class="form-group">
        <label for="">レス</label>
        <textarea class="form-control" rows="5" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <button class="btn btn-success btn-lg">投稿</button>
    </div>
  </form>
</div><!-- /.box (chat box) -->
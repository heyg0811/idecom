<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">スレッドタイトル</h3>
    </div>
    <div class="box-body chat" id="chat-box">
      <?php for ($i=0;$i<20;$i++): ?>
        <div class="item">
            <img src="img/avatar.png" alt="user image" class="online"/>
            <p class="message">
                <a href="/author/index" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                    ゆーざー
                </a>
                本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん
            </p>
        </div><!-- /.item -->
      <?php endfor ?>
    </div><!-- /.chat -->
    <div class="box-footer">
      <div class="input-group">
        <input class="form-control" placeholder="Type message..."/>
        <div class="input-group-btn">
          <button class="btn btn-success"><i class="fa fa-plus"></i></button>
        </div>
      </div>
    </div>
</div><!-- /.box (chat box) -->
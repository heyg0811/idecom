<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h3 class="box-title">スレッドタイトル</h3>
  </div>

  <div class="box-body chat" id="chat-box">
    <?php foreach ($comments as $comment ): ?>
      <hr />
      <div class="item">
        <img src="img/avatar.png" alt="user image" class="online"/>
        <p class="message">
          <a href="/author/detail" class="name">
            <?php echo $comment['user_id']; ?>
          </a>
          <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>
            <?php echo $comment['date']; ?>
          </small>
          "<?php echo $comment['comment']; ?>"
        </p>
      </div><!-- /.item -->
    <?php endforeach;?>
  </div><!-- /.chat -->

  <form action="comment" method="post">
    <?php echo \Form::csrf(); ?>
    <div class="box-footer">
      <div class="form-group">
        <label for="">レス</label>
        <textarea name="comment" class="form-control" rows="5" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="投稿" class="btn btn-success btn-lg">
    </div>
  </form>
</div><!-- /.box (chat box) -->
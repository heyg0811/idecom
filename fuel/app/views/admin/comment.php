<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h3 class="box-title">自分へのコメント一覧</h3>
  </div>

  <div class="box-body chat" id="chat-box">
    <?php $i=1; foreach ($comments as $comment ): ?>
      <hr />
      <div class="item">

        <img src="img/avatar.png" alt="user image" class="online"/>
        <p class="message">
          <a href="/author/detail" class="name">
            <?php echo Model_User::getName($comment['user_id']); ?>
          </a>
          <small style="margin-top:2px;" class="text-muted pull-left">
            <?php echo "No.".$i." : "; ?>
          </small>
          <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>
            <?php echo date($comment['date']);?>
          </small>
          <br><?php echo nl2br($comment['comment']); ?>
        </p>
      </div><!-- /.item -->
    <?php $i++; endforeach; ?>
  </div><!-- /.chat -->

  <form action="comment" method="post">
    <?php echo \Form::csrf(); ?>
    <div class="box-footer">
      <div class="form-group">
        <label for="">コメント</label>
        <input type=hidden name="thread_id" value=<?php echo $comment['thread_id'];?> />
        <textarea name="comment" class="form-control" rows="5" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="投稿" class="btn btn-success btn-lg"/>
    </div>
  </form>
</div><!-- /.box (chat box) -->
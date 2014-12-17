<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h3 class="box-title">スレッドタイトル : <?php echo "スレタイが表示されます" ?></h3>
  </div>

  <div class="box-body chat" id="chat-box">
    <?php $i=1; foreach ($comments as $comment ): ?>
      <div class="item">
        <?php echo Model_User::getThumbnail($comment['user_id']); ?>
        <p class="message">
          <br>
          <hr />
          <h4>
            <small style="margin-top:4px;" class="text-muted pull-left">
            <?php echo "No.".$i." : "; ?>
            </small>
            <a href="/author/detail" class="name">
              <?php echo Model_User::getName($comment['user_id']); ?>
            </a>
            <small style="margin-top:5px;" class="text-muted pull-right">
              <i class="fa fa-clock-o"></i>
              <?php echo date($comment['date']);?>
            </small>
          </h4>
          <div style="font-size: 120%;" >
            <?php echo nl2br($comment['comment']); ?>
          </div>
        </p>
      </div><!-- /.item -->
    <?php $i++; endforeach; ?>
  </div><!-- /.chat -->

  <form action="comment" method="post">
    <?php echo \Form::csrf(); ?>
    <input type=hidden name="id" value=<?php echo $id;?> />
    <div class="box-footer">
      <div class="form-group">
        <label for="">レス</label>
        <input type=hidden name="bbs_comment[thread_id]" value=<?php echo $id;?> />
        <textarea name="bbs_comment[comment]" class="form-control" rows="5" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="投稿" class="btn btn-success btn-lg"/>
    </div>
  </form>
</div><!-- /.box (chat box) -->
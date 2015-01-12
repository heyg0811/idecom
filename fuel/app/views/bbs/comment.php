<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h3 class="box-title">スレッドタイトル : <?php echo Model_Bbsthread::getTitle($id); ?></h3>
  </div>

  <div class="box-body chat" id="chat-box">
    <?php $i=1; foreach ($comments as $comment ): ?>
      <div class="item">
        <img src='<?php echo Config::get("USER_IMG_URL"), Auth::get("thumbnail"); ?>' class='online'>
        <p class="message">
          <small style="margin-top:5px;" class="text-muted pull-right">
            <i class="fa fa-clock-o"></i>
            <?php echo date($comment['date']);?>
          </small>
          <a href="/author/detail" class="name">
            <?php echo "No.".$i++." : ".Model_User::getName($comment['user_id']); ?>
          </a>
          <?php echo nl2br($comment['comment']); ?>
        </p>
      </div><!-- /.item -->
    <?php endforeach; ?>
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
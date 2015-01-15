<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h2 class="box-title">自分へのコメント一覧</h2>
  </div>

  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h3 class="box-title">制作物に対するコメント</h3>
  </div>

  <div class="box-body chat" id="chat-box">
    <?php $i=1; foreach ($pro_comments as $comment ): ?>
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

  <div class="box-header">
    <i class="fa fa-comments-o"></i>
    <h3 class="box-title">募集プロジェクトに対するコメント</h3>
  </div>

  <div class="box-body chat" id="chat-box">
    <?php $i=1; foreach ($rec_comments as $comment ): ?>
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

</div><!-- /.box (chat box) -->
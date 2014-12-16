<style>
  .thread:hover{
    opacity:0.5;
  }
</style>
<?php foreach ($threads as $thread ): ?>
  <div class="row" style="margin:10px;">
    <div class="col-sm-12">
      <a href="/bbs/comment?id=<?php echo $thread['id'];?>">
      <div class="panel box box-info thread">
        <div class="row">
          <div class="col-sm-4">
            <?php echo Asset::img('noimage.jpg', array('class' => 'img-responsive thread-img')); ?>
          </div>
          <div class="col-sm-7 bbs-box">
            <div class="box-header">
              <div class="box-title">
               <h1>
                <?php echo $thread['id'];?>
                <i class="fa fa-fw fa-comment-o"></i>
                <?php echo $thread['title']; ?>
               </h1>
                <br>
              </div>
            </div>
            <div class="panel-collapse collapse in">
              <div class="body">
               <h4>
                <p class="text-black">
                   <small class="text-muted pull-right">
                    <i class="fa fa-clock-o"></i>
                    <?php echo $thread['date']; ?>
                   </small>
                   <?php echo wordwrap(nl2br($thread['comment']),100, "\n", true); ?>
                </p>
               </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div>
<?php endforeach;?>
<div class="box">
  <div class="box-header">
    <div class="box-title">
      <p>スレッド投稿</p>
    </div>
  </div>
  <form action="thread" role="form" method="POST">
    <?php echo \Form::csrf(); ?>
    <div class="box-body">
      <div class="form-group">
        <label for="">スレッドタイトル</label>
        <input class="form-control" type="text" name="bbs_thread[title]">
      </div>
      <div class="form-group">
        <label for="">ファーストコメント</label>
        <textarea name="bbs_thread[comment]" class="form-control" rows="10" ></textarea>
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
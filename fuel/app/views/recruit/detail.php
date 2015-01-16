<style>
  .recruit-thumbnail
  {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    width: 100%;
  }
</style>
<div>
<div class="col-sm-4" >
  <div class="box box-solid bg-red-gradient">
    <div class="box-header">
      <h3 class="box-title">募集タイトル</h3>
    </div>
    <div class="box-body">
      <img src='<?php echo Config::get("UPLOAD_URL"),$recruit["thumbnail"]; ?>' class='recruit-thumbnail'>
      <div>
        <hr>
        <div class="row">
          <div class="col-xs-4 author-grade">学年</div>
          <div class="col-xs-8 author-grade responsib">3A</div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-4 author-grade">専攻</div>
          <div class="col-xs-8 author-grade">ITスペシャリスト</div>

        </div>
        <hr>
      </div>
    </div>
    <div class="box-footer text-black">
      <h3 class="box-title text-center">技術</h3>
      <div class="row">
        <div class="col-sm-12">
          <?php foreach ($recruit['skill'] as $key => $skill): ?>
            <?php if (!empty($skill)): ?>
              <!-- Progress bars -->
              <div class="clearfix">
                <span class="pull-left"><p><?php echo Config::get('TECHNOLOGY.'.$key); ?></p></span>
                <small class="pull-right"><?php echo $skill; ?>%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: <?php echo $skill; ?>%;"></div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-8">
  <div class="box box-solid">
    <div class="box-header">
      <?php if($joint):?>
         <a href="joindelete?id=<?php echo $recruit['id']; ?>" class="btn btn-danger pull-right">キャンセル</a>
        <?php else:?>
          <a href="joinadd?id=<?php echo $recruit['id']; ?>" class="btn btn-danger pull-right">参加！</a>
           
        <?php endif?>
      <h3 class="box-title">募集詳細</h3>
    </div>
    <div class="box-body">
      <?php echo $recruit['detail']; ?>
    </div>
  </div>
</div>
</div>

  <form action="detail" method="post">
    <?php echo \Form::csrf(); ?>
    <input type="hidden" name="id" value="<?php echo $recruit['id'];?>">
    <div class="box-footer">
      <div class="form-group">
        <label for="">募集者へのコメント</label>
        <textarea name="comment[comment]" class="form-control" rows="5" ></textarea>
      </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="投稿" class="btn btn-success btn-lg"/>
    </div>
  </form>


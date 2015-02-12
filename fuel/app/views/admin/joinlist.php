<div class="box box-solid">
  <?php if (empty($joins)): ?>
    <div class="box-header">
      <h3 class="box-title">参加者はいません</h3>
    </div><!-- /.box-header -->
  <?php else : ?>
    <div class="box-header">
      <h3 class="box-title">一覧</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-group" id="accordion">
        <?php foreach ($joins as $join): ?>
          <div class="panel box box-danger">
            <div class="box-header">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                  <?php echo Model_User::getName($join['user_id']); ?>
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="box-body">
                <?php echo $join['body']; ?>
              </div>
              <div class="box-footer">
                <a href="/groupchat/chatcreate?id=<?php echo $join['user_id']?>" class="btn btn-info btn-flat btn-block"><i class="fa fa-comment-o"></i> PrivateChat</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div><!-- /.box-body -->
  <?php endif; ?>
</div>
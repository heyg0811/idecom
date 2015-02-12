<form action="edit" method="post" enctype="multipart/form-data">
  <?php echo \Form::csrf(); ?>
  <div class="box box-success">
    <div class="box-header">
      <div class="box-title">
        <p>プロフィール編集</p>
      </div>
      <div class="box-tools pull-right">
        <div class="btn-group" data-toggle="btn-toggle">
          <?php foreach(Config::get('AUTHOR.STATUS') as $key => $val): ?>
            <input type="button" class="btn btn-default btn-lg <?php echo MyUtil::is_active($key, $developer['status']); ?>" onClick="setStatus(<?php echo $key; ?>)" value="<?php echo $val; ?>">
          <?php endforeach; ?>
        </div>
        <?php echo Form::hidden('user[status]', $developer['status'], array('id'=>'status')); ?>
      </div>
    </div>
    <div class="box-body">
      <div class="form-group">
        <?php echo Form::label('名前', 'nickname'); ?>
        <?php echo Form::input('user[nickname]',$developer['nickname'],array('class'=>'form-control')); ?>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <?php echo Form::label('学年', 'grade'); ?>
            <?php echo Form::select('user[grade]', $developer['grade'], Config::get('AUTHOR.GRADE'), array('class'=>'form-control')); ?>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <?php echo Form::label('専攻', 'major'); ?>
            <?php echo Form::select('user[major]', $developer['major'], Config::get('AUTHOR.MAJOR'), array('class'=>'form-control')); ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('カテゴリ', 'category'); ?>
        <?php echo Form::select('user[category]', $developer['category'], Config::get('PROJECT.CATEGORY.NAME'),array('class'=>'form-control'));?>
      </div>
      <div class="form-group">
        <?php echo Form::label('サムネイル', 'thumbnail'); ?>
        <?php echo Form::file('thumbnail'); ?>
      </div>
      <hr>
      <div class="form-group">
        <?php echo Form::label('技術', 'skill'); ?>
        <div class="row">
          <?php foreach (Config::get('TECHNOLOGY') as $key => $val): ?>
            <div class="col-xs-6 col-sm-4 col-md-3" style="margin-bottom:10px;">
              <div class="col-xs-6 text-center ">
                <?php echo Form::label($val, 'skill_label'); ?>
              </div>
              <div class="col-xs-6">
                <input type="hidden" name="skill_name[]" value="<?php echo $val; ?>">
                <input type="text" class="form-control" name="user[skill][]" value="<?php echo $developer['skill'][$key]?>" data-slider-step="1" data-slider-range="0,100" data-slider="true">
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-success">更新</button>
    </div>
  </div><!-- /.box -->
</form>
<script type="text/javascript">
  function setStatus(val){
    $('#status').val(val);
  }
</script>
<?php echo Asset::js('simple-slider.min.js') ?>
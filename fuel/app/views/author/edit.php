<div class="box box-success">
  <?php if (!empty($errmsg)): ?>
  <hr>
    <?php echo $errmsg; ?>
  <hr>
  <?php endif; ?>
  <!-- form start -->
  <form action="edit" method="post" enctype="multipart/form-data">
    <?php echo \Form::csrf(); ?>
    <div class="box-body">
      <div class="row">
        <div class="form-group">
          <div class="col-xs-12">
            <h3 class="col-xs-3">
              <?php echo Form::label('名前', 'nickname'); ?>
            </h3>
            <div class="col-xs-9" style="margin-top:15px;">
              <?php echo Form::input('user[nickname]',$developer['nickname'],array('class'=>'form-control')); ?>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="form-group">
          <label class="btn btn-primary">
            <input type="radio" name="user[status]" id="option1" value="1" checked> 公開
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="user[status]" id="option2" value="0" <?php if($developer['status']==='0') echo 'checked' ;?>> 非公開
          </label>
      </div>
      <hr>
      <div class="row">
        <div class="form-group">
          <div class="col-xs-3">
            <?php echo Form::label('学年', 'grade'); ?>
          </div>
          <div class="col-xs-3">
            <?php echo Form::input('user[grade]',$developer['grade'],array('class'=>'form-control')); ?>
          </div>
          <div class="col-xs-3">
            <?php echo Form::label('専攻', 'major'); ?>
          </div>
          <div class="col-xs-3">
            <?php echo Form::input('user[major]',$developer['major'],array('class'=>'form-control')); ?>
          </div>
          <div class="col-xs-3" style="margin-top:15px;">
            <?php echo Form::label('ジャンル', 'genre'); ?>
          </div>
          <div class="col-xs-3" style="margin-top:15px;">
                      <?php echo Form::select('user[genre]', $developer['genre'], 
                      array(
                        'System' => 'System',
                        'Web' => 'Web',
                        'Movie' => 'Movie',
                        'Image' => 'Image',
                        'Illust' => 'Illust',
                      ));?>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:15px;">
        <div class="form-group">
          <div class="col-xs-3">
            <?php echo Form::label('サムネイル', 'thumbnail'); ?>
          </div>
          <div class="col-xs-3">
            <?php echo Form::file('thumbnail'); ?>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="box-body">
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
    <div class="box-footer">
      <button type="submit" class="btn btn-success">プレビュー</button>
      <button type="submit" class="btn btn-success">更新</button>
    </div>
  </form>
</div><!-- /.box -->

<?php echo Asset::js('simple-slider.min.js') ?>

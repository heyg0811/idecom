<!-- general form elements -->
<div class="box box-success">
  <?php if (!empty($errmsg)): ?>
  <hr>
    <?php echo $errmsg; ?>
  <hr>
  <?php endif; ?>
  <!-- form start -->
  <form action="edit" method="post">
    <?php echo \Form::csrf(); ?>
    <div class="box-body">
      <div class="form-group row">
        <div class="col-xs-12">
          <h3>
            <?php echo Form::label($developer['nickname'], 'nickname'); ?>
          </h3>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-xs-3">
          <?php echo Form::label('学年', 'grade'); ?>
        </div>
        <div class="col-xs-3">
          <?php echo Form::input('developer[grade]',$developer['grade'],array('class'=>'form-control')); ?>
        </div>
        <div class="col-xs-3">
          <?php echo Form::label('専攻', 'major'); ?>
        </div>
        <div class="col-xs-3">
          <?php echo Form::input('developer[major]',$developer['major'],array('class'=>'form-control')); ?>
        </div>
        <div class="col-xs-3" style="margin-top:15px;">
          <?php echo Form::label('ジャンル', 'genre'); ?>
        </div>
        <div class="col-xs-3"style="margin-top:15px;">
                    <?php echo Form::select('developer[genre]', $developer['genre'], 
                    array(
                      'System' => 'System',
                      'Web' => 'Web',
                      'Movie' => 'Movie',
                      'Image' => 'Image',
                      'Illust' => 'Illust',
                    ));?>
        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('サムネイル', 'thumbnail'); ?>
        <?php echo Form::file('thumbnail'); ?>
      </div>
    </div><!-- /.box-body -->
    <hr>
    <div class="box-body">
      <?php echo Form::label('技術', 'skill'); ?>
      <div class="row">
        <?php foreach (Config::get('TECHNOLOGY') as $key => $val): ?>
          <div class="col-xs-6 col-sm-4 col-md-3" style="margin-bottom:10px;">
            <div class="col-xs-6 text-center ">
              <?php echo Form::label($val, 'skill_label'); ?>
            </div>
            <div class="col-xs-6 ">
              <input type="hidden" name="skill_name[]" value="<?php echo $val; ?>">
              <input type="text" name="developer[skill][]" size="5" maxlength="3" value="<?php echo $developer['skill'][$key]?>">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-success">更新</button>
    </div>
</div>
</form>
</div><!-- /.box -->

<style>
  .margin-bottom15
  {
    margin-bottom: 15px;
  }
  /* 応急処置 */
  @media screen and (max-width: 575px){
	  .content{
	    width: 100%;
	  }
  }
</style>
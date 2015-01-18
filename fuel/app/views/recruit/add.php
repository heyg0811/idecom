<?php echo Asset::js('plugin/ckeditor/ckeditor.js'); ?>
<!-- general form elements -->
<div class="box box-danger">
  <div class="box-header">
    <div class="box-title">
      <p>詳細編集</p>
    </div>
    <div class="box-tools pull-right">
      <button class="btn btn-danger btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <?php if (isset($errmsg)): ?>
    <div style="margin:15px;">
      <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <b>警告!</b> <?php echo $errmsg; ?>
      </div>
      <?php if (isset($errors)) {echo $errors;} ?>
    </div>
  <?php endif;?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <?php echo Form::csrf(); ?>
      <div class="form-group">
        <?php echo Form::label('題目', 'title'); ?>
        <?php echo Form::input('recruit[title]','',array('class'=>'form-control')); ?>
      </div>
      <div class="form-group">
        <?php echo Form::label('分類', 'category'); ?>
        <?php echo Form::select('recruit[category]','', Config::get('CATEGORY.NAME'),array('class'=>'form-control')); ?>
      </div>
      <?php echo Form::label('技術', 'skill'); ?>
      <div class="row">
        <?php foreach (Config::get('TECHNOLOGY') as $key => $val): ?>
          <div class="col-xs-6 col-sm-4 col-md-3" style="margin-bottom:10px;">
            <div class="col-xs-6 text-center ">
              <?php echo Form::label($val, 'skill'); ?>
            </div>
            <div class="col-xs-6 ">
              <input type="text" class="form-control" name="<?php echo 'recruit[skill]['.$key.']'?>" data-slider-step="1" data-slider-range="0,100" data-slider="true">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="form-group">
        <?php echo Form::label('概要', 'outline'); ?>
        <?php echo Form::input('recruit[outline]','',array('class'=>'form-control')); ?>
      </div>
      <div class="form-group">
        <?php echo Form::label('詳細', 'detail'); ?>
        <?php echo Form::textarea('recruit[detail]','',array('class'=>'form-control ckeditor')); ?>
      </div>
      <div class="form-group">
        <?php echo Form::label('サムネイル', 'thumbnail'); ?>
        <?php echo Form::file('thumbnail'); ?>
      </div>
    </div>
    <div class="box-footer">
      <?php echo Form::submit('','投稿',array('class'=>'btn btn-danger')); ?>
    </div>
  </form>
</div><!-- /.box -->
<?php echo Asset::js('simple-slider.min.js') ?>
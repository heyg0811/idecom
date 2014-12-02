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
      <?php echo $errors; ?>
    </div>
  <?php endif;?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <?php echo Form::csrf(); ?>
      <div class="form-group">
        <?php echo Form::label('題目', 'title'); ?>
        <?php echo Form::input('product[title]','',array('class'=>'form-control')); ?>
      </div>
      <div class="form-group">
        <?php echo Form::label('分類', 'category'); ?>
        <?php echo Form::select('product[category]','', Config::get('CATEGORY'),array('class'=>'form-control')); ?>
      </div>
       <?php foreach (Config::get('TECHNOLOGY') as $key => $val): ?>
        <?php if ($key % 6 == 0): ?>
          <div class="row margin-bottom15">
          <?php endif; ?>
          <div class="col-xs-1 text-center ">
            <label><?php echo $val; ?></label>
          </div>
          <div class="col-xs-1 ">
            <input type="text" name="product[skill][]" size="5" maxlength="3" value="">
          </div>
          <?php if (($key % 6) === 5): ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-group">
        <?php echo Form::label('概要', 'outline'); ?>
        <?php echo Form::input('product[outline]','',array('class'=>'form-control')); ?>
      </div>
      <div class="form-group">
        <?php echo Form::label('詳細', 'detail'); ?>
        <?php echo Form::textarea('product[detail]','',array('class'=>'form-control ckeditor')); ?>
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
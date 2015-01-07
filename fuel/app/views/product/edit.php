<?php echo Asset::js('plugin/ckeditor/ckeditor.js'); ?>
<!-- general form elements -->
<div class="box box-primary">
  <div class="box-header">
    <div class="box-title">
      <p>詳細編集</p>
    </div>
    <div class="box-tools pull-right">
      <button class="btn btn-danger btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <?php echo Form::csrf(); ?>
      <div class="form-group">
        <?php echo Form::label('題目', 'title'); ?>
        <?php echo Form::input('product[title]','',array('class'=>'form-control')); ?>
      </div>
      <div class="form-group">
        <?php echo Form::label('分類', 'category'); ?>
        <?php echo Form::select('product[category]','', Config::get('CATEGORY.NAME'),array('class'=>'form-control')); ?>
      </div>
      <?php echo Form::label('技術', 'skill'); ?>
      <div class="row">
        <?php foreach (Config::get('TECHNOLOGY') as $key => $val): ?>
          <div class="col-xs-6 col-sm-4 col-md-3" style="margin-bottom:10px;">
            <div class="col-xs-6 text-center ">
              <?php echo Form::label($val, 'skill'); ?>
            </div>
            <div class="col-xs-6 ">
              <?php echo Form::input('product[skill]['.$key.']','',array('class'=>'form-control')); ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
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
      <div class="form-group">
        <?php echo Form::label('その他画像', 'other'); ?>
        <?php echo html_tag('iframe',array('width'=>'100%', 'height'=>'300px', 'src'=>'http://idecom-heyg0811.c9.io/assets/js/plugin/kcfinder/browse.php?type=other&langCode=ja')); ?>
      </div>
    </div>
    <div class="box-footer">
      <?php echo Form::submit('','投稿',array('class'=>'btn btn-primary')); ?>
    </div>
  </form>
</div><!-- /.box -->
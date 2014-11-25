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
        <b>警告!</b> <?php echo $errmsg; ?></br>
      </div>
    </div>
  <?php endif;?>
  <?php echo $form; ?>
</div><!-- /.box -->
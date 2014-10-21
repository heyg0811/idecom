<style type="text/css" media="screen">
.comment-body{
  background-color: #FEF0E3;
}
.comment{
  margin:20px;
}

</style>


<?php for ($i=0; $i < 20; $i++): ?>
  <div class="row comment">
    <div class="col-md-2">
      <?php echo Asset::img('noimage.jpg'); ?>
    </div>
    <div  class="col-md-9 comment-body">
        <p> <i class="fa fa-fw fa-comment-o"></i>1. ID : B????  <?php echo date('Y-m-D H:i:s',time()); ?></p>
        <p style="margin-left: 15px;">本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん
            本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん本文ほんぶん</p>
    </div>

  </div>
<?php endfor; ?>

<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">投稿フォーム：</label>
    <div class="col-sm-10">
      <TEXTAREA cols="100" rows="10" ></TEXTAREA><br><br>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <button class="btn btn-success">投稿</button>
  </div>
</form>
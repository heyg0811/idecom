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
      <div class="form-group">
        <label for="inputName">名前</label>
        <input type="text" class="form-control" id="inputName" name="nickname" placeholder="名前" value="<?php echo $developer['nickname']; ?>">
      </div>
      <div class="form-group row">
        <div class="col-xs-3">
          <label for="inputGrade">学年</label>
        </div>
        <div class="col-xs-3">
          <input type="text" class="form-control" id="inputGrade" name="grade" placeholder="学年" value="<?php echo $developer['grade']; ?>">
        </div>
        <div class="col-xs-3">
          <label for="inputMajor">専攻</label>
        </div>
        <div class="col-xs-3">
          <input type="text" class="form-control" id="inputMajor" name="major" placeholder="専攻" value="<?php echo $developer['major']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputFile">サムネイル</label>
        <input type="file" id="exampleInputFile">
      </div>
    </div><!-- /.box-body -->
    <hr>
    <div class="box-body">
      <?php foreach (Config::get('TECHNOLOGY') as $key => $val): ?>
        <?php if ($key % 6 == 0): ?>
          <div class="row margin-bottom15">
          <?php endif; ?>
          <div class="col-xs-1 text-center ">
            <label><?php echo $val; ?></label>
          </div>
          <div class="col-xs-1 ">
            <input type="hidden" name="skil_name[]" value="<?php echo $val; ?>">
            <input type="text" name="skil[]" size="5" maxlength="3" value="<?php echo $developer["technology"][$key]; ?>">
          </div>
          <?php if (($key % 6) === 5): ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
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
</style>
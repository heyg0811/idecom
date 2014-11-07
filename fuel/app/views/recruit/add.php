<?php echo Asset::js('plugin/ckeditor/ckeditor.js'); ?>
<!-- general form elements -->
<div class="box box-danger">
  <div class="box-header">
    <div class="box-title">
      <p>簡易編集</p>
    </div>
  </div>
  <!-- form start -->
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail">題目</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="メール">
      </div>
      <div class="form-group">
        <label for="inputSkill">募集技術</label>
        <input type="text" name="skill" class="form-control" id="inputSkill">
      </div>
      <div class="form-group">
        <label for="inputIntro">募集内容</label>
        <textarea name="intro" class="form-control" id="inputIntro" rows="5" placeholder="募集紹介"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">サムネイル</label>
        <input type="file" id="exampleInputFile">
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-danger">更新</button>
    </div>
  </form>
</div><!-- /.box -->
<!-- general form elements -->
<div class="box box-danger">
  <div class="box-header">
    <div class="box-title">
      <p>詳細編集</p>
    </div>
  </div>
  <!-- form start -->
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail">題目</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="メール">
      </div>
      <div class="form-group">
        <label for="inputSkill">募集技術</label>
        <input type="text" name="skill" class="form-control" id="inputSkill">
      </div>
      <div class="form-group">
        <label for="inputIntro">募集内容</label>
        <textarea name="intro" class="form-control ckeditor" id="inputIntro" rows="5" placeholder="募集紹介"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">サムネイル</label>
        <input type="file" id="exampleInputFile">
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-danger">更新</button>
    </div>
  </form>
</div><!-- /.box -->1
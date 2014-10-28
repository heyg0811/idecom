<!-- general form elements -->
<div class="box box-success">
  <!-- form start -->
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail">名前</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="メール">
      </div>
      <div class="form-group">
        <label for="inputPassword">パスワード</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="パスワード">
      </div>
      <div class="form-group">
        <label for="inputIntro">自己紹介</label>
        <textarea name="intro" class="form-control" id="inputIntro" rows="5" placeholder="自己紹介"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">サムネイル</label>
        <input type="file" id="exampleInputFile">
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-success">更新</button>
    </div>
  </form>
</div><!-- /.box -->

<div class="form-box" id="login-box">
  <div class="alert alert-info alert-dismissable" style="margin-left:0">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>TIPS!</b> 以降もGoogleよりログインする場合はパスワード設定の必要はありません。
  </div>
  <div class="header">パスワード設定</div>
  <form action="register" method="post">
    <?php echo \Form::csrf(); ?>
    <div class="body bg-gray">
      <div class="form-group">
        <input disabled="disabled" value="<?php echo Auth::get('username').' か '.Auth::get('email');?>" type="text" name="id" class="form-control" placeholder="UserID or MailAddress"/>
      </div>
      <div class="form-group">
        <input type="password" name="password1" class="form-control" placeholder="Password"/>
      </div>
      <div class="form-group">
        <input type="password" name="password2" class="form-control" placeholder="Retype password"/>
      </div>
      <?php if(isset($errmsg)) echo $errmsg;?>
    </div>
    <div class="footer">
      <button type="submit" class="btn bg-olive btn-block">設定</button>
      <a href="/" class="btn bg-red btn-block">設定しない</a>
    </div>
  </form>
</div>
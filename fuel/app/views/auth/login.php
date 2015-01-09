<div class="form-box" id="login-box">
  <div class="alert alert-info alert-dismissable" style="margin-left:0">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>TIPS!</b> 初めての方は「Googleよりログイン」を行ってください。
  </div>
  <div class="header">サインイン</div>
  <form action="login" method="post">
    <?php echo \Form::csrf(); ?>
    <div class="body bg-gray">
      <div class="form-group">
        <?php echo Form::input('user[username]','',array('class'=>'form-control','placeholder'=>'UserID or MailAddress')); ?>
      </div>
      <div class="form-group">
        <?php echo Form::password('user[password]','',array('class'=>'form-control','placeholder'=>'Password')); ?>
      </div>
      <?php if(isset($errmsg)) echo $errmsg;?>

    </div>
    <div class="footer">
    <input type="submit" class='btn bg-olive btn-block' value="ログイン">
    <?php echo Html::anchor('auth/oauth/google', 'Googleよりログイン', array('class'=>'btn bg-red btn-block')); ?>
      <p><a href="#">I forgot my password</a></p>
    </div>
  </form>
</div>
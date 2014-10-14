<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Idea Community</title>
		<?php echo Asset::css('bootstrap.min.css'); ?>
		<?php echo Asset::css('bootstrap-custom.css'); ?>
		<?php echo Asset::css('original.css'); ?>
	</head>
	<body>
		<div class="container-fluid" id="container">
      <div class="scalein sidemenu" id="sidemenu">
        <?php echo Asset::img('logo.png',array('class'=>'logo')); ?>
        <ul>
          <li class="active"><a href="#"> Ｍｅｎｕ１</a></li>
          <li><a href="#"> Ｍｅｎｕ２</a></li>
          <li><a href="#"> Ｍｅｎｕ３</a></li>
        </ul>
        <div class="menu-bottom">
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>　Ｌｏｇｉｎ</a></li>
          </ul>
        </div>
      </div>
      <div class="pusher">
        <div class="col-md-12 column" id="content">
          <div class="row">
            <div class="col-xs-12" id="navbar-top">
              <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="margin-left:15px;">IDECOM</a>
                  </div>
                  <div class="navbar-right">

                    <button id="trigger" style="margin:3px 15px" class="btn btn-lg pull-right" data-effect="slidein"><span class="glyphicon glyphicon-th-list"></span> Menu</button>
                  </div>
                    <!-- <ul class="nav navbar-nav navbar-right">
                      <li><object type="image/svg+xml" data="assets/img/facebook.svg"></object>
                        <object type="image/svg+xml" data="assets/img/twitter.svg"></object>
                        <object type="image/svg+xml" data="assets/img/github.svg"></object>
                      </li>
                    </ul> -->
                </div>
              </nav>
            </div>
            <?php echo $content; ?>
          </div>
        </div>
      </div>
		</div>
	</body>
</html>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.js" type="text/javascript" charset="utf-8"></script>
<?php echo Asset::js('bootstrap.js'); ?>
<?php echo Asset::js('original.js'); ?>

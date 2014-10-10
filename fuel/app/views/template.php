<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FuelPHP Framework</title>
		<?php echo Asset::css('bootstrap.min.css'); ?>
		<?php echo Asset::css('bootstrap-custom.css'); ?>
		<?php echo Asset::css('original.css'); ?>
	</head>
	<body>
		<div class="container-fluid" id="container">
      <div class="scalein sidemenu" id="sidemenu">
        <img class="logo" src="img/logo.jpg" alt="">
        <ul>
          <li class="active"><a href="#"><span class="glyphicon glyphicon-star"></span> めにゅー１</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-star"></span> めにゅー２</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-star"></span> めにゅー３</a></li>
        </ul>
        <div class="menu-bottom">
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> ろぐいん</a></li>
          </ul>
        </div>
      </div>
			<?php echo $content; ?>
		</div>
	</body>
</html>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.js" type="text/javascript" charset="utf-8"></script>
<?php echo Asset::js('original.js'); ?>

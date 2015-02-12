<!DOCTYPE html>
<html
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:svg="http://www.w3.org/2000/svg"
  xmlns:xlink="http://www.w3.org/1999/xlink"
  lang="en" style="overflow:scroll;">
  <head>
    <meta charset="UTF-8">
      <title>IDECOM</title>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <?php echo Asset::css('admin/morris/morris.css') ?>
        <!-- jvectormap -->
        <?php echo Asset::css('admin/jvectormap/jquery-jvectormap-1.2.2.css') ?>
        <!-- Date Picker -->
        <?php echo Asset::css('admin/datepicker/datepicker3.css') ?>
        <!-- Daterange picker -->
        <?php echo Asset::css('admin/daterangepicker/daterangepicker-bs3.css') ?>
        <!-- bootstrap wysihtml5 - text editor -->
        <?php echo Asset::css('admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>
        <!-- bootstrap wysihtml5 - text editor -->
        <?php echo Asset::css('admin/bootstrap-slider/slider.css') ?>
        <!-- Theme style -->
        <?php echo Asset::css('admin/AdminLTE.css') ?>
        <!-- Original style -->
        <?php echo Asset::css('bootstrap-custom.css') ?>
        <?php echo Asset::css('original.css') ?>
        <!-- Slider -->
        <?php echo Asset::css('simple-slider.css') ?>
        <?php echo Asset::js('simple-slider.min.js') ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        </head>
        <body class="skin-blue">
          <!-- header logo: style can be found in header.less -->
          <header class="header">
            <a href="/" class="logo">
              <!-- Add the class icon to your logo image or logo icon to add the margining -->
              IDECOM
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <div class="navbar-right">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-user"></i>
                      <span><?php echo Auth::get('nickname')?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header bg-light-blue">
                        <img src='<?php echo Config::get("USER_IMG_URL").Auth::get("thumbnail"); ?>' class='img-circle'>
                        <p>
                          <?php echo Auth::get('nickname')?>
                          <small>Member since <?php echo date('Y-m-d',Auth::get('created_at'));?></small>
                        </p>
                      </li
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="/author/edit" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
          <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
              <!-- sidebar: style can be found in sidebar.less -->
              <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                  <div class="pull-left image">
                    <img src='<?php echo Config::get("USER_IMG_URL").Auth::get("thumbnail"); ?>' class='img-circle'>
                  </div>
                  <div class="pull-left info">
                    <p><?php echo Auth::get('nickname')?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                      <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-dashboard"></i> <span>管理　Control</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="/admin/dashboard"><i class="fa fa-angle-double-right"></i> ダッシュボード</a></li>
                      <li><a href="/admin/product"><i class="fa fa-angle-double-right"></i> 作品管理</a></li>
                      <li><a href="/admin/recruit"><i class="fa fa-angle-double-right"></i> 募集管理</a></li>
                      <li><a href="/author/edit"><i class="fa fa-angle-double-right"></i> プロフィール</a></li>
                      <li><a href="/groupchat/chatroom"><i class="fa fa-angle-double-right"></i> プライベートチャット</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="/product/list">
                      <i class="fa fa-folder-open-o"></i> <span>作品　Product</span>
                    </a>
                  </li>
                  <li>
                    <a href="/recruit/list">
                      <i class="fa fa-bullhorn"></i> <span>募集　Recruit</span>
                    </a>
                  </li>
                  <li>
                    <a href="/author/list">
                      <i class="fa fa-users"></i> <span>作者　Author</span>
                    </a>
                  </li>
                  <li>
                    <a href="/bbs/thread">
                      <i class="fa fa-comments-o"></i> <span>掲示板　BBS</span>
                    </a>
                  </li>
                </ul>
              </section>
              <!-- /.sidebar -->
            </aside>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h1>
                  <?php echo $title; ?>
                  <small><?php echo $subtitle; ?></small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="/"><i class="fa fa-tags"></i> Home</a></li>
                  <?php if (count(Uri::segments()) == 0): ?>
                    <li><?php echo 'Dashboard'; ?></li>
                    <li><?php echo 'Index'; ?></li>
                  <?php else: ?>
                    <li><?php echo ucfirst(Uri::segment(1)); ?></li>
                    <li><?php echo ucfirst(Uri::segment(2)); ?></li>
                  <?php endif; ?>
                </ol>
              </section>
              <!-- Main content -->
              <section class="content" style="overflow:hidden;">
                <?php if($alert = Session::get_flash('alert')): ?>
                  <div style="margin:15px;">
                    <div class="alert alert-dismissable alert-<?php echo $alert['type']; ?>">
                      <i class="fa fa-ban"></i>
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <b><?php echo Config::get('ALERT.'.$alert['type']);?>!</b> <?php if(!empty($alert['title'])){echo $alert['title'];} ?>
                      <?php if(!empty($alert['body'])){echo $alert['body'];} ?>
                    </div>
                  </div>
                <?php endif; ?>
                <?php echo $content; ?>
              </section><!-- /.content -->
            </aside><!-- /.right-side -->
          </div><!-- ./wrapper -->
          <?php echo Asset::js('admin/plugins/morris/morris.min.js'); ?>
          <!-- Sparkline -->
          <?php echo Asset::js('admin/plugins/sparkline/jquery.sparkline.min.js'); ?>
          <!-- jvectormap -->
          <?php echo Asset::js('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>
          <?php echo Asset::js('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>
          <!-- jQuery Knob Chart -->
          <?php echo Asset::js('admin/plugins/jqueryKnob/jquery.knob.js'); ?>
          <!-- daterangepicker -->
          <?php echo Asset::js('admin/plugins/daterangepicker/daterangepicker.js'); ?>
          <!-- datepicker -->
          <?php echo Asset::js('admin/plugins/datepicker/bootstrap-datepicker.js'); ?>
          <!-- Bootstrap WYSIHTML5 -->
          <?php echo Asset::js('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>
          <!-- iCheck -->
          <?php echo Asset::js('admin/plugins/iCheck/icheck.min.js'); ?>

          <!-- AdminLTE App -->
          <?php echo Asset::js('admin/AdminLTE/app.js'); ?>

          <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
          <?php echo Asset::js('admin/AdminLTE/dashboard.js'); ?>

          <?php echo Asset::js('admin/plugins/bootstrap-slider/bootstrap-slider.js'); ?>

          <?php echo Asset::js('classie.js'); ?>

          <!-- Original -->
          <?php echo Asset::js('original.js'); ?>
        </body>
        </html>
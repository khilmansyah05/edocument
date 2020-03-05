<?php
echo $this->session->flashdata('message');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="shivatwin">
  <title><?php echo $title; ?></title>
  <link rel="apple-touch-icon" href="../../../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="../../../assets/images/favicon.ico">
<!--CSS-->
  <link href="<?php echo ('assets/css/bootstrap/bootstrap.min.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/bootstrap/bootstrap-extend.min.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/site.min.css');?>" rel="stylesheet"/>
  <!-- Plugin -->
  <link href="<?php echo ('assets/css/animsition/animsition.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/asscrollable/asScrollable.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/switchery/switchery.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/intro-js/introjs.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/slidepanel/slidePanel.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/flag-icon-css/flag-icon.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/css/login-v3.css');?>" rel="stylesheet"/>

  <!-- Fonts -->
  <link href="<?php echo ('assets/fonts/web-icons/web-icons.min.css');?>" rel="stylesheet"/>
  <link href="<?php echo ('assets/fonts/brand-icons/brand-icons.min.css');?>" rel="stylesheet"/>
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic' rel="stylesheet"/>

  <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="<?php echo ('assets/js/breakpoints/breakpoints.js');?>"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body class="animation page-login-v3 layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" src='<?php echo base_url("assets/images/angkasa.png");?>' alt="..." style="width: 120px;">
            <h2 class="brand-text font-size-18">PT. Angkasa Pura Support</h2>
            <h2 class="brand-text font-size-18">Login</h2>
          </div>
          <form method="post" action='<?php echo $action; ?>'>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="username" />
              <label class="floating-label">Username</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control" name="password" />
              <label class="floating-label">Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg m-t-40">Login</button>
          </form>
        </div>
      </div>
      <footer class="page-copyright page-copyright-inverse">
        <p>WEBSITE BY APS</p>
        <p>© 2020. PT. Angkasa Pura Support.</p>
      </footer>
    </div>
  </div>
  <!-- End Page -->
  <!-- Core  -->
  <script src="<?php  echo ('assets/js/babel-external-helpers/babel-external-helpers.js');?>"></script>
  <script src="<?php  echo ('assets/js/jquery/jquery.js');?>"></script>
  <script src="<?php  echo ('assets/js/tether/tether.js');?>"></script>
  <script src="<?php  echo ('assets/js/bootstrap/bootstrap.js');?>"></script>
  <script src="<?php  echo ('assets/js/animsition/animsition.js');?>"></script>
  <script src="<?php  echo ('assets/js/mousewheel/jquery.mousewheel.js');?>"></script>
  <script src="<?php  echo ('assets/js/asscrollbar/jquery-asScrollbar.js');?>"></script>
  <script src="<?php  echo ('assets/js/asscrollable/jquery-asScrollable.js');?>"></script>
  <script src="<?php  echo ('assets/js/ashoverscroll/jquery-asHoverScroll.js');?>"></script>

  <!-- Plugins -->
  <script src="<?php  echo ('assets/js/switchery/switchery.min.js');?>"></script>
  <script src="<?php  echo ('assets/js/intro-js/intro.js');?>"></script>
  <script src="<?php  echo ('assets/js/screenfull/screenfull.js');?>"></script>
  <script src="<?php  echo ('assets/js/slidepanel/jquery-slidePanel.js');?>"></script>
  <script src="<?php  echo ('assets/js/jquery-placeholder/jquery.placeholder.js');?>"></script>
  <!-- Scripts -->
  <script src="<?php  echo ('assets/js/js/State.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Component.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Plugin.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Base.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Config.js');?>"></script>
  <script src="<?php  echo ('assets/js/Section/Menubar.js');?>"></script>
  <script src="<?php  echo ('assets/js/Section/GridMenu.js');?>"></script>
  <script src="<?php  echo ('assets/js/Section/Sidebar.js');?>"></script>
  <script src="<?php  echo ('assets/js/Section/PageAside.js');?>"></script>
  <script src="<?php  echo ('assets/js/Plugin/menu.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/config/colors.js');?>"></script>
  <script src="<?php  echo ('assets/js/config/tour.js');?>"></script>
  <!-- Page -->
  <script src="<?php  echo ('assets/js/js/Site.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Plugin/asscrollable.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Plugin/slidepanel.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Plugin/switchery.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Plugin/jquery-placeholder.js');?>"></script>
  <script src="<?php  echo ('assets/js/js/Plugin/material.js');?>"></script>
  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>

</body>
</html>

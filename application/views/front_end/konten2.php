<?php
  $User   = get_profile();
  $meta_title = (ISSET($meta_title) && $meta_title != "")?$meta_title : "";
  $meta_description = (ISSET($meta_description) && $meta_description != "")?$meta_description : "";
  $breadcrumb = (ISSET($breadcrumb) && $breadcrumb != "")?$breadcrumb : "";
  $content = (ISSET($content) && $content != "")?$content : "";
 ?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title><?php echo $title; ?></title>
  <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png"/>
  <link rel="shortcut icon" href="../assets/images/favicon.ico"/>
  <!-- Stylesheets -->
  <link href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/bootstrap/bootstrap-extend.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/site.min.css');?>" rel="stylesheet" />
  <!-- Plugins -->
  <link href="<?php //echo base_url('assets/css/animsition/animsition.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/asscrollable/asScrollable.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/switchery/switchery.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/intro-js/introjs.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/slidepanel/slidePanel.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/flag-icon-css/flag-icon.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/chartist/chartist.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/jvectormap/jquery-jvectormap.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/chartist-plugin-tooltip/chartist-plugin-tooltip.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/v1.css');?>" rel="stylesheet" />
  <link href='<?php echo base_url('assets/css/dropify/dropify.css'); ?>' rel='stylesheet'/>

  <!-- Fonts -->
  <link href="<?php echo base_url('assets/fonts/web-icons/web-icons.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/fonts/brand-icons/brand-icons.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/fonts/weather-icons/weather-icons.css');?>" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic' rel="stylesheet" />
  <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="<?php echo base_url('assets/js/breakpoints/breakpoints.js');?>"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body>
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<header class="header-sticky">
  <nav class="navbar-fixed-top navbar-mega navbar navbar-default" role="navigation">
    <!-- <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <span class="navbar-brand-text hidden-xs-down">CV. Sanjiwani Ar Medika</span>
      <!-- </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div> -->
    <!-- <div class="navbar-container container-fluid navbar-mega"> -->
      <!-- Navbar Collapse -->
      <!-- <div class="container-fluid" style="width: 1250px;"> -->
        <div class="navbar-header">
          <!-- Navbar Toolbar -->
          <!-- <ul class="nav navbar-toolbar navbar-center navbar-toolbar-center"> -->
          <img src='<?php echo base_url("assets/images/sanjiwani.png"); ?>' style="width:100px;height:60px" title="sanjiwani"></img>

        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
          <!-- <div class="menu clearfix sf-js-enabled" style="touch-action: pan-y;"> -->
          <!-- <div class="menu clearfix sf-js-enabled" style="touch-action: pan-y;"> -->
            <ul class="nav navbar-toolbar navbar-right">
              <li class="nav-item" id="toggleMenubar">
                <a class="nav-link" href="#" role="menuitem">LALA
                  <span class="sr-only">LALA</span>
                </a>
              </li>
              <li class="nav-item" id="toggleMenubar">
                <a class="nav-link" href="#" role="menuitem">LALA
                  <span class="sr-only">LALA</span>
                </a>
              </li>
              <li class="nav-item" id="toggleMenubar">
                <a class="nav-link" href="#" role="menuitem">LALA
                  <span class="sr-only">LALA</span>
                </a>
              </li>
            </ul>
          </div>
        <!-- </div> -->
        <!-- Navbar Toolbar -->
        <!-- <ul class="nav navbar-toolbar navbar-center navbar-toolbar-center"> -->
        <!-- <ul class="nav nav-tabs nav-tabs-line">
          <li class="nav-item" id="toggleMenubar">
            <a class="navbar-brand" href="#" role="menuitem">
              <img src='<?php //echo base_url("assets/images/sanjiwani.png"); ?>' style="width:110px;height:70px" title="sanjiwani"></img>
            </a>
          </li>
          <li class="nav-item" id="toggleMenubar">
            <a class="nav-link" href="#" role="menuitem">LALA
                  <span class="sr-only">LALA</span>
            </a>
          </li>
        </ul> -->
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <!-- <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('event/event_list') ?>" role="menuitem">EVENT </a>
          </li>
          <li class="nav-item">
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar icon wb-user" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="../../global/portraits/5.jpg" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="<?php echo site_url('user/user_edit')."/". simple_encrypt(id_user()) ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
              <a class="dropdown-item" href="<?php echo site_url('user/user_gantiPass/')."/". simple_encrypt(id_user()) ?>" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Ubah Password</a>
              <div class="dropdown-divider" role="presentation"></div>
              <a class="dropdown-item" href="<?php echo site_url('discover/keluar') ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
            </div>
          </li>
        </ul> -->
        <!-- End Navbar Toolbar Right -->
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <!-- End Site Navbar Seach -->
    <!-- <header>
        <div class="col-sm-2"> <a id="logo">
      <div class="row">
        <div class="container">
        <div class="panel-header">
            <img src='<?php //echo base_url("assets/images/sanjiwani.png");?>' style="width:110px;height:70px" alt=""> </a>
          </div>
          <div class="col-sm-6">

          </div>
      </div>
    </div>
  </header> -->

    <!-- </div> -->
  <!-- </div> -->
</nav>
</header>



  <!-- Page -->
    <div class="page-content container-fluid">
      <div class="col-xl-12 col-md-12 col-xs-12">
        <div class="row">
        	<div class="panel">
						<div class="panel-body">
						<?php
						echo $content;
						?>
						</div>
	        </div>
        <!-- <div class="col-xxl-5 col-lg-5 col-xs-12"> -->

						<!-- <disini isinya> -->

        <!-- </div> -->
      </div>
    </div>
    <!-- <div class="col-xl-3 col-md-4 col-xs-12">

      disini diisi about perusahaan

    </div> -->
  </div>
  <!-- End Page -->
  <!-- Footer -->
  <footer class="footer-black">
    Crafted with <i class="red-600 wb wb-heart"></i> by <a href="http://themeforest.net/user/amazingSurge">amazingSurge</a>
    <!--div class="site-footer-legal">© 2017 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
    <div class="site-footer-right">-->
    <!-- </div> -->
  </footer>
  <!-- Core  -->
  <script src="<?php  echo base_url('assets/js/babel-external-helpers/babel-external-helpers.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/jquery/jquery.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/tether/tether.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/bootstrap/bootstrap.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/animsition/animsition.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/mousewheel/jquery.mousewheel.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/asscrollbar/jquery-asScrollbar.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/asscrollable/jquery-asScrollable.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/ashoverscroll/jquery-asHoverScroll.js');?>"></script>
  <!-- Plugins -->
  <script src="<?php  echo base_url('assets/js/switchery/switchery.min.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/intro-js/intro.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/screenfull/screenfull.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/slidepanel/jquery-slidePanel.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/skycons/skycons.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/chartist/chartist.min.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/aspieprogress/jquery-asPieProgress.min.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/jvectormap/jquery-jvectormap.min.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/jvectormap/maps/jquery-jvectormap-au-mill-en.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/matchheight/jquery.matchHeight-min.js');?>"></script>
  <!-- Scripts -->
  <script src="<?php  echo base_url('assets/js/js/State.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Component.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Plugin.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Base.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Config.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/Section/Menubar.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/Section/GridMenu.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/Section/Sidebar.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/Section/PageAside.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/Plugin/menu.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/config/colors.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/config/tour.js');?>"></script>
  <script src="<?php  echo base_url('assets/css/dropify/dropify.min.js');?>"></script>
  <script>
  Config.set('assets', '../assets');
  </script>
  <!-- Page -->
  <script src="<?php  echo base_url('assets/js/js/Site.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Plugin/asscrollable.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Plugin/slidepanel.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Plugin/switchery.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Plugin/matchheight.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Plugin/jvectormap.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/Plugin/dropify.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/table-list.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/v1.js');?>"></script>
</body>
</html>

<?php
$this->load->view('footer');
?>

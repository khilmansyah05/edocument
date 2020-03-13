<?php
  $User   = get_profile();
  $meta_title = (ISSET($meta_title) && $meta_title != "")?$meta_title : "";
  $meta_description = (ISSET($meta_description) && $meta_description != "")?$meta_description : "";
  $breadcrumb = (ISSET($breadcrumb) && $breadcrumb != "")?$breadcrumb : "";
  $content = (ISSET($content) && $content != "")?$content : "";
  // $dt = (ISSET($dt) && $dt != "")?$dt : "";

  // foreach ($dt as $datadoc) {
  //   var_dump($datadoc['judul']);
  // }
 ?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title> E - DOCUMENT | <?php echo $title; ?></title>
  <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png"/>
  <link rel="shortcut icon" href="../assets/images/favicon.ico"/>
  <!-- Stylesheets -->
  <link href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/bootstrap/bootstrap-extend.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/site.min.css');?>" rel="stylesheet" />
  <!-- Plugins -->
  <link href="<?php echo base_url('assets/css/animsition/animsition.css');?>" rel="stylesheet" />
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
  <link href="<?php echo base_url('assets/fonts/weather-icons/weather-icons.css');?>" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic' rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
<body class="animsition dashboard">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" style="background-color: #4e97d9;"data-toggle="gridmenu">
        <!--<img class="navbar-brand-logo" src='<?php //echo base_url("assets/images/sanjiwani.png");?>' title="sanjiwani"></img>-->
        <span class="navbar-brand-text hidden-xs-down">PT. Angkasa Pura Support</span>
      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="nav-item hidden-float">
            <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
            role="button">
              <span class="sr-only">Toggle Search</span>
            </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar icon wb-user" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <!-- <span class="avatar avatar-online">
                <img src="../../global/portraits/5.jpg" alt="...">
                <i></i>
              </span> -->
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="<?php echo site_url('user/user_edit')."/". simple_encrypt(id_user()) ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
			  <a class="dropdown-item" href="<?php echo site_url('user/user_gantiPass/')."/". simple_encrypt(id_user()) ?>" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Ubah Password</a>
              <div class="dropdown-divider" role="presentation"></div>
              <a class="dropdown-item" href="<?php echo site_url('discover/keluar') ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
            </div>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <div class="site-menubar">
    <div class="site-menubar-body scrollable scrollable-inverse is-enabled scrollable-vertical hoverscorll-disabled" style="position: relative;">
      <div class="scrollable-container">
        <div class="scrollable-content">
          <ul class="site-menu" data-plugin="menu" style="transform: translate3d(0px, 0px, 0px);">
            <li class="site-menu-category">ADMIN APS</li>
            <li class="site-menu-item has-sub">
              <a  href="<?php echo site_url('discover/dashboard')?>">
                <i class="site-menu-icon wb-home" aria-hidden="true"></i>
                <span class="site-menu-title">Beranda</span>
              </a>


            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                <span class="site-menu-title">User</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item active">
                  <a class="animsition-link" href="<?php echo site_url('user/user_input')?>">
                    <span class="site-menu-title">Tambah User</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo site_url('user/user_list')?>">
                    <span class="site-menu-title">Daftar User</span>
                  </a>
                </li>
                <!-- <li class="site-menu-item">
                  <a class="animsition-link" href="dashboard/ecommerce.html">
                    <span class="site-menu-title">Tidak Terverifikasi</span>
                  </a>
                </li> -->
              </ul>

            </li>

            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                <span class="site-menu-title">Dokument</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo site_url('dokument/dokument_list')?>">
                    <span class="site-menu-title">Daftar Dokument</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo site_url('dokument/dokument_input')?>">
                    <span class="site-menu-title">Upload Dokument</span>
                  </a>
                </li>
                <!-- <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo site_url('event/event_list_done')?>">
                    <span class="site-menu-title">Sudah Dilaksanakan</span>
                  </a>
                </li> -->
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">Profil Perusahaan</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo site_url('info/option_general')?>">
                    <span class="site-menu-title">Edit Profil Umum</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo site_url('info/about_us')?>">
                    <span class="site-menu-title">Edit Tentang Perusahaan</span>
                  </a>
                </li>

              </ul>
            </li>
        </div>
      </div>
    </div>

  </div>

  <!-- Page -->
  <div class="page">
    <div class="page-content container-fluid">
      <div class="header">
            <h2>
              <?php //echo $title; ?>
            </h2>
            <!--<div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
              <?php  /*
                  $list_bread = explode('~', $breadcrumb);
                  $i = 1;
                  foreach ($list_bread as $brd) {
                    if($i == 1){
                      if(ISSET($breadcrumb_icon) && $breadcrumb_icon != ""){
                        $icons = $breadcrumb_icon;
                      }else {
                        $icons = 'fa fa-dashboard';
                      }
                      echo "<li> <a href='#'><i class='fa $icons'></i>$brd</a></li>";
                    }else {
                      echo "<li><a href='#'>$brd</a></li>";
                    }
                    $i++;
                  }
                 */?>
              </ol>
            </div>-->
          </div>
        </div>
      <div class="row">
				<div class="col-sm-12">
          <div class="panel">
            <div class="panel-body">
  						<?php
              echo $content;
  						//echo $footer;//
  						?>
  					</div>
	        </div>
        <!-- <div class="col-xxl-5 col-lg-5 col-xs-12"> -->

						<!-- <disini isinya> -->

        <!-- </div> -->
				</div>
      </div>
    </div>
  </div>
  <!-- End Page -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© 2020 <a href="http://if.undip.ac.id">Angkasa Pura Support</a></div>
    <div class="site-footer-right">
      Crafted by APS
    </div>
  </footer>

  <script type="text/javascript">
			$(function(){
				var navigasi = $('header').offset().top;
				var sticky  = function(){
					var srolltop = $(window).scrollTop();
					if(srolltop > navigasi){
						$('header').addClass('fixed');
					}
					else{
						$('header').removeClass('fixed');
					}
				};
				sticky();
				$(window).scroll(function(){
					sticky();
				});
			});
		</script>

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
  <script src="<?php  echo base_url('assets/js/js/table-list.js');?>"></script>
  <script src="<?php  echo base_url('assets/js/js/jquery.serializeObject.min.js');?>"></script>

  <script src="<?php  echo base_url('assets/js/js/v1.js');?>"></script>
</body>
</html>

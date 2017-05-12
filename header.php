<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mitra Netra
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Developed By Ibrahim Nurandita Isbandiputra | https://linkedin.com/in/ibrahimisbandiputra-->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pustaka Digital Mitra Netra">
  <meta name="author" content="Mitra Netra">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- fullpage -->
  <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/jquery.fullPage.css" />
  <!-- Custom CSS -->
  <link href="<?php echo bloginfo('template_directory'); ?>/css/agency.css" rel="stylesheet">
  <!-- hover -->
  <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/hover.min.css">
  <!-- animate -->
  <link href="<?php echo bloginfo('template_directory'); ?>/css/animate.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
        <!-- wow -->
        <script src="<?php echo bloginfo('template_directory'); ?>/js/wow.min.js"></script>
        <script>
          new WOW().init();
        </script>
        <!-- Smooth Scroll -->
        <script src="<?php echo bloginfo('template_directory'); ?>/js/smooth-scroll.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo bloginfo('template_directory'); ?>/js/agency.js"></script>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
      </head>

      <body id="page-top" class="index">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1623311071261093";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- Navigation -->
        
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
           <!-- Brand and toggle get grouped for better mobile display -->

           <div class="navbar-header page-scroll">
             <div class="wow fadeIn" data-wow-delay="0.2s">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
           </div>
           <div class="wow fadeIn" data-wow-delay="0.2s">
             <a class="navbar-brand page-scroll" href="<?php echo get_site_url() ?>">
              <img class="hvr-grow" style="max-width:200px;margin:-15px;padding-left:20%" src="<?php echo bloginfo('template_directory'); ?>/img/logo-teks.png" alt="Mitra Netra, Meningkatkan Kualitas dan Partisipasi Tunanetra">
            </a>
          </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        <nav id="site-navigation" class="main-navigation" role="navigation" aria-labelledby="Menu Navigasi Utama">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'mitranetra' ); ?></button>
        </nav><!-- #site-navigation -->
        <div class="wow fadeIn" data-wow-delay="0.2s">
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-mid">
             <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false , 'items_wrap' => '%3$s') ); ?>              
           </ul>
           <ul class="nav navbar-nav navbar-right">
            <?php
            if ( is_user_logged_in() ) {
              echo '<a href="'.wp_logout_url( get_permalink() ).'"><button type="button" class="btn btn-menu-login navbar-btn">Logout</button></a>';
            } else {
              echo '<a href="'.wp_login_url( $redirect ).'"><button type="button" class="btn btn-menu-login navbar-btn">Login</button></a>';
              echo '<a href="'.get_site_url().'/register"><button type="button" class="btn btn-menu-register navbar-btn">Register</button></a>';
            }
            ?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    </div>
    <!-- /.container-fluid -->
  </nav>>
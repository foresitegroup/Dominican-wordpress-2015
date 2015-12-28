<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title>
    <?php if(is_home() || is_front_page()) {
      echo get_bloginfo('name').' - '.get_bloginfo('description');
    } else {
      wp_title('');
      echo ' - '.get_bloginfo('name'); 
    }?>
  </title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <script>var oldie = false;</script>
  <!--[if lt IE 9]><script>oldie = true;</script><![endif]-->
  <?php wp_head(); ?>
  <link href='http://fonts.googleapis.com/css?family=Raleway:500|Open+Sans:300,400,500' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/bootstrap-collapse.js"></script>
  <!-- BEGIN Google Analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46122834-1', 'auto');
    ga('send', 'pageview');
  </script>
  <!-- BEGIN Google Analytics -->
</head>

<body>

<div class="topbar">
  <div class="container">
    <?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
    <span class="phone"><i class="fa fa-phone"></i> 414-332-1170</span>
    <div style="clear: both;"></div>
  </div>
</div>

<div class="container">
  <header>
    <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Dominican High School" id="logo"></a>
    
    <a id="menu-toggle" data-toggle="collapse" data-target="#menu-sticky"><i class="fa fa-bars fa-2x"></i></a>

    <div id="menu-sticky" class="collapse">
      <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </div>
  </header>
</div>

<div id="menu-sticky-anchor"></div>

<div style="clear: both;"></div>

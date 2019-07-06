<?php
/**
 * @package:        m_framework
 * Name:            Home Page
 */

/** CYZ VR: View Resources */
$resource_dir = get_admin_assets_dir_url(); ?>

<!DOCTYPE HTML SYSTEM>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="dns-prefetch" href="//google-analytics.com">
  <link rel="dns-prefetch" href="//www.google-analytics.com">
  <link rel="dns-prefetch" href="//ssl.google-analytics.com">
  <meta name="robots" content="noindex,nofollow">
  <meta name="msapplication-tap-highlight" content="no" />

  <style>
    ::-webkit-scrollbar, ::-webkit-scrollbar-track {
      display: none;
    }
  </style>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo:400,400i,700,700i">
  <link rel="stylesheet" href="<?php echo $resource_dir.'/cyzer-icons/style.css'; ?>">
  <link rel="stylesheet" href="<?php echo $resource_dir.'/bootstrap/bootstrap-grid.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo $resource_dir.'/css/core.min.css'; ?>">

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-57x57.png'; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-114x114.png'; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-72x72.png'; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-144x144.png'; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-60x60.png'; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-120x120.png'; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-76x76.png'; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $resource_dir.'/media/favicon/apple-touch-icon-152x152.png'; ?>">

  <link rel="icon" type="image/png" href="<?php echo $resource_dir.'/media/favicon/favicon-196x196.png'; ?>" sizes="196x196"/>
  <link rel="icon" type="image/png" href="<?php echo $resource_dir.'/media/favicon/favicon-96x96.png'; ?>" sizes="96x96"/>
  <link rel="icon" type="image/png" href="<?php echo $resource_dir.'/media/favicon/favicon-32x32.png'; ?>" sizes="32x32"/>
  <link rel="icon" type="image/png" href="<?php echo $resource_dir.'/media/favicon/favicon-16x16.png'; ?>" sizes="16x16"/>
  <link rel="icon" type="image/png" href="<?php echo $resource_dir.'/media/favicon/favicon-128.png'; ?>" sizes="128x128"/>

  <meta name="application-name" content="CYZER"/>
  <meta name="msapplication-TileColor" content="#FFFFFF"/>
  <meta name="msapplication-TileImage" content="<?php echo $resource_dir.'/media/favicon/mstile-144x144.png'; ?>">
  <meta name="msapplication-square70x70logo" content="<?php echo $resource_dir.'/media/favicon/mstile-70x70.png'; ?>">
  <meta name="msapplication-square150x150logo" content="<?php echo $resource_dir.'/media/favicon/mstile-150x150.png'; ?>">
  <meta name="msapplication-wide310x150logo" content="<?php echo $resource_dir.'/media/favicon/mstile-310x150.png'; ?>">
  <meta name="msapplication-square310x310logo" content="<?php echo $resource_dir.'/media/favicon/mstile-310x310.png'; ?>">
</head>

<body>

<header class="top-header bg-primary">
  <!-- Drawer -->
  <div id="drawer" class="drawer cta bg-primary dark-1 transition" onClick="return toggle_menu(1);">
    <span class="bg-white"></span>
    <span class="bg-white"></span>
    <span class="bg-white"></span>
    <span class="bg-white"></span>
  </div>

  <!-- Open App in New Window -->
  <!-- <a class="open-app" href="<?php echo get_home_url(); ?>" target="_blank">
    <span class="cyz-ico cyz-ico-open-app"></span>
  </a> -->

  <!-- Text Logo -->
  <div class="img-logo pull-left">
    <img src="<?php echo $resource_dir.'/media/logo/cyzer-logo-sm-white.png'; ?>">
  </div>

  <!-- Header Block -->
  <div class="header-block pull-right dropdown-block">
    <div class="cta bg-primary dark-1">
      <span class="text-white">DevGK</span>
      <span class="bg-white text-primary">SUPER ADMIN PANEL</span>
    </div>
    <div class="dropdown bg-primary dark-1">
      <a href="<?php echo get_home_url().'/su-panel/profile/' ?>" class="text-white">Edit Profile</a>
      <a href="<?php echo get_home_url().'/su-panel/logout/' ?>" class="text-white">Logout</a>
    </div>
  </div>

  <!-- CTA Icons -->
  <div class="right-cta-icons">
    <!-- Search Icons -->
    <span class="cyz-ico cyz-ico-search text-white"></span>

    <!-- Notifications -->
    <span class="cyz-ico notification cyz-ico-notifications text-white"></span>
  </div>

  <div class="loading-bar">
    <div class="loader"></div>
  </div>
</header>

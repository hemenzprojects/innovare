<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-multi-level-menu-template/login-with-navbar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Dec 2020 16:44:04 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="<?php echo $properties['title']?>">
    <title>Login <?php echo $properties['title']?></title>
     <link rel="apple-touch-icon" href="<?php echo $properties['staticurl']?>app-assets/images/logo/innovare_favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $properties['staticurl']?>app-assets/images/logo/innovare_favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $properties['staticurl']?>app-assets/css/vendors.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $properties['staticurl']?>app-assets/css/app.min.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $properties['staticurl']?>app-assets/css/core/menu/menu-types/vertical-multi-level-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $properties['staticurl']?>app-assets/css/pages/login-register.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $properties['staticurl']?>app-assets/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.min.css">
    
    <!-- END Custom CSS-->
    <style type="text/css">
      .brand-logo{
        width: unset !important;
      }
      .nav-item{
        padding-bottom: 10px;
      }
      .form-control-position{
        top:0px !important;
      }
    </style>
  </head>
  <body class="vertical-layout vertical-mmenu 1-column bg-full-screen-image bg-lighten-2 menu-expanded fixed-navbar" data-open="click" data-menu="vertical-mmenu" data-col="1-column">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                <i class="ft-menu font-large-1"></i>
              </a>
            </li>
            <li class="nav-item" sty>
              <a class="navbar-brand" href="<?php echo $properties['baseurl']?>">
                <img class="brand-logo" alt="Innovare admin logo" src="<?php echo $properties['staticurl']?>app-assets/images/logo/logo.png">
                <!-- <h3 class="brand-text" style="text-align: center;">Innovare learning</h3></a></li> -->
            <li class="nav-item d-md-none">
              <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
            </li>
          </ul>
        </div>

        <div class="navbar-container">
          <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
            <ul class="nav navbar-nav">
              <li class="nav-item">
                <!-- <a class="nav-link mr-2 nav-link-label" href="index-2.html"><i class="ficon ft-arrow-left"></i></a> -->
              </li>
              <li class="dropdown nav-item">
                <a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-settings"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
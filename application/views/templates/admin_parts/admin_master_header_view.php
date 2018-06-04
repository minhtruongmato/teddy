<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Mato Creative | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/font-awesome.min.css">
    <!-- Datetime Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/daterangepicker-bs3.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>iCheck/square/blue.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>dist/css/skins/skin-black-light.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/') ?>sass/pikaday.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&amp;subset=latin-ext" rel="stylesheet">

    <!-- Library JS called-->
    <!-- jQuery 3 -->
    <script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo site_url('') ?>tinymce/tinymce.min.js"></script>



</head>

<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
<!-- <?php if ($this->ion_auth->logged_in()): ?> -->
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('admin/dashboard')?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>Controller</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo site_url('assets/lib/dist/img/user.jpg') ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php 
                                    if ($this->ion_auth->logged_in()) {
                                        echo $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name;
                                    }
                                ?> 
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo site_url('assets/lib/dist/img/user.jpg') ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php 
                                    if ($this->ion_auth->logged_in()) {
                                        echo $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name;
                                    }
                                    ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="javascript:void(0);" class="btn btn-default btn-flat" onclick="logout();">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!-- <?php endif ?> -->
    <!-- Left side column. contains the logo and sidebar -->


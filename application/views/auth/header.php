<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frameworks/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frameworks/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frameworks/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frameworks/bootstrap/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frameworks/adminlte/css/adminlte.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url();?>assets/frameworks/adminlte/css/skins/_all-skins.min.css">

   <!-- Google Font -->
   <link rel="stylesheet"
   href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>
 <body class="skin-blue sidebar-mini wysihtml5-supported">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="<?php echo base_url()."auth"; ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="" class="sidebar-toggle" data-target="#sidebar" data-toggle="push-menu" role="button">

          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">


            <li class="dropdown user user-menu">  
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <span class="hidden-xs">
                  <?php 
                  $user = $this->session->userdata('user');
                  if(!empty($user))
                  {
                    echo $user;  
                  }
                  ?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header" style="height: auto;">
                  

                  <p style="color: #000;">
                    <?php 
                    $user = $this->session->userdata('user');
                    if(!empty($user))
                    {
                      echo $user;  
                    }
                    ?>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull xs-12">
                    <a href="<?php echo base_url().'auth/logout'; ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar" id="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

          <div class="pull-left info">
            <p>
              <?php 
              $user = $this->session->userdata('user');
              if(!empty($user))
              {
                echo $user;  
              }
              ?>
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
          <br/>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
            <a href="<?php echo base_url()."auth"; ?>">
              <i class="fa fa-th"></i> <span>Home</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url()."auth/create_user"; ?>"><i class="fa fa-circle-o"></i> Add user</a></li>
              <li><a href="<?php echo base_url()."auth/view_user"; ?>"><i class="fa fa-circle-o"></i> View User</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Groups</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url()."auth/create_group"; ?>"><i class="fa fa-circle-o"></i> Add Groups</a></li>
              <li><a href="<?php echo base_url()."auth/view_group"; ?>"><i class="fa fa-circle-o"></i> View Groups</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url()."admin/category_add"; ?>"><i class="fa fa-circle-o"></i> Add Category</a></li>
              <li><a href="<?php echo base_url()."admin/category_view"; ?>"><i class="fa fa-circle-o"></i> View Category</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url()."admin/product_add"; ?>"><i class="fa fa-circle-o"></i> Add Product</a></li>
              <li><a href="<?php echo base_url()."admin/product_view"; ?>"><i class="fa fa-circle-o"></i> View Product</a></li>
            </ul>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
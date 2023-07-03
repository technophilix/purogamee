<?php if (!$this->session->userdata('loged_in')) {
  redirect(base_url() . "backoffice");
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/dist/css/AdminLTE.css?<?php echo time() ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>includes/datatables/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>includes/backend/plugins/datatables/dataTables.bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>includes/backend/dist/css/jquery-confirm.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>includes/jodit/build/jodit.min.css">
  <script src="<?php echo base_url() ?>includes/jodit/build/jodit.min.js"></script>
  <link rel="icon" type="image/png" href="<?php echo base_url() . $this->Site->getSitedata()->logo ?>" />



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
  .sidebar-menu>li>a>.fas,
  .sidebar-menu>li>a>.fab,
  .sidebar-menu .treeview-menu>li>a>.fas,
  .sidebar-menu .treeview-menu>li>a>.fab {

    margin-right: 3%;
  }

  .form_error{
color:RED !important

  }
</style>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url() ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><?php echo substr($this->Site->getSitedata()->name,0, 1) ?></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo $this->Site->getSitedata()->name ?> </b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><i class="fas fa-bars"></i> </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="far fa-envelope"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>includes/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li><!-- end message -->
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>includes/backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          AdminLTE Design Team
                          <small><i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>includes/backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Developers
                          <small><i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>includes/backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Sales Department
                          <small><i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>includes/backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Reviewers
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="far fa-comment"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="far fa-flag"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Create a nice theme
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Some task I need to do
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Make beautiful transitions
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url() . $this->Site->getSitedata()->logo ?>" alt="User Image" style="width:18px;height:18px"> <span class="hidden-xs"><?php echo $this->Site->getSitedata()->name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url() . $this->Site->getSitedata()->logo ?>" alt="User Image" style="width:68px;height:68px">
                  <p>
                    <?php echo $this->session->userdata('name');
                    if ($this->session->userdata('role') == "super") {
                      echo " (Admin)";
                    } ?>
                    <small>Member since <?php echo date('M, Y', strtotime($this->session->userdata('join'))) ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url() ?>backoffice/changepassword" class="btn btn-default btn-flat">Change Password</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo  base_url() ?>backoffice/logout" class="btn btn-default btn-flat">Sign out</a>
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
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url() . $this->Site->getSitedata()->logo ?>" alt="User Image" style="width:40px;height:40px">

          </div>
          <div class="pull-left info">
            <p><?php echo $this->Site->getSitedata()->name ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <li><a href="<?php echo base_url() ?>backoffice/home"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
          
          <li class="treeview">
            <a href="#">
              <i class="fas fa-swatchbook"></i>
              <span>Page</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url() ?>backoffice/postcreate/page"><i class="fas fa-pen-nib"></i> New Page</a></li>
              <li><a href="<?php echo base_url() ?>backoffice/postarchive/page"><i class="fas fa-archive"></i></i> Page List</a></li>

            </ul>
          </li>
          
          
          
          
          
          <li class="treeview">
            <a href="#">
              <i class="fab fa-blogger-b"></i>
              <span>Post</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url() ?>backoffice/postcreate"><i class="fas fa-pen-nib"></i> New Post</a></li>
              <li><a href="<?php echo base_url() ?>backoffice/postarchive"><i class="fas fa-archive"></i></i> Post Archive</a></li>

            </ul>
          </li>
          <li><a href="<?php echo base_url() ?>backoffice/category"><i class="fas fa-list"></i> <span>Category</span></a></li>
          <li><a href="<?php echo base_url() ?>backoffice/media"><i class="fas fa-photo-video"></i><span>Media</span></a></li>
          <li><a href="<?php echo base_url() ?>backoffice/createissue"><i class="fa fa-passport"></i><span>Issue</span></a></li>

          <?php if ($this->session->userdata('role') == "super") { ?>

            <li><a href="<?php echo base_url() ?>backoffice/filemanager" target="_new"><i class="fas fa-code"></i><span>Code Editor</span> </a> </li>

            <li><a href="<?php echo base_url() ?>backoffice/user"><i class="fas fa-users"></i><span>Users</span></a></li>

            <li><a href="<?php echo base_url() ?>backoffice/backup"><i class="fas fa-database"></i><span>Data back-up</span></a></li>
            <li><a href="<?php echo base_url() ?>backoffice/newsletter"><i class="fas fa-newspaper"></i><span>News Letter </span></a></li>
            <li><a href="<?php echo base_url() ?>backoffice/updatesiteinfo"><i class="fas fa-globe"></i><span>Site Info </span></a></li>

          <?php } ?>

          <!-- <li><a href="pages/calendar.html"><i class="fas fa-calendar-alt"></i> <span>Calendar</span><small class="label pull-right bg-red">3</small></a></li> -->


          <?php if ($this->session->userdata('role') == "super") { ?>
            <li><a href="pages/mailbox/mailbox.html"><i class="fas fa-envelope-open-text"></i><span>Mailbox</span><small class="label pull-right bg-yellow">12</small></a></li>


            <li><a href="documentation/index.html"><i class="fas fa-book"></i> <span>Documentation</span></a></li>
          <?php } ?>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
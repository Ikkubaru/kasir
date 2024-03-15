<!DOCTYPE html>
<html lang="en">

<head>
   <title><?= $judul_halaman ?></title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>assets/icon/themify-icons/themify-icons.css">

   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>assets/icon/icofont/css/icofont.css">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>assets/icon/simple-line-icons/css/simple-line-icons.css">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>assets/plugins/bootstrap/css/bootstrap.min.css">

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="<?= base_url('assets/');?>assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">

   <!-- Weather css -->
   <link href="<?= base_url('assets/');?>assets/css/svg-weather.css" rel="stylesheet">


   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>assets/css/main.css">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>assets/css/responsive.css">

</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">

               <ul class="top-nav">
                  <!-- window screen -->
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                     </a>

                  </li>
                  <!-- User Menu-->
                  <li class="dropdown">
                     <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        <span><?= $this->session->userdata('nama') ?><i class=" icofont icofont-simple-down"></i></span>

                     </a>
                     <ul class="dropdown-menu settings-menu">
                        <li><?= $this->session->userdata('level') ?></></li>
                        <a href="<?= base_url('auth/logout') ?>"><li><i class="icon-logout"></i> Logout</li></a>

                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
               <?php $halaman=$this->uri->segment(1);?>
                <li class="nav-level">--- Navigation</li>
                <li class="<?php if($halaman == 'home'){echo "active";} ?> treeview">
                    <a class="waves-effect waves-dark" href="<?= base_url('home');?>">
                        <i class="icon-home"></i><span> Dashboard</span>
                    </a>                
                </li>
                <li class="nav-level">--- Components</li>
                <li class="<?php if($halaman == 'pelanggan'){echo "active";} ?> treeview">
                    <a class="waves-effect waves-dark" href="<?= base_url('pelanggan');?>">
                        <i class="icon-people"></i><span> Pelanggan</span>
                    </a>                
                </li>
                <li class="<?php if($halaman == 'penjualan'){echo "active";} ?> treeview">
                    <a class="waves-effect waves-dark" href="<?= base_url('penjualan');?>">
                        <i class="icon-basket"></i><span> Penjualan</span>
                    </a>                
                </li>
                <?php if($this->session->userdata('level')=='admin'){ ?>
                <li class="<?php if($halaman == 'produk'){echo "active";} ?> treeview">
                    <a class="waves-effect waves-dark" href="<?= base_url('produk');?>">
                        <i class="icon-handbag"></i><span> Produk</span>
                    </a>                
                </li>
                <li class="<?php if($halaman == 'pengguna'){echo "active";} ?> treeview">
                    <a class="waves-effect waves-dark" href="<?= base_url('pengguna');?>">
                        <i class="icon-user-follow"></i><span> Pengguna</span>
                    </a>                
                </li>
                <?php } ?>
                <li class="<?php if($halaman == 'suara'){echo "active";} ?> treeview">
                    <a class="waves-effect waves-dark" href="<?= base_url('suara');?>">
                        <i class="icon-user-follow"></i><span> Rekap Suara Pilpres 2024</span>
                    </a>                
                </li>
            </ul>
         </section>
      </aside>
      <!-- Container-fluid starts -->
      <div class="content-wrapper">
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
               </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row dashboard-header">
               <div class="col-lg-12 col-md-6">
                  <div class="card dashboard-product">
                     <h2 class="dashboard-total-products"><?= $judul_halaman ?></h2>
                        <div id="hilang">
                           <?= $this->session->flashdata('notif',TRUE);?>
                        </div>
                     </div>
                     <?= $contents ?>
               </div>
            </div>
            <!-- 4-blocks row end -->
         </div>
         <!-- Main content ends -->
         <!-- Container-fluid ends -->
      </div>
   </div>


   <!-- Required Jqurey -->
   <script src="<?= base_url('assets/');?>assets/plugins/Jquery/dist/jquery.min.js"></script>
   <script src="<?= base_url('assets/');?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="<?= base_url('assets/');?>assets/plugins/tether/dist/js/tether.min.js"></script>

   <!-- Required Fremwork -->
   <script src="<?= base_url('assets/');?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   <!-- Scrollbar JS-->
   <script src="<?= base_url('assets/');?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script src="<?= base_url('assets/');?>assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

   <!--classic JS-->
   <script src="<?= base_url('assets/');?>assets/plugins/classie/classie.js"></script>

   <!-- notification -->
   <script src="<?= base_url('assets/');?>assets/plugins/notification/js/bootstrap-growl.min.js"></script>

   <!-- Sparkline charts -->
   <script src="<?= base_url('assets/');?>assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

   <!-- Counter js  -->
   <script src="<?= base_url('assets/');?>assets/plugins/waypoints/jquery.waypoints.min.js"></script>
   <script src="<?= base_url('assets/');?>assets/plugins/countdown/js/jquery.counterup.js"></script>

   <!-- Echart js -->
   <script src="assets/plugins/charts/echarts/js/echarts-all.js"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script>

   <!-- custom js -->
   <script type="text/javascript" src="<?= base_url('assets/');?>assets/js/main.min.js"></script>
   <script type="text/javascript" src="<?= base_url('assets/');?>assets/pages/dashboard.js"></script>
   <script type="text/javascript" src="<?= base_url('assets/');?>assets/pages/elements.js"></script>
   <script src="<?= base_url('assets/');?>assets/js/menu.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>
<script>
    $('#hilang').delay('slow').slideDown('slow').delay('1000').slideUp('600');
  </script>
</body>

</html>

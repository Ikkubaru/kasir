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
<body>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" method="post" action="<?= base_url('auth/login') ?>"> 
						<div class="text-center">
						</div>
                        <div id="hilang">
                           <?= $this->session->flashdata('notif',TRUE);?>
                        </div>
						<h3 class="text-center txt-primary">
							Login
						</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="text" class="md-form-control" name="username" required="required"/>
									<label>Username</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="password" class="md-form-control" name="password" required="required"/>
									<label>Password</label>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">

								</div>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>
<!-- Warning Section Ends -->
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
    $('#hilang').delay('slow').slideDown('slow').delay('1000').slideUp('600');
  </script>
</body>

</html>

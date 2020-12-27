<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Dashboard"; ?>
	<?php include_once($filepath . '/inc/head.php'); ?>
</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">

	<!-- BEGIN HEADER -->
	<?php include_once($filepath . '/inc/header.php'); ?>
	<!-- END HEADER -->

	<!-- BEGIN HEADER & CONTENT DIVIDER -->
	<div class="clearfix"> </div>
	<!-- END HEADER & CONTENT DIVIDER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">

		<!-- BEGIN SIDEBAR -->
		<?php include_once($filepath . '/inc/sidebar.php'); ?>
		<!-- END SIDEBAR -->

		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<!-- BEGIN CONTENT BODY -->
			<div class="page-content">

				<!-- BEGIN PAGE HEAD-->
				<div class="page-head">
					<!-- BEGIN PAGE TITLE -->
					<div class="page-title">
						<h1>Admin Dashboard
							<small>statistics, charts, recent events and reports</small>
						</h1>
					</div>
					<!-- END PAGE TITLE -->
				</div>
				<!-- END PAGE HEAD-->

				<!-- BEGIN PAGE BREADCRUMB -->
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<a href="index.php">Home</a>
						<i class="fa fa-circle"></i>
					</li>
					<li>
						<span class="active">Dashboard</span>
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->

				<!-- BEGIN PAGE BASE CONTENT -->
				<!-- BEGIN DASHBOARD STATS 1-->
				<?php include_once($filepath . '/inc/stats.php'); ?>
				<!-- END DASHBOARD STATS 1-->

				<!-- END PAGE BASE CONTENT -->
			</div>
			<!-- END CONTENT BODY -->
		</div>
		<!-- END CONTENT -->

		<!-- BEGIN QUICK SIDEBAR -->
		<?php include_once($filepath . '/inc/quick-sidebar.php'); ?>
		<!-- END QUICK SIDEBAR -->
		
	</div>
	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->
	<?php include_once($filepath . '/inc/footer.php'); ?>
	<!-- END FOOTER -->

	<!-- BEGIN QUICK NAV -->
	<div class="quick-nav-overlay"></div>
	<!-- END QUICK NAV -->

	<?php include_once($filepath . '/inc/scripts.php'); ?>
</body>
</html>
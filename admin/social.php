<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Social Links"; ?>
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
		<?php include_once($filepath . '/../inc/sidebar.php'); ?>
		<!-- END SIDEBAR -->

		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<!-- BEGIN CONTENT BODY -->
			<div class="page-content">

				<!-- BEGIN PAGE HEAD-->
				<div class="page-head">
					<!-- BEGIN PAGE TITLE -->
					<div class="page-title">
						<h1><?php echo $page_title; ?></h1>
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
						<span class="active"><?php echo $page_title; ?></span>
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->

				<?php
				$query = "SELECT * FROM social";
				$result = $db->select($query);
				if ($result != false) {
					$row = $result->fetch_assoc();
					$facebook = $row['fb_url'];
					$twitter = $row['twitter_url'];
					$instagram = $row['instagram_url'];
					$youtube = $row['youtube_url'];
				} else {
					echo 'No Data';
				}

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$facebook = mysqli_real_escape_string($db->con, $_POST['facebook']);
					$twitter = mysqli_real_escape_string($db->con, $_POST['twitter']);
					$instagram = mysqli_real_escape_string($db->con, $_POST['instagram']);
					$youtube = mysqli_real_escape_string($db->con, $_POST['youtube']);

					$query = "UPDATE `social` SET `fb_url` = '$facebook', `twitter_url` = '$twitter', `instagram_url` = '$instagram', `youtube_url` = '$youtube'";
					$result = $db->update($query);
					if ($result != false) {
						header('Location: social.php');
					}
				}
				?>

				<!-- BEGIN PAGE BASE CONTENT -->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet light portlet-fit portlet-form bordered">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-settings font-dark"></i>
									<span class="caption-subject font-dark sbold uppercase"><?php echo $page_title; ?></span>
								</div>
								<div class="actions"></div>
							</div>
							<div class="portlet-body">
								<!-- BEGIN FORM-->
								<form action="" class="form-horizontal" method="POST">
									<div class="form-body">

										<div class="form-group">
											<label class="control-label col-md-2">Facebook url:
												<span class="required"> * </span>
											</label>
											<div class="col-md-10">
												<input type="text" name="facebook" class="form-control" value="<?php echo $facebook; ?>" />
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Twitter url:
												<span class="required"> * </span>
											</label>
											<div class="col-md-10">
												<input type="text" name="twitter" class="form-control" value="<?php echo $twitter; ?>" />
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Instagram url:
												<span class="required"> * </span>
											</label>
											<div class="col-md-10">
												<input type="text" name="instagram" class="form-control" value="<?php echo $instagram; ?>" />
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Youtube url:
												<span class="required"> * </span>
											</label>
											<div class="col-md-10">
												<input type="text" name="youtube" class="form-control" value="<?php echo $youtube; ?>" />
											</div>
										</div>

									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-11 col-md-1">
												<button type="submit" name="submit" class="btn green">Edit</button>
											</div>
										</div>
									</div>
								</form>
								<!-- END FORM-->
							</div>
							<!-- END VALIDATION STATES-->
						</div>
					</div>
				</div>
				<!-- END PAGE BASE CONTENT -->

			</div>
			<!-- END CONTENT BODY -->
		</div>
		<!-- END CONTENT -->

		<!-- BEGIN QUICK SIDEBAR -->
		<?php include_once($filepath . '/../inc/quick-sidebar.php'); ?>
		<!-- END QUICK SIDEBAR -->

	</div>
	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->
	<?php include_once($filepath . '/../inc/footer.php'); ?>
	<!-- END FOOTER -->

	<!-- BEGIN QUICK NAV -->
	<div class="quick-nav-overlay"></div>
	<!-- END QUICK NAV -->

	<?php include_once($filepath . '/../inc/scripts.php'); ?>
</body>
</html>
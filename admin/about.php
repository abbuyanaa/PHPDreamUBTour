<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "About Mongolia"; ?>
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
				$select_query = "SELECT * FROM `about` WHERE `id` = '1'";
				$result = $db->select($select_query);
				if ($result != false) {
					$row = $result->fetch_assoc();
					$title = $row['title'];
					$body = $row['body'];
					$langid = $row['lang_id'];
				}

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$title = mysqli_real_escape_string($db->con, $_POST['title']);
					$body = mysqli_real_escape_string($db->con, $_POST['body']);
					if (empty($title) or empty($body)) {
						echo $db->result(2, 'Please Must Fields Empty!');
					} else {
						$query = "UPDATE `about` SET `title` = '$title', `body` = '$body' WHERE `id` = '1'";
						$result = $db->update($query);
						if ($result != false) {
							header('Location: about.php');
						} else {
							echo $db->result(2, 'Data Has Not Been Updated');
						}
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
											<label class="control-label col-md-2">Title
												<span class="required"> * </span>
											</label>
											<div class="col-md-10">
												<input type="text" name="title" class="form-control" value="<?php echo $title; ?>" />
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Body
												<span class="required"> * </span>
											</label>
											<div class="col-md-10">
												<textarea class="form-control" name="body" rows="6"><?php echo $body; ?></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Language
												<span class="required"> * </span>
											</label>
											<div class="col-md-10">
											<select class="form-control" name="lang">
												<option value="0">Choose...</option>
												<?php
												$lang_query = "SELECT * FROM `language`";
												$result = $db->select($lang_query);
												if ($result != false) {
													while ($row = $result->fetch_assoc()) {
														?>
														<option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $langid) echo 'selected'; ?>><?php echo $row['name']; ?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</div>
										</div>

									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-10 col-md-2">
												<button type="submit" name="submit" class="btn green">Update</button>
												<!-- <button type="button" class="btn default">Cancel</button> -->
											</div>
										</div>
									</div>
								</form>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END VALIDATION STATES-->

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
<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "News Add"; ?>
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
						<a href="news.php">News List</a>
						<i class="fa fa-circle"></i>
					</li>
					<li>
						<span class="active"><?php echo $page_title; ?></span>
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->

				<?php
				if (isset($_GET['edit']) && $_GET['edit'] != NULL) {
					$edit_id = $_GET['edit'];
					$select_query = "SELECT * FROM `news` WHERE `id` = '$edit_id'";
					$result = $db->select($select_query);
					if ($result != false) {
						$row = $result->fetch_assoc();
						$title = $row['title'];
						$body = $row['body'];
						$lang = $row['lang_id'];
					} else {
						echo 'No Data';
					}
				} else {
					echo 'Not URL';
				}

				// News Edit
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$etitle 	= mysqli_real_escape_string($db->con, $_POST['title']);
					$edesc 		= mysqli_real_escape_string($db->con, $_POST['desc']);
					$elang 		= $_POST['lang'];

					if (empty($etitle) or empty($edesc) or $elang == 0) {
						echo '<script>alert(\'Please Must Fields Empty!\')</script>';
					} else {
						$update_query = "UPDATE `news` SET `title`='$etitle', `body`='$edesc', `lang_id`='$elang' WHERE `id`='$edit_id'";
						$result = $db->insert($update_query);
						if ($result != false) {
							header('Location: news.php');
						} else {
							echo '<script>alert(\'Data Has Not Been Inserted!\')</script>';
						}
					}
				}
				?>

				<!-- BEGIN PAGE BASE CONTENT -->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-settings font-dark"></i>
									<span class="caption-subject font-dark sbold uppercase"><?php echo $page_title; ?></span>
								</div>
								<div class="actions"></div>
							</div>
							<div class="portlet-body">
								<form action="" method="post">
									<div class="form-group">
										<label>Title</label>
										<input type="text" name="title" class="form-control" value="<?php echo $title; ?>" />
									</div>

									<div class="form-group">
										<label>Description</label>
										<textarea class="ckeditor form-control" id="ckeditor" name="desc" rows="6"><?php echo $body; ?></textarea>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Language</label>
												<select class="form-control" name="lang">
													<option value="0">Choose...</option>
													<?php
													$lang_query = "SELECT * FROM `language`";
													$result = $db->select($lang_query);
													if ($result != false) {
														while ($row = $result->fetch_assoc()) {
															?>
															<option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $lang) echo 'selected'; ?>><?php echo $row['name']; ?></option>
														<?php } ?>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>

									<div class="form-actions">
										<div class="row">
											<div class="col-md-2">
												<button type="submit" name="submit" class="btn green">Edit News</button>
											</div>
										</div>
									</div>
								</form>
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
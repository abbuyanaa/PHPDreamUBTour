<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Post Edit"; ?>
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
						<a href="post.php">Post List</a>
						<i class="fa fa-circle"></i>
					</li>
					<li>
						<span class="active"><?php echo $page_title; ?></span>
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->

				<?php
				// Variable's
				$edit_id = 0;
				$etitle = '';
				$ebody = '';
				$eprice = 0;
				$ebairshil = 0;
				$ecat = 0;
				$elang = 0;

				// Get ID
				if (isset($_GET['edit']) && $_GET['edit'] != NULL) {
					$edit_id = $_GET['edit'];
					$select_query = "SELECT * FROM `posts` WHERE `id` = '$edit_id'";
					$result = $db->select($select_query);
					if ($result != false) {
						$row = $result->fetch_assoc();
						$title = $row['title'];
						$body = $row['body'];
						$price = $row['price'];
						$bairshil = $row['bairshil_id'];
						$cat = $row['cat_id'];
						$lang = $row['lang_id'];
					} else {
						header('Location: post.php');
					}
				} else {
					header('Location: post.php');
				}

				// Edit Post
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$etitle 	= mysqli_real_escape_string($db->con, $_POST['title']);
					$edesc 		= mysqli_real_escape_string($db->con, $_POST['desc']);
					$eprice 	= $_POST['price'];
					$elang 		= $_POST['lang'];
					$ebairshil 	= $_POST['bairshil'];
					$ecat 		= $_POST['cat'];

					if (empty($etitle) or empty($edesc) or $eprice == 0 or $elang == 0 or $ebairshil == 0 or $ecat == 0) {
						echo '<script>alert(\'Please Must Fields Empty!\')</script>';
					} else {
						$update_query = "UPDATE `posts` SET `title`='$etitle', `body`='$edesc', `price`='$eprice', `bairshil_id`='$ebairshil', `cat_id`='$ecat', `lang_id`='$elang' WHERE `id` = '$edit_id'";
						$result = $db->insert($update_query);
						if ($result != false) {
							header('Location: post.php');
						} else {
							echo '<script>alert(\'Data Has Not Been Inserted\')</script>';
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
										<div class="col-md-6">
											<div class="form-group">
												<label>Price</label>
												<input type="number" name="price" value="<?php echo $price; ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-6">
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
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Address</label>
												<select class="form-control" name="bairshil">
													<option value="0">Choose...</option>
													<?php
													$bairshil_query = "SELECT * FROM `bairshil` ORDER BY `name` ASC";
													$result = $db->select($bairshil_query);
													if ($result != false) {
														while ($row = $result->fetch_assoc()) {
															?>
															<option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $bairshil) echo 'selected'; ?>><?php echo $row['name']; ?></option>
														<?php } ?>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Category</label>
												<select class="form-control" name="cat">
													<option value="0">Choose...</option>
													<?php
													$cat_query = "SELECT * FROM `category` ORDER BY `name` ASC";
													$result = $db->select($cat_query);
													if ($result != false) {
														while ($row = $result->fetch_assoc()) {
															?>
															<option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $cat) echo 'selected'; ?>><?php echo $row['name']; ?></option>
														<?php } ?>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>

									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-10 col-md-2">
												<button type="submit" name="submit" class="btn green">Edit Post</button>
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
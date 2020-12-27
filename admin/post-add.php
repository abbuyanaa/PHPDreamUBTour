<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Post Add"; ?>
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
				// Post Add
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$title 		= mysqli_real_escape_string($db->con, $_POST['title']);
					$desc 		= mysqli_real_escape_string($db->con, $_POST['desc']);
					$price 		= $_POST['price'];
					$lang 		= $_POST['lang'];
					$bairshil 	= $_POST['bairshil'];
					$cat 		= $_POST['cat'];

					if (empty($title) or empty($desc) or $price == 0 or $lang == 0 or $bairshil == 0 or $cat == 0) {
						echo '<script>alert(\'Please Must Fields Empty!\')</script>';
					} else {
						$insert_query = "INSERT INTO `posts`(`title`, `body`, `price`, `bairshil_id`, `cat_id`, `lang_id`, `created_at`) VALUES ";
						$insert_query .= "('$title', '$desc', '$price', '$bairshil', '$cat', '$lang', NOW())";
						$result = $db->insert($insert_query);
						if ($result != false) {
							header('Location: post.php');
						} else {
							echo 'Data Has Not Been Inserted';
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
										<input type="text" name="title" class="form-control" />
									</div>
									<div class="form-group">
										<label>Description</label>
										<textarea class="ckeditor form-control" id="ckeditor" name="desc" rows="6"></textarea>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Price</label>
												<input type="number" name="price" value="0" class="form-control" />
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
															<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
															<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
															<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
														<?php } ?>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>

									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-10 col-md-2">
												<button type="submit" name="submit" class="btn green">Add Post</button>
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
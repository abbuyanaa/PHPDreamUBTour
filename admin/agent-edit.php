<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Agent Edit"; ?>
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
						<a href="agents.php">Agents List</a>
						<i class="fa fa-circle"></i>
					</li>
					<li>
						<span class="active"><?php echo $page_title; ?></span>
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->

				<?php
				// GET ID
				if (isset($_GET['edit']) && $_GET['edit'] != NULL) {
					$edit_id = $_GET['edit'];
					$query = "SELECT * FROM `agents` WHERE `id` = $edit_id";
					$result = $db->select($query);
					if ($result != false) {
						$row = $result->fetch_assoc();
						$fname = $row['first_name'];
						$lname = $row['last_name'];
						$get_image = $row['profile'];
						$email = $row['email'];
						$phone = $row['phone'];
						$lang_id = $row['lang_id'];
					}
				} else {
					header('Location: agents.php');
				}

				// Edit Agent
				if (isset($_POST['edit'])) {
					$file_name = $_FILES['image']['name'];
					$file_tmp = $_FILES['image']['tmp_name'];
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];
					$lang = $_POST['lang'];

					if (empty($fname) or empty($lname) or empty($email) or empty($phone) or $lang == 0) {
						echo $db->result(2, 'Please Must Fields Empty!');
					} else {
						if (!empty($file_name)) {
							$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
							$permited = array('gif','jpg','jpeg','png');
							$unique = date('Ymd').'_'.substr(md5(time()), 1, 10).'.'.$file_ext;
							if (in_array($file_ext, $permited) === false) {
								echo $db->result(2, 'Image file extension correct: ' . implode(', ', $permited));
							} else {
								$query = "UPDATE `agents` SET `first_name`='$fname', `last_name`='$lname', `email`='$email', `profile`='$unique', `phone`='$phone', `lang_id`='$lang' WHERE `id` = '$edit_id'";
								$update = $db->update($query);
								if ($update != false) {
									if (file_exists('../agents/'.$get_image)) {
										unlink('../agents/'.$get_image);
									}
									if (move_uploaded_file($file_tmp, '../agents/'.$unique)) {
										header('Location: agents.php');
									} else {
										echo $db->result(2, 'Image File has not been Upload!');
									}
								} else {
									echo $db->result(2, 'Data Has Not Been Inserted!');
								}
							}
						} else {
							$query = "UPDATE `agents` SET `first_name`='$fname', `last_name`='$lname', `email`='$email', `phone`='$phone', `lang_id`='$lang' WHERE `id` = '$edit_id'";
							$update = $db->update($query);
							if ($update != false) {
								echo $db->result(1, 'Image File has not been Upload!');
							} else {
								echo $db->result(2, 'Data Has Not Been Inserted!');
							}
						}
					}
				}
				?>

				<!-- BEGIN PAGE BASE CONTENT -->
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet light portlet-fit portlet-form bordered">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-settings font-dark"></i>
										<span class="caption-subject font-dark sbold uppercase"><?php echo $page_title; ?></span>
									</div>
									<div class="actions"></div>
								</div>
								<div class="portlet-body">
									<div class="form-body">
										<div class="row">
											<div class="col-md-3 col-sm-12">
												<div class="form-group">
													<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-left: 15px;">
														<div class="fileinput-new thumbnail" style="width: 100%; height: auto;">
															<img src="../agents/<?php echo $get_image; ?>" alt="" />
														</div>
														<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
														<div>
															<span class="btn default btn-file">
																<span class="fileinput-new"> Select image </span>
																<span class="fileinput-exists"> Change </span>
																<input type="file" name="image">
															</span>
															<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-9 col-sm-12">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">First Name :</label>
															<input type="text" placeholder="First name" value="<?php echo $fname; ?>" name="fname" class="form-control" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Last Name :</label>
															<input type="text" placeholder="Last name" value="<?php echo $lname; ?>" name="lname" class="form-control" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">Email</label>
													<input type="text" placeholder="Doe" value="<?php echo $email; ?>" name="email" class="form-control" />
												</div>
												<div class="form-group">
													<label class="control-label">Mobile Number</label>
													<input type="text" placeholder="99887766" value="<?php echo $phone; ?>" name="phone" class="form-control" />
												</div>
												<div class="form-group">
													<label>Language</label>
													<select class="form-control" name="lang">
														<option value="0">Choose...</option>
														<?php
														$lang_query = "SELECT * FROM `language`";
														$result = $db->select($lang_query);
														if ($result != false) {
															while ($row = $result->fetch_assoc()) {
																$lid = $row['id'];
																?>
																<option value="<?php echo $lid; ?>" <?php if ($lid == $lang_id) echo 'selected'; ?>><?php echo $row['name']; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-10 col-md-2">
												<button type="submit" name="edit" class="btn green">Edit</button>
												<a href="agents.php" class="btn default">Back</a>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</form>
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
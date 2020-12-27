<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Bairshil"; ?>
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
						<h1>Bairshil <small>List</small></h1>
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
				// Add Bairshil
				if (isset($_POST['add-submit'])) {
					$name = mysqli_real_escape_string($db->con, $_POST['name']);
					$query = "INSERT INTO `bairshil`(`name`) VALUES ('$name')";
					$insert = $db->insert($query);
					if ($insert != false) {
						header('Location: bairshil.php');
					} else {
						echo 'Data Has Not Been Inserted!';
					}
				}

				// Get ID
				if (isset($_GET['edit']) && $_GET['edit'] != NULL) {
					$edit_id = $_GET['edit'];
					$query = "SELECT * FROM `bairshil` WHERE `id` = '$edit_id'";
					$result = $db->select($query);
					if ($result != false) {
						$row = $result->fetch_assoc();
						$ename = $row['name'];
					} else {
						header('Location: bairshil.php');
					}
				}

				// Edit Bairshil
				if (isset($_POST['edit-submit'])) {
					$ename = mysqli_real_escape_string($db->con, $_POST['ename']);
					$eid = $_POST['eid'];
					$query = "UPDATE `bairshil` SET `name`='$ename' WHERE `id`='$eid'";
					$update = $db->update($query);
					if ($update != false) {
						header('Location: bairshil.php');
					} else {
						echo 'Data Has Not Been Updated!';
					}
				}
				?>

				<div class="row">
					<div class="col-md-6">
						<?php if (isset($_GET['edit'])) { ?>
							<form action="" method="POST" >
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
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" name="ename" value="<?php echo $ename; ?>" placeholder="Ulaanbaatar" class="form-control" />
												<input type="hidden" name="eid" value="<?php echo $edit_id; ?>">
											</div>
										</div>
										<div class="form-actions">
											<div class="col-md-offset-8 col-md-4">
												<button type="submit" name="edit-submit" class="btn green">edit</button>
												<a href="bairshil.php" class="btn default">Cancel</a>
											</div>
										</div>
									</div>

								</div>
							</form>
						<?php } else { ?>
							<form action="" method="POST">
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
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" name="name" placeholder="Ulaanbaatar" class="form-control" autofocus />
											</div>
										</div>
										<div class="form-actions">
											<div class="col-md-offset-10 col-md-2">
												<button type="submit" name="add-submit" class="btn green">Add</button>
											</div>
										</div>
									</div>

								</div>
							</form>

						<?php } ?>
					</div>
					<div class="col-md-6">
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-setting"></i><?php echo $page_title; ?>
								</div>
								<div class="tools">
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No.</th>
											<th>Address</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = "SELECT * FROM `bairshil` ORDER BY `id` DESC";
										$result = $db->select($query);
										if ($result != false) {
											$i = 1;
											while ($row = $result->fetch_assoc()) {
												?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td><?php echo $row['name']; ?></td>
													<td width="40%" align="center">
														<a href="?edit=<?php echo $row['id']; ?>" class="btn btn-sm yellow">Edit</a>
														<a href="bairshil-del.php?del=<?php echo $row['id']; ?>" class="btn btn-sm red" onclick="return confirm('Are you sure want to Delete?')">delete</a>
													</td>
												</tr>
											<?php } ?>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- End: life time stats -->
			</div>

			<!-- END DASHBOARD STATS 1-->

			<!-- END PAGE BASE CONTENT -->
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
<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Agent List"; ?>
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
						<h1>Admin post menu
							<small></small>
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

				<?php
				// GET ID
				if (isset($_GET['delid']) && $_GET['delid'] != NULL) {
					$delid = $_GET['delid'];
					$query = "SELECT * FROM `agents` WHERE `id` = $delid";
					$result = $db->select($query);
					if ($result != false) {
						$row = $result->fetch_assoc();
						$get_image = '../agents/' . $row['profile'];
						if (file_exists($get_image)) {
							unlink($get_image);
						}
						$query = "DELETE FROM `agents` WHERE `id` = $delid";
						$delete = $db->delete($query);
						if ($delete != false) {
							header('Location: agents.php');
						}
					}
				}
				?>

				<!-- BEGIN PAGE BASE CONTENT -->
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-setting"></i><?php echo $page_title; ?>
									<a href="agent-add.php" class="btn btn-sm default">Add</a>
								</div>
								<div class="tools">
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
										<tr>
											<th width="5%">No.</th>
											<th width="30%">Name</th>
											<th width="30%">Email</th>
											<th width="5%">Phone</th>
											<th width="20%">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = "SELECT * FROM `agents` ORDER BY `id` DESC";
										$result = $db->select($query);
										$i = 1;
										if ($result != false) {
											while ($row = $result->fetch_assoc()) {
												$fname = ucfirst($row['first_name']);
												$lname = ucfirst($row['last_name']);
												?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td><?php echo $fname . ' ' . $lname; ?></td>
													<td><?php echo $row['email']; ?></td>
													<td><?php echo $row['phone']; ?></td>
													<td>
														<a href="agent-edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm yellow">Edit</a>
														<a href="agents.php?delid=<?php echo $row['id']; ?>" class="btn btn-sm red" onclick="return confirm('Are you sure want to Delete this Agent!')">Delete</a>
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
				<!-- END PAGE BASE CONTENT -->
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
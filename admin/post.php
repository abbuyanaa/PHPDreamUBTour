<?php $filepath = realpath(dirname(__FILE__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page_title = "Post Mongolia"; ?>
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
						<span class="active"><?php echo $page_title; ?></span>
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->

				<!-- BEGIN PAGE BASE CONTENT -->
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-setting"></i><?php echo $page_title; ?>
									<a href="post-add.php" class="btn btn-sm default">Add</a>
								</div>
								<div class="tools">
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
										<tr>
											<th width="5%">No.</th>
											<th width="20%">Name</th>
											<th width="30%">Description</th>
											<th width="5%">Address</th>
											<th width="5%">Category</th>
											<th width="5%">Views</th>
											<th width="20%">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = "
										SELECT p.id, p.title, p.body, p.price, l.name AS lname, b.name AS bname, c.name AS cname FROM posts AS p 
										INNER JOIN `language` AS l ON l.id = p.lang_id 
										INNER JOIN bairshil AS b ON b.id = p.bairshil_id 
										INNER JOIN category AS c ON c.id = p.cat_id 
										ORDER BY p.id DESC
										";
										$result = $db->select($query);
										$i = 1;
										if ($result != false) {
											while ($row = $result->fetch_assoc()) {
												?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td><?php echo $db->textShorten($row['title'], 100); ?></td>
													<td><?php echo strip_tags($db->textShorten($row['body'], 400)); ?></td>
													<td><?php echo $row['bname']; ?></td>
													<td><?php echo $row['cname']; ?></td>
													<td><?php echo $row['lname']; ?></td>
													<td>
														<a href="post-edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm yellow">Edit</a>
														<a href="post-del.php?delid=<?php echo $row['id']; ?>" class="btn btn-sm red" onclick="return confirm('Are you sure want to Delete this Post!')">Delete</a>
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
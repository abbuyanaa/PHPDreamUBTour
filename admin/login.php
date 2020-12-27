<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8" />
	<title>Dream UB Tour</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="../assets/pages/css/lock.min.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<?php
include 'config/Session.php';
Session::checkLogin();
include 'config/Database.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email 		= mysqli_real_escape_string($db->con, $_POST['email']);
$password 	= mysqli_real_escape_string($db->con, $_POST['password']);

$password = md5($password);
$query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
$result = $db->select($query);
	if ($result != false) {
		$row = $result->fetch_assoc();
		Session::init();
		Session::set("login", true);
		Session::set("email", $row['email']);
		header('Location: index.php');
	} else {
		$msg = '<p style="color: #ccc;">Wrong Email or Password!</p>';
	}
}
?>

<body class="">

	<div class="page-lock">
			<div class="page-body">
					<div class="lock-body">
							<div class="pull-left lock-avatar-block"></div>
							<form class="lock-form pull-left" action="" method="post">
									<center><h4>Dream UB Tour</h4></center>
									<div class="form-group">
										<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" />
									</div>
									<div class="form-group">
										<input class="form-control placeholder-no-fix" type="password" placeholder="Password" name="password" />
									</div>
									<?php if (isset($msg)) echo $msg; ?>
									<div class="form-actions">
										<button type="submit" class="btn red uppercase">Login</button>
									</div>
							</form>
					</div>
					<div class="lock-bottom">
							<a href="">Not Amanda Smith?</a>
					</div>
			</div>
			<div class="page-footer-custom"> 2020 &copy; Dream UB Tour </div>
	</div>

<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/lock.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
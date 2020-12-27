<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/config/Database.php');
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$file_name = $_FILES['image']['name'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
		$permited = array('gif','jpg','jpeg','png');

		if (empty($file_name)) {
			echo '<script>alert(\'Please Select Image\')</script>';
		} else if (in_array($file_ext, $permited) === false) {
			echo '<script>alert(\'Image file extension correct: ' . implode(', ', $permited) . '\')</script>';
		} else {
			$unique = date('Ymd').'_'.substr(md5(time()), 1, 10).'.'.$file_ext;
			$query = "INSERT INTO `images`(`image`) VALUES ('$unique')";
			$result = $db->insert($query);
			if ($result != false) {
				if (move_uploaded_file($file_tmp, '../images/'.$unique)) {
					header('Location: filebrowser.php?CKEditor=ckeditor&CKEditorFuncNum=1&langCode=en');
				} else {
					echo 'Image Has Not Been Upload!';
				}
			} else {
				echo 'Query Does not working!';
			}
		}
	}
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1>Upload or Select Image</h1> <br />
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file">Select File</label>
						<input type="file" id="file" name="image">
						<p class="help-block">Select you file which you want to upload.</p>
					</div>
					<div class="footer">
						<button type="submit" name="submit" class="btn btn-primary">Upload</button>
					</div>
				</form>
			</div>
		</div>
		<br />
		<div class="row">
			<?php
			$query = "SELECT * FROM `images` ORDER BY `id` DESC";
			$result = $db->select($query);
			if ($result != false) {
				while ($row = $result->fetch_assoc()) {
					?>
					<div class="col-xs-3 col-md-3">
						<a href="javascript:selectImage('<?php echo $row['image']; ?>')" class="img-thumbnail">
							<img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['iamge']; ?>" width="100%">
						</a>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>

	<script>
		var CKEditorFuncNum = "<?php echo $_REQUEST['CKEditorFuncNum']; ?>";
		// var url = "http://<?php echo $_SERVER['SERVER_NAME']; ?>/phptravel/images/";
		var url = "../images/";
		function selectImage(imgName) {
			url += imgName;
			window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, url);
			window.close();
		}
	</script>
</body>
</html>
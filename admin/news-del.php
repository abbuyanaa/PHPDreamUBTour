<?php

include 'config/Database.php';
$db = new Database();

if (isset($_GET['delid']) && $_GET['delid'] != NULL) {
	$delid = $_GET['delid'];
	$check_query = "SELECT * FROM `news` WHERE `id` = '$delid'";
	$result = $db->delete($check_query);
	if ($result != false) {
		$del_query = "DELETE FROM `news` WHERE `id` = '$delid'";
		$result = $db->delete($del_query);
		if ($result != false) {
			header('Location: news.php');
		}
	}
} else {
	header('Location: news.php');
}

?>

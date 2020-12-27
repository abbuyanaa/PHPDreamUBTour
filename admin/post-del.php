<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/config/Database.php');

$db = new Database();

if (isset($_GET['delid']) && $_GET['delid'] != NULL) {
	$delid = $_GET['delid'];
	$check_query = "SELECT * FROM `posts` WHERE `id` = '$delid'";
	$result = $db->select($check_query);
	if ($result != false) {
		$del_query = "DELETE FROM `posts` WHERE `id` = '$delid'";
		$result = $db->delete($del_query);
		if ($result != false) {
			header('Location: post.php');
		}
	}
} else {
	header('Location: post.php');
}

?>

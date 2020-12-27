<?php
include_once('config/Database.php');
$db = new Database();

if (isset($_GET['del']) && $_GET['del'] != NULL) {
	$delid = $_GET['del'];
	$query = "DELETE FROM `bairshil` WHERE `id` = '$delid'";
	$result = $db->delete($query);
	if ($result != false) {
		header('Location: bairshil.php');
	}
} else {
	header('Location: bairshil.php');
}

?>

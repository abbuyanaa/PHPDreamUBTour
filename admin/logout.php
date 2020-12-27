<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/config/Session.php');
Session::checkSession();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
	Session::destroy();
} else {
	Session::checkSession();
}
?>
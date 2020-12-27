<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/config.php');

/**
 * Database Class
 */
class Database {
	private $dbhost = DBHOST;
	private $dbuser = DBUSER;
	private $dbpass = DBPASS;
	private $dbname = DBNAME;

	public $con;
	public $error;

	public function __construct() {
		$this->connectDB();
	}
	
	public function connectDB(){
		$this->con = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		mysqli_set_charset($this->con, 'utf8');
		if(!$this->con){
			$this->error = "Connection fail " . $this->con->connect_error;
			return false;
		}
	}
	
	// Select or Read data
	public function select($query){
		$result = $this->con->query($query) or die($this->con->error . __LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	
	// Insert data
	public function insert($query){
		$insert_row = $this->con->query($query) or die($this->con->error . __LINE__);
		if($insert_row){
			return $insert_row;
		} else {
			return false;
		}
	}

	// Update data
	public function update($query){
		$update_row = $this->con->query($query) or die($this->con->error . __LINE__);
		if($update_row){
			return $update_row;
		} else {
			return false;
		}
	}

	// Delete data
	public function delete($query){
		$delete_row = $this->con->query($query) or die($this->con->error . __LINE__);
		if($delete_row){
			return $delete_row;
		} else {
			return false;
		}
	}

	public function textShorten($text, $limit = 400) {
		$text = $text . "";
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, strrpos($text, ' '));
		$text = $text . ' ....';
		return $text;
	}

	public function validation($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function result($status, $text) {
		switch ($status) {
			case 1:
			$msg = '<div class="alert alert-success"><strong>' . $text . '</strong></div>';
			break;
			case 2:
			$msg = '<div class="alert alert-warning"><strong>' . $text . '</strong></div>';
			break;
			case 3:
			$msg = '<div class="alert alert-danger"><strong>' . $text . '</strong></div>';
			break;
		}
		return $msg;
	}
}

?>

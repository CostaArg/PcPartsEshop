<?php
class controller {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "eshopdb";

	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}

	function connectDB() {
		$conn = new mysqli($this->host,$this->user,$this->password, $this->database);


		return $conn;
	}

	function selectDB($conn) {

	}

	function runQuery($query) {
		$conn = new mysqli($this->host,$this->user,$this->password, $this->database);
		 $result = $conn->query($query);

			while($row=$result->fetch_assoc()) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;
	}
}
?>

<?php
include('php/config.php');
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbName = "doa_99_40";
// Create connection
$con = new mysqli($servername, $username, $password);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Check database is exists
if (mysqli_select_db($con, $database)) {
	echo "Database exists";
	header("location: home.php");
} else {
	echo "Database does not exist";

	$sql = "CREATE DATABASE $database";
	if ($con->query($sql) === TRUE) {
		echo "Database created successfully";
		$conn = new mysqli($servername, $username, $password, $database);

		$query = '';
		$sqlScript = file('db_create.sql');
		foreach ($sqlScript as $line) {

			$startWith = substr(trim($line), 0, 2);
			$endWith = substr(trim($line), -1, 1);

			if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
				continue;
			}

			$query = $query . $line;
			if ($endWith == ';') {
				mysqli_query($conn, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query . '</b></div>');
				$query = '';
			}
		}
		echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';
		header("location: home.php");
	} else {
		echo "Error creating database: " . $con->error;
	}
}
?>
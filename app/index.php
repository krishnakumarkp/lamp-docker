<?php
$servername = "db-server";
$username = "root";
$password = "12345678";

try {
	$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "pdo Connected successfully";
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

	
$mconn = mysqli_connect($servername, $username, $password);
if (!$mconn) {
    die("mysqli Connection failed: " . mysqli_connect_error());
}
echo "mysqli Connected successfully";

?>
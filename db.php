<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventastic";

// $servername = "localhost";
// $username = "random";
// $password = "eventastic";
// $dbname = "eventastic";

$conn = null;
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
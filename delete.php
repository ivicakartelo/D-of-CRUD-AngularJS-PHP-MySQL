<?php

define("DB_HOST", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "test1");

$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);




$http_data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM ang WHERE id = '".$http_data->id."'";

$statement = $conn->prepare($query);
$statement->execute();
?>
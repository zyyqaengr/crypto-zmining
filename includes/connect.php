<?php 


$server = "localhost";
$user = "root";
$password = '';
$database = "faucet";

$connection = mysqli_connect($server,$user,$password,$database);

if (!$connection) {
	die('Database connection failed' . mysqli_error_connect($connection) );
} 
	// echo "Database is connected";


 ?>
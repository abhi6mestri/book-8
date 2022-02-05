<?php

$host = "localhost";
$username = "root";
$password = "";
$database ="bookstore";

// Create connection
$conn = mysqli_connect($host, $username, $password ,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

/*echo "Connected successfully";*/
/*
$user = getenv('CLOUDSQL_USER');
$pass = getenv('CLOUDSQL_PASSWORD');
$inst = getenv('CLOUDSQL_DSN');
$db = getenv('CLOUDSQL_DB');

$conn = mysqli_connect(null, $user, $pass,$db, null,$inst);

if(!$conn)
{
	echo "ERROR!!".mysqli_connect_error();
}

*/
// db user - root
// db pass - book-8onCloud
?>
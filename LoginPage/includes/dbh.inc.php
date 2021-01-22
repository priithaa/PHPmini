<?php 
// dont close php or else pure php with free lines can give errors
$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "phpproject01";

$conn = mysqli_connect($serverName,$dbUserName, $dbPassword,$dbName);

if(!$conn)
{
	die("Connection Failed: ".mysqli_connect_error());
	// kills the process
}
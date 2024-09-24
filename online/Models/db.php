<?php 

function con()
{
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbname="online";
	$conn=new mysqli($serverName,$userName,$password,$dbname);
	return $conn;
}

?>
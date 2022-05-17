<?php 
$hostName = "localhost";
$userName="root";
$userPass="";
$dbName="houserent";
$conn = mysqli_connect($hostName,$userName,$userPass,$dbName) or die("Connection Failed");
define("baseurl","http://192.168.1.171/houserentapi/");

 ?>
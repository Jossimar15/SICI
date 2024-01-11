<?php 

$servername = "localhost"; //db5005905650.hosting-data.io
$database = "sici";//dbs4950772
$username = "root";//dbu860480
$password = "";//Uagro2021@=
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

 ?>
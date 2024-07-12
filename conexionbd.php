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

//esta parte es un objeto para realizar la paginacion 


try {
      $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $database, $username, $password);
      $base_de_datos->query("set names utf8;");
      $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
      $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  } catch (Exception $e) {
      echo "Ocurrió algo con la base de datos: " . $e->getMessage();
  }



 ?>
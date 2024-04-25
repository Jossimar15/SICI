<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'menu.php';  ?>

    <div class="" id="contenido">

    	<?php 
    			$id= $_POST["idsecretaria"];
    			$id_secretaria= $_POST["idsecretaria2"];

    			echo "$id";
    			echo "$id_secretaria";
    			
    		
	   	  ?>

<?php

$sql = "SELECT * FROM sectorcentral INNER JOIN fechasectocentral ON sectorcentra$sql=" SELECT *, SUBSTRING(fecha_de_verificacion, -4) AS fecha1 from fechasectocentral where fecha_de_verificacion!='' and estatus='autorizado' group by secretaria";



  /*//Se compreba en el arreglo que el dato de la variable exista, para que realize la funcion a traves del siguiente codigo, in_array
$os = array("Mac", "NTs","NT", "jossi","Linux","Linux","sas","sas","sasa","jossiss","sas" );
$count = count($os);

if (in_array("NT", $os)) {
    echo "la palabra jossi si existe en el arreglo y se encuentra la posición";

    $clave = array_search('jossi', $os);

    echo $clave; 
 


}*/







?>
    	

</body>
</html> 

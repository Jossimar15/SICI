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
    			$id= $_POST["idsecretaria"]; // id de tabla fechasectocentral
				$id22= $_POST["idsecretaria2"];// id de tabla sectorcentral
				$secretaria= $_POST["secretaria"];// id de tabla sectorcentral
    			

    			echo "$id";
				echo "$id22";
				echo "$secretaria";
    			
    			
    		
	   	  ?>




<center><strong><h4>SITUACION ACTUAL DEL PROYECTO DE ORGANIGRAMA</h4> </strong></center>
<center>(Proyectos que se encuentran en actualización)</center><br><br>


<div class="container">
<table class="table">
	
		<th scope="col"><center>No°</center></th>
		<th scope="col"><center>No°</center></th>
		<th scope="col"><center>No°</center></th>
		<th scope="col"><center>No°</center></th>
		<th scope="col"><center>No°</center></th>
		<thead>	
			<tbody>
			</tbody>
		</thead>	
			

		
<?php
include 'conexionbd.php';
$sql = "select * from fechasectocentral ORDER BY fecha_de_modificacion DESC";
$res_consulta = mysqli_query($conn, $sql);
$total_prods = mysqli_num_rows($res_consulta);
$x=1;
$i = 0; 
$max_cols = 6; // limite de columnas (celdas) por fila


while($row = mysqli_fetch_array($res_consulta))
{      


if($i==0||($max_cols == 0)){
    echo "<tr>";
}
$nombre = $row['fecha_de_modificacion'];
$id = $row['id_fech'];
echo "<td><center>".$id."<br>". $nombre."</center></td>";

if(($i%($max_cols-1)==4 && $i!= 0)||$i == ($total_prods-1)){
    echo "<tr>";
}
$i++;
    
}
echo " </tbody></thead></table>";



?>


<!-- _______________________Codigo anterior si funciona____________ -->


</div>

</div> 	
</div>
</body>
</html> 

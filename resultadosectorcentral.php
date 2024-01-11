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

	<div class="container">
  <!-- Content here -->
<br><center><h3>ACTUALIZAR PROYECTOS DEL SECTOR CENTRAL</h3></center><br>

<form method="POST" enctype="multipart/form-data" action="resultadosectorcentral.php">
<div class="row">
	
		  <div class="col-md-8"><input type="text" name="buscar" class="form-control" id="inputAddress" placeholder="Buscar"></div>
  		  <div class="col-md-4 "><button class="btn btn-primary" type="submit" >Buscar</button></div>
		<input type="hidden" name="sector" value="buscacentral" /><br><br>
	</form>
</div>



<div class="row">


		<table class="table">
	  <thead>
	    <tr>
	      <th scope="col"><center>Institución</center></th>
	      <th scope="col"><center>Proyecto</center></th>
	      <th scope="col"><center>Fecha inicial</center></th>
	      <th scope="col"><center>Ultima modificación</center>	</th>
	      <th scope="col"><center>Fecha de aprobación</center></th>
	      <th scope="col"><center>Estatus</center></th>
	      <th scope="col"><center>Comentario</center></th>
	      


	    </tr>
	  </thead>
	  
<?php  

 


$buscar= $_POST["buscar"];
include 'conexionbd.php';
$sql = "SELECT * FROM sectorcentral INNER JOIN fechasectocentral ON sectorcentral.id_secretaria = fechasectocentral.id_secretaria WHERE fechasectocentral.id_fech IN (SELECT MAX(fechasectocentral.id_fech) FROM fechasectocentral GROUP BY fechasectocentral.id_secretaria) and sectorcentral.secretaria  like '%$buscar%'";
$result = mysqli_query($conn, $sql);
while($crow = mysqli_fetch_assoc($result)){?>
		<tbody>
	    <tr>
	      <td><center></center><?php echo $crow['secretaria'];?></td>
	      <td><center><?php echo $crow['tipoproyecto'];?></center></td>
	      <td><center><?php echo $crow['fecha_inicial'];?></center></td>
	      <td><center><?php echo $crow['fecha_de_modificacion'];?></center></td>
	      <td><center><?php echo $crow['fecha_de_verificacion'];?></center></td>
	      <td><center><?php echo $crow['estatus'];?></center></td>
	      <td><center><?php echo $crow['responsable'];?></center></td>
	      <form method="POST" action="actualizard_sc.php">
	      <td>
	      </td>
	      <td><center><button class="btn btn-primary" type="submit">Actualizar</button></center></td>
	      <input type="hidden" name="idsecretaria" value="<?php echo $crow['id_fech'];?>" />
	      <input type="hidden" name="idsecretaria2" value="<?php echo $crow['id_secretaria'];?>" />

	      </form>
	      
	    </tr>
<?php
}

 ?>
	  </tbody>
	</table>
	</div>

</div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

</head>
<body>


	<div class="container">
  <!-- Content here -->
<br><center><h3>ACTUALIZAR PROYECTOS DEL SECTOR PARAESTATAL</h3></center><br>

<form method="POST" enctype="multipart/form-data" action="resultadosectorparaestatal.php">
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
	      <th scope="col"><center>Elaboró</center></th>
	      <th scope="col"><center>Fecha inicial</center></th>
	      <th scope="col"><center>Ultima modificación</center>	</th>
	      <th scope="col"><center>Ultima verificación</center></th>
	      
	      


	    </tr>
	  </thead>
	  
<?php  




include 'conexionbd.php';
$sql = "SELECT * FROM sectorparastatal";
$result = mysqli_query($conn, $sql);
while($crow = mysqli_fetch_assoc($result)){?>
		<tbody>
	    <tr>
	      <td><center></center><?php echo $crow['secretaria'];?></td>
	      <td><center><?php echo $crow['tipoproyecto'];?></center></td>
	      <td><center><?php echo $crow['elaboro'];?></center></td>
	      <td><center><?php echo $crow['fecha'];?></center></td>
	      <td><center><?php echo $crow['fecha'];?></center></td>
	      <td><center><?php echo $crow['fecha'];?></center></td>
	      
	      
	      
	    </tr>
<?php
}

 ?>
	  </tbody>
	</table>
	</div>

</div>
</body>
</html>
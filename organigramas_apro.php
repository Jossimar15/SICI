<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>
    <!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<?php include 'menu2.php'; ?>

	<div class="container">
  <!-- Content here -->
<br><br><center><h3>ESTATUS DE ORGANIGRAMAS</h3></center><br><br>

<form method="POST" enctype="multipart/form-data" action="resultadosectorcentral.php">
<div class="row">
	
		  <div class="col-md-6"><input type="text" name="buscar" class="form-control" id="inputAddress" placeholder="Buscar"></div>
  		  <div class="col-md-6 "><button class="btn btn-primary" type="submit" >Buscar</button>  <a class="btn btn-primary" href="#" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">En actualización</a> <button class="btn btn-primary" type="submit" >Desactualizados</button>  <a class="btn btn-primary" href="#" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Ver todo</a><br></div>
		<input type="hidden" name="sector" value="buscacentral" /><br><br>
	</form>
</div>



<div class="row">


		<table class="table">
	  <thead>
	    <tr>
		  <th scope="col"><center>No°</center></th>
	      <th scope="col"><center>Institución</center></th>
	      <!-- <th scope="col"><center>Proyecto</center></th> -->
		  <th scope="col"><center>Fecha de autorizacion <br>del Organigrama</center></th>
	      <!-- <th scope="col"><center>Antiguedad </center></th> -->
		  <th scope="col"><center>Estatus</center>	</th>
          <th scope="col"><center>Descargar proyecto</center>	</th>
	      
	      
	      


	    </tr>
	  </thead>
	  
<?php  

 // Declaramos nuestras fechas inicial y final
 $fechadeactualizacion = date('2019');
 $anoactual = date('Y');
 $mesactual = date ('m');
 $proyecdisponibles= $anoactual-3;
 

 
 
include 'conexionbd.php';
$sql = "SELECT *, SUBSTRING(fecha_aprobacion, -4) AS fecha1 from lista where fecha_aprobacion!=''";
$result = mysqli_query($conn, $sql);



while($crow = mysqli_fetch_assoc($result)){?>
<!-- Se declara la variable para y se hace la operacion de fechas, para conocer la antiguedad del proyecto -->
<?php $resultado= $anoactual-$crow['fecha1'];
	
	if ($resultado<=3) {
	
?> 
		<tbody>
	    <tr>
		  <td><center><?php echo $crow['id'];?></center></td>
	      <td><center><?php echo $crow['nombre_institucion'];?></center></td>
		  <td><center><?php echo $crow['fecha_aprobacion'];?></center></td>
		  <!-- <td><center></*?php if ($resultado>=4) {echo "Hace "; echo $resultado; echo " años";}else {echo "Actualizacion reciente";}?> */</center></td> -->
		  <td><center><?php if ($crow['fecha1']>=$proyecdisponibles) {echo "Proyecto actualizado";}else{echo "Requiere actualizacion";}?></center></td>
		  <td><center><a href="archivos/ejemplo.pdf" target="_blank">Descargar proyecto</a></center></td>
		  
		      
	    </tr>
<?php
}else {echo "";}}

 ?>
	  </tbody>
	</table>
	</div>

</div>
</body>
</html>
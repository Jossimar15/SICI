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


<div class="row">
	
 <!-- <button class="btn btn-primary" type="submit" >Modificar</button>  <a class="btn btn-primary" href="#" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Eliminar</a><br></div>  -->
<div class="col-md-4"><center><img src="imagenes/contrato.png" class="d-block w-50" alt="..."><strong><h3>30</strong> <br> <a class="btn btn-primary" href="org_status_actualizados.php" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Actualizados</a> </center> </div>
<div class="col-md-4"><center><img src="imagenes/contrato.png" class="d-block w-50" alt="..."> <strong><h3>39</strong> <br><a class="btn btn-primary" href="org_status_procesos.php" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">En proceso de actualización</a></center> </div>
<div class="col-md-4"><center><img src="imagenes/contrato.png" class="d-block w-50" alt="..."><strong><h3>6</strong> <br><a class="btn btn-primary" href="resultadosectorcentral.php" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Sin actualizar</a></center> </div>
</div>

<br><br><br>

<form method="POST" enctype="multipart/form-data" action="resultadosectorcentral.php">
<div class="row">

		  <div class="col-md-8"><input type="text" name="buscar" class="form-control" id="inputAddress" placeholder="Buscar"></div>
  		 <div class="col-md-2 "><button class="btn btn-primary" type="submit" >Buscar</button>  <!--   <a class="btn btn-primary" href="resultadosectorcentral.php" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Agregar</a> <button class="btn btn-primary" type="submit" >Modificar</button>  <a class="btn btn-primary" href="#" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Eliminar</a><br></div> -->
		<input type="hidden" name="sector" value="buscacentral" /><br><br><br>
	</form>
</div>
<!-- <center><strong><h4>ORGANIGRAMAS DE ATENCION INMEDIATA</h4> </strong></center>
<center>(Proyectos con mas de 5 años sin actualizar)</center><br><br> -->

<div class="row">
<br>
<!-- 
		<table class="table">
	  <thead>
	    <tr>
		  <th scope="col"><center>No°</center></th>
	      <th scope="col"><center>Institución</center></th>
	      <th scope="col"><center>Proyecto</center></th> -->
		  <!-- <th scope="col"><center>Fecha de autorización</center></th>
	      <th scope="col"><center>Antiguedad </center></th>
		  <th scope="col"><center>Estatus</center>	</th> -->
          <!-- <th scope="col"><center>Descargar proyecto</center>	</th> -->
	      
	      
	      


	    </tr>
	  </thead> 
	  
<?php  /*

 // Declaramos nuestras fechas inicial y final
 $fechadeactualizacion = date('2019');
 $anoactual = date('Y');
 $mesactual = date ('m');
 $proyecdisponibles1= $anoactual-1;
 $proyecdisponibles2= $anoactual-2;
 $proyecdisponibles3= $anoactual-3;
 
 

 
 
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
		  <td><center>01/01/2019<?php // echo $crow['fecha_aprobacion'];?></center></td>
		  <td><center>Hace 5 años<?php //echo "Hace "; echo $resultado; echo " años" ?></center></td>
		  <td><center>Proyecto desactualizado<?php// if ($crow['fecha1']<=$proyecdisponibles1 or $crow['fecha1']<=$proyecdisponibles2 or $crow['fecha1']<=$proyecdisponibles3) {echo "Proyecto actualizado";}else{echo "Requiere actualizacion";}?></center></td>
		  <!-- <td><center><a href="archivos/ejemplo.pdf" target="_blank">Descargar proyecto</a></center></td> -->
		  
		      
	    </tr>
<?php
}else {echo "";}}
*/
 ?>
	  </tbody>
	</table>
	</div>

</div>
</body>
</html>
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

<br><br> 

<form method="POST" enctype="multipart/form-data" action="resul_org_proceso.php">
<div class="row">

		  <div class="col-md-8"><input type="text" name="buscar" class="form-control" id="inputAddress" placeholder="Busca organigrama de institución"></div>
  		 <div class="col-md-2 "><button class="btn btn-primary" type="submit" >Buscar</button>  <!--   <a class="btn btn-primary" href="resultadosectorcentral.php" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Agregar</a> <button class="btn btn-primary" type="submit" >Modificar</button>  <a class="btn btn-primary" href="#" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Eliminar</a><br></div> -->
		<input type="hidden" name="sector" value="buscacentral" /><br><br><br>
	</form>
</div>
<center><strong><h4>ORGANIGRAMAS EN PROCESO DE ACTUALIZACIÓN</h4> </strong></center>
<center>(Proyectos que se encuentran en actualización)</center><br><br>

<div class="row">
<br>

		<table class="table">
	  <thead>
	    <tr>
		  
	      <th scope="col"><center>Institución</center></th>
	      <!-- <th scope="col"><center>Proyecto</center></th> -->
		  <th scope="col"><center>Ultima autorización</center></th>
	      <th scope="col"><center>Antiguedad </center></th>
		  <!-- <th scope="col"><center>Inicio de actualización </center></th> -->
		  <th scope="col"><center>Estatus </center></th>
		  <th></th>
		  <!-- <th scope="col"><center>Ultima version de proyecto</center>	</th> -->
          <!-- <th scope="col"><center>Descargar proyecto</center>	</th> -->
	      
	      
	      


	    </tr>
	  </thead>
	  
<?php  

 // Declaramos nuestras fechas inicial y final
 $fechadeactualizacion = date('2019');
 $anoactual = date('Y');
 $mesactual = date ('m');
 $proyecdisponibles1= $anoactual-1;
 $proyecdisponibles2= $anoactual-2;
 $proyecdisponibles3= $anoactual-3;
 
 

$buscar= $_POST["buscar"];
include 'conexionbd.php';
$sql2 = "SELECT *, SUBSTRING(fecha_autorizacion, -4) AS fecha1 FROM sectorcentral INNER JOIN fechasectocentral ON sectorcentral.id_secretaria = fechasectocentral.id_secretaria WHERE  fechasectocentral.id_fech IN (SELECT MAX(fechasectocentral.id_fech) FROM fechasectocentral GROUP BY fechasectocentral.id_secretaria)and sectorcentral.secretaria  like '%$buscar%'";
$sql="SELECT id_fech,id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus, SUBSTRING(fecha_de_verificacion, -4) AS fecha1 FROM  (SELECT id_fech,id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus,  max(fecha_de_verificacion) over (partition by id_secretaria) as max_fecha FROM fechasectocentral) con_max_fecha where fecha_de_verificacion!='' and estatus='Proceso'  and fecha_de_verificacion = max_fecha and secretaria  like '%$buscar%'order by id_secretaria";
$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){?>
<!-- Se declara la variable para y se hace la operacion de fechas, para conocer la antiguedad del proyecto -->
<?php 

 //se agrego (int) por que la nueva version de PHP pide que se convierta la varible y se pueda realizar la operacion aritmetica
			// echo $resultado= (int)$anoactual+(int)$crow['ano'];
	$resultado= (int)$anoactual-(int)$crow['fecha1'];
	
	

	if ($resultado>3) {
	
?> 
		<tbody>
	    <tr>
		  
	      <td><center><?php echo $crow['secretaria'];?></center></td>
		  <td><center><?php echo $crow['fecha_de_verificacion'];?></center></td>
		  <td><center><?php echo "Hace "; echo $resultado; echo " años" ?></center></td>
		 	
		  <td><center><?php echo $crow['estatus']; ?></center></td>
		  <form method="GET" action="detalles_org_proceso.php?id22=<?php echo $crow['id_secretaria']; ?>">
		  <td><center><button class="btn btn-primary" type="submit">Detalles</button></center></td>
	      <input type="hidden" name="idsecretaria" value="<?php echo $crow['id_fech'];?>" />
	      <input type="hidden" name="idsecretaria2" value="<?php echo $crow['id_secretaria'];?>" />
		  

	      </form> 
		  <!-- <td><center><?php //if ($crow['fecha1']<=$proyecdisponibles1 or $crow['fecha1']<=$proyecdisponibles2 or $crow['fecha1']<=$proyecdisponibles3) {echo "Proyecto actualizado";}else{echo "Requiere actualizacion";}?></center></td> -->
		  <!-- <td><center><a href="archivos/ejemplo.pdf" target="_blank">Descargar proyecto</a></center></td> -->
		  
		      
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
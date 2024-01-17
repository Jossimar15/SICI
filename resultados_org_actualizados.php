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
<br><center><h3>PROYECTOS DE ORGANIGRAMA ACTUALIZADOS</h3></center>
<center>(Proyectos con actualización menor a 3 años)</center><br><br>

<form method="POST" enctype="multipart/form-data" action="resultados_org_actualizados.php">
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
	      <th scope="col"><center>Nombre de la Institución</center></th>
	      <th scope="col"><center>Ultima modificación</center>	</th>
		  <th scope="col"><center>Antiguedad</center></th>
	      <th scope="col"><center>Proyecto</center></th>
	      


	    </tr>
	  </thead>
	  
<?php  

$fechadeactualizacion = date('2019');
$anoactual = date('Y');
$mesactual = date ('m');
$proyecdisponibles1= $anoactual-1;
$proyecdisponibles2= $anoactual-2;
$proyecdisponibles3= $anoactual-3;
 

$buscar= $_POST["buscar"];
include 'conexionbd.php';
 $sql = "SELECT *, SUBSTRING(fecha_autorizacion, -4) AS ano FROM sectorcentral INNER JOIN fechasectocentral ON sectorcentral.id_secretaria = fechasectocentral.id_secretaria WHERE fechasectocentral.id_fech IN (SELECT MAX(fechasectocentral.id_fech) FROM fechasectocentral GROUP BY fechasectocentral.id_secretaria) and sectorcentral.secretaria  like '%$buscar%'";
//  $sql = "SELECT * FROM fechasectocentral where secretaria  like '%$buscar%'";
$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){ 
	?>
	
		<?php //se agrego (int) por que la nueva version de PHP pide que se convierta la varible y se pueda realizar la operacion aritmetica
			// echo $resultado= (int)$anoactual+(int)$crow['ano'];
		
		$resultado = (int)$anoactual-(int)$crow['ano'];
		
		if ($resultado<=3 or $resultado<=2) {
			
	
		?>

		<tbody>
	    <tr>
	      <td><center></center><?php echo $crow['secretaria'];?></td>
	      <td><center><?php echo $crow['fecha_autorizacion'];?></center></td>
	      <td><center><?php echo "Hace "; echo $resultado; echo " años" ?></center></td>
	      
	      
	      <form method="POST" action="actualizard_sc.php">
	      <td><center><a href="archivos/ejemplo.pdf" target="_blank">Descargar proyecto</a></center>
	      </td>
		  <!-- <td><center><button class="btn btn-primary" type="submit">Más detalles</button></center></td> -->
	      <input type="hidden" name="idsecretaria" value="<?php echo $crow['id_fech'];?>" />
	      <input type="hidden" name="idsecretaria2" value="<?php echo $crow['id_secretaria'];?>" />

	      </form> 
	      
	    </tr>
<?php
	}else {echo "";}}
		
 ?>
	  </tbody>
	</table>
	</div>

</div>
</div>
</body>
</html>
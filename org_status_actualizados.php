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
		<!-- <link rel="stylesheet" href="./pagina_v4/css/2.css"> -->
</head>
<body>
<?php include 'menu2.php'; ?>

	<div class="container">
  <!-- Content here -->

<br><br>

<form method="GET" enctype="multipart/form-data" action="resultados_org_actualizados.php">
<div class="row">

		  <div class="col-md-8"><input type="text" name="buscar" class="form-control" id="inputAddress" placeholder="Busca organigrama de institución" required></div>
  		 <div class="col-md-2 "><button class="btn btn-primary" type="submit" >Buscar</button>  <!--   <a class="btn btn-primary" href="resultadosectorcentral.php" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Agregar</a> <button class="btn btn-primary" type="submit" >Modificar</button>  <a class="btn btn-primary" href="#" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Eliminar</a><br></div> -->
		<input type="hidden" name="sector" value="buscacentral" /><br><br><br>
	</form>
</div>
<center><strong><h4>ORGANIGRAMAS ACTUALIZADOS</h4> </strong></center>
<center>(Proyectos con actualización menor a 3 años)</center><br><br>

<div class="row">
<br>

		<table class="table">

	  
<?php  





 // Declaramos nuestras fechas inicial y final
 $fechadeactualizacion = date('2019');
 $anoactual = date('Y');
 $mesactual = date ('m');
 $proyecdisponibles1= $anoactual-1;
 $proyecdisponibles2= $anoactual-2;
 $proyecdisponibles3= $anoactual-3;
 


 
 
include 'conexionbd.php';
// $sql = "SELECT *, SUBSTRING(fecha_autorizacion, -4) AS fecha1 from sectorcentral where fecha_autorizacion!=''";
// $sql=" SELECT *, SUBSTRING(fecha_de_verificacion, -4) AS fecha1 from fechasectocentral where fecha_de_verificacion!='' and estatus='autorizado' group by secretaria";
$sql="SELECT id_fech,id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus, SUBSTRING(fecha_de_verificacion, -4) AS fecha1 FROM  (SELECT id_fech,id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus,  max(fecha_de_verificacion) over (partition by id_secretaria) as max_fecha FROM fechasectocentral) con_max_fecha where fecha_de_verificacion!='' and estatus='autorizado' and fecha_de_verificacion = max_fecha order by id_secretaria desc";
$result = mysqli_query($conn, $sql);



while($crow = mysqli_fetch_assoc($result)){?>
<!-- Se declara la variable para y se hace la operacion de fechas, para conocer la antiguedad del proyecto -->
<?php $resultado= $anoactual-$crow['fecha1'];
	


	if ($resultado==3) {
	
?> 
	
<?php
}else {echo "";}}

 ?>


	  </tbody>
	</table>
	</div>

							
</div>
</body>
</html>

<?php	
include_once "conexionbd.php";

# Cuántos productos mostrar por página
$productosPorPagina = 3;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset ($_GET["pagina"])) {
	$pagina = $_GET["pagina"]; 
}
# El límite es el número de productos por página
$limit = $productosPorPagina;
# El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
$offset = ($pagina - 1) * $productosPorPagina;
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
// $sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM fechasectocentral where estatus='autorizado' ");
$sentencia = $base_de_datos->query("
    SELECT COUNT(*) AS conteo
    FROM (
        SELECT id_fech, id_secretaria, secretaria, fecha_de_verificacion, version, comentario, estatus, seguimiento, 
               SUBSTRING(fecha_de_verificacion, -4) AS fecha1
        FROM (
            SELECT id_fech, id_secretaria, secretaria, fecha_de_verificacion, version, comentario, estatus, seguimiento,
                   max(version) OVER (PARTITION BY id_secretaria) AS max_fecha
            FROM fechasectocentral
        ) con_max_fecha
        WHERE fecha_de_verificacion != '' 
          AND estatus = 'autorizado' 
          AND version = max_fecha
    ) AS conteo;
");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $productosPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $base_de_datos->prepare("SELECT id_fech,id_secretaria,secretaria,fecha_de_verificacion,version,comentario,estatus,seguimiento,SUBSTRING(fecha_de_verificacion, -4) AS fecha1 FROM  (SELECT id_fech,id_secretaria,secretaria,fecha_de_verificacion,version,estatus,seguimiento,comentario, max(version) over (partition by id_secretaria) as max_fecha FROM fechasectocentral) con_max_fecha where fecha_de_verificacion!='' and estatus='autorizado' and version = max_fecha order by id_secretaria desc LIMIT ? OFFSET ? ");
$sentencia->execute([$limit, $offset]);
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);



?>

<div class="col-xs-12">
						
					
						<table class="table ">
							<thead>

								<th><center><h5>No</center></th>
								<th width="300"><center><h5>Nombre de la Institucion</center></th>
								<th scope="col"><center>Fecha de autorización</center></th>
								<th scope="col"><center>Antiguedad</center></th>
								<th scope="col"><center>Estatus</center></th>
								<th scope="col"><center>Proyecto</center>	</th>
								<th></th>
								<th></th>
							  
							
							</thead>
							<tbody>
							<?php foreach ($productos as $producto) { ?>
								
								<!--  -->
								<?php 
				
								$x=1;
								$i = 0; 
								$max_cols = 6;
								$estatus= $producto->estatus;
								$ano= $anoactual- $producto->fecha1;
								if($ano<=3 && $estatus="autorizado"){//Status Aprobado,proceso,pendiente
									
												

										if($i==0||($max_cols == 0)){
											echo "<tr>";
										}
										
										
										echo "<td><center>". $producto->id_fech."</center></td>";
										echo "<td><center>". $producto->secretaria."</center></td>";
										echo "<td><center>". $producto->fecha_de_verificacion."</center><br></td>";
										echo "<td><center> Hace ". $ano." años</center></td>";
										echo "<td><center>". $producto->seguimiento."</center><br></td>";
										echo "<td><center> </center></td>";
										
									}	
										
										if(($i%($max_cols-1)==4 && $i!= 0)||$i == ($conteo-1)){
											echo "</tr>";
										}
										$i++;
								 
								
								
								?>
								
									
								
							<?php } ?>
							</tbody>
						</table>


						<nav aria-label="Page navigation example">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
				
									<!-- <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> productos disponibles</p> -->
								</div>
								<div class="col-xs-12 col-sm-6">
									<!-- <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p> -->
								</div>
							</div>
							<ul class="pagination justify-content-center">
								<!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
								<?php if ($pagina > 1) { ?>
									<li class="page-item ">
										<a href="./org_status_actualizados.php?pagina=<?php echo $pagina - 1 ?>" class="page-link">
											Anterior
										</a>
									</li>
								<?php } ?>
				
								<!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
								<?php for ($x = 1; $x <= $paginas; $x++) { ?>
									<li class="<?php if ($x == $pagina) echo 'page-item active" aria-current="page' ?>">
										<a class="page-link" href="./org_status_actualizados.php?pagina=<?php echo $x;?>">
										
										<?php 
										
										
										?>
											<?php echo $x ?></a>
									</li>
								<?php } ?>
								<!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
								<?php if ($pagina < $paginas) { ?>
									<li class="page-item">
										<a class="page-link" href="./org_status_actualizados.php?pagina=<?php echo $pagina + 1 ?>">
											Siguiente
										</a>
									</li>
								<?php } ?>
							</ul>
						</nav>
					</div>	
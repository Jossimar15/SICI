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

<br>

<center><strong><h4>ORGANIGRAMAS EN PROCESO DE ACTUALIZACIÓN</h4> </strong></center>
<center>(Proyectos que se encuentran en actualización)</center><br>
<br>

<!-- <form method="POST" enctype="multipart/form-data" action="resul_org_proceso.php">
<div class="row">

		  <div class="col-md-8"><input type="text" name="buscar" class="form-control" id="inputAddress" placeholder="Busca organigrama de institución"></div>
  		 <div class="col-md-2 "><button class="btn btn-primary" type="submit" >Buscar</button>  <!--   <a class="btn btn-primary" href="resultadosectorcentral.php" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Agregar</a> <button class="btn btn-primary" type="submit" >Modificar</button>  <a class="btn btn-primary" href="#" role="button" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Eliminar</a><br></div> -->
		<!-- <input type="hidden" name="sector" value="buscacentral" /><br><br><br>
	</form> -->
<!-- </div> -->

<form method="POST" enctype="multipart/form-data" action="resul_org_proceso.php" class="row g-3">
  <div class="col-md-9">
      <input type="text" class="form-control" name="buscar" id="text" placeholder="Buscar Organigrama de Institucion">
  </div>
  <div class="col-auto">
    <button type="submit" name="sector" class="btn btn-primary mb-4">Buscar</button>
  </div>
  <div class="col-auto">
		<TABLE WIDTH="40%" >
			<!-- <TR > -->
				<TD><a title="Regresar" href="org_status_procesos2.php"><img src="iconos/mas.png "  width="20"  class="rounded float-start" title ="Agregar proyecto" alt="..."></a></TD> 
				<TD><a title="Regresar" href="org_status_procesos3.php"><img src="iconos/grafica.png "  width="40"  class="rounded float-start" title ="Datos estadisticos " alt="..."></a></TD> 
				<TD><a title="Regresar" href="org_status_procesos4.php"><img src="iconos/impresora.png " width="40"  class="rounded float-start" title ="Imprimir " alt="..."></a></TD>
				<TD><a title="Regresar" href="org_status_procesos5.php"><img src="iconos/regresar.png " width="20"  class="rounded float-start" title ="Regresar " alt="..."></a></TD>
			<!-- </TR> -->
		</TABLE>
  </div>
</form>



<br>

	
	  
<?php  

 // Declaramos nuestras fechas inicial y final
 $fechadeactualizacion = date('2019');
 $anoactual = date('Y');
 $mesactual = date ('m');
 $proyecdisponibles1= $anoactual-1;
 $proyecdisponibles2= $anoactual-2;
 $proyecdisponibles3= $anoactual-3;
 
 


 
include 'conexionbd.php';
$sql = "SELECT *, SUBSTRING(fecha_autorizacion, -4) AS fecha1 from sectorcentral order by id_secretaria desc";
$result = mysqli_query($conn, $sql);



while($crow = mysqli_fetch_assoc($result)){?>
<!-- Se declara la variable para y se hace la operacion de fechas, para conocer la antiguedad del proyecto -->
<?php 

 //se agrego (int) por que la nueva version de PHP pide que se convierta la varible y se pueda realizar la operacion aritmetica
			// echo $resultado= (int)$anoactual+(int)$crow['ano'];
	$resultado= (int)$anoactual-(int)$crow['fecha1'];
	
	

	if ($resultado!==1 and $resultado!=2 and $resultado!=3) {
	
?> 
		<!-- <tbody> -->

<?php
}else {echo "";}}

 ?>
	  <!-- </tbody> -->
	<!-- </table> -->
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
$sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM fechasectocentral ");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $productosPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $base_de_datos->prepare("SELECT id_fech,id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus, SUBSTRING(fecha_de_verificacion, -4) AS fecha1 FROM  (SELECT id_fech,id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus,  max(fecha_de_verificacion) over (partition by id_secretaria) as max_fecha FROM fechasectocentral) con_max_fecha where fecha_de_verificacion!='' and estatus='Proceso'  and fecha_de_verificacion = max_fecha order by id_secretaria desc LIMIT ? OFFSET ?  ");
$sentencia->execute([$limit, $offset]);
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
// SELECT *, SUBSTRING(fecha_autorizacion, -4) AS fecha1 from sectorcentral






?>

<div class="container">
	<div class="row">
  <!-- Contenido aquí -->

	<div class="col-xs-12">
						
						
						<table class="table ">
							<!-- <thead> -->
				
								
								<th scope="col"><center>Nombre de la Institucion</center></th>
								<th scope="col"><center>Fecha de autorización</center></th>
								<th scope="col"><center>Antiguedad</center></th>
								<th scope="col"><center>Estatus</center>	</th>
								<th scope="col"><center>Año de actualización</center>	</th>
								
							  
							
							<!-- </thead> -->
							<!-- <tbody> -->

							

							<?php 
							

							foreach ($productos as $producto) { 
								
							if ($producto->fecha1 < 2021) {
								// echo $ress;
								?>	

								<!--  -->
								<?php 
				
								$x=1;
								$i = 0; 
								$max_cols = 6;
								$estatus= $producto->estatus;
								$fecha1= $producto->fecha1;
								$ano= $anoactual- $producto->fecha1;
								// echo $estatus;
								// echo $ano;
								// echo $fecha1;
								
								if ($ano>3 && $estatus ="Proceso"){


								

								if($estatus=="Proceso" && $fecha1>3 ){//Status Aprobado,proceso,pendiente
										
													
										if($i==0||($max_cols == 0)){
											
											echo "<tr>";
										}
										
										// $ress= $anoactual- $producto->fecha1;
										// echo $anoactual."<br>";
										// echo $producto->fecha1;
									

										
										echo "<td><center>". $producto->secretaria."</center></td>";
										echo "<td><center>". $producto->fecha_de_verificacion."</center><br></td>";
										
										echo "<td><center> Hace ".$ano ." años </center></td>";
										echo "<td><center> En actualizacion  </center></td>";
										echo "<td><center>".$producto->fecha1."  </center></td>";
										
									
									}		
										
										
										if(($i%($max_cols-1)==4 && $i!= 0)||$i == ($conteo-1)){
											
											echo "</tr>";
											
											
										}
										$i++;
										
										
									
									}
								?>
								
								
								
							<?php }	}?>
							<!-- </tbody> -->
						</table>

					<nav aria-label="Page navigation example">
						
						<ul class="pagination justify-content-center">
						<?php if ($pagina > 1) { ?>
						<li class="page-item ">

						<a href="./org_status_procesos.php?pagina=<?php echo $pagina - 1 ?>" class="page-link">Anterior</a>
						
												
						</li>
						<?php } ?>
						<?php for ($x = 1; $x <= $paginas; $x++) { ?>
						<li class="<?php if ($x == $pagina) echo 'page-item active" aria-current="page'?>"><a class="page-link" href="./org_status_procesos.php?pagina=<?php echo $x;?>">
						<?php echo $x ?></a>
						
						</li>
						<?php } ?>
						<?php if ($pagina < $paginas) { ?>
						<li class="page-item">
						<a class="page-link" href="./org_status_procesos.php?pagina=<?php echo $pagina + 1 ?>">Siguiente</a>
						</li>
						<?php } ?>
						</ul>
				</nav>





					<?php /*
						<nav>
							<div class="row">
								<div class="col-xs-12 col-sm-6">
				
									<!-- <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> productos disponibles</p> -->
								</div>
								<div class="col-xs-12 col-sm-6">
									<!-- <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p> -->
								</div>
							</div>
							<ul class="pagination">
								<!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
								<?php if ($pagina > 1) { ?>
									<li>
										<a href="./org_status_procesos.php?pagina=<?php echo $pagina - 1 ?>">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
								<?php } ?>
				
								<!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
								<?php for ($x = 1; $x <= $paginas; $x++) { ?>
									<li class="<?php if ($x == $pagina) echo "active" ?>">
										<a href="./org_status_procesos.php?pagina=<?php echo $x;?>">
										
										<?php 
										
										
										?>
											<?php echo $x ?></a>
									</li>
								<?php } ?>
								<!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
								<?php if ($pagina < $paginas) { ?>
									<li>
										<a href="./org_status_procesos.php?pagina=<?php echo $pagina + 1 ?>">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								<?php } ?>
							</ul>
						</nav>
					*/?>


					</div>	

		</div>									
	</div>
</div>




<?php 
// Conexión a la base de datos
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "sici";

// // Crear conexión
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Verificar conexión
// if ($conn->connect_error) {
//     die("Conexión fallida: " . $conn->connect_error);
// }

// // Consulta SQL
// $sql = 'SELECT COUNT(*) AS total FROM (SELECT id_fech, id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus, SUBSTRING(fecha_de_verificacion, -4) AS fecha1 FROM (SELECT id_fech, id_secretaria, secretaria, fecha_de_verificacion, comentario, estatus, MAX(fecha_de_verificacion) OVER (PARTITION BY id_secretaria) AS max_fecha FROM fechasectocentral) con_max_fecha WHERE fecha_de_verificacion != "" AND estatus = "Proceso" AND fecha_de_verificacion = max_fecha) AS subconsulta';
// $result = $conn->query($sql);

// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     // Imprimir el resultado
//     $row = $result->fetch_assoc();
//     echo "Total: " . $row["total"];
// } else {
//     echo "0 resultados";
// }

// // Cerrar conexión
// $conn->close();


?>
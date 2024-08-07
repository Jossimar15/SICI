
<!DOCTYPE html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./pagina_v4/css/2.css">
	
    <!-- <link rel="stylesheet" href="./pagina_v4/css/estilo.css"> -->
</head>
<body>

	<?php include 'menu.php';  ?>

<div class="container">

    <div class="" id="contenido">

    	<?php 	
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $results);
$id24= $_GET["idsecretaria"];
$id25= $_GET["idsecretaria2"];
// echo($results['idsecretaria']."<br>");



// echo $url;
// $id22=$results['idsecretaria2'];

// echo $url;
// $components = parse_url($url);
// parse_str($components['query'], $results);
// echo($results['pagina2']);


		// $enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		// echo $enlace_actual;
    	// 		$id= $_GET["idsecretaria"]; // id de tabla fechasectocentral
		// 		$id22= $_GET["idsecretaria2"];// id de tabla sectorcentral
		// 		// $secretaria= $_POST["secretaria"];// id de tabla sectorcentral
    			

    			// echo "$id";
				// echo "$id22";
				// echo "$secretaria";
    			
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
				$sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM fechasectocentral where id_secretaria=$id25");
				$conteo = $sentencia->fetchObject()->conteo;
				# Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
				$paginas = ceil($conteo / $productosPorPagina);
				
				# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
				$sentencia = $base_de_datos->prepare("SELECT * FROM fechasectocentral where id_secretaria=$id25 ORDER BY fecha_de_modificacion desc LIMIT ? OFFSET ? ");
				$sentencia->execute([$limit, $offset]);
				$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
				# Y más abajo los dibujamos...
				?>
				
					<div class="col-xs-12">
					<div class="row">
						<div class="col-md-6 offset-md-3"><h3><center>AVANCES DEL PROYECTO</center></h3></div>
						
					</div><br><br>
					<div class="col-md-3 offset-md-10">
							<TABLE WIDTH="40%" >
								<TR >
									<TD><a title="Regresar" href="org_status_procesos.php"><img src="iconos/mas.png "  width="20"  class="rounded float-start" title ="Agregar comentario " alt="..."></a></TD> 
									<TD><a title="Regresar" href="org_status_procesos.php"><img src="iconos/grafica.png "  width="40"  class="rounded float-start" title ="Grafica " alt="..."></a></TD> 
									<TD><a title="Regresar" href="org_status_procesos.php"><img src="iconos/regresar.png " width="20"  class="rounded float-start" title ="Regresar " alt="..."></a></TD>
								</TR>
							</TABLE>
						</div>

						<!-- <br><center><h5>Avances del Proyecto</h5></center><br> -->
						<table class="table ">
							<thead>
						
								<th width="300"><center><h5>Nombre de la Institucion</center></th>
								<th><center><h5>Observacion o comentario</center></th>
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
				
														
										if($i==0||($max_cols == 0)){
											echo "<tr>";
										}
										
										
										echo "<td>". $producto->secretaria."<br>Fecha de observacion: ". $producto->fecha_de_modificacion."<br></td>";
										echo "<td>". $producto->comentario."<br></td>";
										
										if(($i%($max_cols-1)==4 && $i!= 0)||$i == ($conteo-1)){
											echo "</tr>";
										}
										$i++;
								
								
								
								?>
								
									
								
							<?php } ?>
							</tbody>
						</table>
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
										<a href="./detalles_org_proceso.php?pagina=<?php echo $pagina - 1 ?>&idsecretaria=<?php echo $id24;?>&idsecretaria2=<?php echo $id25;?>">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
								<?php } ?>
				
								<!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
								<?php for ($x = 1; $x <= $paginas; $x++) { ?>
									<li class="<?php if ($x == $pagina) echo "active" ?>">
										<a href="./detalles_org_proceso.php?pagina=<?php echo $x;?>&idsecretaria=<?php echo $id24;?>&idsecretaria2=<?php echo $id25;?>">
										
										<?php 
										
										
										?>
											<?php echo $x ?></a>
									</li>
								<?php } ?>
								<!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
								<?php if ($pagina < $paginas) { ?>
									<li>
										<a href="./detalles_org_proceso.php?pagina=<?php echo $pagina + 1 ?>&idsecretaria=<?php echo $id24;?>&idsecretaria2=<?php echo $id25;?>">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								<?php } ?>
							</ul>
						</nav>
					</div>	
				




    		
	   	
</div>
</div>
</body>
</html> 


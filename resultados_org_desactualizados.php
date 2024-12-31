<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- <link rel="stylesheet" href="./pagina_v4/css/2.css"> -->
</head>
<!-- Este escrip permite a modal enviar los datos del formulario para agregar un comentario -->
<script>
        $(document).ready(function() {
            $('#miFormulario').on('submit', function(event) {
                event.preventDefault(); // Evita que el formulario se envíe de manera tradicional

                $.ajax({
                    url: 'guardar_datos.php', // Ruta al archivo PHP que manejará la inserción
                    type: 'POST',
                    data: $(this).serialize(), // Serializa los datos del formulario
                    success: function(response) {
                        alert(response); // Muestra la respuesta del servidor
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Muestra el error en la consola
                    }
                });
            });
        });
</script>




<body>
	<?php include 'menu.php';  ?>

<div class="" id="contenido">

	<div class="container">
  <!-- Content here -->
<br><center><h3>ORGANIGRAMAS QUE NECESITAN DE ACTUALIZACIÓN</h3></center>
<center>(Proyectos que cuentan con mas de 3 años sin actualizarse)</center><br><br>

<form method="GET" enctype="multipart/form-data" action="resultados_org_desactualizados.php">
<div class="row">
	
		  <div class="col-md-8"><input type="text" name="buscar" class="form-control" id="inputAddress" placeholder="Buscar"></div>
  		  <div class="col-md-4 "><button class="btn btn-primary" type="submit" >Buscar</button></div>
		<input type="hidden" name="sector" value="buscacentral" /><br><br>
	</form>
</div>

<div class="col-md-3 offset-md-10">
							<TABLE WIDTH="40%" >
								<TR >
									<TD><a title="Regresar" href="org_status_procesos.php" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="iconos/mas.png "  width="20"  class="rounded float-start" title ="Agregar comentario " alt="..."></a></TD> 
									<TD><a title="Graficas" href="org_status_procesos.php"><img src="iconos/grafica.png "  width="40"  class="rounded float-start" title ="Reporte " alt="..."></a></TD> 
									<TD><a title="Regresar" href="org_status_procesos.php"><img src="iconos/regresar.png " width="20"  class="rounded float-start" title ="Regresar " alt="..."></a></TD>
								</TR>
							</TABLE>
						</div>

<div class="row">


	
	  
<?php  

$fechadeactualizacion = date('2019');
$anoactual = date('Y');
$mesactual = date ('m');
$proyecdisponibles1= $anoactual-1;
$proyecdisponibles2= $anoactual-2;
$proyecdisponibles3= $anoactual-3;
 

$buscar= $_GET["buscar"];
// echo $buscar;
// $pagina = $_GET["pagina"];
// include 'conexionbd.php';
// //  $sql = "SELECT *, SUBSTRING(fecha_autorizacion, -4) AS ano FROM sectorcentral INNER JOIN fechasectocentral ON sectorcentral.id_secretaria = fechasectocentral.id_secretaria WHERE fechasectocentral.id_fech IN (SELECT MAX(fechasectocentral.id_fech) FROM fechasectocentral GROUP BY fechasectocentral.id_secretaria) and sectorcentral.secretaria  like '%$buscar%'";
// //  $sql = "SELECT * FROM fechasectocentral where secretaria  like '%$buscar%'";
// // $sql=" SELECT * , MAX(fecha_verificacion), SUBSTRING(fecha_verificacion, -4) AS fecha1 from fechasectocentral where secretaria  like '%$buscar%' and estatus='autorizado' group by secretaria";

// // $sql="SELECT id_fech,id_secretaria, secretaria, fecha_verificacion, comentario, estatus, SUBSTRING(fecha_verificacion, -4) AS fecha1 FROM  (SELECT id_fech,id_secretaria, secretaria, fecha_verificacion, comentario, estatus,  max(fecha_verificacion) over (partition by id_secretaria) as max_fecha FROM fechasectocentral) con_max_fecha where  secretaria  like '%$buscar%' and estatus ='autorizado' and fecha_verificacion = max_fecha order by id_secretaria ";
// $sql="SELECT id_fech,id_secretaria, secretaria, fecha_verificacion, comentario, estatus, SUBSTRING(fecha_verificacion, -4) AS fecha1 FROM  (SELECT id_fech,id_secretaria, secretaria, fecha_verificacion, comentario, estatus,  max(fecha_verificacion) over (partition by id_secretaria) as max_fecha FROM fechasectocentral) con_max_fecha where  secretaria  like '%$buscar%' and fecha_verificacion!='' and estatus='autorizado' and fecha_verificacion = max_fecha order by id_secretaria ";
// $result = mysqli_query($conn, $sql);



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
$sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM organigrama where estatus='autorizado' ");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $productosPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $base_de_datos->prepare("SELECT id_fech,id_secretaria, secretaria, fecha_verificacion,version, comentario, estatus, SUBSTRING(fecha_verificacion, -4) AS fecha1 FROM  (SELECT id_fech,id_secretaria, secretaria, fecha_verificacion,version, comentario, estatus,  max(version) over (partition by id_secretaria) as max_fecha FROM organigrama) con_max_fecha where secretaria  like '%$buscar%' and fecha_verificacion!='' and estatus='autorizado' and version = max_fecha order by id_secretaria desc LIMIT ? OFFSET ? ");
$sentencia->execute([$limit, $offset]);
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);



?>
<div class="col-xs-12">
						
						
						<table class="table ">
							<thead>

								
								<th width="300"><center>Nombre de la Institucion</center></th>
								<th scope="col"><center>Ultima actualización</center></th>
								<th scope="col"><center>Antiguedad</center></th>
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
								if($ano>3 && $estatus="autorizado"){
													
										if($i==0||($max_cols == 0)){
											echo "<tr>";
										}
										
										
										
										echo "<td><center>". $producto->secretaria."</center></td>";
										echo "<td><center>". $producto->fecha_verificacion."</center><br></td>";
										echo "<td><center> Hace ". $ano." años</center></td>";
										echo "<td><center>&nbsp; <a title='Regresar' href='org_status_procesos.php'> <img src='./iconos/archivo.png' alt='dd' width='40' height='40' title ='Descargar ultimo proyecto actualizado' ></a></center></td>";
										
									
										
										if(($i%($max_cols-1)==4 && $i!= 0)||$i == ($conteo-1)){
											echo "</tr>";
										}
										$i++;
								 
								
								
								?>
								
									
								
							<?php } }?>
							</tbody>
						</table>
						
					</div>	
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Actualizar organigrama</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				

						
                		
				<!--  -->
				
				Usted esta apunto de iniciar con el proceso de actualización del Orgranigrama de la <?php echo $producto->secretaria; ?> ,
                es importante cambiar el estatus, agregar un comentario y subir un documento que respalde el inicio
		        de la actualizacion del Orgranigrama.</p><br>
				

				<form id="miFormulario">
					<input type="hidden" id="idsecretaria" name="idsecretaria" value="<?php echo $id25; ?>">
					<input type="hidden" id="secretaria" name="secretaria" value="<?php echo $producto->secretaria; ?>">
					<input type="hidden" id="fecha_inicial" name="fecha_inicial" value="<?php echo $producto->fecha_inicial; ?>">
					<input type="hidden" id="fecha_inicial" name="fecha_verificacion" value="<?php echo $fecha_verificacion ?>">
									

					<label for="select-comunidad">Tipo de estatus</label>
					<select name="estatusespecifico" required>
						<option value="">Seleccione una opción</option>
						<option value="Revision por la SCyTG">Solicitado p/Oficio</option>
						<option value="Envio de observaciones a la Institucion">Solicitado c/Apercibimiento</option>
						<option value="En Firma por SCyTG">Recibido en SCyTG(en Fila)</option>
						
						
					</select><br>
					<input type="hidden" name="estatusgeneral" value="proceso" />
					<br>
					<textarea class="form-control" name="comentario" aria-label="With textarea" placeholder="Agrega un comentario" required></textarea>
					<br>
					Sube el documento correspondiente aquí
       
       <div class="form-group">
     <input type="hidden" name="MAX_FILE_SIZE" value="51200000000000" />
     <input name="subir_archivo" type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/jpeg,application/pdf">
					
					<br>
					<br>
					<button type="submit">Guardar</button>
				</form>

				
					
					<!-- <div class="input-group">
					<span class="input-group-text">Comentario</span>
					<textarea class="form-control" aria-label="With textarea"></textarea>
					</div><br>
					<select class="form-select form-select-sm" aria-label="Small select example">
						<option selected>Selecciona el estatus del proyecto</option>
						<option value="1">Revision por la SCyTG</option>
						<option value="2">Revision por SEFINA</option>
						<option value="3">Correcion de observaciones por la Dependencia</option>
						<option value="2">En firma por parte de SEFINA</option>
						<option value="2">En firma por parte de SCyTG</option>

						

						
					</select>

            </div>
            <div class="modal-footer">
			<input class="btn btn-primary" type="submit" value="Guardar">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div> -->
        </div>
    </div>
</div>



</body>
</html> 
<?php 
    $id24= $_GET["idsecretaria"];
    $id25= $_GET["idsecretaria2"];

       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" href="./pagina_v4/css/2.css"> -->
</head>
<body>
    

    <?php echo $id24; ?>



    <div class="row">
						
						
					</div>
					<div class="col-md-3 offset-md-10">
							<TABLE WIDTH="40%" >
								<TR >
									<TD><a title="Regresar" href="commt.org.new.php?&idsecretaria=<?php echo $id24;?>&idsecretaria2=<?php echo $id25;?>"data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="iconos/mas.png "  width="20"  class="rounded float-start" title ="Agregar comentario " alt="..."></a></TD> 
									<TD><a title="Regresar" href="org_status_procesos.php"><img src="iconos/grafica.png "  width="40"  class="rounded float-start" title ="Grafica " alt="..."></a></TD> 
									<TD><a title="Regresar" href="org_status_procesos.php"><img src="iconos/impresora.png " width="40"  class="rounded float-start" title ="Imprimir " alt="..."></a></TD>
									<TD><a title="Regresar" href="org_status_procesos.php"><img src="iconos/regresar.png " width="20"  class="rounded float-start" title ="Regresar " alt="..."></a></TD>
								</TR>
							</TABLE>
						</div>
 
     </div>
 
<!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Abrir Modal</a>     -->
<!-- Button trigger modal -->

<!-- La ventana modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Título de la Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                ¡Hola! Esta es una ventana modal.
                <p>Para más información, visita <a href="https://example.com" target="_blank">este enlace</a>.</p>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>




<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardar Datos con jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</head>
<body>
    <h1>Formulario de Usuarios</h1>
    <form id="miFormulario">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
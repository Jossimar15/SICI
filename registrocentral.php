
<meta charset='utf-8'>
<?php

$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

//echo date("j "); //imprime dia
//echo $meses[date('n')-1]; //impre mes
//echo date(" Y");
/*
* author: Código Root </>
* Mi blog: https://codigoroot.net/blog
*/ 
date_default_timezone_set("America/Mexico_City");

$fechaActual = date('d/m/Y');
   
  
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar Nuevo Proyecto</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body><br>
<div class="container">
	<center><h2>REGISTRAR NUEVO PROYECTO</h2></center><p><br>
  <!-- <center><h4>SECTOR CENTRAL</h4></center><br></p> -->
<form method="POST" enctype="multipart/form-data" action="upload.php" >


<?php include 'conexionbd.php';
$sql = "SELECT * FROM lista ";
$result = mysqli_query($conn, $sql);
?>
 

<div class="row">   
  <div class="col">
  <div class="form-group">
  <select name="secretaria" id="inputState" class="form-control" required>
    <option selected>Elige una Secretaria</option>
    <?php 
    while ($crow = mysqli_fetch_assoc($result)) {
        // Concatenar el ID y el nombre de la institución en el atributo value
        $optionValue = $crow['id'] . "|" . $crow['nombre_institucion'] . " | " . $crow['fecha_aprobacion']." | " . $crow['fecha_creacion'];
        echo "<option value='" . $optionValue . "'>" . $crow['nombre_institucion'] . "</option>";
    }
    ?>
</select>

  </div>

  </div>
  <div class="col">
    
  	<div class="form-group">
		   <select  type="text"   name="proyecto" id="inputState" class="form-control" required>
			  <option selected>Tipo de proyecto</option>
			  <option>Organograma</option>
			  <option>Reglamento Interno</option>
			  <option>Manual de Organizacion</option>
			  <option>Manual de Procedimientos</option>
			  <option>Manual de Tramites y Servicios</option>
			  <!-- <option>Codigo de Conducta</option>
			  <option>Marcos Juridicos Especificos</option>
			  <option>Comites de Control Interno</option>
			  <option>Comites de Etica</option> -->
		    </select>
		  </div>

  </div>

  <div class="col">
        <input type="text"  name="fecha_inicial" value="<?php echo "$fechaActual"; ?>" class="form-control" placeholder="fechaActual" readonly="readonly" required>
  </div>
</div>

<br>

<div class="row">
    <div class="col">
      <div class="form-group">
          <select  type="text"  name="estatus" id="inputState" class="form-control">
            <option value="0" selected>Estatus General</option>
            <option value="autorizado">Vigente</option>
            <option value="proceso">En actualización</option>
            <option value="desactualizado">Desactualizado</option>
          </select>
      </div>
    </div>
    
    <div class="col">
      <div class="form-group">
          <select  type="text"  name="seguimiento" id="inputState" class="form-control">
            <option value="0" selected>Estatus especifico</option>
            <option>Sin Movimiento</option>
            <option>Solicitado p/Oficio</option>
            <option>Solicitado c/Apercibimiento</option>
            <option>Recibido en SCyTG(en Fila)</option>
            <option>En Revisión SCyTG</option>
            <option>Enviado c/Observaciones</option>
            <option>Revisión Finalizada</option>
            <option>En Revisión SEFINA</option>
            <option>En Elaboración de Dictamen Estructual</option>
            <option>en Firma de Institución</option>
            <option>en Firma SEFINA</option>
            <option>en Firma SCyTG</option>
            <option>Validado y Actualizado</option>
            <option>Detenido</option>
          </select>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
            <select  type="text"  name="responsable" id="inputState" class="form-control">
                <option value="0" selected>Responsable del proyecto</option>
                <option>José Abrham</option>
                <option>Susana</option>
                <option>Olgaliva</option>
                <option>Yuridia</option>
                <option>Claudia</option>
                <option>Laura</option>
                <option>Monserrat</option>
            </select>
      </div>  
    </div>
</div> <!--Se cierra el row-->

  <div class="row">
 
     <!-- <input type="hidden" name="estatus" value="nuevo" /> -->
     <input type="hidden" name="sector" value="Central" />
 
   </div>
  
   <div class="row">
    <div class="col"><br>
    <textarea class="form-control" name="comentario" aria-label="With textarea" placeholder="Comentario" required></textarea>
    </div>
    <div class="col"><br>
    
    Sube el proyecto en PDF,el nombre del archivo no debe tener espacios
       
       <div class="form-group">
     <input type="hidden" name="MAX_FILE_SIZE" value="51200000000000" />
     <input name="subir_archivo" type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/jpeg,application/pdf">

    </div>

  </div>  </div> 
  <br>
  <input class="btn btn-danger" type="submit" value="Registrar Proyecto" />
  </form>
      
    </div>
    <div class="col">
      <!-- <input type="text" name="codigo" class="form-control" placeholder="Codigo"> -->
    </div>
  </div>

<br><br><br><br><br>
  <!-- <div class="row">
    <div class="col">Sube el proyecto en PDF,el nombre del archivo no debe tener espacios
       
      <div class="form-group">
    <input type="hidden" name="MAX_FILE_SIZE" value="51200000000000" />
    <input name="subir_archivo" type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/jpeg,application/pdf"><input type="submit" value="Guardar informacion" />
  </div>
    </div>

    <input type="hidden" name="estatus" value="nuevo" />
    <input type="hidden" name="sector" value="Central" />

  </div></form> -->

</div> <!--Cerrar el contenero-->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

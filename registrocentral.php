
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
	<center><h2>REGISTRAR NUEVO PROYECTO</h2></center><p>
  <center><h4>SECTOR CENTRAL</h4></center><br></p>
<form method="POST" enctype="multipart/form-data" action="upload.php" >
<div class="row">
  <div class="col">
    
  	<div class="form-group">
		   <select  type="text"  name="secretaria" id="inputState" class="form-control">
			  <option selected>Elige una Secretaria</option>
			  <option>Secretaría General de Gobierno</option>
			  <option>Secretaría de Planeación y Desarrollo Regional</option>
			  <option>Secretaría de Finanzas y Administración</option>
			  <option> Secretaría de Desarrollo Social</option>
			  <option>Secretaría de Desarrollo Urbano, Obras Públicas y Ordenamiento Territoria</option>
			  <option>Secretaría de Seguridad Pública</option>
			  <option>Secretaría de Educación Guerrero</option>
			  <option>Secretaría de Cultura</option>
			  <option>Secretaría de Salud</option>
			  <option>Secretaría de Fomento y Desarrollo Económico</option>
			  <option>Secretaría de Turismo</option>
			  <option>Secretaría de Agricultura, Ganadería, Pesca y Desarrollo Rura</option>
			  <option>Secretaría de Medio Ambiente y Recursos Naturales</option>
			  <option>Secretaría de Asuntos Indígenas y Afromexicanos</option>
			  <option>Secretaría de la Mujer</option>
			  <option>Secretaría de la Juventud y la Niñez</option>
			  <option>Secretaría de los Migrantes y Asuntos Internacionales</option>
			  <option>Secretaría del Trabajo y Previsión Social</option>
			  <option>Secretaría de Protección Civil</option>
			  <option>Secretaría de Contraloría y Transparencia Gubernamental</option>
		    </select>
		  </div>


  </div>
  <div class="col">
    
  	<div class="form-group">
		   <select  type="text"   name="proyecto" id="inputState" class="form-control">
			  <option selected>Tipo de proyecto</option>
			  <option>Organograma</option>
			  <option>Reglamento Interno</option>
			  <option>Manual de Organizacion</option>
			  <option>Manual de Procedimientos</option>
			  <option>Manual de Tramites y Servicios</option>
			  <option>Codigo de Conducta</option>
			  <option>Marcos Juridicos Especificos</option>
			  <option>Comites de Control Interno</option>
			  <option>Comites de Etica</option>
		    </select>
		  </div>

  </div>
  <div class="col">
        <input type="text"  name="fecha" value="<?php echo "$fechaActual"; ?>" class="form-control" placeholder="fechaActual" readonly="readonly">
  </div>
</div>

<br>
  <div class="row">
    <div class="col">
      <input type="text"  name="elaboro" class="form-control" placeholder="Enlace">
    </div>
    <div class="col">
      <input type="text"  name="telefono" class="form-control" placeholder="Telefono">
    </div>
    <div class="col">
      <input type="email"  name="correo" class="form-control" placeholder="Correo">
    </div>
  </div>


  <br>
  <div class="row">
    <div class="col">
      <input type="text"  name="version" class="form-control" placeholder="Version">
    </div>
    <div class="col">
        <div class="form-group">
       <select  type="text"  name="res" id="inputState" class="form-control">
        <option value="0" selected>Responsable del proyecto</option>
        <option>Lic. Angel</option>
        <option>Lic. Claudia</option>
        <option>Lic. NNN</option>
        
        </select>
      </div>
      
      
    </div>
    <div class="col">
      <input type="text" name="codigo" class="form-control" placeholder="Codigo">
    </div>
  </div>

<br>
  <div class="row">
    <div class="col">Sube el proyecto en PDF,el nombre del archivo no debe tener espacios
       
      <div class="form-group">
    <input type="hidden" name="MAX_FILE_SIZE" value="51200000000000" />
    <input name="subir_archivo" type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/jpeg,application/pdf"><input type="submit" value="Guardar informacion" />
  </div>
    </div>

    <input type="hidden" name="estatus" value="nuevo" />
    <input type="hidden" name="sector" value="Central" />

  </div></form>

</div> <!--Cerrar el contenero-->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

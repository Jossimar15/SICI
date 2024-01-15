<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
		$('#inicio').click(function(){
		$("#contenido").load("iniciosoft.php");
		});

    $('#registrocentral').click(function(){
    $("#contenido").load("registrocentral.php");
    });

    $('#registroparaestatal').click(function(){
    $("#contenido").load("registroparaestatal.php");
    });

    $('#actualizarcentral').click(function(){
    $("#contenido").load("actualizarcentral.php");
    });

    $('#actualizarparastatal').click(function(){
    $("#contenido").load("actualizarparastatal.php");
    });

		});

		

	</script>
</head>


<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #890e33;">
  <div class="container-fluid">
    <img src="imagenes/logo.png" class="img-fluid" alt="logitpo">
     <span class="navbar-brand mb-0 h1">&nbsp;&nbsp;Sistema de Control Interno</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" id="inicio" >Inicio</a>
        </li>
                  
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proyectos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#" id="registrocentral">Registro de proyecto en el sector central</a></li>
            <li><a class="dropdown-item" href="#" id="registroparaestatal">Registro de proyecto en el sector paraestatal</a></li>
            <li><a class="dropdown-item" href="#" id="actualizarcentral">Actualización de proyectos del sector central</a></li>
            <li><a class="dropdown-item" href="#" id="actualizarparastatal">Actualización de proyectos del sector paraestatal</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Proyectos extraordinarios</a></li>
          </ul>
        </li>

          <li><a class="nav-link" href="#" id="">Indicadores</a></li>
          <li><a class="nav-link" href="#" id="">Descargar reporte</a></li>
        
  <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ver más
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Proyectos nuevos</a></li>
            <li><a class="dropdown-item" href="#">Proyectos en revision</a></li>
            <li><a class="dropdown-item" href="#">Proyectos validados</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Proyectos extraordinarios</a></li>
          </ul>
        </li>

-->

        <!--<li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>-->
      </ul>
      <form class="d-flex">
        <!-- <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"> -->
        <!-- <button type="button" class="btn btn-primary" style=" color:#ffffff; background-color: #d5ac7a;  border: none;  --bs-btn-font-size: .75rem;">Buscar</button>&nbsp;&nbsp; -->
      </form>
    </div>
  </div>
</nav>		  
</body>
</html>

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
			    <option>Secretaría de General de Gobierno (SEGOB)</option>
          <option>Coordinación Técnica del Sistema Estatal del Registro Civil (OA de SEGOB)</option>
          <option>Coordinación General de Fortalecimiento Municipal (FORTAMUN)</option>
          <option>Comisión Estatal de Búsqueda de Personas [OAD de SEGOB]</option>
          <option>Comisión Técnica de Transporte y Vialidad (OAD de SEGOB)</option>
          <option>Delegaciones Generales de Gobierno del Estado del Estado de Guerrero (OAD de SEGOB)</option>
          <option>Secretaría Ejecutiva del Sistema Estatal de Protección Integral de los Derechos de Niñas, Niños y Adolescentes</option>
          <option>Unidad Estatal para la Protección de Personas Defensoras de Derechos Humanos y Periodistas [OAD de SEGOB]</option>
          <option>Dirección General del Registro Público de la Propiedad y del Comercio</option>
          <option>Secretaría de Planeación y Desarrollo Regional (SEPLADER)</option>
          <option>Comité de Planeación para el Desarrollo del Estado de Guerrero (COPLADEG) [OAD de SEPLADER]</option>
          <option>Secretaría de Finanzas y Administración (SEFINA)</option>
          <option>Centro Estatal de Administración y Servicios Integrales Ixtapa (CEASII)</option>
          <option>Secretaría de Bienestar</option>
          <option>Secretaría de Desarrollo Urbano, Obras Públicas y Ordenamiento Territorial (SDUOPOT)</option>
          <option>Secretaría de Seguridad Publica (SSP)</option>
          <option>Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública (SESESP) [OAD de SSP]</option>
          <option>Universidad Policial del Estado de Guerrero (UNIPOL) [OAD de SSP]</option>
          <option>Secretaría de Educación Guerrero (SEG)</option>
          <option>Secretaría de Cultura (SECULTURA)</option>
          <option>Secretaría de Salud (SSA)</option>
          <option>Administración del Patrimonio de la Beneficencia Publica (OAD de SSA)</option>
          <option>Centro de Trasplantes del Estado de Guerrero (CETRAEG) [OAD de SSA]</option>
          <option>Comisión Estatal de Arbitraje Médico (CEAM-GRO) [OAD de SSA]</option>
          <option>Comisión para la Protección contra Riesgos Sanitarios del Estado de Guerrero (COPRISEG) [OAD de SSA]</option>
          <option>Consejo de Salud Mental y contra las Adicciones del Estado de Guerrero [OAD de SSA]</option>
          <option>Secretaría de Fomento y Desarrollo Económico (SEFODECO)</option>
          <option>Comisión de Mejora Regulatoria del Estado de Guerrero (CEMER) [OAD de SEFODECO]</option>
          <option>Secretaría de Turismo (SECTUR)</option>
          <option>Secretaría de Agricultura, Ganadería, Pesca y Desarrollo Rural (SAGADEGRO)</option>
          <option>Secretaría de Medio Ambiente y Recursos Naturales (SEMAREN)</option>
          <option>Zoológico Zoochilpan (OAD de SEMAREN)</option>
          <option>Secretaría para el Desarrollo de los Pueblos Indígenas y Afroamericanos (SEDEPIA)</option>
          <option>Secretaría de la Mujer (SEMUJER)</option>
          <option>Secretaría de la Juventud y la Niñez (SEJUVE)</option>
          <option>Secretaría de los Migrantes y Asuntos Internacionales (SEMAI)</option>
          <option>Secretaría del Trabajo y Previsión Social (STyPS)</option>
          <option>Secretaría de Gestión Integral de Riesgos y Protección Civil</option>
          <option>Secretaría de Contraloría y Transparencia Gubernamental (SCyTG)</option>
          <option>Oficina de la Gubernatura</option>
          <option>Coordinación General de Gobernanza e Innovación Digital del Estado de Guerrero</option>
          <option>Consejería Jurídica del Poder Ejecutivo</option>
          <option>Procuraduría de Protección Ambiental (PROPAEG)</option>
          <option>Archivo General del Estado</option>
          <option>Secretaría Ejecutiva del Sistema Estatal Anticorrupción de Guerrero (SESEAGRO)</option>
          <option>ACAbus</option>
          <option>Comisión Ejecutiva Estatal de Atención a Víctimas (CEEAV-GRO)</option>
          <option>Instituto Radio y Televisión de Guerrero (RTG)</option>
          <option>Instituto de Seguridad Social de los Servidores Públicos del Estado de Guerrero (ISSSPEG)</option>
          <option>Instituto Guerrerense para la Atención Integral de las Personas Adultas Mayores (IGATIPAM)</option>
          <option>Sistema para el Desarrollo Integral de la Familia del Estado de Guerrero (DIF-GRO)</option>
          <option>Comisión de Agua Potable, Alcantarillado y Saneamiento del Estado de Guerrero (CAPASEG)</option>
          <option>Comisión de Infraestructura Carretera y Aeroportuaria del Estado de Guerrero (CICAEG)</option>
          <option>Instituto de Vivienda y Suelo Urbano de Guerrero (INVISUR)</option>
          <option>Promotora Turística de Guerrero (PROTUR)</option>
          <option>Instituto de la Policía Auxiliar del Estado de Guerrero (IPAE)</option>
          <option>Colegio de Bachilleres del Estado de Guerrero (COBACH)</option>
          <option>Colegio de Educación Profesional Técnica del Estado de Guerrero (CONALEP)</option>
          <option>Consejo de Ciencia, Tecnóloga e Innovación del Estado de Guerrero (COCyTIEG)</option>
          <option>Escuela de Parteras Profesionales del Estado de Guerrero (EPPEG)</option>
          <option>Instituto de Bachillerato del Estado de Guerrero (IBGRO)</option>
          <option>Instituto del Bachillerato Intercultural del Estado de Guerrero (IBIEGRO)</option>
          <option>Instituto de Capacitación para el Trabajo del Estado de Guerrero (ICATEGRO)</option>
          <option>Instituto del Deporte de Guerrero (INDEG)</option>
          <option>Instituto Estatal para la Educación de Jóvenes y Adultos de Guerrero (IEEJAG)</option>
          <option>Instituto Guerrerense de la Infraestructura Física Educativa (IGIFE)</option>
          <option>Universidad Intercultural del Estado de Guerrero (UIEG)</option>
          <option>Universidad Politécnica del Estado de Guerrero (UPEG)</option>
          <option>Universidad Tecnológica de Acapulco (UTA)</option>
          <option>Universidad Tecnológica de la Costa Grande de Guerrero (UTCGG)</option>
          <option>Universidad Tecnológica del Mar del Estado de Guerrero  (UTM)</option>
          <option>Universidad Tecnológica de la Tierra Caliente (UTTC)</option>
          <option>Universidad Tecnológica de la Región Norte de Guerrero (UTRN)</option>
          <option>Universidad Tecnológica y Politécnica de Coyuca de Benítez</option>
          <option>Universidad Tecnológica y Politécnica de la Sierra de Guerrero</option>
          <option>Universidad Virtual de Guerrero (UVEGro)</option>
          <option>Escuela de Parteras Profesionales del Estado de Guerrero (EPPEG)</option>
          <option>Hospital de la Madre y el Niño Guerrerense (HMNG)</option>
          <option>Hospital de la Madre y el Niño Indígena Guerrerense (HMNiG)</option>
          <option>Instituto Estatal de Cancerología "Dr. Arturo Beltrán n Ortega"(IECAN)</option>
          <option>Instituto Estatal de Oftalmología (IEO)</option>
          <option>Servicios Estatales de Salud (SES)</option>
          <option>Agroindustrias del Sur (AGROSUR)</option>
          <option>Fondo de Apoyo a la Micro Empresa del Estado de Guerrero (FAMEGRO)</option>
          <option>Instituto Guerrerense del Emprendedor (INGE)</option>
          <option>Promotora y Administradora de los Servicios de Playa de Zona Federal Marítimo Terrestre (PASPLAZOFEMAT-Acapulco)</option>
          <option>Promotora y Administradora de los Servicios de Playa de Zona Federal Marítimo Terrestre de Zihuatanejo, Guerrero <option>(PASPLAZOFEMAT-Z)"</option>
          <option>Consejo Estatal del Café‚ (CECAFE)</option>
          <option>Consejo Estatal del Cocotero (CECOCO)</option>
          <option>Centro de Conciliación Laboral del Estado de Guerrero</option>
          <option>Fideicomiso Bahía de Zihuatanejo (FIBAZI)</option>
          <option>Fideicomiso para el Desarrollo Económico y Social de Acapulco (FIDACA)</option>
          <option>Fideicomiso Guerrero Industrial (FIGUEIN)</option>
          <option>Fideicomiso para la Promoción Turística de Acapulco (FIDETUR)</option>
          <option>La Avispa, Museo Interactivo</option>
          <option>Parque Papagayo</option>
          <option>Colegio de Estudios Científicos y Tecnológicos del Estado de Guerrero (CECyTEG)</option>
          <option>Instituto Tecnológico Superior de la Costa Chica (ITSCCH)</option>
          <option>Instituto Tecnológico Superior de la Montaña (ITSM)</option>
          <option>Orquesta Filarmónica de Acapulco (OFA)</option>
          <option>Consejo de Políticas Públicas</option>
          <option>Consejo Estatal para Prevenir la Discriminación</option>
          <option>Instituto de Cambio Climático del Estado de Guerrero</option>
          <option>Fideicomiso para la Promoción Turística de Taxco</option>
          <option>Fideicomiso para la Promoción Turística de Zihuatanejo</option>
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

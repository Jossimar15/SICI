<?php

$sector= $_POST["sector"];
//recibe la variable del arcivo buscarcentral

if (isset($_POST['secretaria'])) {
      // Obtener el valor seleccionado del <select>
      $selectedValue = $_POST['secretaria'];
  
      // Separar el valor del ID y el nombre de la institución usando explode()
      list($id, $nombre_institucion,$fecha_aprobacion,$fecha_creacion) = explode("|", $selectedValue);
  
      $id = trim($id);
      $nombre_institucion = trim($nombre_institucion);
      $fecha_aprobacion = trim($fecha_aprobacion);
      $fecha_creacion = trim($fecha_creacion);
  
      // Ahora puedes usar $id y $nombre_institucion por separado
      echo "ID: " . $id;
      echo "Nombre de la institución: " . $nombre_institucion;
      echo "Fecha de aprobacion: " . $fecha_aprobacion;
      echo "Fecha de creacion: " . $fecha_creacion;
  }
 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sici";
  
  // Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  
  
  // Verificar conexión
  if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
  }
  
  $result = $conn->query("SELECT COUNT(*) as total FROM organigrama");
  $row = $result->fetch_assoc();
  $numero = $row['total'] + 1; 


//insertar CONDICIONALES IF...ELSE IF...ELSE EN PHP

												//aqui se coloca la condicion para guardar datos de la central
if($sector ==='Central') {

$id;
$nombre_institucion;  
$proyecto = $_POST["proyecto"]; 
$fecha_inicial = $fecha_creacion;
$fecha_modificacion= $_POST["fecha_inicial"];
$fecha_verificacion= $fecha_aprobacion;
$numero;
$estatus= $_POST["estatus"];
$seguimiento= $_POST["seguimiento"];
$responsable= $_POST["responsable"];
$comentario = $_POST["comentario"];





$directorio = 'archivos/';
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
echo "<div>";
if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
      echo "El archivo es válido y se cargó correctamente.<br><br>";
	   //echo"<a href='".$subir_archivo."' target='_blank'><img src='archivos/".$subir_archivo."' width='150'></a>";
    } else {
       echo "La subida ha fallado";
    }
    echo "</div>";

$nombre_archivo = $_FILES['subir_archivo']['name'];
//    echo "$nombre_archivo";
date_default_timezone_set("America/Mexico_City");

$codigo_fecha = date(" -d-m-Y-H-i-");         
$no_aleatorio = rand(100, 999); //GENERAMOS TRES DIGITOS PARA INCORPORARLO AL FINAL DEL CODIGO
$codigo = $no_aleatorio.$codigo_fecha.$no_aleatorio; //CODIGO DE 17 DIGITOS

//RENOMBRAMOS EL ARCHIVO SUBIDO
list($nombre, $ext) = explode(".", $nombre_archivo);
$nombre_actual = "$codigo"."."."$ext" ;
rename("archivos/$nombre_archivo","archivos/$nombre_actual");
//echo "$nombre_actual";
	
include 'conexionbd.php';

//Se comprueba en el arreglo que el dato de la variable exista, para que realize la funcion a traves del siguiente codigo, in_array
// $os = array("Secretaría de General de Gobierno (SEGOB)","Secretaría de Planeación y Desarrollo Regional","Secretaría de Finanzas y Administración","Secretaría de Desarrollo Social","Secretaría de Desarrollo Urbano, Obras Públicas y Ordenamiento Territoria", "Secretaría de Seguridad Pública","Secretaría de Educación Guerrero","Secretaría de Cultura","Secretaría de Salud","Secretaría de Fomento y Desarrollo Económico","Secretaría de Turismo","Secretaría de Agricultura, Ganadería, Pesca y Desarrollo Rura","Secretaría de Medio Ambiente y Recursos Naturales","Secretaría de Asuntos Indígenas y Afromexicanos","Secretaría de la Mujer","Secretaría de la Juventud y la Niñez","Secretaría de los Migrantes y Asuntos Internacionales","Secretaría del Trabajo y Previsión Social","Secretaría de Protección Civil","Secretaría de Contraloría y Transparencia Gubernamental");

// $count = count($os);

// if (in_array("$secretaria", $os)) {
//     echo "la palabra $secretaria si existe en el arreglo y se encuentra la posición";

//     $clave = array_search($secretaria, $os);

//     echo $clave;
//     }




$sql = "INSERT INTO organigrama (id_secretaria,secretaria,fecha_inicial, fecha_modificacion, version, fecha_verificacion, estatus, seguimiento, responsable, comentario) VALUES ('$id','$nombre_institucion','$fecha_inicial','$fecha_modificacion','$numero','$fecha_verificacion','$estatus','$seguimiento','$responsable','$comentario')";

// $sql2 = "INSERT INTO fechasectocentral (id_secretaria,secretaria,fecha_inicial,fecha_de_modificacion, fecha_verificacion) VALUES ('$secretaria','$fecha','','')";


if (mysqli_query($conn, $sql)) {
      
//echo "exito";

}{
      // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// if (mysqli_query($conn, $sql2)) {
//       // code...
// } else {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
mysqli_close($conn);





												


                                                                        //aqui se coloca la condicion para guardar datos de la parastatal
} else if($sector ==='Parestatal') {

$secretaria = $_POST["secretaria"];   
$proyecto = $_POST["proyecto"]; 
$fecha = $_POST["fecha"];
$elaboro = $_POST["elaboro"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$version = $_POST["version"];
$res = $_POST["res"];
$codigocontaloria = $_POST["codigo"];
$estatus= $_POST["estatus"];

$directorio = 'archivos/';
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
echo "<div>";
if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
      echo "El archivo es válido y se cargó correctamente.<br><br>";
	   //echo"<a href='".$subir_archivo."' target='_blank'><img src='archivos/".$subir_archivo."' width='150'></a>";
    } else {
       echo "La subida ha fallado";
    }
    echo "</div>";

$nombre_archivo = $_FILES['subir_archivo']['name'];
//    echo "$nombre_archivo";
date_default_timezone_set("America/Mexico_City");

$codigo_fecha = date(" -d-m-Y-H-i-");         
$no_aleatorio = rand(100, 999); //GENERAMOS TRES DIGITOS PARA INCORPORARLO AL FINAL DEL CODIGO
$codigo = $codigocontaloria.$codigo_fecha.$no_aleatorio; //CODIGO DE 17 DIGITOS
 
//RENOMBRAMOS EL ARCHIVO SUBIDO
list($nombre, $ext) = explode(".", $nombre_archivo);
$nombre_actual = "$codigo"."."."$ext" ;
rename("archivos/$nombre_archivo","archivos/$nombre_actual");
//echo "$nombre_actual";
	
include 'conexionbd.php';

$sql = "INSERT INTO sectorparastatal (secretaria,tipoproyecto, fecha, elaboro, telefono, correo, version, responsable, codigo, nombreproyecto, estatus, sector) VALUES ('$secretaria','$proyecto', '$fecha','$elaboro','$telefono','$correo','$version','$res','$codigocontaloria','$nombre_actual','$estatus','$sector')";
if (mysqli_query($conn, $sql)) {
      
//echo "exito";

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

//actulizar proyecto sector central




} else if ($sector==='buscacentral') { //se utliza la misma variable $secto solo cambia el valor de cada form para ejecutar la consulta


include 'resultadosectorcentral.php';



}


/*else if () { //se utliza la misma variable $secto solo cambia el valor de cada form para ejecutar la consulta
	
}*/

else{


};











/*
$directorio = 'archivos/';
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
echo "<div>";
if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
      echo "El archivo es válido y se cargó correctamente.<br><br>";
	   //echo"<a href='".$subir_archivo."' target='_blank'><img src='archivos/".$subir_archivo."' width='150'></a>";
    } else {
       echo "La subida ha fallado";
    }
    echo "</div>";

$nombre_archivo = $_FILES['subir_archivo']['name'];
//    echo "$nombre_archivo";
date_default_timezone_set("America/Mexico_City");

$codigo_fecha = date(" -d-m-Y-H-i-");         
$no_aleatorio = rand(100, 999); //GENERAMOS TRES DIGITOS PARA INCORPORARLO AL FINAL DEL CODIGO
$codigo = $codigocontaloria.$codigo_fecha.$no_aleatorio; //CODIGO DE 17 DIGITOS
 
//RENOMBRAMOS EL ARCHIVO SUBIDO
list($nombre, $ext) = explode(".", $nombre_archivo);
$nombre_actual = "$codigo"."."."$ext" ;
rename("archivos/$nombre_archivo","archivos/$nombre_actual");
//echo "$nombre_actual";
	
include 'conexionbd.php';

$sql = "INSERT INTO sectorcentral (secretaria,tipoproyecto, fecha, elaboro, telefono, correo, version, responsable, codigo, nombreproyecto, estatus, sector) VALUES ('$secretaria','$proyecto', '$fecha','$elaboro','$telefono','$correo','$version','$res','$codigocontaloria','$nombre_actual','$estatus','$sector')";
if (mysqli_query($conn, $sql)) {
      
//echo "exito";

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
*/

?>
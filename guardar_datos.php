<?php
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

date_default_timezone_set('America/Mexico_City');
$hora = date('d/m/Y');


// Recibir datos del POST
$idsecretaria = $_POST['idsecretaria'];
$secretaria = $_POST['secretaria'];
$fecha_inicial = $_POST['fecha_inicial'];
$fecha_de_modificacion = date('d/m/Y');
$numero;
$fecha_de_verificacion = $_POST['fecha_de_verificacion'];
$seguimiento = $_POST['seguimiento'];
$comentario = $_POST['comentario'];


if($seguimiento=="autorizado"){
$fecha_de_verificacion = date('d/m/Y');
$estatus = "autorizado";
echo "El Proceso de actualizacion de la Estructura Orgnica ha culminado, su nueva fechade autorizacion es    ".$fecha_de_verificacion;
$sql = "INSERT INTO fechasectocentral (id_secretaria,secretaria,fecha_inicial,fecha_de_modificacion,version,fecha_de_verificacion,estatus,seguimiento,comentario) VALUES (?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss",$idsecretaria,$secretaria,$fecha_inicial,$fecha_de_modificacion,$numero,$fecha_de_verificacion,$estatus,$seguimiento,$comentario);

}else{
$fecha_de_verificacion = $_POST['fecha_de_verificacion'];
$estatus = "Proceso";
echo "Se guardao existosamente el comentario de la actualización de organigrama";
$sql = "INSERT INTO fechasectocentral (id_secretaria,secretaria,fecha_inicial,fecha_de_modificacion,version,fecha_de_verificacion,estatus,seguimiento,comentario) VALUES (?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss",$idsecretaria,$secretaria,$fecha_inicial,$fecha_de_modificacion,$numero,$fecha_de_verificacion,$estatus,$seguimiento,$comentario);
}

// Preparar y ejecutar la consulta
// $sql = "INSERT INTO fechasectocentral (id_secretaria, secretaria, fecha_inicial,fecha_de_modificacion,version,fecha_de_verificacion,estatus,comentario) VALUES (?, ?, ?,?,?, ?, ?,?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ssssssss", $idsecretaria, $secretaria,$fecha_inicial,$fecha_de_modificacion,$numero,$fecha_de_verificacion,$estatus,$comentario);

if ($stmt->execute()) {
    // echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>

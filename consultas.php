<?php 

// include 'conexionbd.php';
// $sql = "SELECT *,GROUP_CONCAT(fecha_de_verificacion SEPARATOR '<th> ') AS fecha1 FROM fechasectocentral where id_secretaria='2'";
// $result = mysqli_query($conn, $sql);


//    echo" <table border='1'>";
//    echo "<tr>";//encabezados
//         echo "<th>" . "id" . "</th>";
//         echo "<th>" . "id" . "</th>";
//         echo "<th>" . "fecha_de_verificacion" . "</th>";
//    echo "</tr>";
//    echo "<tr>";//fila de datos debajo de encabezados
//    echo "<td> " . $crow ['id_secretaria'] . "</td>";
//    echo "<th>" . $crow ['secretaria'] . "</th>";
//    echo "<th>" . $crow ['fecha1'] . "</th>";
//    echo "</tr>";


// include 'conexionbd.php';
// $sql = "SELECT * FROM ejemplo";
// $result = mysqli_query($conn, $sql);

// $columnas = 10;
// $filas = 1;

// echo "<table border='1'>";

// for($i=1; $i<=$filas; $i++){

//     while($crow = mysqli_fetch_assoc($result)){
//     echo "<tr>";

//     for($x=1; $x<=$columnas; $x++){
//         echo "<td>".$i."*".$x." = ".($i * $x)."</td>";
//     }
//     echo "</tr>";
//     }
// }
// echo "</table>";




// include 'conexionbd.php';

// $sql = "SELECT * FROM ejemplo";
// $result = mysqli_query($conn, $sql);
// echo '<table>';
// while ($data = mysqli_fetch_assoc($result)) { // En data tienes el primer registro
//    echo '<tr>';
   
// //    echo '<td>' . $data['id'] . '</td>'; // El primer dato siempre existe, ya que si no, no entraría en el while
//    for ($i = 0; $i <= 4; $i++) { // El bucle se ejecuta 5 veces, más la inicial, suman 6
//       if ($data = mysqli_fetch_assoc($result)) { // El if comprueba que realmente haya registros.
//          echo '<td>' . $data['name'] . '</td>';
//       } else { // Si no los hay se imprime la celda, pero vacía, para no descuadrar la tabla.
//          echo '<td></td>';
//       }
//    }
//    echo '</tr>';
// }
// echo '</table>';




// --------------------Este es el Bueno---------------------

// include 'conexionbd.php';
// $sql = "SELECT COUNT(id) totalRegistros FROM ejemplo";
// $result = mysqli_query($conn, $sql);
// $fila = mysqli_fetch_assoc($result);
// $totalRegistros=$fila['totalRegistros'];





// $tabla='<table border="1" cellspacing="0" cellpadding="0">';
// for($i=1;$i<=$totalRegistros;$i++){
// if ($i==0){
// // $tabla.='<tr><td><a>Holas1</a></td>';
// }
// else{
//     $tabla.='<td><a>Holas2</a></td>';
//     echo $i.",";
    
// }
// }
// $tabla.='</tr></table>';
// echo $tabla; ;


// -----------Sirve para contar cuantos registros--------------------

// include 'conexionbd.php';
// $sql = "SELECT *, count(id) totalRegistros FROM ejemplo";
// $result = mysqli_query($conn, $sql);
// $fila = mysqli_fetch_assoc($result);// solo adquiere el primer registro
// $totalRegistros=$fila['totalRegistros'];
// echo $totalRegistros;



// while ($fila = mysqli_fetch_assoc($result)) {
// echo $fila['name'];

// }

// $tabla='<table border="1" cellspacing="0" cellpadding="0">';
// for($i=0;$i<$totalRegistros;$i++){
// if ($i%6==0){
// $tabla.='<tr>';

// $tabla.='<td><a>ejemplo1</a></td>';
// }
// else{
    
// $tabla.='<td><a>perro<a></td>';

// }
// }
// $tabla.='</tr></table>';
// echo $tabla;

include 'conexionbd.php';
$sql = "select * from ejemplo";
$res_consulta = mysqli_query($conn, $sql);
$total_prods = mysqli_num_rows($res_consulta);
$x=1;
$i = 0; 
$max_cols = 6; // limite de columnas (celdas) por fila
$tabla='<table border="1" cellspacing="10" cellpadding="10"><tr>';
echo $tabla;

while($row = mysqli_fetch_array($res_consulta))
{      


if($i==0||($max_cols == 0)){
    echo "<tr>";
}
$nombre = $row['name'];
echo "<td>".$x= $nombre."</td>";

if(($i%($max_cols-1)==4 && $i!= 0)||$i == ($total_prods-1)){
    echo "<tr>";
}
$i++;
    
}
?>

<!-- https://www.forosdelweb.com/f18/siempre-ha-dado-mal-tablas-html-usando-php-935132/ -->
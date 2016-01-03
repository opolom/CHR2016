<?php 

//$choice =$_POST["button"]; 
//$cars = array("Honde", "BMW" , "Ferrari"); 
//$bikes = array("Ducaite", "Royal Enfield" , "Harley Davidson"); 
//if($choice == "cars") print json_encode($cars); 
//else print json_encode($bikes); 
 
function connectDB(){
   
        $server = "db483999662.db.1and1.com";
        $user = "dbo483999662";
        $pass = "murphito";
        $bd = "db483999662";
 
     $conexion = mysqli_connect($server, $user, $pass,$bd);
 
if (!$conexion) {
 trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}

 
    return $conexion;
}
 
function disconnectDB($conexion){
 
    $close = mysqli_close($conexion);

if (!$close) {
 trigger_error('Could not disconnect to MySQL: ' . mysqli_connect_error());
}
 
    return $close;
}
 

//Creamos la conexión con la función anterior
$conexion = connectDB();
 
  $jugadores = array(); // result variable

$i=0;

//$query = "SELECT id,nombre,descripcion FROM tabla1"; // query with SELECT

$query = "SELECT jornada,fecha,equipolocal,goleslocal,equipovisit,golesvisit FROM PartidosSMA"; // query with SELECT


mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
$result = mysqli_query($conexion, $query);


//while($row = mysqli_fetch_assoc($result)){ // iterate over results
// 
// $jugadores['item'][$i]['id'] = $row['id']; // rest similarly 
//    $jugadores['item'][$i]['Nombre'] = $row['nombre']; // rest similarly 
//    $jugadores['item'][$i]['Posicion'] = $row['descripcion']; // rest similarly         
//	    
//      $i++; 
//}
//
//header('Content-type: application/json'); // display result JSON format
//$json = json_encode(array(
//     'success' => true,
//     'data' => $data // this is your data variable
//),JSON_UNESCAPED_UNICODE);
//
//echo $json;



//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_assoc($result))
{
$jugadores[$i] = $row;
$i++;
}
echo json_encode($jugadores);









disconnectDB($conexion); //desconectamos la base de datos


?>
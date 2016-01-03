<?php

$server= "db483999662.db.1and1.com";
$user= "dbo483999662";
$password= "murphito";
$database= "db483999662";
$table="tabla1";

$conexion = mysql_connect($server,$user,$password);
mysql_select_db($database, $conexion);
 
$queTareas = "SELECT * FROM tabla1 ORDER BY nombre ASC";
$resTareas = mysql_query($queTareas, $conexion) or die(mysql_error());
$totTareas= mysql_num_rows($resTareas);
 
$arr = array();
 
if ($totTareas> 0) {
   while ($rowTareas = mysql_fetch_array($resTareas)) {
      $arr[] = $rowTareas;
   }
}
 
echo json_encode($arr);
 
?>
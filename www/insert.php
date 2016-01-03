<?php

$server= "db483999662.db.1and1.com";
$user= "dbo483999662";
$password= "murphito";
$database= "db483999662";
$table="tabla1";

$conexion = mysql_connect($server,$user,$password);
mysql_select_db($database, $conexion);

 
$nombre = $_POST['nombre'];
$descripcion = $_POST['posicion'];
 
$queTareas = "INSERT INTO tabla1 (nombre,descripcion) VALUES ('".$nombre."','".$descripcion."')";
mysql_query($queTareas, $conexion) or die(mysql_error());
 
echo "Registro satisfactorio";
 
 
?>
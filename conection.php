<?php
function conectar()
{
    $DB="bajashoes";
    $host="localhost";
    $usuario="root";
    $password="";
    $conexion = new PDO("mysql:host=$host;port=3306;dbname=$DB"
                , $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion;
}
?>
<?php
function conectar()
{
    $DB="bajashoes";
    $host="localhost";
    $usuario="root";
    $password="";
    $conexion = new PDO("mysql:host=$host;port=3306;dbname=$DB"
                , $usuario, $password);
    return $conexion;
}
?>
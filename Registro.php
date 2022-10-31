<?php

    include_once "conection.php"; 
    include_once "Usuario.php";

    if (isset($_POST["Registro"])){

        $correo=$_POST["CorreoR"];
        $contraseña = $_POST["pswR"];
        $nombre=$_POST["nombre"];
        $pais=$_POST["pais"];
        $estado=$_POST["estado"];
        $ciudad=$_POST["ciudad"];
        $tipo="Usuario";

        $conection = conectar();
        $consulta = $conection->prepare(
            "INSERT INTO usuarios (email, contraseña, tipo, nombre, país, estado, ciudad)".
            " VALUES (:email, :contra, :tipo, :nombre, :pais, :estado, :ciudad);");

        $consulta->bindParam(':email',$correo);
        $consulta->bindParam(':contra',$contraseña);
        $consulta->bindParam(':tipo',$tipo);
        $consulta->bindParam(':nombre',$nombre);
        $consulta->bindParam(':pais',$pais);
        $consulta->bindParam(':estado',$estado);
        $consulta->bindParam(':ciudad',$ciudad);

        $consulta->execute();

    }
?>  
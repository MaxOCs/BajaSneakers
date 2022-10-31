<?php

    include_once "conection.php"; 
    include_once "Usuario.php"; 
    session_start();
    if (isset($_POST["Login"]))
    {
       
        $email = ($_POST["correo"]);
        //$email="correo@gmail.com";
        $contraseña = password_hash($_POST["contra"],PASSWORD_DEFAULT);
        

        $conection = conectar();
        $consulta = $conection->prepare(
            "SELECT email,contraseña, id, tipo, nombre".
            " FROM usuarios WHERE email=:email");
        $consulta->bindParam(':email',$email);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        if ($registros)
        {
            $Verificado=password_verify($registros[0]['contraseña'],$contraseña);
            //if ($registros[0]['contraseña']==$contraseña){

            if ($Verificado){
                
                $usuario=new Usuario($registros[0]['nombre'],$registros[0]['email'],$registros[0]['contraseña'],$registros[0]['tipo'],$registros[0]['id']);
                $_SESSION['usuario']=$usuario;
                header("location: Logueado.php");
            }
            else
            {
                echo "<script>alert('No se encuentra el correo o contraseña dados'); </script>";
                //header("location: FormDinamico.php");  
                          
            }
        }
        else 
        {  
            
            echo "<script>alert('No se encuentra el correo o contraseña dados ');  </script>";
            
        }
    }

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
</head>
<body>
   
</body>

</html>

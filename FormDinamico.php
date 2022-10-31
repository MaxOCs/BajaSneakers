<?php
include_once "conection.php";
include_once "Login.php";
include_once "Registro.php";


$conexion = conectar();

if (isset($_GET["pais"]))
{
    $id = intval($_GET["pais"]);
    $consulta = $conexion->query("SELECT id, name FROM states WHERE country_id=".$id);
    $resultado = $consulta->fetchAll();
    foreach ($resultado as $estado)
    {
        echo "<option value='".$estado['id']."'>".$estado["name"]."</option>\r\n";
    }
}
else
{
    if (isset($_GET["estado"]))
    {
        $estado = intval($_GET["estado"]);
        $consulta = $conexion->query("SELECT id, name FROM cities WHERE state_id=".$estado);
        $resultado = $consulta->fetchAll();
        foreach ($resultado as $ciudad)
        {
            echo "<option value='".$ciudad['id']."'>".$ciudad["name"]."</option>\r\n";
        }
    }
    else
    {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="jquery-3.6.1.min.js"></script>
    <script src="script.js"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>  
    
    --->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
    
    <title>BajaShoes</title>

    <script>
        $(document).ready(function(){
            $("#pais").change(function(){
                $.get("FormDinamico.php?pais="+$(this).val(),function(respuesta){
                    $("#estado").empty();
                    $("#estado").append(respuesta);
                });
            });
            $("#estado").change(function(){
                $.get("FormDinamico.php?estado="+$(this).val(),function(respuesta){
                    $("#ciudad").empty();
                    $("#ciudad").append(respuesta);
                });
            });
            
        });
    </script>
</head>
<body>
    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a BajaSneakers</h2>
                <p>Si ya tienes una cuenta por favor inicia sesion aqui</p>
                <button class="sign-up-btn">Iniciar Sesion</button>
            </div>
        </div>
        <form class="formulario" id="Registrar" method="Post" action="FormDinamico.php" name="formulario">
            <h2 class="create-account">Crear una cuenta</h2>
            <input type="email" name="CorreoR" placeholder="Direccion de correo electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" title="Introduzca un correo valido">
            <input type="password" name="pswR" placeholder="Contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" required="" title="Porfavor introducir una contraseña: debe tener minimo una mayuscula, minuscula, numero y simbolo">
            <input type="text" name="nombre" placeholder="Nombre" required="" pattern="[a-zA-Z]+" title="Solo se aceptan caracteres" required="">
            <input type="text" name="apellido" placeholder="apellido" required="" pattern="[a-zA-Z]+" title="Solo se aceptan caracteres" required="">
            <input type="date" name="fechaN" placeholder="Fecha de nacimiento" required="" min="1920/01/01" max="2022/01/01" title="Introduzca una fecha de nacimiento con el formato correcto." require="">
            <div class="selectBox">
            <label>Pais:</label><select id="pais" name="pais" required>
            <?php
            $consulta = $conexion->query("SELECT id, name FROM countries");
            $resultado = $consulta->fetchAll();
            foreach ($resultado as $pais)
            {
                echo "<option value='".$pais['id']."'>".$pais["name"]."</option>\r\n";
            }
            ?>
                </select><br/>

                
            <label>Estado:</label><select id="estado" name="estado" required>
                </select><br/>
                
            <label>Ciudad:</label><select id="ciudad" name="ciudad" required>
                                                                                                                                                                                                                                                                                                                                                            
                </select><br/>
            
            </div>

            <input type="submit" name="Registro" value="Registrarse">
        </form>
        
    </div>
        <div class="container-form sign-in">
            <form class="formulario" id="Flogin" method="post" action="FormDinamico.php">
                <h2 class="create-account">Iniciar Sesion</h2>
                <input type="email"  placeholder="Email" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" title="Introduzca un correo valido">
                <input type="password"  placeholder="Contraseña" name="contra" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" title="Porfavor introducir una contraseña: debe tener minimo una mayuscula, minuscula, numero y simbolo">
                <label for="contra"></label>
                <input type="submit" name="Login" value="Iniciar Sesion">
                <p class="tengo-contraseña"><a href="#">¿Olvido su contraseña?</a></p>
            </form>
            <div class="welcome-back">
                <div class="message">
                    <h2>Bienvenido de nuevo</h2>
                    <p>Si aun no tienes una cuenta por favor registrese aqui</p>
                    <button class="sign-in-btn">Registrarse</button>
                </div>
            </div>
        </div>
    
</body>

</html>
<?php
    }
}
?>
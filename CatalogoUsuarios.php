<?php
include_once "Usuario.php";
include_once "conection.php";
$conexion = conectar();
//session_start();
$usuario;

if (isset($_SESSION['usuario']))
{
    /*
    $usuario = $_SESSION['usuario'];    
    if ($usuario->tipo != "superadmin")
    {
        header("location:FormDinamico.php");
        session_unset($_SESSION['usuario']);
        session_destroy();
    }
    */
}
else
    //header("location:index.php");  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Catalogo Usuarios</title>

    <script>
        let td = null;
        let tipo;
        $(document).ready(function(){
            $(".btnEditar").click(function(){
                if (td!=null)
                {
                    td.text(tipo);
                }
                td = $(this).parent().prev();
                tipo = td.text();
                td.empty();
                td.append("<select id='tipo'></select>");
                let select = td.children().first();
                let selected = "";
                if (tipo=="Admin")
                    selected = "selected";
                else
                    selected = "";
                select.append("<option "+selected+" value='Admin'>Admin</option>");
                if (tipo=="Usuario")
                    selected = "selected";
                else
                    selected = "";
                select.append("<option "+selected+" value='Usuario'>Usuario</option>");
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".btnCambiar").click(function(){
                let pd = $(this).parent().prev();
                let nom=$(this).parent().prev().prev();
                alert(nom.text());
                
            });
        });
    </script>
</head>

<body>
<main>
    <table class="catalogo <w3-table-all">
        <thead>
            <tr class="w3-blue" id="Fila">
                <th>id</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th style="width: 100px;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = $conexion->query("SELECT * FROM usuarios");
            $resultado = $consulta->fetchAll();
            foreach ($resultado as $usuario)
            {
            ?>
            <tr>
                <?php 
                    echo "<td>".$usuario["id"]."</td>".
                    "<td>".$usuario["nombre"]."</td>".
                    "<td>".$usuario["tipo"]."</td>"; 
                    
                ?>
                <td>
                    <img class="btnEditar"  src="img/Edit_icon.png">
                    <img class="btnCambiar" src="img/cambiar_icon.png">
                    <img src="img/eliminar_icon.png">
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <main>
    
</body>
</html>
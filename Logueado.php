<?php
    include_once "conection.php";
    include_once "Login.php";
    include_once "Usuario.php"
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    
    if (isset($_SESSION['usuario'])){
        $User=$_SESSION['usuario'];

        echo 'Su id de usuario es '. $User -> id." ". "<br>";
        echo 'Su tipo de usuario es '. $User->tipo." ". "<br>";
        echo 'Su nombre de usuario es '. $User->nombre." ". "<br>";
    }
    

?>

    
</body>
</html>
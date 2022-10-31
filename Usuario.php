<?php
class Usuario{
    public $nombre;
    public $correo;
    public $password;
    public $tipo;
    public $id;
    function __construct($nombre,$correo, $password, $tipo, $id){
        $this-> nombre=$nombre;
        $this-> correo=$correo;
        $this-> password=$password;
        $this-> tipo=$tipo;
        $this-> id=$id;
    }

}
/*
function restablecerContraseña(){
    $correo=this->$correo;
    $fecha=date("Y-m-d H:i:s");
    $token=md5($fecha); 
    $conexion()=connectar();
    $consulta=$conexion().prepare(
        "INSERT INTO correos (correo, token, fecha)
        VALUES (:correo, :token, :fecha)");
    $consulta->bindParam(':correo',$correo);
    $consulta->bindParam(':token',$token);
    $consulta->bindParam(':fecha',$fecha);
    $consulta->execute();
}
*/

/*
if (isset($_GET["opciones"]{
    switch ($_GET["opcion"]){
        case 1: "actualizarTipo":
            $id=$_GET["id"];
            $tipo=$_GET["tipo"];
            $conection = conectar();
            $consulta = $conection->prepare(
                "UPDATE usuarios SET tipo=:tipo where id=:id"; //el : es lo importante para evitar sql inyection
            $consulta->bindParam(':tipo',$tipo);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            break; // para que el admin cambie el tipo de usuario
            
   }
}))
*/

?>
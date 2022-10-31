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
?>
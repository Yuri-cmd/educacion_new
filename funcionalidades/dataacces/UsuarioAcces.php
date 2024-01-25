<?php


class UsuarioAcces extends Usuario
{

    private $conexion;


    public function __construct()
    {
        $this->conexion = (new Conexion())->getConexion();
    }

    public function insertar(){
        $sql="INSERT INTO usuarios
            (usuario_id,
             insti_id,
             usuario,
             clave,
             email,
             id_rol,
             estado)
VALUES (null,
        '{$this->getInstiId()}',
        '{$this->getUsuario()}',
        '{$this->getClave()}',
        '{$this->getEmail()}',
        '{$this->getIdRol()}',
        '{$this->getEstado()}');";
        $rest=  $this->conexion->query($sql);
        if ($rest){
            $this->setUsuarioId($this->conexion->insert_id);
        }
        return $rest;
    }
}
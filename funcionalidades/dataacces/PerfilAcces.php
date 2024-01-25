<?php


class PerfilAcces extends Perfil
{
    private $conexion;

    private $extra;

    public function __construct()
    {
        $this->conexion = (new Conexion())->getConexion();
    }

    public function exeSqlGetId($sql){
        $resp = $this->conexion->query($sql);
        if ($resp){
           $this->extra = $this->conexion->insert_id;
        }
        return $resp;
    }


    public function insertar(){
        $sql ="INSERT INTO perfiles
            (perfil_id,
             id_usuario,
             id_rol,
             genero,
             primer_nombre,
             segundo_nombre,
             apellido_paterno,
             apellido_materno,
             doc_id,
             doc_numero,
             fecha_nacimiento,
             fecha_registro,
             direccion,
             telefono_pricipal,
             foto_perfil)
VALUES (null,
        {$this->getIdUsuario()},
        '{$this->getIdRol()}',
        '{$this->getGenero()}',
        '{$this->getPrimerNombre()}',
        '{$this->getSegundoNombre()}',
        '{$this->getApellidoPaterno()}',
        '{$this->getApellidoMaterno()}',
        '{$this->getDocId()}',
        '{$this->getDocNumero()}',
        '{$this->getFechaNacimiento()}',
        now(),
        '{$this->getDireccion()}',
        '{$this->getTelefonoPricipal()}',
        '');";
        $rest = $this->conexion->query($sql);
        if ($rest){
            $this->setPerfilId($this->conexion->insert_id);
        }
        return $rest;
    }
    public function actualizar(){
        $sql ="UPDATE perfiles
        SET
          genero = '{$this->getGenero()}',
          primer_nombre = '{$this->getPrimerNombre()}',
          segundo_nombre = '{$this->getSegundoNombre()}',
          apellido_paterno = '{$this->getApellidoPaterno()}',
          apellido_materno = '{$this->getApellidoMaterno()}',
          doc_id = '{$this->getDocId()}',
          doc_numero = '{$this->getDocNumero()}',
          fecha_nacimiento = '{$this->getFechaNacimiento()}',
          direccion = '{$this->getDireccion()}',
          telefono_pricipal = '{$this->getTelefonoPricipal()}'
          
        WHERE perfil_id = '{$this->getPerfilId()}';";
        return $this->conexion->query($sql);
    }
    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

}
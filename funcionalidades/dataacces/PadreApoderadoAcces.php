<?php


class PadreApoderadoAcces extends PadreApoderado
{

    private $conexion;

    /**
     * MatriculaPadreAcces constructor.
     * @param $conexion
     */
    public function __construct()
    {
        $this->conexion = (new Conexion())->getConexion();
    }
    public function insertar_sinusaurio(){
        $sql ="INSERT INTO padre_apoderado
            (id_contacto,id_rol,id_insti,nombres,apellidos,direccion, departamento_id,provincia_id,
             distrito_id,telefono_1,telefono_2,tipo_doc,numero_doc,genero,fecha_nacimiento,nacionalidad,
             estado_civil,es_pagador,estado,email_concto)
VALUES (null,
        '{$this->getIdRol()}',
        '{$this->getIdInsti()}',
        '{$this->getNombres()}',
        '{$this->getApellidos()}',
        '{$this->getDireccion()}',
        '{$this->getDepartamentoId()}',
        '{$this->getProvinciaId()}',
        '{$this->getDistritoId()}',
        '{$this->getTelefono1()}',
        '{$this->getTelefono2()}',
        '{$this->getTipoDoc()}',
        '{$this->getNumeroDoc()}',
        '{$this->getgenero()}',
        '{$this->getFechaNacimiento()}',
        '{$this->getNacionalidad()}',
        '{$this->getEstadoCivil()}',
        '{$this->getEsPagador()}',
        '{$this->getEstado()}', '{$this->getEmail()}');";

        $res =  $this->conexion->query($sql);
        if ($res){
            $this->setIdContacto($this->conexion->insert_id);
        }
        return $res;
    }
    public function insertar(){
        $sql ="INSERT INTO padre_apoderado
            (id_contacto,id_usuario,id_rol,id_insti,nombres,apellidos,direccion, departamento_id,provincia_id,
             distrito_id,telefono_1,telefono_2,tipo_doc,numero_doc,genero,fecha_nacimiento,nacionalidad,
             estado_civil,es_pagador,estado,email_concto)
VALUES (null,
        '{$this->getIdUsuario()}',
        '{$this->getIdRol()}',
        '{$this->getIdInsti()}',
        '{$this->getNombres()}',
        '{$this->getApellidos()}',
        '{$this->getDireccion()}',
        '{$this->getDepartamentoId()}',
        '{$this->getProvinciaId()}',
        '{$this->getDistritoId()}',
        '{$this->getTelefono1()}',
        '{$this->getTelefono2()}',
        '{$this->getTipoDoc()}',
        '{$this->getNumeroDoc()}',
        '{$this->getgenero()}',
        '{$this->getFechaNacimiento()}',
        '{$this->getNacionalidad()}',
        '{$this->getEstadoCivil()}',
        '{$this->getEsPagador()}',
        '{$this->getEstado()}','{$this->getEmail()}');";
        $resp =  $this->conexion->query($sql);
        if ($resp){
            $this->setIdContacto($this->conexion->insert_id);
        }
        return $resp;
    }
    public function update(){
        $sql ="UPDATE padre_apoderado
SET 
  id_rol = '{$this->getIdRol()}',
  id_insti = '{$this->getIdInsti()}',
  nombres = '{$this->getNombres()}',
  apellidos = '{$this->getApellidos()}',
  direccion = '{$this->getDireccion()}',
  departamento_id = '{$this->getDepartamentoId()}',
  provincia_id = '{$this->getProvinciaId()}',
  distrito_id = '{$this->getDistritoId()}',
  telefono_1 = '{$this->getTelefono1()}',
  telefono_2 = '{$this->getTelefono2()}',
  tipo_doc = '{$this->getTipoDoc()}',
  numero_doc = '{$this->getNumeroDoc()}',
  genero = '{$this->getgenero()}',
  fecha_nacimiento = '{$this->getFechaNacimiento()}',
  nacionalidad = '{$this->getNacionalidad()}',
  estado_civil = '{$this->getEstadoCivil()}',
  es_pagador = '{$this->getEsPagador()}',
  estado = '{$this->getEstado()}',
  email_concto = '{$this->getEmail()}'
WHERE id_contacto = '{$this->getIdContacto()}';";
        //echo $sql;
        return $this->conexion->query($sql);
    }

    public function exeSql($sql){
        return $this->conexion->query($sql);
    }


}
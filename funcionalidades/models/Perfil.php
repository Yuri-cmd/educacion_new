<?php


class Perfil
{
    private $perfil_id;
    private $id_usuario;
    private $id_rol;
    private $genero;
    private $primer_nombre;
    private $segundo_nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $doc_id;
    private $doc_numero;
    private $fecha_nacimiento;
    private $fecha_registro;
    private $direccion;
    private $telefono_pricipal;
    private $ciudad_id;
    private $foto_perfil;

    /**
     * Perfil constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getPerfilId()
    {
        return $this->perfil_id;
    }

    /**
     * @param mixed $perfil_id
     */
    public function setPerfilId($perfil_id)
    {
        $this->perfil_id = $perfil_id;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->id_rol;
    }

    /**
     * @param mixed $id_rol
     */
    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return mixed
     */
    public function getPrimerNombre()
    {
        return $this->primer_nombre;
    }

    /**
     * @param mixed $primer_nombre
     */
    public function setPrimerNombre($primer_nombre)
    {
        $this->primer_nombre = $primer_nombre;
    }

    /**
     * @return mixed
     */
    public function getSegundoNombre()
    {
        return $this->segundo_nombre;
    }

    /**
     * @param mixed $segundo_nombre
     */
    public function setSegundoNombre($segundo_nombre)
    {
        $this->segundo_nombre = $segundo_nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidoPaterno()
    {
        return $this->apellido_paterno;
    }

    /**
     * @param mixed $apellido_paterno
     */
    public function setApellidoPaterno($apellido_paterno)
    {
        $this->apellido_paterno = $apellido_paterno;
    }

    /**
     * @return mixed
     */
    public function getApellidoMaterno()
    {
        return $this->apellido_materno;
    }

    /**
     * @param mixed $apellido_materno
     */
    public function setApellidoMaterno($apellido_materno)
    {
        $this->apellido_materno = $apellido_materno;
    }

    /**
     * @return mixed
     */
    public function getDocId()
    {
        return $this->doc_id;
    }

    /**
     * @param mixed $doc_id
     */
    public function setDocId($doc_id)
    {
        $this->doc_id = $doc_id;
    }

    /**
     * @return mixed
     */
    public function getDocNumero()
    {
        return $this->doc_numero;
    }

    /**
     * @param mixed $doc_numero
     */
    public function setDocNumero($doc_numero)
    {
        $this->doc_numero = $doc_numero;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    /**
     * @param mixed $fecha_registro
     */
    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getTelefonoPricipal()
    {
        return $this->telefono_pricipal;
    }

    /**
     * @param mixed $telefono_pricipal
     */
    public function setTelefonoPricipal($telefono_pricipal)
    {
        $this->telefono_pricipal = $telefono_pricipal;
    }

    /**
     * @return mixed
     */
    public function getCiudadId()
    {
        return $this->ciudad_id;
    }

    /**
     * @param mixed $ciudad_id
     */
    public function setCiudadId($ciudad_id)
    {
        $this->ciudad_id = $ciudad_id;
    }

    /**
     * @return mixed
     */
    public function getFotoPerfil()
    {
        return $this->foto_perfil;
    }

    /**
     * @param mixed $foto_perfil
     */
    public function setFotoPerfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;
    }


}
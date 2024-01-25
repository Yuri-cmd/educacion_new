<?php


class PadreApoderado
{
    private $id_contacto;
    private $id_usuario;
    private $id_rol;
    private $id_insti;
    private $nombres;
    private $apellidos;
    private $direccion;
    private $departamento_id;
    private $provincia_id;
    private $distrito_id;
    private $telefono_1;
    private $telefono_2;
    private $tipo_doc;
    private $numero_doc;
    private $genero;
    private $fecha_nacimiento;
    private $nacionalidad;
    private $estado_civil;
    private $es_pagador;
    private $email;
    private $estado;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEsPagador()
    {
        return $this->es_pagador;
    }

    /**
     * @param mixed $es_pagador
     */
    public function setEsPagador($es_pagador)
    {
        $this->es_pagador = $es_pagador;
    }

    /**
     * PadreApoderado constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdContacto()
    {
        return $this->id_contacto;
    }

    /**
     * @param mixed $id_contacto
     */
    public function setIdContacto($id_contacto)
    {
        $this->id_contacto = $id_contacto;
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
    public function getIdInsti()
    {
        return $this->id_insti;
    }

    /**
     * @param mixed $id_insti
     */
    public function setIdInsti($id_insti)
    {
        $this->id_insti = $id_insti;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
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
    public function getDepartamentoId()
    {
        return $this->departamento_id;
    }

    /**
     * @param mixed $departamento_id
     */
    public function setDepartamentoId($departamento_id)
    {
        $this->departamento_id = $departamento_id;
    }

    /**
     * @return mixed
     */
    public function getProvinciaId()
    {
        return $this->provincia_id;
    }

    /**
     * @param mixed $provincia_id
     */
    public function setProvinciaId($provincia_id)
    {
        $this->provincia_id = $provincia_id;
    }

    /**
     * @return mixed
     */
    public function getDistritoId()
    {
        return $this->distrito_id;
    }

    /**
     * @param mixed $distrito_id
     */
    public function setDistritoId($distrito_id)
    {
        $this->distrito_id = $distrito_id;
    }

    /**
     * @return mixed
     */
    public function getTelefono1()
    {
        return $this->telefono_1;
    }

    /**
     * @param mixed $telefono_1
     */
    public function setTelefono1($telefono_1)
    {
        $this->telefono_1 = $telefono_1;
    }

    /**
     * @return mixed
     */
    public function getTelefono2()
    {
        return $this->telefono_2;
    }

    /**
     * @param mixed $telefono_2
     */
    public function setTelefono2($telefono_2)
    {
        $this->telefono_2 = $telefono_2;
    }

    /**
     * @return mixed
     */
    public function getTipoDoc()
    {
        return $this->tipo_doc;
    }

    /**
     * @param mixed $tipo_doc
     */
    public function setTipoDoc($tipo_doc)
    {
        $this->tipo_doc = $tipo_doc;
    }

    /**
     * @return mixed
     */
    public function getNumeroDoc()
    {
        return $this->numero_doc;
    }

    /**
     * @param mixed $numero_doc
     */
    public function setNumeroDoc($numero_doc)
    {
        $this->numero_doc = $numero_doc;
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
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * @param mixed $nacionalidad
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    /**
     * @return mixed
     */
    public function getEstadoCivil()
    {
        return $this->estado_civil;
    }

    /**
     * @param mixed $estado_civil
     */
    public function setEstadoCivil($estado_civil)
    {
        $this->estado_civil = $estado_civil;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }



}
<?php


class Usuario
{
    private $usuario_id;
    private $insti_id;
    private $usuario;
    private $clave;
    private $email;
    private $fecha_creacion;
    private $id_rol;
    private $estado;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return mixed
     */
    public function getInstiId()
    {
        return $this->insti_id;
    }

    /**
     * @param mixed $insti_id
     */
    public function setInstiId($insti_id)
    {
        $this->insti_id = $insti_id;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

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
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
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
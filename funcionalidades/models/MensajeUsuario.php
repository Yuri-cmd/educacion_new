<?php


class MensajeUsuario
{
    private $mensaje_id;
    private $id_usuario;
    private $mensaje;
    private $remitente;
    private $tipo;
    private $estado;

    /**
     * @return mixed
     */
    public function getMensajeId()
    {
        return $this->mensaje_id;
    }

    /**
     * @param mixed $mensaje_id
     */
    public function setMensajeId($mensaje_id)
    {
        $this->mensaje_id = $mensaje_id;
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
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * @return mixed
     */
    public function getRemitente()
    {
        return $this->remitente;
    }

    /**
     * @param mixed $remitente
     */
    public function setRemitente($remitente)
    {
        $this->remitente = $remitente;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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
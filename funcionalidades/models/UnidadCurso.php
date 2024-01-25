<?php


class UnidadCurso
{
    private $unidad_id;
    private $id_curso;
    private $nombre_unidad;
    private $fecha_creacion;
    private $fecha_inicio;
    private $visible;
    private $estado;
    private $fecha_final;

    /**
     * @return mixed
     */
    public function getFechaFinal()
    {
        return $this->fecha_final;
    }

    /**
     * @param mixed $fecha_final
     */
    public function setFechaFinal($fecha_final)
    {
        $this->fecha_final = $fecha_final;
    }

    /**
     * @return mixed
     */
    public function getUnidadId()
    {
        return $this->unidad_id;
    }

    /**
     * @param mixed $unidad_id
     */
    public function setUnidadId($unidad_id)
    {
        $this->unidad_id = $unidad_id;
    }

    /**
     * @return mixed
     */
    public function getIdCurso()
    {
        return $this->id_curso;
    }

    /**
     * @param mixed $id_curso
     */
    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;
    }

    /**
     * @return mixed
     */
    public function getNombreUnidad()
    {
        return $this->nombre_unidad;
    }

    /**
     * @param mixed $nombre_unidad
     */
    public function setNombreUnidad($nombre_unidad)
    {
        $this->nombre_unidad = $nombre_unidad;
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
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param mixed $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
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
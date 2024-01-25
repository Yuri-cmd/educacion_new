<?php


class ClaseCurso
{
    private $clase_id;
    private $id_curso;
    private $id_unidad;
    private $nombre_clase;
    private $descripcion_corta;
    private $descripcion_larga;
    private $fecha_inicio;
    private $hora_inicio;
    private $fecha_termino;
    private $hora_termino;
    private $visible;

    /**
     * @return mixed
     */
    public function getClaseId()
    {
        return $this->clase_id;
    }

    /**
     * @param mixed $clase_id
     */
    public function setClaseId($clase_id)
    {
        $this->clase_id = $clase_id;
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
    public function getIdUnidad()
    {
        return $this->id_unidad;
    }

    /**
     * @param mixed $id_unidad
     */
    public function setIdUnidad($id_unidad)
    {
        $this->id_unidad = $id_unidad;
    }

    /**
     * @return mixed
     */
    public function getNombreClase()
    {
        return $this->nombre_clase;
    }

    /**
     * @param mixed $nombre_clase
     */
    public function setNombreClase($nombre_clase)
    {
        $this->nombre_clase = $nombre_clase;
    }

    /**
     * @return mixed
     */
    public function getDescripcionCorta()
    {
        return $this->descripcion_corta;
    }

    /**
     * @param mixed $descripcion_corta
     */
    public function setDescripcionCorta($descripcion_corta)
    {
        $this->descripcion_corta = $descripcion_corta;
    }

    /**
     * @return mixed
     */
    public function getDescripcionLarga()
    {
        return $this->descripcion_larga;
    }

    /**
     * @param mixed $descripcion_larga
     */
    public function setDescripcionLarga($descripcion_larga)
    {
        $this->descripcion_larga = $descripcion_larga;
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
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * @param mixed $hora_inicio
     */
    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaTermino()
    {
        return $this->fecha_termino;
    }

    /**
     * @param mixed $fecha_termino
     */
    public function setFechaTermino($fecha_termino)
    {
        $this->fecha_termino = $fecha_termino;
    }

    /**
     * @return mixed
     */
    public function getHoraTermino()
    {
        return $this->hora_termino;
    }

    /**
     * @param mixed $hora_termino
     */
    public function setHoraTermino($hora_termino)
    {
        $this->hora_termino = $hora_termino;
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


}
<?php


class ActividadCurso
{
    private $actividad_id;
    private $id_curso;
    private $id_clase_curso;
    private $id_tipo_activada;
    private $fecha_creacion;
    private $nombre_activid;
    private $descripcion_corta;
    private $descripcion_larga;
    private $fecha_inicio;
    private $fecha_cierre;
    private $nota_visible;
    private $nota_actvidad;
    private $respuesta_visible;
    private $ocultar_actividad;
    private $estado;
    private $es_calificado;

    /**
     * @return mixed
     */
    public function getActividadId()
    {
        return $this->actividad_id;
    }

    /**
     * @param mixed $actividad_id
     */
    public function setActividadId($actividad_id)
    {
        $this->actividad_id = $actividad_id;
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
    public function getIdClaseCurso()
    {
        return $this->id_clase_curso;
    }

    /**
     * @param mixed $id_clase_curso
     */
    public function setIdClaseCurso($id_clase_curso)
    {
        $this->id_clase_curso = $id_clase_curso;
    }

    /**
     * @return mixed
     */
    public function getIdTipoActivada()
    {
        return $this->id_tipo_activada;
    }

    /**
     * @param mixed $id_tipo_activada
     */
    public function setIdTipoActivada($id_tipo_activada)
    {
        $this->id_tipo_activada = $id_tipo_activada;
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
    public function getNombreActivid()
    {
        return $this->nombre_activid;
    }

    /**
     * @param mixed $nombre_activid
     */
    public function setNombreActivid($nombre_activid)
    {
        $this->nombre_activid = $nombre_activid;
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
    public function getFechaCierre()
    {
        return $this->fecha_cierre;
    }

    /**
     * @param mixed $fecha_cierre
     */
    public function setFechaCierre($fecha_cierre)
    {
        $this->fecha_cierre = $fecha_cierre;
    }

    /**
     * @return mixed
     */
    public function getNotaVisible()
    {
        return $this->nota_visible;
    }

    /**
     * @param mixed $nota_visible
     */
    public function setNotaVisible($nota_visible)
    {
        $this->nota_visible = $nota_visible;
    }

    /**
     * @return mixed
     */
    public function getNotaActvidad()
    {
        return $this->nota_actvidad;
    }

    /**
     * @param mixed $nota_actvidad
     */
    public function setNotaActvidad($nota_actvidad)
    {
        $this->nota_actvidad = $nota_actvidad;
    }

    /**
     * @return mixed
     */
    public function getRespuestaVisible()
    {
        return $this->respuesta_visible;
    }

    /**
     * @param mixed $respuesta_visible
     */
    public function setRespuestaVisible($respuesta_visible)
    {
        $this->respuesta_visible = $respuesta_visible;
    }

    /**
     * @return mixed
     */
    public function getOcultarActividad()
    {
        return $this->ocultar_actividad;
    }

    /**
     * @param mixed $ocultar_actividad
     */
    public function setOcultarActividad($ocultar_actividad)
    {
        $this->ocultar_actividad = $ocultar_actividad;
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

    /**
     * @return mixed
     */
    public function getEsCalificado()
    {
        return $this->es_calificado;
    }

    /**
     * @param mixed $es_calificado
     */
    public function setEsCalificado($es_calificado)
    {
        $this->es_calificado = $es_calificado;
    }


}
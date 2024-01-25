<?php


class MatriculaPadres
{
    private $matri_padre_id;
    private $termino;
    private $datos_padres;
    private $datos_alumnos;
    private $periodo;
    private $fecha_registro;

    /**
     * @return mixed
     */
    public function getMatriPadreId()
    {
        return $this->matri_padre_id;
    }

    /**
     * @param mixed $matri_padre_id
     */
    public function setMatriPadreId($matri_padre_id)
    {
        $this->matri_padre_id = $matri_padre_id;
    }

    /**
     * @return mixed
     */
    public function getTermino()
    {
        return $this->termino;
    }

    /**
     * @param mixed $termino
     */
    public function setTermino($termino)
    {
        $this->termino = $termino;
    }

    /**
     * @return mixed
     */
    public function getDatosPadres()
    {
        return $this->datos_padres;
    }

    /**
     * @param mixed $datos_padres
     */
    public function setDatosPadres($datos_padres)
    {
        $this->datos_padres = $datos_padres;
    }

    /**
     * @return mixed
     */
    public function getDatosAlumnos()
    {
        return $this->datos_alumnos;
    }

    /**
     * @param mixed $datos_alumnos
     */
    public function setDatosAlumnos($datos_alumnos)
    {
        $this->datos_alumnos = $datos_alumnos;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
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



}
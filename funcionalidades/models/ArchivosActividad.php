<?php


class ArchivosActividad
{
    private $archiv_actividad_id;
    private $id_actividad;
    private $origen;
    private $archivo;
    private $nombre_archivo;
    private $tipo_archivo;
    private $estudiante;

    /**
     * @return mixed
     */
    public function getArchivActividadId()
    {
        return $this->archiv_actividad_id;
    }

    /**
     * @param mixed $archiv_actividad_id
     */
    public function setArchivActividadId($archiv_actividad_id)
    {
        $this->archiv_actividad_id = $archiv_actividad_id;
    }

    /**
     * @return mixed
     */
    public function getIdActividad()
    {
        return $this->id_actividad;
    }

    /**
     * @param mixed $id_actividad
     */
    public function setIdActividad($id_actividad)
    {
        $this->id_actividad = $id_actividad;
    }

    /**
     * @return mixed
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * @param mixed $origen
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }

    /**
     * @return mixed
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * @param mixed $archivo
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    }

    /**
     * @return mixed
     */
    public function getNombreArchivo()
    {
        return $this->nombre_archivo;
    }

    /**
     * @param mixed $nombre_archivo
     */
    public function setNombreArchivo($nombre_archivo)
    {
        $this->nombre_archivo = $nombre_archivo;
    }

    /**
     * @return mixed
     */
    public function getTipoArchivo()
    {
        return $this->tipo_archivo;
    }

    /**
     * @param mixed $tipo_archivo
     */
    public function setTipoArchivo($tipo_archivo)
    {
        $this->tipo_archivo = $tipo_archivo;
    }

    /**
     * @return mixed
     */
    public function getEstudiante()
    {
        return $this->estudiante;
    }

    /**
     * @param mixed $estudiante
     */
    public function setEstudiante($estudiante)
    {
        $this->estudiante = $estudiante;
    }


}
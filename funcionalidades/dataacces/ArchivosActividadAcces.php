<?php


class ArchivosActividadAcces extends ArchivosActividad
{
    private $conexion;

    private $extra;

    public function __construct()
    {
        $this->conexion = (new Conexion())->getConexion();
    }
    public function exeSql($sql){
        return $this->conexion->query($sql);
    }

    public function exeSqlGetId($sql){
        $resp = $this->conexion->query($sql);
        if ($resp){
            $this->extra = $this->conexion->insert_id;
        }
        return $resp;
    }
    public function actualizar(){
        $sql="UPDATE archivos_actividad
SET 
  archivo = '{$this->getArchivo()}',
  nombre_archivo = '{$this->getNombreArchivo()}',
  tipo_archivo = '{$this->getTipoArchivo()}'
WHERE archiv_actividad_id = '{$this->getArchivActividadId()}';";
        return $this->conexion->query($sql);
    }

    public function verifica(){
        $sql = "SELECT * FROM archivos_actividad WHERE id_actividad = '{$this->getIdActividad()}' AND estudiante='{$this->getEstudiante()}'";
        return $this->conexion->query($sql);
    }

    public function insertar(){
        $sql ="INSERT INTO archivos_actividad
            (archiv_actividad_id,
             id_actividad,
             origen,
             archivo,
             nombre_archivo,
             tipo_archivo,
             estudiante)
VALUES (null,
        '{$this->getIdActividad()}',
        '{$this->getOrigen()}',
        '{$this->getArchivo()}',
        '{$this->getNombreArchivo()}',
        '{$this->getTipoArchivo()}',
        {$this->getEstudiante()});";

        return $this->conexion->query($sql);
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }


}
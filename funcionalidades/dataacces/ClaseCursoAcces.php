<?php


class ClaseCursoAcces extends ClaseCurso
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

    public function insertar(){

      $sql ="INSERT INTO clase_cursos
            (clase_id,
             id_curso,
             id_unidad,
             nombre_clase,
             descripcion_corta,
             descripcion_larga,
             fecha_inicio,
             hora_inicio,
             fecha_termino,
             hora_termino,
             visible)
VALUES (null,
        '{$this->getIdCurso()}',
        '{$this->getIdUnidad()}',?,?,
        '',
        '{$this->getFechaInicio()}',
        '',
        '{$this->getFechaTermino()}',
        '',
        '{$this->getVisible()}');";
        $stmt = $this->conexion->prepare($sql);
        $nombre = $this->getNombreClase() ;
        $descripcion =$this->getDescripcionCorta();
        $stmt->bind_param("ss", $nombre, $descripcion);
        $resul = $stmt->execute();
        if ($resul){
            $this->setClaseId($stmt->insert_id);
        }
        //echo $stmt->error;

        return $resul;
    }

}
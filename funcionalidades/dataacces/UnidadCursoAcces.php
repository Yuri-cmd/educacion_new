<?php


class UnidadCursoAcces extends UnidadCurso
{

    private $conexion;

    private $extra;

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

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
        $sql = "INSERT INTO unidad_curso
            (unidad_id,
             id_docente_curso,
             nombre_unidad,
             fecha_creacion,
             fecha_inicio,
             fecha_final,
             visible,
             estado)
VALUES (null,
        '{$this->getIdCurso()}',
        '{$this->getNombreUnidad()}',
        '{$this->getFechaInicio()}',
        '{$this->getFechaInicio()}',
        '{$this->getFechaFinal()}',
        '1',
        '1');";
        //echo $sql;
        $resp = $this->conexion->query($sql);
        if ($resp){
            $this->setUnidadId($this->conexion->insert_id);
        }
        return $resp;
    }


}
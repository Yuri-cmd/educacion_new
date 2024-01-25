<?php


class ActividadCursoAccses extends ActividadCurso
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

    /**
     * @return mysqli
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    public function exeSqlGetId($sql){
        $resp = $this->conexion->query($sql);
        if ($resp){
            $this->extra = $this->conexion->insert_id;
        }
        return $resp;
    }
    public function insertar(){
        $sql = "INSERT INTO actividad_curso
            (actividad_id,id_curso,id_clase_curso,id_tipo_activada,
             nombre_activid,descripcion_corta,descripcion_larga,fecha_inicio,
             fecha_cierre,nota_visible,nota_actvidad,respuesta_visible,
             ocultar_actividad,estado,es_calificado) 
VALUES (NULL,
        '{$this->getIdCurso()}',
        '{$this->getIdClaseCurso()}',
        '{$this->getIdTipoActivada()}',?,?,
        '',
        '{$this->getFechaInicio()}',
        '{$this->getFechaCierre()}',
        '{$this->getNotaVisible()}',
        '',
        '{$this->getRespuestaVisible()}',
        '{$this->getOcultarActividad()}',
        '{$this->getEstado()}',
        '{$this->getEsCalificado()}');";

        //echo $sql;


        $stmt = $this->conexion->prepare($sql);
        $nombre = $this->getNombreActivid() ;
        $descripcion =$this->getDescripcionCorta();
        $stmt->bind_param("ss", $nombre, $descripcion);
        $resul = $stmt->execute();
        if ($resul){
            $this->setActividadId($stmt->insert_id);
        }
        //echo $stmt->error;

        return $resul;
    }
    public function actualizar_descripcion_larga(){
        $sql =" UPDATE actividad_curso
            SET 
              descripcion_larga = ? 
            WHERE actividad_id = '{$this->getActividadId()}';";
        $stmt = $this->conexion->prepare($sql);

        $descripcion =$this->getDescripcionLarga();
        $stmt->bind_param("s",   $descripcion);
        $resul = $stmt->execute();

        return $resul;
    }


}
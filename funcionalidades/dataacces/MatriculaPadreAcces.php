<?php


class MatriculaPadreAcces extends MatriculaPadres
{
    private $conexion;


    public function __construct()
    {
        $this->conexion = (new Conexion())->getConexion();
    }

    public function insertar(){
        $sql ="";
        return $this->conexion->query($sql);
    }
    public function updateDatoAlumno(){
        $sql ="UPDATE matricula_padres
SET 
  datos_alumnos = '{$this->getDatosAlumnos()}'
WHERE matri_padre_id = '{$this->getMatriPadreId()}';";
        //echo $sql;
        return $this->conexion->query($sql);
    }

    public function updateTermino(){
        $sql ="UPDATE matricula_padres
SET 
  termino = '{$this->getTermino()}'
WHERE matri_padre_id = '{$this->getMatriPadreId()}';";
        //echo $sql;
        return $this->conexion->query($sql);
    }

    public function updateDatoPaadre(){
        $sql ="UPDATE matricula_padres
SET 
  datos_padres = '{$this->getDatosPadres()}'
WHERE matri_padre_id = '{$this->getMatriPadreId()}';";
        //echo $sql;
        return $this->conexion->query($sql);
    }
    public function getMatriculaData(){
        $sql ="SELECT 
                  ma_pa.* 
                FROM
                  grupo_matricula_padres AS gru_matr 
                  INNER JOIN matricula_padres AS ma_pa 
                    ON gru_matr.id_matricula = ma_pa.matri_padre_id 
                    WHERE ma_pa.periodo = '".date('Y')."' AND gru_matr.id_padre_apoderado = '" . $_SESSION['usuario_padre_apoderado'] ."'";
        // echo $sql;
        return $this->conexion->query($sql);
    }
    public function exeSql($sql){
        return $this->conexion->query($sql);
    }

}
<?php

use http\Exception\BadConversionException;

session_start();

require_once "funcionalidades/models/MatriculaPadres.php";
require_once "funcionalidades/models/PadreApoderado.php";
require_once "funcionalidades/models/Perfil.php";
require_once "funcionalidades/dataacces/MatriculaPadreAcces.php";
require_once "funcionalidades/dataacces/PadreApoderadoAcces.php";
require_once "funcionalidades/dataacces/PerfilAcces.php";
require_once "funcionalidades/config/Conexion.php";


$matriculaPadreAcces=new MatriculaPadreAcces();
$padreApoderadoAcces= new PadreApoderadoAcces();
$perfilAcces= new PerfilAcces();
$views = new View();

$conexion = (new Conexion())->getConexion();

$tipo = $_POST['tipo'];
$respuesta= ["res"=>false];
$flag = true;
switch ($tipo){
    case 'paso_veri':
        $listaHijos = json_decode($_POST['hijos'],true);
        $respuesta['res']=true;
        $matricula = Tools::decrypt($_POST['matr']);

        foreach ($listaHijos as $hijo){
            $perfilAcces->setPerfilId($hijo['perfil_id']);
            $perfilAcces->setIdUsuario('null');
            $perfilAcces->setIdRol('2');
            $perfilAcces->setGenero($hijo['genero']);
            $perfilAcces->setFechaNacimiento($hijo['fecha_nacimiento']);
            $perfilAcces->setDireccion($hijo['direccion']);
            $perfilAcces->setSegundoNombre($hijo['segundo_nombre']);
            $perfilAcces->setPrimerNombre($hijo['primer_nombre']);
            $perfilAcces->setApellidoMaterno($hijo['apellido_paterno']);
            $perfilAcces->setApellidoPaterno($hijo['apellido_materno']);
            $perfilAcces->setCiudadId('');
            $perfilAcces->setDocId($hijo['doc_id']);
            $perfilAcces->setDocNumero($hijo['doc_numero']);
            $perfilAcces->setTelefonoPricipal($hijo['telefono_pricipal']);
            if ($hijo['perfil_id']>0){
                if(!$perfilAcces->actualizar()){
                    $respuesta['res']=false;
                }

            }else{
                if($perfilAcces->insertar()){

                    $sql ="INSERT INTO estudiantes
                        (estu_id, insti_id, perfil_id, usuario_id, estado) 
                        VALUES (NULL,
                    '{$_SESSION['institucion']}',
                    '{$perfilAcces->getPerfilId()}',
                    NULL,
                    '0');";
                    if ($perfilAcces->exeSqlGetId($sql)){
                        $estudiante_id = $perfilAcces->getExtra();

                        $sql="INSERT INTO estudiante_contacto
                                        (id_estuddiante,
                                         id_contacto)
                            VALUES ('$estudiante_id',
                                    '{$_SESSION['usuario_padre_apoderado']}');";

                        if (!$perfilAcces->exeSqlGetId($sql)){

                            $respuesta['res']=false;
                        }else{
                            $sql ="INSERT INTO hijos_matriculados
                                                (hijos_matri_id,
                                                 id_matricula_padres,
                                                 id_alumno)
                                    VALUES (null,
                                            '$matricula',
                                            '$estudiante_id');";
                            $perfilAcces->exeSqlGetId($sql);
                        }
                    }else{

                        $respuesta['res']=false;
                    }

                }else{
                    $respuesta['res']=false;
                }
            }


        }
        if ($respuesta['res']){
            $matriculaPadreAcces->setMatriPadreId(Tools::decrypt($_POST['matr']));
            $matriculaPadreAcces->setDatosAlumnos('1');
            $matriculaPadreAcces->updateDatoAlumno();

            $respuesta['dom'] =$views->render("funcionalidades/fragment/partes/estado_espera.php",
                []);
        }
        break;
    case 'vrf':
        $matriculaPadreAcces->setMatriPadreId(Tools::decrypt($_POST['matr']));
        $matriculaPadreAcces->setTermino('1');
        if ($matriculaPadreAcces->updateTermino()){
            $respuesta['res']=true;
            $listaDepa = $padreApoderadoAcces->exeSql("SELECT * FROM dir_departamento ");
            $respuesta['dom'] =$views->render("funcionalidades/fragment/partes/form_padres_matricula.php",
                ['listas'=>$listaDepa]);
        }
        break;
    case 'datre':
        $data_R = json_decode($_POST['dtaos'],true);
        $respuesta['res']=true;
        //var_dump($data_R);
        foreach ($data_R as $d){
            //var_dump($d);
            $padreApoderadoAcces->setIdContacto($d['maprei']);
            $padreApoderadoAcces->setEsPagador($d['pagador']);
            $padreApoderadoAcces->setApellidos($d['apellido']);
            $padreApoderadoAcces->setNombres($d['nombre']);
            $padreApoderadoAcces->setDireccion($d['direccion']);
            $padreApoderadoAcces->setEstado('1');
            $padreApoderadoAcces->setTipoDoc($d['tipo_doc']);
            $padreApoderadoAcces->setDepartamentoId($d['departament']);
            $padreApoderadoAcces->setDistritoId($d['distrito']);
            $padreApoderadoAcces->setEstadoCivil($d['estado_ci']);
            $padreApoderadoAcces->setFechaNacimiento($d['fecha_na']);
            $padreApoderadoAcces->setGenero($d['genero']);
            $padreApoderadoAcces->setIdInsti($_SESSION['institucion']);
            $padreApoderadoAcces->setIdRol($_SESSION['usuario_rol']);
            $padreApoderadoAcces->setIdUsuario($_SESSION['usuario']);
            $padreApoderadoAcces->setNacionalidad($d['nacio']);
            $padreApoderadoAcces->setNumeroDoc($d['num_doc']);
            $padreApoderadoAcces->setProvinciaId($d['provincia']);
            $padreApoderadoAcces->setTelefono1($d['telefono1']);
            $padreApoderadoAcces->setTelefono2($d['telefono2']);
            $padreApoderadoAcces->setEmail($d['email']);
            if (strlen($d['maprei'])>0){

                if(!$padreApoderadoAcces->update()){
                    $respuesta['res']=false;
                }
            }else{
               // echo "update";
                if (!$padreApoderadoAcces->insertar_sinusaurio()){
                    $respuesta['res']=false;
                }else{
                    $id_matri = Tools::decrypt($_POST['matr']);
                    $sql ="INSERT INTO grupo_matricula_padres
                                    (grupo_id,
                                     id_matricula,
                                     id_padre_apoderado)
                        VALUES (NULL,
                                '$id_matri',
                                '{$padreApoderadoAcces->getIdContacto()}');";
                    $padreApoderadoAcces->exeSql($sql);
                }
            }
            if ($respuesta['res']){
                $matriculaPadreAcces->setMatriPadreId(Tools::decrypt($_POST['matr']));
                $matriculaPadreAcces->setDatosPadres('1');
                $matriculaPadreAcces->updateDatoPaadre();
                $respuesta['dom'] = $views->render("funcionalidades/fragment/partes/form_alumnos_matricula.php",[]);

            }

        }
        break;
    case 'datre_2':

        $alumno = json_decode($_POST['alumno'],true);
        $data_R = json_decode($_POST['dtaos'],true);

        $perfilAcces->setPerfilId($alumno['perfil_id']);
        $perfilAcces->setIdUsuario($alumno['perfil_id']);
        $perfilAcces->setIdRol('2');
        $perfilAcces->setGenero($alumno['genero']);
        $perfilAcces->setFechaNacimiento($alumno['fecha_n']);
        $perfilAcces->setDireccion($alumno['direccion']);
        $perfilAcces->setSegundoNombre($alumno['segundo_nombre']);
        $perfilAcces->setPrimerNombre($alumno['primer_nombre']);
        $perfilAcces->setApellidoMaterno($alumno['apellido_paterno']);
        $perfilAcces->setApellidoPaterno($alumno['apellido_materno']);
        $perfilAcces->setCiudadId('1');
        $perfilAcces->setDocId('1');
        $perfilAcces->setDocNumero($alumno['doc']);
        $perfilAcces->setTelefonoPricipal($alumno['telefono']);

        if ($alumno['perfil_id']==0){
            $sql="INSERT INTO usuarios
                                (usuario_id,
                                 insti_id,
                                 usuario,
                                 clave,
                                 email,
                                 id_rol,
                                 estado)
                    VALUES (NULL,
                            '{$_SESSION['institucion']}',
                            '{$alumno['doc']}',
                            '{$alumno['doc']}',
                            '{$alumno['email']}',
                            '2',
                            '1');";
            $perfilAcces->exeSqlGetId($sql);
            $perfilAcces->setIdUsuario($perfilAcces->getExtra());

            $estudiante_id_t =1;
            if ($perfilAcces->insertar()){
                $sql ="INSERT INTO estudiantes
                                    (estu_id,
                                     insti_id,
                                     perfil_id,
                                     usuario_id,
                                     estado)
                        VALUES (NULL,
                                '{$_SESSION['institucion']}',
                                '{$perfilAcces->getPerfilId()}',
                                '{$perfilAcces->getExtra()}',
                                '1');";
                $perfilAcces->exeSqlGetId($sql);
                $estudiante_id_t = $perfilAcces->getExtra();
            }

            $respuesta['res']=true;
            //var_dump($data_R);
            $contacto_id="null";
            $verificacion_tem = true;
            foreach ($data_R as $d){
                //var_dump($d);
                $padreApoderadoAcces->setIdContacto($d['maprei']);
                $padreApoderadoAcces->setEsPagador($d['pagador']);
                $padreApoderadoAcces->setApellidos($d['apellido']);
                $padreApoderadoAcces->setNombres($d['nombre']);
                $padreApoderadoAcces->setDireccion($d['direccion']);
                $padreApoderadoAcces->setEstado('1');
                $padreApoderadoAcces->setTipoDoc($d['tipo_doc']);
                $padreApoderadoAcces->setDepartamentoId($d['departament']);
                $padreApoderadoAcces->setDistritoId($d['distrito']);
                $padreApoderadoAcces->setEstadoCivil($d['estado_ci']);
                $padreApoderadoAcces->setFechaNacimiento($d['fecha_na']);
                $padreApoderadoAcces->setGenero($d['genero']);
                $padreApoderadoAcces->setIdInsti($_SESSION['institucion']);
                $padreApoderadoAcces->setIdRol($_SESSION['usuario_rol']);
                $padreApoderadoAcces->setIdUsuario($_SESSION['usuario']);
                $padreApoderadoAcces->setNacionalidad($d['nacio']);
                $padreApoderadoAcces->setNumeroDoc($d['num_doc']);
                $padreApoderadoAcces->setProvinciaId($d['provincia']);
                $padreApoderadoAcces->setTelefono1($d['telefono1']);
                $padreApoderadoAcces->setTelefono2($d['telefono2']);
                $padreApoderadoAcces->setEmail($d['email']);
                if (strlen($d['maprei'])>0){

                    if(!$padreApoderadoAcces->update()){
                        $respuesta['res']=false;
                    }
                }else{
                    // echo "update";
                    if (!$padreApoderadoAcces->insertar_sinusaurio()){

                        $respuesta['res']=false;
                    }else{
                        if ($verificacion_tem){
                            $contacto_id=$padreApoderadoAcces->getIdContacto();
                        }
                        $verificacion_tem=false;
                        $sql ="INSERT INTO estudiante_contacto
                                            (id_estuddiante,
                                             id_contacto)
                                VALUES ('$estudiante_id_t',
                                        '{$padreApoderadoAcces->getIdContacto()}');";
                        $padreApoderadoAcces->exeSql($sql);
                    }
                }
            }

            $sql ="INSERT INTO matriculas
            (matricula_id,
             id_apertura_mtr,
             id_insti,
             id_contacto,
             id_estudiante,
             fehca_matricula,
             estado,
             nivel_educativo,
             grado,
             seccion)
VALUES (NULL,
        '{$alumno['matricula_apr']}',
        '{$_SESSION['institucion']}',
        $contacto_id,
        '$estudiante_id_t',
        now(),
        '1',
        '{$alumno['nivel_edu']}',
        '{$alumno['grado']}',
        '{$alumno['seccion']}');";
            //echo $sql;
            $padreApoderadoAcces->exeSql($sql);

        }else{

        }


        break;
    case 'get_datos_doc':
        $documento = $_POST['doc'];
        $tipo = strlen($documento) > 8 ? 'ruc' :  'dni';    
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InN5c3RlbWNyYWZ0LnBlQGdtYWlsLmNvbSJ9.yuNS5hRaC0hCwymX_PjXRoSZJWLNNBeOdlLRSUGlHGA";

        $url = "https://dniruc.apisperu.com/api/v1/{$tipo}/{$documento}?token={$token}";

        try {
            $response = file_get_contents($url);
            if ($response === false) {
                throw new Exception("Hubo un error al obtener la información.");
            }
            $flag = false;
            echo $response;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        break;

    case 'sn':
        $doc = $_POST['doc'];
        $sql = "select * from documentos_empresas where id_empresa='12' and id_tido='$doc' and sucursal='1'";
        $resp = $conexion->query($sql);
        
        $result = ["serie" => "", "numero" => "",];
        if ($row = $resp->fetch_assoc()) {
            $respuesta['serie'] = $row["serie"];
            $respuesta["numero"] = $row["numero"];
        }

        break;
}

if($flag){
    echo  json_encode($respuesta);
}
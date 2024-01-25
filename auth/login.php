<?php

session_start();

require_once "funcionalidades/config/Conexion.php";


$conexion = (new Conexion())->getConexion();

$respuesta = ['res'=>false,"bloq"=>false];
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $user = $_POST['user'];
    $pass = $_POST['clav'];
    $sql ="SELECT *, id_rol AS 'rol_user' FROM usuarios WHERE usuario =  '$user';";


    $resp = $conexion->query($sql);

    if ($row = $resp->fetch_assoc()){


       // var_dump($row);
        /*var_dump($row['clave']);
        var_dump($pass);*/
        if ($row['clave']==$pass){
           // echo '1111111';
            if (true){
                if ($row['estado']=='5'){
                    $respuesta['bloq']=true;
                }

                $_SESSION['usuario'] = $row['usuario_id'];
                $_SESSION['institucion'] = $row['insti_id'];
                $_SESSION['usuario_rol'] = $row['id_rol'];
                $_SESSION['psicologof'] = $row['psicologo'];

                $sql = "SELECT * FROM institucion_educativa WHERE insti_id = '{$row['insti_id']}'";
                $institucion = $conexion->query($sql)->fetch_assoc();

                $_SESSION['institucion_nombre'] = $institucion['insti_razon_social'];
                $_SESSION['institucion_logo'] = $institucion['insti_logo'];




                if ($row['rol_user']==3 || $row['id_rol']==4 || $row['id_rol']==5){
                    $sql = "SELECT * FROM padre_apoderado WHERE id_usuario = '{$row['usuario_id']}'";
                    $perfil = $conexion->query($sql)->fetch_assoc();

                    $_SESSION['usuario_padre_apoderado'] = $perfil['id_contacto'] ;
                    $_SESSION['nombre_completo'] = $perfil['nombres'] ;
                    $_SESSION['apellidos_completos'] = $perfil['apellidos'];
                    $_SESSION['foto_usuario'] = strlen($perfil['foto_perfil'])>0?$perfil['foto_perfil']:'usuario_img.jpg';

                }else{
                    $sql = "SELECT * FROM perfiles WHERE id_usuario = '{$row['usuario_id']}'";
                    $perfil = $conexion->query($sql)->fetch_assoc();

                    $_SESSION['perfil_id'] = $perfil['perfil_id'];
                    $_SESSION['nombre_completo'] = $perfil['primer_nombre'] ." ". $perfil['segundo_nombre'];
                    $_SESSION['apellidos_completos'] = $perfil['apellido_paterno']." ". $perfil['apellido_materno'];
                    $_SESSION['foto_usuario'] = strlen($perfil['foto_perfil'])>0?$perfil['foto_perfil']:'usuario_img.jpg';
                }
                if ($row['rol_user']==6){
                    $sql = "SELECT * FROM docentes WHERE id_usuario = '{$row['usuario_id']}'";
                    $docente = $conexion->query($sql)->fetch_assoc();
                    $_SESSION['docente_id'] = $docente['docente_id'];
                }
                if ($row['rol_user']==2){
                    $sql = "SELECT * FROM estudiantes WHERE usuario_id='{$row['usuario_id']}'";
                    $docente = $conexion->query($sql)->fetch_assoc();
                    $_SESSION['estudiante_id'] = $docente['estu_id'];
                }





                // instiucion o administrador
                if ($row['rol_user']==1){
                    //     $_SESSION['usuario_padre_apoderado'] = $row[''];
                    $respuesta['ruta']="admin";

                    // estudiante
                }elseif ($row['rol_user']==2){
                    $respuesta['ruta']="alumno";

                    // padre, madre o apoderado
                }elseif ($row['rol_user']==3 || $row['id_rol']==4 || $row['id_rol']==5){
                    $respuesta['ruta']="supervisor";

                    // Docente
                }elseif($row['rol_user']==6){
                    $respuesta['ruta']="profesor";

                }
                $_SESSION['ruta_usuario'] = $respuesta['ruta'];
                $ipG = Tools::getIPAddressClient();
                $device = Tools::getInfoDeviceConect();
                $respuesta['res']=true;
                $sql="INSERT INTO historial_usuario set 
                                  id_usuario='{$_SESSION['usuario']}',
                                  ip_user='$ipG',device='$device', tipo='1'";

                $conexion->query($sql);

                if ($row['estado']=='5'){
                    $respuesta['bloq']=true;
                    session_destroy();
                }
            }
        }
    }
    echo json_encode($respuesta);
}else{
    header("Location: ".URL::base());
}

<?php
session_start();
require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();
$lista = [];
switch ($_POST['opcion']) {
    case 'getCursosDocente':

        $sql = " SELECT
           	c.nombre,
            cd.grado,
            cd.nivel,
            cd.seccion,
            cd.curso_id
        FROM
            docentes d
            INNER JOIN `curso_docente` cd ON cd.docente_id = d.docente_id
            INNER JOIN  cursos c on c.curso_id = cd.curso_id
            INNER JOIN matricula_aperturas ma ON ma.matr_id = cd.id_apertura 
            AND ma.anio = 2024 
        WHERE
            d.id_usuario = '{$_POST['idUsuario']}' 
            AND estatus = 1";
        $cursos = $conexion->query($sql);
        foreach ($cursos as $row) {
            $lista[] = $row;
        }
        echo json_encode($lista);
        break;
    case 'getAlumnos':
        $inf = explode(':', $_POST['inf']);
        $sql = " SELECT
        CONCAT_WS(' ', p.primer_nombre, p.segundo_nombre, p.apellido_paterno, p.apellido_materno) as alumno,
        e.estu_id
    FROM
        matriculas m
        INNER JOIN estudiantes e on e.estu_id = m.id_estudiante
        INNER JOIN perfiles p on p.perfil_id = e.perfil_id
    WHERE
        m.nivel_educativo = {$inf[2]} 
        AND m.grado = {$inf[1]}  
        AND m.seccion = {$inf[3]} 
        and m.estado = 1";
        $alumnos = $conexion->query($sql);
        foreach ($alumnos as $row) {
            $lista[] = $row;
        }
        echo json_encode($lista);
        break;
    case 'saveGrupo':
        try {
            $alumnosIds = explode(',', $_POST['alumnosIds']);
            $curso =  explode(':', $_POST['curso'])[0];
            $nombre = $_POST['nameGroup'];
            $docente_id =  $_POST['profesor'];
            $sql = "INSERT INTO mensajeria_grupo
            (nombre,
            curso_id,docente_id)
            VALUES ('$nombre','$curso','$docente_id');";
            $stmt = $conexion->query($sql);
            $grupo_id = $conexion->insert_id;

            foreach ($alumnosIds as $id) :
                $sql = "INSERT INTO mensajeria_grupo_alumno
                (grupo_id,
                alumno_id)
                VALUES ('$grupo_id','$id');";
                $stmt = $conexion->query($sql);
            endforeach;
        } catch (\Throwable $th) {
            echo 'error';
        }
        break;
    case 'getGrupos':
        $docente_id =  $_POST['docente'];
        $sql = "SELECT id, nombre FROM mensajeria_grupo WHERE docente_id = $docente_id";
        $alumnos = $conexion->query($sql);
        foreach ($alumnos as $row) {
            $lista[] = $row;
        }
        echo json_encode($lista);
        break;
    case 'saveRespuesta':

        $sql = "INSERT INTO mensajeria_respuestas
        (id_usuario,
        id_mensaje,respuesta, creado_el)
        VALUES ('{$_POST['idUsuario']}',
        '{$_POST['idmensaje']}',
        ?,
        now());";

        $stmt = $conexion->query($sql);
        $stmt = $conexion->prepare($sql);
        $mensaje = $_POST['respuesta'];
        $stmt->bind_param("s", $mensaje);
        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
        break;
}

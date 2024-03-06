<?php
require_once "funcionalidades/config/Conexion.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$conexion = (new Conexion())->getConexion();
$tipo_usuario = $_POST["tipo_usuario"];
$tipo_planilla = $_POST["tipo_planilla"];
$mes_descarga = $_POST["mes_descarga"];

$agrupado_por_dia = [];

if ($tipo_usuario == 1) {
    $sql = "SELECT
                CONCAT_WS(' ',p.primer_nombre, p.segundo_nombre, p.apellido_paterno, p.apellido_materno) as nombre,
                DATE(fecha) as fecha,
                TIME(fecha) as hora,
                a.fecha as fecha_asistencia,
                m.nivel_educativo
            FROM
                usuarios u
                INNER JOIN estudiantes e ON e.usuario_id = u.usuario_id 
                INNER JOIN matriculas m on m.id_estudiante = e.estu_id
                INNER JOIN asistencia a on a.id_estudiante = e.estu_id
                INNER JOIN perfiles p on p.id_usuario = u.usuario_id
            WHERE
                MONTH(fecha) = $mes_descarga and a.tipo = 1
            ORDER BY fecha ASC";
} else {
    $where = '';
    if ($tipo_planilla) {
        $where = "and d.planilla = $tipo_planilla";
    }
    $sql = "SELECT
    CONCAT_WS(' ',p.primer_nombre, p.segundo_nombre, p.apellido_paterno, p.apellido_materno) as nombre,
                    DATE( fecha ) AS fecha,
                    TIME( fecha ) AS hora,
                    a.fecha AS fecha_asistencia,
                    '' AS nivel_educativo
                FROM
                    usuarios u
                    INNER JOIN docentes d ON d.id_usuario = u.usuario_id
                    INNER JOIN asistencia a ON a.id_estudiante = d.docente_id and a.tipo = 2
                    INNER JOIN perfiles p on p.id_usuario = u.usuario_id
                WHERE
                    MONTH ( a.fecha ) = $mes_descarga  $where
                ORDER BY
                    a.fecha ASC";
}
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $nivel = '';
    $turno = "";
    $i = 0;
    while ($fila = $resultado->fetch_assoc()) {
        $nivel = $fila['nivel_educativo'];
        if ($tipo_usuario == 1) {
            $sqlHorarios = "SELECT * FROM horarios_asistencia WHERE id_nivel = $nivel AND tipo_usuario = $tipo_usuario";
        } else {
            $sqlHorarios = "SELECT * FROM horarios_asistencia WHERE tipo_usuario = $tipo_usuario";
        }
        // Obtener los horarios de asistencia para el nivel y tipo de usuario

        $resultadoHorarios = $conexion->query($sqlHorarios);

        if ($resultadoHorarios && $resultadoHorarios->num_rows > 0) {
            // Procesar la asistencia y los horarios
            foreach ($resultadoHorarios as $h) {
                $row_hora = new DateTime($fila['hora']);
                $h_ingreso = new DateTime($h['ingreso']);
                $h_salida = new DateTime($h['salida']);
                if ($row_hora >= $h_ingreso && $row_hora <= $h_salida) {
                    $turno = $h["turno"];
                }
                if (!isset($agrupado_por_dia[$fila["fecha"]])) {
                    $agrupado_por_dia[$fila["fecha"]] = [];
                }

                $agrupado_por_dia[$fila["fecha"]][] = ['nombre' => $fila['nombre'], 'hora' => $fila["hora"], 'turno' => $turno, 'tipo' => $i % 2 == 0 ? 'entrada' : 'salida'];
                break;
            }
        }
        $i++;
    }
}



// Crear un nuevo libro de Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'nombre');
$sheet->setCellValue('B1', 'Fecha');
$sheet->setCellValue('C1', 'Turno');
$sheet->setCellValue('D1', 'Hora de entrada');
$sheet->setCellValue('E1', 'Hora de salida');


// Obtener los datos de la tabla y agregarlos al libro de Excel
$i = 2; // Empezamos desde la fila 2 porque la fila 1 es para las cabeceras
// print_r($agrupado_por_dia);
foreach ($agrupado_por_dia as $fecha => $asistencias) {
    $entradas = [];
    $salidas = [];

    foreach ($asistencias as $asistencia) {
        // Convertir el objeto stdClass a un array asociativo
        $asistenciaArray = (array)$asistencia;
        // print_r($asistencias);
        if ($asistenciaArray['tipo'] === 'entrada') {
            $entradas[] = $asistenciaArray['hora'];
        } else {
            $salidas[] = $asistenciaArray['hora'];
        }
        $entrada = count($entradas) > 0 ? $entradas[0] : '';
        $salida = count($salidas) > 0 ? end($salidas) : '';

        $sheet->setCellValue('A' . $i, $asistenciaArray["nombre"]);
        $sheet->setCellValue('B' . $i, $fecha);
        $sheet->setCellValue('C' . $i, $asistenciaArray["turno"]);
        $sheet->setCellValue('D' . $i, $entrada);
        $sheet->setCellValue('E' . $i, $salida);

        $i++;
    }
}
// die;

// Crear un objeto para guardar el archivo
$writer = new Xlsx($spreadsheet);
$filename = 'reporte-usuarios.xlsx';
$writer->save($filename);

// Descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
readfile($filename);
exit;

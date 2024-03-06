<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$datos  = json_decode($_GET['data']);
if(!$datos){
    return;
}

// Crear un nuevo libro de Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definir las cabeceras de la tabla en la hoja de Excel
$sheet->setCellValue('A1', 'Fecha');
$sheet->setCellValue('B1', 'Turno');
$sheet->setCellValue('C1', 'Hora de entrada');
$sheet->setCellValue('D1', 'Hora de salida');


// Obtener los datos de la tabla y agregarlos al libro de Excel
$fila = 2; // Empezamos desde la fila 2 porque la fila 1 es para las cabeceras

foreach ($datos as $fecha => $asistencias) {
    $entradas = [];
    $salidas = [];

    foreach ($asistencias as $asistencia) {
        // Convertir el objeto stdClass a un array asociativo
        $asistenciaArray = (array)$asistencia;

        if ($asistenciaArray['tipo'] === 'entrada') {
            $entradas[] = $asistenciaArray['hora'];
        } else {
            $salidas[] = $asistenciaArray['hora'];
        }
    }

    $entrada = count($entradas) > 0 ? $entradas[0] : '';
    $salida = count($salidas) > 0 ? end($salidas) : '';

    $sheet->setCellValue('A' . $fila, $fecha);
    $sheet->setCellValue('B' . $fila, $asistencias[0]->turno); // Acceder a la propiedad del objeto stdClass usando ->
    $sheet->setCellValue('C' . $fila, $entrada);
    $sheet->setCellValue('D' . $fila, $salida);

    $fila++;
}

// Crear un objeto para guardar el archivo
$writer = new Xlsx($spreadsheet);
$filename = 'reporte.xlsx';
$writer->save($filename);

// Descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

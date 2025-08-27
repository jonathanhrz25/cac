<?php

require 'conexion.php';
require '../vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};


$sql="SELECT * from form_clientes2";
$result= mysqli_query($conn,$sql);


$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("formulario");

/* Encabezados */
$hojaActiva->setCellValue('A5', 'Id');
$hojaActiva->setCellValue('B5', 'Indicar si tiene relación con otro cliente');
$hojaActiva->setCellValue('C5', 'Numero de cliente');
$hojaActiva->setCellValue('D5', 'Nombre y puesto o relación con el titular');
$hojaActiva->setCellValue('E5', '1. ¿Sigue en apertura su negocio?');
$hojaActiva->setCellValue('F5', '2. ¿Cuál es el motivo de su inactividad de compra con nosotros?');
$hojaActiva->setCellValue('G5', 'Otro motivo');
$hojaActiva->setCellValue('H5', '3. De acuerdo a la respuesta anterior, colocar la situación presentada con Serva en caso de que aplique.');
$hojaActiva->setCellValue('I5', '4. Notamos que hay otra cuenta dada de alta con nosotros relacionada a usted ¿Le interesaría retomar la relación comercial con Serva con su cuenta o prefiere');
$hojaActiva->setCellValue('J5', '5. ¿Le interesaría retomar la relación comercial con Serva?');

$fila = 6;

/* Extraccion de Datos*/
while($rows=mysqli_fetch_array($result)){
$hojaActiva->setCellValue('A'.$fila, $rows['Id']);
$hojaActiva->setCellValue('B'.$fila, $rows['relacion_otro']);
$hojaActiva->setCellValue('C'.$fila, $rows['num_cliente']);
$hojaActiva->setCellValue('D'.$fila, $rows['nombre']);
$hojaActiva->setCellValue('E'.$fila, $rows['negocio']);
$hojaActiva->setCellValue('F'.$fila, $rows['inactividad']);
$hojaActiva->setCellValue('G'.$fila, $rows['otroTexto']);
$hojaActiva->setCellValue('H'.$fila, $rows['situacion']);
$hojaActiva->setCellValue('I'.$fila, $rows['alta_relacion']);
$hojaActiva->setCellValue('J'.$fila, $rows['relacion_com']);
$fila++;
}



/* Estilos */

// Crear un objeto Spreadsheet
$spreadsheet = new Spreadsheet();

//Titulo y formato de letra con tamaño
$excel->setActiveSheetIndex(0)->setCellValue('C1', 'Reporte Encuestas CAC - Bloque 2');
$excel->getDefaultStyle()->getFont()->setName('Arial');
$excel->getDefaultStyle()->getFont()->setSize(14);

// Obtener el estilo de la celda A1
$hojaActiva = $hojaActiva->getStyle('C1');
// Configurar la propiedad font del estilo
$font = $hojaActiva->getFont();
$font->getColor()->setARGB('FFFFFF');

// Agregar una hoja de trabajo
$hojaActiva = $excel->getActiveSheet();

// Insertar una imagen en la celda A1
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setPath('../img/CAC.png'); // Ruta de la imagen
$drawing->setCoordinates('B1');
$drawing->setWorksheet($hojaActiva);
$drawing->setWidth(90);
$drawing->setHeight(90);

//Ancho de columnas
$hojaActiva->getColumnDimension('A')->setWidth(5);
$hojaActiva->getColumnDimension('B')->setWidth(20);
$hojaActiva->getColumnDimension('C')->setWidth(40);
$hojaActiva->getColumnDimension('D')->setWidth(30);
$hojaActiva->getColumnDimension('E')->setWidth(45);
$hojaActiva->getColumnDimension('F')->setWidth(30);
$hojaActiva->getColumnDimension('G')->setWidth(30);
$hojaActiva->getColumnDimension('H')->setWidth(45);
$hojaActiva->getColumnDimension('I')->setWidth(30);
$hojaActiva->getColumnDimension('J')->setWidth(30);

// Dar formato a la tabla
$tableStyle = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '260EEE']
        ]
    ]/* ,
    'font' => [
        'bold' => true,
        'color' => ['rgb' => '000000']
    ] */,
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'FFFFFF']
    ]
];
$hojaActiva->getStyle('A5:V1000')->applyFromArray($tableStyle);

// Combinar Celdas
$hojaActiva->mergeCells('A1:B4');
$hojaActiva->mergeCells('C1:V4');

// Alinear texto en el medio de la celda
$style = $hojaActiva->getStyle('A1:V100');
$style->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

// Centrar el contenido de la celda
$style = $hojaActiva->getStyle('A5:D100');
$style->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$style->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

$style = $hojaActiva->getStyle('J5:J100');
$style->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$style->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

// Hacer negrita el contenido de la celda A1
$style = $hojaActiva->getStyle('A1:V5');
$style->getFont()->setBold(true);

// Poner color en las celdas A1:C3
$style = $hojaActiva->getStyle('A1:C1');
$style->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('d63384');



//Descarga de Archivo Xlsx
ob_end_clean();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte_Cac2.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
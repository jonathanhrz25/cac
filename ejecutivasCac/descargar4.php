<?php

require 'conexion.php';
require '../vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};


$sql="SELECT * from form_clientes4";
$result= mysqli_query($conn,$sql);


$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("formulario");

/* Encabezados */
$hojaActiva->setCellValue('A5', 'Id');
$hojaActiva->setCellValue('B5', 'Indicar si tiene relación con otro cliente');
$hojaActiva->setCellValue('C5', 'Numero de cliente');
$hojaActiva->setCellValue('D5', 'Nombre y puesto o relación con el titular');
$hojaActiva->setCellValue('E5', 'Telefono');
$hojaActiva->setCellValue('F5', 'Correo');
$hojaActiva->setCellValue('G5', 'Inactividad');
$hojaActiva->setCellValue('H5', 'Surtido');
$hojaActiva->setCellValue('I5', 'Falta de visita del Vendedor');
$hojaActiva->setCellValue('J5', 'Precios');
$hojaActiva->setCellValue('K5', 'Disponibilidad de Material');
$hojaActiva->setCellValue('L5', 'Mala calidad del Producto');
$hojaActiva->setCellValue('M5', 'Tiempos de Entrega');
$hojaActiva->setCellValue('N5', 'Devoluciones y garantias');
$hojaActiva->setCellValue('O5', 'Credito y Cobranza');
$hojaActiva->setCellValue('P5', 'Mala experiencia de Compra');
$hojaActiva->setCellValue('Q5', 'Mala atencion de TLK');
$hojaActiva->setCellValue('R5', 'Cambio de razon social');
$hojaActiva->setCellValue('S5', 'Cambio de Giro comercial');
$hojaActiva->setCellValue('T5', 'Reapertura de Negocio');
$hojaActiva->setCellValue('U5', 'Se le quito el credito');
$hojaActiva->setCellValue('V5', 'Prefiere la competencia');
$hojaActiva->setCellValue('W5', 'Otro motivo');
$hojaActiva->setCellValue('X5', '3. Seguir trabajando con su cuenta o a través de la cuenta relacionada');
$hojaActiva->setCellValue('Y5', '4. ¿Le interesa seguir trabajando con nosotros?');

$fila = 6;

/* Extraccion de Datos*/
while($rows=mysqli_fetch_array($result)){
$hojaActiva->setCellValue('A'.$fila, $rows['Id']);
$hojaActiva->setCellValue('B'.$fila, $rows['relacion_otro']);
$hojaActiva->setCellValue('C'.$fila, $rows['num_cliente']);
$hojaActiva->setCellValue('D'.$fila, $rows['nombre']);
$hojaActiva->setCellValue('E'.$fila, $rows['telefono']);
$hojaActiva->setCellValue('F'.$fila, $rows['correo']);
$hojaActiva->setCellValue('G'.$fila, $rows['inactividad']);
$hojaActiva->setCellValue('H'.$fila, $rows['inactividad2']);
$hojaActiva->setCellValue('I'.$fila, $rows['inactividad3']);
$hojaActiva->setCellValue('J'.$fila, $rows['inactividad4']);
$hojaActiva->setCellValue('K'.$fila, $rows['inactividad5']);
$hojaActiva->setCellValue('L'.$fila, $rows['inactividad6']);
$hojaActiva->setCellValue('M'.$fila, $rows['inactividad7']);
$hojaActiva->setCellValue('N'.$fila, $rows['inactividad8']);
$hojaActiva->setCellValue('O'.$fila, $rows['inactividad9']);
$hojaActiva->setCellValue('P'.$fila, $rows['inactividad10']);
$hojaActiva->setCellValue('Q'.$fila, $rows['inactividad11']);
$hojaActiva->setCellValue('R'.$fila, $rows['inactividad14']);
$hojaActiva->setCellValue('S'.$fila, $rows['inactividad15']);
$hojaActiva->setCellValue('T'.$fila, $rows['inactividad16']);
$hojaActiva->setCellValue('U'.$fila, $rows['inactividad17']);
$hojaActiva->setCellValue('V'.$fila, $rows['inactividad19']);
$hojaActiva->setCellValue('W'.$fila, $rows['inactividadOtro']);
$hojaActiva->setCellValue('X'.$fila, $rows['alta_relacion']);
$hojaActiva->setCellValue('Y'.$fila, $rows['relacion_com']);
$fila++;
}



/* Estilos */

// Crear un objeto Spreadsheet
$spreadsheet = new Spreadsheet();

//Titulo y formato de letra con tamaño
$excel->setActiveSheetIndex(0)->setCellValue('C1', 'Reporte Encuestas CAC - Bloque 4');
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
$hojaActiva->getColumnDimension('K')->setWidth(30);
$hojaActiva->getColumnDimension('L')->setWidth(30);
$hojaActiva->getColumnDimension('M')->setWidth(30);
$hojaActiva->getColumnDimension('N')->setWidth(30);
$hojaActiva->getColumnDimension('O')->setWidth(30);
$hojaActiva->getColumnDimension('P')->setWidth(30);
$hojaActiva->getColumnDimension('Q')->setWidth(30);
$hojaActiva->getColumnDimension('R')->setWidth(30);
$hojaActiva->getColumnDimension('S')->setWidth(30);
$hojaActiva->getColumnDimension('T')->setWidth(30);
$hojaActiva->getColumnDimension('U')->setWidth(30);
$hojaActiva->getColumnDimension('V')->setWidth(30);
$hojaActiva->getColumnDimension('W')->setWidth(30);
$hojaActiva->getColumnDimension('X')->setWidth(30);
$hojaActiva->getColumnDimension('Y')->setWidth(30);


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
$hojaActiva->getStyle('A5:Y1000')->applyFromArray($tableStyle);

// Combinar Celdas
$hojaActiva->mergeCells('A1:B4');
$hojaActiva->mergeCells('C1:Y4');

// Alinear texto en el medio de la celda
$style = $hojaActiva->getStyle('A1:V100');
$style->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

// Centrar el contenido de la celda
$style = $hojaActiva->getStyle('A5:D100');
$style->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$style->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

$style = $hojaActiva->getStyle('Y5:J100');
$style->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$style->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

// Hacer negrita el contenido de la celda A1
$style = $hojaActiva->getStyle('A1:Y5');
$style->getFont()->setBold(true);

// Poner color en las celdas A1:C3
$style = $hojaActiva->getStyle('A1:C1');
$style->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('d63384');



//Descarga de Archivo Xlsx
ob_end_clean();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte_Cac4.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
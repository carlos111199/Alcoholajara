<?php
    ob_start();
    require_once('tcpdf/config/lang/eng.php');
    require_once('tcpdf/tcpdf.php');
	session_start();
	if(isset($_SESSION["usuario"]))
	{
		$usuario = $_SESSION["usuario"];
		$archivo = "jsons//".$usuario[0]['nombreU'].".json";
		$str_datos = file_get_contents($archivo);
		$datos = json_decode($str_datos, true);
	}
	else
	{
		header("Location: login.php");	
    }

    $tablaProductos = '<table border="1">
    <tr>
        <th><h4>Articulo</h4></th>
        <th><h4>Cantidad</h4></th>
        <th><h4>Precio</h4></th>
    </tr>';
    for($i=0; $i<count($datos); $i++)
    {
        $tablaProductos=$tablaProductos.'<tr>
            <td>'. $datos[$i]["nombre"] .''.$datos[$i]["tipo"].' '. $datos[$i]["presentacion"] .'</td>
            <td>'. $datos[$i]["stock"] . '</td>
            <td>'. $datos[$i]["precio"]*$datos[$i]["stock"] .'</td>
        </tr>';
        $subtotal=$subtotal+($datos[$i]["precio"]*$datos[$i]["stock"]);
    }
    $tablaProductos=$tablaProductos.'</table>';

    $tablaIndicaciones ='<table style="font-size:50px;">
        <tr><th><h2>Indicaciones</h2></th></tr>
        <tr><td>1. Acude a tu tienda Oxxo mas cercana</td></tr>
        <tr><td>2. Menciona que requieres hacer un pago para New Wave</td></tr>
        <tr><td>3. Entrega la ficha al cajero para proceder al pago</td></tr>
        <tr><td>4. Paga al cajero en subtotal</td></tr>
        <tr><td>5. Tu pago se verá reflejado en los proximos minutos</td></tr>
    </table>';

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Carlos VL');
    $pdf->SetTitle('Alcolajara');
    $pdf->SetSubject('Orden de pago');
    $pdf->SetKeywords('Articulos');

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $pdf->setLanguageArray($l);

    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica', '', 9, '', true);
    $style = array(
        'position' => '',
        'align' => 'C',
        'stretch' => false,
        'fitwidth' => true,
        'cellfitalign' => '',
        'border' => true,
        'hpadding' => 'auto',
        'vpadding' => 'auto',
        'fgcolor' => array(0,0,0),
        'bgcolor' => false,
        'text' => true,
        'font' => 'helvetica',
        'fontsize' => 8,
        'stretchtext' => 4
    );

    $pdf->setPrintHeader(true); 
    $pdf->setPrintFooter(true);
    $pdf->AddPage();

    ob_end_clean();

    $pdf->Cell(0, 0, 'CODIGO DE REFERENCIA - 111199 - ', 0, 1);
    $pdf->write1DBarcode('1 0 9 4 5 3 8 7 3 1 5 7 4', 'C39', '', '', '', 18, 0.4, $style, 'N');

    $pdf->Ln();

    $pdf->Image('imagenes/agave.png', 15, 60, 25, 25, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
    $pdf->Image('imagenes/oxxo.jpg', 55, 60, 50, 25, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('times', '', 15, '', true);
    $pdf->Cell(0, 50, 'Asiste a una tienda Oxxo y entrega el código de referencia', 0, 1);

    $pdf->Cell(0, 50, 'Subtotal: $'.$subtotal.'MXN', 0, 1);

    $pdf->SetFont('helvetica', '', 9, '', true);
    $pdf->Cell(0, 0, 'CODIGO DE REFERENCIA - 111199 - ', 0, 1);
    $pdf->write1DBarcode('1 0 9 4 5 3 8 7 3 1 5 7 4', 'C39', '', '', '', 18, 0.4, $style, 'N');

    $pdf->Ln();

    $pdf->Output('Orden_Pago.pdf', 'I');
?>
<?php
    session_start();
    if(isset($_SESSION["usuario"]))
    {
        $usuario = $_SESSION["usuario"];
    }
    $Nombre = $_GET["name"];
    $Producto = $_GET["prod"];
    $Tipo = $_GET["type"];

    $archivo = "jsons//".$Nombre.".json";
    $str_datos = file_get_contents($archivo);
    $datos = json_decode($str_datos, true);
    $producto = array();
    

    for($i=0; $i<count($datos); $i++){
        if(($datos[$i]["nombre"]==$Producto) and ($datos[$i]["tipo"]==$Tipo)){
            $producto = array('nombre'=>$datos[$i]['nombre'], 'tipo' => $datos[$i]['tipo'], 'presentacion' => $datos[$i]['presentacion'], 'imagen' => $datos[$i]['imagen'], 'precio' => $datos[$i]['precio'], 'stock' => $datos[$i]['stock'], 'status' => 'Pagado, en proceso de envío');
            array_splice($datos, $i, 1);
            array_push($datos, $producto);
            $guardar = fopen($archivo, 'w') or die("Error al abrir fichero de salida");
            fwrite($guardar, json_encode($datos, JSON_UNESCAPED_UNICODE));
            fclose($guardar);
            header("Location: pedido.php?cart=$Nombre");
        }
    }
?>
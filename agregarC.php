<?php
    session_start();
    if(isset($_SESSION["usuario"]))
    {
        $usuario = $_SESSION["usuario"];
    }
    if($usuario==null){
        header("Location: login.php");
    }
    else{
        $id = $_GET["ID"];
        $cant = $_GET["cant"];
        $cantidad = $_POST["cantidad"];
        require_once("modeloProducto.php");
	    $inv = new Inventario($id);
        $pd = $inv->prodCart();
        $archivo = "jsons//".$usuario[0]['nombreU'].".json";
        $str_datos = file_get_contents($archivo);
        $datos = json_decode($str_datos, true);
        if($cant==null){
            $producto = array('nombre'=>$pd[0]['nombre'], 'tipo' => $pd[0]['tipo'], 'presentacion' => $pd[0]['presentacion'], 'imagen' => $pd[0]['imagen'], 'precio' => $pd[0]['precio'], 'stock' => $cantidad, 'status' => 'Pendiente de Pago');
        }
        else{
            $producto = array('nombre'=>$pd[0]['nombre'], 'tipo' => $pd[0]['tipo'], 'presentacion' => $pd[0]['presentacion'], 'imagen' => $pd[0]['imagen'], 'precio' => $pd[0]['precio'], 'stock' => 1, 'status' => 'Pendiente de Pago');
        }
        array_push($datos, $producto);
        $guardar = fopen($archivo, 'w') or die("Error al abrir fichero de salida");
        fwrite($guardar, json_encode($datos, JSON_UNESCAPED_UNICODE));
        fclose($guardar);
        header("Location: carrito.php");
    }
?>
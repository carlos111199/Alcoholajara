<?php
    session_start();
    if(isset($_SESSION["usuario"]))
    {
        $usuario = $_SESSION["usuario"];
    }
    $nA = $_GET["num"];

    $archivo = "jsons//".$usuario[0]['nombreU'].".json";
    $str_datos = file_get_contents($archivo);
    $datos = json_decode($str_datos, true);
    array_splice($datos, $nA, 1);
    $guardar = fopen($archivo, 'w') or die("Error al abrir fichero de salida");
    fwrite($guardar, json_encode($datos, JSON_UNESCAPED_UNICODE));
    fclose($guardar);
    header("Location: carrito.php")
?>
<?php
    require_once("modeloAdmin.php");
    $carritos = new Carritos();
    $pd = $carritos->resultado_carritos();
    if($pd==0)
    {
        echo 'Error al recuperar los carritos, intente de nuevo';
    }
    else
    {
        require_once("pedidos.php");
    }
?>
<?php
	require_once("modeloP.php");
	$inv = new Inventario(null, null);
	$pd = $inv->lista_donjulio();
	require_once("productos.php");
?>
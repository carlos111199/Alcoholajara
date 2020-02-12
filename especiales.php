<?php
	require_once("modeloP.php");
	$inv = new Inventario(null, null);
	$pd = $inv->lista_especiales();
	require_once("productos.php");
?>
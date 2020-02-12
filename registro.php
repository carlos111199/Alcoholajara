<?php
	session_start();
	if(isset($_SESSION["usuario"]))
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="assets/registro.css">
		<link rel="shortcut icon" href="imagenes/faviconx.ico">
    <title>Registrate</title>
  </head>
  <body>
		<header class="headerP" href="">
			<a href="index.php"><img src="imagenes/agave.png" class="ImagenIni" height="70px" width="70px"></a>
			<a href="index.php"><h1>Alcolajara</h1></a>
    </header>
    <section>
			<h2>Registrate</h2>
			<form action="controladorR.php" method="post" autocomplete="off">
				<table class="tabla" width="100%">
					<tr>
						<td><label class="texto">Nombre de usuario:</label></td>
						<td><input type="text" name="nombreU" required></td>
					</tr>
					<tr>
						<td><label class="texto">Correo:</label></td>
						<td><input type="email" name="email" required></td>
					</tr>
					<tr>
						<td><label class="texto">Contraseña:</label></td>
						<td><input type="password" name="contra" required></td>
					</tr>
					<tr>
						<td><label class="texto">Repita su contraseña:</label></td>
						<td><input type="password" name="contra2" required></td>
					</tr>
					<tr>
						<td><label class="texto">Su nombre:</label></td>
						<td><input type="text" name="nombre" required></td>
					</tr>
				</table>
				<input type="submit" name="inicia" id="submit" value="Registrate">
      </form>
	</section>
  </body>
</html>
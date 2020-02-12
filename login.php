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
        <title>Inicia Sesion</title>
    </head>
    <body>
		<header class="headerP" href="">
			<a href="index.php"><img src="imagenes/agave.png" class="ImagenIni" height="70px" width="70px"></a>
			<a href="index.php"><h1>Alcolajara</h1></a>
    	</header>
    	<section>
            <h2>Inicia Sesion</h2>
			<form action="controladorL.php" method="post" autocomplete="off">
				<table class="tabla" width="100%">
					<tr>
						<td><label class="texto">Correo:</label></td>
						<td><input type="email" name="Email" required></td>
					</tr>
					<tr>
						<td><label class="texto">Contraseña:</label></td>
						<td><input type="password" name="Password" required></td>
					</tr>
				</table>
                <input type="submit" name="inicia" id="submit" value="Inicia Sesion">
            </form>
            <br><br>
            <label class="regis">¿No tienes cuenta? <a href="registro.php" class="reg">Registrate</a></label>
		</section>
    </body>
</html>
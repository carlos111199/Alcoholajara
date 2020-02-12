<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Resultado de registro</title>
        <link rel="stylesheet" type="text/css" href="assets/registro.css">
        <link rel="shortcut icon" href="imagenes/faviconx.ico">
    </head>
    <body>
        <header class="headerP" href="">
			<a href="index.php"><img src="imagenes/agave.png" class="ImagenIni" height="70px" width="70px"></a>
		    <a href="index.php"><h1>Alcolajara</h1></a>
        </header>
        <section class="encabezado">
            <img src="usuario.png" class="logo" height="100px" width="100px">
            <h1>Resultado de Registro</h1>
            <br><br>
            <h2>
                <?php 
                    if($rc==1)
                    {
                        echo "<h2>Registrado con exito</h2>";
                    }
                    else
                    {
                        echo "<h2>Error en el registro</h2>";
                    } 
                ?>
            </h2>
            <a href="index.php" style="color: blue; text-decoration: underline;">Volver a inicio</a>
        </section>    
    </body>
</html>
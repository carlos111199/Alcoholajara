<?php
session_start();
if(isset($_SESSION["usuario"]))
{
    $usuario = $_SESSION["usuario"];
}
else{
    $usuario = null;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="assets/productos.css">
        <link rel="shortcut icon" href="imagenes/faviconx.ico">
        <link rel="stylesheet" href="fonts/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="JS/Login.js"></script>
        <script defer src="JS/Modal.js"></script>
        <script src="JS/Regreso.js"></script>
        <title>Productos</title>
    </head>
    <body class="formulario">
        <script src="JS/Carga.js"></script>
        <div id="contenedor_carga">
            <div id="carga">
            </div>
        </div>
        <header class="headerP">
		  <a href="index.php"><img src="imagenes/agave.png" class="ImagenIni" height="70px" width="70px"></a>
          <a href="index.php"><h1>Alcolajara</h1></a>
            <nav id="nav">
                <table class="menu">
                    <tr>
                        <td class="mns"><a href="acercaDe.php" class="mn">Acerca de Nosotros</a></td>
                        <td class="mns"><a href="controladorP.php" class="mn">Productos</a></td>
                        <td class="mns">
                        <?php
                        if($usuario[0]['adm']==1){
                            echo '<a href="admin.php" class="mn">Administrar pedidos</a></td>';
                        }
                        ?>
                        <td class="mns">
                        <?php
                        if($usuario!=null)
                        {
                            echo '<a href="carrito.php" class="img"><img src="imagenes/cart.png" title="carrito" height="30px" width="30px"></a>';
                            $usuario[0]['nombreU'];///Se almacena el nombre del usuario
                        }
                        else
                        {
                            echo '<a href="login.php" class="img"><img src="imagenes/cart.png" title="carrito" height="30px" width="30px"></a>';
                        }
                        ?>
                    </td>
                    <?php
                        if($usuario!=null)
                        {
                            echo"<td class='mns'><p style='color:white; margin:1px;'>Hola</p><p style='color:white; margin:1px;'>".$usuario[0]['nombreU']."</p></td>";///Se almacena el nombre del usuario
                        }
                    ?>
                    <td class="mns">
                        <?php
                        if($usuario!=null)
                        {
                            echo'<a href="cerrar.php" id="cerrar" class="img"><img src="imagenes/logout.png" title="Cerrar Sesion" height="30px" width="30px"></a>';
                        }
                        else
                        {
                            echo'<a id="login" class="img"><img src="imagenes/login.png" title="Cerrar Sesion" height="30px" width="30px"></a>
                            <div id="login-content">
                                <form action="controladorL.php" method="post">
                                    <input id="user" type="email" name="Email" placeholder="Email" required>   
                                    <input id="pass" type="password" name="Password" placeholder="Pass" required>
                                    <input type="submit" id="submit" value="Login">
                                    <br>
                                </form>
                                <a href="registro.php" id="registro"><label style="cursor: pointer;">Registrate</label></a>
                            </div>';
                        }
                        ?>
                    </td>
                    </tr>
                </table>
            </nav>
        </header>
        <section class="contenedor" width="100%">
            <?php
                for($i=0; $i<count($pd); $i++)
                {
                    echo '<article class="producto">
                        <table class="cont" width="100%" height="100%">
                            <tr>
                                <td width="40%" height="100%"><img src="' . $pd[$i]["imagen"] . '" height="250px" class="img"></td>
                                <td width="60%" height="100%">
                                    <p class="nombre" name="Nombre">' . $pd[$i]["nombre"] . " " . $pd[$i]["tipo"] . ' <span name="Modelo">' . $pd[$i]["presentacion"] . '</span></p>
                                    <p class="precio" name="Precio">$' . $pd[$i]["precio"] . '</p>
                                    <a class="boton" href="producto.php?ID='. $pd[$i]["id"].'">Ver mas</a>
                                    <a class="boton" href="agregarC.php?ID='. $pd[$i]["id"] .'&cant=1">Agregar al carrito</a>
                                </td>
                            </tr>
                        </table>
                        <br>
                    </article>';
                }
            ?>
        </section>
        <br><br><br>
        <footer class="footerP">
        <p class="foot">2019 | CVL · <label id="terminos" data-modal-target="#modal">Términos y condiciones</label></p>
    </footer>

    <div class="modal" id="modal">
        <div class="modal-header">
            <div class="title">POLITICA DE PRIVACIDAD</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
        <div class="modal-body" style="overflow: scroll;height: 90%">
            <b></b>

El presente Política de Privacidad establece los términos en que Alcolajara usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.<br>

<br><b>Información que es recogida </b><br>

Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,  información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.<br>

<br><b>Uso de la información recogida</b><br>

Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios.  Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.
Alcolajara está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.<br>

<br><b>Enlaces a Terceros</b><br>

Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas.<br>

<br><b>Control de su información personal</b><br>

En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.
Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.
Alcolajara Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.
<br>

<br><b>Cookies</b><br>

Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.
Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente. Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.
<br>
    </div>
  </div>
  <div id="overlay"></div>
    </body>
</html>
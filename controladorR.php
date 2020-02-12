<?php
	$nombreU = $_POST['nombreU'];
    $email = $_POST['email'];
    $contra = $_POST['contra'];
    $contra2 = $_POST['contra2'];
    $nombre = $_POST['nombre'];

    if(strcmp($contra, $contra2)===0)
    {
        require_once("modeloR.php");
        $regis = new Registro($nombreU, $email, $contra, $nombre);
        $pc = $regis->resultado_correo();
        if($pc!=0)
        {
            require_once("registro.php");
            echo '<p style="font-color: red;">Este correo ya está asociado a otra cuenta</p>';
        }
        else
        {
            $pd = $regis->resultado_usuario();
            if($pd!=0)
            {
                require_once("registro.php");
                echo '<p style="font-color: red;">El nombre de usuario ya está ocupado</p>';
            }
            else
            {
                $rc = $regis->registro_user();
                require_once("registrado.php");
            }
        }
    }
    else
    {
        require_once("registro.php");
        echo '<p style="font-color: red;">las contraseñas no coinciden</p>';
    }
?>
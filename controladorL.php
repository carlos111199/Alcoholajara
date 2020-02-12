<?php
	$email = $_POST['Email'];
    $contra = $_POST['Password'];
    $check = $_POST["check"];
    $Cnull=0;
    require_once("modeloL.php");
    $login = new Login($email, $contra);
    $pd = $login->resultado_correo();
    if($pd==0)
    {
        require_once("Registro.php");
    }
    else
    {
        $pl = $login->resultado_login();
        if($pl==1)
        {
            echo "el correo y la contraseña no coinciden";
        }
        else
        {
            session_start();
            $_SESSION["usuario"] = $pl;
            header("Location: index.php");
        }
    }
?>
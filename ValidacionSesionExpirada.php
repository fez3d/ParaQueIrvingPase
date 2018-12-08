<?php
    function validarSesionExpirada(){}
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            session_unset();     
            session_destroy();  
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    
        echo "Tu sesion ha expirado";
        header('Location: IniciarSesion.php');
?>
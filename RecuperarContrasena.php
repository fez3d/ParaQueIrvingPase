<html lang ="en">
    <head>
        <?php
        include("BaseDeDatos.php"); 
            session_start();
            
            function generateRandomString($length = 10) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            
            function enviarCorreo($usuario){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "publicis";
                $sql = "SELECT * FROM usuario where id_usuario =" ."'".$usuario."'";
                $conn = new mysqli($servername, $username, $password,$database);
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $id_usuario = $row['id_usuario'];
                $tipo_usuario = $row['tipo'];
                $db_contrasena_hash = $row['contrasena'];
                $correo = $row['correo'];
                $conn->close();
                
                $randomString = generateRandomString();
                
                $baseDatos = new BaseDeDatos();
                $contrasena = hash("sha256", $randomString, false);
                $query = "UPDATE `usuario` SET `contrasena`=".$contrasena." WHERE id_usuario = '".$_POST['usuario']."'";
                
                $msg = "Su nueva contraseña temporal es: ".$randomString;
                echo phpinfo();
                ini_set();
                mail($correo, "Recuperacion de contraseña", $msg);
                return $result;
            }

            if(isset($_POST['submit'])){ 
                enviarCorreo($_POST['usuario']);
            }  
            
        ?>
        
        <meta charset="UTF-8">
        <title>Formulario1</title>
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="estiloForm.css"/>
    </head>
    <body>
        <header>
            <div class="wrapper">
|		<div 
                    class ="logo">Publicis
                </div>
                <nav>
                    <a href="Inicio.php"> Inicio</a>
                    <a href="Nosotros.php"> Nosotros</a>
                    <a href="Servicio.php"> Servicios</a>
                    <a href="Contacto.php"> Contacto</a>
                    <a href="IniciarSesion.php"> Iniciar Sesion</a>
                </nav>
            </div>
	</header>
        <form method="POST">
            <h1>Recuperación</h1>
            <h2>Ingrese su nombre de usuario. </h2>
            
            <label for="">Usuario </label>
            <input type="text"  name="usuario" required>
            <input type="submit" name="submit" value="Enviar correo">
            <p>De existir la cuenta con el nombre ingresado, se enviarán 
                instrucciones para la recuperación de la cuenta al correo 
                asociado con esta.</p>
        </form>
    </body>
</html>
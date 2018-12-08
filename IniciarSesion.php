<html lang ="en">
    <head>
        <?php
            session_start();
        
            function crearbitacora(){
                
                $contrasena = hash("sha256", $_POST['contrasena'], false);
                $texto = $_POST['usuario'] .",". $contrasena.PHP_EOL;
                file_put_contents("bitacora.txt", $texto, FILE_APPEND);
                //header("location:index.php");
            }
            
            function checar_disponibilidad($usuario){
                /*$comprobacion = false;
                $myfile = fopen("bitacora.txt", "r") or die("Unable to open file!");
                $contrasena_hash;
                
                while(!feof($myfile)) {
                    $usuario_existente = fgets($myfile);
                    $arreglo = explode(",", $usuario_existente,2);
                    $usuario_existente = $arreglo[0];

                    if($usuario == $usuario_existente){
                        $comprobacion = true;
                        $contrasena_hash = $arreglo[1];
                        checar_contrasena($contrasena_hash);
                        
                    }                 
                }
                
                if(!$comprobacion){
                    echo "NO EXISTE EL USUARIO";
                }
                fclose($myfile);*/
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
                include("VerificacionIntentoInicioSesion.php");
                #confirmIPAddress($_SERVER['REMOTE_ADDR']);
                validar_contrasena($db_contrasena_hash, $id_usuario, $tipo_usuario);
                $conn->close();
                return $result;
            }
            
            function validar_contrasena($db_contrasena_hash, $id_usuario, $tipo_usuario){
                $contrasena = hash("sha256", $_POST['contrasena'], false);
                /*$digitos = strlen($contrasena) - 2;
                $contrasena_hash = substr($contrasena, 0, $digitos);
                #echo $contrasena_hash;
                echo " ";
                echo $contrasena;
                echo " ";
                echo $db_contrasena_hash;*/

                if($contrasena == $db_contrasena_hash){
                    echo "INICIASTE SESION";
                    $_SESSION['LAST_ACTIVITY'] = time();
                    $_SESSION['inicio'] = true;
                    $_SESSION['usuario'] = $id_usuario;
                    $_SESSION['tipo_usuario'] = $tipo_usuario;
                    header('Location: Inicio.php');                   
                } else {
                    echo "NOMBRE DE USUARIO O CONTRASENA ESTA MAL";
                }
            }


            if(isset($_POST['submit'])){
                checar_disponibilidad($_POST['usuario']);
                //crearbitacora("alta");;
            }  
            
        ?>
        
        <meta charset="UTF-8">
        <title>Iniciar Sesion</title>
          
          <link href="estiloIniciarSesion.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link rel="stylesheet" href="ServiciosStyleSheet.css">
        
    </head>
    <body>
        <header class="main-header">   
                    <div class="container container--flex">
                        <div class ="logo-container column column--50">
                            <h1 class="logo">Logo</h1>
                        </div>
                        <div class="main-header__contactInfo column column--50">
                            <p class="main-header__contactInfo__phone">
                                <span class="icon-phone">999-999-999</span>
                            </p>
                            <p class="main-header__contactInfo__adress">
                                <span class="icon-map-marca">Mérida,Yucatán, México</span>
                            </p>    
                        </div>    
                    </div>
    </header>
        <nav class="main-nav">
            <div class="container container--flex">
                    <span class="icon-menu" id="btnmenu"></span>
                    <ul class="menu" id="menu">
                            <li class="menu__item">
                                    <a href="Inicio.php" class="menu__link menu__link--select"> Inicio</a>
                            </li>
                            <li class="menu__item">
                                    <a href="Nosotros.php" class="menu__link"> Nosotros</a>
                            </li>
                            <li class="menu__item">
                                    <a href="Servicio.php" class="menu__link "> Servicios</a>
                            </li>
                            <li class="menu__item">
                                    <a href="Contacto.php" class="menu__link "> Contacto</a>
                            </li>
                            <?php
                               
                                if($_SESSION['tipo_usuario'] == "administrador"){
                                    echo '<li class="menu__item">';
                                    echo '<a href="VistaAdministrador.php" class="menu__link "> Ver Anuncios</a>';
                                    echo '</li>';
                                } else if ($_SESSION['tipo_usuario'] == "cliente"){
                                    echo '<li class="menu__item">';
                                    echo '<a href="VistaContratar.php" class="menu__link "> Contratar</a>';
                                    echo '</li>';
                                    echo '<li class="menu__item">';
                                    echo '<a href="VistaVerContrataciones.php" class="menu__link "> Ver Mis Contrataciones</a>';
                                    echo '</li>';
                                }

                                if($_SESSION['inicio'] == null || $_SESSION['inicio'] == false){
                                    echo '<li class="menu__item">';
                                    echo '<a href="IniciarSesion.php" class="menu__link "> Iniciar Sesion</a>';
                                    echo '</li>';
                                } else{
                                    echo '<li class="menu__item">';
                                    echo '<a href="CerrarSesion.php" class="menu__link "> Cerrar Sesion</a>';
                                    echo '</li>';
                                }
                            ?>
                    </ul>

            </div>      
        </nav>
         
        <div class="login-box">
        <img src="imagenes/avatar.png" class="Avatar"/>
        <h1>Por favor inicia sesion</h1>
        <form action="" method="POST">
            <p>Usuario</p>
            <input type="text" name="usuario" placeholder="Ingresa tu Usuario">
            <p>Contraseña</p>
            <input type="password" name="contrasena" placeholder="Ingresa tu Contraseña">
            <input type="submit" name="submit" value="Ingresar">
            <a href="RegistroDatos.php">Registrarse</a>    
            </form>
        
    </body>
</html>
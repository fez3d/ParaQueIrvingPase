
  <html lang ="es">
    <head>
        
        <meta charset="UTF-8">
        <title>Registrar Datso</title>
        <link href="EstiloRegistrarDatos.css" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="SliderStyleSheet.css">
        <link href="HeaderStyleSheet.css" rel="stylesheet" type="text/css"/>
        
        <script>
            function getText(element) {
            var textHolder = element.options[element.selectedIndex].text
            document.getElementById("txt_holder").value = textHolder;
            }
        </script>
    </head>
    <body>
        <?php
        include("BaseDeDatos.php"); 
            function agregarUsuario(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_POST['usuario'];
                $correo = $_POST['email'];
                $contrasena = hash("sha256", $_POST['contrasena'], false);
                $tipoUsuario = $_POST['txt_holder'];
                $query = "INSERT INTO usuario VALUES ('".$usuario."','".$contrasena."','".$correo."','".$tipoUsuario."');";
                $baseDatos->EjecutarQuery($query);
                
                if($tipoUsuario == "cliente"){
                    echo("permiso cliente");
                    agregarPermisoCliente();
                }else{
                    echo("permiso admin");
                    agregarPermisoAdmin();
                }
                header("Location: IniciarSesion.php");
            }
            
            function agregarBitacora(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_POST['usuario'];
                $tipoUsuario = $_POST['txt_holder'];
                $descripcion = 'Se creó el usuario tipo '.$tipoUsuario;
                $query = "INSERT INTO `bitacora` (`clv_usuario`, `descripcion`) VALUES ('".$usuario."','".$descripcion."');";
                $baseDatos->EjecutarQuery($query); 
            }
            
            function agregarPermisoCliente(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_POST['usuario'];
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',201);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',202);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',203);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',301);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',302);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',303);");
            }
            
            function agregarPermisoAdmin(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_POST['usuario'];
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',101);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',102);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',103);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',401);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',402);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',403);");
                $baseDatos->EjecutarQuery("INSERT INTO `permiso_usuario` VALUES ('".$usuario."',500);");
            }

            if(isset($_POST['submit'])){ 

                agregarUsuario();
            }  
            
        ?>

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
                    session_start();
                    if($_SESSION['tipo_usuario'] == "administrador"){
                        echo '<li class="menu__item">';
                        echo '<a href="VistaAdministrador.php" class="menu__link "> Ver Anuncios</a>';
                        echo '</li>';
                        echo '<li class="menu__item">';
                        echo '<a href="Bitacora.php" class="menu__link "> Bitacora</a>';
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

			</nav>
	
	
        <form action="" method="POST">
        <div class="register-box">
            <h1 align="center">Por favor ingrese sus datos de registro</h1>
            <label for="">Nombre usuario:</label>
            <input type="text" name="usuario" required="" placeholder="Escribe tu Nombre de Usuario"> 
            <label for="">Correo:</label>
            <input type="email" name="email" required="" placeholder="example@.com"> 
            <label for="">Contraseña: </label>
            <input type="password" name="contrasena" required="" placeholder="Escribe tu contraseña">
            <label for="">Tipo de Usuario: </label>
            <select name="text selection" onchange="getText(this)">
                <option value="">Elige una Opcion</option>
                <option value="cliente">cliente</option>
                <option value="admin">administrador</option>
            </select>
            <input type="hidden" name="txt_holder" id="txt_holder">
            <input type="submit" name="submit" value="Registrar Datos">
        </div> 
    </form>
        
    </body>
</html>



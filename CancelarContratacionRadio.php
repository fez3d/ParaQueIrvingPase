<html>
    <head>
        <meta charset="UTF-8">
        <link href="EstiloVentanasCancelar.css" rel="stylesheet" type="text/css"/>
        <!--<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">-->
        <!--<link href="NavbarCss.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" href="HeaderStyleSheet.css">
    <link rel="stylesheet" href="ServiciosStyleSheet.css">
    <link rel="stylesheet" href="SliderStyleSheet.css">
        <title>Cancelar Radio</title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        include("BaseDeDatos.php"); 
            function eliminar(){
                $baseDatos = new BaseDeDatos();
                $clave = $_POST['clave'];
                $usuario = $_SESSION['usuario'];
                $query = "DELETE FROM contratacionradio WHERE estacion ="
                        .$clave
                        ." AND clv_usuario ='"
                        .$usuario
                        ."';";
                $baseDatos->EjecutarQuery($query);
            }

            if(isset($_POST['submit'])){ 

                eliminar();
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
        
        <div class="Cancel-box">
        <h1>Numero de contrato a eliminar:</h1>
        <form method="post">
            
            <input type="text" name="clave" required="" placeholder="Ingresar Numero Contrato Radio">
            <input type="submit" name="submit" value="eliminar">
        </form>
        </div>
    </body>
</html>
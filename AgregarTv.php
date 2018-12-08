
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Agregar televisión</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link href="NavbarCss.css" rel="stylesheet" type="text/css"/>-->
        <link href="estiloVentanasAgregar.css" rel="stylesheet" type="text/css"/>
        <!--<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">-->
        <script src="contact-form-validation-Tv.js"></script>
        <link rel="stylesheet" href="HeaderStyleSheet.css">
    <link rel="stylesheet" href="ServiciosStyleSheet.css">
    <link rel="stylesheet" href="SliderStyleSheet.css">
    </head>
    <body>
         <?php
        include("BaseDeDatos.php"); 
            function agregarTv(){
                $baseDatos = new BaseDeDatos();
                $canal = $_POST['canal'];
                $titulo = $_POST['titulo'];
                $precio = $_POST['precio'];
                $query = "INSERT INTO `television` VALUES ('".floor($canal)."','".$titulo."','".floor($precio)."');" ;
                
                if(is_numeric($precio) && is_numeric($canal)){
                    echo "Acceso permitido";
                    $baseDatos->EjecutarQuery($query);
                }else{
                    echo "Acceso denegado";
                }
            }

            if(isset($_POST['submit'])){ 
                agregarTv();
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


        
        
            <div class="add-box">
              <h1> Ingrese los siguientes datos del canal de televisión a registrar:</h1>
  
                <form name="contact-form" method="post">
                    Canal: <br>
                    <input type="text"  name="canal" placeholder="Ingresa el Canal">
                    <br><br>
                        
                    Título: <br>
                    <input type="text" name="titulo" placeholder="Ingresa el titulo">
                    <br><br>
                    
                    Precio: <br>
                    <input type="text"  name="precio" placeholder="Ingresa el precio">
                    <br><br>
                        
                    <input type="submit"  value="Registrar Datos" onclick="validateForm()">                       
                </form>
            </div>
        </div>
        
    </body>
</html>

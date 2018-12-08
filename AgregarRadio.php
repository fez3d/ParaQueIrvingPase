
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Agregar radio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estiloVentanasAgregar.css" rel="stylesheet" type="text/css"/>
        <link href="HeaderStyleSheet.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="ServiciosStyleSheet.css">
    <link rel="stylesheet" href="SliderStyleSheet.css">
        
        <script src="contact-form-validation-Radio.js"></script>
    </head>
    <body>
        <?php
        include("BaseDeDatos.php"); 
        //include("ValidacionSesionExpirada.php");
            function agregarCartelera(){
                $baseDatos = new BaseDeDatos();
                $id = $_POST['id'];
                $direccion = $_POST['direccion'];
                $titulo = $_POST['titulo'];
                $precio = $_POST['precio'];
                $query = "INSERT INTO carteleras VALUES ('".$id."','".$direccion."','".$titulo."','".$precio."');" ;
                
                if(is_int($id) && is_int($precio)){
                    $baseDatos->EjecutarQuery($query);
                }
            }

            if(isset($_POST['submit'])){
                //validarSesionExpirada();
                agregarCartelera();
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
                <?php
//                session_start();
//                if($_SESSION['tipo_usuario'] == "administrador"){
//                    echo '<a href="VistaAdministrador.php"> Ver Anuncios</a>';
//                } else if ($_SESSION['tipo_usuario'] == "cliente"){
//                    echo '<a href="VistaContratar.php"> Contratar</a>';
//                    echo '<a href="VistaVerContrataciones.php"> Ver Mis Contrataciones</a>';
//                }
//
//                if($_SESSION['inicio'] == null || $_SESSION['inicio'] == false){
//                    echo '<a href="IniciarSesion.php"> Iniciar Sesion</a>';
//                } else{
//                    echo '<a href="CerrarSesion.php"> Cerrar Sesion</a>';
//                }
                ?>
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

            </ul>
            </div>
       </nav>
        <div class="add-box">
              <h1> Ingrese los siguientes datos de la estación de radio a registrar: </h1>  
                <form name="contact-form" method="post">
                    Estación: <br>
                    <input type="text"  name="estacion" placeholder="ingresa la estacion">
                    <br><br>
                        
                    Título: <br>
                    <input type="text"  name="titulo" placeholder="ingresa el Titulo">
                    <br><br>
                    
                    Precio: <br>
                    <input type="text"  name="precio" placeholder="Ingresa el Precio">
                    <br><br>
                        
                    <input type="submit" name="submit" value="Registrar Datos" onclick="validateForm()">                       
                </form>
            
        </div>
        
            
       

        
    </body>
</html>
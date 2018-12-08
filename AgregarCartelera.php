<!DOCTYPE html>
<html>
    <head>
        <title>Agregar cartelera</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estiloVentanasAgregar.css" rel="stylesheet" type="text/css"/>
        <link href="HeaderStyleSheet.css" rel="stylesheet" type="text/css"/>
        <script src="contact-form-validation-Cartelera.js"></script>
    </head>
    <body>
        <?php
        session_start();
        include("BaseDeDatos.php"); 
        //include("ValidacionSesionExpirada.php");
            function agregarCartelera(){
                $baseDatos = new BaseDeDatos();
                $id = $_POST['id'];
                $direccion = $_POST['direccion'];
                $titulo = $_POST['titulo'];
                $precio = $_POST['precio'];
                $query = "INSERT INTO carteleras VALUES (".$id.",'".$direccion."','".$titulo."',".$precio.");" ;           
                $baseDatos->EjecutarQuery($query);               
            }
            
            function agregarBitacora(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_SESSION['usuario'];
                $descripcion = 'Agrego una Cartelera';
                $query = "INSERT INTO `bitacora` (`clv_usuario`, `descripcion`) VALUES ('".$usuario."','".$descripcion."');";
                $baseDatos->EjecutarQuery($query);    
            }
            
            if(isset($_POST['submit'])){ 
//                validarSesionExpirada();
                agregarCartelera();
                agregarBitacora();
                header("Location: VistaAdministrador.php");
            }  
            
        ?>
        <header>

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
        </div>


      

       
            <div class="add-box">
                <h1> Ingrese los siguientes datos de la cartelera a registrar:</h1>

                <form name="contact-form" method="POST" action="">
                    ID: <br>
                    <input type="text"  name="id" placeholder="ingrese el ID">
                    <br><br>
                        
                    Dirección: <br>
                    <input type="text"  name="direccion" placeholder="ingrese la direccion">
                    <br><br>
                        
                    Título: <br>
                    <input type="text"  name="titulo" placeholder="ingrese el Titulo">
                    <br><br>
                    
                    Precio: <br>
                    <input type="text"  name="precio" placeholder="ingrese el precio">
                    <br><br>
                     
                    <input type="submit" name="submit" value="Registrar Datos" onclick="validateForm()">               
                </form>
            </div>
        
        
    </body>
</html>
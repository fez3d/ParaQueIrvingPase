
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
        
        <script>
            function isNotEmptyLocalStorage(){
                var id = localStorage.getItem("agrEstacion");
                if(id == "" || id == null){
                    return false;
                } else {
                    return true;
                }
            }
            
            function localStorageCarga(){
                if(isNotEmptyLocalStorage()){
                    alert("Se recuperó información de la última sesión.");
                    
                    var id = localStorage.getItem("agrEstacion");
                    var titulo = localStorage.getItem("agrTitulo");
                    var precio = localStorage.getItem("agrPrecio");
                    
                    document.getElementsByName("estacion")[0].value = id;
                    document.getElementsByName("titulo")[0].value = titulo;
                    document.getElementsByName("precio")[0].value = precio;
                    
                    localStorage.removeItem("agrEstacion");
                    localStorage.removeItem("agrTitulo");
                    localStorage.removeItem("agrPrecio");
                }
            }
            
            function localStorageSubmit(){
                if(isNotEmptyLocalStorage()){
                }else{
                    if(!navigator.onLine){
                       var id =  document.getElementsByName("estacion")[0].value;
                       var titulo =  document.getElementsByName("titulo")[0].value;
                       var precio =  document.getElementsByName("precio")[0].value;
                       
                       localStorage.setItem("agrEstacion", id);
                       localStorage.setItem("agrTitulo", titulo);
                       localStorage.setItem("agrPrecio", precio);
                    }
                }
            }
            
            function submitF(){
                localStorageSubmit();
                validateForm();
                
            }
        </script>
    </head>
    <body onload="localStorageCarga()">
        <?php
        include("BaseDeDatos.php"); 
        //include("ValidacionSesionExpirada.php");
        session_start();
            function agregarCartelera(){
                $baseDatos = new BaseDeDatos();
                $id = $_POST['estacion'];
                $titulo = $_POST['titulo'];
                $precio = $_POST['precio'];
                $query = "INSERT INTO radio VALUES (".$id.",'".$titulo."',".$precio.");" ;
                $baseDatos->EjecutarQuery($query);

            }

            function agregarBitacora(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_SESSION['usuario'];
                $id = $_POST['estacion'];
                $descripcion = 'Agrego un anuncio de radio en '.$id;
                $query = "INSERT INTO `bitacora` (`clv_usuario`, `descripcion`) VALUES ('".$usuario."','".$descripcion."');";
                $baseDatos->EjecutarQuery($query);    
            }
            
            if(isset($_POST['submit'])){
                //validarSesionExpirada();
                agregarCartelera();
                agregarBitacora();
                header("Location: VistaAdministrador.php");
            }
            
            $baseDeDatos = new BaseDeDatos();
            $usuarioP = $_SESSION['usuario'];
            $resultP = $baseDeDatos->ObtenerResultado("SELECT `usuario`, `permiso` FROM "
                    . "`permiso_usuario` WHERE usuario = '".$usuarioP."' and "
                    . "permiso = 102");
            if($resultP->num_rows < 1){
                header("Location: PermisoDenegado.php");
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
                        
                    <input type="submit" name="submit" value="Registrar Datos" onclick="submitF()">                       
                </form>
            
        </div>
        
            
       

        
    </body>
</html>
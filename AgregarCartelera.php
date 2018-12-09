<!DOCTYPE html>
<html>
    <head>
        <title>Agregar cartelera</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estiloVentanasAgregar.css" rel="stylesheet" type="text/css"/>
        <link href="HeaderStyleSheet.css" rel="stylesheet" type="text/css"/>
        <script src="contact-form-validation-Cartelera.js"></script>
        <?php
           // echo '<script type="text/javascript">',
            //'localStorageCarga();',
            //'</script>';
        ?>
        <script>
            function isNotEmptyLocalStorage(){
                var id = localStorage.getItem("agcID");
                if(id == "" || id == null){
                    return false;
                } else {
                    return true;
                }
            }
            
            function localStorageCarga(){
                if(isNotEmptyLocalStorage()){
                    var id = localStorage.getItem("agcID");
                    var direccion = localStorage.getItem("agcDireccion");
                    var titulo = localStorage.getItem("agcTitulo");
                    var precio = localStorage.getItem("agcPrecio");
                    
                    document.getElementsByName("id").value = id;
                    document.getElementsByName("direccion").value = direccion;
                    document.getElementsByName("titulo").value = titulo;
                    document.getElementsByName("precio").value = precio;
                    
                    localStorage.removeItem("agcID");
                    localStorage.removeItem("agcDireccion");
                    localStorage.removeItem("agcTitulo");
                    localStorage.removeItem("agcPrecio");
                    alert("penneeeeeee");
                    
                }else{

                }
            }
            
            function localStorageSubmit(){
                alert("penneeeeeeeEstaEntrando");
                if(isNotEmptyLocalStorage()){                   
                    alert("penneeeeeeeNovacio");
                }else{
                    if(!navigator.onLine){
                       var id =  document.getElementsByName("id");
                       var direccion =  document.getElementsByName("direccion");
                       var titulo =  document.getElementsByName("titulo");
                       var precio =  document.getElementsByName("precio");
                       
                       localStorage.setItem("agcID", id);
                       localStorage.setItem("agcDireccion", direccion);
                       localStorage.setItem("agcTitulo", titulo);
                       localStorage.setItem("agcPrecio", precio);
                       alert("penneeeeeee222");
                    } else {
                        alert("penneeeeeeeNoseque");
                    }
                }
            }
            
            function submit(){
                window.alert("submitemeesta");
                localStorageSubmit();
                validateForm();
                
            }
        </script>
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
                $id = $_POST['id'];
                $descripcion = 'Agrego la cartelera '.$id;
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
                     
                    <input type="submit" name="submit" value="Registrar Datos" onclick="submit()">               
                </form>
            </div>
        
        
    </body>
</html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos.css">
        <link href="EstiloVentanasCancelar.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link rel="stylesheet" href="ServiciosStyleSheet.css">
        <link rel="stylesheet" href="SliderStyleSheet.css">
        <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
        <title></title>
    </head>
    <script>
            function isNotEmptyLocalStorage(){
                var id = localStorage.getItem("elcClave");
                if(id == "" || id == null){
                    return false;
                } else {
                    return true;
                }
            }
            
            function localStorageCarga(){
                if(isNotEmptyLocalStorage()){
                    alert("Se recuperó información de la última sesión.");
                    
                    var id = localStorage.getItem("elcClave");
                    
                    document.getElementsByName("clave")[0].value = id;
                    
                    localStorage.removeItem("elcClave");
                }
            }
            
            function localStorageSubmit(){
                if(isNotEmptyLocalStorage()){
                    //alert("LocalStorage no vacío");
                }else{
                    if(!navigator.onLine){
                       var id =  document.getElementsByName("clave")[0].value;
                       
                       localStorage.setItem("elcClave", id);
                       //alert("Se guardó id: " + id);
                    }
                }
            }
            
            function submitF(){
                localStorageSubmit();
                validateForm();
                
            }
        </script>
        <body onload="localStorageCarga()">
        <?php
        // put your code here
        include("BaseDeDatos.php");
        session_start();
            function eliminar(){
                $baseDatos = new BaseDeDatos();
                $clave = $_POST['clave'];
                $query = "DELETE FROM carteleras WHERE id =".$clave.";" ;
                $baseDatos->EjecutarQuery($query);
            }
            
            function agregarBitacora(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_SESSION['usuario'];
                $clave = $_POST['clave'];
                $descripcion = 'Eliminó la cartelera '.$clave;
                $query = "INSERT INTO `bitacora` (`clv_usuario`, `descripcion`) VALUES ('".$usuario."','".$descripcion."');";
                $baseDatos->EjecutarQuery($query);    
            }

            if(isset($_POST['submit'])){ 
                eliminar();
                agregarBitacora();
                header("Location: VistaAdministrador.php");
            }
            
            $baseDeDatos = new BaseDeDatos();
            $usuarioP = $_SESSION['usuario'];
            $resultP = $baseDeDatos->ObtenerResultado("SELECT `usuario`, `permiso` FROM "
                    . "`permiso_usuario` WHERE usuario = '".$usuarioP."' and "
                    . "permiso = 401");
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
        
       <div class="cancel-box">
        <h1>Clave de cartelera a eliminar:</h1>
        <form method="post">
            
            <input type="text" name="clave" required="" placeholder="Ingrese la cartelera">
            <input type="submit" name="submit" value="eliminar" onclick="submitF()">
        </form>
        </div>
    </body>
</html>

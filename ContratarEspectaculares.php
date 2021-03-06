<html>
    <head>
        <title>Contrato</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link rel="stylesheet" href="ContratarStyleSheet.css">
        <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
        <?php
            session_start();
            include("BaseDeDatos.php");
            $baseDeDatos = new BaseDeDatos();
            $usuarioP = $_SESSION['usuario'];
            $resultP = $baseDeDatos->ObtenerResultado("SELECT `usuario`, `permiso` FROM "
                    . "`permiso_usuario` WHERE usuario = '".$usuarioP."' and "
                    . "permiso = 301");
            if($resultP->num_rows < 1){
                header("Location: PermisoDenegado.php");
            }
        ?>
        <script src="contact-form-validation.js"></script>
        <script>
            function getText(element) {
            var textHolder = element.options[element.selectedIndex].text
            document.getElementById("txt_holder").value = textHolder;
            }
            
            function isNotEmptyLocalStorage(){
                var id = localStorage.getItem("cocDiaInicio");
                if(id == "" || id == null){
                    return false;
                } else {
                    return true;
                }
            }
            
            function localStorageCarga(){
                if(isNotEmptyLocalStorage()){
                    alert("Se recuperó información de la última sesión.");
                    
                    var diaInicio = localStorage.getItem("cocDiaInicio");
                    var mesInicio = localStorage.getItem("cocMesInicio");
                    var anoInicio = localStorage.getItem("cocAnoInicio");
                    var diaTermino = localStorage.getItem("cocDiaTermino");
                    var mesTermino = localStorage.getItem("cocMesTermino");
                    var anoTermino = localStorage.getItem("cocAnoTermino");
                    
                    document.getElementsByName("diaInicio")[0].value = diaInicio;
                    document.getElementsByName("mesInicio")[0].value = mesInicio;
                    document.getElementsByName("anoInicio")[0].value = anoInicio;
                    document.getElementsByName("diaTermino")[0].value = diaTermino;
                    document.getElementsByName("mesTermino")[0].value = mesTermino;
                    document.getElementsByName("anoTermino")[0].value = anoTermino;
                    
                    localStorage.removeItem("cocDiaInicio");
                    localStorage.removeItem("cocMesInicio");
                    localStorage.removeItem("cocAnoInicio");
                    localStorage.removeItem("cocDiaTermino");
                    localStorage.removeItem("cocMesTermino");
                    localStorage.removeItem("cocAnoTermino");
                }
            }
            
            function localStorageSubmit(){
                if(isNotEmptyLocalStorage()){
                    
                }else{
                    if(!navigator.onLine){
                       var diaInicio =  document.getElementsByName("diaInicio")[0].value;
                       var mesInicio =  document.getElementsByName("mesInicio")[0].value;
                       var anoInicio =  document.getElementsByName("anoInicio")[0].value;
                       var diaTermino =  document.getElementsByName("diaTermino")[0].value;
                       var mesTermino =  document.getElementsByName("mesTermino")[0].value;
                       var anoTermino =  document.getElementsByName("anoTermino")[0].value;
                       
                       localStorage.setItem("cocDiaInicio", diaInicio);
                       localStorage.setItem("cocMesInicio", mesInicio);
                       localStorage.setItem("cocAnoInicio", anoInicio);
                       localStorage.setItem("cocDiaTermino", diaTermino);
                       localStorage.setItem("cocMesTermino", mesTermino);
                       localStorage.setItem("cocAnoTermino", anoTermino);
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
             
             
            function agregarCartelera(){
                $baseDatos = new BaseDeDatos();
                $cartel = $_POST['txt_holder'];
                $usuario = $_SESSION['usuario'];
                $diaInicio = $_POST['diaInicio'];
                $mesInicio = $_POST['mesInicio'];
                $anoInicio = $_POST['anoInicio'];
                $fechaInicio = $mesInicio."/".$diaInicio."/".$anoInicio;
                        
                $diaTermino = $_POST['diaTermino'];
                $mesTermino = $_POST['mesTermino'];
                $anoTermino = $_POST['anoTermino'];
                $fechaTermino= $mesTermino."/".$diaTermino."/".$anoTermino;
                
                $query = "INSERT INTO `carteleracontratado`(`clv_cartel`, `clv_usuario`, `fecha_inicio`, `fecha_fin`) VALUES "
                        . "('".$cartel."','".$usuario."',STR_TO_DATE('".$fechaInicio."', '%m/%d/%Y'),STR_TO_DATE('".$fechaTermino."', '%m/%d/%Y'))" ;
                if(is_numeric($diaInicio) && is_numeric($diaTermino)){
                    $baseDatos->EjecutarQuery($query);
                }
            }
            
            function agregarBitacora(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_SESSION['usuario'];
                $cartel = $_POST['txt_holder'];
                $descripcion = 'Contrato las cartelera '.$cartel;
                $query = "INSERT INTO `bitacora` (`clv_usuario`, `descripcion`) VALUES ('".$usuario."','".$descripcion."');";
                $baseDatos->EjecutarQuery($query);    
            }
            
            if(isset($_POST['submit'])){ 
                agregarCartelera();
                agregarBitacora();
                echo "<script>window.location = 'VistaVerContrataciones.php'</script>";
                //header("Location: VistaVerContrataciones.php");
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
    
    <div class="contenedorForm">
        <div class="elementoform">
            <div class="contenedor">
                <div class="elemento">
                    <h2>Contratar Espectaculares</h2>
                </div>
                <div class="elemento">
                    <form action="" method="post">
                        Día de inicio:<br>
                        <input type="text" name="diaInicio" value="">
                        <br>
                        Mes de inicio:<br>
                        <input type="text" name="mesInicio" value="">
                        <br>
                        Año de inicio:<br>
                        <input type="text" name="anoInicio" value="">
                        <br>
                        Dia de termino:<br>
                        <input type="text" name="diaTermino" value="">
                        <br>
                        Mes de termino:<br>
                        <input type="text" name="mesTermino" value="">
                        <br>
                        Año de termino:<br>
                        <input type="text" name="anoTermino" value="">
                        <br><br>
                        Anuncios:
                        <select name="Anuncios" onchange="getText(this)">
                          <option>Selecciones una opcion</option>
                            <?php
                                $baseDatos = new BaseDeDatos();
                                $sql = "Select id from carteleras";
                                $result = $baseDatos->ObtenerResultado($sql);
                                while($rows = mysqli_fetch_assoc($result)){
                            ?>
                          <option><?php echo $rows['id']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <input type="hidden" name="txt_holder" id="txt_holder">
                        <br><br>

                        <input type="submit" value="Aceptar" name="submit" onclick="submitF()">
                    </form>  
                </div>
            </div>
        </div>  
    </div>

<script src="btnMenuInteraccion.js"></script>
</body>
</html>

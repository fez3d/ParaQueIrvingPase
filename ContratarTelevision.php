<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Contrato</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link rel="stylesheet" href="ContratarStyleSheet.css">
        <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
        <script src="contact-form-validation.js"></script>
        <?php
            session_start();
            include("BaseDeDatos.php");
            $baseDeDatos = new BaseDeDatos();
            $usuarioP = $_SESSION['usuario'];
            $resultP = $baseDeDatos->ObtenerResultado("SELECT `usuario`, `permiso` FROM "
                    . "`permiso_usuario` WHERE usuario = '".$usuarioP."' and "
                    . "permiso = 303");
            if($resultP->num_rows < 1){
                header("Location: PermisoDenegado.php");
            }
        ?>
        <script>
            function getText(element) {
            var textHolder = element.options[element.selectedIndex].text
            document.getElementById("txt_holder").value = textHolder;
            }
            function isNotEmptyLocalStorage(){
                var id = localStorage.getItem("cotDiaInicio");
                if(id == "" || id == null){
                    return false;
                } else {
                    return true;
                }
            }
            
            function localStorageCarga(){
                if(isNotEmptyLocalStorage()){
                    alert("Se recuperó información de la última sesión.");
                    
                    var diaInicio = localStorage.getItem("cotDiaInicio");
                    var mesInicio = localStorage.getItem("cotMesInicio");
                    var anoInicio = localStorage.getItem("cotAnoInicio");
                    var diaTermino = localStorage.getItem("cotDiaTermino");
                    var mesTermino = localStorage.getItem("cotMesTermino");
                    var anoTermino = localStorage.getItem("cotAnoTermino");
                    
                    document.getElementsByName("diaInicio")[0].value = diaInicio;
                    document.getElementsByName("mesInicio")[0].value = mesInicio;
                    document.getElementsByName("anoInicio")[0].value = anoInicio;
                    document.getElementsByName("diaTermino")[0].value = diaTermino;
                    document.getElementsByName("mesTermino")[0].value = mesTermino;
                    document.getElementsByName("anoTermino")[0].value = anoTermino;
                    
                    localStorage.removeItem("cotDiaInicio");
                    localStorage.removeItem("cotMesInicio");
                    localStorage.removeItem("cotAnoInicio");
                    localStorage.removeItem("cotDiaTermino");
                    localStorage.removeItem("cotMesTermino");
                    localStorage.removeItem("cotAnoTermino");
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
                       
                       localStorage.setItem("cotDiaInicio", diaInicio);
                       localStorage.setItem("cotMesInicio", mesInicio);
                       localStorage.setItem("cotAnoInicio", anoInicio);
                       localStorage.setItem("cotDiaTermino", diaTermino);
                       localStorage.setItem("cotMesTermino", mesTermino);
                       localStorage.setItem("cotAnoTermino", anoTermino);
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
            function agregarRadio(){
                $baseDatos = new BaseDeDatos();
                $canal = $_POST['txt_holder'];
                $usuario = $_SESSION['usuario'];
                $diaInicio = $_POST['diaInicio'];
                $mesInicio = $_POST['mesInicio'];
                $anoInicio = $_POST['anoInicio'];
                $fechaInicio = $mesInicio."/".$diaInicio."/".$anoInicio;
                        
                $diaTermino = $_POST['diaTermino'];
                $mesTermino = $_POST['mesTermino'];
                $anoTermino = $_POST['anoTermino'];
                $fechaTermino= $mesTermino."/".$diaTermino."/".$anoTermino;
                
                $query = "INSERT INTO `contrataciontv`(`clv_usuario`, `fecha_inicio`, `fecha_fin`, `canal`) VALUES "
                        . "('".$usuario."',STR_TO_DATE('".$fechaInicio."', '%m/%d/%Y'),STR_TO_DATE('".$fechaTermino."', '%m/%d/%Y'),'".$canal."')" ;

                if(is_numeric($diaInicio) && is_numeric($diaTermino)){
                    $baseDatos->EjecutarQuery($query);
                }
            }
            
            function agregarBitacora(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_SESSION['usuario'];
                $canal = $_POST['txt_holder'];
                $descripcion = 'Contrato el canal '.$canal;
                $query = "INSERT INTO `bitacora` (`clv_usuario`, `descripcion`) VALUES ('".$usuario."','".$descripcion."');";
                $baseDatos->EjecutarQuery($query);    
            }
            
            if(isset($_POST['submit'])){ 
                agregarRadio();
                agregarBitacora();
                echo "<script>window.location = 'VistaVerContrataciones.php'</script>";
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
                    <h2>Contratar Anuncios en Television</h2>
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
                        Canal:
                        <select name="Anuncios" onchange="getText(this)">
                          <option>Selecciones una opcion</option>
                          <?php
                                $baseDatos = new BaseDeDatos();
                                $sql = "Select canal from television";
                                $result = $baseDatos->ObtenerResultado($sql);
                                while($rows = mysqli_fetch_assoc($result)){
                            ?>
                          <option><?php echo $rows['canal']; ?></option>
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

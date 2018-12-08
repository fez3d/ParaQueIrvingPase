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
        <script>
            function getText(element) {
            var textHolder = element.options[element.selectedIndex].text
            document.getElementById("txt_holder").value = textHolder;
            }
        </script>
    </head>
<body>
    <?php
        session_start();
        include("BaseDeDatos.php"); 
            function agregarRadio(){
                $baseDatos = new BaseDeDatos();
                $estacion = $_POST['txt_holder'];
                $usuario = $_SESSION['usuario'];
                $diaInicio = $_POST['diaInicio'];
                $mesInicio = $_POST['mesInicio'];
                $anoInicio = $_POST['anoInicio'];
                $fechaInicio = $mesInicio."/".$diaInicio."/".$anoInicio;
                        
                $diaTermino = $_POST['diaTermino'];
                $mesTermino = $_POST['mesTermino'];
                $anoTermino = $_POST['anoTermino'];
                $fechaTermino= $mesTermino."/".$diaTermino."/".$anoTermino;
                
                $query = "INSERT INTO `contratacionradio`(`clv_usuario`, `estacion`, `fecha_inicio`, `fecha_fin`) VALUES "
                        . "('".$usuario."','".$estacion."',STR_TO_DATE('".$fechaInicio."', '%m/%d/%Y'),STR_TO_DATE('".$fechaTermino."', '%m/%d/%Y'))" ;
                echo $query;
                if(is_numeric($diaInicio) && is_numeric($diaTermino)){
                    $baseDatos->EjecutarQuery($query);
                }
            }
            if(isset($_POST['submit'])){ 
                echo "Agregar radio";
                agregarRadio();
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
    
    <div class="contenedorForm">
        <div class="elementoform">
            <div class="contenedor">
                <div class="elemento">
                    <h2>Contratar Anuncio en Radio</h2>
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
                        Estaciones:
                        <select name="Anuncios" onchange="getText(this)">
                        <option>Selecciones una opcion</option>
                        <?php
                            $baseDatos = new BaseDeDatos();
                            $sql = "Select estacion from radio";
                            $result = $baseDatos->ObtenerResultado($sql);
                            while($rows = mysqli_fetch_assoc($result)){
                        ?>

                        <option><?php echo $rows['estacion']; ?></option>
                        <?php
                            }
                        ?>
                        </select>
                        <input type="hidden" name="txt_holder" id="txt_holder">
                        <br><br>

                        <input type="submit" value="Aceptar" name="submit">
                    </form>   
                </div>
            </div>
        </div>  
    </div>
    

<script src="btnMenuInteraccion.js"></script>
</body>
</html>
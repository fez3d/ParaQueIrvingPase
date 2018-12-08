<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link rel="stylesheet" href="ServiciosStyleSheet.css">
        <link rel="stylesheet" href="SliderStyleSheet.css">
        <link href="CssTablas.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include("BaseDeDatos.php"); 
        session_start();
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
            
            <label for="table"> Bitacora</label>
                <table>
                    <thead>
                        <tr>
                            <th>No. de Accion</th>
                            <th>Usuario</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>                          
                        </tr>
                    </thead>

                    <?php
                        $baseDatos = new BaseDeDatos();
                        $usuario = $_SESSION['usuario'];
                        $sql = "Select * from bitacor;";
                        $result = $baseDatos->ObtenerResultado($sql);
                        while($rows = mysqli_fetch_assoc($result)){
                    ?>     

                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td><?php echo $rows['clv_usuario']; ?></td>
                                <td><?php echo $rows['descripcion']; ?></td>
                                <td><?php echo $rows['fecha']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>

                </table>
    </body>
</html>

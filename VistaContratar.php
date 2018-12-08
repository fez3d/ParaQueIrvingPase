
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include("BaseDeDatos.php"); 
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <!--<link href="NavbarCss.css" rel="stylesheet" type="text/css"/>-->
        <link href="CssTablas.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link rel="stylesheet" href="ServiciosStyleSheet.css">
        <link rel="stylesheet" href="SliderStyleSheet.css">
        <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
        <script>
            function contratarCartelera(){
                window.location.href = 'ContratarEspectaculares.php';
            }
            
            function contratarRadio(){
                window.location.href = 'ContratarRadio.php';
            }
            
            function contratarTv(){
                window.location.href = 'ContratarTelevision.php';
            }
            
            
        </script>
        
        
    </head>
    <body>
        
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


        <div class="contenedor-principal">

            <h2> Bienvenido Usuario: </h2>
            <h3>Aquí puedes ver los servicios disponibles y Contratar alguno</h3>
            <div class="div1">

                <label for="table"> Carteleras</label>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Direccion</th>
                            <th>Titulo</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <?php
                        $baseDatos = new BaseDeDatos();
                        $sql = "Select * from carteleras";
                        $result = $baseDatos->ObtenerResultado($sql);
                        while($rows = mysqli_fetch_assoc($result)){
                    ?>     

                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td><?php echo $rows['direccion']; ?></td>
                                <td><?php echo $rows['nombre']; ?></td>
                                <td><?php echo $rows['precio']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>

                <button onclick="contratarCartelera()">Contratar</button>

            </div>


            <div class="div2">
                <label for="table">Radio</label>
                <table>
                    <thead>
                        <tr>

                            <th>Estacion</th>
                            <th>Titulo</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <?php
                        $baseDatos = new BaseDeDatos();
                        $sql = "Select * from radio";
                        $result = $baseDatos->ObtenerResultado($sql);
                        while($rows = mysqli_fetch_assoc($result)){
                    ?>     

                            <tr>
                                <td><?php echo $rows['estacion']; ?></td>
                                <td><?php echo $rows['nombre']; ?></td>
                                <td><?php echo $rows['precio']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>

                </table>       

                <button onclick="contratarRadio()"> Contratar</button>

            </div>

            <div class="div3">
                <label for="table">Television</label>
                <table>
                    <thead>
                        <tr>

                            <th>Canal</th>
                            <th>Titulo</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <?php
                        $baseDatos = new BaseDeDatos();
                        $sql = "Select * from television";
                        $result = $baseDatos->ObtenerResultado($sql);
                        while($rows = mysqli_fetch_assoc($result)){
                    ?>     

                            <tr>
                                <td><?php echo $rows['canal']; ?></td>
                                <td><?php echo $rows['nombre']; ?></td>
                                <td><?php echo $rows['precio']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>

                </table>       

                <button onclick="contratarTv()"> contratar</button>

            </div>
        </div>
    </body>
</html>

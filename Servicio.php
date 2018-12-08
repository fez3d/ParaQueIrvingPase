<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

<head>

    <meta charset ="UTF-8">
    <title>Servicios </title>
    <link rel="stylesheet" href="HeaderStyleSheet.css">
    <link rel="stylesheet" href="ServiciosStyleSheet.css">
    <link rel="stylesheet" href="SliderStyleSheet.css">
    <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
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
                    session_start();
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
    
    <section class="seccionInicial">
        <div class="container">
            <h2 class="main__title"> Bienvenido a tu página de publicidad</h2>
            <p class="main__txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        </div>  
    </section>
    
    <div class="contenedorServicios">
        <div class="contenedor container ServicioCarteleras">
            <div class="Elemento slider imagenes_Carteleras">
                     <ul class="sliderUl">
                        <li class="sliderLi"> <img src="imagenes/carteleras/imagen4.jpg" alt=""></li>
                        <li class="sliderLi"> <img src="imagenes/carteleras/imagen2.jpg" alt=""></li>
                        <li class="sliderLi"> <img src="imagenes/carteleras/imagen3.jpg" alt=""></li>
                        <li class="sliderLi"> <img src="imagenes/carteleras/imagen1.jpg" alt=""></li>
                    </ul>
            </div>
            <div class="Elemento container lista">
                <h1 class="column__title">Carteleras</h1>
                <UL >
                    <LI>Publicidad permanente</LI>
                    <LI>Exposición en distintas zonas de la ciudad</LI>
                    <LI>Cobertura local</LI>
                    <LI>Responsabilidad en producción e impresión de lonas.</LI>
                </UL>
            </div>    
        </div>

        <div class="contenedor container ServicioTelevision">
            <div class="Elemento slider video_Television">
                <video class = "strech" preload="none" width="500em" poster="imagenes/descarga.jpg" controls>
                    <source src="videos/videoPrueba.mp4" type="video/mp4">
                    <source src="videos/videoPrueba.ogg" type="video/ogg">
                    Tu navegador no es compatible con html5
                </video>
            </div>
            <div class="Elemento lista">
                <h1>Televisión</h1>
                <UL>
                    <LI>Uso de recursos creativos</LI>
                    <LI>Cobertura local</LI>
                    <LI>Lanzamientos de productos o marcas</LI>
                    <LI>Spots de continuidad y valores de marca</LI>
                    <LI>Responsabilidad en producción</LI>
                </UL>
            </div>    
        </div>


        <div class="contenedor container ServicioRadio">
            <div class="Elemento slider audio_Radio">
                <audio controls>
                    <source src="audio/audioRadio.ogg" type="audio/ogg">
                    <source src="audio/audioRadio.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <div class="Elemento lista">
                <h1>Radio</h1>
                <UL >
                    <LI>Uso de recursos creativos</LI>
                    <LI>Cobertura local</LI>
                    <LI>Lanzamientos de productos o marcas</LI>
                    <LI>Disponibilidad de horarios de transmición</LI>
                    <LI>Spots de continuidad y valores de marca</LI>
                    <LI>Responsabilidad en producción</LI>
                </UL>
            </div>    
        </div>


        <div class="contenedor container ServicioAutobuses">
            <div class="Elemento slider imagenes_Autobuses">
                <ul class="sliderUl">
                    <li class="sliderLi"> <img src="imagenes/autobuses/autobus1.jpg" alt=""></li>
                    <li class="sliderLi"> <img src="imagenes/autobuses/autobus2.jpg" alt=""></li>
                    <li class="sliderLi"> <img src="imagenes/autobuses/autobus3.jpg" alt=""></li>
                    <li class="sliderLi"> <img src="imagenes/autobuses/autobus4.jpg" alt=""></li>
                </ul>
            </div>
            <div class="Elemento lista">
                <h1>Autobuses</h1>
                <UL >
                    <LI>Publicidad permanente</LI>
                    <LI>Exposición en distintas zonas de la ciudad</LI>
                    <LI>Carteleras en camiónes</LI>
                    <LI>Cobertura local</LI>
                    <LI>Responsabilidad en producción e impresión de lonas.</LI>
                </UL>
            </div>    
        </div>     
    </div>
    
	<header>
		<div class="wrapper" >
|			<div class ="logo">Publicis </div>

			<nav>
			
				<a href="Inicio.php"> Inicio</a>
				<a href="Nosotros.php"> Nosotros</a>
				<a href="Servicio.php"> Servicios</a>
				<a href="Contacto.php"> Contacto</a>
                                <?php
                                
                                
                                    if($_SESSION['tipo_usuario'] == "administrador"){
                                        echo '<a href="VistaAdministrador.php"> Ver Anuncios</a>';
                                    } else if ($_SESSION['tipo_usuario'] == "cliente"){
                                        echo '<a href="VistaContratar.php"> Contratar</a>';
                                        echo '<a href="VistaVerContrataciones.php"> Ver Mis Contrataciones</a>';
                                    }
                                    
                                    if($_SESSION['inicio'] == null || $_SESSION['inicio'] == false){
                                        echo '<a href="IniciarSesion.php"> Iniciar Sesion</a>';
                                    } else{
                                        echo '<a href="CerrarSesion.php"> Cerrar Sesion</a>';
                                    }
                                ?>

			</nav>
	    </div> 
	</header>

	<footer>
		<p class="Foot" align="center">
                        		The Masters Of Softwae S.A de C.V&nbsp;&nbsp;
                        
                        		Todos los Derechos Reservados
                        	

                        
                    </p>
	</footer>
    
<script src="btnMenuInteraccion.js"></script>
</body>

</html>
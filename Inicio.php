<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
?>
<html lang="en">

<head>

	<meta charset ="UTF-8">
	<title>Inicio</title>
        <meta name="viewport" content="width=device-width,user-scalable=yes, initial-scale=1.0
              maximum-scale=3.0,minimum-scale=1.0">
        <link rel="stylesheet" href="InicioStyleSheet.css">
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
        <script src="jsDaniel.js"></script>
	
</head>
    <body>
        <header class="main-header">	
        <div class="container container--flex">
            <div class ="logo-container column column--50">
                <h1 class="logo">Inicio</h1>
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
    		<div class="social-icon">
    			<a>></a> 			
    		</div>
    	</div>           
    </nav>
    
    <section class="banner">
        &nbsp;
        <img src="imagenes/imagenesInicio/banner.jpg" alt="" class="banner__img">
    	<div class="banner__content">Publicidad al alcance de un click</div>
    </section>
    
        <main class="main">
    	<section class="group group--color">
    		<div class="container">
    			<h2 class="main__title"> Bienvenido a tu página de publicidad</h2>
    			<p class="main__txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    		</div>	
    	</section>

    	<section class="group main__about__description">
    		<div class="container container--flex">
    			<div class="column column--50">
    				<img src="imagenes/imagenesInicio/principal.jpg" alt="" >
    			</div>
    			<div class="column column--50">
    				<h3 class="column__title">Ciudad de Mérida</h3>
    				<p class="column__txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    				<a href="" class="btn btn--contact">Contact</a>
    			</div>		
    		</div>		
    	</section>
        
        <section >
    		<div class="contenedorMapa ">
    			<div class="elementoMapa">
    				<img src="imagenes/imagenesInicio/meridamap.png" alt="" onClick="link(event)">
    			</div>	
    		</div>		
    	</section>

    	<section class="group group--color">
    		<div class="container">
    			<h2 class="main__title"> Bienvenido a tu página de publicidad</h2>
    			<p class="main__txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    		</div>	
    	</section>
        
        <div class="contenedorRegiones">
            <div id="Noroeste" class="contenedor  RegionesCarteleras">
                <div class="Elemento  ">
                            <img src="imagenes/imagenesInicio/NorteMerida.jpg" alt="" class="regiones_ciudad_img"> 
                </div>
                <div class="Elemento region">
                    <h1 class="column__title">Región Noroeste</h1>	
                        <p>Avenida Mérida 2000 No. 557 por Calle 31'-1 y Calle 11-A'-1, Residencial Pensiones, CP. 97217 Mérida, Yuc.
                        <br>$2,000.00 mx al mes.
                        <br>Disponible.</p>

                        <p>Calle 52 No. 300 por Calle 51 y Calle 53, Francisco de Montejo, CP. 97203 Mérida, Yuc.
                        <br>$5,000.00 mx al mes.
                        <br>Disponible.</p>

                        <p>Calle 43A No. 324 esquina con Circuito Colonias, Tanlum, CP. 97210 Mérida, Yuc.
                        <br>$8,000.00 mx al mes.
                        <br>No disponible actualmente.</p>
                </div>    
            </div>
            <div id="Sureste" class="contenedor  RegionesCarteleras">
                <div class="Elemento  ">
                            <img src="imagenes/imagenesInicio/SurMerida.jpg" alt="" class="regiones_ciudad_img">
                </div>
                <div class="Elemento region">
                    <h1 class="column__title">Región Sureste</h1>	
                        <p>Azalea, Calle 7 No. 177, esquina con Calle 9, Residencial San Carlos, CP. 97130 Mérida, Yuc.
                        <br>$7,500.00 mx al mes.
                        <br>No disponible actualmente.</p>

                        <p>Calle No. 19A Diagonal, esquina con Avenida Yucatán, Jardines del Nte. CP. 97139 Mérida, Yuc.
                        <br>$6,000.00 mx al mes.
                        <br>Disponible.</p>

                        <p>Av. Andrés García Lavín, San Ramón Nte I, 97117 Mérida, Yuc.
                        <br>$8,000.00 mx al mes.
                        <br>Disponible.</p>
                </div>    
            </div>
            <div id="Noreste" class="contenedor container RegionesCarteleras">
                <div class="Elemento  ">
                            <img src="imagenes/imagenesInicio/EsteMerida.jpg" alt="" class="regiones_ciudad_img">
                </div>
                <div class="Elemento region">
                    <h1 class="column__title">Región Noreste</h1>	
                        <p>Calle 69 No. 406, Morelos Oriente, 97174 Mérida, Yuc.
                        <br>$7,000.00 mx al mes.
                        <br>Disponible.</p>

                        <p>Calle 42 No. 854 local 7 x 17, Colonia María Luisa, María Luisa, 97199 Mérida, Yuc.
                        <br>$6,000.00 mx al mes.
                        <br>Disponible.</p>

                        <p>Cto Colonias 773, Castilla Cámara, 97278 Mérida, Yuc.
                        <br>$5,000.00 mx al mes.
                        <br>Disponible.</p>
                </div>    
            </div>
            <div id="Suroeste" class="contenedor RegionesCarteleras">
                <div class="Elemento  ">
                            <img src="imagenes/imagenesInicio/OesteMerida.jpg" alt="" class="regiones_ciudad_img">
                </div>
                <div class="Elemento region">
                    <h1 class="column__title">Región Suroeste</h1>	
                        <p>Oxxo Xoclan, 65 A 1000, Xoclán, 97246 Mérida, Yuc.
                        <br>$6,000.00 mx al mes.
                        <br>Disponible.</p>

                        <p>México 261, Cd Industrial, 97288 Mérida, Yuc.
                        <br>$5,000.00 mx al mes.
                        <br>Disponible.</p>

                        <p>Calle 16 No. 446D, El Roble Agrícola I, 97255 Mérida, Yuc.
                        <br>$5,000.00 mx al mes.
                        <br>Disponible.</p>
                </div>    
            </div>
        </div>
       
    </main>

	<script type="text/javascript">
		function link(event){
			/*615 * 599*/
			var posX = event.offsetX;
			var posY = event.offsetY;
			if(posX < 307 && posY < 300){
				document.getElementById("Noroeste").scrollIntoView();
			}else if(posX > 307 && posY < 300){
				document.getElementById("Noreste").scrollIntoView();
			}else if(posX < 307 && posY > 300){
				document.getElementById("Suroeste").scrollIntoView();
			}else if(posX > 307 && posY > 300){
				document.getElementById("Sureste").scrollIntoView();
			}
			//alert(posX + ", " + posY);
		}
	</script>

	<footer>
		<p class="Foot" align="center">
                        		The Masters Of Softwae S.A de C.V&nbsp;&nbsp;
                        
                        		Todos los Derechos Reservados
                        	

                        
                    </p>
	</footer>
<script src="btnMenuInteraccion.js"></script>
</body>

</html>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Contacto</title>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link rel="stylesheet" href="ContactoStyleSheet.css"> 
        <link rel="stylesheet" href="ServiciosStyleSheet.css">
        <link rel="stylesheet" href="SliderStyleSheet.css">
        <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
        <script src="contact-form-validation.js"></script>
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
        
        <div class="row">
            <div class="column">
                <form name="contact-form">
                    Nombre: <br>
                    <input type="text" size="40" name="name">
                    <br><br>
                        
                    Correo: <br>
                    <input name="email" type="text" size="40">
                    <br><br>
                        
                    Asunto: <br>
                    <input type="text" name="subject" size="40">
                    <br><br>
                    
                    Mensaje: <br>
                    <textarea rows="4" cols="60" name="message"></textarea>
                    <br><br>
                        
                    <button type="button" onclick="validateForm()">Enviar!</button>                       
                </form>
                    
                <p id="demo"></p>
            </div>
            <div class="column">
                
                <div id="googleMap" style="width:100%;height:400px;"></div>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkFZJJ4QSmM0qin__AFeEB90SwDNN8oWk&callback=myMap"></script>
            </div>
        </div>
        
        <footer>
		<p class="Foot" align="center">
                        		The Masters Of Softwae S.A de C.V&nbsp;&nbsp;
                        
                        		Todos los Derechos Reservados
                        	

                        
                    </p>
	</footer>
        <script src="btnMenuInteraccion.js"></script>
    </body>
</html>

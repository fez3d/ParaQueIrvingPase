



<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Nosotros</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="HeaderStyleSheet.css">
        <link href="https://file.myfontastic.com/qp8yPnhRsVhXCzhpKiRbnF/icons.css" rel="stylesheet">
        <script src="jsDaniel.js"></script>
        
        
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
        
                                

        <div id=content-text>
            <h1 align="center"> Acerca de Nosotros </h1>
            <div id="imagendiv">
                
                <img src="imagenes/index-1_img-1.jpg" alt=""/>
            </div>
            
            <div id="Acerca" style="float:right" >
                
                
                <h3>Somos una empresa encargada de proporcionar la mejor oportunidad a nuestros clientes para dar a 
                    conocer sus productos, servicios y promociones, a través de la 
                    renta de espectaculares ubicados estratégicamente para lograr 
                    el mayor impacto visual de las personas que transitan en las 
                    avenidas más importantes las 24 horas del día, brindando siempre
                    un servicio óptimo.</h3>
            </div>
            
        
            <div class="Vision">
                <h1> Nuestra Vision</h1>
                <p> El enfoque hacia el cumplimiento de nuestra misión sólo se compara 
                    con la pasión por alcanzar nuestros objetivos estratégicos: 
                </p>
                <ul>
                    <li>Ser el mejor tenedor, socio y operador de largo plazo de nuestros negocios.</li>
                    <li>Aspirar a duplicar el valor del negocio cada 5 años.</li>
                    <li>Ser líderes en nuestros mercados.</li>
                    <li>Ser el mejor empleador y vecino de las comunidades en las que operamos.</li>
                </ul>
            </div>
            <div class="Nosotros">
                <h1> Valores </h1>
                <p>Un colaborador de The Masters of Software genera un gran impacto, siempre busca 
                    trascender, antepone el bien mayor de la organización por encima
                    de sus objetivos profesionales y se destaca por su:
                </p>
                <ul>
                    <li>Integridad y Respeto: genera e inspira confianza con su trabajo y en su persona.</li>
                    <li>Sentido de Responsabilidad: es comprometido. Mide, reconoce y se hace cargo de sus acciones.</li>
                    <li>Sencillez y Actitud de Servicio: se percibe no superior a los demás, siempre está dispuesto a colaborar y servir.</li>
                    <li>Pasión por Aprender: está en búsqueda constante del aprendizaje y de nuevos retos que lo permitan desarrollarse continuamente en un entorno dinámico.</li>
                </ul>
            </div>
            <br>
            <br>
            <br>
        </div>


    </body>
</html>
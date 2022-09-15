<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Etiquetas para que no almacene el cache en el navegador -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- Etiquetas para que no almacene el cache en el navegador -->
    <link rel="preload" href="/public/build/css/app.css" as="style">
    <link rel="stylesheet" href="/public/build/css/app.css">
    <title>Inicio</title>
</head>
<body>
    <?php $auth = isAuthenticated(); ?>
    <div class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php" class="logotipo">
                    <img src="/build/img/logo.svg" alt="image-log">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="image">
                </div>

                <div class="derecha">

                    <img class="dark-mode-button" src="/build/img/dark-mode.svg" alt="dark-mode-image">

                    <nav class="navegacion index">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <a href="<?php echo $auth ? '/admin/index.php' : '/login.php ';?>">Administrar</a>
                        <?php echo $auth ? '<a href="/cerrar-sesion.php">Cerrar Sesion</a>' : ''; ?>
                    </nav>
                </div>
            </div> <!--.barra-->
            <?php
                echo $inicio ? '<h1> las mejores casas junto al lago y mar </h1>' : '';  
            ?>
        </div>
    </div>
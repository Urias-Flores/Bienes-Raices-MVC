<main class="contenedor seccion">
    <h1>Actualizar la propiedad</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include 'formulario.php' ?>
        <input type="submit" class="boton boton-verde" value="Actualizar propiedad">
    </form>
</main>
<main class="contenedor seccion">
    <h1>Crear nuevo(a) vendedor(a)</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/vendedor/crear">
        <?php include __DIR__ . '/formulario.php' ?>
        <input type="submit" class="boton boton-verde" value="Crear vendedor">
    </form>

</main>
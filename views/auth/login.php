<h1>Inicie Sesion</h1>

<main class="contenedor seccion contenido-centrado">
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Ingrese su informacion</legend>
            <label for="Email">Correo electronico</label>
            <input type="email" name="Usuario" placeholder="Correo..." id="Email" >

            <label for="Contrasena">Contrasena</label>
            <input type="password" name="Contrasena" placeholder="Telefono..." id="Contrasena" >
        </fieldset>

        <input type="submit" class="boton boton-verde">
    </form>
</main>
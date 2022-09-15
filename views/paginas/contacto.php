<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if($mensaje > 0): ?>
        <p class="alerta completado">Tu informacion a sido enviada correctamente</p>
    <?php endif; ?>
    <?php if($mensaje < 0): ?>
        <p class="alerta error">Tu informacion no pudo ser enviada</p>
    <?php endif; ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="image">
    </picture>

    <h2>
        Llene el formulario de contacto
    </h2>

    <form class="formulario" action="/contacto" method="post">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="Nombre">Nombre</label>
            <input type="text" placeholder="Nombre..." id="Nombre" name="data[Nombre]" required>

            <label for="Message">Mensaje</label>
            <textarea type="" placeholder="Mensaje..." id="Message" name="data[Mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <label for="options">Compra o venta</label>
            <select id="options" name="data[Tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label for="Price">Precio</label>
            <input type="number" placeholder="Precio..." id="Price" name="data[Precio]" required>
        </fieldset>

        <fieldset>
            <legend>Como desea ser contactado</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono" id="contacto-telefono" name="data[tipoContacto]" required>

                <label for="contactar-email">Correo</label>
                <input type="radio" value="Email" id="contacto-email" name="data[tipoContacto]" required>
            </div>

            <div id="contacto" style="margin-top: 2rem">
                <!-- Espacio para inyeccion de codigo -->
            </div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>
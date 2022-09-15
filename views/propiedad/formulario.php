<fieldset>
    <legend>Informacion general</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="Titulo" placeholder="Titulo" maxlength="45" value="<?php echo scapeHTML($Propiedad->Titulo); ?>">

    <label for="Precio">Precio</label>
    <input type="number" id="Precio" name="Precio" placeholder="precio" value="<?php echo scapeHTML($Propiedad->Precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="Imagen">
    <?php if($Propiedad->Imagen): ?>
        <img src="../../imagenes/<?php echo $Propiedad->Imagen; ?>" alt="image" class="image-small">
    <?php endif; ?>
    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" placeholder="Descripcion" name="Descripcion"><?php echo scapeHTML($Propiedad->Descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="Habitaciones" placeholder="Ejemp. 3" min="1" , max="9" value="<?php echo scapeHTML($Propiedad->Habitaciones); ?>">

    <label for="baños">Baños</label>
    <input type="number" id="baños" name="banos" placeholder="Ejemp. 3" min="1" , max="9" value="<?php echo scapeHTML($Propiedad->banos); ?>">

    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" id="estacionamiento" name="Estacionamiento" placeholder="Ejemp. 3" min="1" , max="9" value="<?php echo scapeHTML($Propiedad->Estacionamiento); ?>">
</fieldset>

<fieldset>
    <legend>Informacion del vendedor</legend>
    <select id="vendedor" name="VendedorID">
        <option value="">-- Seleccione un vendedor --</option>
        <?php foreach ($vendedores as $vendedor) : ?>
            <option value="<?php echo
                            $vendedor->ID; ?>" <?php echo $Propiedad->VendedorID == $vendedor->ID ? "selected" : ''; ?>>
                <?php echo $vendedor->Nombre . " " . $vendedor->Apellido; ?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>
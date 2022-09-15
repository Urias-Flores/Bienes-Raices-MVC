<?php
    $getResult = $_GET['succes'];
    if ($getResult != null) : $message =  getMessage($getResult); ?>
    <?php if ($message) : ?>
        <div class="alerta completado"><?php echo $message; ?></div>
    <?php endif; ?>
<?php endif; ?>
<main class="contenedor seccion">
    <a href="/propiedad/crear" class="boton boton-verde mrg-10">Nueva propiedad</a>
    <a href="/vendedor/crear" class="boton boton-verde">Nuevo vendedor</a>

    <table class="propiedades">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($Propiedades as $Propiedad) : ?>
            <tr>
                <td><?php echo $Propiedad->ID ?></td>
                <td><?php echo $Propiedad->Titulo ?></td>
                <td> <img src="/imagenes/<?php echo $Propiedad->Imagen ?>" alt="errorLoad" class="imagen"> </td>
                <td><?php echo "$" . $Propiedad->Precio ?></td>

                <td>
                    <form method="POST" action="/propiedad/eliminar" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $Propiedad->ID ?>">
                        <input type="hidden" name="type" value="<?php echo 'Propiedad' ?>">
                        <input type="submit" class="boton boton-rojo" name="delete" value="Eliminar">
                    </form>
                    <a href="/propiedad/actualizar?id=<?php echo $Propiedad->ID; ?> " class="boton-amarillo-block">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <table class="propiedades">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre completo</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($Vendedores as $Vendedor) : ?>
            <tr>
                <td><?php echo $Vendedor->ID ?></td>
                <td><?php echo $Vendedor->Nombre . " " . $Vendedor->Apellido ?></td>
                <td><?php echo $Vendedor->Telefono ?></td>

                <td>
                    <form method="POST" class="w-100" action="/vendedor/eliminar">
                        <input type="hidden" name="id" value="<?php echo $Vendedor->ID ?>">
                        <input type="hidden" name="type" value="<?php echo 'Vendedor' ?>">
                        <input type="submit" class="boton boton-rojo" name="delete" value="Eliminar">
                    </form>
                    <a href="/vendedor/actualizar?id=<?php echo $Vendedor->ID; ?> " class="boton-amarillo-block">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>

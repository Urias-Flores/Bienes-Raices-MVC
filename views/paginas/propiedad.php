<main class="contenedor seccion">
    <h1><?php echo $Propiedad->Titulo ?></h1>
    <img loading="lazy" src="imagenes/<?php echo $Propiedad->Imagen ?>" alt="Image">

    <div class="resumen-propiedad">
        <p class="precio"><?php echo "$".$Propiedad->Precio ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img src="build/img/icono_wc.svg" alt="image" loading="lazy">
                <p><?php echo $Propiedad->banos ?></p>
            </li>
            <li>
                <img src="build/img/icono_estacionamiento.svg" alt="image" loading="lazy">
                <p><?php echo $Propiedad->Estacionamiento ?></p>
            </li>
            <li>
                <img src="build/img/icono_dormitorio.svg" alt="image" loading="lazy">
                <p><?php echo $Propiedad->Habitaciones ?></p>
            </li>
        </ul>

        <p><?php echo $Propiedad->Descripcion ?></p>
    </div>
</main>
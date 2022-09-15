<?php 

use App\Propiedad;

$Instance = new Propiedad();
$Propiedades = $Instance->Get(3);

?>

<?php foreach($Propiedades as $Propiedad): ?>
                <div class="anuncio">
                    <img src="imgenes/<?php echo $Propiedad->Imagen ?>" alt="image" loading="lazy">
                    <div class="contenido-anuncio">
                        <h3><?php echo $Propiedad->Titulo ?></h3>
                        <p><?php echo $Propiedad->Descripcion ?></p>
                        <p class="precio"><?php echo "$" . $Propiedad->Precio ?></p>
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

                        <a href="anuncios.html" class="boton-amarillo-block down">Ver Propiedad</a>
                    </div>
                </div>
<?php endforeach; ?>
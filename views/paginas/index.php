<main class="contenedor seccion">
    <?php include 'iconos.php'?>
</main>

<section>
    <div class="seccion contenedor">
        <div class="contenedor-anuncios">
            <?php include 'listado.php'?>
        </div>

        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver todas</a>
        </div>
    </div>
</section>

<section class="imagen-contacto">
    <h3>Encuentra la casa de tus sueños</h3>
    <p>llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="block">
        <h3>Nuestro blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="image" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html"></a>
                <h4>Terraza en el techo de tu casa</h4>
                <p class="informacion-meta">
                    Escrito el <span>20/10/2021</span> escrito por: <span>Admin</span>
                </p>

                <p>
                    consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                    ahorrando dinero.
                </p>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="image" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html"></a>
                <h4>Guia para la decoración de tu hogar</h4>
                <p class="informacion-meta">
                    Escrito el <span>20/10/2021</span> escrito por: <span>Admin</span>
                </p>

                <p>
                    Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores
                    para darle vida a tu espacio.
                </p>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h2>Testimoniales</h2>
        <div class="testimonial">
            <blockquote>
                El personal de comporto de una excelente forma y con muy buena atencion,
                la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>-Mauricio Pineda</p>
        </div>
    </section>
</div>


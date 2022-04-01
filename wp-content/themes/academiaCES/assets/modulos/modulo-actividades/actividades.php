<style>
    <?php include get_template_directory() . '/assets/modulos/modulo-slider/slider.css'; ?>
</style>

<!--Slider-->

<div id="carrusel-reconocimiento" class="container">
    <div class="carusel-page-actividades slider-fluid">

        <?php
        $i = 0;
        $e = 0;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 4; // -1 shows all posts
        $args = array(
            'post_type' => 'actividades',
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);
        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <div class="tarjetas-hotel slidel">
                    <figure class="shadow background-white">
                        <div class="bg-fondo-img" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php echo get_the_excerpt(); ?>');"></div>
                        <figcaption class="p-3">
                            <h5><?php echo get_the_title(); ?></h5>
                            <p><?php echo get_the_excerpt(); ?></p>
                            <a class="boton-reservar" href="<?php the_field('boton_reservar'); ?>">Reservar</a>
                        </caption>
                    </figure>
                </div>

            <?php endwhile; ?>



        <?php else : ?>
            <p class="text-center">Oops!, Lo sentimos, no hay contenido que mostrar</p>
        <?php endif;
        wp_reset_query();
        $wp_query = $temp ?>

        <!--</ol>-->

    </div>
</div>
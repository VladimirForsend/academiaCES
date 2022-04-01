<style>
    <?php include get_template_directory() . '/assets/modulos/modulo-slider/slider.css'; ?>
</style>

<!--Slider-->

<div id="carruselSuperior" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="5000">
    <div class="carousel-inner ajustar-slider">

        <?php
        $i = 0;
        $e = 0;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 1; // -1 shows all posts
        $args = array(
            'post_type' => 'slideshow',
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);
        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <div class="container-fluid carousel-item <?php if ($i == 0) {
                                                                echo "active";
                                                            }; ?>" style="background-color:<?php the_field('color_de_fondo'); ?>">
                    <div class="row">
                        <div class="col-md-5 slider-text-zindex d-flex justify-content-center align-items-center flex-column">
                            <h2 style="visibility: hidden;" class="text-white titulo-carrusel-craed text-center"><?php echo get_the_title(); ?></h2>
                            <p class="parrafo-slider" style="background-color:<?php the_field(' color_de_del_texto'); ?>">
                                <?php
                                $image = get_field('logo_ces');
                                if (!empty($image)) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo get_the_excerpt(); ?>" />

                                <?php endif; ?>
                                <span class="mt-3">
                                    <?php echo get_the_excerpt(); ?>
                                </span>
                                <span class="texto-small">
                                    <?php the_field('parrafo_slider'); ?>
                                </span>
                            </p> 
                            <div class="row contenedor-botones-slider">
                            <a class="boton-negro" href="<?php the_field('link_boton1'); ?>"><?php the_field('texto_boton'); ?></a>
                            <a class="boton-negro" href="<?php the_field('link_boton2'); ?>"><?php the_field('texto_boton2'); ?></a>
                            <a class="boton-negro" href="<?php the_field('link_boton3'); ?>"><?php the_field('texto_boton3'); ?></a>
                        </div>
                        </div>
                        <div class="bg-fondo-img-slider col-md-7 d-flex justify-content-center align-items-center flex-column" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php echo get_the_excerpt(); ?>');"></div>
                       

                        <?php $i++; ?>
                    </div>
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
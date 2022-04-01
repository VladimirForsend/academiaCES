<style>
    <?php include get_template_directory() . '/assets/modulos/modulo-featured/featured.css'; ?>
</style>

<!--Slider-->

<div id="post-recientes" class="container">
<h3 class="titulo-duoc">Lo más reciente Diseño de vestuario</h3>
    <div class="row">

        <?php
        $i = 0;
        $e = 0;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 4; // -1 shows all posts
        $args = array(
            'post_type' => 'post',
            'orderby' => 'rand',
            'order' => 'DESC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'carrera',
                ),
            ),
        );
        $wp_query = new WP_Query($args);
        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <div class="col-12 col-md-3">
                <a  href="<?php echo get_the_permalink(); ?>">
                <figure class="background-white   tarjetas-craed">
                        <div class="bg-fondo-img" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php echo get_the_excerpt(); ?>');"></div>
                        <figcaption class="p-3 caja-texto">
                            <h5 class="font-weight-bold" ><?php echo get_the_title(); ?></h5>
                            webs
                            <p><?php echo get_the_excerpt(); ?></p> 
                            <span class="leer-mas">Leer +</span>
                        </figcaption>
                    </figure>
                    </a>
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
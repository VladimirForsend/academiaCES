<style>
    <?php include get_template_directory() . '/assets/modulos/modulo-slider/slider.css'; ?>
</style>

<!--Slider-->
<div class="accordion" id="accordionExample">
    <div id="ces-que-aprenderas" class="container">
        <h3 class="titulo-academia mt-3 mb-3"><?php the_field('titulos_academia'); ?></h3>
        <div class="que-aprenderas-page-aprenderas row">

            <?php
            $i = 0;
            $e = 0;
            $temp = $wp_query;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $post_per_page = 8; // -1 shows all posts
            $args = array(
                'post_type' => 'aprenderas',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => $post_per_page
            );
            $wp_query = new WP_Query($args);
            if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <div class="accordion-item col-12 col-md-6">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h5><?php echo get_the_title(); ?></h5>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <figure class="row d-flex justify-content-center align-items-center">
                            <div class="bg-fondo-img col-12 col-md-3" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"></div>
                            <figcaption class="p-3 col-12 col-md-9">
                                <h5><?php echo get_the_title(); ?></h5>
                                <p><?php echo get_the_excerpt(); ?></p>

                                </caption>
                        </figure>
                            </div>
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
</div>
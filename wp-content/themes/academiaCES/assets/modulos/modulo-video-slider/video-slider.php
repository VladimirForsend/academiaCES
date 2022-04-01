<style>
    <?php include get_template_directory() . '/assets/modulos/modulo-videoslider/videoslider.css';?>
</style>

<!--videoslider-->

<div id="carruselSuperior" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="5000">
    <div class="carousel-inner ajustar-videoslider">

        <?php
        $i = 0;
        $e = 0;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = -1; // -1 shows all posts
        $args = array(
            'post_type' => 'videoslider',
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);
        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <div class="carousel-item <?php if ($i == 0) {
                                                echo "active";
                                            }; ?>">
                    <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
                    <div class="overlay"></div>

                    <!-- The HTML5 video element that will create the background video on the header -->
                    <video class="video-videoslider-bg" autoplay="autoplay" muted="muted" loop="loop" poster="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
                        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"></video>
                        <source src="<?php the_field('video_para_carrusel_principal'); ?>" type="video/mp4" />
                        <source src="<?php the_field('video_para_carrusel_principal'); ?>" type="video/webm" />
                    </video>

                    <!-- The header content -->
                    <div class="title-carusel">
                        <div class="d-flex h-100 text-center align-items-center">
                            <div class="w-100 text-white">
                                <h1 class="display-3"><?php the_field('texto_video');?></h1>
                            </div>
                        </div>
                    </div>
                    </header>

                    <?php $i++; ?>
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
<style>
	<?php include get_template_directory() . '/assets/modulos/modulo-featured/featured.css'; ?>
</style>
<script>
    <?php include get_template_directory() . '/assets/modulos/modulo-featured/contador.js'; ?>
</script>
<!--Slider-->

<div id="post-recientes" class="container-fluid bg-casa bg-white">
	<div class="container">

		<h3 class="titulo-academia mt-3 mb-3"><?php the_field('titulos_academia_uno'); ?></h3>
		<div class="row">

			<?php
			$i = 0;
			$e = 0;
			$temp = $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$post_per_page = 15; // -1 shows all posts
			$args = array(
				'post_type' => 'lp_course',
				'orderby' => 'rand',
				'order' => 'DESC',
				'paged' => $paged,
				'posts_per_page' => $post_per_page,
				'tax_query' => array(
					array(
						'taxonomy' => 'course_category',
						'field'    => 'slug',
						'terms'    => 'destacados',
					),
				),
			);
			$wp_query = new WP_Query($args);
			if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<li class="course-item <?php echo implode( ' ', $course_item->get_class_v2( $course_id, $section_item['ID'], $can_view_item ) ); ?>" data-id="<?php echo esc_attr( $section_item['ID'] ); ?>">
	<a class="section-item-link" href="<?php echo $course_item->get_permalink(); ?>">
		<span class="item-name"><?php echo esc_html( $section_item['post_title'] ); ?></span>

		<div class="course-item-meta">
			<?php do_action( 'learn-press/course-section-item/before-' . $course_item->get_item_type() . '-meta', $course_item ); ?>

			<?php if ( $course_item->is_preview() ) : ?>
				<span class="item-meta course-item-preview" data-preview="<?php esc_attr_e( 'Preview', 'learnpress' ); ?>"></span>
			<?php endif; ?>

			<span class="item-meta course-item-status" title="<?php echo esc_attr( $course_item->get_status_title() ); ?>"></span>

			<?php do_action( 'learn-press/course-section-item/after-' . $course_item->get_item_type() . '-meta', $course_item ); ?>
		</div>
	</a>
</li>
					<div class="col-12 col-md-3">
						
						<figure class="background-white tarjetas-craed hover card">
							<div class="bg-fondo-img" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>')">
								<?php $terms = get_terms('course_category');
								echo '<ul class="tag-tarjeta">';
								foreach ($terms as $term) {

									// The $term is an object, so we don't need to specify the $taxonomy.
									$term_link = get_term_link($term);

									// If there was an error, continue to the next term.
									if (is_wp_error($term_link)) {
										continue;
									}

									// We successfully got a link. Print it out.
									echo '<li><a href="' . esc_url($term_link) . '">' . $term->name . '</a></li>, ';
								}
								echo '</ul>'; ?>

							</div>
							<figcaption class="p-2 caja-texto">
								<!-- contador 
						<div class="tiempo">
							<div id="hiddendate" class="d-none"><?php the_field('contador_fecha'); ?></div>
							<div id="demo"></div>
						</div>
					contador -->
								<h5 class="font-weight-bold titulo-loop-tarjetas"><?php echo get_the_title(); ?></h5>


								<a class="autor-curso d-none" href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a>
								<p class="mt-3 caja-parrafo-tarjeta"><?php echo get_the_excerpt(); ?></p>
								<a class="boton-amarillo" href="<?php echo get_the_permalink(); ?>"> Ir al curso</a>
							</figcaption>


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
</div>
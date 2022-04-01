<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package craed_duoc_uc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card col-12 col-md-9'); ?>>
	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>

		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'craed-duoc-uc'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'craed-duoc-uc'),
				'after'  => '</div>',
			)
		);
		?>
	
	</div><!-- .entry-content -->

  <!---compartir botones-->
  <div class="share-buttons sticky-top">
            <div class="botones-share boton-uno">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook"></i></a>
            </div>
            <div class="botones-share boton-dos">
                <a href="http://twitter.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>&via=basepublica&count=horizontal" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
            
            <div class="botones-share boton-tres">
                <a href="https://www.linkedin.com/cws/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
            
            <div class="botones-share boton-cuatro">
                <a href="https://www.youtube.com/c/DisenoDuocUC" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
            
            <div class="botones-share boton-cinco">
                <a href="https://www.instagram.com/disenoduocuc/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>

            
        </div>
        <!---compartir botones-->

	<footer class="entry-footer">
<?php



// If comments are open or we have at least one comment, load up the comment template.
if (comments_open() || get_comments_number()) :
	comments_template();
endif;
?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<aside class="col-12 col-md-3">

	<div class="card background-white col-12 info-autor">


		<p>		
		<span class="autores-publicacion">

		<?php 
			
			if ( function_exists( 'coauthors_posts_links' ) ) {
				coauthors_posts_links();
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			} else {
				the_author_posts_link();
			}
			;?></span>

<?php
                $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                ?>

                <h2> <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?> </h2>
		</p>

	
		<p><strong>Fecha:</strong>
		<span><?php the_date('F j, Y'); ?> a las <?php the_time('g:i a'); ?></span>
	</p>
		<p><strong>Carrera/s:</strong>
		<span><?php craed_duoc_uc_entry_footer(); ?></span></p>

		<p><strong>Línea Escuela:</strong>
		<span><?php the_field('linea-escuela'); ?></span></p>

		<p><strong>Áreas de Desempeño:</strong>
		<span><?php the_field('areas_de_desempeno'); ?></span></p>

		<p><strong>Certificación:</strong>
		<span><?php the_field('certificacion'); ?></span></p>

		<p><strong>Asignatura:</strong>
		<span><?php the_field('asignatura'); ?></span></p>

		<p><strong>Etiquetas:</strong>
		<span>	<?php $post_tags = get_the_tags();
	if ( ! empty( $post_tags ) ) {
    foreach( $post_tags as $post_tag ) {
        echo '<a href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name . '</a>, ';
    };
}   ;?>
 </span></p>

	


		<?php
		if (is_active_sidebar('interior_sidebar')) :
			dynamic_sidebar('interior_sidebar');
		endif; 
?>



	</div>
</aside>
<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package craed_duoc_uc
 */

get_header();
?>

<main id="primary" class="site-main container">
	<div class="row background-white mx-auto">
	

			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content-single', get_post_type());
 

			endwhile; // End of the loop.
			?>


		
	</div>
</main><!-- #main -->
<?php get_footer(); ?>
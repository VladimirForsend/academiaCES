<?php
/**
 * Template name: login CES
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package craed_duoc_uc
 */

if ( is_front_page() ) :
    get_header( 'front' );
else :
    get_header();
endif;?>
   <?php include get_template_directory() . '/assets/modulos/modulo-slider/slider.php'; ?>
	<main id="primary" class="site-main hola-chao">
		<?php

		?>

	</main><!-- #main -->

<?php

get_footer();
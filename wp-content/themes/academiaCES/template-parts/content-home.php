<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package craed_duoc_uc
 */

?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<!-- seccion modulo de featured -->
<?php include get_template_directory() . '/assets/modulos/modulo-featured/featured-base.php'; ?>
<!-- seccion modulo de featured -->
<!-- seccion modulo aprender -->
<?php include get_template_directory() . '/assets/modulos/modulo-aprender/aprenderas.php'; ?>
<!-- seccion modulo aprender -->

</article><!-- #post-<?php the_ID(); ?> -->

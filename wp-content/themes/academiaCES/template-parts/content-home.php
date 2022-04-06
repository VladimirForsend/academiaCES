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
<!-- seccion modulo de featured uno-->
<?php include get_template_directory() . '/assets/modulos/modulo-featured/featured-category-uno.php'; ?>
<!-- seccion modulo de featured uno-->
  
<!-- seccion banner 1-->
<div class="container">
<?php 
$image = get_field('banner_1_home');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
</div>
<!-- seccion banner 1-->

<!-- seccion modulo de featured dos-->
<?php include get_template_directory() . '/assets/modulos/modulo-featured/featured-category-dos.php'; ?>
<!-- seccion modulo de featured dos-->

<!-- seccion banner 2-->
<div class="container">
<?php 
$image = get_field('banner_2_home');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
</div>
<!-- seccion banner 2-->

</article><!-- #post-<?php the_ID(); ?> -->

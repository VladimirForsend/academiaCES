<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package craed_duoc_uc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-6 col-md-4'); ?>>
	<div class="card tarjetas-craed">
		<header class="card-body">
			<?php craed_duoc_uc_post_thumbnail(); ?>
			<h4 class="card-title"><?php the_title(); ?></h4>
		</header><!-- .entry-header -->
		<span class="leer-mas">Leer +</span>


	</div>
</article><!-- #post-<?php the_ID(); ?> -->
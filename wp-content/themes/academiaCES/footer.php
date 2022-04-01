<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package craed_duoc_uc
 */

?>

<footer id="colophon" class="site-footer background-black">
	<div class="container d-flex background-black flex-column flex-lg-row flex-wrap">
		<!--Columna contactanos-->
		<div class="col col-12 col-lg-4">


			<?php
			if (is_active_sidebar('columna_1')) :
				dynamic_sidebar('columna_1');
			endif;
			?>


		</div>
		<!--Columna contactanos-->
		<!--columna oferta--->
		<div class="col col-12 col-lg-4">
			<div class="col col-12 mb-0">
				<?php
				if (is_active_sidebar('columna_2')) :
					dynamic_sidebar('columna_2');
				endif;
				?>
			</div>

			<!-- Columna Enlaces de interés -->
			<div class="col col-12 mb-0">
				<?php
				if (is_active_sidebar('columna_2_2')) :
					dynamic_sidebar('columna_2_2');
				endif;
				?>
			</div>

		</div>
		<!-- / Columna Enlaces de interés -->

		<!--columna oferta--->

		<!---columna nosotros---->
		<div class="col col-12 col-lg-4">
			<?php
			if (is_active_sidebar('columna_3')) :
				dynamic_sidebar('columna_3');
			endif;
			?>
		</div>
		<hr class="w-100">
		<!--pie final-->
		<div class="col-12 d-flex justify-content-between mt-5">
			<figure class="logo-footer duoc col-lg-2 row">
				<?php
				if (is_active_sidebar('logo_footer')) :
					dynamic_sidebar('logo_footer');
				endif;
				?>

			</figure>
			<figure class="logo-footer acreditacion col-lg-3 row">
			<?php
				if (is_active_sidebar('logo_footer_dos')) :
					dynamic_sidebar('logo_footer_dos');
				endif;
				?> 

			</figure>
		</div>
	</div>
	<!---columna nosotros--->


	</div><!-- .site-info -->
</footer><!-- #colophon -->




</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>


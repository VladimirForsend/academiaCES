<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package craed_academia-ces_uc
 */

?> 
 
<footer id="colophon" class="site-footer background-black mt-3">
	<div class="container d-flex background-black flex-column flex-lg-row flex-wrap">
	<!--pie final-->
	
		<div class="col-12 d-flex justify-content-between mt-3">
			<figure class="logo-footer academia-ces col-lg-2 row">
				<?php
				if (is_active_sidebar('logo_footer')) :
					dynamic_sidebar('logo_footer');
				endif;
				?>

			</figure>
			
		</div>	
		<hr class="w-100">
	<!--Columna areas-->
		<div class="col col-12 col-lg-3">


			<?php
			if (is_active_sidebar('columna_1')) :
				dynamic_sidebar('columna_1');
			endif;
			?>


		</div>
		<!--Columna areas-->
		<!--columna Categaría--->
		<div class="col col-12 col-lg-3">
			<div class="col col-12 mb-0">
				<?php
				if (is_active_sidebar('columna_2')) :
					dynamic_sidebar('columna_2');
				endif;
				?>
			</div>
		</div>
		<!--columna Categaría--->

		<!-- Columna Próximos cursos-->
		<div class="col col-12 col-lg-3">
			<div class="col col-12 mb-0">
				<?php
				if (is_active_sidebar('columna_2_2')) :
					dynamic_sidebar('columna_2_2');
				endif;
				?>
			</div>
		</div>
		<!-- Columna Próximos cursos-->



		<!--columna Mis cursos--->

		<div class="col col-12 col-lg-3">
			<?php
			if (is_active_sidebar('columna_3')) :
				dynamic_sidebar('columna_3');
			endif;
			?>
		</div>
		<!--columna Mis cursos--->


	</div>
	<!---columna nosotros--->


	</div><!-- .site-info -->
</footer><!-- #colophon -->




</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
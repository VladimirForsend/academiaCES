<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package calendario
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ecommerce-para-chile'); ?></a>

		<header id="masthead" class="site-header background-black color-white">

			<div class="container">

				<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark d-none d-lg-flex">
					<div class="navbar-brand">
						<?php
						the_custom_logo();
						if (is_front_page() && is_home()) :
						?>
							<h1 class="site-title d-none"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php
						else :
						?>
							<p class="site-title d-none"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
						<?php
						endif;
						$description = get_bloginfo('description', 'display');
						if ($description || is_customize_preview()) :
						?>
							<p class="site-description d-none"><?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																?></p>
						<?php endif; ?>
					</div><!-- .navbar-brand -->


					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse container-fluid" id="navbarSupportedContent">

						<div class="row justify-content-between align-items-center wt-full no-gutters">


							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'	 => 'navbar-nav d-flex justify-content-around align-items-center parrafo-sm color-light',
									'container_class' => 'col-12 col-lg-3',
								)
							);
							?>

						</div>

					</div>

				</nav><!-- #site-navigation -->

				<?php include get_template_directory() . '/assets/templates/navs/nav-mobile.php'; ?>

			</div>

		</header><!-- #masthead -->

	</div>
<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light d-flex d-sm-none nav-mobile">

    <div class="container">
        <div class="row no-gutters w-100">
            <div class="navbar-brand col-3">

                <?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
                else :
                ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;
                $fundaciones_description = get_bloginfo('description', 'display');
                if ($fundaciones_description || is_customize_preview()) :
                ?>
                    <p class="site-description"><?php echo $fundaciones_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                ?></p>
                <?php endif; ?>
            </div><!-- .navbar-brand -->

            <div class="col-12 col-md-12 d-flex justify-content-center align-items-center mini-carrito offset-1"></div>

            <button class="navbar-toggler boton-mobile offset-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
       
            <div id="navbar" class="navbar-nav col-12 m-0 flex-lg-column">

                <div class="busqueda nav-item col-md-12">
                    <?php if (function_exists('aws_get_search_form')) {
                        aws_get_search_form();
                    } ?>

                </div>



            </div>
          
        </div>
    </div>
    <div class="collapse navbar-collapse flex-md-row no-gutters" id="navbarSupportedContent">

        <div class="col-md-2 d-flex justify-content-center align-items-center">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-mobile',
                'menu_id'        => 'navbar',
                'menu_class' => 'navbar-nav m-0',
            )); ?>

        </div>









</nav><!-- #site-navigation -->
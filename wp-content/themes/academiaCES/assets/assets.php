<?php


/*titan styles*/
add_post_type_support('page', 'excerpt');



// Desactiva el editor de bloques en la gestión de widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

function titan_framework()
{
    wp_register_style('fuentes', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', 'all');
    wp_enqueue_style('iconos', get_template_directory_uri() . '/assets/librerias/fafa/css/all.css', 'all');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/librerias/css/bootstrap.css', 'all');
    wp_enqueue_style('root', get_template_directory_uri() . '/assets/librerias/css/root.css', 'all');
    wp_enqueue_style('base', get_template_directory_uri() . '/assets/librerias/css/base.css', 'all');
    wp_enqueue_style('academia', get_template_directory_uri() . '/assets/librerias/css/academia.css', 'all');
    wp_enqueue_style('slider-fluid', get_template_directory_uri() . '/assets/librerias/css/slider-fluid.css', 'all');
    wp_enqueue_style('mobile', get_template_directory_uri() . '/assets/librerias/css/mobile.css', 'all');

   


    

    
    wp_enqueue_style('iconos');
    wp_enqueue_style('fuentes');
    wp_enqueue_style('root');
    wp_enqueue_style('base');
    wp_enqueue_style('academia');
    wp_enqueue_style('mobile');
    wp_enqueue_style('bootstrap');


}


add_action('wp_enqueue_scripts', 'titan_framework');


/*titan styles*/




/*titan scripts*/

function titans_script()
{
    // nos aseguramos que no estamos en el area de administracion
    if (!is_admin()) {
        // registramos nuestro script con el nombre "mi-script" y decimos que es dependiente de jQuery para que wordpress se asegure de incluir jQuery antes de este archivo
        // en adicion a las dependencias podemos indicar que este aarchivo debe ser insertado en el footer del sitio, en el lugar donde se encuente la funcion wp_footer

        // Register the script like this for a theme:




        wp_register_script('bootstrap-js', get_bloginfo('template_directory') . '/assets/librerias/js/bootstrap.js', array('jquery'), '1', true);
        //wp_register_script('bootstrap-bundle-js', get_bloginfo('template_directory') .'/titan/js/bootstrap.bundle.js', array('jquery'), '1', true);
        wp_register_script('slider-logos', get_bloginfo('template_directory') . '/assets/librerias/js/slick.js', array('jquery'), '1', true);
        wp_register_script('parallax', get_bloginfo('template_directory') . '/assets/librerias/js/parallax.js', array('jquery'), '1', false);
        wp_register_script('popover', get_bloginfo('template_directory') . '/assets/librerias/js/popper.min.js', array('jquery'), '2', true);
        wp_register_script('titanes-js', get_bloginfo('template_directory') . '/assets/librerias/js/titanes.js', array('jquery'), '1', true);

        /*encolamos los JS*/
        wp_enqueue_script('titanes-js', array('jquery'), true);
        wp_enqueue_script('popover', array('jquery'), true);
        wp_enqueue_script('bootstrap-js', array('jquery'), true);

        wp_enqueue_script('parallax');
        wp_enqueue_script('slider-logos');
    }
}
add_action("wp_enqueue_scripts", "titans_script", 1);




/*titan scripts*/

/*sub menu*/
function change_submenu_class($menu)
{
    $menu = preg_replace('/class="sub-menu"/', '/ class="nav-item dropdown" /', $menu);
    return $menu;
}
add_filter('wp_nav_menu', 'change_submenu_class');

/*sub menu*/


/*menu superior*/


if (!function_exists('menu_superior')) {

    // Register Navigation Menus
    function menu_superior()
    {

        $locations = array(
            'menu-superior' => __('menu-superior', 'menu-superior'),
        );
        register_nav_menus($locations);
    }
    add_action('init', 'menu_superior');
}

/*clases para li item */
function atg_menu_classes($classes, $item, $args)
{
    if ($args->theme_location == 'menu-superior') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);
/*clases para li item */

/*menu superior*/

/*menu categorias*/
// Register Navigation Menus
function menu_categoria()
{

    $locations = array(
        'menu-categoria' => __('menu-categoria', 'menu-categoria'),
    );
    register_nav_menus($locations);
}
add_action('init', 'menu_categoria');
/*menu categorias*/

/*menu RRSS*/
// Register Navigation Menus
function menu_rrss()
{

    $locations = array(
        'menu-rrss' => __('menu-rrss', 'menu-rrss'),
    );
    register_nav_menus($locations);
}
add_action('init', 'menu_rrss');
/*menu RRSS*/


/*menu mobile*/
// Register Navigation Menus
function menu_mobile()
{

    $locations = array(
        'menu-mobile' => __('menu-mobile', 'menu-mobile'),
    );
    register_nav_menus($locations);
}
add_action('init', 'menu_mobile');
/*menu mobile*/

/*menu footer*/
// Register Navigation Menus
function menu_footer()
{

    $locations = array(
        'menu-footer' => __('menu-footer', 'menu-footer'),
    );
    register_nav_menus($locations);
}
add_action('init', 'menu_footer');
/*menu footer*/

/*zona de widgets*/
function widget_menu_footer()
{  
    register_sidebar(array('name' => 'Información de la publicación', 'id' => 'interior_sidebar', 'before_widget' => '<div id="%1$S" class="interior-sidebar">', 'after_widget' => '</div>', 'before_title' => '<h5 class="titulo-interior-sidebar">', 'after_title' => '</h5>'));

//footer

register_sidebar(array('name' => 'areas', 'id' => 'columna_1', 'before_widget' => '<div id="%1$S" class="widget_academia_footer">', 'after_widget' => '</div>', 'before_title' => '<div class="heading"><h3 class="titulo-menu-footer">', 'after_title' => '</h3></div>'));
register_sidebar(array('name' => 'categoría', 'id' => 'columna_2', 'before_widget' => '<div id="%1$S" class="widget_academia_footer">', 'after_widget' => '</div>', 'before_title' => '<div class="heading"><h3 class="titulo-menu-footer">', 'after_title' => '</h3></div>'));
register_sidebar(array('name' => 'Próximos cursos', 'id' => 'columna_2_2', 'before_widget' => '<div id="%1$S" class="widget_academia_footer">', 'after_widget' => '</div>', 'before_title' => '<div class="heading"><h3 class="titulo-menu-footer">', 'after_title' => '</h3></div>'));
register_sidebar(array('name' => 'Mis cursos', 'id' => 'columna_3', 'before_widget' => '<div id="%1$S" class="widget_academia_footer">', 'after_widget' => '</div>', 'before_title' => '<div class="heading"><h3 class="titulo-menu-footer">', 'after_title' => '</h3></div>'));
register_sidebar(array('name' => 'Logo academia', 'id' => 'logo_footer', 'before_widget' => '<div id="%1$S" class="widget_academia_footer">', 'after_widget' => '</div>', 'before_title' => '<div class="heading"><h3 class="titulo-menu-footer">', 'after_title' => '</h3></div>'));
}

add_action('widgets_init', 'widget_menu_footer');
/*zona de widgets*/


/*extracto*/
function get_excerpt(){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 10);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'... <a href="'.get_the_permalink().'">Leer +</a>';
    return $excerpt;
    }


    function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


    function excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
          array_pop($excerpt);
          $excerpt = implode(" ",$excerpt).'...';
        } else {
          $excerpt = implode(" ",$excerpt);
        }	
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        return $excerpt;
      }
       
      function content($limit) {
        $content = explode(' ', get_the_content(), $limit);
        if (count($content)>=$limit) {
          array_pop($content);
          $content = implode(" ",$content).'...';
        } else {
          $content = implode(" ",$content);
        }	
        $content = preg_replace('/[.+]/','', $content);
        $content = apply_filters('the_content', $content); 
        $content = str_replace(']]>', ']]>', $content);
        return $content;
      }

//Register tag cloud filter 
add_filter('widget_tag_cloud_args', 'tag_widget_limit');

//Limit number of tags inside widget
function tag_widget_limit($args){

 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 22; //Limit number of tags 
 }

 return $args;
}

//modulo-Slider. 
include get_template_directory() . '/assets/modulos/modulo-slider/core-slider.php';
//modulo-aprender. 
include get_template_directory() . '/assets/modulos/modulo-aprender/core-aprenderas.php';

/* fix new funcionality marcos abarza
// Redirect users who arent logged in...
function members_only() {
    global $pagenow;
    // Check to see if user in not logged in and not on the login page
    if( !is_user_logged_in() && $pagenow != 'wp-login.php' )
          auth_redirect();
}
add_action( 'wp', 'members_only' );
*/

//formulario de login
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
  background-image: url('http://desarrollo-agencia.cl/elearning/wp-content/uploads/2022/02/logo-ces.png');
  height: 65px;
  width: 320px;
  background-size: auto 100%;
  background-repeat: no-repeat;
  padding-bottom: 30px;
}
        body.login{
        background-color: #000;  
background-size: cover;  
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


/*add_filter('auth_cookie_expiration', 'my_expiration_filter', 99, 3);
function my_expiration_filter($seconds, $user_id, $remember){

    //if "remember me" is checked;
    if ( $remember ) {
        //WP defaults to 2 weeks;
        $expiration = 14*24*60*60; //UPDATE HERE;
    } else {
        //WP defaults to 48 hrs/2 days;
        $expiration = 2*24*60*60; //UPDATE HERE;
    }

    //http://en.wikipedia.org/wiki/Year_2038_problem
    if ( PHP_INT_MAX - time() < $expiration ) {
        //Fix to a little bit earlier!
        $expiration =  PHP_INT_MAX - time() - 5;
    }

    return $expiration;
}

*/
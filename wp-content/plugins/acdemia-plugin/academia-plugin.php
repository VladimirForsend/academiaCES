<?php 
/*
Plugin Name: academia panel administrativo
Description: Plugin creado para reporteria del sitio web academiaces.cl 
Author:Marcos abarza Godoy
Contact :marcos@forsend.cl
*/


// Include mfp-functions.php, use require_once to stop the script if academia-plugin.php is not found
require_once plugin_dir_path(__FILE__) . 'academia-plugin.php';



// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'academia_Add_My_Admin_Link' );
 
// Add a new top level menu link to the ACP
function academia_Add_My_Admin_Link()
{
    add_menu_page(
        'Reporteria', // Title of the page
        'Reporteria', // Text to show on the menu link
        'administrator',
        plugin_dir_path(__FILE__) . '/academia-page-reporteria.php',
        null,
        plugin_dir_url(__FILE__) . 'img/ces.png',
        20
    );  
    /*
    add_submenu_page( 
        plugin_dir_path(__FILE__) . '/academia-page-plugin.php',
        'reporteria', //titulo de pagina
        'reporteria', // nombre del submenu
        'administrator', //permisos   
        plugin_dir_path(__FILE__) . '/academia-page-reporteria.php' // The 'slug' - file to display when clicking the link    
    ); 
    */
}

add_action('admin_init', 'call_assets'); 
function call_assets() { 
   
        wp_register_style('academia_admin_css', plugins_url("/css/main.css",__FILE__ ));
        wp_enqueue_style('academia_admin_css'); 
   
    global $wpdb;  
    
    wp_register_script( 'academia_admin_scripts_js', plugins_url('/js/main.js',__FILE__ ));
    wp_enqueue_script('academia_admin_scripts_js');
 
}


include_once( get_stylesheet_directory() .'/modulos-forsend/forsend-function/custom-function.php');

?>
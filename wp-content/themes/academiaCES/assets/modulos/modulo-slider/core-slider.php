<?php  /*  slider home */


function slideshow_register() {

    $labels = array(
        'name' => _x('Slider del Home', 'post type general name'),
        'singular_name' => _x('Slider', 'post type singular name'),
        'add_new' => _x('Agregar nuevo', 'slideshow item'),
        'add_new_item' => __('Agregar nuevo banner'),
        'edit_item' => __('Editar banner de Slider'),
        'new_item' => __('Nuevo banner de Slider'),
        'view_item' => __('Ver el banner de Slider'),
        'search_items' => __('Buscar Slider'),
        'not_found' =>  __('No se encontro'),
        'not_found_in_trash' => __('No se encontro en la basura'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon'  => 'dashicons-leftright',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title','author', 'thumbnail', 'excerpt', 'comments' ),
        'rewrite' => array('slug' => 'slideshow', 'with_front' => FALSE)
      ); 

    register_post_type( 'slideshow' , $args );
}

add_action('init', 'slideshow_register');
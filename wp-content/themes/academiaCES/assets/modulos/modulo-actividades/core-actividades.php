<?php  /*  slider home */


function actividades_register() {

    $labels = array(
        'name' => _x('Actividades', 'post type general name'),
        'singular_name' => _x('Actividades', 'post type singular name'),
        'add_new' => _x('Agregar nuevo', 'actividades item'),
        'add_new_item' => __('Agregar nuevo Actividades'),
        'edit_item' => __('Editar Actividades'),
        'new_item' => __('Nuevo Actividades'),
        'view_item' => __('Ver el Actividades'),
        'search_items' => __('Buscar Actividades'),
        'not_found' =>  __('No se encontro actividades'),
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
        'menu_icon'  => 'dashicons-games',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'actividades', 'with_front' => FALSE)
      ); 

    register_post_type( 'actividades' , $args );
}

add_action('init', 'actividades_register');
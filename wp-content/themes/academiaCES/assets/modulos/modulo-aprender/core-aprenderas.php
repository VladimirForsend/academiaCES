<?php  /*  slider home */


function Aprenderas_register() {

    $labels = array(
        'name' => _x('Aprenderas', 'post type general name'),
        'singular_name' => _x('Aprenderas', 'post type singular name'),
        'add_new' => _x('Agregar nuevo', 'Aprenderas item'),
        'add_new_item' => __('Agregar nuevo Aprenderas'),
        'edit_item' => __('Editar Aprenderas'),
        'new_item' => __('Nuevo Aprenderas'),
        'view_item' => __('Ver el Aprenderas'),
        'search_items' => __('Buscar Aprenderas'),
        'not_found' =>  __('No se encontro Aprenderas'),
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
        'rewrite' => array('slug' => 'Aprenderas', 'with_front' => FALSE)
      ); 

    register_post_type( 'Aprenderas' , $args );
}

add_action('init', 'Aprenderas_register');
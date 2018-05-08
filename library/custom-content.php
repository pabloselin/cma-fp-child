<?php
/**
 * Custom Post Type Eventos
 *
 * @return void
 * @package cmschild
 */
function cms_agenda() {

	$labels = array(
		'name'                  => _x( 'Eventos', 'Post Type General Name', 'cmschild' ),
		'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'cmschild' ),
		'menu_name'             => __( 'Eventos', 'cmschild' ),
		'name_admin_bar'        => __( 'Eventos', 'cmschild' ),
		'archives'              => __( 'Archivos de eventos', 'cmschild' ),
		'attributes'            => __( 'Características del Item', 'cmschild' ),
		'parent_item_colon'     => __( 'Item superior', 'cmschild' ),
		'all_items'             => __( 'Todos los items', 'cmschild' ),
		'add_new_item'          => __( 'Añadir nuevo item', 'cmschild' ),
		'add_new'               => __( 'Añadir nuevo', 'cmschild' ),
		'new_item'              => __( 'Añadir nuevo item', 'cmschild' ),
		'edit_item'             => __( 'Editar item', 'cmschild' ),
		'update_item'           => __( 'Actualizar item', 'cmschild' ),
		'view_item'             => __( 'Ver item', 'cmschild' ),
		'view_items'            => __( 'Ver items', 'cmschild' ),
		'search_items'          => __( 'Buscar items', 'cmschild' ),
		'not_found'             => __( 'No encontrado', 'cmschild' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'cmschild' ),
		'featured_image'        => __( 'Imagen destacada', 'cmschild' ),
		'set_featured_image'    => __( 'Fijar imagen destacada', 'cmschild' ),
		'remove_featured_image' => __( 'Quitar imagen destacada', 'cmschild' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'cmschild' ),
		'insert_into_item'      => __( 'Insertar en item', 'cmschild' ),
		'uploaded_to_this_item' => __( 'Subido a este item', 'cmschild' ),
		'items_list'            => __( 'Lista de items', 'cmschild' ),
		'items_list_navigation' => __( 'Navegación de lista de items', 'cmschild' ),
		'filter_items_list'     => __( 'Filtrar lista de items', 'cmschild' ),
	);
	$rewrite = array(
		'slug'                  => 'eventos',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Evento', 'cmschild' ),
		'description'           => __( 'Eventos', 'cmschild' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'cms_agenda', $args );

}
add_action( 'init', 'cms_agenda', 0 );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Áreas.
	 */

	$labels = array(
		"name" => __( 'Áreas', '' ),
		"singular_name" => __( 'área', '' ),
	);

	$args = array(
		"label" => __( 'Áreas', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Áreas",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'areas', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "areas", array( "post", "page", "attachment", "cms_agenda" ), $args );

	/**
	 * Taxonomy: Comunidad.
	 */

	$labels = array(
		"name" => __( 'Comunidad', '' ),
		"singular_name" => __( 'Comunidad', '' ),
	);

	$args = array(
		"label" => __( 'Comunidad', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Comunidad",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'comunidad', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "comunidad", array( "post", "page", "attachment", "cms_agenda" ), $args );

	/**
	 * Taxonomy: Nivel.
	 */

	$labels = array(
		"name" => __( 'Nivel', '' ),
		"singular_name" => __( 'Nivel', '' ),
	);

	$args = array(
		"label" => __( 'Nivel', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Nivel",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'nivel', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "nivel", array( "post", "page", "attachment", "cms_agenda", "evaluaciones" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );

// Register Custom Post Type
function cms_evaluaciones() {

	$labels = array(
		'name'                  => _x( 'Evaluaciones', 'Post Type General Name', 'cms' ),
		'singular_name'         => _x( 'Evaluación', 'Post Type Singular Name', 'cms' ),
		'menu_name'             => __( 'Evaluaciones', 'cms' ),
		'name_admin_bar'        => __( 'Evaluaciones', 'cms' ),
		'archives'              => __( 'Archivo de Evaluaciones', 'cms' ),
		'attributes'            => __( 'Item Attributes', 'cms' ),
		'parent_item_colon'     => __( 'Parent Item:', 'cms' ),
		'all_items'             => __( 'All Items', 'cms' ),
		'add_new_item'          => __( 'Add New Item', 'cms' ),
		'add_new'               => __( 'Añadir', 'cms' ),
		'new_item'              => __( 'Añadir nueva Evaluación', 'cms' ),
		'edit_item'             => __( 'Editar Evaluación', 'cms' ),
		'update_item'           => __( 'Update Item', 'cms' ),
		'view_item'             => __( 'View Item', 'cms' ),
		'view_items'            => __( 'View Items', 'cms' ),
		'search_items'          => __( 'Search Item', 'cms' ),
		'not_found'             => __( 'Not found', 'cms' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'cms' ),
		'featured_image'        => __( 'Featured Image', 'cms' ),
		'set_featured_image'    => __( 'Set featured image', 'cms' ),
		'remove_featured_image' => __( 'Remove featured image', 'cms' ),
		'use_featured_image'    => __( 'Use as featured image', 'cms' ),
		'insert_into_item'      => __( 'Insert into item', 'cms' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'cms' ),
		'items_list'            => __( 'Items list', 'cms' ),
		'items_list_navigation' => __( 'Items list navigation', 'cms' ),
		'filter_items_list'     => __( 'Filter items list', 'cms' ),
	);
	$rewrite = array(
		'slug'                  => 'evaluaciones',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Evaluación', 'cms' ),
		'description'           => __( 'Evaluaciones', 'cms' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'evaluaciones', $args );

}
add_action( 'init', 'cms_evaluaciones', 0 );

<?php 

function load_stylesheet(){
    wp_register_style ('normalize', get_template_directory_uri() .'/css/normalize.css');
    wp_enqueue_style( 'normalize');

    wp_register_style ('bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_style( 'bootstrap');

    wp_register_style ('godot', get_template_directory_uri() .'/css/godot.css');
    wp_enqueue_style( 'godot');
}
add_action( 'wp_enqueue_scripts', 'load_stylesheet'); 



function include_jquery(){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '',1, false);
    add_action ('wp_enqueue_scripts', 'jquery');
}
    
add_action ('wp_enqueue_scripts', 'include_jquery');



function loadjs(){

    wp_register_script ('customjs', get_template_directory_uri() . '/js/script.js', '', 1, true);
    wp_enqueue_script( 'customjs');
    add_action('wp_enqueue_scripts', 'customjs');
    
}
add_action('wp_enqueue_scripts', 'loadjs');


function fontawesome_enqueue_scripts() {
        wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'fontawesome_enqueue_scripts' );



function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Livres', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Livre', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Livres'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les Livres'),
		'view_item'           => __( 'Voir les livres'),
		'add_new_item'        => __( 'Ajouter un nouveau Livre'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le Livre'),
		'update_item'         => __( 'Modifier le Livre'),
		'search_items'        => __( 'Rechercher une série TV'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Livres'),
		'description'         => __( 'Tous les livres'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-tickets',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'menu_position' => 2,

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'book', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );
add_action('rest_api_init', 'custom_api_get_projects');


function custom_api_get_projects(){
	register_rest_route( 'book', '/all-posts', array(
		'methods' => 'GET',
		'callback' => 'custom_api_get_projects_callback'
	));	
}

?>
<?php 

function load_stylesheet()
{
    wp_register_style ('normalize', get_template_directory_uri() .'/css/normalize.css');
    wp_enqueue_style( 'normalize');

    wp_register_style ('bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_style( 'bootstrap');

    wp_register_style ('godot', get_template_directory_uri() .'/css/godot.css');
    wp_enqueue_style( 'godot');
}

add_action( 'wp_enqueue_scripts', 'load_stylesheet'); 



function include_jquery()

{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '',1, false);
    add_action ('wp_enqueue_scripts', 'jquery');
}
    
add_action ('wp_enqueue_scripts', 'include_jquery');



function loadjs()
{

    wp_register_script ('customjs', get_template_directory_uri() . '/js/script.js', '', 1, true);
    wp_enqueue_script( 'customjs');
    add_action('wp_enqueue_scripts', 'customjs');
    
}
add_action('wp_enqueue_scripts', 'loadjs');




function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Séries TV', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Série TV', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Séries TV'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les séries TV'),
		'view_item'           => __( 'Voir les séries TV'),
		'add_new_item'        => __( 'Ajouter une nouvelle série TV'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la séries TV'),
		'update_item'         => __( 'Modifier la séries TV'),
		'search_items'        => __( 'Rechercher une série TV'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Séries TV'),
		'description'         => __( 'Tous sur séries TV'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'series-tv'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'seriestv', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );









?>
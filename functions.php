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
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '',1, true);
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


?>
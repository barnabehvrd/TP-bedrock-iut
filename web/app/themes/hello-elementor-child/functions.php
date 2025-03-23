<?php

function mon_theme_enfant_enqueue_styles()
{

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri().'/style.css');

    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri().'/style.css',
        [$parent_style],
        wp_get_theme()->get('Version')
    );

	wp_enqueue_style('dark-theme',
		get_stylesheet_directory_uri().'/dark-style.css',
		['child-style'],
		wp_get_theme()->get('Version') . '.' . time() // Ajouter timestamp pour éviter la mise en cache
	);

}
add_action('wp_enqueue_scripts', 'mon_theme_enfant_enqueue_styles');

require_once get_stylesheet_directory() . '/cpt-portfolio.php';
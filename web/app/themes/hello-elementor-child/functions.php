<?php

function mon_theme_enfant_enqueue_styles()
{

    $parent_style = 'parent-style'; // Ceci doit correspondre au handle du thème parent (vérifiez le functions.php du thème parent si vous n'êtes pas sûr)

    wp_enqueue_style($parent_style, get_template_directory_uri().'/style.css'); // Enfile le style du thème parent

    wp_enqueue_style('child-style', // Handle pour le style du thème enfant
        get_stylesheet_directory_uri().'/style.css', // Chemin vers le style.css du thème enfant
        [$parent_style], // Dépendance : s'assurer que le style parent est chargé avant
        wp_get_theme()->get('Version') // Version du thème enfant
    );
}
add_action('wp_enqueue_scripts', 'mon_theme_enfant_enqueue_styles');

add_action('init', 'portfolio_cpt');
function portfolio_cpt()
{
    $labels = [
        'name' => _x('Portfolio', 'Nom général', 'mon-theme-enfant'),
        'singular_name' => _x('Portfolio', 'Nom singulier', 'mon-theme-enfant'),
        'menu_name' => __('Portfolios', 'mon-theme-enfant'),
        'name_admin_bar' => __('Portfolio', 'mon-theme-enfant'),
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'portfolio'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'],
        'taxonomies' => ['category', 'post_tag'],
    ];
    register_post_type('evenement', $args); // 'evenement' est le slug du CPT
}

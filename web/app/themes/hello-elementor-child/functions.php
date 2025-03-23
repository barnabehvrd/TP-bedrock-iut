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

require_once get_stylesheet_directory() . '/cpt-portfolio.php';
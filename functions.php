<?php

function add_theme_scripts(){
    wp_enqueue_style("style", get_stylesheet_uri());
    wp_enqueue_script("app-js", get_bloginfo("stylesheet_directory") . "/dist/js/identity.bundle.js");
}

add_action("wp_enqueue_scripts", "add_theme_scripts");

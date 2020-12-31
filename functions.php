<?php

/**
 * Identity functions and definitions
 *
 * @package Identity
 * @since Identity 1.0
 */
 
/**************************************************************************************************
 Content Width
**************************************************************************************************/

if ( ! isset( $content_width ) )
    $content_width = 800; /* pixels */

/**************************************************************************************************
 Theme Setup
**************************************************************************************************/

if ( ! function_exists( 'identity_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */

    function identity_setup() {
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain( 'identity', get_template_directory() . '/languages' );

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support( 'automatic-feed-links' );

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );

        /**
         * Add support for custom navigation menus.
         */
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'identity' ),
            'secondary' => __( 'Secondary Menu', 'identity' )
        ) );        

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    }
endif; //identity_setup
add_action( 'after_setup_theme', 'identity_setup' );

/**************************************************************************************************
 Theme Scripts
**************************************************************************************************/

function add_identity_scripts() {
    /**
     * Styles
     */
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    /**
     * Scripts
     */
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/identity.bundle.js', array(), false, true);
   
    /**
     * Threaded comment reply styles.
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'add_identity_scripts' );

/**************************************************************************************************
 Register Side Bar
**************************************************************************************************/

function identity_widgets_init() {
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'identity_widgets_init' );

/**************************************************************************************************
 Register Side Bar
**************************************************************************************************/
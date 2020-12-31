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

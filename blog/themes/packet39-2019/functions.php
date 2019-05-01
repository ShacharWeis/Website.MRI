<?php
/**
 * Remove default Wordpress head tag clutter
 */
require_once 'lib/overrides/header.php';
/**
 * Remove default Wordpress footer clutter
 */
require_once 'lib/overrides/footer.php';
/**
 * Override Wordpress image defaults
 */
require_once 'lib/overrides/images.php';
/**
 * Custom Wordpress Login
 */
require_once 'lib/overrides/login.php';
/**
 * Restricts dashboard options to only needed items.
 */
require_once 'lib/overrides/dashboard.php';
/**
 * Alters plugin functionality for SEO optimization
 */
require_once 'lib/overrides/plugins.php';
/**
 * Alters widgets to match markup
 */
require_once 'lib/overrides/widgets.php';


function wpdocs_excerpt_more( $more ) {
    return sprintf( ' ...');
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// Register Sidebars
function custom_sidebars() {

    $args = array(
        'id'            => 'article-sidebar',
        'name'          => __( 'Article Sidebar', 'text_domain' ),
        'description'   => __( 'Sidebar for the Article List Page', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="widget widget-container %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h6 class="sidebar-title">',
        'after_title' => '</h6>'
    );
    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );

add_theme_support( 'title-tag' );

/**
 * Add featured image theme support.
 */
add_theme_support('post-thumbnails');

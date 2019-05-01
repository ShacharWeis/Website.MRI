<?php
/**
 * Created by jamiesonroberts
 * Date: 2017-04-09
 */


/**
 * Prevents loading of Contact Form 7 styles and scripts when not needed.
 */
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');


/**
 * If Yoast SEO is installed, remove html comments that expose version information.
 * Remove function is courtesy of https://github.com/trajche
 */
if (defined('WPSEO_VERSION')) {

    add_action('get_header', function () {
        ob_start('remove_yoast_comments');
    });
    add_action('wp_head', function () {
        ob_end_flush();
    }, 999);

}

function remove_yoast_comments($output)
{
    $targets = array(
        '<!-- This site is optimized with the Yoast WordPress SEO plugin v' . WPSEO_VERSION . ' - https://yoast.com/wordpress/plugins/seo/ -->',
        '<!-- / Yoast WordPress SEO plugin. -->',
        '<!-- This site uses the Google Analytics by Yoast plugin v' . GAWP_VERSION . ' - https://yoast.com/wordpress/plugins/google-analytics/ -->',
        '<!-- / Google Analytics by Yoast -->'
    );

    $output = str_ireplace($targets, '', $output);
    $output = trim($output);
    $output = preg_replace('/\n?<.*?yoast.*?>/mi', '', $output);

    return $output;
}



if ( ! function_exists( 'twentyfifteen_comment_nav' ) ) :
    /**
     * Display navigation to next/previous comments when applicable.
     *
     * @since Twenty Fifteen 1.0
     */
    function twentyfifteen_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfifteen' ); ?></h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'twentyfifteen' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'twentyfifteen' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->
            <?php
        endif;
    }
endif;

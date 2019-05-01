<?php
/**
 * Created by jamiesonroberts
 * Date: 2017-04-08
 */

/**
 * custom login screen css
 */
function custom_login()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />';
}

add_action('login_head', 'custom_login');

/**
 * custom login screen url
 * @return string|void
 */
function custom_login_url()
{
    return site_url();
}

add_filter('login_headerurl', 'custom_login_url', 10, 4);

/**
 * custom login page title
 * @return string|void
 */
function custom_login_header_title()
{
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'custom_login_header_title');

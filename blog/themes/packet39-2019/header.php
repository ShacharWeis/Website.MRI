<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js blog">
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />


    <link rel="dns-prefetch" href="https://fonts.gstatic.com"/>
    <link rel="dns-prefetch" href="https://use.fontawesome.com"/>

    <!-- Styles -->
    <link href="<?php echo WP_HOME; ?>/../assets/css/page.css" rel="stylesheet" />
    <link href="<?php echo WP_HOME; ?>/../assets/css/style.css" rel="stylesheet" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo hostURL(); ?>/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo hostURL(); ?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo hostURL(); ?>/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo hostURL(); ?>/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?php echo hostURL(); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#ffffff">
    <!-- Font Awesome -->
    <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
            crossorigin="anonymous"
    />
    <style>
        .wp-caption, iframe {
            max-width: 100%;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Navbar -->
<nav
        class="navbar navbar-expand-lg navbar-light navbar-stick-dark"
        data-navbar="sticky"
>
    <div class="container">
        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="<?php echo hostURL(); ?>">
                <img class="logo-dark" src="<?php echo SITE_HOME; ?>/images/logo.png" alt="logo"/>
                <img class="logo-light" src="<?php echo SITE_HOME; ?>/images/logo.png" alt="logo"/>
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <nav class="nav nav-navbar">
                <a class="nav-link" href="<?php echo hostURL(); ?>/#tech">Technology</a>
                <a class="nav-link" href="<?php echo hostURL(); ?>#projects">Projects</a>
                <a class="nav-link" href="<?php echo hostURL(); ?>#team">Team</a>
                <a class="nav-link" href="<?php echo hostURL(); ?>#contact">Contact</a>
                <a class="nav-link" href="<?php echo WP_HOME; ?>">Blog</a>
            </nav>
        </section>

        <!--<a class="btn btn-sm btn-round btn-dark" href="readme.html">Read me</a>-->
    </div>
</nav>
<!-- /.navbar -->

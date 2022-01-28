<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<?php wp_head(); ?>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


	</head>

	<body <?php body_class(); ?>>

		<header class="main_header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-md-2 h-100 d-flex justify-content-center align-items-center">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo get_theme_mod('industrydive_logo') ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-10 h-100">
                        <?php wp_nav_menu(['theme_location' => 'main_menu', 'menu_id' => 'main_nav']); ?>
                    </div>
                </div>
            </div>
        </header>

        <div class="sticky-social-menu">
            <a class="bg-facebook" href="www.facebook.com">
                <i class="fa fa-facebook-f"></i>
            </a>

            <a class="bg-twitter" href="www.twitter.com">
                <i class="fa fa-twitter"></i>
            </a>


            <a class="bg-google" href="www.google.com">
                <i class="fa fa-google-plus"></i>
            </a>
            
            <a class="bg-linkedin" href="www.linkedin.com">
                <i class="fa fa-linkedin"></i>
            </a>

            <a class="bg-email" href="www.linkedin.com">
            <i class="fa fa-envelope"></i>
            </a>
        </div>

<?php
/**
 * The sidebar for every page except the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
?>

<aside id="sidebar" class="sidebar" role="complementary">
    <div class="nav wrapper">
        <nav id="site-nav">
            <?php wp_nav_menu( array( 'theme_location'=>'sidebar' ) ); ?>
        </nav><!-- .homepage-nav-->
    </div><!-- .nav-info .wrapper -->
</aside><!-- #sidebar -->

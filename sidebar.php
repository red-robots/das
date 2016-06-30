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
   <div class="logo wrapper">
       <a href="<?php get_site_url();?>"><img src="<?php wp_get_attachment_url(get_field("logo","option"));?>" alt="logo" id="logo"></a>
   </div><!--.logo .wrapper-->
    <div class="nav wrapper">
        <nav id="site-nav">
            <?php wp_nav_menu( array( 'theme_location'=>'sidebar' ) ); ?>
        </nav><!-- .homepage-nav-->
    </div><!-- .nav-info .wrapper -->
</aside><!-- #sidebar -->

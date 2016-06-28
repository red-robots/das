<?php
/**
 * The sidebar for every page except the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
?>

<aside id="sidebar" role="complementary">
   <div class="logo wrapper">
       <img src="<?php wp_get_attachment_url(get_field("logo","option"));?>" alt="logo" id="logo">
   </div><!--.logo .wrapper-->
    <div class="nav-info wrapper">
        <nav class="homepage-nav">
            <?php wp_nav_menu( array( 'menu_id' => 'main-menu' ) ); ?>
        </nav><!-- .homepage-nav-->
    </div><!-- .nav-info .wrapper -->
</aside><!-- #homepagesidebar -->

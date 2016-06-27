<?php
/**
 * The sidebar for the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
?>

<aside id="homepage-sidebar" role="complementary">
	<div class="logo-wrapper">
        <img src="<?php wp_get_attachment_url(get_field("logo","option");?>" alt="logo" id="logo">
    </div><!--.logo-wrapper-->
    <div class="nav-info-wrapper">
        <nav class="homepage-nav">
            <?php wp_nav_menu( array( 'menu_id' => 'main-menu' ) ); ?>
        </nav><!-- .homepage-nav-->
        <div class="company-info">
            <div class="social">
                <!-- social icons here -->
            </div><!--.social-->
            <div class="electronic-info">
                <?php if(get_field("company_name","option")): ?>
                    <p><?php the_field("company_name","option");?></p>
                <?php endif; ?>
                <?php if(get_field("main_line_telephone_number","option")): ?>
                    <p><?php the_field("main_line_telephone_number","option");?></p>
                <?php endif; ?>
                <?php if(get_field("fax_line_number","option")): ?>
                    <p>fax <?php the_field("fax_line_number","option");?></p>
                <?php endif; ?>
                <?php if(get_field("toll_free_line_number","option")): ?>
                    <p>toll free <?php the_field("toll_free_line_number","option");?></p>
                <?php endif; ?>
                <?php if(get_field("contact_email","option")): ?>
                    <p><?php the_field("contact_email","option");?></p>
                <?php endif; ?>
            </div><!-- .electronic-info -->
            <div class="address">
                <?php if(get_field("address_line_1","option"): ?>
                    <p><?php the_field("address_line_1","option");?></p>
                <?php endif; ?>
                <?php if(get_field("address_line_2","option")): ?>
                    <p><?php the_field("address_line_2","option");?></p>
                <?php endif;?>
                <?php if(get_field("city_state_zip","option")): ?>
                    <p><?php the_field("city_state_zip","option");?></p>
                <?php endif;?>
            </div><!--.address-->
        </div><!--.company-info-->
    </div><!-- .nav-info-wrapper -->
</aside><!-- #homepagesidebar -->

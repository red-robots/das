<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" style="background-image: <?php the_field("footer-image","option");?>;">
		<div class="wrapper">
            <div class="float-left">
                <div class="company-info">
                    <?php if(get_field("company_name","option")): ?>
                        <p class="company-name"><?php the_field("company_name","option");?></p>
                    <?php endif; ?>
                    <?php if(get_field("main_line_telephone_number","option")): ?>
                        <p class="main-line"><?php the_field("main_line_telephone_number","option");?></p>
                    <?php endif; ?>
                    <?php if(get_field("fax_line_number","option")): ?>
                        <p class="fax-line">fax <?php the_field("fax_line_number","option");?></p>
                    <?php endif; ?>
                    <?php if(get_field("toll_free_line_number","option")): ?>
                        <p class="toll-free-line">toll free <?php the_field("toll_free_line_number","option");?></p>
                    <?php endif; ?>
                </div><!-- .company-info -->
                <div class="footer-links-menu">
                    <?php wp_nav_menu( array( 'menu_id' => 'footer-menu' ) ); ?>
                </div><!--.footer-links-menu-->
            </div> <!-- .float-left -->
            <div class="float-right">
                <div class="company-location">
                    <?php if(get_field("location","option")): ?>
                        <p class="location"><?php the_field("location","option");?></p>
                    <?php endif;?>
                    <?php if(get_field("google-maps-location","option")): ?>
                        <div class="google-maps-location"><?php the_field("google_maps_location","option");?></div>
                    <?php endif; ?>
                    <?php if(get_field("address_line_1","option")&& get_field("address_line_2","option")): ?>
                    <p><span class="address-line-1"><?php the_field("address_line_1","option");?></span> | <span class="address-line-2"><?php the_field("address_line_2","option");?></span></p>
                    <?php endif;?>
                    <?php if(get_field("city_state_zip","option")): ?>
                        <p class="city-state-zip"><?php the_field("city_state_zip","option");?></p>
                    <?php endif;?>
                    <div class="sitemap-bw-menu">
                        <?php wp_nav_menu( array( 'menu_id' => 'sitemap-bw-menu' ) ); ?>
                    </div><!--.sitemap-bw-menu-->
                </div><!-- .company-location -->
            </div><!-- .float-right -->
        </div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

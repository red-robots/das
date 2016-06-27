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
                    <p><?php the_field("company_name","option");?></p>
                    <p><?php the_field("main_line_telephone_number","option");?></p>
                    <p>fax <?php the_field("fax_line_number","option");?></p>
                    <p>toll free <?php the_field("toll_free_line_number","option");?></p>
                </div><!-- .company-info -->
                <div class="footer-links-menu">
                    <?php wp_nav_menu( array( 'menu_id' => 'footer-menu' ) ); ?>
                </div>
            </div> <!-- .float-left -->
            <div class="float-right">
                <div class="company-location">
                    <p><?php the_field("location","option");?></p>
                    <div class="google-maps-location"><?php the_field("google_maps_location","option");?></div>
                    <p><?php the_field("address_line_1","option");?> | <?php the_field("address_line_2","option");?></p>
                    <p><?php the_field("city_state_zip","option");?></p>
                    <div class="sitemap-bw-menu">
                        <?php wp_nav_menu( array( 'menu_id' => 'sitemap-bw-menu' ) ); ?>
                    </div>
                </div><!-- .company-location -->
            </div><!-- .float-right -->
        </div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

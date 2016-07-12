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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer wrapper clear-bottom">
			<div class="float-left company-info-footer-links wrapper">
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
				<nav class="footer-links-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
				</nav><!--.footer-links-menu-->
			</div> <!-- .float-left .company-info-footer-link-->
			<div class="float-right company-location-sitemap-bw wrapper">
				<div class="company-location">
					<?php if(get_field("location","option")): ?>
						<div class="location"><?php  echo get_field("location","option");?></div>
					<?php endif;?>
					<?php if(get_field("google-maps-location","option")): ?>
						<div class="google-maps-location"><?php the_field("google_maps_location","option");?></div>
					<?php endif; ?>
					<?php if(get_field("address_line_1","option")&& get_field("address_line_2","option")): ?>
					<p class="address"><span class="address-line-1"><?php the_field("address_line_1","option");?></span> | <span class="address-line-2"><?php the_field("address_line_2","option");?></span></p>
					<?php endif;?>
					<?php if(get_field("city_state_zip","option")): ?>
						<p class="city-state-zip"><?php the_field("city_state_zip","option");?></p>
					<?php endif;?>
				</div><!-- .company-location -->
				<nav class="sitemap-bw-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'technical' ) ); ?>
				</nav><!--.sitemap-bw-menu-->
			</div><!-- .float-right .comapny-loaction-sitemap-bw -->
		</div><!-- .footer .wrapper -->
		<div class="background-image wrapper" style="background-image: url('<?php echo wp_get_attachment_image_src(get_field("footer_image","option"),"full")[0];?>');">
		</div><!--.background-image .wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

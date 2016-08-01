<?php
/**
 * Template part for displaying site header for the news sections.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<header id="site-header" class="clear-bottom">
	<div class="false-logo wrapper left-column">	
		<img src="<?php echo wp_get_attachment_image_src(get_field("blank_logo","option"),"full")[0];?>" alt="false logo" class="false logo">
	</div><!--.false-logo .wrapper-->
	<div class="mobile-logo wrapper left-column">
		<a href="<?php echo get_site_url();?>"><img src="<?php echo wp_get_attachment_image_src(get_field("logo_mobile","option"),"full")[0];?>" alt="logo" id="mobilelogo"></a>
	</div><!--.mobile-logo .wrapper .left-column-->
	<div class="company-info-nav wrapper right-column">
        <div class="company-info">
			<div class="info-social wrapper">
	            <p class="info">
	                <span class="company-name"><?php the_field("company_name","option");?></span>
	                <?php echo " | ";?>
	                <span class="address-line-1"><?php the_field("address_line_1","option");?></span>
	                <?php echo " | ";?>
	                <span class="address-line-2"><?php the_field("address_line_2","option");?></span>
	                <?php echo " | ";?>
	                <span class="city-state-zip"><?php the_field("city_state_zip","option");?></span>
	            </p>
				<?php get_template_part("/template-parts/social");?>
			</div><!--.info-social .wrapper-->
            <p class="main-line">
                <?php the_field("main_line_telephone_number","option");?>
            </p>
        </div><!--.company-info-->
		<i class="mobile hamburger fa fa-bars"></i>
        <nav class="desktop about">
            <?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
        </nav>
		<nav class="mobile">
			<i class="mobile hamburger fa fa-bars"></i>
			<?php wp_nav_menu( array( 'theme_location'=>'sidebar' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
		</nav>
    </div><!--.company-info-nav .wrapper-->
</header><!--#site-header-->

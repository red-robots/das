<?php
/**
 * Template part for displaying site header for the news sections.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<div id="site-header" class="clear-bottom">
	<div class="false-logo wrapper left-column">	
		<img src="<?php echo wp_get_attachment_url(get_field("blank_logo","option"));?>" alt="false logo" class="false logo">
	</div><!--.false-logo .wrapper-->
	<div class="mobile-logo wrapper left-column">
		<a href="<?php echo get_site_url();?>"><img src="<?php echo wp_get_attachment_url(get_field("logo_mobile","option"));?>" alt="logo" id="mobilelogo"></a>
	</div><!--.mobile-logo .wrapper .left-column-->
	<div class="company-info-nav wrapper right-column">
        <div class="company-info">
            <p class="info">
                <span class="company-name"><?php the_field("company_name","option");?></span>
                <?php echo " | ";?>
                <span class="address-line-1"><?php the_field("address_line_1","option");?></span>
                <?php echo " | ";?>
                <span class="address-line-2"><?php the_field("address_line_2","option");?></span>
                <?php echo " | ";?>
                <span class="city-state-zip"><?php the_field("city_state_zip","option");?></span>
                <!-- inline social goes here -->
            </p>
            <p class="main-line">
                <?php the_field("main_line_telephone_number","option");?>
            </p>
        </div><!--.company-info-->
		<h1 class="title"><?php if(is_category()||is_tax()):
			$obj = get_queried_object();
			echo $obj->name;
		else:	
			echo get_the_title();
		endif;?></h1>
    </div><!--.company-info-nav .wrapper-->
</div><!--#site-header-->

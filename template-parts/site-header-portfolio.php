<?php
/**
 * Template part for displaying site header for the news sections.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<div id="site-header">
	<div class="false-logo-wrapper wrapper">	
		<img src="/wp-content/uploads/2016/07/false-logo-bg.png" alt="false logo" class="false logo">
	</div><!--.false-logo-wrapper .wrapper-->
	<div class="logo wrapper">	
		<img src="/wp-content/uploads/2016/07/false-logo-bg.png" alt="false logo" class="false logo">
		<a href="<?php get_site_url();?>"><img src="<?php echo wp_get_attachment_url(get_field("logo","option"));?>" alt="logo" id="logo"></a>
    </div><!--.logo .wrapper-->
    <div class="company-info-nav wrapper">
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
        <nav class="portfolio">
            <ul>
                <span class="descriptor">Filter:</span>
                <?php $cats = get_categories(array('taxonomy'=>'project_type'));?>
                <?php foreach($cats as $cat): ?>
                    <a href="<?php get_category_link(get_cat_ID($cat->slug));?>"><li><?php echo $cat->name;?></li></a>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div><!--.company-info-nav .wrapper-->
</div><!--#site-header-->

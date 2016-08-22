<?php
/**
 * The sidebar for the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
?>

<aside id="homepage-sidebar" class="sidebar js-blocks" role="complementary">
    <div class="logo wrapper">
       <img src="<?php echo wp_get_attachment_url(get_field("logo","option"));?>" alt="logo" id="logo">
    </div><!--.logo .wrapper-->
    <i class="mobile hamburger fa fa-bars"></i>
    <nav class="mobile">
        <i class="mobile hamburger fa fa-bars"></i>
        <?php wp_nav_menu( array( 'theme_location'=>'sidebar' ) ); ?>
        <?php get_template_part("/template-parts/social");?>
    </nav>
	<div class="nav-info wrapper">
        <nav id="site-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'sidebar' ) ); ?>
        </nav><!-- .homepage-nav-->
        <div class="company-info">
            <div class="social wrapper">
                <?php get_template_part("/template-parts/social");?>
            </div><!--.social .wrapper-->
            <div class="electronic-info">
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
                <?php if(get_field("contact_email","option")): ?>
                    <p class="contact-email"><?php $full_email = get_field("contact_email","option");?>
                        <a href="mailto:<?php echo $full_email;?>">
                            <?php $index = strpos($full_email,'@');
                            if($index):
                                if(substr($full_email,0,$index+1)):echo "<span>".substr($full_email,0,$index+1)."</span>";endif;
                                if(substr($full_email,$index+1)):echo "<span>".substr($full_email,$index+1)."</span>";endif;
                            else: 
                                echo "<span>".$full_email."</span>";
                            endif;?>
                        </a>
                    </p>
                <?php endif; ?>
            </div><!-- .electronic-info -->
            <div class="address">
                <?php if(get_field("address_line_1","option")): ?>
                    <p class="address-line-1"><?php the_field("address_line_1","option");?></p>
                <?php endif; ?>
                <?php if(get_field("address_line_2","option")): ?>
                    <p class="address-line-2"><?php the_field("address_line_2","option");?></p>
                <?php endif;?>
                <?php if(get_field("city_state_zip","option")): ?>
                    <p class="city-state-zip"><?php the_field("city_state_zip","option");?></p>
                <?php endif;?>
            </div><!--.address-->
        </div><!--.company-info-->
    </div><!-- .nav-info .wrapper -->
</aside><!-- #homepagesidebar .sidebar .js-blocks-->

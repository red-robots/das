<?php
/**
 * Template Name: Contact
 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
      <?php if(have_posts()):
	      the_post(); ?>
			<?php get_template_part("/template-parts/site-header","news-single"); ?>
		      <div class="main-sidebar wrapper clear-bottom">
						<?php get_sidebar(); ?>
						<main id="main" class="site-main right-column single-page" role="main">
							<article>
								<header><h1 class="title"><?php echo get_the_title();?></h1></header>
								<div class="map-copy-super wrapper clear-bottom">
									<section class="map-copy wrapper clear-bottom">
										<?php if(get_field("map")):?>
                                            <div class="map wrapper">
                                                <div class="map">
                                                    <?php echo get_field("map");?>
                                                </div>
                                            </div><!--.map .wrapper-->
                                        <?php endif;?>
										<div class="copy">
											<?php the_content();?>
										</div><!--.copy-->
									</section><!--.video-copy .wrapper-->
								</div><!--.video-copy-affiliation .wrapper-->
							</article>					
            </main><!-- #main -->
	        </div><!--.main-sidebar .wrapper-->
        <?php endif; //if for initializing page?>
	</div><!-- #primary -->

<?php
get_footer();
?>

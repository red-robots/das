<?php
/**
 * The template for displaying all single-leader posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */
global $wp_query;

get_header(); ?>

	<div id="primary" class="content-area">
		<?php if(have_posts()):
			the_post();?>
			<?php get_template_part("/template-parts/site-header","about"); ?>    
			<div class="main-sidebar wrapper clear-bottom">
				<?php get_sidebar(); ?>
				<main id="main" class="site-main right-column single-leader" role="main">
					<div class="leader wrapper clear-bottom">
						<article class="leader clear-bottom js-blocks">
                            <div class="left-column">
								<img src="<?php echo wp_get_attachment_url(get_field("picture"));?>" alt="<?php echo get_post(get_field("picture"))->post_title;?>" class="featured-leader-image">
                            </div><!--.left-column-->
							<div class="right-column">
                                <?php get_template_part("/template-parts/search","leader-form");?>
                                <header>
                                    <h1 class="title"><?php the_title();?></h1>
                                    <p class="position"><?php echo get_field("professional_title");?></p>
                                </header>
                                <section class="copy">
                                    <?php the_content(); ?>
                                </section><!--.copy-->
                            </div><!--.right-column-->
						</article><!--.leader-->
					</div><!--.leader .wrapper-->
	            </main><!-- #main -->
	        </div><!--.main-sidebar .wrapper-->
        <?php endif; //if for initializing leader post?>
	</div><!-- #primary -->

<?php
get_footer();
?>

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
			<?php get_template_part("/template-parts/site-header","search-leader"); ?>    
			<div class="main-sidebar wrapper clear-bottom">
				<?php get_sidebar(); ?>
				<main id="main" class="site-main right-column single-leader" role="main">
					<div class="search-leader isotope-footer-pagination wrapper clear-bottom">
                        <?php if(have_posts()):?>
                            <?php get_template_part("/template-parts/search","leader-form");?>
                            <div class="isotope-side-pagination wrapper clear-bottom">
                                <section class="leader is-container left-column">
                                    <?php while(have_posts()):the_post();?>
                                        <div class="leader js-blocks item">
                                            <div class="image wrapper">
                                                <img src="<?php echo wp_get_attachment_url(get_field("picture"));?>" alt="<?php echo get_post(get_field("picture"))->post_title;?>" class="featured-leader-image">
                                                <a class="surrounding" href="<?php echo get_the_permalink();?>"></a>
                                            </div><!--.image .wrapper-->
                                            <header>
                                                <p class="link full-article"><a href="<?php echo get_the_permalink();?>">Read Bio</a></p>
                                                <h1 class="title"><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h1>
                                                <p class="position"><a href="<?php echo get_the_permalink();?>"><?php echo get_field("professional_title");?></a></p>
                                            </header>
                                        </div><!--.leader-->
                                    <?php endwhile; //while for all portfolio posts;?> 
                                </section><!--.project .is-container .left-column-->
                                <div class="right-column pagination wrapper">
                                    <?php pagi_posts_arrow_nav($wp_query);?>
                                </div><!--.pagination .right-column .wrapper-->
                            </div><!--.isotope-side-pagination .wrapper-->
                            <div class="pagination wrapper left-column">
                                <?php pagi_posts_nav($wp_query);?>
                            </div><!--.pagination .wrapper-->
                        <?php else: ?>
                        <div class="no-search-results">
                            <header><h1>Nothing Found!<h1></header>
                            <?php get_template_part("/template-parts/search","leader-form");?>
                            <div class="copy">
                                <p>Nothing was found for those criteria please try another! Or maybe a link below?</p>
                                <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                            </div>
                        </div><!--.no-search-results-->
                        <?php endif; //if for initializing leader post?>
					</div><!--.search-leader .wrapper-->
	            </main><!-- #main -->
	        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>

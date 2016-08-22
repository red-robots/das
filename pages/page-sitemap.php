<?php
/**
 * Template Name: Sitemap
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
			<?php get_template_part("/template-parts/site-header","news-single"); ?>
		      <div class="main-sidebar wrapper clear-bottom">
						<?php get_sidebar(); ?>
						<main id="main" class="site-main right-column single-page" role="main">
							<article>
								<header><h1 class="title"><?php the_title();?></h1></header>
								<div class="video-copy-super wrapper clear-bottom">
									<section class="video-copy wrapper clear-bottom">
										<div class="video wrapper">
											<?php $portfolio_w_video = array();
											$query = new WP_Query(array('post_type'=>'portfolio','posts_per_page'=>-1));
											if($query->have_posts()):
												while($query->have_posts()):$query->the_post();
													if(get_field("video")):
														$portfolio_w_video[] = $query->post->ID;//get portfolios with videos
													endif;//end of if for has video
												endwhile;//end of have posts for portfolios
											endif;//end of if posts for portfolios
											wp_reset_postdata();
											if(!empty($portfolio_w_video)):
												$selection = $portfolio_w_video[rand(0,count($portfolio_w_video)-1)];//get random portfolio
												$post=get_post($selection);
												setup_postdata($post);?>
												<div class="video">
													<?php $video = get_field("video");
													preg_match("/src=\"(.+)\"/i",$video,$matches); ?>
													<iframe src="<?php echo $matches[1];?>"></iframe>
												</div><!--.video-->
												<div class="link full-article">
													<a href="<?php the_permalink();?>">View More</a>
												</div><!--.link.full-article-->
												<?php wp_reset_postdata();
											endif;//end of if for has videos?>
										</div><!--.video-->
										<div class="copy">
                                            <?php the_content();?>
                                            <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
										</div><!--.copy-->
									</section><!--.video-copy .wrapper-->
								</div><!--.video-copy.wrapper-->
							</article>					
            </main><!-- #main -->
	        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

	
<?php
get_footer();

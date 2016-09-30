<?php
/**
 * Template Name: Our People
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
      <?php if(have_posts()):
	      the_post(); ?>
			<?php get_template_part("/template-parts/site-header","about"); ?>
		      <div class="main-sidebar wrapper clear-bottom">
					<?php get_sidebar(); ?>
		        <main id="main" class="site-main right-column about" role="main">
							<article>
								<header><h1 class="title"><?php echo get_the_title();?></h1></header>
								<div class="video-copy-team wrapper clear-bottom">
									<section class="video-copy wrapper">
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
													<iframe src="<?php echo $matches[1];?>" allowfullscreen=""></iframe>
												</div><!--.video-->
												<div class="link full-article">
													<a href="<?php the_permalink();?>">View More</a>
												</div><!--.link.full-article-->
												<?php wp_reset_postdata();
											endif;//end of if for has videos?>
										</div><!--.video-->
										<div class="copy">
											<?php the_content();?>
										</div><!--.copy-->
									</section><!--.video-copy .wrapper-->
									<?php $query = new WP_Query(array('post_type'=>'leader','posts_per_page'=>-1));
									if($query->have_posts()):?>
                                        <header class="clear-bottom">
                                            <?php if(get_field("our_people_title")):?>
                                                <h2><?php echo get_field("our_people_title");?></h2>
                                            <?php endif;?>
                                            <?php get_template_part("/template-parts/search","leader-form");?>
                                        </header>
                                        <div class="isotope-footer-pagination wrapper clear-bottom">
                                            <div class="isotope-side-pagination wrapper clear-bottom">
                                                <section class="leader is-container left-column">
                                                    <?php while($query->have_posts()):$query->the_post();?>
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
                                                    <?php pagi_posts_arrow_nav($query);?>
                                                </div><!--.pagination .right-column .wrapper-->
                                            </div><!--.isotope-side-pagination .wrapper-->
                                            <div class="pagination wrapper left-column">
                                                <?php pagi_posts_nav($query);?>
                                            </div><!--.pagination .wrapper-->
                                        </div><!--.isotope-footer-pagination .wrapper-->
                                    <?php endif;//if have leaders?>
								</div><!--.video-copy-team .wrapper-->
							</article>
		        </main><!-- #main -->
		      </div><!--.main-sidebar .wrapper-->
        <?php endif; //if for initializing page?>
	</div><!-- #primary -->

<?php
get_footer();
?>

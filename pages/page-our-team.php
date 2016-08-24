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
                                        <section class="leadership wrapper">
                                            <?php if(get_field("our_people_title")):?>
                                                <header>
                                                    <h2><?php echo get_field("our_people_title");?></h2>
                                                </header>
                                            <?php endif;
                                            while($query->have_posts()):$query->the_post();?>
                                                <div class="leader clear-bottom">
                                                    <?php if(get_field("picture")):?>
                                                        <img src="<?php echo wp_get_attachment_image_src(get_field("picture"), "full")[0];?> " alt="<?php echo get_post(get_field("picture"))->post_title;?>">
                                                    <?php endif;?>
                                                    <header>
                                                        <h3><?php the_title();?></h3>
                                                        <?php if(get_field("professional_title")):?>
                                                            <p class="title"><?php echo get_field("professional_title");?></p>
                                                        <?php endif;//if get field professional_title?>
                                                    </header>
                                                    <div class="copy">
                                                        <?php the_content();?>
                                                    </div><!--.copy-->
                                                </div><!--.leader-->
                                            <?php endwhile;//while have leaders?>
                                        </section><!--.leadership .wrapper-->
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

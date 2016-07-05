<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php get_template_part("/template-parts/site-header","about"); ?>
        <div class="main-sidebar wrapper">
			<div class="sidebar wrapper">
					<?php get_sidebar(); ?>
			</div><!-- .sidebar .wrapper-->
            <main id="main" class="site-main" role="main">
                <?php if(have_posts()):
                    while(have_posts()):the_post(); ?>
                        <div class="video-copy wrapper">
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
							<section class="copy">
							    <?php the_content();?>
							</section><!--.copy-->
                        </div><!--.video-copy .wrapper-->
						<?php if(have_rows("affiliations_")): ?>
							<section class="affiliation">
								<header>
									<h2>Affiliations &amp; Certifications</h2>
								</header>
								<div class="affiliation wrapper">
									<?php while(have_rows("affiliations_")):the_row();?>
										<?php $file = get_sub_field('logo');
										$affiliation = get_sub_field('affiliation_');?>
										<?php if($file && $file['type'] === 'image' && $affiliation): ?>
											<div class="affiliation">
												<img src="<?php echo $file['url'];?>" alt="<?php echo $file['title'];?>">
												<header>
													<h3><?php echo $affiliation;?></h3>
												</header>
											</div><!--.affiliation -->
										<?php endif; //end of if for file and affilation?>    
									<?php endwhile;?>
								</div><!--.affiliation .wrapper-->
							</section><!--.affiliation-->
                        <?php endif; //if for have affiliations?>
                    <?php endwhile; //while for intializing page 
                endif; //if for initializing page?>
            </main><!-- #main -->
        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>
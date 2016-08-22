<?php
/**
 * Template Name: About
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
								<div class="video-copy-affiliation-gallery wrapper clear-bottom">
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
										</div><!--.copy-->
									</section><!--.video-copy .wrapper-->
									<?php if(have_rows("affiliations_")): ?>
										<section class="affiliation">
											<?php if(get_field("affiliation_title")):?>
                                                <header>
                                                    <h2><?php get_field("affiliation_title");?></h2>
                                                </header>
                                            <?php endif;?>
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
									<?php if(get_field("gallery")):
										$images = get_field('gallery');?>
										<?php if($images!=null && count($images)>0): ?>
											<section class="gallery">
												<div class="gallery wrapper clear-bottom">
														<?php for($i=0;$i<count($images);$i++):?>
															<div class="thumbnail">
																<a class="gallery" href="<?php echo $images[$i]['url'];?>">
																	<img src="<?php echo $images[$i]['sizes']['medium'];?>" alt="<?php echo $images[$i]['title']; ?>" class="thumbnail-img">																
																</a>
															</div><!--.thumbnail-->
														<?php endfor;?>
												</div><!--.gallery .wrapper-->
											</section>
										<?php endif; //if images ?>
									<?php endif;//if gallery?>
								</div><!--.video-copy-affiliation .wrapper-->
							</article>
		        </main><!-- #main -->
		      </div><!--.main-sidebar .wrapper-->
        <?php endif; //if for initializing page?>
	</div><!-- #primary -->

<?php
get_footer();
?>

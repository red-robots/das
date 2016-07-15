<?php
/**
 * Template Name: Video Landing
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php get_template_part("/template-parts/site-header","news"); ?>
		<div class="main-sidebar wrapper clear-bottom">
			<?php get_sidebar(); ?>
			<main id="main" class="site-main right-column" role="main">
				<div class ="flexslider-pagination wrapper clear-bottom">
					<div class="flexslider left-column">
						<ul class="slides">
							<li class="slide">
								<div class="video wrapper">
									<?php if(!empty(get_query_var('term'))):
										$args = array('post_type'=>'portfolio','posts_per_page'=>-1,'order'=>'DESC',
													'tax_query'=>array(
														array(
															'taxonomy'=>'project_type',
															'field'=>'slug',
															'terms'=>get_query_var('term')
														)
													)
												);
									else :
										$args = array('post_type'=>'portfolio','posts_per_page'=>-1,'order'=>'DESC');
									endif;
									$query = new WP_Query($args);
									$portfolio_w_video = array();
									if($query->have_posts()):
										while($query->have_posts()):$query->the_post();
											if(get_field("video")):
												$portfolio_w_video[] = $query->post->ID;
											endif;//if for has video
										endwhile; //while for all news posts; 
										wp_reset_postdata();//reset post data
									endif; //if for all news posts 	
									$query = new WP_Query(array('post__in'=>$portfolio_w_video,'post_type'=>'portfolio','posts_per_page'=>-1,'order'=>'DESC'));
									if($query->have_posts()):
										$max = $query->post_count - 1;
										$i = 0;
										while($query->have_posts()):$query->the_post();?>
											<?php if(get_field("video")): ?>
												<div class="video js-ff-blocks">
													<?php $video = get_field("video");
													preg_match("/src=\"(.+)\"/i",$video,$matches); ?>
													<iframe src="<?php echo $matches[1];?>"></iframe>
												</div><!--.video-->
												<?php $i++;//if project incriment $i?>
											<?php endif;//if featured image?> 
											<?php if($i%9==0&&$i<=($max-1)):?>
													</div><!--.video .wrapper-->
												</li><!--.slide-->
												<li class="slide">
													<div class="video wrapper">
											<?php endif; //if 9 blocks
										endwhile;//while have portfolio with videos
										wp_reset_postdata();
									endif;//if have portfolio with videos?>
								</div><!--.video .wrapper-->
							</li><!--.slide-->
						</ul><!--.slides-->
					</div><!--.flexslider .left-column-->
					<div class="right-column pagination">
					</div><!--.pagination .right-column-->
				</div><!--.flexslider-pagination .wrapper-->
			</main><!-- #main -->
		</div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>
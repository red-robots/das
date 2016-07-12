<?php
/**
 * Template Name: Portfolio Landing
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php get_template_part("/template-parts/site-header","portfolio"); ?>
		<div class="main-sidebar wrapper clear-bottom">
			<?php get_sidebar(); ?>
			<main id="main" class="site-main right-column" role="main">
				<div class ="flexslider-pagination wrapper">
					<div class="flexslider left-column">
						<ul class="slides">
							<li class="slide">
								<div class="project wrapper">
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
									if($query->have_posts()):
										$max = $query->post_count;
										for($i=0;$i<$max;$i++):$query->the_post();?>
											<?php if(get_field("featured_image")): ?>
												<div class="project">
													<?php $project_types = get_the_terms($query->post->ID,"project_type"); ?>
													<div class="title-type wrapper">
														<?php if(!is_wp_error($project_types)&&is_array($project_types)&&!empty($project_types)): ?>
														   <div class="type box"><?php echo $project_types[0]->name; ?></div>
														<?php endif; ?>                    
														<h2 class="title"><?php the_title(); ?></h2>
													</div><!--.title-type .wrapper-->
													<div class="background wrapper"></div>
													<a href="<?php echo get_the_permalink();?>" class="surrounding full-article"></a>
													<img src="<?php echo wp_get_attachment_image_src(get_field("featured_image"), 'full')[0]; ?>" alt="<?php echo $thumbnail->post_title;?>">
												</div><!--.project-->    
											<?php endif;//if featured image?> 
											<?php if($i%9==0&&$i<($max-1)&&$i!==0):?>
													</div><!--.project .wrapper-->
												</li><!--.slide-->
												<li class="slide">
													<div class="project wrapper">
											<?php endif; ?>
										<?php endfor; //while for all news posts; 
									endif; //if for all news posts
									wp_reset_postdata();?>
								</div><!--.project .wrapper-->
							</li><!--.slide-->
						</ul><!--.slides-->
					</div><!--.flexslider .left-column-->
					<div class="right-column pagination">
						<!--img here-->
					</div><!--.pagination .right-column-->
				</div><!--.flexslider-pagination .wrapper-->
			</main><!-- #main -->
		</div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>
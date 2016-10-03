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
				<div class ="isotope-footer-pagination wrapper clear-bottom">
					<?php if(get_query_var('term')):
						$args = array('post_type'=>'portfolio','posts_per_page'=>9,'order'=>'DESC',
									'tax_query'=>array(
										array(
											'taxonomy'=>'project_type',
											'field'=>'slug',
											'terms'=>get_query_var('term')
										)
									),'paged'=>get_query_var('paged')
								);
					else :
						$args = array('post_type'=>'portfolio','posts_per_page'=>9,'order'=>'DESC','paged'=>get_query_var('paged'));
					endif;
					$query = new WP_Query($args);
					if($query->have_posts()):?>
						<div class="isotope-side-pagination wrapper clear-bottom">
							<section class="project is-container left-column">
								<?php while($query->have_posts()):$query->the_post();?>
									<?php if(get_field("featured_image")): ?>
										<div class="project item">
											<?php $project_types = get_the_terms($query->post->ID,"project_type"); ?>
											<div class="title-type wrapper">
												<?php if(!is_wp_error($project_types)&&is_array($project_types)&&!empty($project_types)): ?>
												   <div class="type box"><?php echo $project_types[0]->name; ?></div>
												<?php endif; ?>                    
												<h2 class="title"><?php the_title(); ?></h2>
											</div><!--.title-type .wrapper-->
											<div class="background wrapper"></div>
											<a href="<?php echo get_the_permalink();?>" class="surrounding full-article"></a>
											<img src="<?php echo wp_get_attachment_image_src(get_field("featured_image"), 'full')[0]; ?>" alt="<?php echo get_post(get_field("featured_image"))->post_title;?>">
										</div><!--.project-->
									<?php endif;//if featured image?> 
								<?php endwhile; //while for all portfolio posts;?> 
							</section><!--.project .is-container .left-column-->
							<div class="right-column pagination wrapper">
								<?php pagi_posts_arrow_nav($query);?>
							</div><!--.pagination .right-column .wrapper-->
						</div><!--.isotope-side-pagination .wrapper-->
						<div class="pagination wrapper left-column">
							<?php pagi_posts_nav($query);?>
						</div><!--.pagination .wrapper-->
						<?php wp_reset_postdata();?>
					<?php endif; //if for all portfolio posts ?>
				</div><!--.isotope-footer-pagination .wrapper-->
			</main><!-- #main -->
		</div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>

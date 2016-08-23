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
		<?php get_template_part("/template-parts/site-header","videos"); ?>
		<div class="main-sidebar wrapper clear-bottom">
			<?php get_sidebar(); ?>
			<main id="main" class="site-main right-column" role="main">
				<div class ="isotope-footer-pagination wrapper clear-bottom">
					<?php $args = array('post_type'=>'portfolio','posts_per_page'=>-1,'order'=>'DESC');
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
					$query = new WP_Query(array('post__in'=>$portfolio_w_video,'post_type'=>'portfolio','posts_per_page'=>9,'order'=>'DESC','paged'=>get_query_var('paged')));
					if($query->have_posts()): ?>							
						<div class="isotope-side-pagination wrapper clear-bottom">
							<section class="video is-container left-column">
								<?php while($query->have_posts()):$query->the_post();?>
									<?php if(get_field("video")): ?>
										<div class="video item">
											<?php $video = get_field("video");
											preg_match("/src=\"(.+)\"/i",$video,$matches); ?>
											<iframe src="<?php echo $matches[1];?>"></iframe>
										</div><!--.video-->
									<?php endif;//if featured image?> 
								<?php endwhile;//while have portfolio with videos ?>
							</section><!--.video .is-container .left-column-->
							<div class="right-column pagination wrapper">
								<?php pagi_posts_arrow_nav($query);?>
							</div><!--.pagination .right-column .wrapper-->	
						</div><!--.isotope-side-pagination .wrapper-->
						<div class="pagination wrapper">
							<?php pagi_posts_nav($query);?>
						</div><!--.pagination .wrapper-->
						<?php wp_reset_postdata();?>
					<?php endif;//if have portfolio with videos?>
				</div><!--.isotope-footer-pagination .wrapper-->
			</main><!-- #main -->
		</div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>

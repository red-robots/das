<?php
/**
 *
 * Template Name: Our Process
 * 
 * The template for displaying the our process page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php if(have_posts()):
			the_post(); ?>
			<?php get_template_part("/template-parts/site-header","news-single"); ?>
			<div class="main-sidebar wrapper clear-bottom">
				<?php get_sidebar(); ?>
			    <main id="main" class="site-main right-column process" role="main">
					<article>
						<header><h1 class="title"><?php echo get_the_title();?></h1></header>
						<section class="copy wrapper">
							<div class="process-description wrapper">
								<?php if(get_field("process_description")):
									echo get_field("process_description");
								endif; ?>
							</div><!--.process-description .wrapper-->
							<div class="graphic-steps wrapper">
								<?php $post = get_post(244);
								setup_postdata($post);
								if(get_field("process_graphic")): ?>
									<img src="<?php echo wp_get_attachment_url(get_field("process_graphic"));?>" alt="process graphic" class="process-image">
								<?php endif;
								wp_reset_postdata();?>
								<div class="process-title wrapper clear-bottom">
									<ul>
										<?php if(get_field("step_1_name")):
											echo "<li>".get_field("step_1_name")."</li>";
										endif; ?>
										<?php if(get_field("step_2_name")):
											echo "<li>".get_field("step_2_name")."</li>";
										endif; ?>
										<?php if(get_field("step_3_name")):
											echo "<li>".get_field("step_3_name")."</li>";
										endif; ?>
										<?php if(get_field("step_4_name")):
											echo "<li>".get_field("step_4_name")."</li>";
										endif; ?>
									</ul>
								</div><!--.process-title wrapper-->
								<div class="process-steps wrapper">
									<ol>
										<?php if(get_field("step_1")):
											echo '<li class="wow zoomIn">'.get_field("step_1")."</li>";
										endif; ?>
										<?php if(get_field("step_2")):
											echo '<li class="wow zoomIn" data-wow-delay=".5s">'.get_field("step_2")."</li>";
										endif; ?>
										<?php if(get_field("step_3")):
											echo '<li class="wow zoomIn" data-wow-delay="1s">'.get_field("step_3")."</li>";
										endif; ?>
										<?php if(get_field("step_4")):
											echo '<li class="wow zoomIn" data-wow-delay="1.5s">'.get_field("step_4")."</li>";
										endif; ?>
									</ol>
								</div><!--.process-steps .wrapper-->
							</div><!--.graphic-steps .wrapper-->
						</section<!--.copy .wrapper-->
					</article>
				</main><!-- #main -->
			</section><!--.main-sidebar .wrapper-->
		<?php endif; //if for initializing page?>   
	</div><!-- #primary -->

<?php
get_footer();
?>
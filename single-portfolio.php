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
		<?php if(have_posts()):
			the_post(); ?>
	        <?php get_template_part("/template-parts/site-header","portfolio-single"); ?>
	        <div class="main-sidebar wrapper clear-bottom">
				<?php get_sidebar(); ?>
	            <main id="main" class="site-main right-column single-portfolio" role="main">
					<div class="gallery-portfolio wrapper">
						<?php if(get_field("gallery")): 
							$images = get_field("gallery");
							if($images!=null && count($images)>0): ?>
								<section class="gallery wrapper">
									<div class="featured-image left-column">
										<img src="<?php echo $images[0]['url'];?>" alt="<?php echo $images[0]['title'];?>">
									</div><!--.featured-image-->
									<div class="thumbnail wrapper right-column">
										<?php for($i=0;$i<14&&$i<count($images);$i++):?>
											<div class="thumbnail"><img src="<?php echo $images[$i]['sizes']['thumbnail'];?>" data-full-url="<?php echo $images[$i]['url'];?>" alt="<?php echo $images[$i]['title']; ?>" class="thumbnail-img"></div><!--.thumbnail-->
										<?php endfor;?>
									</div><!--.thumbnail .wrapper-->
								</section><!--.gallery .wrapper-->
							<?php endif; //if images 
						endif; //if gallery?>
						<article class="portfolio">
							<header>
								<?php $project_type = get_the_terms($post->ID,"project_type");
								if(!is_wp_error($project_type)&&is_array($project_type)): ?>
									<div class="type box"><?php echo $project_type[0]->name; ?></div>
								<?php endif; ?>
								<h1 class="title"><?php the_title();?></h1>
								<p class="location-completion-date">
                                    <?php if(get_field('location')) the_field("location");
                                    if(get_field('location')&&get_field('completion_date')) echo ' | ';
                                    if(get_field('completion_date')) echo 'Completion Date: '.get_field("completion_date");?>
                                </p>
							</header>
								<?php if(get_field("video")): ?>
									<section class="video-copy wrapper clear-bottom">
										<div class="video wrapper left-column js-blocks">
											<div class="video">
												<?php $video = get_field("video");
												preg_match("/src=\"(.+)\"/i",$video,$matches); ?>
												<iframe src="<?php echo $matches[1];?>" allowfullscreen=""></iframe>
											</div><!--.video -->
											<?php if(get_field("video_description")):?>
												<section class="video-description copy">
													<?php the_field("video_description"); ?>
												</section><!--.video-description-->
											<?php endif; ?>
											</div><!--.video .wrapper .left-column-->
											<div class="right-column copy js-blocks">
								<?php else: ?>
									<section class="copy no-column">
								<?php endif; ?>
								<?php the_field("description");?>
								<?php if(get_field("video")): ?>
									</div><!--.copy .right-column -->
								<?php endif;?>
									</section><!--.video-copy .column || .copy .no-column .wrapper-->
						</article><!--.portfolio .left-column-->
					<?php endif; //if for initializing page?>
				</section><!--.gallery-portfolio .wrapper-->
            </main><!-- #main -->
        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>

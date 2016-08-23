<?php
/**
 * Template Name: News Landing
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
				<div class="isotope-footer-pagination wrapper clear-bottom">
					<?php $query = new WP_Query(array('post_type'=>'post','posts_per_page'=>6,'order'=>'DESC','paged'=>get_query_var('paged')));
					if($query->have_posts()): ?>
						<div class="isotope-side-pagination wrapper clear-bottom">
							<div class="is-container news left-column">
								<?php while($query->have_posts()):$query->the_post(); ?>
									<article class="news item">
										<header>
											<div class="box date wrapper">
												<div class="box date"><?php echo get_the_date("n.j.Y");?></div><!--.box .date-->
											</div><!--.box .date .wrapper-->
											<?php if(has_post_thumbnail()): ?>
												<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), "large")[0]; ?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title;?>" class="featured-news-image">
											<?php endif;//if has thumbnail?>
											<h2 class="title"><?php the_title(); ?></h2>
										</header>
										<section class="copy">
											<?php $copy = strip_tags(get_the_content()); ?>
											<p><?php echo substr($copy,0,150)."..."; ?></p>
										</section>
										<div class="link full-article">
											<a href="<?php the_permalink();?>">Continue Reading</a>
										</div><!--.link .full-article-->
									</article><!--.news .item-->
								<?php endwhile; //while for all news posts;?> 
							</div><!--.is-container .news .left-column-->
							<div class="right-column pagination wrapper">
								<?php pagi_posts_arrow_nav($query);?>
							</div><!--.pagination .right-column .wrapper-->
						</div><!--.isotope-side-pagination .wrapper-->
						<div class="pagination wrapper">
							<?php pagi_posts_nav($query);?>
						</div><!--.pagination .wrapper-->
						<?php wp_reset_postdata();?>
					<?php endif; //if for all news posts ?>
				</div><!--.isotope-footer-pagination .wrapper-->
            </main><!-- #main -->
        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>

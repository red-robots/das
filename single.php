<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */
global $wp_query;

get_header(); ?>

	<div id="primary" class="content-area">
		<?php if(have_posts()):
			the_post();?>
			<?php get_template_part("/template-parts/site-header","news-single"); ?>    
			<div class="main-sidebar wrapper clear-bottom">
				<?php get_sidebar(); ?>
				<main id="main" class="site-main right-column" role="main">
					<div class="news-social-sidebar wrapper clear-bottom">
						<article class="news left-column js-blocks">
							<header>
								<div class="date box wrapper">
									<div class="date box"><?php the_date("n.j.Y");?></div><!--.date .box-->
								</div><!--.date .box .wrapper -->
								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="featured-news-image">
								<h1 class="title"><?php the_title();?></h1>
							</header>
							<section class="copy">
								<?php the_content(); ?>
							</section><!--.copy-->
							<div class="box link next-news">
								<?php $news_ids = array();
								$query = new WP_Query(array('post_type'=>'post','posts_per_page'=>-1,'order'=>'ASC'));
								if($query->have_posts()):
									while($query->have_posts()):$query->the_post();
										$news_ids[]=$query->post->ID;
									endwhile;
								endif; 
								wp_reset_postdata();
								$location_key = array_search($post->ID,$news_ids);
								$max_key = count($news_ids)-1;
								if($location_key !== false):
									if($location_key>0):
										echo '<a href="'.get_permalink($news_ids[$location_key-1]).'">Next</a>';
									else:
										echo '<a href="'.get_permalink($news_ids[$max_key]).'">Next</a>';
									endif;
								endif;
								?>
							</div>
						</article><!--.news-->
						<div class="sidebar social right-column js-blocks">
							<?php get_sidebar("social");?>
						</div><!--.right-column-->
					</div><!--.news-social-sidebar .wrapper-->
	            </main><!-- #main -->
	        </div><!--.main-sidebar .wrapper-->
        <?php endif; //if for initializing news post?>
	</div><!-- #primary -->

<?php
get_footer();
?>
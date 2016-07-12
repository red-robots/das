<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="home-primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php $post = get_post(244);
			setup_postdata($post); ?>
			<section class="slider">									
				<div class="sidebar wrapper">
					<?php get_sidebar("home"); ?>
				</div><!--.sidebar .wrapper-->
				<div class="flexslider">
					<?php if(have_rows("project_slider")): ?>
						<ul class="slides">
						<?php while(have_rows("project_slider")): the_row();
							$image_url= wp_get_attachment_image_src(get_sub_field("image"), "full")[0];
							$project_selector=get_sub_field("project_selector");
							if($image_url && $project_selector):
								$post=get_post($project_selector);
								setup_postdata($post); ?>
								<a href="<?php the_permalink();?>">
									<li class="slide">
										<div class="image-info wrapper">
											<img src="<?php echo $image_url;?>" alt="<?php echo $project_title?>" class="image">
											<div class="info">
												<?php $project_types = get_the_terms($project_selector,"project_type");
												if(!is_wp_error($project_types)&&is_array($project_types)&&!empty($project_types)): ?>
													<div class="type box"><?php echo $project_types[0]->name; ?></div>
												<?php endif; ?>
												<h2 class="title"><?php the_title(); ?></h2>	
											</div><!--.info-->
										</div><!--.image-info .wrapper-->
									</li><!--.slide-->
								</a>
							<?php endif; //if for the slide ?>
						<?php endwhile; // while for slides as a whole ?>
						</ul><!--.slides-->
						<?php wp_reset_postdata(); ?>
					<?php endif; //if for if have slides ?>
				</div><!--.flexslider-->
			</section><!--.homepage-slider-->
			<section class="featured-project">
				<div class="process left-column">
					<?php if(get_field("company_name","option")): ?>
						<p><?php the_field("company_name","option");?></p>
					<?php endif; ?>
					<?php if(get_field("process_description")): ?>
						<p><?php the_field("process description");?></p>
					<?php endif; ?>
					<?php if(get_field("process_link_text")): ?>
						<a href="<?php the_permalink(38); ?>">
							<?php the_field("process_link_text");?>
						</a>
					<?php endif; ?>
					<?php if(get_field("process_graphic")): ?>
						<img src="<?php wp_get_attachment_url(get_field("process_graphic"));?>" alt="process graphic">
					<?php endif; ?>
				</div><!--.process .left-column-->
				<div class="featured-video right-column">
					<h2>Featured Video</h2>
					<div class="video-section wrapper">
						<div class="video">
							<?php the_field("featured_video");?>
						</div><!--.video-->
						<div class="description">
							<?php if(get_field("featured_video_title")&&get_field("featured_video_description")&&get_field("featured_video_link_text")): ?>
								<h3><?php the_field("featured_video_title");?></h3>
								<p><?php the_field("featured_video_description");?></p>
								<a href="<?php the_permalink(82); ?>">
									<?php the_field("featured_video_link_text");?>
								</a>
							<?php endif; ?>
						</div><!--.description-->
					</div><!--.video-section-->
				</div><!-- .featured-video .right-column-->
				<div class="clear"></div>
			</section><!--.homepage-featured-project-->
			<section class="news">
				<div class="link box">
					<a href="<?php echo get_the_permalink(26);?>"<h2>Latest News</h2></a>
				</div><!--.link .box-->
				<div class="news wrapper is-container">
					<?php $query= new WP_Query(array('post_type'=>'post','posts_per_page'=>3));
					if($query->have_posts()):
						while($query->have_posts()): $query->the_post();?>
							<div class="news item">
								<div class="info wrapper">
									<div class="date box"><?php echo get_the_date("n.j.Y");?></div>
									<h2 class="title"><?php echo $query->post->post_title; ?></h2>
									<div class="link full-article"><a href="<?php the_permalink(); ?>">MORE</a></div><!--.link .full-article-->
								</div><!--.info .wrapper-->
								<div class="featured-news-image wrapper">
									<?php if(has_post_thumbnail()):?>
										<img src="<?php echo  wp_get_attachment_image_src(get_post_thumbnail_id(), array(150,150))[0];?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title; ?>" class="featured-news-image">
									<?php endif; //if for image ?>
								</div><!--.featured-news-image .wrapper-->
							</div><!--.news_tile-->
						<?php endwhile; //while for news posts
						wp_reset_postdata();
					endif; //if for news posts ?>
				</div><!--.news .wrapper-->
			</section><!--.homepage-news-->
		</main><!-- #main -->
	</div><!-- #home-primary -->
<?php
get_footer();
?>
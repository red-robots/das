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
			<?php get_sidebar("home"); ?>
			<div class="das-slider js-blocks">
				<?php if(have_rows("project_slider")): ?>
					<ul class="slides">
					<?php while(have_rows("project_slider")): the_row();
						$background_url= wp_get_attachment_image_src(get_sub_field("image"), "full")[0];
						$project_selector=get_sub_field("project_selector");		
						if($project_selector):
							$post=get_post($project_selector);
							setup_postdata($post);
							if($background_url===null):
								if(get_field("featured_image")) $background_url= wp_get_attachment_image_src(get_field("featured_image"), "full")[0];
							endif;
							if($background_url!==null):?>
								<li class="slide" style="background-image: url('<?php echo $background_url;?>');">
									<div class="info">
										<?php $project_types = get_the_terms($project_selector,"project_type");
										if(!is_wp_error($project_types)&&is_array($project_types)&&!empty($project_types)): ?>
											<div class="type box"><?php echo $project_types[0]->name; ?></div>
										<?php endif; ?>
										<a href="<?php the_permalink();?>"><h2 class="title"><?php the_title(); ?></h2></a>	
									</div><!--.info-->
								</li><!--.slide-->
							<?php endif;
							$post = get_post(244);
							setup_postdata($post); 
						endif; //if for the slide ?>
					<?php endwhile; // while for slides as a whole ?>
					</ul><!--.slides-->
				<?php endif; //if for if have slides ?>
			</div><!--.das-slider .js-blocks-->
		</section><!--.homepage-slider-->
		<section class="featured-project clear-bottom">
			<div class="process left-column">
				<?php if(get_field("company_name","option")): ?>
					<p class="company-name"><?php echo get_field("company_name","option");?></p>
				<?php endif; ?>
				<?php if(get_field("process_description")): ?>
					<blockquote class="process-description"><?php echo get_field("process_description");?></blockquote><!--.process-description-->
				<?php endif; ?>
				<?php if(get_field("process_link_text")): ?>
					<div class="link box"><a href="<?php the_permalink(38); ?>" class="link full-article"><?php echo get_field("process_link_text");?></a></div><!--.link.box-->
				<?php endif; ?>
				<?php if(get_field("process_graphic")): ?>
					<a href="<?php the_permalink(38); ?>" class="link full-article"><img src="<?php echo wp_get_attachment_url(get_field("process_graphic"));?>" alt="process graphic" class="process-image"></a>
				<?php endif; ?>
			</div><!--.process .left-column-->
			<div class="featured-video right-column">
				<header class="box"><?php if(get_field("featured_video_title")) echo "<h2>".get_field("featured_video_title")."</h2>";?></header>
				<div class="video-section wrapper clear-bottom">
					<?php $portfolio_w_video = array();
					$query = new WP_Query(array('post_type'=>'portfolio','posts_per_page'=>-1));
					if($query->have_posts()):
						while($query->have_posts()):$query->the_post();
							if(get_field("video")):
								$portfolio_w_video[] = $query->post->ID;//get portfolios with videos
							endif;//end of if for has video
						endwhile;//end of have posts for portfolios
					endif;//end of if posts for portfolios
					$post = get_post(244);
					setup_postdata($post);
					if(!empty($portfolio_w_video)):
						$selection = $portfolio_w_video[rand(0,count($portfolio_w_video)-1)];//get random portfolio
						$post=get_post($selection);
						setup_postdata($post);?>
						<div class="video left-column">
							<?php $video = get_field("video");
							preg_match("/src=\"(.+)\"/i",$video,$matches); ?>
							<iframe src="<?php echo $matches[1];?>"></iframe>
						</div><!--.video-->
						<div class="description right-column">	
							<?php $post = get_post(244);
							setup_postdata($post);
							$video_title  = get_field("video_technology_title");
							$video_desc = get_field("video_technology_description");
							$link_text = get_field("featured_video_link_text");		
							if($video_title): ?>
								<h3 class="title">
									<?php echo $video_title;?>
								</h3>
							<?php endif;
							if($video_desc): ?>
								<div class="video-description">
									<?php echo $video_desc;?>
								</div><!--.video-description-->
							<?php endif;
							if($link_text):?>
								<a href="<?php the_permalink(82); ?>" class="full-article link">
									<?php echo $link_text;?>
								</a>
							<?php endif;//end if for has link text?>
						</div><!--.description-->
					<?php endif;//end of if for has videos?>
				</div><!--.video-section-->
			</div><!-- .featured-video .right-column-->
		</section><!--.homepage-featured-project-->
		<section class="news">
			<?php if(get_field("news_link_text")):?>
				<header class="link box">
					<a href="<?php echo get_the_permalink(26);?>"><h2>
					<?php echo get_field("news_link_text");?></h2></a>
				</header><!--.link .box-->
			<?php endif; ?>
			<div class="news wrapper is-container">
				<?php $query= new WP_Query(array('post_type'=>'post','posts_per_page'=>3));
				if($query->have_posts()):
					while($query->have_posts()): $query->the_post();?>
						<div class="news item clear-bottom">
							<?php if(has_post_thumbnail()):?>
								<div class="info wrapper left-column js-blocks">
							<?php else: ?>
								<div class="info wrapper no-column">
							<?php endif; //if for image ?>
								<div class="date box"><?php echo get_the_date("n.j.Y");?></div>
								<h2 class="title"><?php echo $query->post->post_title; ?></h2>
								<div class="link full-article"><a href="<?php the_permalink(); ?>">MORE</a></div><!--.link .full-article-->
							</div><!--.info .wrapper-->
							<?php if(has_post_thumbnail()):?>
								<div class="featured-news-image wrapper right-column js-blocks" style="background-image: url('<?php echo  wp_get_attachment_image_src(get_post_thumbnail_id(), array(150,150))[0];?>');">
								</div><!--.featured-news-image .wrapper-->
							<?php endif; //if for image ?>
						</div><!--.news_tile-->
					<?php endwhile; //while for news posts
					$post = get_post(244);
					setup_postdata($post);
				endif; //if for news posts ?>
			</div><!--.news .wrapper-->
		</section><!--.homepage-news-->
	</main><!-- #main -->
</div><!-- #home-primary -->
<?php
get_footer();
?>
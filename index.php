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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php setup_postdata(get_post(244)); ?>
                <section class="homepage-section-slider">
                    <div class="float-left">
                        <?php get_sidebar("home"); ?>
                    </div><!-- .float-left -->
                    <div class="slides">
                        <?php if(have_rows("slider"):
                            while(have_rows("slider"): the_row();
                                $image_url=wp_get_attachment_url(get_sub_field("image"));
                                $project_title=the_sub_field("project_title");
                                $project_type=the_sub_field("project_type");
                                if($image_url)
                                ?>
                                    <div class="slide">
                                        <img src="<?php echo $image_url;?>" alt="<?php echo $project_title?>" class="image">
                                        <div class="info">
                                            <?php if($project_title): ?>
                                                <h2 class="title"><?php echo $project_title; ?></h2>
                                            <?php endif; ?>
                                            <?php if($project_type): ?>
                                                <h3 class="type"><?php echo $project_type; ?></h3>
                                            <?php endif; ?>
                                        </div><!--.info-->
                                    </div><!--.slide-->
                                <?php endif; //if for the slide ?>
                            <?php endwhile; // while for slides as a whole ?>
                        <?php endif; //if for if have slides ?>
                    </div><!--.slides-->
                </section><!--.homepage-slider-->
                <section class="homepage-section-featured-project">
                    <div class="process">
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
                    </div><!--.process-->
                    <div class="featured-video">
                            <h2>Featured Video</h2>
                        <div class="video-section-wrapper">
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
                            
                        </div><!--.video-and-description
                    </div><!-- .featured-video-->
                </section><!--.homepage-featured-project-->
                <section class="homepage-section-news">
                    <h2>Latest News</h2>
                    <?php $query=WP_Query(array('post_type'=>'post','posts_per_page'=>3));
                    if($query->have_posts()):
                        while($query->have_posts()): $query->the_post();?>
                            <div class="news_tile">
                                <?php $title=$query->post->post_title; ?>
                                <?php if(has_post_thumbnail() && $title):?>
                                    <img src="<?php wp_get_attachment_url();?>" alt="<?php echo $title; ?>" class="featured_image">
                                <?php endif; //if for image ?>
                                <p class="date"><?php the_date("n.j.Y")?></p>
                                <h2 class="title"><?php echo $title ?></h2>
                                <a href="<?php the_permalink(); ?>">MORE</a>
                            </div><!--.news_tile-->
                        <?php endwhile; //while for news posts
                    endif; //if for news posts
                    wp_reset_postdata();?>
                </section><!--.homepage-news-->
            <?php wp_reset_postdata(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>
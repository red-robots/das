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
        <?php get_template_part("/template-parts/site-header","portfolio"); ?>
        <div class="main-sidebar wrapper">
			<div class="sidebar wrapper">
				<?php get_sidebar(); ?>
			</div><!-- .sidebar .wrapper-->
            <main id="main" class="site-main" role="main">
                <?php if(have_posts()):
                    while(have_posts()):the_post(); ?>
                        <?php if(get_field("gallery")): 
                            $images = get_field("gallery");
                            if($images!=null && count($images)>0): ?>
                                <div class="gallery">
                                    <div class="featured-image">
                                        <img src="<?php echo $images[0][url];?>"    alt="<?php echo $images[0]['title'];?>">
                                    </div>
                                    <div class="thumbnails">
                                        <?php foreach($images as $image):?>
                                            <img src="<?php echo $image['sizes']['thumbnail'];?>" alt="<?php echo $image['title']; ?>" class="thumbail">
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            <?php endif; //if images 
                        endif; //if gallery?>            
                        <article class="portfolio left-column">
                            <header>
                                <?php $project_type = get_the_terms($post->ID,"project-type");
                                if(!is_wp_error($project_type)&&is_array($project_type)): ?>
                                    <div class="type box"><?php echo $project_type[0]; ?></div>
                                <?php endif; ?>
                                <h1 class="title"><?php the_title();?></h1>
                                <p class="location"><?php the_field("location");?></p>
                                <p class="completion-date">Completion Date: <?php the_field("completion_date");?></p>
                            </header>
                            <?php if(get_field("video")): ?>
                                <div class="video wrapper left-column">
                                    <div class="video">
                                        <?php the_field("video"); ?>
                                    </div>
                                    <?php if(get_field("video_description")):?>
                                        <section class="copy">
                                            <?php the_field("video_description"); ?>
                                        </section>
                                    <?php endif; ?>
                                </div><!--.video-->
                                <div class="right-column copy">
                            <?php else: ?>
                                <div class="copy">
                            <?php endif; ?>
                            <?php the_field("description");?>
                            </div><!--.copy-->
                        </article><!--.portfolio .left-column-->
                    <?php endwhile; //while for intializing page 
                endif; //if for initializing page?>
            </main><!-- #main -->
        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>
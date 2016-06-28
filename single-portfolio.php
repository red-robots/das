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
        <div class="left-column sidebar">
                <?php get_sidebar(); ?>
        </div><!-- .sidebar -->
        <div class="right-column">
            <?php get_template_part("/template-parts/site-header","portfolio"); ?>
            <main id="main" class="site-main" role="main">
                <?php if(have_posts()):
                    while(have_posts()):the_post(); ?>
                        <!-- gallery -->
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
                                </div><!--.video-->
                                <div class="right-column copy">
                            <?php else: ?>
                                <div class="copy">
                            <?php endif; ?>
                            <?php the_field("description");?>
                            </div><!--.copy-->
                        </article><!--.portfolio .left-column-->
                    <?php endwhile; 
                endif; ?>
            </main><!-- #main -->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
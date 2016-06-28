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
            <?php get_template_part("/template-parts/site-header","news"); ?>
            <main id="main" class="site-main" role="main">
                <?php if(have_posts()):
                    while(have_posts()):the_post();?>
                        <!-- gallery -->
                        <article class="news left-column">
                            <header>
                                <div class="date box"><?php the_date("n.j.Y");?></div>
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>">
                                <h1 class="title"><?php the_title();?></h1>
                            </header>
                            <div class="copy">
                                <?php the_content(); ?>
                                <!-- pagination link-->
                            </div><!--.copy-->
                        </article><!--.news-->
                    <?php endwhile;
                endif; ?>
            </main><!-- #main -->
            <aside class="right-column">
            </aside><!--.right-column-->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
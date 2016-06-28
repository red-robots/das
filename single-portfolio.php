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
                <!-- gallery -->
                <article class="portfolio left-column">
                    <header>
                    </header>
                    <!-- if video then columns and video wrapper-->
                    <div class="video wrapper left-column">
                    </div><!--.video-->
                    <!-- end if video -->
                    <div class="right-column copy">
                    </div><!--.copy-->
                </article><!--.portfolio .left-column-->
            </main><!-- #main -->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
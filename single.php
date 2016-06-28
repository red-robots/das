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
                <!-- gallery -->
                <article class="news left-column">
                    <header>
                    </header>
                    <div class="copy">
                    </div><!--.copy-->
                </article><!--.news-->
            </main><!-- #main -->
            <aside class="right-column">
            </aside><!--.right-column-->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
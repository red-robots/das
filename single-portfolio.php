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
        </div><!-- .float-left -->
		<main id="main" class="site-main right-column" role="main">
            <header>
                <!-- header information here -->
            </header>
            <!-- gallery here -->
            <article class="portfolio">
                <header>
                </header>
                <div class="video wrapper left-column">
                </div>
                <div class="right-column copy">
                </div>
            </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>
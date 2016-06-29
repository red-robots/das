<?php
/**
 * Template Name: News Landing
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
                <div id="container">
                    <?php $query = new WP_Query(array('post_type'=>'post','posts_per_page'=>-1));
                    if($query->have_posts()):
                        while($query->have_posts()):$query->the_post(); ?>
                            <div class="item">
                                
                            </div><!--.item-->
                        <?php endwhile; //while for all news posts; 
                    endif; //if for all news posts?>
                </div><!--#container-->
                <div class="additional-news">
                    <!--more news link-->
                </div><!--.additional-news-->
            </main><!-- #main -->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
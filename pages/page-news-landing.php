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
        <?php get_template_part("/template-parts/site-header","news"); ?>
        <div class="main-sidebar wrapper">
        	<div class="sidebar wrapper">
					<?php get_sidebar(); ?>
			</div><!-- .sidebar .wrapper-->
			<main id="main" class="site-main" role="main">
                <div class="flexslider left-column">
                    <ul class="slides">
                        <li class="slide"><div id="container" >
                            <?php $query = new WP_Query(array('post_type'=>'post','posts_per_page'=>-1));
                            if($query->have_posts()):
                                while($query->have_posts()):$query->the_post(); ?>
                                    <div class="item">
                                        <header>
                                            <div class="box date"><?php echo get_the_date("n.j.Y");?></div><!--.box .date-->
                                            <?php if(has_post_thumbnail()): ?>
                                                <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), array(150,150))[0]; ?>" alt="<?php echo $thumbnail->post_title;?>">
                                            <?php endif;//if has thumbnail?>
                                            <h2 class="title"><?php the_title(); ?></h2>
                                        </header>
                                        <section class="copy">
                                            <?php $copy = strip_tags(get_the_content());
                                            echo substr($copy,0,150)."..."; ?>
                                        </section>
                                        <div class="link full-article">
                                            <a href="<?php the_permalink();?>">Continue Reading</a>
                                        </div><!--.link .full-article-->
                                    </div><!--.item-->
                                <?php endwhile; //while for all news posts; 
                            endif; //if for all news posts?>
                        </div><!--#container--></li><!--.slide-->
                    </ul><!--.slides-->
                </div><!--.flexslider .left-column-->
                <div class="right-column pagination">
                    <!--img here-->
                </div><!--.pagination .right-column-->
            </main><!-- #main -->
        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>
<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */
global $wp_query;

get_header(); ?>

	<div id="primary" class="content-area">
		<?php get_template_part("/template-parts/site-header","news"); ?>    
        <div class="main-sidebar wrapper">
            <div class="sidebar wrapper">
			    <?php get_sidebar(); ?>
			</div><!-- .sidebar .wrapper-->
			<main id="main" class="site-main" role="main">
                <?php if(have_posts()):
                    while(have_posts()):the_post();?>
                        <article class="news left-column">
                            <header>
                                <div class="date box"><?php the_date("n.j.Y");?></div>
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>">
                                <h1 class="title"><?php the_title();?></h1>
                            </header>
                            <section class="copy">
                                <?php the_content(); ?>
                            </section><!--.copy-->
                            <div class="box link next-news">
                                <?php $news_ids = array();
                                $query = new WP_Query(array('post_type'=>'post','posts_per_page'=>-1));
                                if($query->have_posts()):
                                    while($query->have_posts()):$query->the_post();
                                        $news_ids[]=$query->post->ID;
                                    endwhile;
                                endif; 
                                wp_reset_postdata();
                                $location_key = array_search($post->ID,$news_ids);
                                $max_key = count($news_ids)-1;
                                if($location_key !== false):
                                    if($location_key>0):
                                        echo '<a href="'.get_permalink($news_ids[$location_key-1]).'">News</a>';
                                    else:
                                        echo '<a href="'.get_permalink($news_ids[$max_key]).'">News</a>';
                                    endif;
                                else:
                                    echo "News";
                                endif;
                                ?>
                            </div>
                        </article><!--.news-->
                        <div class="right-column">
                            <?php get_sidebar("social");?>
                        </div><!--.right-column-->
                    <?php endwhile; //while for initializing news post
                endif; //if for initializing news post?>
            </main><!-- #main -->
        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>
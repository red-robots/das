<?php
/**
 * Template Name: Portfolio Landing
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
                <div id="container">
                    <?php $query = new WP_Query(array('post_type'=>'portfolio','posts_per_page'=>9));
                    if($query->have_posts()):
                        while($query->have_posts()):$query->the_post(); ?>
                            <div class="item">
                                <?php if(get_field("featured_image")): 
                                    $thumbnail = get_post(get_field("featured_image")); ?>
                                    <img src="<?php echo wp_get_attachment_image_src($thumbnail->ID, array(200,200))[0]; ?>" alt="<?php echo $thumbnail->post_title;?>">
                                    <?php $project_types = get_the_terms($query->post->ID,"project_type");
                                    if(!is_wp_error($project_types)&&is_array($project_types)&&!empty($project_types)): ?>
                                        <div class="type box"><?php echo $project_types[0]->name; ?></div>
                                    <?php endif; ?>                    
                                    <h2 class="title"><?php the_title(); ?></h2>
                                <?php endif;//if has thumbnail?>
                            </div><!--.item-->        
                        <?php endwhile; //while for all news posts; 
                    endif; //if for all news posts?>
                </div><!--#container-->
                <!-- pagination -->
            </main><!-- #main -->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
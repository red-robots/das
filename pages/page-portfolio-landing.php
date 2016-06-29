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
                <div class="flexslider left-column">
                    <ul class="slides">
                        <li class="slide">
                            <div id="container">
                                <?php $query = new WP_Query(array('post_type'=>'portfolio','posts_per_page'=>-1));
                                if($query->have_posts()):
                                    $max = $query->post_count;
                                    for($i=1;$i<=$max;$i++):$query->the_post();?>
                                        <div class="item">
                                            <?php if(get_field("featured_image")): 
                                                $thumbnail = get_post(get_field("featured_image")); ?>
                                                <img src="<?php echo wp_get_attachment_image_src($thumbnail->ID, array(200,200))[0]; ?>" alt="<?php echo $thumbnail->post_title;?>">
                                                <?php $project_types = get_the_terms($query->post->ID,"project_type");
                                                if(!is_wp_error($project_types)&&is_array($project_types)&&!empty($project_types)): ?>
                                                    <div class="type box"><?php echo $project_types[0]->name; ?></div>
                                                <?php endif; ?>                    
                                                <h2 class="title"><?php the_title(); ?></h2>
                                            <?php endif;//if featured image?>
                                        </div><!--.item--> 
                                        <?php if($i%9==0&&$i<($max-1)):?>
                                                </div><!--#container .left-column-->
                                            </li><!--.slide-->
                                            <li class="slide">
                                                <div id="container" class="left-column">
                                        <?php endif; ?>
                                    <?php endfor; //while for all news posts; 
                                endif; //if for all news posts?>
                            </div><!--#container-->
                        </li><!--.slide-->
                    </ul><!--.slides-->
                </div><!--.flexslider .left-column-->
                <div class="right-column pagination">
                    <!--img here-->
                </div><!--.pagination .right-column-->
            </main><!-- #main -->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
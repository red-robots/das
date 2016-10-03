<?php
/**
 * Template Name: Our People
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
      <?php if(have_posts()):
	      the_post(); ?>
			<?php get_template_part("/template-parts/site-header","about"); ?>
		      <div class="main-sidebar wrapper clear-bottom">
					<?php get_sidebar(); ?>
		        <main id="main" class="site-main right-column about" role="main">
							<article>
								<header><h1 class="title"><?php echo get_the_title();?></h1></header>
								<div class="image-copy-team wrapper clear-bottom">
									<section class="image-copy wrapper clear-bottom">
										<div class="image wrapper">
                                            <?php if(get_field("team_gallery")):
                                                $images = get_field('team_gallery');?>
                                                <?php $count = count($images); 
                                                if($images!=null && $count>0): 
                                                    $i = rand(0,$count-1);?>
                                                    <img src="<?php echo wp_get_attachment_image_src($images[$i]['ID'],"full")[0];?>" alt="<?php echo $images[$i]['title']; ?>">
                                                <?php endif; //if images ?>
                                            <?php endif;//if gallery?>
										</div><!--.image-->
										<div class="copy">
											<?php the_content();?>
										</div><!--.copy-->
									</section><!--.image-copy .wrapper-->
									<?php $query = new WP_Query(array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'meta_query'=>
                                        array(
                                            'relation'=>'AND',
                                            array(
                                                'key'=>'show',
                                                'compare'=>'EXISTS',
                                            ),
                                            array(
                                                'key'=>'show',
                                                'value'=>'yes',
                                                'compare'=>'='
                                            ),
                                        ),
                                    ));
									if($query->have_posts()):?>
                                        <header class="clear-bottom">
                                            <?php if(get_field("our_people_title")):?>
                                                <h2><?php echo get_field("our_people_title");?></h2>
                                            <?php endif;?>
                                            <?php get_template_part("/template-parts/search","leader-form");?>
                                        </header>
                                        <div class="isotope-footer-pagination wrapper clear-bottom">
                                            <div class="isotope-side-pagination wrapper clear-bottom">
                                                <section class="leader is-container left-column">
                                                    <?php while($query->have_posts()):$query->the_post();?>
                                                        <div class="leader js-blocks item">
                                                            <div class="image wrapper">
                                                                <img src="<?php echo wp_get_attachment_url(get_field("picture"));?>" alt="<?php echo get_post(get_field("picture"))->post_title;?>" class="featured-leader-image">
                                                                <a class="surrounding" href="<?php echo get_the_permalink();?>"></a>
                                                            </div><!--.image .wrapper-->
                                                            <header>
                                                                <p class="link full-article"><a href="<?php echo get_the_permalink();?>">Read Bio</a></p>
                                                                <h1 class="title"><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h1>
                                                                <p class="position"><a href="<?php echo get_the_permalink();?>"><?php echo get_field("professional_title");?></a></p>
                                                            </header>
                                                        </div><!--.leader-->
                                                    <?php endwhile; //while for all portfolio posts;?> 
                                                </section><!--.project .is-container .left-column-->
                                                <div class="right-column pagination wrapper">
                                                    <?php pagi_posts_arrow_nav($query);?>
                                                </div><!--.pagination .right-column .wrapper-->
                                            </div><!--.isotope-side-pagination .wrapper-->
                                            <div class="pagination wrapper left-column">
                                                <?php pagi_posts_nav($query);?>
                                            </div><!--.pagination .wrapper-->
                                        </div><!--.isotope-footer-pagination .wrapper-->
                                    <?php endif;//if have leaders?>
								</div><!--.image-copy-team .wrapper-->
							</article>
		        </main><!-- #main -->
		      </div><!--.main-sidebar .wrapper-->
        <?php endif; //if for initializing page?>
	</div><!-- #primary -->

<?php
get_footer();
?>

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
		<?php get_template_part("/template-parts/site-header","about"); ?>
        <div class="main-sidebar wrapper">
			<div class="sidebar wrapper">
					<?php get_sidebar(); ?>
			</div><!-- .sidebar .wrapper-->
            <main id="main" class="site-main" role="main">
                <?php if(have_posts()):
                    while(have_posts()):the_post(); ?>
                        <div class="video-copy wrapper">
                            <section class="copy">
                                <?php the_content();?>
                            </section><!--.copy-->
                            <div class="video">
                                <?php $videos = array();
								$query = new WP_Query(array('post_type'=>'portfolio','posts_per_page'=>-1));
								if($query->have_posts()):
									while($query->have_posts()):$query->the_post();
										if(get_field("video")):
											$videos[] = get_field("video");
										endif;//end of if for has video
									endwhile;//end of have posts for portfolios
								endif;//end of if posts for portfolios
								wp_reset_postdata();
								if(!empty($videos)):
									echo $videos[rand(0,count($videos)-1)];//insert random video
								endif;//end of if for has videos?>
                            </div><!--.video-->
                        </div><!--.video-copy .wrapper-->
                        <?php if(have_rows("affiliations_")): ?>
                            <div class="affiliation wrapper">
                                <?php while(have_rows("affiliations_")):the_row();?>
                                    <?php $file = get_sub_field('logo');
                                    $affiliation = get_sub_field('affiliation_');?>
                                    <?php if($file && trim($file['type']) === 'image' && $affiliation): ?>
                                        <div class="affiliation">
											<img src="<?php echo $file['sizes']['thumbnail'];?>" alt="<?php echo $file['title'];?>">
											<h2><?php echo $affiliation;?></h2>
										</div><!--.affiliation -->
                                    <?php endif; //end of if for file and affilation?>    
                                <?php endwhile;?>
                            </div><!--.affiliation .wrapper-->
                        <?php endif; ?>
                    <?php endwhile; //while for intializing page 
                endif; //if for initializing page?>
            </main><!-- #main -->
        </div><!--.main-sidebar .wrapper-->
	</div><!-- #primary -->

<?php
get_footer();
?>
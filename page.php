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
            <?php get_template_part("/template-parts/site-header","about"); ?>
            <main id="main" class="site-main" role="main">
                <?php if(have_posts()):
                    while(have_posts()):the_post(); ?>
                        <div class="video-copy wrapper">
                            <section class="copy">
                                <?php the_content();?>
                            </section><!--.copy-->
                            <div class="video">
                                <!--insert random video-->
                            </div><!--.video-->
                        </div><!--.video-copy .wrapper-->
                        <?php if(have_rows("affiliations_")): ?>
                            <div class="affiliation wrapper">
                                <?php while(have_rows("affiliations_")):the_row();?>
                                    <?php $file = get_sub_field('logo');
                                    $affiliation = get_sub_field('affiliation_');?>
                                    <div class="affiliation">
                                        <?php if($file && trim($file['type']) === 'image' && $affiliation): ?>
                                            <img src="<?php echo $file['sizes']['thumbnail'];?>" alt="<?php echo $file['title'];?>">
                                        <?php endif; ?>
                                        <h2><?php echo $affiliation;?></h2>
                                    </div><!--.affiliation -->
                                <?php endwhile;?>
                            </div><!--.affiliation .wrapper-->
                        <?php endif; ?>
                    <?php endwhile; //while for intializing page 
                endif; //if for initializing page?>
            </main><!-- #main -->
        </div><!--.right-column-->
	</div><!-- #primary -->

<?php
get_footer();
?>
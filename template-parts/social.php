<?php
/*
 * Template part for displaying social icons
 */
?>
<ul class="social">
	<?php if(get_field("linkedin_link","option")):?>
		<li class="linkedin">
			<a href="<?php echo get_field("linkedin_link","option");?>" target="_blank"><i class="fa fa-linkedin"></i></a>
		</li>
	<?php endif;?>
	<?php if(get_field("facebook_link","option")):?>
		<li class="facebook">
			<a href="<?php echo get_field("facebook_link","option");?>" target="_blank"><i class="fa fa-facebook"></i></a>
		</li>
	<?php endif;?>
	<?php if(get_field("twitter_link","option")):?>
		<li class="twitter">
			<a href="<?php echo get_field("twitter_link","option");?>" target="_blank"><i class="fa fa-twitter"></i></a>
		</li>
	<?php endif;?>
</ul>

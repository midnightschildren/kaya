<?php
/*
Template Name: Kaya Donate Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>
<div class="grid-whole papertop"></div>
<div id="author_landing" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-12 s-grid-16 m-grid-14">

<div class="grid-5 m-grid-6 s-grid-6 s-padded-sides padded-inner-right">


	<ul class="padded-inner about-sidebar" id="sidebar">
		<h2 class="gray absk">About Kaya</h2>
		<?php dynamic_sidebar( 'about-menu' ); ?>
	</ul>


</div>

<div class="grid-11 m-grid-10 s-grid-10 padded-inner">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<div class="grid-whole">



<h2 class="book-title gray padded-bottom"><?php the_field('donate_main_title'); ?></h2>
<?php if(get_field('contribute_subtitle')): ?> 

<div class="grid-whole"><p class="emphtext"><?php the_field('contribute_subtitle'); ?></p></div>
<div class="grid-whole"><?php the_field('contribute_text'); ?></div>
<?php endif; ?>

<div class="grid-whole padded-bottom">
	<div class="grid-whole background-beige">
	
		<div class="grid-whole padded-inner">
			<div class="grid-6 s-grid-whole s-padded-bottom">
			<?php 	$attachment_id = get_field('donate_image');
					$size = "book-thumb";
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
			<img src="<?php echo $image[0]; ?>" class="wp-post-image" />
			</div>

			<div class="grid-10 s-grid-whole padded-inner-sides">
			
			<h2 class="book-title gray padded-bottom"><?php the_field('donate_now_title'); ?></h2>
			<div class="grid-whole emphtext padded-bottom"><?php the_field('donate_now'); ?></div>
			
			<?php if (get_field('donate_paypal'))
			{ ?> 

			<div id="donate" class="padded-top">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

      		<input type="hidden" name="cmd" value="_s-xclick">
      		<input type="hidden" name="hosted_button_id" value="<?php the_field('donate_paypal');?>">
			<input type="image" src="/wp-content/themes/kaya_theme/parts/donate-button-sm.png" border="0" name="submit" class="donate-sm" alt="PayPal - The safer, easier way to pay online!"> 
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> 
    		</form>
    		</div>

			<?php } ?>

			</div>
		</div>
	<div class="papertop grid-whole">&nbsp;</div>
	</div>
	
</div>	

<div class="grid-whole padded-bottom">
	<div class="grid-whole background-beige">
	
		<div class="grid-whole padded-inner">
			<div class="grid-6 s-grid-whole s-padded-bottom">
			<?php 	$attachment_id = get_field('monthly_image');
					$size = "book-thumb";
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
			<img src="<?php echo $image[0]; ?>" class="wp-post-image" />
			</div>

			<div class="grid-10 s-grid-whole padded-inner-sides">
			
			<h2 class="book-title gray padded-bottom"><?php the_field('monthly_giving_title'); ?></h2>
			<div class="grid-whole emphtext padded-bottom"><?php the_field('monthly_giving'); ?></div>
			
			<?php if (get_field('monthly_paypal'))
			{ ?> 

			<div id="donate" class="padded-top">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

      		<input type="hidden" name="cmd" value="_s-xclick">
      		<input type="hidden" name="hosted_button_id" value="<?php the_field('monthly_paypal');?>">
			<input type="image" src="/wp-content/themes/kaya_theme/parts/donate-button.png" border="0" name="submit" class="donate-monthly" alt="PayPal - The safer, easier way to pay online!"> 
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> 
    		</form>
    		</div>

			<?php } ?>

			</div>
		</div>
	<div class="papertop grid-whole">&nbsp;</div>
	</div>
	
</div>

<div class="grid-whole padded-top"><p class="emphtext"><?php the_field('more_ways_section_title'); ?></p></div>
<?php if(get_field('more_ways')): ?>

 
	<?php while(has_sub_field('more_ways')): ?>
 
		<div class="grid-whole emphtext gray"><?php the_sub_field('more_ways_title'); ?></div>
		    <div class="grid-whole"><?php the_sub_field('more_ways_text'); ?></div>
	
	<?php endwhile; ?>

<?php endif; ?>




</div>
<?php endwhile; ?>
</div>


</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
</div>
<div class="grid-whole paper"></div>
<div id="quote" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="padded-inner grid-12 s-grid-16 m-grid-14 center">

<?php
$quote_query = new WP_Query( array(
        'post_type' => 'quotes',
        'posts_per_page' => 1,
        'orderby' => 'rand'
        
        
    ) )
?>
<?php if ($quote_query->have_posts()) : while ($quote_query->have_posts()) : $quote_query->the_post(); ?>
	<p class="quote"><?php $posts = get_field('quote_source');if ($posts): foreach($posts as $post_object): ?>
    <a href="<?php echo get_permalink($post_object->ID); ?>"><?php endforeach; endif; ?><?php the_field('quote_text'); ?></a></p>
	<p class="attribution"><?php the_field('quote_attribution'); ?></p>
<?php endwhile; endif; ?>	

</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
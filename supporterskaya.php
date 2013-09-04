<?php
/*
Template Name: Kaya Supporters Page
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
<h2 class="book-title gray padded-bottom">Kaya is generously funded by:</h2>
<div class="grid-whole padded-top">
<?php if(get_field('about_supporter_funder')): ?>
 <ul class="aboutpeoplestaff">
	<?php while(has_sub_field('supporter_funder')): ?>
 
		<li><?php the_sub_field('supporter_funder'); ?></li>
	
	<?php endwhile; ?>
</ul>
<?php endif; ?>
<?php if(get_field('about_supporter_benefactor')): ?>
<h2 class="book-title gray padded-vertical">Benefactors</h2>
<ul class="aboutpeoplestaff">
	<?php while(has_sub_field('supporter_benefactor')): ?>
 		
		<li><?php the_sub_field('supporter_benefactor'); ?></li>	
 		
	<?php endwhile; ?>
 </ul>
<?php endif; ?>
<?php if(get_field('about_supporter_patron')): ?>
<h2 class="book-title gray padded-vertical">Patrons</h2>
<ul class="aboutpeoplestaff">
	<?php while(has_sub_field('supporter_patron')): ?>
 		
		<li><?php the_sub_field('supporter_patron'); ?></li>	
 		
	<?php endwhile; ?>
 </ul>
<?php endif; ?>
<?php if(get_field('about_supporter_sponsor')): ?>
<h2 class="book-title gray padded-vertical">Sponsors</h2>
<ul class="aboutpeoplestaff">
	<?php while(has_sub_field('supporter_sponsor')): ?>
 		
		<li><?php the_sub_field('supporter_sponsor'); ?></li>	
 		
	<?php endwhile; ?>
 </ul>
<?php endif; ?>
<?php if(get_field('about_supporter_friend')): ?>
<h2 class="book-title gray padded-vertical">Friends</h2>
<ul class="aboutpeoplestaff">
	<?php while(has_sub_field('supporter_friend')): ?>
 		
		<li><?php the_sub_field('supporter_friend'); ?></li>	
 		
	<?php endwhile; ?>
 </ul>
<?php endif; ?>
<?php if(get_field('about_supporter_member')): ?>
<h2 class="book-title gray padded-vertical">Members</h2>
<ul class="aboutpeoplestaff">
	<?php while(has_sub_field('supporter_member')): ?>
 		
		<li><?php the_sub_field('supporter_member'); ?></li>	
 		
	<?php endwhile; ?>
 </ul>
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
<?php
/*
Template Name: Kaya Press Page
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

<?php if(get_field('abp_pak')): ?>

<h2 class="book-title gray padded-bottom">Press About Kaya Press</h2>
 <ul class="aboutpeoplestaff">
	<?php while(has_sub_field('abp_pak')): ?>
 
		<li class="padded-bottom"><div class="grid-whole event_title"><?php the_sub_field('press_title'); ?></div>
		    <a class="press_link_css" href="<?php the_sub_field('press_link'); ?>"><?php the_sub_field('press_link_text'); ?></a></li>
	
	<?php endwhile; ?>
</ul>
<?php endif; ?>


<?php if(get_field('abp_pab')): ?>

<h2 class="book-title gray padded-bottom">Press About Kaya Authors</h2>
 <ul class="aboutpeoplestaff">
	<?php while(has_sub_field('abp_pab')): ?>
 
		<li class="padded-bottom"><div class="grid-whole event_title"><?php the_sub_field('press_titleb'); ?></div>
		    <a class="press_link_css" href="<?php the_sub_field('press_linkb'); ?>"><?php the_sub_field('press_link_textb'); ?></a></li>
	
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
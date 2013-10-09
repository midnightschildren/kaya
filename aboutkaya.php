<?php
/*
Template Name: Kaya About Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>
<div class="grid-whole papertop"></div>
<div id="author_landing" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-12 s-grid-16 m-grid-14">

<div class="s-grid-whole m-hidden l-hidden padded-inner-sides spd">
	<div class="diaspora children"><a id="simple-menu" href="#sidr" class="event_title"><strong>+ Menu</strong></a></div>

</div>

<div id="sidr">
<div class="s-grid-whole m-hidden l-hidden s-padded-sides padded-inner-right">

<div class="background-white grid-whole">
	<ul class="padded-inner about-sidebar" id="sidebar">
		<h2 class="gray absk">About Kaya</h2>
		<?php dynamic_sidebar( 'about-menu' ); ?>
	</ul>
</div>
<div class="grid-whole paper"></div>

</div>
</div>

<div class="grid-5 m-grid-6 s-grid-6 s-hidden s-padded-sides padded-inner-right">


	<ul class="padded-inner about-sidebar" id="sidebar">
		<h2 class="diaspora gray absk">About Kaya</h2>
		<?php dynamic_sidebar( 'about-menu' ); ?>
	</ul>



</div>

<div class="grid-11 m-grid-10 s-grid-16 padded-inner">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h2 class="book-title gray padded-bottom"><?php the_field('mission_title'); ?></h2>
<div class="grid-whole padded-top"><?php the_field('our_mission'); ?></div>

<h2 class="book-title gray padded-bottom"><?php the_field('history_title'); ?></h2>
<div class="grid-whole padded-top"><?php the_field('kaya_history'); ?></div>

<h2 class="book-title gray padded-bottom"><?php the_field('meaning_title'); ?></h2>
<div class="grid-whole padded-top"><?php the_field('kaya_meaning'); ?></div>

<h2 class="book-title gray padded-bottom"><?php the_field('logo_title'); ?></h2>
<div class="grid-whole padded-top"><?php the_field('about_our_logo'); ?></div>

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
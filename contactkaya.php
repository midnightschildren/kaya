<?php
/*
Template Name: Kaya Contact Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>
<div class="grid-whole papertop"></div>
<div id="author_landing" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-12 s-grid-16 m-grid-14">


<div id="sidr">
<div class="s-grid-whole m-hidden l-hidden padded-bottom">

<div class="background-white grid-whole">
	<ul class="padded-inner about-sidebar" id="sidebar">
		<h2 class="gray absk">About Kaya</h2>
		<?php dynamic_sidebar( 'about-menu' ); ?>
	</ul>
</div>
<div class="grid-whole spd"></div>

</div>
</div>

<div class="grid-5 m-grid-6 s-hidden s-padded-sides padded-inner-right">


	<ul class="padded-inner about-sidebar" id="sidebar">
		<h2 class="diaspora gray absk">About Kaya</h2>
		<?php dynamic_sidebar( 'about-menu' ); ?>
	</ul>


</div>

<div class="grid-11 m-grid-10 s-grid-16 padded-inner">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<div class="grid-whole padded-bottom">

<span class="m-hidden l-hidden diaspora children flow-opposite">
	<a rel="toggle[sidr]" href="#" class="event_title"><strong>&#x271a;Menu</strong></a>
</span>

<h2 class="book-title gray padded-bottom"><?php the_field('section_1_title'); ?></h2>

<p><strong>Kaya Press</strong> <br />
	<?php the_field('address_line_1'); ?> <br />
	<?php the_field('address_line_2'); ?> <br />
	<?php the_field('address_line_3'); ?> </p>

<p><strong>Phone</strong> <br />
	<?php the_field('phone'); ?> </p>

<div id="comgroup" class="grid-whole">
	
<?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); } ?>
	
</div>
<div class="grid-whole padded-bottom">
<h2 class="diaspora gray submanager"><a href="#" rel="toggle[comgroup]" class="commentlink" title="commentcol" style="z-index:50; position:relative;"><?php the_field('section_1_form_title'); ?></a></h2>
<div id="com" class="grid-14 s-grid-13 m-grid-14"></div>
<div id="coma" class="grid-2 s-grid-3 m-grid-2 padded-inner-sides">
		<div class="arrow-container">
		<div class="arrow-down-border"></div>
		<div class="arrow-down"></div>
		</div>
</div>
</div>

</div>

<div class="grid-whole padded-vertical">



<h2 class="book-title gray padded-vertical"><?php the_field('section_2_title'); ?></h2>


	<?php the_field('distributers'); ?> 

<h2 class="book-title gray padded-vertical"><?php the_field('section_3_title'); ?></h2>

	<p><?php the_field('section_3_text'); ?>

<div id="comgroup2" class="grid-whole">
	
<?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 3 ); } ?>
	
</div>
<div class="grid-whole padded-bottom">
<h2 class="diaspora gray submanager"><a href="#" rel="toggle[comgroup2]" class="commentlink" title="commentcol" style="z-index:50; position:relative;"><?php the_field('section_3_form_title'); ?></a></h2>
<div id="com" class="grid-14 s-grid-13 m-grid-14"></div>
<div id="coma" class="grid-2 s-grid-3 m-grid-2 padded-inner-sides">
		<div class="arrow-container">
		<div class="arrow-down-border"></div>
		<div class="arrow-down"></div>
		</div>
</div>
</div>

</div>

<div class="grid-whole padded-vertical">



<h2 class="book-title gray padded-vertical"><?php the_field('section_4_title'); ?></h2>


	<p><?php the_field('section_4_text'); ?>

<div id="comgroup3" class="grid-whole">
	
<?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 4 ); } ?>
	
</div>
<div class="grid-whole padded-bottom">
<h2 class="diaspora gray submanager"><a href="#" rel="toggle[comgroup3]" class="commentlink" title="commentcol" style="z-index:50; position:relative;"><?php the_field('section_4_form_title'); ?></a></h2>
<div id="com" class="grid-14 s-grid-13 m-grid-14"></div>
<div id="coma" class="grid-2 s-grid-3 m-grid-2 padded-inner-sides">
		<div class="arrow-container">
		<div class="arrow-down-border"></div>
		<div class="arrow-down"></div>
		</div>
</div>
</div>

</div>

<div class="grid-whole padded-vertical">



<h2 class="book-title gray padded-vertical"><?php the_field('section_5_title'); ?></h2>


	<p><?php the_field('section_5_text'); ?>

<div id="comgroup4" class="grid-whole">
	
<?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 5 ); } ?>
	
</div>
<div class="grid-whole padded-bottom">
<h2 class="diaspora gray submanager"><a href="#" rel="toggle[comgroup4]" class="commentlink" title="commentcol" style="z-index:50; position:relative;"><?php the_field('section_5_form_title'); ?></a></h2>
<div id="com" class="grid-14 s-grid-13 m-grid-14"></div>
<div id="coma" class="grid-2 s-grid-3 m-grid-2 padded-inner-sides">
		<div class="arrow-container">
		<div class="arrow-down-border"></div>
		<div class="arrow-down"></div>
		</div>
</div>
</div>

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
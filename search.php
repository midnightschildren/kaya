<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>
<div class="grid-whole papertop"></div>
<div id="author_landing" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-12 s-grid-16 m-grid-14">


<div class="grid-12 m-grid-11 s-grid-10 padded-inner">


<?php if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>


<div class="grid-whole padded-inner-bottom news-width">
<div class="grid-whole s-grid-whole s-padded-sides background-beige padded-inner">
	
		<article>
			<div class="grid-6 s-grid-whole s-padded-vertical m-padded-right l-padded-right"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
					<div class="s-hidden"><?php the_post_thumbnail('news-image'); ?></div><div class="m-hidden l-hidden"><?php the_post_thumbnail('news-featured'); ?></div></a>
			</div>
			<div class="grid-10 s-grid-whole m-padded-left l-padded-left">
			<div class="grid-whole padded-bottom"><a class="event_title booktitle2" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
			<div class="grid-whole padded-vertical timetitle"><?php the_terms($post->ID, 'topics', '', ' | '); ?></div>
			<div class="grid-whole padded-bottom timetitle">ON <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time></div> 
			<?php if ( 'books' == get_post_type() ) { ?>
			<div class="grid-whole padded-top"><?php the_field('description'); ?></div>
			<?php } else if ( 'authors' == get_post_type() ) { ?>
			<div class="grid-whole padded-top"><?php the_field('bio'); ?></div>
			<?php } else { ?>
			<div class="grid-whole padded-top"><?php the_excerpt(); ?></div>
			<?php } ?>
			</div>
		</article>
		
<div class="grid-whole padded-vertical s-hidden dotted"></div>
</div>
</div>

<?php
endwhile; ?>

<div class="grid-whole news-width">
<div class="grid-6 nav-previous timetitle slightlylg"><?php next_posts_link( '<div class="arrow2lt"><span title="Back" class="carouselback"></span></div>'); ?><?php next_posts_link( 'Older' ); ?></div>
<div class="grid-6 nav-next flow-opposite timetitle slightlylg"><?php previous_posts_link( '<div class="arrow2"><span title="Next" class="carouselnext"></span></div>' ); ?><div class="flow-opposite"><?php previous_posts_link( 'Newer' ); ?></div></div>
</div>

<?php else: ?>
<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
<?php endif; ?>
</div>

<div class="grid-4 m-grid-5 s-grid-6 s-padded-left padded-inner-left">

<?php if ( is_active_sidebar( 'side-menu' ) ) : ?>
	<ul class="padded-inner" id="sidebar">
		<?php dynamic_sidebar( 'side-menu' ); ?>
	</ul>
<?php endif; ?>

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
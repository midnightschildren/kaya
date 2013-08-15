<?php
/**
 * The template used to display Tag Archive pages
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


<div class="grid-12 padded-inner-right">
<?php
$counter = 1; //start counter
$row = 1;
$grids = 2; //Grids per row ?>

<?php if ( have_posts() ): ?>

<? $totalposts = sizeof($posts); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
//Show the left hand side column
if($counter == 1) :
?>
<div class="grid-half padded-inner-right">
	<li class="padded-top">
		<article>
			<div class="grid-whole"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('news-image'); ?></a></div>
			<div class="grid-whole"><a class="event_title booktitle2" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
			<div class="grid-whole timetitle"><?php the_tags('', '|'); ?></div>
			<div class="grid-whole timetitle"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time></div> 
			<?php the_excerpt(); ?>
		</article>
	</li>
</div>

<?php
//Show the right hand side column
elseif($counter == $grids) :
?>

<div class="grid-half padded-inner-left">
	<li class="padded-top">
		<article>
			<div class="grid-whole"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail('news-image'); ?></a></div>
			<div class="grid-whole"><a class="event_title booktitle2" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
			<div class="grid-whole timetitle"><?php the_tags('', '|'); ?></div>
			<div class="grid-whole timetitle"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time></div> 
			<?php the_excerpt(); ?>
		</article>
	</li>	
</div>
<?php if(($row<$totalposts)&&($row < 5)) : ?><div class="grid-whole dotted"></div><?php endif; ?>

<?php
$counter = 0;
endif;
?>


<?php
$counter++;
$row++;
endwhile; ?>

<div class="grid-whole">
<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
</div>

<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>
</div>

<div class="grid-4 padded-inner-left">Sidebar</div>

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
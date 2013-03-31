<?php
/**
 * The Template for single books
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

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="grid-whole background-white">
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="padded-inner grid-14 s-grid-16 m-grid-14">

<article>
<div class="grid-7 s-grid-whole padded-sides">
<?php if (get_field('scribd')){  
	the_field('scribd');
} else { ?>
<div class="grid-3 s-hidden">&nbsp;</div>
<div class="grid-13">
<div class="booklanding">
<?php the_post_thumbnail('book-landing'); 
}	?> 
</div>
</div>
<div class="grid-whole s-grid-whole padded-sides">
<?php foreach(get_field('author') as $post_object): ?>
 <a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID) ?></a> NEWS
<?php endforeach; ?>
</div>
</div>
<div class="grid-9 s-grid-whole padded-sides">
      <header>
        <h2 class="book-title gray"><?php the_title(); ?></h2>

<?php foreach(get_field('author') as $post_object): ?>
    <strong>by <a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID) ?></a></strong>
<?php endforeach; ?>


      </header>

<strong><?php the_field('pages'); ?>pp | <?php the_field('format'); ?> | ISBN <?php the_field('isbn'); ?></strong>

<div id="simplecart">

<div class="price">$<?php the_field('price'); ?> 

<?php if (get_field('amazon'))
{ ?> 
<a href="<?php the_field('amazon');?>"><img alt="Btnbuy" src="/wp-content/uploads/2013/03/buy-button.png" /></a>
<?php } ?>
</div>

</div>

<?php the_field('description'); ?>

<?php if (get_field('praise'))
{ ?> 
<h5><span>praise</span></h5>
<?php the_field('praise'); ?>
<?php } ?>

<?php if (get_field('awards'))
{ ?> 
<strong>Awards:</strong><br />
<?php the_field('awards'); ?>
<?php } ?>

</div>

</article>

</div>
<div class="grid-1 s-hidden">&nbsp;</div>
</div>
<?php endwhile; ?>

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
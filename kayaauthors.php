<?php
/*
Template Name: Kaya Authors Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>

<div id="author_landing" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-12 s-grid-16 m-grid-14 center">


<?php
$head_query = new WP_Query( array(
        'post_type' => 'authors',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'         
    ) );

$divider = 5;

?>



<?php if ($head_query->have_posts()) :  ?>
<div class="grid-whole">

<?php while ($head_query->have_posts()) : $head_query->the_post(); ?>
<div class="grid-1">&nbsp;</div>
<div class="grid-2">
<div class="grid-whole"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('author-thumb'); ?></a></div>
<div class="grid-whole"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
</div>
<?php $current_position = $head_query->current_post + 1; ?>
<?php if($current_position < $head_query->found_posts && $current_position % $divider == 0 ) : ?>
<div class="grid-1">&nbsp;</div></div>
<div class="grid-whole">
<?php endif; ?>
<?php endwhile; ?>
</div>
<? endif; ?>
</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
</div>

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
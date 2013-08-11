<?php
/**
 * The Template for displaying all single author posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php $single_amar = clone $wp_query; ?>



<div id="single-book" class="grid-whole background-white">
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
<div class="grid-14 s-grid-16 m-grid-16">

<?php

    $author_term_query = new WP_Query( array(
        'post_type' => 'authors',
        'posts_per_page' => -1,
        'orderby' => 'rand'
        
    ) )
    ?>

<ul> 
    <?php
    if ( $author_term_query->have_posts() ) : while ( $author_term_query->have_posts() ) : $author_term_query->the_post(); ?>
    
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

	<?php endwhile; endif; ?>
</ul>

<?php wp_reset_postdata();?>

<?php $author_term_query = null; $wp_query = clone $single_amar; ?><?php rewind_posts(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article>

	<h2><?php the_title(); ?></h2>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> 
	<?php the_content(); ?>			

	<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	<h3>About <?php echo get_the_author() ; ?></h3>
	<?php the_author_meta( 'description' ); ?>
	<?php endif; ?>

	

</article>

</div>
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
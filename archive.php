<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

<div id="author_landing" class="grid-whole container_test">

<div id="bi-slider" class="mi-slider">

<?php $queried_object = get_queried_object();
$term_id = $queried_object->term_id;?>

<?php

    $genre_term_query4 = new WP_Query( array(
        'post_type' => 'books',
        'posts_per_page' => -1,
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'book_genre',
                'terms' => array( $queried_object->slug ),
                'field' => 'slug',
                'operator' => 'IN'
            )
        )
    ) )
    ?>

<ul class="spnone">
    <?php
    if ( $genre_term_query4->have_posts() ) : while ( $genre_term_query4->have_posts() ) : $genre_term_query4->the_post(); ?>
    
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('book-thumb'); ?></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $posts = get_field('author');if ($posts): foreach($posts as $post): setup_postdata($post); ?>
    <a class="black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
<?php endforeach; wp_reset_postdata(); endif;?>
    <?php endwhile; endif; ?>
</ul>

 

<?php

    $genre_term_query3 = new WP_Query( array(
        'post_type' => 'books',
        'posts_per_page' => -1,
        'orderby' => 'rand'
        
    ) )
    ?>

<ul> 
    <?php
    if ( $genre_term_query3->have_posts() ) : while ( $genre_term_query3->have_posts() ) : $genre_term_query3->the_post(); ?>
    
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('book-thumb'); ?></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $posts = get_field('author');if ($posts): foreach($posts as $post): setup_postdata($post); ?>
    <a class="black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
<?php endforeach; wp_reset_postdata(); endif;?>
    <?php endwhile; endif; ?>

</ul>


<?php
$genre_terms = get_terms( 'book_genre',  array(
    'number' => 4,
    'exclude' => array (56, 62, $term_id)
)); ?>

<?php
foreach ( $genre_terms as $genre_term ) {
    $genre_term_query2 = new WP_Query( array(
        'post_type' => 'books',
        'posts_per_page' => -1,
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'book_genre',
                'terms' => array( $genre_term->slug ),
                'field' => 'slug',
                'operator' => 'IN'
            )
        )
    ) )
    ?>

<ul class="spnone">
    <?php
    if ( $genre_term_query2->have_posts() ) : while ( $genre_term_query2->have_posts() ) : $genre_term_query2->the_post(); ?>
    
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('book-thumb'); ?></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $posts = get_field('author');if ($posts): foreach($posts as $post): setup_postdata($post); ?>
    <a class="black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
<?php endforeach; wp_reset_postdata(); endif;?>
    <?php endwhile; endif; ?>
</ul>

    <?php
}

?>
<div class="grid-whole background-gray">
<nav>
	<a id="CurrentBtn" href="#"><?php echo $queried_object->name; ?></a>
	<a id="AllBtn" href="#">All</a>
<?php
$i = 3;
foreach ( $genre_terms as $genre_term ) {
    $genre_term_query = new WP_Query( array(
        'post_type' => 'books',
        'tax_query' => array(
            array(
                'taxonomy' => 'book_genre',
                'terms' => array( $genre_term->slug ),
                'operator' => 'IN'
            )
        )
    ) );
    ?>

    <a id="A<?php echo $i ?>Btn" href="#"><?php echo $genre_term->name; ?></a><?php
    $i++;

    $genre_term_query = null;
    wp_reset_postdata();
}

?>

</nav>
<div class="grid-whole papertop"></div>
</div>
<div class="clearit"></div>
</div>

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

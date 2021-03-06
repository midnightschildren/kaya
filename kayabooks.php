<?php
/*
Template Name: Kaya Books Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>

<div id="author_landing" class="grid-whole container_test">

<div id="bi-slider" class="mi-slider">

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
    <?php   $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'category-thumb' ); 
            $retina = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'book-thumb' );
    ?>
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <span data-picture data-alt="<?php the_title(); ?>">
        <span  data-width="200" data-height="283" data-src="<?php echo $thumb['0'] ?>"></span>
        <span  data-width="338" data-height="478" data-src="<?php echo $retina['0'] ?>"     data-media="only screen and (-webkit-min-device-pixel-ratio:2), only screen and (min--moz-device-pixel-ratio:2), only screen and (-o-min-device-pixel-ratio:2/1), only screen and (min-device-pixel-ratio:2), only screen and (min-resolution:192dpi), only screen and (min-resolution:2dppx)"></span>
        <noscript>
            <img width="200" height="283" src="<?php echo $thumb['0'] ?>" alt="<?php the_title(); ?>">
        </noscript>
</span></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $posts = get_field('author');if ($posts): foreach($posts as $post): setup_postdata($post); ?>
    <a class="black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
<?php endforeach; wp_reset_postdata(); endif;?>
    <?php endwhile; endif; ?>

</ul>


<?php
$genre_terms = get_terms( 'book_genre',  array(
    'number' => 5,
    'exclude' => array (56, 62)
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
    <?php   $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'category-thumb' ); 
            $retina = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'book-thumb' );
    ?>
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
<span data-picture data-alt="<?php the_title(); ?>">
        <span  data-width="200" data-height="283" data-src="<?php echo $thumb['0'] ?>"></span>
        <span  data-width="338" data-height="478" data-src="<?php echo $retina['0'] ?>"     data-media="only screen and (-webkit-min-device-pixel-ratio:2), only screen and (min--moz-device-pixel-ratio:2), only screen and (-o-min-device-pixel-ratio:2/1), only screen and (min-device-pixel-ratio:2), only screen and (min-resolution:192dpi), only screen and (min-resolution:2dppx)"></span>
        <noscript>
            <img width="200" height="283" src="<?php echo $thumb['0'] ?>" alt="<?php the_title(); ?>">
        </noscript>
</span></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
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
	<a id="AllBtnBC" href="#">All</a>
<?php
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

    <a id="<?php echo $genre_term->name; ?>BtnBC" href="#"><?php echo $genre_term->name; ?></a><?php

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
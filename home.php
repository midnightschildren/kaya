<?php
/*
Template Name: Home Page
*/
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>

<?php endwhile; ?>

<div id="slideshow" class="grid-whole">

<?php
$slide_query = new WP_Query( array(
        'post_type' => 'slides',
        'posts_per_page' => 6
                
    ) )
?>



<div class="examples" id="example-3">
    <div class="slider">
        <div class="slider-nav">
            <div class="arrow-left arrow"><span title="Back" class="carouselback"></span></div>
            <div class="arrow-right arrow"><span title="Next" class="carouselnext"></span></div>
        </div>
        <div class="slider-mask-wrap">
            <div class="slider-mask">
                <ul class="slider-target">
                <?php if ($slide_query->have_posts()) : while ($slide_query->have_posts()) : $slide_query->the_post(); ?>
                    <li class="slid">
                        <div class="inner"><div class="opmask">
                            <?php $posts = get_field('read_more_link');if ($posts): foreach($posts as $post_object): ?><a href="<?php echo get_permalink($post_object->ID); ?>">
                            <?php endforeach; endif;?>
                            <?php   $slidesm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-slide-small' ); 
                                    $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-slide' );
                            ?>
                            <span data-picture data-alt="<?php the_title(); ?>">
                                <span  data-width="595" data-height="490" data-src="<?php echo $slidesm['0'] ?>"></span>
                                <span  data-width="850" data-height="700" data-src="<?php echo $slide['0'] ?>"     data-media="(min-width: 1300px), only screen and (-webkit-min-device-pixel-ratio:2), only screen and (min--moz-device-pixel-ratio:2), only screen and (-o-min-device-pixel-ratio:2/1), only screen and (min-device-pixel-ratio:2), only screen and (min-resolution:192dpi), only screen and (min-resolution:2dppx)"></span>
                                <span  data-width="595" data-height="490" data-src="<?php echo $slidesm['0'] ?>"   data-media="only screen and (max-width: 599px) and (-webkit-min-device-pixel-ratio:2), only screen and (max-width: 599px) and (min--moz-device-pixel-ratio:2), only screen and (max-width: 599px) and (-o-min-device-pixel-ratio:2/1), only screen and (max-width: 599px) and (min-device-pixel-ratio:2), only screen and (max-width: 599px) and (min-resolution:192dpi), only screen and (max-width: 599px) and (min-resolution:2dppx)"></span>
                            <noscript>
                                <img width="850" height="700" src="<?php echo $slide['0'] ?>" alt="<?php the_title(); ?>">
                            </noscript>
                            </span>      
                            <div class="slide-title"><p class="test-title"><?php the_title(); ?></a></p> 
                            <?php $posts = get_field('read_more_link');if ($posts): foreach($posts as $post_object): ?>
                                <a class="slide_link" href="<?php echo get_permalink($post_object->ID); ?>">read on</a></div></div></div>
                            <?php endforeach; endif;?>
                    </li>
                <?php endwhile; endif; $slide_query = null; wp_reset_postdata();?>   
                </ul>
                <div class="clearit"></div>
            </div>
        </div>
    </div>
</div>


</div>


<div id="books" class="grid-whole">
<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>

<div id="mi-slider" class="mi-slider">

<?php
$genre_terms = get_terms( 'book_genre',  array(
    'number' => 5
));

foreach ( $genre_terms as $genre_term ) {
    $genre_term_query2 = new WP_Query( array(
        'post_type' => 'books',
        'posts_per_page' => 5,
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

<ul class="<?php echo $genre_term->name; ?>">
    <?php
    if ( $genre_term_query2->have_posts() ) : while ( $genre_term_query2->have_posts() ) : $genre_term_query2->the_post(); ?>
    <?php   $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'category-thumb' ); 
            $retina = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'book-thumb' );
    ?>

<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
<?php if($genre_term->name == Featured) :
?>
<span data-picture data-alt="<?php the_title(); ?>">
<?php else :?>
<span class="catimsli" data-alt="<?php the_title(); ?>">
<?php endif; ?>
        <span  data-width="200" data-height="283" data-src="<?php echo $thumb['0'] ?>"></span>        
        <span  data-width="338" data-height="478" data-src="<?php echo $retina['0'] ?>"    data-media="only screen and (-webkit-min-device-pixel-ratio:2), only screen and (min--moz-device-pixel-ratio:2), only screen and (-o-min-device-pixel-ratio:2/1), only screen  and (min-device-pixel-ratio:2), only screen and (min-resolution:192dpi), only screen and (min-resolution:2dppx)"></span>
        <span  data-width="200" data-height="283" data-src="<?php echo $thumb['0'] ?>"     data-media="only screen and (max-width: 599px) and (-webkit-min-device-pixel-ratio:2), only screen and (max-width: 599px) and (min--moz-device-pixel-ratio:2), only screen and (max-width: 599px) and (-o-min-device-pixel-ratio:2/1), only screen and (max-width: 599px) and (min-device-pixel-ratio:2), only screen and (max-width: 599px) and (min-resolution:192dpi), only screen and (max-width: 599px) and (min-resolution:2dppx)"></span>
        <noscript>
            <img width="200" height="283" src="<?php echo $thumb['0'] ?>" alt="<?php the_title(); ?>">
        </noscript>
</span>
</a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $posts = get_field('author');if ($posts): foreach($posts as $post): setup_postdata($post); ?>
    <a class="black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
<?php endforeach; wp_reset_postdata(); endif;?>
    <?php endwhile; endif; ?>
</ul>

    <?php
}

?>

<nav>
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

    <a id="<?php echo $genre_term->name; ?>p" href="#"><?php echo $genre_term->name; ?></a><?php

    $genre_term_query = null;
    wp_reset_postdata();
}

?>
</nav>

<div class="clearit"></div>
</div>
</div>
<div class="grid-whole papertop"></div>
<div id="newsandevents" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-12 s-grid-whole m-grid-whole">

<div id="events" class="grid-half s-grid-whole padded-inner">
<h2 class="diaspora gray">kaya events</h2>

<?php
$feature_query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'category__in' => 54
        
        
    ) )
    ?>
<?php if ($feature_query->have_posts()) : while ($feature_query->have_posts()) : $feature_query->the_post(); ?>
<div class="grid-whole">
<div class="grid-3 padded-topcont"><h2 class="diaspora event_date padded-bottom"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));echo $date->format('m/d'); ?></h2><?php the_post_thumbnail('featured-event'); ?></div>

    <div class="grid-13 padded-inner"><a class="event_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>
</div>
<?php endwhile; endif; $feature_query = null;
    wp_reset_postdata();?>

<?php
$events_query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'category__in' => 7,
        'category__not_in' => 54
        
    ) )
    ?>
<?php if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post(); ?>
<div class="grid-whole">
<div class="grid-3 padded-right padded-topcont"><h2 class="diaspora event_date padded-bottom"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));echo $date->format('m/d'); ?></h2><?php the_post_thumbnail('featured-event'); ?></div>

    <div class="grid-13 padded-inner"><a class="event_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>
</div>
<?php endwhile; endif; $events_query = null;
    wp_reset_postdata(); ?>
<div class="grid-3 padded-right padded-topcont">&nbsp;</div><div class="grid-13 padded-inner"><a class="author_name" href="/category/events/" style="text-transform:uppercase;">see all events</a></div>


</div>

<div id="by_author_news" class="grid-half s-grid-whole padded-inner">
<h2 class="diaspora gray">author news</h2>
<?php
$author_query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'meta_key' => 'news_by_author',
        'meta_value' => ' ',
        'meta_compare' => '!='
        
    ) )
    ?>


<?php if ($author_query->have_posts()) : while ($author_query->have_posts()) : $author_query->the_post(); ?>

<div class="grid-whole">
<div class="grid-5 padded-inner"><?php $posts = get_field('news_by_author');if ($posts): foreach($posts as $post_object): ?>
    <a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_post_thumbnail($post_object->ID, 'category-thumb'); ?></a></div>
    <?php break; ?>
<?php endforeach;  endif;?>
    <div class="grid-11 padded-inner"><a class="author_name" href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a><br /><a class="author_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>
</div>
<?php endwhile; endif; $author_query = null;
    wp_reset_postdata();?>
<div class="grid-5 padded-inner">&nbsp;</div><div class="grid-11 padded-inner"><a class="author_name" href="/category/news/" style="text-transform:uppercase;">see all author news</a></div>
</div>


</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
</div>
<div class="grid-whole paper"></div>


<div id="quote" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="padded-inner grid-12 s-grid-16 m-grid-14 center">
<?php
 
if(get_field('quote_home'))
{
	echo '<p class="quote">' . get_field('quote_home') . '</p>';
	echo '<p class="attribution">' . get_field('attribution_home') . '</p>';
}
 
?>
</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>

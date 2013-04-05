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
                        <div class="inner"><div class="opmask"><?php the_post_thumbnail('featured-slide', array( 'class' => "size-slide attachment-post-thumbnail")); ?>
                            <div class="slide-title"><p class="test-title"><span style="background-color:#000;"><?php the_title(); ?></span></p> <a class="slide_link" href="">read on</a></div></div></div>
                    </li>
                <?php endwhile; endif; $slide_query = null; wp_reset_postdata();?>   
                </ul>
                <div class="clearit"></div>
            </div>
        </div>
    </div>
</div>


</div>

<script>


    /* Okay, everything is loaded. Let's go! (on dom ready) */
    
    jQuery(function ( ten ) {

        /*
            A generic product carousel - something that might appear in the body of a e-commerce site. Unlike example 1,
            this example uses infinite scrolling.
        */
        ten('#example-3')
                .responsiveCarousel({
                    infinite:   true, // turn on infinite scrolling
                    unitWidth:  'compute',
                    target: '.slider-target',
        			mask: '.slider-mask',
                    unitElement:'.slid',
                    dragEvents: true, // touch and mouse dragging enabled
                    responsiveUnitSize: function () {
                        var m, w, i = ten(document).width(); // use the document width as a measuring stick to determine how many elements we want in the carousel.
                        if (i > 900) {
                            m = 3;
                        }
                        else if (i > 700) {
                            m = 3;
                        }
                        else if (i > 600) {
                            m = 3;
                        }
                        else if (i > 400) {
                            m = 3;
                        }
                        else {
                            m = 3
                        }
                        return m;
                    },
                    onShift: function (i) {
        i = Math.round(i);
        if (i >4) {
        var $current = $('.slider-target li[data-slide=' + (i-5) + ']');	
        }
        else {
        var $current = $('.slider-target li[data-slide=' + (i+1) + ']');}
        $('.slider-target li[data-slide]').removeClass('current');
        $current.addClass('current'); 
    	}
        
    
                });

    });

    /* bleh... CSS media queries seem to be applied sometime after the document.ready and before the
     window.load events.  If you are using the "onRedraw" callback, you should call it again after the page
     is finished loading. Not my fault! Blame your browser! :-) */
    jQuery(function ( $ ) {

    $(window).on('load', function () {
        $('.examples').responsiveCarousel('redraw');
    });

    });

</script>
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

<ul>
    <?php
    if ( $genre_term_query2->have_posts() ) : while ( $genre_term_query2->have_posts() ) : $genre_term_query2->the_post(); ?>
    
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('book-thumb'); ?></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $posts = get_field('author');if ($posts): foreach($posts as $post): setup_postdata($post); ?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
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

    <a href="#"><?php echo $genre_term->name; ?></a><?php

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
<div class="grid-5 padded-topcont"><?php the_post_thumbnail('featured-event'); ?></div>

    <div class="grid-11 padded-inner"><h2 class="diaspora event_date"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));echo $date->format('m/d'); ?></h2><a class="author_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>
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
<div class="grid-3 padded-right padded-topcont"><h2 class="diaspora event_date"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));echo $date->format('m/d'); ?></h2></div>

    <div class="grid-13 padded-inner"><a class="event_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>
</div>
<?php endwhile; endif; $events_query = null;
    wp_reset_postdata(); ?>
<div class="grid-3 padded-right padded-topcont">&nbsp;</div><div class="grid-13 padded-inner"><a class="author_name" href="/events" style="text-transform:uppercase;">see all events</a></div>


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
<?php endforeach;  endif;?>
    <div class="grid-11 padded-inner"><a class="author_name" href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a><br /><a class="author_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>
</div>
<?php endwhile; endif; $author_query = null;
    wp_reset_postdata();?>
<div class="grid-5 padded-inner">&nbsp;</div><div class="grid-11 padded-inner"><a class="author_name" href="/authors" style="text-transform:uppercase;">see all author news</a></div>
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

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


<div class="examples" id="example-3">
    <div class="slider">
        <div class="slider-nav">
            <div class="arrow-left arrow"><span title="Back" class="carouselback"></span></div>
            <div class="arrow-right arrow"><span title="Next" class="carouselnext"></span></div>
        </div>
        <div class="slider-mask-wrap">
            <div class="slider-mask">
                <ul class="slider-target">
                    <li class="slid">
                        <div class="inner"><div class="opmask"><img class="size-slide" src="http://kaya.codisattva.com/wp-content/uploads/2013/02/slide1.jpg"></div></div>
                    </li>
                    <li class="slid">
                        <div class="inner"><div class="opmask"><img class="size-slide" src="http://kaya.codisattva.com/wp-content/uploads/2013/02/slide2.jpg"></div></div>
                    </li>
                    <li class="slid">
                        <div class="inner"><div class="opmask"><img class="size-slide" src="http://kaya.codisattva.com/wp-content/uploads/2013/02/slide3.jpg"></div></div>
                    </li>
                    <li class="slid">
                        <div class="inner"><div class="opmask">Four</div></div>
                    </li>
                    <li class="slid">
                        <div class="inner"><div class="opmask">Five</div></div>
                    </li>
                    <li class="slid">
                        <div class="inner"><div class="opmask">Six</div></div>
                    </li>
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
<h2 class="white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>

<div id="mi-slider" class="mi-slider">

<?php
$genre_terms = get_terms( 'genres',  array(
    'number' => 6
));

foreach ( $genre_terms as $genre_term ) {
    $genre_term_query2 = new WP_Query( array(
        'post_type' => 'books',
        'posts_per_page' => 5,
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'genres',
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
    
<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('category-thumb'); ?></a><div class="booktitle"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> by 
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
                'taxonomy' => 'genres',
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

<div id="quote" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-12 s-grid-16 m-grid-14 center">
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

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
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-12 s-grid-16 m-grid-14 center">

<div class="examples" id="example-3">
    <div class="slider">
        <div class="slider-nav">
            <div class="arrow-left arrow"><span title="Back"></span></div>
            <div class="arrow-right arrow"><span title="Next"></span></div>
        </div>
        <div class="slider-mask-wrap">
            <div class="slider-mask">
                <ul class="slider-target">
                    <li>
                        <div class="inner">One</div>
                    </li>
                    <li>
                        <div class="inner">Two</div>
                    </li>
                    <li>
                        <div class="inner">Three</div>
                    </li>
                    <li>
                        <div class="inner">Four</div>
                    </li>
                    <li>
                        <div class="inner">Five</div>
                    </li>
                    <li>
                        <div class="inner">Six</div>
                    </li>
                </ul>
                <div class="clearit"></div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
</div>

<script>

jQuery.noConflict();
    /* Okay, everything is loaded. Let's go! (on dom ready) */
    (function ( $ ) {
$.fn.myPlugin = function() {
        /*
            A generic product carousel - something that might appear in the body of a e-commerce site. Unlike example 1,
            this example uses infinite scrolling.
        */
        $('#example-3')
                .responsiveCarousel({
                    infinite:   true, // turn on infinite scrolling
                    unitWidth:  'compute',
                    dragEvents: true, // touch and mouse dragging enabled
                    responsiveUnitSize: function () {
                        var m, w, i = $(document).width(); // use the document width as a measuring stick to determine how many elements we want in the carousel.
                        if (i > 900) {
                            m = 4;
                        }
                        else if (i > 700) {
                            m = 3;
                        }
                        else if (i > 600) {
                            m = 2;
                        }
                        else if (i > 400) {
                            m = 1;
                        }
                        else {
                            m = 1
                        }
                        return m;
                    }
                });
};
    })(jQuery);

    /* bleh... CSS media queries seem to be applied sometime after the document.ready and before the
     window.load events.  If you are using the "onRedraw" callback, you should call it again after the page
     is finished loading. Not my fault! Blame your browser! :-) */
    (function ( $ ) {
$.fn.myPlugin2 = function() {
    $(window).on('load', function () {
        $('.examples').responsiveCarousel('redraw');
    });
};
    })(jQuery);

</script>

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


	<?php wp_footer(); ?>
	<script>
			$(function() {

				$( '#mi-slider' ).catslider();
				$( '#bi-slider' ).catslider();

			});

			$( window ).on( 'resize', function() {
				$("#bi-slider").attr("class", "mi-slider allht");
			});
			
			$("#AllBtn").click(function() {
    		$("#bi-slider").attr("class", "mi-slider allht");
			});

			$("#FictionBtn").click(function() {
    		$("#bi-slider").attr("class", "mi-slider fictionht");
			});

			$("#Non-FictionBtn").click(function() {
    		$("#bi-slider").attr("class", "mi-slider non-fictionht");
			});

			$("#PerformanceBtn").click(function() {
    		$("#bi-slider").attr("class", "mi-slider filmht");
			});

			$("#FilmBtn").click(function() {
    		$("#bi-slider").attr("class", "mi-slider filmht");
			});

  // smart resize - http://paulirish.com/2009/throttled-smartresize-jquery-event-handler/
  (function($,sr){
 
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;
   
        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null; 
            };
   
            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);
   
            timeout = setTimeout(delayed, threshold || 100); 
        };
    }
    // smartresize 
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
   
  })(jQuery,'smartresize');

  $(function() {
    // use equalize to equalize the heights of content elements
    $('.equalize').equalize({children:'.content-box'});

    // re-equalize on resize
    $(window).smartresize(function(){  
      $('.equalize').equalize({reset:true, children:'.content-box'});
    });

  });

		</script>
	</body>

</html>
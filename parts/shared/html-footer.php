
	<?php wp_footer(); ?>
	<script>
			$(function() {

				$( '#mi-slider' ).catslider();
				$( '#bi-slider' ).catslider();

			});
			if(!Modernizr.touch){
			$( window ).on( 'resize', function() {
				$("#author_landing").attr("class", "grid-whole allht");
			});
			}

			if(Modernizr.touch){
			event = "touchend";
			} else {
			event = "click";
			}

            $( window ).on( 'orientationchange', function() {
                $("#author_landing").attr("class", "grid-whole allht");
            });

			$("#AllBtn").on(event, function(a) {
    		$("#author_landing").attr("class", "grid-whole allht");   				
			});

			$("#FictionBtn").on(event, function(b) {
    		$("#author_landing").attr("class", "grid-whole fictionht");    				
			});

			$("#Non-FictionBtn").on(event, function(c) {
    		$("#author_landing").attr("class", "grid-whole non-fictionht");    				
			});

			$("#PerformanceBtn").on(event, function(d) {
    		$("#author_landing").attr("class", "grid-whole filmht");    				
			});

			$("#FilmBtn").on(event, function(e) {
    		$("#author_landing").attr("class", "grid-whole filmht");    				
			});

            $("#PoetryBtn").on(event, function(f) {
            $("#author_landing").attr("class", "grid-whole poetryht");                    
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
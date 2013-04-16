
	<?php wp_footer(); ?>
	<script>
			$(function() {

				$( '#mi-slider' ).catslider();
				$( '#bi-slider' ).catslider();

			});
            
            $(window).load(function() {
                $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $.each( $this.children(".mi-current"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });
            });

            $(window).load(function() {
                $( "#mi-slider" ).each(function() {
                    var newHeight = 100, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(1)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });
            });


			if(!Modernizr.touch){
			$( window ).on( 'resize', function() {
				$("#author_landing").attr("class", "grid-whole container_test");
                $(".single #author_landing").attr("class", "grid-whole container_test");
                $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $.each( $this.children(".mi-current"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });
                $( "#mi-slider" ).each(function() {
                    var newHeight = 100, $this = $( this );
                    $.each( $this.children(".mi-current"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });
			});
			}

			if(Modernizr.touch){
			event = "touchend";
			} else {
			event = "click";
			}

            $( window ).on( 'orientationchange', function() {
                $("#author_landing").attr("class", "grid-whole container_test");
                $(".single #author_landing").attr("class", "grid-whole container_test");
                $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $.each( $this.children(".mi-current"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });
            });

			$("#AllBtn").on(event, function(a) {
    		$("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(2)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });   				
			});

            $("#AllBtnBC").on(event, function(h) {
            $("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(1)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });                 
            });

            $("#CurrentBtn").on(event, function(g) {
            $("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(1)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });                          
            });

			$("#FictionBtn").on(event, function(b) {
    		$("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(3)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });       				
			});

            $("#FictionBtnBC").on(event, function(i) {
            $("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(2)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });                     
            });

			$("#Non-FictionBtn").on(event, function(c) {
    		$("#author_landing").attr("class", "grid-whole container_test"); 
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(4)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });        				
			});

            $("#Non-FictionBtnBC").on(event, function(j) {
            $("#author_landing").attr("class", "grid-whole container_test"); 
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(3)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });                     
            });

			$("#PerformanceBtnBC").on(event, function(d) {
    		$("#author_landing").attr("class", "grid-whole container_test"); 
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(4)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });   				
			});

			$("#FilmBtnBC").on(event, function(e) {
    		$("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(6)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });    				
			});

            $("#PoetryBtn").on(event, function(f) {
            $("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(5)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });                         
            });

            $("#PoetryBtnBC").on(event, function(k) {
            $("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(5)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });                         
            });

            $("#menu-item-22").on(event, function(l) {
            $("#author_landing").attr("class", "grid-whole container_test");
            $( ".mi-slider" ).each(function() {
                    var newHeight = 25, $this = $( this );
                    $this.isAnimating = false;
                    $.each( $this.children(":nth-child(1)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });                         
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
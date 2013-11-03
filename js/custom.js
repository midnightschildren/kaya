   jQuery(function ( ten ) {

        /*
            A generic product carousel - something that might appear in the body of a e-commerce site. Unlike example 1,
            this example uses infinite scrolling.
        */
        ten('#example-3')
                .responsiveCarousel({
                    infinite: true, // turn on infinite scrolling
                    unitWidth: 'compute',
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



            $(function() {

                $( '#mi-slider' ).catslider();
                $( '#bi-slider' ).catslider();

            });
            
            $(window).load(function() {
                $( ".mi-slider" ).each(function() {
                    var newHeight = 75, $this = $( this );
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
              setTimeout(function () {
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
                    $.each( $this.children(":nth-child(1)"), function() {
                    newHeight += $( this ).height();
                    });
                $this.height( newHeight );
                });
              }, 500);
            });

            $("#Fictionp").on(event, function(a) {
            $(".Fiction .catimsli").attr("data-picture", "");
            picturefill();               
            });

            $("#Non-Fictionp").on(event, function(r) {
            $(".Non-Fiction .catimsli").attr("data-picture", "");
            picturefill();              
            });

            $("#Performancep").on(event, function(s) {
            $(".Performance .catimsli").attr("data-picture", "");
            picturefill();              
            });

            $("#Poetryp").on(event, function(t) {
            $(".Poetry .catimsli").attr("data-picture", "");
            picturefill();              
            });

            $("#AllBtn").on(event, function(b) {
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

            $("#AllBtnBC").on(event, function(c) {
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

            $("#CurrentBtn").on(event, function(d) {
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

            $("#FictionBtn").on(event, function(e) {
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

            $("#FictionBtnBC").on(event, function(f) {
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

            $("#Non-FictionBtn").on(event, function(g) {
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

            $("#Non-FictionBtnBC").on(event, function(h) {
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

            $("#A3Btn").on(event, function(i) {
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

            $("#PerformanceBtnBC").on(event, function(j) {
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

            $("#A4Btn").on(event, function(k) {
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

            $("#FilmBtnBC").on(event, function(l) {
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

            $("#A6Btn").on(event, function(m) {
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

            $("#PoetryBtn").on(event, function(n) {
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

            $("#A5Btn").on(event, function(o) {
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

            $("#PoetryBtnBC").on(event, function(p) {
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

            $("#menu-item-22").on(event, function(q) {
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
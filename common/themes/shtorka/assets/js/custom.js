/**
 *-----------------------------------------------------------------
 *
 *  1.  Main Menu
 *  2.  Humberger Menu
 *  3.  Mobile Menu
 *  4.  Accordion
 *  5.  Validate
 *  6.  Owl Carousel
 *  7.  Background Video
 *  8.  Google Map
 *  9.  Search Box
 *  10. Sync owl carousel
 *  11. Filter Wookmark
 *  12. Filter Masonry
 *  13. Masonry
 *  14. Color box
 *  15. Flickr
 *  16. Single-author-Filter
 *  17. Match height
 *  18. Fit Video
 *  19. Scroll to Top
 *  20. Set User Agent
 *
 *-----------------------------------------------------------------
 **/
 

"use strict";


$(document).ready(function(){


var kopa_variable = {
    "contact": {
        "address": "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
        "marker": "/url image"
    },
    "i18n": {
        "VIEW": "View",
        "VIEWS": "Views",
        "validate": {
            "form": {
                "SUBMIT": "Submit",
                "SENDING": "Sending..."
            },
            "name": {
                "REQUIRED": "Please enter your name",
                "MINLENGTH": "At least {0} characters required"
            },
            "email": {
                "REQUIRED": "Please enter your email",
                "EMAIL": "Please enter a valid email"
            },
            "url": {
                "REQUIRED": "Please enter your url",
                "URL": "Please enter a valid url"
            },
            "message": {
                "REQUIRED": "Please enter a message",
                "MINLENGTH": "At least {0} characters required"
            }
        },
        "tweets": {
            "failed": "Sorry, twitter is currently unavailable for this user.",
            "loading": "Loading tweets..."
        }
    },
    "url": {
        "template_directory_uri":"http://yii_adv/frontend/web/assets/76150d4b/"
    }
};

/* =========================================================
1. Main Menu
============================================================ */

Modernizr.load([{
    load: [kopa_variable.url.template_directory_uri + 'js/superfish.min.js'],
    complete: function () {        
        
        $('.kopa-main-nav .sf-menu').superfish({
            speed: "fast",
            delay: "100"
        });
        
    }
}]);

if ($('.kopa-main-nav-hbg').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/superfish.min.js'],
        complete: function () {        
            
            $('.kopa-main-nav-hbg .sf-menu').superfish({
                speed: "fast",
                delay: "100"
            });
            
        }
    }]);
}



/* =========================================================
2. Humberger Menu
============================================================ */

$("#overlay").fadeOut();

//toggle humberger menu when click on menu icon
$("#menu-icon").click(function(event){
    event.preventDefault();
    if($(".humberger-menu-wrapper").hasClass("show-in")) {
        $(".humberger-menu-wrapper").animate({left: "-300px"}).removeClass("show-in");
        $("#overlay").fadeOut(400);
        $("#menu-icon i").removeClass("fa-times").addClass("fa-navicon");
    } else {
        $(".humberger-menu-wrapper").animate({left: "0px"}).addClass("show-in");
        $("#overlay").fadeIn(400);
        $("#menu-icon i").removeClass("fa-navicon").addClass("fa-times");        
    }    
});

//hide the humberger menu when click on overlay
$("#overlay").on("click", function(){
    $(".humberger-menu-wrapper").animate({left: "-300px"}).removeClass("show-in");
    $("#overlay").fadeOut(400);
    $("#menu-icon i").removeClass("fa-times").addClass("fa-navicon");
})


/* ============================================
3. Mobile-menu
=============================================== */

Modernizr.load([{
    load: [kopa_variable.url.template_directory_uri + 'js/jquery.navgoco.min.js'],
    complete: function () {     
        jQuery('.main-nav-mobile .main-menu-mobile').navgoco({accordion: true});   
        jQuery(".mobile-menu-icon").click(function(event){
            event.preventDefault();
            jQuery(".main-nav-mobile .main-menu-mobile").slideToggle( "slow" );
        });
    }
}]);

var screenHeight = jQuery( window ).height();
var mmHeight = screenHeight -65;
if(jQuery(window).width() < 639) {  
    jQuery( ".main-menu-mobile" ).css("max-height", mmHeight + 'px');
}

$(window).resize(function(){
    var screenHeight = jQuery( window ).height();
    var mmHeight = screenHeight -65;
    if(jQuery(window).width() < 639) {  
        jQuery( ".main-menu-mobile" ).css("max-height", mmHeight + 'px');
    }
}); 



/* =========================================================
4. Accordion
============================================================ */

var panel_titles = $('.kopa-accordion .panel-title a');
panel_titles.addClass("collapsed");
$('.panel-heading.active').find(panel_titles).removeClass("collapsed");
panel_titles.click(function(){
    $(this).closest('.kopa-accordion').find('.panel-heading').removeClass('active');
    var pn_heading = $(this).parents('.panel-heading');
    if ($(this).hasClass('collapsed')) {
        pn_heading.addClass('active');
    } else {
        pn_heading.removeClass('active');
    }
});



 /* =========================================================
5. Validate
============================================================ */
 
/*-- contact form --*/
    
if ($('.contact-form').length > 0) {
    Modernizr.load([
      {
        load:[ kopa_variable.url.template_directory_uri + 'js/jquery.form.min.js', kopa_variable.url.template_directory_uri + 'js/jquery.validate.min.js'],
        complete: function () {
            $('.contact-form').validate({
                // Add requirements to each of the fields
                rules: {
                    name: {
                        required: true,
                        minlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    web: {
                        required: true,
                        minlength: 10
                    },
                    message: {
                        required: true,
                        minlength: 15
                    }
                },
                // Specify what error messages to display
                // when the user does something horrid
                messages: {
                    name: {
                        required: "Please enter your name.",
                        minlength: $.format("At least {0} characters required.")
                    },
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email."
                    },
                    web: {
                        required: "Please enter your website.",
                        minlength: "Please enter a valid website url."
                    },
                    message: {
                        required: "Please enter a message.",
                        minlength: $.format("At least {0} characters required.")
                    }
                },
                // Use Ajax to send everything to processForm.php
                submitHandler: function(form) {
                    $("#input-submit").attr("value", "Sending...");
                    $(form).ajaxSubmit({
                        success: function(responseText, statusText, xhr, $form) {
                            $("#response1").html(responseText).hide().slideDown("fast");
                            $("#input-submit").attr("value", "Submit");
                        }
                    });
                    return false;
                }
            });
        }
      }
    ]);
};


//comments form

if ($('#comments-form').length > 0) {
    Modernizr.load([
      {
        load:[kopa_variable.url.template_directory_uri + 'js/jquery.form.min.js', kopa_variable.url.template_directory_uri + 'js/jquery.validate.min.js'],
        complete: function () {
            $('#comments-form').validate({
                // Add requirements to each of the fields
                rules: {
                    name: {
                        required: true,
                        minlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        phone: true
                    },
                    message: {
                        required: true,
                        minlength: 15
                    }
                },
                // Specify what error messages to display
                // when the user does something horrid
                messages: {
                    name: {
                        required: "Please enter your name.",
                        minlength: $.format("At least {0} characters required.")
                    },
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email."
                    },
                    phone: {
                        required: "Please enter your phone.",
                        url: "Please enter a valid phone."
                    },
                    message: {
                        required: "Please enter a message.",
                        minlength: $.format("At least {0} characters required.")
                    }
                },
                // Use Ajax to send everything to processForm.php
                submitHandler: function(form) {
                    $("#input-submit").attr("value", "Sending...");
                    $(form).ajaxSubmit({
                        success: function(responseText, statusText, xhr, $form) {
                            $("#response2").html(responseText).hide().slideDown("fast");
                            $("#input-submit").attr("value", "Submit");
                        }
                    });
                    return false;
                }
            });
        }
      }
    ]);
};   


/* =========================================================
6. Owl Carousel
============================================================ */

// home top carousel 1
if ($('.owl-home-top-carousel').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/owl.carousel.min.js'],
        complete: function() {
            $(".owl-home-top-carousel").owlCarousel({
                items : 1,
                itemsDesktop : [1024,1], 
                itemsDesktopSmall : [979,1], 
                itemsTablet: [768,1],
                itemsMobile : [479,1], 
                lazyLoad : true,
                navigation : true,
                pagination: true,
                navigationText : false,
                slideSpeed: 1000,
                paginationSpeed: 1000,
                afterInit: function(){
                   $("#kopa-header .home-top-carousel").removeClass("loading");    
                }
            });
            $(".owl-home-top-carousel").find(".owl-controls").addClass("style1");
            $('<span class="pagination-bg"></span>').prependTo(".owl-home-top-carousel .owl-pagination");
        }
    }]);
};   

// home top carousel 2
if ($('.owl-home-top-carousel-2').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/owl.carousel.min.js'],
        complete: function() {
            $(".owl-home-top-carousel-2").owlCarousel({
                items : 4,
                itemsDesktop : [1024,4], 
                itemsDesktopSmall : [979,4], 
                itemsTablet: [768,2],
                itemsMobile : [479,1], 
                lazyLoad : true,
                navigation : true,
                pagination: true,
                navigationText : false,
                slideSpeed: 1000,
                paginationSpeed: 1000,
                afterInit: function(){
                   $(".kopa-header .home-top-carousel-1-wrapper").removeClass("loading");    
                }
            });            

            $(".owl-home-top-carousel-2").find(".owl-controls").addClass("style1");            
            var $pagination = jQuery(".owl-home-top-carousel-2 .owl-pagination");            
            $('<div class="pagination-bg"><span class="left"></span><span class="right"></span></div>').appendTo($pagination);

            //display content of item child (4n+2)
            var entryItem = $(".owl-home-top-carousel-2 .entry-item")
            if ($(window).width() >= 800) {
                var activeItem = $(".owl-home-top-carousel-2 .owl-item:nth-child(4n+2)").find(".entry-item");           
                activeItem.addClass("active"); 
            } else if ($(window).width() < 800) { 
                var activeItem = $(".owl-home-top-carousel-2 .owl-item:nth-child(2n+1)").find(".entry-item");           
                activeItem.addClass("active");
            }

            //display content of item when hover on
            entryItem.on("mouseenter", function(){
                entryItem.removeClass("active");
                $(this).addClass("active");
            });  

            // reset initial static when move the cursor over the carousel
            $(".owl-home-top-carousel-2").on("mouseleave", function(){
                entryItem.removeClass("active");
                activeItem.addClass("active");                 
            })            
            
        }
    }]);
};   


// kopa product list widget
if ($('.owl-product-list-carousel').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/owl.carousel.min.js'],
        complete: function() {
            $(".owl-product-list-carousel").owlCarousel({
                items : 4,
                itemsDesktop : [1024,4], 
                itemsDesktopSmall : [979,4], 
                itemsTablet: [768,3],
                itemsMobile : [479,1], 
                lazyLoad : true,
                navigation : false,
                pagination: true,
                navigationText : false,
                slideSpeed: 1000,
                paginationSpeed: 1000,
            });
        }
    }]);
};         

// kopa team widget
if ($('.owl-team-carousel').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/owl.carousel.min.js'],
        complete: function() {
            $(".owl-team-carousel").owlCarousel({
                items : 4,
                itemsDesktop : [1024,4], 
                itemsDesktopSmall : [979,4], 
                itemsTablet: [768,2],
                itemsMobile : [479,1], 
                lazyLoad : true,
                navigation : false,
                pagination: true,
                navigationText : false,
                slideSpeed: 1000,
                paginationSpeed: 1000
            });       
        }
    }]);
};   

//kopa related post 
if ($(".owl-related-posts-carousel.s-4").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-related-posts-carousel.s-4").owlCarousel({
                items: 4,
                pagination: false,
                navigationText: false,
                navigation: true,
                slideSpeed: 600
            });

            $(".owl-related-posts-carousel.s-4").find(".owl-controls").addClass("style6");

        }
    }]);
};  

//kopa related post 
if ($(".owl-related-posts-carousel.s-3").length > 0) { 
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-related-posts-carousel.s-3").owlCarousel({
                items: 3,
                pagination: false,
                navigationText: false,
                navigation: true,
                slideSpeed: 600
            });
            $(".owl-related-posts-carousel.s-3").find(".owl-controls").addClass("style6");
             
        }
    }]);
};  

//kopa related products
if ($(".owl-related-products").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-related-products").owlCarousel({
                items: 3,
                itemsDesktop : [1024,3], 
                itemsDesktopSmall : [979,3], 
                itemsTablet: [768,2],
                itemsMobile : [479,1], 
                pagination: false,
                navigationText: false,
                navigation: true,
                slideSpeed: 600
            });
            $(".owl-related-products").find(".owl-controls").addClass("style6"); 
             
        }
    }]);
};  

// kopa mission widget  
// kopa testimonial 1 widget  
if ($(".owl-single-item").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            jQuery('.owl-single-item').each(function(){
                var $this = jQuery(this),
                    $pagination = $this.data('pagination'),
                    $navigation = $this.data('navigation'),
                    $navText = $this.data('navtext'),
                    $autoplay = $this.data('autoplay');
                $this.owlCarousel({
                    singleItem: true,
                    pagination: $pagination,
                    navigation: $navigation,
                    navigationText: $navText,                    
                    autoPlay: $autoplay,
                    slideSpeed: 600
                });
            });            
            $(".owl-mission-carousel").find(".owl-controls").addClass("style5");
        }
    }]);
};  

// kopa testimonial 2 widget    
if ($(".owl-testimonial-2").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-testimonial-2").owlCarousel({
                items: 3,
                itemsDesktop : [1024,3], 
                itemsDesktopSmall : [979,3], 
                itemsTablet: [768,2],
                itemsMobile : [639,1], 
                pagination: true,
                navigationText: false,
                navigation: false,
                autoPlay: false,
                slideSpeed: 1000
            });
            $(".owl-testimonial-2").find(".owl-controls").addClass("style4");
        }
    }]);
}; 

//kopa related post 
if ($(".owl-product-list-2").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-product-list-2").owlCarousel({
                items: 4,
                pagination: false,
                navigationText: false,
                navigation: true,
                slideSpeed: 600
            });
            $(".owl-product-list-2").find(".owl-controls").addClass("style3");
            
        }
    }]);
};

//kopa ads 
if ($(".owl-ads-carousel").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {

            $(".owl-ads-carousel").owlCarousel({
                items: 6, //5
                itemsDesktop : [1024,6], 
                itemsDesktopSmall : [979,4], 
                itemsTablet: [768,4],
                itemsMobile : [639,2], 
                pagination: false,
                navigationText: false,
                navigation: false,
                slideSpeed: 600,
                autoPlay: true,
            });
            
        }
    }]);
};

//kopa related post 
if ($(".owl-carousel-1").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            jQuery(".owl-carousel-1").each(function() {                
                var $this = jQuery(this),
                    dataItems = $this.data('items'),                    
                    dataPagination = $this.data('pagination'),
                    dataNavigation = $this.data('navigation'),
                    dataNavText = $this.data('navtext'),
                    dataSlideSpeed = $this.data('slideSpeed'),
                    dataAutoPlay = $this.data('autoplay');
                $this.owlCarousel({
                    items: dataItems, //5
                    itemsDesktop : [1024,4], 
                    itemsDesktopSmall : [979,4], 
                    itemsTablet: [768,2],
                    itemsMobile : [639,1], 
                    pagination: dataPagination, //false,
                    navigation: dataNavigation, //false,
                    navigationText: dataNavText, //false,                    
                    slideSpeed: dataSlideSpeed, //600,
                    autoPlay: dataAutoPlay //true
                });
            });    

            $(".owl-product-list-3.style2").find(".owl-controls").addClass("style3");              
        }
    }]);
};

// kopa blog owl 1
if ($(".owl-blog-carousel").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-blog-carousel-1").owlCarousel({
                singleItem: true,
                pagination: true,
                navigationText: false,
                navigation: true,
                autoPlay: false,
                slideSpeed: 600              
            });
            $(".owl-blog-carousel-1").find(".owl-controls").addClass("style7");
        }
    }]);
};  

// kopa blog owl 2
if ($(".owl-blog-carousel").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-blog-carousel-2").owlCarousel({
                singleItem: true,
                pagination: false,
                navigationText: false,
                navigation: true,
                autoPlay: false,
                slideSpeed: 600,
                afterInit: function(){
                   $(".owl-blog-carousel-2-wrapper").removeClass("loading");    
                }
            });
            $(".owl-blog-carousel-2").find(".owl-controls").addClass("style7");
        }
    }]);
};  

// kopa blog owl 3
if ($(".owl-blog-carousel").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/owl.carousel.min.js"],
        complete: function() {
            $(".owl-blog-carousel-3").owlCarousel({
                singleItem: true,
                pagination: true,
                navigationText: false,
                navigation: false,
                autoPlay: false,
                slideSpeed: 600
            });
            $(".owl-blog-carousel-3").find(".owl-controls").addClass("style7");
        }
    }]);
};  

/* =========================================================
7. Background Video
============================================================ */

if ($('.kopa-area-8').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/jquery.backgroundvideo.js'],
        complete: function () {
            var videobg1 = new jQuery.backgroundVideo(jQuery('.kopa-area-8'), {
                videoid: "video_bg1",
                "align": "centerXY",
                "width": 1280,
                "height": 720,
                "path": "video/",
                "filename": "video-car",
                "types": ["mp4"]
            });
                
            var vid1 = document.getElementById("video_bg1");
            vid1.muted = true;

            jQuery('.kopa-area-8').hover(function(){
                vid1.muted = false;
            }, function(){
                vid1.muted = true;
            });
        }
    }]);
}; 

/* =========================================================
8. Google Map
============================================================ */

var map;

if ($('.kopa-map').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/gmaps.js'],
            complete: function () {
          var id_map = $('.kopa-map').attr('id');
          var lat = parseFloat($('.kopa-map').attr('data-latitude'));
          var lng = parseFloat($('.kopa-map').attr('data-longitude'));
          var place = $('.kopa-map').attr('data-place');

      map = new GMaps({
          el: '#'+id_map,
          lat: lat,
          lng: lng,
          zoomControl : true,
          zoomControlOpt: {
              style : 'SMALL',
              position: 'TOP_LEFT'
          },
          panControl : false,
          streetViewControl : false,
          mapTypeControl: false,
          overviewMapControl: false
        });
        map.addMarker({
          lat: lat,
            lng: lng,
          title: place
        });
        }
    }]);
};


/* =========================================================
9. Search Box
============================================================ */

if ($('#sb-search').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/uisearch.js', kopa_variable.url.template_directory_uri + 'js/classie.js'],
        complete: function() {
            new UISearch(document.getElementById('sb-search'));
        }
    }]);
};


/* =========================================================
10. Sync owl carousel
============================================================ */
 
if ($('.kopa-sync-portfolio-widget').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/owl.carousel.min.js'],
        complete: function() {
            var sync3 = $(".kopa-sync-portfolio-widget .sync3");
            var sync4 = $(".kopa-sync-portfolio-widget .sync4");

            sync3.owlCarousel({
                singleItem: true,
                slideSpeed: 1000,
                navigation: true,
                navigationText: false,
                pagination: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 200,
                afterInit: function(){
                   $(".kopa-sync-portfolio-widget .loading").hide();    
                }
            });
            sync3.find(".owl-controls").addClass("style7");


            sync4.owlCarousel({
                items: 6,
                itemsDesktop: [1160,6],
                itemsDesktopSmall : [979,6],
                itemsTablet : [799,6],
                itemsMobile : [479,3],
                pagination: false,
                navigation: true,
                navigationText: false,
                responsiveRefreshRate: 100,
                addClassActive: true,
                afterAction: function(){
                    $(".sync4-center").removeClass("sync4-center");
                    sync4.find(".active").eq(2).addClass("sync4-center");
                },
                afterInit: function(el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                }
            });
            //sync4.find(".owl-controls").addClass("style8");

            function syncPosition(el) {
                var current = this.currentItem;
                $(".sync4").find(".owl-item").removeClass("synced").eq(current).addClass("synced")
                if ($(".sync4").data("owlCarousel") !== undefined) {
                    center(current)
                }
            }

            $(".sync4").on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).data("owlItem");
                sync3.trigger("owl.goTo", number);
            });
            sync4.find(".owl-controls").addClass("style9");

            function center(number){
                
                var sync4visible = sync4.data("owlCarousel").owl.visibleItems;
                var num = number;
                var found = false;
                for(var i in sync4visible){
                  if(num === sync4visible[i]){
                    var found = true;
                  }
                }
             
                if(found===false){
                    if (undefined != sync4visible){
                        if(num > sync4visible[sync4visible.length-1]){
                            sync4.trigger("owl.goTo", num - sync4visible.length+2)
                        }else{
                            if(num - 1 === -1){
                                num = 0;
                            }
                            sync4.trigger("owl.goTo", num);
                        } 
                    }
                } else if(num === sync4visible[sync4visible.length-1]){
                    sync4.trigger("owl.goTo", sync4visible[1])
                } else if(num === sync4visible[0]){
                    sync4.trigger("owl.goTo", num-1)
                }
                
            }
        }
    }]);
    
};
    

/* =========================================================
11. Filter Wookmark
============================================================ */

//Portfolio 2
if ($('.kopa-portfolio-2-widget').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/imagesloaded.js', kopa_variable.url.template_directory_uri + 'js/jquery.wookmark.js', kopa_variable.url.template_directory_uri + 'js/jquery.colorbox-min.js'],
        complete: function () {

            $('.kopa-portfolio-2-widget .portfolio-list-item').imagesLoaded(function() {
                // Prepare layout options.
                var options = {
                  autoResize: true, // This will auto-update the layout when the browser window is resized.
                  container: $('.kopa-portfolio-2-widget .portfolio-container'), // Optional, used for some extra CSS styling
                  offset: 0, // Optional, the distance between grid items
                  fillEmptySpace: true // Optional, fill the bottom of each column with widths of flexible height
                };

                // Get a reference to your grid items.
                var handler = $('.kopa-portfolio-2-widget .portfolio-list-item li'),
                    filters = $('.kopa-portfolio-2-widget .filters-options li');

                // Call the layout function.
                handler.wookmark(options);

                /**
                 * When a filter is clicked, toggle it's active state and refresh.
                 */
                var onClickFilter = function(event) {
                  var item = $(event.currentTarget),
                      activeFilters = [];

                  if (!item.hasClass('active')) {
                    filters.removeClass('active');
                  }
                  item.toggleClass('active');

                  // Filter by the currently selected filter
                  if (item.hasClass('active')) {
                    activeFilters.push(item.data('filter'));
                  }

                  handler.wookmarkInstance.filter(activeFilters);
                }

                // Capture filter click events.
                filters.on("click", onClickFilter);
            });

            $(".popup-icon").colorbox({
                rel:'group4', 
                transition:"fade"
            });    

        }
    }]);

};

//Home 2 Filter - Best Seller
if ($('.kopa-product-list-4-widget').length > 0) {

    Modernizr.load([{
        load: [ kopa_variable.url.template_directory_uri + 'js/imagesloaded.js', kopa_variable.url.template_directory_uri + 'js/jquery.wookmark.js'],
        complete: function () {

            $('.kopa-product-list-4-widget .product-list-item').imagesLoaded(function() {
            // Prepare layout options.
                var options = {
                  autoResize: true, // This will auto-update the layout when the browser window is resized.
                  container: $('.kopa-product-list-4-widget .product-container'), // Optional, used for some extra CSS styling
                  offset: 0, // Optional, the distance between grid items
                  fillEmptySpace: true // Optional, fill the bottom of each column with widths of flexible height
                };

                // Get a reference to your grid items.
                var handler = $('.kopa-product-list-4-widget .product-list-item li'),
                    filters = $('.kopa-product-list-4-widget .filters-options li');

                // Call the layout function.
                handler.wookmark(options);

                /**
                 * When a filter is clicked, toggle it's active state and refresh.
                 */
                var onClickFilter = function(event) {
                  var item = $(event.currentTarget),
                      activeFilters = [];

                  if (!item.hasClass('active')) {
                    filters.removeClass('active');
                  }
                  item.toggleClass('active');

                  // Filter by the currently selected filter
                  if (item.hasClass('active')) {
                    activeFilters.push(item.data('filter'));
                  }

                  handler.wookmarkInstance.filter(activeFilters);
                }

                // Capture filter click events.
                filters.on("click", onClickFilter);
            });

        }
    }]);

};


 /* =========================================================
12. Filter Masonry
============================================================ */

//Home 1 Portfolio   
if (jQuery('#container').length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/imagesloaded.pkgd.min.js', kopa_variable.url.template_directory_uri + 'js/jquery.masonry.min.js', kopa_variable.url.template_directory_uri + 'js/filtermasonry.js', kopa_variable.url.template_directory_uri + 'js/jquery.colorbox-min.js'],
        complete: function() {
            var $container_filter = jQuery('#container');

            $container_filter.multipleFilterMasonry({
                gutterWidth: 5,
                columnWidth: 1,
                itemSelector: '.element',
                filtersGroupSelector:'.filters'
            });
            jQuery('#options li label').click(function(){
                jQuery('#options li label').removeClass('active');
                jQuery(this).addClass('active');
            });

            $(".popup-icon").colorbox({
                rel:'group3', 
                transition:"fade"
            });     
        }
    }]);    
};


/* =========================================================
13. Masonry
============================================================ */

// Blog 2 Masonry
if (jQuery('.kopa-entry-list.style2').length > 0) {
    if ($(".video-wrapper").length > 0) {

        Modernizr.load([{
            load: [kopa_variable.url.template_directory_uri + 'js/fitvids.js', kopa_variable.url.template_directory_uri + 'js/jquery.masonry.min.js'],
            complete: function() {
                $(".video-wrapper").fitVids();

                var container = document.querySelector('.wrap-masonry');
                var msnry = new Masonry( container, {
                  // options
                  columnWidth: 0,
                  itemSelector: '.masonry-item'
                });
            }
        }]);    

    } else {
        Modernizr.load([{
            load: [kopa_variable.url.template_directory_uri + 'js/jquery.masonry.min.js'],
            complete: function() {

                var container = document.querySelector('.wrap-masonry');
                var msnry = new Masonry( container, {
                  // options
                  columnWidth: 0,
                  itemSelector: '.masonry-item'
                });
            }
        }]);    
    }    
};


/* =========================================================
14. Color box
============================================================ */

if ($(".owl-related-posts-carousel").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + "js/jquery.colorbox-min.js"],
        complete: function() {         

            $(".popup-icon").colorbox({
                rel:'group1', 
                transition:"fade"
            });    
        }
    }]);
};  

/* =========================================================
15. Flickr
============================================================ */

if ($('.kopa-flickr-widget').length > 0) {
        Modernizr.load([{
            load: [kopa_variable.url.template_directory_uri + 'js/jflickrfeed.js', kopa_variable.url.template_directory_uri + 'js/imgliquid.js'],
            complete: function () {
                $('.flickr-wrap ul').jflickrfeed({
                    limit: 6,
                    qstrings: {
                        id: '78715597@N07'
                    },
                    itemTemplate: 
                        '<li class="flickr-badge-image">' +
                        '<a target="blank" href="{{link-icon}}" title="{{title}}" class="imgLiquid">' +
                        '<img src="{{image_s}}" alt="{{title}}" />' +
                        '</a>' +
                        '</li>'
                }, function (data) {
                    $('.flickr-wrap .imgLiquid').imgLiquid();
                });
            }
        }]);
    }   

/* ============================================
16. Single-author-Filter
=============================================== */

jQuery('.social-filter > div span').click(function () {
    if (jQuery(".social-filter ul").is(":hidden")) {
        jQuery(".social-filter ul").slideDown("slow");
    } else {
        jQuery(".social-filter ul").slideUp();
    }
    return false;
});

/* ============================================
17. Match height
=============================================== */

if ($('.products').length > 0) {
    
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/jquery.matchHeight-min.js'],
        complete: function () {

            var item_1 = $('.products');
            
            item_1.each(function() {
                $(this).children('li').children('a').matchHeight();
            });
        }
    }]);

};


if ($('.owl-product-list-3').length > 0) {
    
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/jquery.matchHeight-min.js'],
        complete: function () {

            var item_2 = $('.owl-product-list-3');
            
            item_2.each(function() {
                $(this).find('.product').children('.product-info').matchHeight();
            });
        }
    }]);

};

if ($('.owl-related-products').length > 0) {
    
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/jquery.matchHeight-min.js'],
        complete: function () {

            var item_3 = $('.owl-related-products');
            
            item_3.each(function() {
                $(this).find('.product').children('.product-info').matchHeight();
            });
        }
    }]);

};

/* =========================================================
18. Fit Video
============================================================ */ 

if ($(".video-wrapper").length > 0) {
    Modernizr.load([{
        load: [kopa_variable.url.template_directory_uri + 'js/fitvids.js'],
        complete: function() {
            $(".video-wrapper").fitVids();
        }
    }]);
};
   

/* =========================================================
19. Scroll to top
============================================================ */

jQuery('.back-to-top').click(function (event) {
    event.preventDefault();
    jQuery('body,html').animate({
        scrollTop: 0
    }, 800);    
    return false;
})

/* =========================================================
20. set User Agent
============================================================ */

var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);



});

 
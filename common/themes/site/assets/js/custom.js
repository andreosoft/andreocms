$(window).load(function(){
  
  $.event.special.swipe.scrollSupressionThreshold = 50;
  $.event.special.swipe.horizontalDistanceThreshold = 60;
  
  $(document).ajaxStop(function() {
    slider_init();
    popup_init();
    range_slider_init();
  });
  
  slider_init();
  popup_init();
  range_slider_init();
  
  $(".main-menu > ul > li > a").on("click", function(e){
    $s = $(this).parent().find(".main-menu__submenu");
    if ($s.length)
    {
      e.preventDefault();
    }
  });
  
  $(".main-menu > ul > li > a").on("mousedown", function(e){
    $s = $(this).parent().find(".main-menu__submenu");
    if ($s.length)
    {
      e.preventDefault();
      $(this).parent().toggleClass("expanded").siblings().removeClass("expanded");
      if ($(this).parent().hasClass("expanded")) $s.attr("tabindex", -1).focus();
    }
  });
  
  $(".main-menu__submenu").on("mouseleave", function(e){
    $(this).parent().removeClass("expanded");
  });
  
  row_height_adjust(".partner", ".partner", true);
  
  $(".show-phone").on("click", function(e){
    e.preventDefault();
    $(this).find("span").text($(this).find("span").attr("data-value"));
    $(this).addClass("show-phone-shown");
  });
  
  row_height_adjust(".products-grid .product", ".product__image");
  row_height_adjust(".products-grid .product", ".product__title");
  row_height_adjust(".products-grid .product", ".product");
  row_height_adjust(".offer-col", ".offer-col");
  
  $(".product-detail__previews a").click(function(){
    if ($(this).attr("href") && $(".product-detail__image img").length) $(".product-detail__image img").attr("src", $(this).attr("href"));
    if ($(this).attr("rel") && $(".product-detail__image a").length) $(".product__image a").attr("href", $(this).attr("rel"));
    $(this).addClass("active").siblings().removeClass("active");
    return false;
  });
  
  $(".product-detail__image a").click(function(){
    images = [];
    index = 0;
    $(".product-detail__previews a").each(function(i){
      if ($(this).hasClass("active")) index = i;
      images.push({
        href : $(this).attr("rel"),                
        title : $(this).attr("title")
      });
    });
    $.fancybox.open(images, {index: index, loop: false});
    return false;
  });
  
});

$(window).scroll(function(){
});

$(window).on("resize orientationchange", function(e){
  $(".partner").css("height", "auto");
  row_height_adjust(".partner", ".partner", true);
  $(".products-grid .product__image").css("height", "auto");
  row_height_adjust(".products-grid .product", ".product__image");
  $(".products-grid .product__title").css("height", "auto");
  row_height_adjust(".products-grid .product", ".product__title");
  $(".products-grid .product").css("height", "auto");
  row_height_adjust(".products-grid .product", ".product");
  $(".offer-col").css("height", "auto");
  row_height_adjust(".offer-col", ".offer-col");
});

function range_slider_init()
{
  $(".range-slider:not(.range-slider-events-added)").addClass("range-slider-events-added").each(function(){
    if ($(this).data("handle1")) h1 = $(this).data("handle1");
    else h1 = "";
    if (h1 && $(h1).length) $h1 = $(h1);
    else $h1 = false;
    if ($(this).data("handle2")) h2 = $(this).data("handle2");
    else h2 = "";
    if (h2 && $(h2).length) $h2 = $(h2);
    else $h2 = false;
    if ($(this).data("min")) min = $(this).data("min");
    else min = 0;
    if ($(this).data("max")) max = $(this).data("max");
    else max = 100;
    if ($(this).data("step")) step = $(this).data("step");
    else step = 1;
    if (h1 && h2) 
    {
      handles = 2;
    }
    else handles = 1;
    if ($h1 && $h2) 
    {
      start = [$h1.val(), $h2.val()];
      to = [$h1, $h2];
    }
    else if ($h1)
    {
      start = $h1.val();
      to = $h1;
    }
    
    suffix = "";
    if ($(this).data("suffix")) suffix = $(this).data("suffix");
     
    
    $(this).prepend("<div class='range-slider__lower'><span>"+start[0]+"</span>"+suffix+"</div>");
    if (typeof start[1] !== 'undefined') $(this).append("<div class='range-slider__upper'><span>"+start[1]+"</span>"+suffix+"</div>");
    $(this).noUiSlider({
      range: [min, max]
      ,start: start
      ,handles: handles
      ,step: step
      ,connect: (handles > 1)?true:"upper"
      ,behaviour: 'tap-drag'
      ,serialization: {
        to: to,
        resolution: 1
      }
      ,set: function(){
        range_slider_set($(this));
      }
      ,slide: function(){
        range_slider_set($(this));
      }
    });
    range_slider_set($(this));
  });
}

function range_slider_set($obj)
{
  $lower = $obj.find(".range-slider__lower");
  $upper = $obj.find(".range-slider__upper");
  $s_lower = $obj.find(".noUi-handle-lower").parent();
  $s_upper = $obj.find(".noUi-handle-upper").parent();
  $lower.css($s_lower.data("style"), $s_lower.css($s_lower.data("style")));
  $upper.css($s_upper.data("style"), $s_upper.css($s_lower.data("style")));
  $lower.find("span:first").text($obj.val()[0]);
  $upper.find("span:first").text($obj.val()[1]);
}

function popup_init()
{
  /*$(".popup-open").each(function(){
    $(this).simplePopup({
      maskOpacity: ($($(this).attr("href")).hasClass("popup-overlay-transparent") || $($(this).attr("href")).closest(".popup").hasClass("popup-overlay-transparent"))?0:1,
      popupSpeedOut: 300,
      popupSpeedIn: 600,
      maskSpeedIn: 300,
      maskSpeedOut: 600
    });
  });*/
  $(".fancybox:not(.fancybox-events-added)").addClass("fancybox-events-added").fancybox();
}

function slider_init()
{
  $(".slider-carousel__crop").attr("data-cycle-carousel-visible", ($(window).width() < 992)?(($(window).width() < 768)?2:3):4);
  $(window).on("resize orientationchange", function(e){
    $(".slider-carousel__crop").attr("data-cycle-carousel-visible", ($(window).width() < 992)?(($(window).width() < 600)?2:3):4).cycle("destroy").cycle();
  });
  $(".slider__crop, .cslider__crop, .islider__crop, .slider-carousel__crop").filter(":not(.slider-events-added)").cycle().on('cycle-before', function(event, opts, outgoingSlideEl, incomingSlideEl, forwardFlag) {
    $(incomingSlideEl).addClass("cycle-slide-visible");
    $(outgoingSlideEl).siblings().andSelf().removeClass("cycle-slide-next").removeClass("cycle-slide-prev");
    $(outgoingSlideEl).addClass("cycle-slide-prev");
    $(incomingSlideEl).addClass("cycle-slide-next");
    if (!opts.allowWrap)
    {
      if (!$(incomingSlideEl).nextAll(':not(.cycle-sentinel)').length) $(opts.next).addClass("disabled");
      else 
      {
        $(opts.next).removeClass("disabled");
      }
      if (!$(incomingSlideEl).prevAll(':not(.cycle-sentinel)').length) $(opts.prev).addClass("disabled");
      else 
      {
        $(opts.prev).removeClass("disabled");
      }
    }
    if (opts.pager) {
      pagers = opts.API.getComponent( 'pager' );
      pagers.each(function() {
        $pager_item = $(this).children().removeClass( opts.pagerActiveClass )
          .eq($(incomingSlideEl).prevAll(':not(.cycle-sentinel)').length);
        $pager_item.addClass( opts.pagerActiveClass );
      });
    }
  });
  
  $(".slider__crop, .cslider__crop, .islider__crop, .slider-carousel__crop").filter(":not(.slider-events-added)").on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
    $(outgoingSlideEl).removeClass("cycle-slide-visible");
  });
  
  $(".slider__crop, .cslider__crop, .islider__crop, .slider-carousel__crop").filter(":not(.slider-events-added)").addClass("slider-events-added");
}

var addCSSRule = function (sheet_id, rules) {
  $("#"+sheet_id).remove();
  $("<style type='text/css' id='"+sheet_id+"'>"+rules+"</style>").appendTo("head");
};

var removeCSSRule = function (sheet_id) {
  $("#"+sheet_id).remove();
};

function row_height_adjust(el, el_title, lineheight, equal)
{
  var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
  if (typeof lineheight === "undefuned") lineheight = false;
  if (typeof equal === "undefined") equal = el === el_title;
  $(el).each(function() {

    $el = $(this);
    topPostion = $el.position().top;

    if (currentRowStart != topPostion) {

      // we just came to a new row.  Set all the heights on the completed row
      for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
        if (currentTallest) 
        {
          if (equal) currentDiv_el_title = rowDivs[currentDiv];
          else currentDiv_el_title = rowDivs[currentDiv].find(el_title);
          currentDiv_el_title.height(currentTallest);
          if (lineheight) currentDiv_el_title.css("line-height", currentTallest+"px");
        }
      }

      // set the variables for the new row
      rowDivs.length = 0; // empty the array
      currentRowStart = topPostion;
      if (equal) $el_el_title = $el;
      else $el_el_title = $el.find(el_title);
      currentTallest = $el_el_title.height();
      rowDivs.push($el);

    } else {

      if (equal) $el_el_title = $el;
      else $el_el_title = $el.find(el_title);
      // another div on the current row.  Add it to the list and check if it's taller
      rowDivs.push($el);
      currentTallest = (currentTallest < $el_el_title.height()) ? ($el_el_title.height()) : (currentTallest);

   }

   // do the last row
    for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
      if (currentTallest) 
      {
        if (equal) currentDiv_el_title = rowDivs[currentDiv];
        else currentDiv_el_title = rowDivs[currentDiv].find(el_title);
        currentDiv_el_title.height(currentTallest);
        if (lineheight) currentDiv_el_title.css("line-height", currentTallest+"px");
      }
      
    }

  });
};

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

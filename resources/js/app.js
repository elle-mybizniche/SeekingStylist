/*  jQuery Nice Select - v1.0  */
!function(e){e.fn.niceSelect=function(t){function s(t){t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class")||"").addClass(t.attr("disabled")?"disabled":"").attr("tabindex",t.attr("disabled")?null:"0").html('<span class="current"></span><ul class="list"></ul>'));var s=t.next(),n=t.find("option"),i=t.find("option:selected");s.find(".current").html(i.data("display")||i.text()),n.each(function(t){var n=e(this),i=n.data("display");s.find("ul").append(e("<li></li>").attr("data-value",n.val()).attr("data-display",i||null).addClass("option"+(n.is(":selected")?" selected":"")+(n.is(":disabled")?" disabled":"")).html(n.text()))})}if("string"==typeof t)return"update"==t?this.each(function(){var t=e(this),n=e(this).next(".nice-select"),i=n.hasClass("open");n.length&&(n.remove(),s(t),i&&t.next().trigger("click"))}):"destroy"==t?(this.each(function(){var t=e(this),s=e(this).next(".nice-select");s.length&&(s.remove(),t.css("display",""))}),0==e(".nice-select").length&&e(document).off(".nice_select")):console.log('Method "'+t+'" does not exist.'),this;this.hide(),this.each(function(){var t=e(this);t.next().hasClass("nice-select")||s(t)}),e(document).off(".nice_select"),e(document).on("click.nice_select",".nice-select",function(t){var s=e(this);e(".nice-select").not(s).removeClass("open"),s.toggleClass("open"),s.hasClass("open")?(s.find(".option"),s.find(".focus").removeClass("focus"),s.find(".selected").addClass("focus")):s.focus()}),e(document).on("click.nice_select",function(t){0===e(t.target).closest(".nice-select").length&&e(".nice-select").removeClass("open").find(".option")}),e(document).on("click.nice_select",".nice-select .option:not(.disabled)",function(t){var s=e(this),n=s.closest(".nice-select");n.find(".selected").removeClass("selected"),s.addClass("selected");var i=s.data("display")||s.text();n.find(".current").text(i),n.prev("select").val(s.data("value")).trigger("change")}),e(document).on("keydown.nice_select",".nice-select",function(t){var s=e(this),n=e(s.find(".focus")||s.find(".list .option.selected"));if(32==t.keyCode||13==t.keyCode)return s.hasClass("open")?n.trigger("click"):s.trigger("click"),!1;if(40==t.keyCode){if(s.hasClass("open")){var i=n.nextAll(".option:not(.disabled)").first();i.length>0&&(s.find(".focus").removeClass("focus"),i.addClass("focus"))}else s.trigger("click");return!1}if(38==t.keyCode){if(s.hasClass("open")){var l=n.prevAll(".option:not(.disabled)").first();l.length>0&&(s.find(".focus").removeClass("focus"),l.addClass("focus"))}else s.trigger("click");return!1}if(27==t.keyCode)s.hasClass("open")&&s.trigger("click");else if(9==t.keyCode&&s.hasClass("open"))return!1});var n=document.createElement("a").style;return n.cssText="pointer-events:auto","auto"!==n.pointerEvents&&e("html").addClass("no-csspointerevents"),this}}(jQuery);


(function($){

    

    var app = {
        onReady: function(){

            gn.appendRays('.home-featured-card .wp-block-group:first-child');

            gn.mainMMenu();

            gn.faqAccordion();

            gn.menuFixedOnScroll();

            gn.customSelect();
            
            $(document).foundation();
        },
        onLoad: function(){

		},
		utils: function(){
		},
    }


    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);

    
})(jQuery);

$(window).on('resize', function(){
    gn.menuFixedOnScroll();
});


var gn = {

    mainMMenu : function(){
         $("#main-menu-control").mmenu({
            offCanvas: {
                position: "right"
            },
        }, {
            clone : true
        });
    },

    appendRays : function($element){
        var getElement = $($element);
        if (getElement[0]) {
            var _src = global_obj.templateUrl + '/resources/img/svg/icon-rays-pink.svg';

            getElement.append('<img src="'+ _src +'" alt="icon rays" title="icon rays" class="icon-rays">');
        }
    },


    faqAccordion: function(){
        $('.faq-item h3').click(function(){

            $controlTitle = $(this);

            $('.faqs-section').find('.faq-item .faq-answer:visible').slideUp();
            $('.faqs-section').find('.faq-item h3.accord-open').removeClass('accord-open');
            
            var itemContent = $(this).closest('.faq-item').find('.faq-answer');
            if (!itemContent.is(':visible')) {
                itemContent.slideToggle()
                $controlTitle.toggleClass('accord-open');
            }else{
                $controlTitle.removeClass('accord-open');
            }
        });
    },


    menuFixedOnScroll : function(){
        var el = $('header .main-menu');
        if (el[0]) {
            getdistance = window.pageYOffset + el[0].getBoundingClientRect().top;

            $(window).scroll(function(){
                if ($(window).scrollTop() >= getdistance) {
                   el.addClass('fixed-header');
                }
                else {
                   el.removeClass('fixed-header');
                }
            });
        }
        
    },


    customSelect : function(){
        $('.custom-select select').niceSelect();
    }



}


(function($){

    var app = {
        onReady: function(){

            gn.appendRays('.home-featured-card .wp-block-group:first-child');

            gn.mainMMenu();

            gn.faqAccordion();

            gn.menuFixedOnScroll();
            
        },
        onLoad: function(){
			$(document).foundation();
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
        var el = $('header .main-menu')[0];
        getdistance = window.pageYOffset + el.getBoundingClientRect().top;

        $(window).scroll(function(){
            if ($(window).scrollTop() >= getdistance) {
                $('header .main-menu').addClass('fixed-header');
            }
            else {
                $('header .main-menu').removeClass('fixed-header');
            }
        });
    }



}


(function($){

    var app = {
        onReady: function(){
            gn.appendRays('.home-featured-card .wp-block-group:first-child');
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


var gn = {

    mainMMenu : function(){
        console.log('mmenu');
    },

    appendRays : function($element){
        var getElement = $($element);
        if (getElement[0]) {
            var _src = 'wp-content/themes/mybizniche/resources/img/svg/icon-rays-pink.svg';

            getElement.append('<img src="'+ _src +'" alt="icon rays" title="icon rays" class="icon-rays">');
        }
    },



}
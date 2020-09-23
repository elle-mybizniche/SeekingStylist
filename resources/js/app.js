

(function($){

    var app = {
        onReady: function(){
            gn.appendRays('.home-featured-card .wp-block-group:first-child');

            gn.mainMMenu();
            
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



}
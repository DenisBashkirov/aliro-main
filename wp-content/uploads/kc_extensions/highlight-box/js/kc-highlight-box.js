(function($){
    $(document).ready(function($) {
        kc_highlight();
    });
    window.kc_highlight = function (){
        jQuery(".kc-highlight-box[data-shake!='']").each( function (){

            if( $(this).data('loaded') !== true )
                $(this).data({'loaded': true});
            else return;

            var delay = $(this).data('delay'),
                anim = $(this).data('animate'),
                that = $(this);
                if( anim != 'none' ){
                    var interval = setInterval(function (){
                        that.toggleClass( anim );
                        setTimeout( function (){
                            that.removeClass( anim );
                        }, 2000);
                    },delay * 1000 );
                }

        });

    }
})(jQuery);

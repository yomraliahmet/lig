$(function(){


    jQuery.fn.extend({
        moveToAnimate: function(newParent, duration) {
            duration = duration || 'slow';
            
            var $element = $(this);
            
            newParent = $(newParent);
            var oldOffset = $element.offset();
            $(this).appendTo(newParent);
            var newOffset = $element.offset();
            
            var temp = $element.clone().appendTo('body');
            
            temp.css({
                'position': 'absolute',
                'left': oldOffset.left,
                'top': oldOffset.top,
                'zIndex': 1000
            });
            
            $element.hide();
                
            temp.animate({
                'top': newOffset.top,
                'left': newOffset.left
            }, duration, function() {
                $element.show();
                temp.remove();
            });
        }
    });


    function printdiv2(t,islast) {	
        $("#team_" + t.team_id).moveToAnimate($('#group_' + t.group), "slow");
    }

    function baslat(){

        $(".spinner").show();

        $.getJSON("/server.php", function(result){
            
            var array = result;

            $(".spinner").hide();

            var counter = 0;
            var interv = setInterval(function(){ 
                var islast = false;
                if(counter+1 == array.length) {
                    islast = true;
                } 
                printdiv2(array[counter],islast);
                counter++;
                if(counter == array.length) {
                    clearInterval(interv);
                } 
            }, 1000);

        });
    }

    $("#draw_last").on("click", function(){
        $(this).attr("disabled","disabled");
        baslat();
    });

});

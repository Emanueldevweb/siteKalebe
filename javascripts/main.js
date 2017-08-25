/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
;(function () {


var isMobile = {
    Android: function() {
            return navigator.userAgent.match(/Android/i);
    },
            BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
    },
            iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
            Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
    },
            Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
    },
            any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

var fullHeight = function() {
    debugger;
    if ( !isMobile.any() ) {
            $('.fullheight').css('height', $(window).height()-$("nav").height());
            $('.header.fullheight').css('padding-top', $("nav").height());
            
            $(window).resize(function(){
                $('.fullheight').css('height', $(window).height()-$("nav").height());
                $('.header.fullheight').css('padding-top', $("nav").height());
                    
            });
    
    
            //$('.fullheight').css('height', $(window).height()-$("nav").height()-2);
            //$(window).resize(function(){
            //        $('.fullheight').css('height', $(window).height()-$("nav").height()-2);
            //});
    }
    else{ 
        
        $('header.fullheight').css('height', $(window).height());
        $('header.header.fullheight').css('padding-top', $("nav").height());
            
            
            
        $(window).resize(function(){
            $('header.fullheight').css('height', $(window).height());
            $('header.header.fullheight').css('padding-top', $("nav").height());

        });
        
    }
    

};
        
        
$(function(){
    fullHeight();
});        
        
        
}());
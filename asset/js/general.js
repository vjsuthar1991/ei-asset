// JavaScript Document
jQuery = jQuery.noConflict();
var ASSET = {
    lastScrollTop:0,
    didScroll: true,
    init: function() {
        jQuery(window).resize(function() {
            ASSET.loadResize();
        });


        
            //$scope.pools = [];
   
        

       
        ASSET.dashboard();

    },


    /* ! csf.loadResize */
    loadResize: function() {
        //load resize script starts 

        //script to get windows height and width
        var window_h = window.innerHeight;
        var window_w = document.body.clientWidth;

        

        

        //condition for the device width greater then and equal to 768
        if (window_w >= 768) {
        
        }

        //condition for the device width less then and equal to 768(mobile devices)
        else {
        
        }
        //load resize script ends 
    },

    /*
		Function Name : dashboard
		script for demo
		@version: 2017-04-21 updated
	*/

    dashboard: function() {
        
                
    },
};

// when the page is ready, initialize everything
jQuery(document).ready(function() {
    ASSET.init();
});
$(document).ready(function(){
    
    /**
     * Pre used functions for body onload
     */
    setTimeout( function() { 
            $('#Alerts').load('pending_reminder_new.php');
    }, 2000); 


   setInterval(function()
   {
        $('#Alerts').load('pending_reminder_new.php');
   }, 15*60*1000);

    resizeContents();
    $(window).resize(function(){
        resizeContents();
    });
    $('.dropdown-menu').dropdown({effect: 'bounce'});
    $('.topmenu').mouseenter(function(){
        $(this).children('.dropdown-toggle').click();
    }).mouseleave(function(){
        $(this).children('.dropdown-toggle').click();
        if($(this).children('.dropdown-menu').css('display')==='block'){
            $(this).children('.dropdown-toggle').click();
        }
    });
    $(".sidemenu").accordion({
        closeAny: true, //true or false. if true other frames (when current opened) will be closed
        open: function(frame){}, // when current frame opened this function will be fired
        action: function(frame){} // when any frame opened this function will be fired
    });
    setInterval(function(){
        $('.help-tour').effect("highlight", {color: '#FF0000'}, 800);
    },1000);
    
    $('#customizable').mouseover(function(){
        if($('#save').is(":visible")){
            $('#edit').hide();
        }else{
            $('#edit').show();
        }
    }).mouseout(function(){
        $('#edit').hide();
    });
    
    $('#edit').click(function(){
        
        $('#edit').hide();
        $('#save').show();
        $('.mymenu').children('li').each(function(){
            
            $(this).addClass('fav-menu-edit').append('<span class="icon-cancel delete" onclick="$(this).parent().remove();"></span>');
            
        });
        $(".dropmenu li").draggable({
            appendTo: "body",
            helper: "clone"
        });
        $( "#customizable" ).droppable({
            activeClass: "shown",
            hoverClass: "placeholder-editable",
            accept: ":not(.ui-sortable-helper)",
            drop: function( event, ui ) {
                var target = ui.draggable.find('a').attr('href'),
                    linkName = ui.draggable.find('a').html();
                $(this).find( ".placeholder" ).remove();
                $(this).children('.mymenu').addClass('no-padding').append('<li class="fav-menu-edit"><a href="'+target+'">'+linkName+'</a><span class="icon-cancel delete" onclick="$(this).parent().remove();"></span></li>');
                $(this).children('.mymenu').find('i').remove();
            }
          }).sortable({
            items: "li:not(.placeholder)",
            sort: function() {
              // gets added unintentionally by droppable interacting with sortable
              // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
              $( this ).removeClass( "ui-state-default" );
            }
          });
        return false;
    });
    $('#save').click(function(){
        $(this).hide();
        $('.mymenu').children('li').each(function(){
            $('.delete').remove();
            $(this).removeAttr('style').removeAttr('class');
        });
        $('.mymenu').addClass('dropdown-menu').dropdown();
        $(".dropmenu li").draggable('destroy');
        $( "#customizable" ).droppable('destroy').sortable('destroy');
        $.post('home-new.php', {option: 'saveCustomMenu', customMenuHtml: $('.mymenu').html() }, function(response){alert(response);}, 'text');
    });
    if($('.noticecontents').is(':visible')){
        $('.noticecontents').fadeOut(500);
    }
    $('#notification').click(function(){
        $('.noticecontents').fadeIn(1000);
    });
    $('.noticecontents .cancel').click(function(){
        $('.noticecontents').fadeOut(500);
    });
    $('#showmNotification').click(function(){
        setTimeout(function(){
            $.Notify({style: {background: '#1ba1e2', color: 'white'}, caption: 'Info...', content: "This is one Notification!!!"});
        }, 1000);
        setTimeout(function(){
            $.Notify({style: {background: 'red', color: 'white'}, content: "This is high priority notificationt!!!"});
        }, 2000);
        setTimeout(function(){
            $.Notify({style: {background: 'green', color: 'white'}, content: "This is a accepted or success notification!!!"});
        }, 3000);
        setTimeout(function(){
            $.Notify({content: "Default style for Notice"});
        }, 4000);
    });
   $('#showmeNotification').click(function(){
       $.Dialog({
            shadow: true,
            overlay: true,
            icon: '<span class="icon-warning"></span>',
            title: 'For Your Information',
            width: 90,
            padding: 10,
            content: '',
            onShow: function(_dialog){
                var content = _dialog.children('.content');
                content.html('<div class="popup-content">' + $('#popup-content').html() + '</div>');
            }
        });
   });
    
    centerconts = $('#centercontainer');
    centerconts.marquee();
    centerconts.hover(function() {
        centerconts.marquee('pause');
    }, function() {
        centerconts.marquee('play');   
        if(centerconts.css('overflow')==='auto'){
            centerconts.css('overflow', 'hidden');
        }
    });
});

/**
 * Plugin for marquee contents
 * written exclusively for jquery
 * @param {type} $
 * @returns {undefined}
 */
(function($) {
        
    var methods = {
        init: function(options) {
            this.children(':first').stop();
            this.marquee('play');
        },
        play: function() {
            var marquee = this,
                pixelsPerSecond = 30,
                firstChild = this.children(':first'),
                totalHeight = 0,
                difference,
                duration;

            // Find the total height of the children by adding each child's height:
            this.children().each(function(index, element) {
                totalHeight += $(element).innerHeight();
            });

            // The distance the divs have to travel to reach -1 * totalHeight:
            difference = totalHeight + parseInt(firstChild.css('margin-top'), 10);

            // The duration of the animation needed to get the correct speed:
            duration = (difference/pixelsPerSecond) * 1000;

            // Animate the first child's margin-top to -1 * totalHeight:
            firstChild.animate(
                { 'margin-top': -1 * totalHeight },
                duration,
                'linear',
                function() {
                    // Move the first child back down (below the container):
                    firstChild.css('margin-top', marquee.innerHeight());
                    // Restart whole process... :)
                    marquee.marquee('play');
                }
            );
        },
        pause: function() {
            this.children(':first').stop();
        }
    };

    $.fn.marquee = function(method) {

        // Method calling logic
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.marquee');
        }

    };
    
    /*
    the json config obj.
    name: the class given to the element where you want the tooltip to appear
    bgcolor: the background color of the tooltip
    color: the color of the tooltip text
    text: the text inside the tooltip
    time: if automatic tour, then this is the time in ms for this step
    position: the position of the tip. Possible values are
        TL	top left
        TR  top right
        BL  bottom left
        BR  bottom right
        LT  left top
        LB  left bottom
        RT  right top
        RB  right bottom
        T   top
        R   right
        B   bottom
        L   left
     */
    var config = [
        {
            "name" 		: "tour_1",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "position"	: "TR",
            "text"		: "You can customize and change your details here",
            "time" 		: 3000
        },
        {
            "name" 		: "tour_2",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "You can go to Kudos from here",
            "position"	: "TR",
            "time" 		: 3000
        },
        {
            "name" 		: "tour_3",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "Here you go for the Speak Up",
            "position"	: "TR",
            "time" 		: 3000
        },
        {
            "name" 		: "tour_4",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "Go for a Discussion at U &amp; I from right here",
            "position"	: "TR",
            "time" 		: 3000
        },
        {
            "name" 		: "tour_5",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "You can find all the important brochures to be downloaded right here",
            "position"	: "L",
            "time" 		: 3000
        },
        {
            "name" 		: "tour_6",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "Useful links about products are here and you can expand the tab by clicking on it",
            "position"	: "L",
            "time" 		: 4000
        },
        {
            "name" 		: "tour_7",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "You can get these links arranged as you like and prefer in &quot;My Menu&quot;.",
            "position"	: "L",
            "time" 		: 5000
        },
        {
            "name" 		: "tour_8",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "If you want your customized items in &quot;My Menu&quot;, click the pencil icon on the tab.<br /> It turns into a save icon.",
            "position"	: "TR",
            "time" 		: 7000
        },
        {
            "name" 		: "tour_7",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "Now drag link items from here and ...",
            "position"	: "L",
            "time" 		: 5000
        },
        {
            "name" 		: "tour_8",
            "bgcolor"	: "#000000",
            "color"		: "white",
            "text"		: "Put them into &quot;My Menu&quot; Bucket.<br />You may put as many items as you wish.",
            "position"	: "TR",
            "time" 		: 7000
        },
        {
            "name" 		: "tour_8",
            "bgcolor"	: "#000000",
            "color"		: "#FFFFFF",
            "text"		: "Just click on the save icon displayed on &quot;My Menu&quot; when you are done.",
            "position"	: "TR",
            "time" 		: 7000
        },
        {
            "name" 		: "tour_8",
            "bgcolor"	: "#000000",
            "color"		: "#FFFFFF",
            "text"		: "Now you can always find your preferred menu in here",
            "position"	: "TR",
            "time" 		: 5000
        },
        {
            "name" 		: "tour_9",
            "bgcolor"	: "#000000",
            "color"		: "#FFFFFF",
            "text"		: "Thank you for Watching the tour.<br />Contact for any queries.",
            "position"	: "T",
            "time" 		: 5000
        }
    ],
    //define if steps should change automatically
    autoplay	= true,
    //timeout for the step
    showtime,
    //current step of the tour
    step		= 0,
    //total number of steps
    total_steps	= config.length;

    //show the tour controls
    //showControls();

    /*
    we can restart or stop the tour,
    and also navigate through the steps
     */
    $('#activatetour').on('click',startTour);
    
    function startTour(){
        $('#activatetour').hide();
        showOverlay();
        $('.hint').hide();
        nextStep();
    }

    function nextStep(){
        
        if(step >= total_steps){
            //if last step then end tour
            endTour();
            $('#save').hide();
            $('.tour_7').slideUp();
            return false;
        }
        if(step === 1){
            $('.profileicon').click();
        }
        if(step === 2){
            $('.profileicon').click();
        }
        if(step === 6){
            $('.tour_7').slideDown();
        }
        if(step === 8){
            $('#edit').show();
        }
        if(step === 10){
            $('#edit').hide();
            $('#save').show();
        }
        
        ++step;
        showTooltip();
    }

    

    function endTour(){
        step = 0;
        if(autoplay) clearTimeout(showtime);
        $('#activatetour').show();
        removeTooltip();
        hideOverlay();
    }


    function showTooltip(){
        //remove current tooltip
        removeTooltip();

        var step_config		= config[step-1];
        var $elem			= $('.' + step_config.name);

        if(autoplay)
            showtime	= setTimeout(nextStep,step_config.time);

        var bgcolor 		= step_config.bgcolor;
        var color	 		= step_config.color;

        var $tooltip		= $('<div>',{
            id			: 'tour_tooltip',
            class 	: 'tooltip',
            html		: '<p style="color:#FFF;padding:5px">'+step_config.text+'</p><span class="tooltip_arrow"></span>'
        }).css({
            'display'			: 'none',
            'background-color'	: bgcolor,
            'color'				: color
        });

        //position the tooltip correctly:

        //the css properties the tooltip should have
        var properties		= {};

        var tip_position 	= step_config.position;

        //append the tooltip but hide it
        $('BODY').prepend($tooltip);

        //get some info of the element
        var e_w				= $elem.outerWidth();
        var e_h				= $elem.outerHeight();
        var e_l				= $elem.offset().left;
        var e_t				= $elem.offset().top;


        switch(tip_position){
            case 'TL'	:
                properties = {
                    'left'	: e_l,
                    'top'	: e_t + e_h + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_TL');
                break;
            case 'TR'	:
                properties = {
                    'left'	: e_l + e_w - $tooltip.width() + 'px',
                    'top'	: e_t + e_h + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_TR');
                break;
            case 'BL'	:
                properties = {
                    'left'	: e_l + 'px',
                    'top'	: e_t - $tooltip.height() + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_BL');
                break;
            case 'BR'	:
                properties = {
                    'left'	: e_l + e_w - $tooltip.width() + 'px',
                    'top'	: e_t - $tooltip.height() + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_BR');
                break;
            case 'LT'	:
                properties = {
                    'left'	: e_l + e_w + 'px',
                    'top'	: e_t + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_LT');
                break;
            case 'LB'	:
                properties = {
                    'left'	: e_l + e_w + 'px',
                    'top'	: e_t + e_h - $tooltip.height() + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_LB');
                break;
            case 'RT'	:
                properties = {
                    'left'	: e_l - $tooltip.width() + 'px',
                    'top'	: e_t + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_RT');
                break;
            case 'RB'	:
                properties = {
                    'left'	: e_l - $tooltip.width() + 'px',
                    'top'	: e_t + e_h - $tooltip.height() + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_RB');
                break;
            case 'T'	:
                properties = {
                    'left'	: e_l + e_w/2 - $tooltip.width()/2 + 'px',
                    'top'	: e_t + e_h + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_T');
                break;
            case 'R'	:
                properties = {
                    'left'	: e_l - $tooltip.width() + 'px',
                    'top'	: e_t + e_h/2 - $tooltip.height()/2 + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_R');
                break;
            case 'B'	:
                properties = {
                    'left'	: e_l + e_w/2 - $tooltip.width()/2 + 'px',
                    'top'	: e_t - $tooltip.height() + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_B');
                break;
            case 'L'	:
                properties = {
                    'left'	: e_l + e_w  + 'px',
                    'top'	: e_t + e_h/2 - $tooltip.height()/2 + 'px'
                };
                $tooltip.find('span.tooltip_arrow').addClass('tooltip_arrow_L');
                break;
        }


        /*
        if the element is not in the viewport
        we scroll to it before displaying the tooltip
         */
        var w_t	= $(window).scrollTop();
        var w_b = $(window).scrollTop() + $(window).height();
        //get the boundaries of the element + tooltip
        var b_t = parseFloat(properties.top,10);

        if(e_t < b_t)
            b_t = e_t;

        var b_b = parseFloat(properties.top,10) + $tooltip.height();
        if((e_t + e_h) > b_b)
            b_b = e_t + e_h;


        if((b_t < w_t || b_t > w_b) || (b_b < w_t || b_b > w_b)){
            $('html, body').stop()
            .animate({scrollTop: b_t}, 500, 'easeInOutExpo', function(){
                //need to reset the timeout because of the animation delay
                if(autoplay){
                    clearTimeout(showtime);
                    showtime = setTimeout(nextStep,step_config.time);
                }
                //show the new tooltip
                $tooltip.css(properties).show();
            });
        }
        else
        //show the new tooltip
            $tooltip.css(properties).show();
    }

    function removeTooltip(){
        $('#tour_tooltip').remove();
    }

    function showOverlay(){
        var $overlay	= '<div id="tour_overlay" class="overlay"></div>';
        $('BODY').prepend($overlay);
    }

    function hideOverlay(){
        $('#tour_overlay').remove();
    }

})(jQuery);

function logout(){
    window.location.href = "logout.php";
}
function submitForm(daction) {
	document.taskTrackerForm.mode.value = daction;
	document.taskTrackerForm.submit();
}

function submitAddressDBForm(mode) {
	document.addressDBForm.mode.value = mode;
	document.addressDBForm.submit();
}

function submitTaskTrackerForm() {
	document.taskTrackerFormMS.submit();
}
function assetSubmitCheck() {
	if(document.getElementById('asset1').checked==true && document.getElementById('asset2').checked==true 
		&& document.getElementById('asset3').checked==true 
		&& document.getElementById('asset4').checked==true 
		&& document.getElementById('asset5').checked==true
		&& document.getElementById('asset6').checked==true
		) {
		assetCheckForm.submit();
	} else {
		alert("You must select the all checkboxes.");
	}
}
function disp0() {
	document.getElementById('asset1').disabled="";
	document.getElementById('cb1').style.fontWeight="bold";
}
function disp1() {
	document.getElementById('asset2').disabled="";
	document.getElementById('cb2').style.fontWeight="bold";
}
function disp2() {
	document.getElementById('asset3').disabled="";
	document.getElementById('cb3').style.fontWeight="bold";
}
function disp3() {
	document.getElementById('asset4').disabled="";
	document.getElementById('cb4').style.fontWeight="bold";
}
function disp4() {
	document.getElementById('asset5').disabled="";
	document.getElementById('ta1').style.display="";
	document.getElementById('cb6').style.fontWeight="bold";
}
function disp5() {
	document.getElementById('asset6').disabled="";
	document.getElementById('cb7').style.fontWeight="bold";
}
function resizeContents(){
    var topconts = $('#topnav').height() + $('#breadcrumb').height() + $('footer').height() + 28,
            topcontNtile =  topconts + $('#tileContainer').height();
    $('#fixedcontainer').height(($(window).height() - topconts) + 'px');
    $('#centercontainer').height(($(window).height() - topcontNtile) + 'px');
    $('#sideMenu').height($('#fixedcontainer').height()).addClass('show-scroll');
    $('#rightcontainer').height($('#centercontainer').height()).addClass('show-scroll');
    
}
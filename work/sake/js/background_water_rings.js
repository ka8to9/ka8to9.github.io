
//the function that creates water_ring
function water_ring(){
    //calculating random color of water_ring
    var color = 'hsla(210, 10%, 40%, 0.1)';

    //calculating random X position
    var x = Math.floor(Math.abs(.2)*$(window).width());

    //calculating random Y position
    var y = Math.floor(Math.abs(.3)*$(window).height());

    //creating the water_ring and hide
    drawingpix = $('<span>').attr({class: 'drawingpix'}).hide();

                            //appending it to body
                             $(document.body).append(drawingpix);

                             //styling water_ring.. filling colors.. positioning.. showing.. growing..fading
                                               
                             drawingpix.css({
                                            'background-color':color,
                                            top: y-14,    //offsets
                                            left: x-14 //offsets
                                            }).show().animate({
                                                                height:'600px',
                                                                width:'600px',
                                                                'border-radius':'600px',
                                                                '-moz-border-radius': '600px',
                                                                '-webkit-border-radius': '600px',
                                                                opacity: 0.1,
                                                                top: y-300,    
                                                                //offsets
                                                                left: x-300,
                             }, 6500).fadeOut(500);
                            
                           //Every water_ring's end starts a new water_ring
                             window.setTimeout('water_ring()',2000);
 }			
$(document).ready(function() {  
                     //calling the first water_ring
                     water_ring();
});

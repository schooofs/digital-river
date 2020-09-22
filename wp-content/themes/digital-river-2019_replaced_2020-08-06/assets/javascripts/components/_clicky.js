  jQuery(document).ready(function($){ $(".our-services-wrapper .capability").on("click", function() {

	    //$(".our-services-wrapper .capabilities-wrapper").removeClass("active");
	    
	    // Set clicked value prop's description wrapper to active
	    var capability_id = $(this).attr('id');
	    
	    $(".capability-description-wrapper").removeClass("active");
	    
	    $(".capability-description-wrapper[data-capid='"+capability_id+"']").addClass("active");
	    
	     $(this).parent().find(".capability").removeClass("active");
	     
	     $(this).addClass("active");
	    

	});                        

	$(".capability-description-wrapper .back").on("click", function() {
	    var $parent = $(this).parent(".capability-description-wrapper");
	    $parent.removeClass("active");

	    $(".our-services-wrapper .capabilities-wrapper").addClass("active");

	});
        
    
    $(".capability").on("click", function(){
          if( $(".startA").hasClass( "active" ) )
        {
            $( ".startB" ).addClass( "active" );
            $( ".scaleB" ).removeClass( "active" );
            $( ".dominateB" ).removeClass( "active" );
            
              $( ".start" ).addClass( "active" );
              $( ".scale" ).removeClass( "active" );
              $( ".dominate" ).removeClass( "active" );
        }
        if( $(".scaleA").hasClass( "active" ) )
            
        {
            $( ".scaleB" ).addClass( "active" );
            $( ".startB" ).removeClass( "active" );
            $( ".dominateB" ).removeClass( "active" );
            
          $( ".scaleB" ).addClass( "active" );
          $( ".scale" ).addClass( "active" );
          $( ".start" ).removeClass( "active" );
          $( ".dominate" ).removeClass( "active" );
        }
        if( $(".dominateA").hasClass( "active" ) )
        {
            $( ".dominateB" ).addClass( "active" );
            $( ".startB" ).removeClass( "active" );
            $( ".scaleB" ).removeClass( "active" );
            
          $( ".dominateB" ).addClass( "active" );
          $( ".dominate" ).addClass( "active" );
          $( ".start" ).removeClass( "active" );
          $( ".scale" ).removeClass( "active" );
        }
    
       });
                                                                
});
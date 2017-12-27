  

    $(document).ready(function() {
    	  url = "php/khr_dispatch.php?action=2000";
    	  return;
	      $.ajax({url: url, 
                success: function(result) {
                            $('#id_khr_einhalt').html(result);
                         }
	    });
    });
  	
    $(document).ready(function() {
    		$('#idMainResultate').off();
    		$('#idMainResultate').on(
    			 'click',
                 '.khr_link', 
                 function(event) {
				   event.preventDefault(); 		
				   data = $(this).data();											    		  
				   first = true;
				   qstring ='';
				   for (var key in data) {
					   if (key == "id") {
						   id = data[key];
						   continue;
					   }
				     if (first) {
					     qstring += '?';
					     first = false;
				     }
				     else {
					     qstring += '&';
				     }
				     qstring += key + '=' + data[key];
				   }
				   url='php/khr_dispatch.php' + qstring;
				   $.ajax({url: url, 
				           success: function(result) {
						                  $('#' + id).html(result);
						               }
					    	 });  // .ajax
    		}) // on
   }); // ready
    
   $(document).ready(function()  {
      $('#idMenu').on('show.uk.switcher',
		                  function(event, area) {
	                       //document.getElementById("id_khr_einhalt").innerHTML="";
                      });
  });

    
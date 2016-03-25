  
    function debug(txt) {  
	  d = new Date();
      document.getElementById("id_debug").innerHTML = "debug " + d.toLocaleTimeString() + " " + txt;
    }

    $(document).ready(function() { 
	      $.ajax({url: "php/khr_dispatch.php?action=2000", 
                success: function(result) {
                            $('#id_khr_einhalt').html(result);
                         }
	    });
    });
  	
    $(document).ready(function() {
    		$('#idMainResultate').off();
    		$('#idMainResultate').on('click',
                 '.jba_link', 
                 function(event) {
			   event.preventDefault(); 
			   //id   = $(this).data('id');		
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
			   //debug(id + "  " + url);
			   //return
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
	                       document.getElementById("id_khr_einhalt").innerHTML="";
                      });
  });

    
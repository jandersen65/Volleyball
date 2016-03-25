
<!DOCTYPE html>

<html>

  <head>
  
    <link rel="stylesheet" href="css/khr.css" />
    <link rel="stylesheet" href="lib/uikit-2.23.0/css/uikit.min.css" />
    <link rel="stylesheet" href="lib/uikit-2.23.0/css/components/datepicker.min.css" />    
    <link rel="stylesheet" href="lib/uikit-2.23.0/css/components/sticky.min.css" />    
    <link rel="stylesheet" href="lib/uikit-2.23.0/css/components/accordion.min.css" />
    
    <script type="text/javascript" src="javascript/ktv.js">                                     </script>
    <script type="text/javascript" src="javascript/resultat.js">                                </script>
    
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >                             </script>
    
    <script type="text/javascript" src="lib/uikit-2.23.0/js/uikit.min.js">                      </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/nav.min.js">                   </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/tab.min.js">                   </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/button.min.js">               </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/switcher.min.js">              </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/utility.min.js">               </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/offcanvas.min.js">             </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/dropdown.min.js">              </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/accordion.min.js">          </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/sticky.min.js">          </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/datepicker.min.js">      </script>
    
    
    <title>Resultatbrowser</title>
    
  </head>
  
  
  
  <body>
  
		  <script type="text/javascript">		
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
		    		$('#IdJbaResultate').off();
		    		$('#IdJbaResultate').on('click',
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
      </script>
      
      
		      <div id="id_debug" >
		      </div>
		      
		      
  <div id="IdJbaResultate" class="uk-container">
      
    <table>
      <tr>
        <td>
					<ul id="idMenu" class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#idSubMenu'}">
				        <li><a  class= "jba_link" href="#" data-id="id_khr_einhalt" data-action="2000">KTV Riehen</a></li>
				        <li><a  class= "jba_link" href="#" data-id="id_khr_einhalt" data-action="6000">Regio</a></li>
				        <li><a  class= "jba_link" href="#" data-id="id_khr_einhalt" data-action="6010">National</a></li>
					</ul>
			  </td>
			</tr>
      <tr>
        <td>
					<ul id="idSubMenu" class="uk-switcher">
					    <li>
					      <div>
					        <ul class="uk-subnav uk-subnav-pill">
		                <li><a class= "jba_link" href="#"  data-id="id_khr_einhalt" data-action="2000">Aktuelle Spiele   </a></li>
		                <li><a class= "jba_link" href="#"  data-id="id_khr_einhalt" data-action="7025">Mannschaften      </a></li>
		                <li><a class= "jba_link" href="#"  data-id="id_khr_einhalt" data-action="2010">Alle KTV-Spiele   </a></li>
					        </ul>
					      </div>
					    </li>
					    <li>
					      <div>
					        <ul class="uk-subnav uk-subnav-pill">
			              <li><a class= "jba_link" href="#"  data-id="id_khr_einhalt" data-action="6000" data-offset=0>Heute</a></li>
		                <li><a class= "jba_link" href="#"  data-id="id_khr_einhalt" data-action="7030"    >Vereine</a></li>
					        </ul>
					      </div>
					    </li>
					    <li>
					      <div>
					        <ul class="uk-subnav uk-subnav-pill">
			              <li><a class= "jba_link" href="#"  data-id="id_khr_einhalt" data-action="6010" data-offset=0>Heute</a></li>
		                <li><a class= "jba_link" href="#"  data-id="id_khr_einhalt" data-action="7032"    >Vereine</a></li>
					        </ul>
					      </div>
					    </li>
					</ul>
			  
			  </td>
        <td>
			
			</tr>
			</table>
			
			<table>
      <tr>
        <td>
			    <div id="id_khr_einhalt" >
			    </div>
		  
			  </td>
		  
			</tr>
	  </table>
	
  </div>
  
		  
</body>
  
  

</html>
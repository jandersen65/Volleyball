

<!DOCTYPE html>

<html>

  <head>
  
    <link rel="stylesheet" href="lib/uikit-2.23.0/css/uikit.min.css" />
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >             </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/uikit.js" >         </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/tab.js">       </script>
    
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/dropdown.js">  </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/nav.js">       </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/switcher.js">  </script>
    
    <title>UIKit Tab</title>
    
  </head>
  
  <body>

		  <script type="text/javascript">		
		  
		    $(document).ready(function() {
					  $('#id-tab').on('change.uk.tab', 
										             function(event, activeItem, previousItem) {
									                   console.log('change.uk.tab');
								                 });
			    });

		    $(document).ready(function() {
	    		$('#id-tab').off();
	    		$('#id-tab').on('click',
					                '.jba-tab', 
					                function(event) {
													  event.preventDefault(); 		
													  data = $(this).data();				
													  console.log(data);
										    	}) // on
	   }); // ready
			   
				   
      </script>
  
        <div class="uk-container">
<br/>
<br/>
           <ul id="id-tab" class="uk-tab" data-uk-tab="">
              <li class="uk-active" ><a class="jba-tab" href="#" data-param1="p1.1" data-param2="p1.2">Tab 1</a></li>
              <li>                   <a class="jba-tab" href="#" data-param1="p2.1" data-param2="p2.2">Tab 2</a></li>
           </ul>
         </div>
         
           
    </body>
  
</html>

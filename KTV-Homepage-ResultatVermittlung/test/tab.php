

<!DOCTYPE html>

<html>

  <head>
  
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/uikit.min.css" />
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >             </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/uikit.js" >         </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/tab.js">       </script>
    
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/dropdown.js">  </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/nav.js">       </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/switcher.js">  </script>
    
    <title>UIKit Tab</title>
    
  </head>
  
  <body>

		  <script type="text/javascript">		
		  
		    $(document).ready(function() {
					  $('#id-tab-1').on('change.uk.tab', 
										             function(event, activeItem, previousItem) {
									                   console.log('change.uk.tab - 1');
								                 });
			    });


		    $(document).ready(function() {
					  $('#id-tab-2').on('change.uk.tab', 
										             function(event, activeItem, previousItem) {
									                   console.log('change.uk.tab - 2');
								                 });
			    });
		    
		    $(document).ready(function() {
	    		$('#id-tab-1').off();
	    		$('#id-tab-1').on('click',
					                '.jba-tab', 
					                function(event) {
													  event.preventDefault(); 		
													  data = $(this).data();				
													  console.log(data);
										    	}) // on
	     }); // ready


		    $(document).ready(function() {
	    		$('#id-tab-2').off();
	    		$('#id-tab-2').on('click',
					                '.jba-tab', 
					                function(event) {	
													  data = $(this).data();
													  console.log(data);
										    	}) // on
	     }); // ready

	     
      </script>
  
<br/>
<br/>
        <div class="uk-container">
           <ul id="id-tab-1" class="uk-tab" data-uk-tab="">
              <li class="uk-active" ><a class="jba-tab" href="#" data-param1="p1.1.1" data-param2="p1.2">Tab 1.2.1</a></li>
              <li>                   <a class="jba-tab" href="#" data-param1="p1.1.2" data-param2="p1.2">Tab 1.2.2</a></li>
           </ul>
         </div>
         
         
<br/>
<br/>
        <div class="uk-container">
           <ul id="id-tab-2" class="uk-tab" data-uk-tab="">
              <li class="uk-active" ><a class="jba-tab" href="#" data-param1="p2.1.1" data-param2="p1.2">Tab 2.2.1</a></li>
              <li>                   <a class="jba-tab" href="#" data-param1="p2.1.2" data-param2="p2.2">Tab 2.2.2</a></li>
              <li data-uk-dropdown="{mode:'click, hover', delay: 500}">
                  <a class="jba-tab" href="#">Tab 2.2.3&nbsp;<i class="uk-icon-caret-down"></i></a>
                  <div class="uk-dropdown uk-dropdown-small">
                    <ul class="uk-dropdown-close uk-nav uk-nav-dropdown">
					              <li><a class="jba-tab" href="#" data-param1="p2.2.3.1.1" data-param2="p1.2">Tab 2.2.3.2.1</a></li>
					              <li><a class="jba-tab" href="#" data-param1="p2.2.3.1.2" data-param2="p2.2">Tab 2.2.3.2.2</a></li>
                    </ul>
                  </div>
              </li>
           </ul>
         </div>
         
           
    </body>
  
</html>



<!DOCTYPE html>

<html>

  <head>
  
    <link rel="stylesheet" href="lib/uikit-2.23.0/css/uikit.min.css" />
    <link rel="stylesheet" href="lib/uikit-2.23.0/css/components/accordion.min.css" />
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >                         </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/uikit.js" >                     </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/accordion.js">       </script>
    
    <title>UIKit Accordion</title>
    
  </head>
  
  <body>

		  <script type="text/javascript">		
		    $(document).ready(function() {
  		    $('#id_acc').off();
				  $('#id_acc').on('toggle.uk.accordion', 
									             function(event, active, toggle, content) {
								                 event.preventDefault(); 
								                 console.log(content)
							                 });
		    });
      </script>
  
        <div class="uk-container uk-container-center">

                    <div id="id_acc" class="uk-accordion" data-uk-accordion>

                        <h3 class="uk-accordion-title">KTV Riehen</h3>
                        <div class="uk-accordion-content">
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <h3 class="uk-accordion-title">Heading 2</h3>
                        <div class="uk-accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>

                </div>
         </div>
    </body>
  
</html>

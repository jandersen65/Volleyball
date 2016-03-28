

<!DOCTYPE html>

<html>

  <head>
  
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/uikit.min.css" />
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/components/accordion.min.css" />
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >                         </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/uikit.js" >                     </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/components/accordion.js">       </script>
    
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

                        <div class="uk-accordion-title">KTV Riehen</div>
                        <div class="uk-accordion-content">
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="uk-accordion-title">Heading 2</div>
                        <div class="uk-accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>

                </div>
         </div>
         
         <div class="uk-accordion" data-uk-accordion="">
           <div class="uk-accordion-title">Junioren Damen U17 Finalrunde C
           </div>
           <div class="uk-accordion-content">uk-accordion-content
           </div>
           <div class="uk-accordion-title">Junioren Damen U17 Gruppe B
           </div>
           <div class="uk-accordion-content">uk-accordion-content
           </div>
         </div>
         
    </body>
  
</html>

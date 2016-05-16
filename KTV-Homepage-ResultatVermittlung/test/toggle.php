

<!DOCTYPE html>

<html>

  <head>
  
    
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >             </script>
    
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/uikit.min.css" />
    
    <script type="text/javascript" src="lib/uikit-2.25.0/js/uikit.js" >         </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/button.js">    </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/toggle.js">    </script>
    
    <title>UIKit Toggle</title>
    
    
    <style type="text/css">
      .my-class {
        font-weight: bold; 
      }
      
      .td-team {
        font-weight: bold;
        background-color: #F2F2F2;
      }
      
    </style>
    
  </head>
  
  <body>

		  <script type="text/javascript">		
		  	     
      </script>
      
      
  
<br/>
<br/>

   <div class="uk-container">
   
     <div class="uk-button-group">
       <button class="uk-button uk-button-primary uk-button-small" data-uk-toggle="{target:'#my-id-1', cls:'my-class'}">Toggle 1</button>
       <button class="uk-button uk-button-primary uk-button-small" data-uk-toggle="{target:'#my-id-2', cls:'my-class'}">Toggle 2</button>
     </div>

     <div id="my-id-1" class="my-class">Ich bin getogglet 1</div>
     <div id="my-id-2" class="my-class">Ich bin getogglet 2</div>
     
<br/>
<br/>
     
    
     <div class="uk-button-group">
       <button class="uk-button uk-button-primary uk-button-small" data-uk-toggle="{target:'.team-1', cls:'td-team'}">Team 1</button>
       <button class="uk-button uk-button-primary uk-button-small" data-uk-toggle="{target:'.team-2', cls:'td-team'}">Team 2</button>
       <button class="uk-button uk-button-primary uk-button-small" data-uk-toggle="{target:'.team-3', cls:'td-team'}">Team 3</button>
       <button class="uk-button uk-button-primary uk-button-small" data-uk-toggle="{target:'.team-4', cls:'td-team'}">Team 4</button>
     </div>

     <table class="">
       <tr><td class="team-1">team 1</td><td>-</td><td class="team-2">team 2</td></tr>
       <tr><td class="team-2">team 2</td><td>-</td><td class="team-3">team 3</td></tr>
       <tr><td class="team-3">team 3</td><td>-</td><td class="team-1">team 1</td></tr>
       <tr><td class="team-1">team 1</td><td>-</td><td class="team-4">team 4</td></tr>
       <tr><td class="team-3">team 3</td><td>-</td><td class="team-4">team 4</td></tr>
     </table>
     
   
   </div>
         
  </body>
  
</html>

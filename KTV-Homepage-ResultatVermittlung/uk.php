
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
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/switcher.min.js">              </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/utility.min.js">               </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/offcanvas.min.js">             </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/core/dropdown.min.js">              </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/accordion.min.js">          </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/sticky.min.js">          </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/datepicker.min.js">      </script>
    
    
    <title>UI Kit</title>
    
  </head>
  
  
  
  <body>
  
  
		  <script type="text/javascript">
		  
		    function hallo(txt) {
		    	document.getElementById("id_khr_einhalt").innerHTML=txt;
		    }

		    function hallo1(txt) {
		    	document.getElementById("id_khr_einhalt1").innerHTML=txt;
		    }

		    $(document).ready(function() {
			    
		      $('#id111').on('show.uk.switcher', function(event, area) {
		      });
		      
		    });
		    
		    
      </script>
      
			<ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#idSubMenu'}">
		        <li><a href="javascript:hallo('KTV Riehen');">KTV Riehen</a></li>
		        <li><a href="javascript:hallo('Regio');">Regio</a></li>
		        <li><a href="javascript:hallo('National');">National</a></li>
			</ul>
			
			<ul id="idSubMenu" class="uk-switcher">
			    <li>
			      <div>
			        <ul id='id111' class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#idMenu2'}">
				        <li>KTV Riehen&nbsp;<a href="javascript:hallo('Aktuel');">KTV Aktuel</a></li>
				        <li><a href="javascript:hallo('Mannschaften');">KTV Mannschaften</a></li>
				        <li><a href="javascript:hallo('Alle Spiele');">KTV Alle Spiele</a></li>
			        </ul>
			      </div>
			    </li>
			    <li>2
			    </li>
			    <li>3
			    </li>
			</ul>
			  
			  
			<ul id="idMenu2" class="uk-switcher">
        <li><a href="javascript:hallo('KTV - Aktuel 2');">Aktuel 2</a></li>
        <li><a href="javascript:hallo('KTV - Mannschaften 2');">Mannschaften 2</a></li>
        <li><a href="javascript:hallo('KTV - Alle Spiele 2');">Alle Spiele 2</a></li>
			</ul>
			
		  <div id="id_khr_einhalt" >
		  </div>
		  
		  <div id="id_khr_einhalt1" >
		  </div>
		  
  </body>
  
		  <?php
  
      /*
       * 
		  <script type="text/javascript">
		    function hallo(txt) {
		    	document.getElementById("id_khr_einhalt").innerHTML=txt;
		    }
      </script>
  
      <div class="uk-container">
		    <nav class="uk-navbar">
		      <ul class="uk-navbar-nav">
		        <li><a href="javascript:hallo('KTV Riehen');">KTV Riehen</a></li>
		        <li>                  <a href="javascript:hallo('Regio');">Regio</a></li>
		        <li>                  <a href="javascript:hallo('National');">National</a></li>
		      </ul>
		    </nav>
		    <div id="id_khr_einhalt" >
		    </div>
		  </div>
		  
       <div class="uk-container">
				<div class="uk-accordion" data-uk-accordion="">
		      
		       <div class="uk-accordion-title">KTV Riehen D1-D2</div>
			       <div class="uk-accordion-content">
			         <a href="javascript:getTeam('D1');">D1</a>
			         <a href="javascript:getTeam('D2');">D2</a>
			       </div>
			       
			       <div class="uk-accordion-title">KTV Riehen D3-D4</div>
			       <div class="uk-accordion-content">
			         <a href="javascript:getTeam('D3');">D3</a>
			         <a href="javascript:getTeam('D4');">D4</a>
			       </div>
			       
			       
			       <div class="uk-accordion-title">KTV Riehen Etc</div>
			       <div class="uk-accordion-content">
			         <a href="javascript:getTeam('U19A');">U19A</a>
			         <a href="javascript:getTeam('U19B');">U19B</a>
		         </div>
		      </div>
      </div>
      
      

		  <div id="id_khr_einhalt">
		  </div>
		  
		   * 
		  <div class="uk-container">
		    <nav class="uk-navbar">
		      <ul class="uk-navbar-nav">
		        <li><a href="javascript:getTeam('D1');">D1</a></li>
		        <li><a href="javascript:getTeam('D2');">D2</a></li>
		     </ul>
		    </nav>
		  </div>
		  
		   * 
		   <a href="javascript:getTeam('D1');">D1</a>
		    
		   <div class="uk-container">
		  <ul class="uk-tab" data-uk-tab>
		    <li class="uk-active"><a href="javascript:getTeam('D1');">D1</a></li>
		    <li>                  <a href="javascript:getTeam('D2');">D2</a></li>
		    <li>                  <a href="javascript:getTeam('D3');">D3</a></li>
		  </ul>
		  </div>
		  
		  
		   <div class="uk-container">
		  <nav class="uk-navbar">
		  <ul class="uk-navbar-nav">
		  <li class="uk-parent" data-uk-dropdown=""><a href="">KTV Riehen<i class="uk-icon-caret-down"></i></a>
		  <div class="uk-dropdown uk-dropdown-navbar">
		  <ul class="uk-nav uk-navbar-nav">
		  <li><a href="javascript:getTeam('D1');">D1</a></li>
		  <li><a href="javascript:getTeam('D2');">D2</a></li>
		  </ul>
		  </div>
		  </li>
		  <li class="uk-parent"><a href="">Regio</a></li>
		  <li class="uk-parent"><a href="">National</a></li>
		  </ul>
		  </nav>
		  </div>
		  <div id="id_khr_einhalt" class='c_khr_einhalt'>
		  </div>
		  
     <div class="c_khr_main_switcher">
				  
				<ul data-uk-switcher="{connect:'#my-id'}">
				    <li class="uk-active"><a class="uk-button uk-button-primary" href="#">sw1</a></li>
				    <li><a href="#">sw2</a></li>
				    <li><a href="#">sw3</a></li>
				</ul>
				
				<!-- This is the container of the content items -->
				<ul id="my-id" class="uk-switcher">
				    <li class="uk-active">hello sw1</li>
				    <li>hello sw2</li>
				    <li>hello sw3</li>
				</ul>
			
    </div>
  
    <button class="uk-button c-toggle"           data-uk-toggle="{target: '.c-toggle'}">Toggle 1</button>
    
    <button class="uk-button c-toggle uk-hidden" data-uk-toggle="{target: '.c-toggle'}">Toggle 2</button>

    <div data-uk-sticky="{top:-200, animation: 'uk-animation-slide-top'}">
	    <form class="uk-form">
	       <input value="12.09.2015"
	              data-uk-datepicker="{format:'DD.MM.YYYY',
	                                   minDate: '01.09.2015',
	                                   maxDate: '15.05.2016',
	                                   i18n: {months:['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 
	                                                  'Juli', 'August',  'September', 'Oktober', 'November', 'Dezember'],
	                                          weekdays:['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag']}} ">
	    </form>
    </div>
  
  */
		  ?>
  
  

</html>
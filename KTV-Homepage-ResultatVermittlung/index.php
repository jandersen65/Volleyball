
<!DOCTYPE html>

<html>

  <head>
  
    <link rel="stylesheet" href="css/khr.css" />
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/uikit.min.css" />
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/components/datepicker.min.css" />    
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/components/sticky.min.css" />    
    <link rel="stylesheet" href="lib/uikit-2.25.0/css/components/accordion.min.css" />
    
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >                             </script>
    
    <script type="text/javascript" src="lib/uikit-2.25.0/js/uikit.min.js">                      </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/nav.min.js">                   </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/tab.min.js">                   </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/button.min.js">               </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/switcher.min.js">              </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/utility.min.js">               </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/offcanvas.min.js">             </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/core/dropdown.min.js">              </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/components/accordion.min.js">          </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/components/sticky.min.js">          </script>
    <script type="text/javascript" src="lib/uikit-2.25.0/js/components/datepicker.min.js">      </script>
    
    <script type="text/javascript" src="javascript/ktv_init.js">                                </script>
    <!--  script type="text/javascript" src="javascript/ktv.js">                                     </script -->
    <!--  script type="text/javascript" src="javascript/resultat.js">                                </script -->
    
    <title>Resultatbrowser</title>
    
  </head>
  
  
  
  <body>
      
  <div id="idMainResultate">
      
        <div class="uk-container">
           <ul id="idMainMenu" class="uk-tab" data-uk-tab="">
              <li data-uk-dropdown="{mode:'click'}">
                <a class="khr_link" href="#" data-id="id-khr-ktv-menu" data-action="9000">KTV Riehen      </a>
                  <div id="id-khr-ktv-menu" class="uk-dropdown uk-dropdown-small">
                    <ul class="uk-dropdown-close uk-nav uk-nav-dropdown">
                    </ul>  
                  </div>       
              </li>
              <li data-uk-dropdown="{mode:'click'}">
                <a class="khr_link" href="#" data-id="id-khr-regio-menu" data-action="9010">Regional      </a>
                  <div id="id-khr-regio-menu" class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-dropdown-close uk-nav uk-nav-dropdown">
                    </ul>  
                  </div>       
              </li>
              <li data-uk-dropdown="{mode:'click'}">
                <a class="khr_link" href="#" data-id="id-khr-natio-menu" data-action="9020">National      </a>
                  <div id="id-khr-natio-menu" class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-dropdown-close uk-nav uk-nav-dropdown">
                    </ul>  
                  </div>       
              </li>
           </ul>
         </div>
			          
         <div class="uk-container">
			     <table>
            <tr>
              <td>
			          <div id="id_khr_einhalt" ></div>
			          
			        </td>
			      </tr>
	        </table>
				</div>
	
  </div>	  
  </body>
  
</html>

<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml" lang="de">

  <head>
    <meta   charset="UTF-8">
    <link   rel="stylesheet"       href="css/khr.css" />
    <link   rel="stylesheet"       href="lib/uikit-2.23.0/css/uikit.min.css" />
    <link   rel="stylesheet"       href="lib/uikit-2.23.0/css/components/accordion.min.css" />
    <script type="text/javascript" src="javascript/ktv.js">                                    </script>
    <script type="text/javascript" src="javascript/resultat.js">                               </script>
    <script type="text/javascript" src="lib/jquery-1.11.1.min.js" >                            </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/uikit.min.js">                     </script>
    <script type="text/javascript" src="lib/uikit-2.23.0/js/components/accordion.js">          </script>
    
    <title>Resultate - KTV Riehen</title>
  </head>

  <body class="uk-container">
     
         <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#id-subnav'}">
             <li><a href="#">Aktive</a></li>
             <li><a href="#">Juniorinnen</a></li>
             <li><a href="#">Gemischt</a></li>
         </ul>
         <ul id="id-subnav" class="uk-switcher uk-margin">
            <li>
              <nav class="uk-navbar">
                  <ul class="uk-navbar-nav">
			              <li><a href="javascript:getTeam('D1', 'id_khr_einhalt_akt');"  >Damen 1   </a></li>
			              <li><a href="javascript:getTeam('H1', 'id_khr_einhalt_akt');"  >Herren 1  </a></li>
			              <li><a href="javascript:getTeam('D2', 'id_khr_einhalt_akt');"  >Damen 2   </a></li>
			              <li><a href="javascript:getTeam('D3', 'id_khr_einhalt_akt');"  >Damen 3   </a></li>
			              <li><a href="javascript:getTeam('D4', 'id_khr_einhalt_akt');"  >Damen 4   </a></li>
			            </ul>
			        </nav>
				      <table>
					      <tr>   
					       <td><div id="id_khr_einhalt_akt" ></div></td>
					      </tr>
				      </table>
			      </li> 
			      <li>
              <nav class="uk-navbar">
                  <ul class="uk-navbar-nav">
				             <li><a href="javascript:getTeam('U19A', 'id_khr_einhalt_jun');" >U19A    </a></li>
				             <li><a href="javascript:getTeam('U19B', 'id_khr_einhalt_jun');" >U19B    </a></li>
				             <li><a href="javascript:getTeam('U17A', 'id_khr_einhalt_jun');" >U17A    </a></li>
				             <li><a href="javascript:getTeam('U17B', 'id_khr_einhalt_jun');" >U17B    </a></li>
				             <li><a href="javascript:getTeam('U15',  'id_khr_einhalt_jun');" >U15     </a></li>
			            </ul>
			        </nav>
				      <table>
					      <tr>   
					       <td><div id="id_khr_einhalt_jun" ></div></td>
					      </tr>
				      </table>
			      </li>
			      <li>
              <nav class="uk-navbar">
                  <ul class="uk-navbar-nav">
                     <li><a href="javascript:getAktuelleSpiele('id_khr_einhalt_gem');"  >Aktuelle Spiele       </a></li>
	                   <li><a href="javascript:getRegioSpiele(0, 'id_khr_einhalt_gem');"  >Regionale Spiele Heute</a></li>
	                   <li><a href="javascript:getNatSpiele(0, 'id_khr_einhalt_gem');"    >Nationale Spiele Heute</a></li>
                     <li><a href="javascript:getAlleSpiele('id_khr_einhalt_gem');"      >Alle KTV-Spiele       </a></li>
                     <li><a href="javascript:getVereine('id_khr_einhalt_gem');"         >Vereine       </a></li>
			            </ul>
			        </nav>
				      <table>
					      <tr>   
					       <td><div id="id_khr_einhalt_gem" ></div></td>
					      </tr>
				      </table>
			      </li>
        </ul>
        
        
  </body>

</html>

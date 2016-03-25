<?php

class Viewer  {

	public function printSpiele($spieleHTML) {
		$html   =  "";
		$html  .=  $spieleHTML;
		return $html;
	}
	
	public function printGruppeSpieleRangliste($naechsteGruppeSpieleHTML, $rangListeHTML) {
		$html   =  "";
		$html  .=  $naechsteGruppeSpieleHTML;
		$html  .=  "<br><br>";
		$html  .=  $rangListeHTML;
		return $html;
	} // printGruppeSpieleRangliste

	
	public function printTeamSpiele($teamSpieleHTML) {
		$html   =  "";
		$html  .=  $teamSpieleHTML;
		return $html;
	} // printTeamSpiele
	
	
	public function setupTeamPage($menuHTML, $rangListeHTML, $naechsteGruppeSpieleHTML)  {
				
		$html   =  "";
		$html  .=  "<div id='id_khr_teampage' class='c_khr_teampage'>";
		
		$html  .=    "<div id='id_khr_teampage_menu'  class='c_khr_teampage_menu'>";
		$html  .=       $menuHTML;
		$html  .=    "</div>";
		
		$html  .=    "<div id='id_khr_teampage_data'  class='c_khr_teampage_data'>";
		$html  .=      $this->printGruppeSpieleRangliste($naechsteGruppeSpieleHTML, $rangListeHTML);
		$html  .=    "</div>";

		$html  .=  "</div>";
		
		return $html;
	} // setupTeamPage
	
	
	public function formatMenuTR($teamName, $team, $teamNo, $gruppeName, $gruppeNo, $gruppen)  {

		$id  = "id_menu_$team";
		$lnk =  "javascript:getTeamSpiele(\"$id\", \"$team\");"  ;

		$html .= "";
		$html .= "$teamName";
		$html .= "&nbsp;&nbsp;&nbsp;<br><br>";
		$html .= "<input type='radio' name='menu_item' id='$id' value='$team' onClick='$lnk'/>";
		$html .= "<label for='$team' onClick='$lnk'>Alle Spiele</label>";
		
		foreach($gruppen as $grp) {
			
			$grpNo   = $grp["gruppeNo"];
			$grpName = $grp["gruppeName"];
			
			$checked = ($grpNo == $gruppeNo) ? "checked" : "";
			
			$id      = "id_menu_$team_$grpNo";
			$lnk     = "javascript:getGruppeSpiele(\"$id\", \"$grpNo\", \"$team\");"  ;
			
		  $html   .= "<input type='radio' name='menu_item' id='$id' value='$grpNo' $checked onClick='$lnk'/>";
		  $html   .= "<label for='$grpNo' onClick='$lnk'>$grpName</label>";
		}
		
	  return $html;
	} // formatMenuTR

	
	public function formatSpiele($spielListe, $withOffset = false, $offset=0, $regio = false) {

		$html  = "";
		
		if ($withOffset) {
			setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
			$vorTag       = strftime ("am %A, dem %d. %B", time() + (($offset - 1)*24*60*60));
			$naechsterTag = strftime ("am %A, dem %d. %B", time() + (($offset + 1)*24*60*60));
			if ($regio) {
			  $html .= "<a href='javascript:getRegioSpiele(" . ($offset + 1) . ");'>Regionale Spiele $naechsterTag</a>";
			  $html .= "<br>";
			  $html .= "<a href='javascript:getRegioSpiele(" . ($offset - 1) . ");'>Regionale Spiele $vorTag</a>";
			}
			else {
		  	$html .= "<br>";
			  $html .= "<a href='javascript:getNatSpiele("   . ($offset + 1) . ");'>Nationale Spiele $naechsterTag</a>";
		  	$html .= "<br>";
		  	$html .= "<a href='javascript:getNatSpiele("   . ($offset - 1) . ");'>Nationale Spiele $vorTag</a>" ;
			}
		}
		
		if (count($spielListe->getSpiele()) == 0) {
			return $html;
		}
		
		$spielListe->sortier("spielListeDatumSort");

		
		$html .= "<table class='c_spiele'>";
		 
		$html .= "<thead><tr>";
		$html .=    "<th align='left' colspan='1'>" . "Datum"          . "</th>";
		$html .=    "<th align='left' colspan='1'>" . "Gruppe"         . "</th>";
		$html .=    "<th align='left' colspan='2'>" . "Heim"           . "</th>";
		$html .=    "<th align='left' colspan='1'>" . "Gast"           . "</th>";
		$html .=    "<th align='left' colspan='1'>" . "Resultat/Halle" . "</th>";
		$html .=  "</tr></thead>";
		 
		$html .=   "<tbody>";

		foreach ($spielListe->getSpiele() as $spiel) {
			$html .= "<tr>";
			$html .=   "<td>" . $spiel->getSpielDatum()   . "</td>";
			$html .=   "<td>" . $spiel->getGruppenName()  . "</td>";
			$html .=   "<td>" . $spiel->getHeimTeamName() . "</td>" . "<td>-</td>" . "<td>" . $spiel->getAuswTeamName() . "</td>";
			if ($spiel->isGespielt()) {
				$html .= "<td>" . $spiel->getResultat() . "</td>";
			}
			else {
				$html .= "<td>" . $spiel->getHalle() . "</td>";
			}
			$html .= "</tr>";
		}  // foreach spiel
		
		$html .= "</tbody></table>";
		
  	return $html;
	} // formatAktuelleSpiele
	
	
  public function formatTeamSpiele($team, $teamNo, $spielListe) {

  	if (count($spielListe->getSpiele()) == 0) {
  		return;
  	}

  	$html  = "";
  	$html .= "<table class='c_spiele'>";
  	
  	$html .=   "<thead><tr>";
  	$html .=      "<th align='left' colspan='1'>" . "Datum"          . "</th>";
  	$html .=      "<th align='left' colspan='1'>" . "Gruppe"         . "</th>";
  	$html .=      "<th align='left' colspan='2'>" . "Heim"           . "</th>";
  	$html .=      "<th align='left' colspan='1'>" . "Gast"           . "</th>";
  	$html .=      "<th align='left' colspan='1'>" . "Resultat/Halle" . "</th>";
  	$html .=    "</tr></thead>";
  	
  	//foreach($gruppeSpielListe as $groupSpiele) {
  		
  	  $tmpList = $spielListe->getSpiele();
    	uasort($tmpList, "spielListeDatumSort");
	       
	    //foreach ($groupSpiele as $spiel) {
	    foreach ($tmpList as $spiel) {
	    	$html .= "<tr>";
	    	$html .=   "<td>" . $spiel->getSpielDatum()   . "</td>";
	    	$html .=   "<td>" . $spiel->getGruppenName()  . "</td>";
	    	$html .=   "<td>" . $spiel->getHeimTeamName() . "</td>" . "<td>-</td>" . "<td>" . $spiel->getAuswTeamName() . "</td>";
	    	if ($spiel->isGespielt()) {
	    		$html .= "<td>" . $spiel->getResultat() . "</td>";
	    	}
	    	else {
	    		$html .= "<td>" . $spiel->getHalle() . "</td>";
	    	}
	    	$html .= "</tr>";
	    }  // foreach spiel
	    
  //	} // foreach gruppeSpielListe

    $html .= "</table>";
  	//echo "</div>";
    
    return $html;
    
  } // formatTeamSpiele
  
  

  public function formatGruppeSpiele($spielListe) {

  	if (count($spielListe->getSpiele()) == 0) {
  		return;
  	}
  	
  	$spielListe->sortier("spielListeDatumSort");

  	$html  = "";
  	
  	$html .=  "<table class='c_spiele'>";
  
  	$html .=  "<thead><tr>";
  	$html .=     "<th align='left' colspan='1'>" . "Datum"          . "</th>";
  	$html .=     "<th align='left' colspan='2'>" . "Heim"           . "</th>";
  	$html .=     "<th align='left' colspan='1'>" . "Gast"           . "</th>";
  	$html .=     "<th align='left' colspan='1'>" . "Resultat/Halle" . "</th>";
  	$html .=   "</tr></thead>";
  
  	$html .=    "<tbody>";
  	foreach ($spielListe->getSpiele() as $spiel) {
  		$html .=  "<tr>";
  		$html .=    "<td>" . $spiel->getSpielDatum()   . "</td>";
  		$html .=    "<td>" . $spiel->getHeimTeamName() . "</td>" . "<td>-</td>" . "<td>" . $spiel->getAuswTeamName() . "</td>";
  		if ($spiel->isGespielt()) {
  			$html .=  "<td>" . $spiel->getResultat() . "</td>";
  		}
  		else {
  			$html .=  "<td>" . $spiel->getHalle() . "</td>";
  		}
  		$html .=  "</tr>";
  	}  // foreach spiel
  
  	$html .=  "</tbody></table>";
  	
  	return $html;
  } // formatGruppeSpiele
  
  
  public function formatRangListe($rangListe) {

  	$html  = "";
  	
  	$html .=  "<table class='c_rangliste'>";
  	foreach ($rangListe->getRangListe() as $rang) {
  		$html  .= "<tr>";
      $html  .= "<td align='right'>" . $rang->getRang()  . "."                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='left'>"  . $rang->getTeamName()                       . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>"  . $rang->getAnzahlSpiele()                  . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . $rang->getGewinnSaetze()                   . "</td>"
		         . "<td align='right'>" . "-"                                        . "</td>"
		         . "<td align='right'>" . $rang->getVerlustSaetze()                  . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . $rang->getGewinnBaelle()                   . "</td>"
		         . "<td align='right'>" . "-"                                        . "</td>"
		         . "<td align='right'>" . $rang->getVerlustBaelle()                  . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . "&nbsp;"                                   . "</td>"
		         . "<td align='right'>" . $rang->getPunkte()                         . "</td>";
      $html .=  "</tr>";
    } //foreach
  	$html .= "</table>";

  	return $html;
  } // formatRangListe
  
  
  
}
?>
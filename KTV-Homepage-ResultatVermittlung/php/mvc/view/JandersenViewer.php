<?php

class JandersenViewer  {

	public function teamNichtKonf($teamName) {
		$html   =  "";
		$html  .=  "Zur Zeit hat " . $teamName . " keine geplanten Spiele";
		return $html;
	}
	
	public function printSpiele($spieleHTML) {
		$html   =  "";
		$html  .=  $spieleHTML;
		return $html;
	}

	public function printVereine($vereinListe) {
		$lnk    = "";
		$html   =  "<div id='id_verein'>";
		foreach ($vereinListe->getVereine() as $verein) {
			$params   = " data-id=id_khr_einhalt"
					      . " data-action=7002" 
					      . " data-regionalVereinNo=" . (is_null($verein->getRegionalVereinNo()) ? -1 : $verein->getRegionalVereinNo())
	              . " data-nationalVereinNo=" . (is_null($verein->getNationalVereinNo()) ? -1 : $verein->getNationalVereinNo());
			$vereinName = utf8_encode($verein->getVereinName());
			$html .= "<a class='jba_link' href='#'" .  $params . ">" . $vereinName . "</a></br>";
		}
		$html .= "</div>";
		return $html;
	}
	
	public function printTeams(TeamListe $nationaleTeams, TeamListe $regionaleTeams) {
		
		$teamListe = new TeamListe();
		foreach ($nationaleTeams->getTeams() as $team) {
			$teamListe->addTeam($team);
		}
		foreach ($regionaleTeams->getTeams() as $team) {
			$teamListe->addTeam($team);
		}
		$teamListe->sortByName();
		$teamListeArr = $teamListe->getTeams();
		$tmp = $teamListeArr[0];
		//$html =  "<br/><br/>" . utf8_encode($tmp->getVerein()->getVereinName()) . "<br/>";
		$html .= "<div class='uk-flex'>";

		
		$first = true;
		foreach ($teamListe->getTeams() as $team) {
			
		//if ($first) {
		//	$first = false;
	  // 	$params = " data-id=id_gen_team"
		//		        . " data-action=2001"
		//		        . " data-regionalVereinNo=" . (is_null($team->getRegionalVereinNo()) ? -1 : $team->getRegionalVereinNo())
		//		        . " data-nationalVereinNo=" . (is_null($team->getNationalVereinNo()) ? -1 : $team->getNationalVereinNo());
		//    $html .= "<a class='jba_link uk-button' href='#'" .  $params . ">Aktuelle Spiele</a></br>";
		//	}
			
			$params = ' data-id=id_gen_team'
					    . ' data-action=7020' 
					    . ' data-verband=' . $team->getVerband()
				      . ' data-teamno='  . $team->getTeamNo();
			$teamName = utf8_encode($team->getTeamNameKurz());">$teamName" . "</a></br>";

			$html .= "<a class='jba_link uk-button' href='#'" .  $params . ">" . $teamName . "</a></br>";
		}
		$html .= "</div>";
		$html .= "<div id='id_gen_team'></div>";
		return $html;
	}
		
	public function printGruppeSpieleRangliste($naechsteGruppeSpieleHTML, $rangListeHTML) {
		$html   =  "";
		$html  .=  $naechsteGruppeSpieleHTML;
		$html  .=  "<br/><br/>";
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
		$html  .=  "<div id='id_khr_teampage'>";
		
		$html  .=    "<div id='id_khr_teampage_menu'>";
		$html  .=       $menuHTML;
		$html  .=    "</div>";
		
		$html  .=    "<div id='id_khr_teampage_data'>";
		$html  .=      $this->printGruppeSpieleRangliste($naechsteGruppeSpieleHTML, $rangListeHTML);
		$html  .=    "</div>";

		$html  .=  "</div>";
		
		return $html;
	} // setupTeamPage
	
	
	public function formatMenuTR($teamName, $team, $teamNo, $gruppeName, $gruppeNo, $gruppen)  {

		$params = ' data-id=id_khr_teampage_data'
				    . ' data-action=4000'
				    . ' data-team=' . $team;

		$html  = "";
		$html .= "$teamName";
		$html .= "&nbsp;&nbsp;&nbsp;<br><br>";

		$html .= "<ul class='uk-tab'>";

		$html .= "<li>" . "<a class='jba_link' href='#' $params>Alle Spiele" . "</a></li>";

		
		foreach($gruppen as $grp) {
			
			$grpNo   = $grp["gruppeNo"];
			$grpName = $grp["gruppeName"];

			$params = ' data-id=id_khr_teampage_data'
					    . ' data-action=5000'
					    . ' data-team=' . $team
					    . ' data-gruppeno=' . $grpNo;
			
			$html   .= "<li>" . "<a class='jba_link' href='#' $params>$grpName" . "</a></li>";
		}

		$html .= "</ul>";
	  return $html;
	} // formatMenuTR

	
	public function formatSpiele($spielListe, $withGruppe = false, $withOffset = false, $offset=0, $regio = false) {

		$html  = "";
		
		if ($withOffset) {
			setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
			$vorTag       = utf8_encode(strftime ("am %A, dem %d. %B", time() + (($offset - 1)*24*60*60)));
			$naechsterTag = utf8_encode(strftime ("am %A, dem %d. %B", time() + (($offset + 1)*24*60*60)));
			if ($regio) {
				$params = ' data-id=id_khr_einhalt' . ' data-action=6000' . ' data-offset=' . ($offset + 1);
				$html .= "<a class='jba_link' href='#'" . $params . ">Regionale Spiele $naechsterTag</a>";
			  $html .= "<br/>";
				$params = ' data-id=id_khr_einhalt' . ' data-action=6000' . ' data-offset=' . ($offset - 1);
				$html .= "<a class='jba_link' href='#'" . $params . ">Regionale Spiele $vorTag</a>";
			}
			else {
				$params = ' data-id=id_khr_einhalt' . ' data-action=6010' . ' data-offset=' . ($offset + 1);
				$html .= "<a class='jba_link' href='#'" . $params . ">Nationale Spiele $naechsterTag</a>";
			  $html .= "<br/>";
				$params = ' data-id=id_khr_einhalt' . ' data-action=6010' . ' data-offset=' . ($offset - 1);
				$html .= "<a class='jba_link' href='#'" . $params . ">Nationale Spiele $vorTag</a>";
			}
		}
		
		if (count($spielListe->getSpiele()) == 0) {
			return $html;
		}
		
		$spielListe->sortier("spielListeDatumSort");

    	
		$html .= "<table class='khr-visible-small uk-table uk-table-striped uk-table-condensed'>";
			
		$html .= "<thead><tr>";
		$html .=    "<th align='left'>" . "Datum/Gruppe"   . "</th>";
		$html .=    "<th align='left'>" . "Heim/Gast"      . "</th>";
		$html .=    "<th align='left'>" . "Resultat/Halle" . "</th>";
		$html .=  "</tr></thead>";
			
		$html .=   "<tbody>";
		
		foreach ($spielListe->getSpiele() as $spiel) {


			$gruppeLink = "<a "
					        .   "class="         . "jba_link"             . " "
							    .   "href="          . "#"                    . " "
									.   "data-id="       . "id_khr_einhalt"       . " "
									.   "data-action="   . "5010"                 . " " // nächste gruppespiele
									.   "data-gruppeno=" . $spiel->getGruppenNo() . " "
									.   "data-verband="  . $spiel->getVerband()
									. "><i class='uk-icon-share'></i>"
									. "</a>"                                 . "&nbsp;"
									. $spiel->getGruppenName();
				
			$heimTeamLink = "<a "
					          .   "class="         . "jba_link"             . " "
							      .   "href="          . "#"                    . " "
									  .   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
										.   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getHeimTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										.  $spiel->getHeimTeamName();
				
			$auswTeamLink = "<a "
					          .   "class="         . "jba_link"             . " "
							      .   "href="          . "#"                    . " "
									  .   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
										.   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getAuswTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										. $spiel->getAuswTeamName();
				
			
			$html .= "<tr>";
			$html .=   "<td>". $gruppeLink   . "<br/>" . $spiel->getSpielDatum() . "</td>";
			$html .=   "<td>". $heimTeamLink ."<br/>"  . $auswTeamLink           . "</td>";;
			if ($spiel->isGespielt()) {
				$html .= "<td>";
				$html .=   $spiel->getHeimTeamSaetze() . "&nbsp;&nbsp;" . $spiel->getHeimSaetzePunkte() . "<br/>"; 
				$html .=   $spiel->getAuswTeamSaetze() . "&nbsp;&nbsp;" . $spiel->getAuswSaetzePunkte(); 
				$html .= "</td>";
			}
			else {
				
				$googleMapsRef = "http://maps.google.com?q="
				        		  . htmlentities($spiel->getHalleAdresse(), ENT_QUOTES);
				
				$halleLink = "<a "
						.   "href='"          . $googleMapsRef                   . "'"
						.   " target='_blank'"
						. "><i class='uk-icon-globe'></i>"
						. "</a>"                                 . "&nbsp;"
						. $spiel->getHalle();
				//$spiel->getHalleAdresse()
				$html .= "<td>" . $halleLink . "</td>";
				
				
				//$html .= "<td>" . $spiel->getHalle() . "<br/>";
				//$html .=          $spiel->getHalleAdresse(); 
				//$html .= "</td>";
				
			}
			$html .= "</tr>";
		}  // foreach spiel
		
		$html .= "</tbody></table>";
		
		
		$html .= "<table class='khr-visible-large uk-table uk-table-striped uk-table-condensed'>";
			
		$html .= "<thead><tr>";
		$html .=    "<th align='left' colspan='1'>" . "Datum"          . "</th>";
		$html .=    "<th align='left' colspan='1'>" . "Gruppe"         . "</th>";
		$html .=    "<th align='left' colspan='2'>" . "Heim"           . "</th>";
		$html .=    "<th align='left' colspan='1'>" . "Gast"           . "</th>";
		$html .=    "<th align='left' colspan='1'>" . "Resultat/Halle" . "</th>";
		$html .=  "</tr></thead>";
			
		$html .=   "<tbody>";
		
		foreach ($spielListe->getSpiele() as $spiel) {
			
			$gruppeLink = "<a "
									.   "class="         . "jba_link"             . " "
									.   "href="          . "#"                    . " "
									.   "data-id="       . "id_khr_einhalt"       . " "
									.   "data-action="   . "5010"                 . " " // nächste gruppespiele
									.   "data-gruppeno=" . $spiel->getGruppenNo() . " "
									.   "data-verband="  . $spiel->getVerband()
									. "><i class='uk-icon-share'></i>"
									. "</a>"                                 . "&nbsp;"
									. $spiel->getGruppenName();
			
			$heimTeamLink = "<a "
										.   "class="         . "jba_link"             . " "
										.   "href="          . "#"                    . " "
										.   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
									  .   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getHeimTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										.  $spiel->getHeimTeamName();
			
			$auswTeamLink = "<a "
				           	.   "class="         . "jba_link"             . " "
							      .   "href="          . "#"                    . " "
									  .   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
									  .   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getAuswTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										. $spiel->getAuswTeamName();
			
			$html .= "<tr>";
			$html .=   "<td>" . $spiel->getSpielDatum()   . "</td>";
			//html .=   "<td>" . $spiel->getGruppenName()  . "</td>";
			$html .=   "<td>" . $gruppeLink  . "</td>";
			//$html .=   "<td>" . $spiel->getHeimTeamName() . "</td>" . "<td>-</td>" . "<td>" . $spiel->getAuswTeamName() . "</td>";
			$html .=   "<td>" . $heimTeamLink . "</td>" . "<td>-</td>" . "<td>" . $auswTeamLink . "</td>";
			if ($spiel->isGespielt()) {
				$html .= "<td>" . $spiel->getResultat() . "</td>";
			}
			else {
				
				$googleMapsRef = "http://maps.google.com?q=" 
						           . htmlentities($spiel->getHalleAdresse(), ENT_QUOTES);
				
				$halleLink = "<a "
						       .   "href='"          . $googleMapsRef                   . "'" 
						       .   " target='_blank'"
						       . "><i class='uk-icon-globe'></i>"
						       . "</a>"                                 . "&nbsp;"
						       . $spiel->getHalle();
				//$spiel->getHalleAdresse()
				$html .= "<td>" . $halleLink . "</td>";
			}
			$html .= "</tr>";
		}  // foreach spiel
		
		$html .= "</tbody></table>";
		
  	return $html;
	} // formatSpiele
	
	
  public function formatTeamSpiele($team, $teamNo, $spielListe) {    
    return $this->formatSpiele($spielListe, true);
  } // formatTeamSpiele
  
  

  public function formatGruppeSpiele($spielListe) {
    return $this->formatSpiele($spielListe);
  } // formatGruppeSpiele
  
  
  public function formatRangListe($rangListe) {

  	$html  = "";
  	
  	$html .=  "<table class='uk-table uk-table-striped uk-table-condensed'>";
  	foreach ($rangListe->getRangListe() as $rang) {
  		
  		$lnk = "<a "
  		     .   "class="        . "jba_link"         . " "
  		     .   "href="         . "#"                . " "
  		     .   "data-id="      . "id_khr_einhalt"   . " "
  				 .   "data-action="  . "7020"             . " "
  				 .   "data-teamno="  . $rang->getTeamNo() . " "
  				 .   "data-verband=" . $rang->getVerband()
  				 . "><i class='uk-icon-share'></i>" 
  				 . "</a>"                                 . "&nbsp;"
  		     . $rang->getTeamName();
  		
  		$html  .= "<tr>";
      $html  .= "<td align='right'>" . $rang->getRang()  . "."                    . "</td>"
		         . "<td align='left'>"   . $lnk                                       . "</td>"
		         //. "<td align='left'>"   . $rang->getTeamName()                       . "</td>"
		         . "<td align='right'>"  . $rang->getAnzahlSpiele()                   . "</td>"
		         . "<td align='right'>"  . $rang->getGewinnSaetze()                   . "</td>"
		         . "<td align='right'>"  . "-"                                        . "</td>"
		         . "<td align='right'>"  . $rang->getVerlustSaetze()                  . "</td>"
		         . "<td align='right'>"  . $rang->getGewinnBaelle()                   . "</td>"
		         . "<td align='right'>"  . "-"                                        . "</td>"
		         . "<td align='right'>"  . $rang->getVerlustBaelle()                  . "</td>"
		         . "<td align='right'>"  . $rang->getPunkte()                         . "</td>";
      $html .=  "</tr>";
    } //foreach
  	$html .= "</table>";

  	return $html;
  } // formatRangListe
  
  public function printTeam($team) {
  	
  	$html = "<br/><br/>";
  	$html .= utf8_encode($team->getTeamName()) . " " . $team->getTeamNameKurz() . "<br/>";
  	$team->getGruppen()->sort();
  	foreach ($team->getGruppen()->getGruppen() as $gruppe) {
  		$html .= ($gruppe->isCup() ? $gruppe->getLigaName() . " " : "") . $gruppe->getGruppeName();
  		//$gruppe->dump();
  		$html .=   $this->formatSpiele($gruppe->getSpielListe());
  		$html .=   $this->formatRangListe($gruppe->getRangListe());
  	}
  	return $html;
  }
  
  
}

?>
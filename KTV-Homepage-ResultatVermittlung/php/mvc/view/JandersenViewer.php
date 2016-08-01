<?php

class JandersenViewer  {

	
	public function getRegionalVereinNo($nationalVereinNo) {
		if ($nationalVereinNo == -1) {
			return -1;
		}
		$conf = new KHR_Conf();
		$vereine = $conf->getVolleyBaselVereine();
		$verein = $vereine->getVerein("", $nationalVereinNo);
		return is_null($verein) ? "-1" : $verein->getRegionalVereinNo();
	}
	
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
		foreach ($vereinListe->getVereine() as $verein) {
			$params   = " data-id=id_khr_einhalt"
					      . " data-action=7002" 
					      . " data-regionalVereinNo=" . (is_null($verein->getRegionalVereinNo()) ? -1 : $verein->getRegionalVereinNo())
	              . " data-nationalVereinNo=" . (is_null($verein->getNationalVereinNo()) ? -1 : $verein->getNationalVereinNo());
			$vereinName = utf8_encode($verein->getVereinName());
			$html .= "<a class='jba-link' href='#'" .  $params . ">" . $vereinName . "</a></br>";
		}
		return $html;
		
	}
	
	private function printTeamsInMenu($nationaleTeams, $regionaleTeams) {
		
		$teamListe = new TeamListe();
		foreach ($nationaleTeams->getTeams() as $team) {
			$teamListe->addTeam($team);
		}
		foreach ($regionaleTeams->getTeams() as $team) {
			$teamListe->addTeam($team);
		}
		$teamListe->sortByName();

		$html  = ""; //'<li class="uk-nav-header">Mannschaften</li>';
		
		foreach ($teamListe->getTeams() as $team) {
			$params = ' data-id=id_khr_einhalt'
					    . ' data-action=7020'
							. ' data-verband=' . $team->getVerband()
							. ' data-teamno='  . $team->getTeamNo();
			$teamName = utf8_encode($team->getTeamNameKurz());">$teamName" . "</a></br>";
		
			$html .= "<li><a class='jba-link uk-dropdown-close' href='#'" .  $params . ">" . $teamName . "</a></li>";
		}
		
		return $html;
	}
	
	public function printVereinMainMenu($nationaleTeams, $regionaleTeams) {
    $html  = '';
	  $html .= '<li><a class= "uk-dropdown-close jba-link" href="#"  data-id="id_khr_einhalt" data-action="2000">Aktuelle Spiele   </a></li>';
	
	  $html .=  '<li class="uk-nav-divider"></li>';
	  $html .=  $this->printTeamsInMenu($nationaleTeams, $regionaleTeams);
	
	  $html .=  '<li class="uk-nav-divider"></li>';
	  $html .=  '<li><a class= "uk-dropdown-close jba-link" href="#"  data-id="id_khr_einhalt" data-action="2010">Alle KTV-Spiele   </a></li>';
	  
	  return $html;
	}


	private function printVereineInMenu($action, $vereinListe) {
		$lnk    = "";
		foreach ($vereinListe->getVereine() as $verein) {
			$params = " data-id=id_khr_einhalt"
					. " data-action=" . $action
					. " data-regionalVereinNo=" . (is_null($verein->getRegionalVereinNo()) ? -1 : $verein->getRegionalVereinNo())
					. " data-nationalVereinNo=" . (is_null($verein->getNationalVereinNo()) ? -1 : $verein->getNationalVereinNo());
			$vereinName = utf8_encode($verein->getVereinName());
			$html .=    "<li><a class='jba-link uk-dropdown-close' href='#'" .  $params . ">" . $vereinName . "</a></li>";
		}
		return $html;
	}
	
	public function printRegionalMainMenu($vereinListe) {
		
		$html  = '';
		
		$html .= ' <li><a class= "uk-dropdown-close jba-link" href="#" '
				   . '        data-id="id_khr_einhalt" '
				   . '        data-action="6000" '
					 . '        data-offset="0">Heute</a></li>';
		
		$html .=  '<li class="uk-nav-divider"></li>';
		$html .=  $this->printVereineInMenu('7002', $vereinListe);
		
	  return $html;
	}
	public function printNationalMainMenu($vereinListe) {
	
		$html  = '';
	
		$html .= ' <li><a class= "uk-dropdown-close jba-link" href="#" '
				  . '        data-id="id_khr_einhalt" '
					. '        data-action="6010" '
					. '        data-offset="0">Heute</a></li>';
	
		$html .=  '<li class="uk-nav-divider"></li>';
		$html .=  $this->printVereineInMenu('7002', $vereinListe);
	
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
		$tmp   = $teamListeArr[0];
		
		if (!is_null($tmp)) {
			$html  =  "<br/><br/>" . utf8_encode($tmp->getVerein()->getVereinName()) . "<br/>";
			$html .= "<div class='uk-flex'>";
						
			$first = true;
			foreach ($teamListe->getTeams() as $team) {
				
			  if ($first) {
				  $first = false;
				  $nationalVereinNo = is_null($team->getNationalVereinNo()) ? -1 : $team->getNationalVereinNo();
				  $regionalVereinNo = is_null($team->getRegionalVereinNo()) ? $this->getRegionalVereinNo($nationalVereinNo) 
				                                                            : $team->getRegionalVereinNo();
		   	  $params = " data-id=id_gen_team"
					        . " data-action=2001"
					        . " data-regionalVereinNo='" . $regionalVereinNo . "'"
					        . " data-nationalVereinNo='" . $nationalVereinNo . "'";
			    $html .= "<a class='jba-link uk-button' href='#'" .  $params . ">Aktuelle Spiele</a></br>" ;
		    }
				
				$params = ' data-id=id_gen_team'
						    . ' data-action=7020' 
						    . ' data-verband=' . $team->getVerband()
					      . ' data-teamno='  . $team->getTeamNo();
				$teamName = utf8_encode($team->getTeamNameKurz());">$teamName" . "</a></br>";
	
				$html .= "<a class='jba-link uk-button' href='#'" .  $params . ">" . $teamName . "</a></br>";
			}
		  $html .= "</div>";
		}
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

		$html .= "<li>" . "<a class='jba-link' href='#' $params>Alle Spiele" . "</a></li>";

		
		foreach($gruppen as $grp) {
			
			$grpNo   = $grp["gruppeNo"];
			$grpName = $grp["gruppeName"];

			$params = ' data-id=id_khr_teampage_data'
					    . ' data-action=5000'
					    . ' data-team=' . $team
					    . ' data-gruppeno=' . $grpNo;
			
			$html   .= "<li>" . "<a class='jba-link' href='#' $params>$grpName" . "</a></li>";
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
				$html .= "<a class='jba-link' href='#'" . $params . ">Regionale Spiele $naechsterTag</a>";
			  $html .= "<br/>";
				$params = ' data-id=id_khr_einhalt' . ' data-action=6000' . ' data-offset=' . ($offset - 1);
				$html .= "<a class='jba-link' href='#'" . $params . ">Regionale Spiele $vorTag</a>";
			}
			else {
				$params = ' data-id=id_khr_einhalt' . ' data-action=6010' . ' data-offset=' . ($offset + 1);
				$html .= "<a class='jba-link' href='#'" . $params . ">Nationale Spiele $naechsterTag</a>";
			  $html .= "<br/>";
				$params = ' data-id=id_khr_einhalt' . ' data-action=6010' . ' data-offset=' . ($offset - 1);
				$html .= "<a class='jba-link' href='#'" . $params . ">Nationale Spiele $vorTag</a>";
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
					        .   "class="         . "jba-link"             . " "
							    .   "href="          . "#"                    . " "
									.   "data-id="       . "id_khr_einhalt"       . " "
									.   "data-action="   . "5010"                 . " " // nächste gruppespiele
									.   "data-gruppeno=" . $spiel->getGruppenNo() . " "
									.   "data-verband="  . $spiel->getVerband()
									. "><i class='uk-icon-share'></i>"
									. "</a>"                                 . "&nbsp;"
									. $spiel->getGruppenName();
				
			$heimTeamLink = "<a "
					          .   "class="         . "jba-link"             . " "
							      .   "href="          . "#"                    . " "
									  .   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
										.   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getHeimTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										.  $spiel->getHeimTeamNameKurz();
				
			$auswTeamLink = "<a "
					          .   "class="         . "jba-link"             . " "
							      .   "href="          . "#"                    . " "
									  .   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
										.   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getAuswTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										. $spiel->getAuswTeamNameKurz();
				
			
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
				
				if (!is_null($spiel->getHalleAdresse())) {
				  $googleMapsRef = "http://maps.google.com?q="
				           		   . htmlentities($spiel->getHalleAdresse(), ENT_QUOTES);
			  	$halleLink = "<a "
					    	     .   "href='"          . $googleMapsRef                   . "'"
						         .   " target='_blank'"
						         . "><i class='uk-icon-globe'></i>"
						         . "</a>"                                 . "&nbsp;"
						         . $spiel->getHalle();
				  $html .= "<td>" . $halleLink . "</td>";
				}
				else {
					if (!is_null($spiel->getHalle())) {
						$html .= "<td>" . $spiel->getHalle() . "</td>";
					}
					else {
						$html .= "<td>" . "&nbsp;" . "</td>";
					}
				}
				
				
				
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
									.   "class="         . "jba-link"             . " "
									.   "href="          . "#"                    . " "
									.   "data-id="       . "id_khr_einhalt"       . " "
									.   "data-action="   . "5010"                 . " " // nächste gruppespiele
									.   "data-gruppeno=" . $spiel->getGruppenNo() . " "
									.   "data-verband="  . $spiel->getVerband()
									. "><i class='uk-icon-share'></i>"
									. "</a>"                                 . "&nbsp;"
									. $spiel->getGruppenName();
			
			$heimTeamLink = "<a "
										.   "class="         . "jba-link"             . " "
										.   "href="          . "#"                    . " "
										.   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
									  .   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getHeimTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										.  $spiel->getHeimTeamNameKurz();
			
			$auswTeamLink = "<a "
				           	.   "class="         . "jba-link"             . " "
							      .   "href="          . "#"                    . " "
									  .   "data-id="       . "id_khr_einhalt"       . " "
										.   "data-action="   . "7020"                 . " " // nächste gruppespiele
									  .   "data-verband="  . $spiel->getVerband()   . " "
										.   "data-teamno="   . $spiel->getAuswTeamNo()
										. "><i class='uk-icon-share'></i>"
										. "</a>"                                 . "&nbsp;"
										. $spiel->getAuswTeamNameKurz();
			
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
				
			  if (!strcmp($spiel->getHalleAdresse(), "") == 0) {
				  $googleMapsRef = "http://maps.google.com?q="
				           		   . htmlentities($spiel->getHalleAdresse(), ENT_QUOTES);
			  	$halleLink = "<a "
					    	     .   "href='"          . $googleMapsRef                   . "'"
						         .   " target='_blank'"
						         . "><i class='uk-icon-globe'></i>"
						         . "</a>"                                 . "&nbsp;"
						         . $spiel->getHalle();
				  $html .= "<td>" . $halleLink . "</td>";
				}
				else {
					if (!strcmp($spiel->getHalle(), "") == 0) {
						$html .= "<td>" . $spiel->getHalle() . "</td>";
					}
					else {
						$html .= "<td>" . "&nbsp;" . "</td>";
					}
				}
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
  		     .   "class="        . "jba-link"         . " "
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
  	
  	$html = "<br/>";
  	$team->getGruppen()->sort();

  	$html .= '<div id="id_acc" class="uk-accordion">';
  	$html .= '<script type="text/javascript"> var accordion = UIkit.accordion("#id_acc");</script>';
  	foreach ($team->getGruppen()->getGruppen() as $gruppe) {
  		$html .= '<div class="uk-accordion-title">';
  		$html .=   ($gruppe->isCup() ? $gruppe->getLigaName() . " " : "") . $gruppe->getGruppeName();
  		$html .= '</div>';
  		$html .= '<div class="uk-accordion-content">';
  		$html .=    $this->formatSpiele($gruppe->getSpielListe());
  		$html .=    $this->formatRangListe($gruppe->getRangListe());
  	  $html .= '</div>';
  	}
  	$html .= '</div>';
  	
  	return $html;
  }
  
  
}

?>
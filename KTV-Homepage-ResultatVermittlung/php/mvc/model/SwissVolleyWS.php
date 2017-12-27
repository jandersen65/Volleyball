<?php

class SwissVolleyWS {

	private $conf;
	private $client;

	function __construct() {
		$this->conf = new KHR_Conf();
	}
	
	private function formatGroupName($league,   
															     $gender,
										               $mode,
										               $group) {
	  $tmpGroup = strcmp($league, "Volley Cup") == 0 ? "" : $group;
		return (strcmp($gender, "f")                   == 0 ? "D."   : "H.")  . " " .
			     (strcmp($league, "1L")                  == 0 ? "1. Liga" : $league)   . " " .
				   //(strcmp($mode,   "Qualifikationsrunde") == 0 ? "Qual."   : $mode)     . " " .
				   $tmpGroup;
	}
	
	public function connect($wsdlFile) {
		try {
			if ($this->client === NULL) {
				$this->client = new SOAPClient($wsdlFile);
			}
		}
		catch (Exception $e) {
  			echo "Tut uns Leid, aber ein Technisches Problem ist aufgetreten, die Daten konnten nicht bei VolleyBasel abgeholt werden.";
		}
	} // connect
		
	private function getSVHallAdr($hallId) {
		return utf8_encode($this->conf->getNationalHalleAdr($hallId));
	}
	
	
	public function getSpieleHeute($datumAb, $datumBis) {
	
		$this->connect(SV_WSDL);

		$datumAbDt  = date_create_from_format('Y-m-d', $datumAb);
		$datumBisDt = date_create_from_format('Y-m-d', $datumBis);
		
		$spiele =  $this->client->getGamesDateSpanAllGroups("NATIONAL", $datumAbDt->format('Y-m-d'), $datumBisDt->format('Y-m-d'));
		
		$spielListe = new SpielListe();
		foreach($spiele as $tmp) {
				
			$spiel =  new Spiel(
					"1",  // national
			    $tmp->ID_game,
					getSVDatum($tmp->PlayDate),
					getSVZeit($tmp->PlayDate), //$tmp->Anspielzeit,
					$tmp->group_ID,
					$this->formatGroupName($tmp->LeagueCatCaption,    
													       $tmp->Gender,
								                 $tmp->ModeCaption,
								                 $tmp->GroupCaption),   //gruppe
					$tmp->HallCaption,
					$this->getSVHallAdr($tmp->hall_ID),
					$tmp->TeamHomeID,
					$tmp->TeamAwayID,
					$tmp->TeamHomeCaption,
					$tmp->TeamAwayCaption,
					$tmp->NumberOfWinsHome,
					$tmp->NumberOfWinsAway,
					$tmp->Set1PointsHome,
					$tmp->Set1PointsAway,
					$tmp->Set2PointsHome,
					$tmp->Set2PointsAway,
					$tmp->Set3PointsHome,
					$tmp->Set3PointsAway,
					$tmp->Set4PointsHome,
					$tmp->Set4PointsAway,
					$tmp->Set5PointsHome,
					$tmp->Set5PointsAway);
			$spielListe->addSpiel($spiel);
		} // foreach
		return $spielListe;
	
	}

	public function getAktuelleSpieleVerein($vereinNo, $datumAb, $datumBis) {

		$this->connect(SV_WSDL);
		
		$spiele =  $this->client->getGamesByClub($vereinNo);

		$spielListe = new SpielListe();
		foreach($spiele as $tmp) {
			
		  if (!($tmp->PlayDate > $datumAb && $tmp->PlayDate < $datumBis)) { // Stringvergleich !!
				continue;
			}
			
			$spiel =  new Spiel("1",  // national 
					                $tmp->ID_game,
													getSVDatum($tmp->PlayDate),
													getSVZeit($tmp->PlayDate), //$tmp->Anspielzeit,
													$tmp->group_ID,
					                $this->formatGroupName($tmp->LeagueCatCaption,    
																					       $tmp->Gender,
																                 $tmp->ModeCaption,
																                 $tmp->GroupCaption),   //gruppe
													$tmp->HallCaption,
													$this->getSVHallAdr($tmp->hall_ID),
													$tmp->TeamHomeID,
													$tmp->TeamAwayID,
													$tmp->TeamHomeCaption,
													$tmp->TeamAwayCaption,
													$tmp->NumberOfWinsHome,
													$tmp->NumberOfWinsAway,
													$tmp->Set1PointsHome,
													$tmp->Set1PointsAway,
													$tmp->Set2PointsHome,
													$tmp->Set2PointsAway,
													$tmp->Set3PointsHome,
													$tmp->Set3PointsAway,
													$tmp->Set4PointsHome,
													$tmp->Set4PointsAway,
													$tmp->Set5PointsHome,
													$tmp->Set5PointsAway);
			$spielListe->addSpiel($spiel);
		} // foreach
  	return $spielListe;
		
	}

	public function getAktuelleSpiele($datumAb, $datumBis) {
	
		$this->connect(SV_WSDL);
	
		$spiele =  $this->client->getGamesByClub(KTVRIEHEN_CLUB_NO_SW);
	
		$spielListe = new SpielListe();
		foreach($spiele as $tmp) {
				
			if (!($tmp->PlayDate > $datumAb && $tmp->PlayDate < $datumBis)) { // Stringvergleich !!
				continue;
			}
				
			$spiel =  new Spiel(
					"1",  // national
			    $tmp->ID_game,
					getSVDatum($tmp->PlayDate),
					getSVZeit($tmp->PlayDate), //$tmp->Anspielzeit,
					$tmp->group_ID,
					$this->formatGroupName($tmp->LeagueCatCaption,
							$tmp->Gender,
							$tmp->ModeCaption,
							$tmp->GroupCaption),   //gruppe
					$tmp->HallCaption,
					$this->getSVHallAdr($tmp->hall_ID),
					$tmp->TeamHomeID,
					$tmp->TeamAwayID,
					$tmp->TeamHomeCaption,
					$tmp->TeamAwayCaption,
					$tmp->NumberOfWinsHome,
					$tmp->NumberOfWinsAway,
					$tmp->Set1PointsHome,
					$tmp->Set1PointsAway,
					$tmp->Set2PointsHome,
					$tmp->Set2PointsAway,
					$tmp->Set3PointsHome,
					$tmp->Set3PointsAway,
					$tmp->Set4PointsHome,
					$tmp->Set4PointsAway,
					$tmp->Set5PointsHome,
					$tmp->Set5PointsAway);
			$spielListe->addSpiel($spiel);
		} // foreach
		return $spielListe;
	
	}

	
	public function getTeamSpiele($teamId){
		$this->connect(SV_WSDL);

		$spiele =  $this->client->getGamesTeam($teamId);
		
		$spielListe = new SpielListe();
		foreach($spiele as $tmp) {
			$spiel =  new Spiel("1",  // national
			                    $tmp->ID_game,
													getSVDatum($tmp->PlayDate),
													getSVZeit($tmp->PlayDate), //$tmp->Anspielzeit,
													$tmp->group_ID,
					                $this->formatGroupName($tmp->LeagueCatCaption,    
																					       $tmp->Gender,
																                 $tmp->ModeCaption,
																                 $tmp->GroupCaption),   //gruppe
													$tmp->HallCaption,
													$this->getSVHallAdr($tmp->hall_ID),
													$tmp->TeamHomeID,
													$tmp->TeamAwayID,
													$tmp->TeamHomeCaption,
													$tmp->TeamAwayCaption,
													$tmp->NumberOfWinsHome,
													$tmp->NumberOfWinsAway,
													$tmp->Set1PointsHome,
													$tmp->Set1PointsAway,
													$tmp->Set2PointsHome,
													$tmp->Set2PointsAway,
													$tmp->Set3PointsHome,
													$tmp->Set3PointsAway,
													$tmp->Set4PointsHome,
													$tmp->Set4PointsAway,
													$tmp->Set5PointsHome,
													$tmp->Set5PointsAway);
			$spielListe->addSpiel($spiel);
		} // foreach
		
  	return $spielListe;
	}

	public function naechsteGruppenSpiele($gruppe, $datumAb, $datumBis) {
	
		$this->connect(SV_WSDL);

		$datumAbDt  = date_create_from_format('Y-m-d', $datumAb);
		$datumBisDt = date_create_from_format('Y-m-d', $datumBis);

		$spielListe = new SpielListe();
		$spiele = $this->client->getGamesDateSpan($gruppe, $datumAbDt->format('Y-m-d'), $datumBisDt->format('Y-m-d'));
		
		if (count($spiele) == 0) { 
			return $spielListe;
		}

		foreach($spiele as $tmp) {
			$spiel =  new Spiel("1",  // national
			                    $tmp->ID_game,
													getSVDatum($tmp->PlayDate),
													getSVZeit($tmp->PlayDate), //$tmp->Anspielzeit,
													$tmp->group_ID,
					                $this->formatGroupName($tmp->LeagueCatCaption,    
																					       $tmp->Gender,
																                 $tmp->ModeCaption,
																                 $tmp->GroupCaption),   //gruppe
													$tmp->HallCaption,
													$this->getSVHallAdr($tmp->hall_ID),
													$tmp->TeamHomeID,
													$tmp->TeamAwayID,
													$tmp->TeamHomeCaption,
													$tmp->TeamAwayCaption,
													$tmp->NumberOfWinsHome,
													$tmp->NumberOfWinsAway,
													$tmp->Set1PointsHome,
													$tmp->Set1PointsAway,
													$tmp->Set2PointsHome,
													$tmp->Set2PointsAway,
													$tmp->Set3PointsHome,
													$tmp->Set3PointsAway,
													$tmp->Set4PointsHome,
													$tmp->Set4PointsAway,
													$tmp->Set5PointsHome,
													$tmp->Set5PointsAway);
			$spielListe->addSpiel($spiel);
		} // foreach
		
  	return $spielListe;
	}
	
	
	public function getRangListe($grpId) {

		$this->connect(SV_WSDL);
		
		$tmpListe = $this->client->getTable($grpId);
		$rangListe = new RangListe();

		$tmpRank = 1;
		foreach ($tmpListe as $tmp) {
			
			$rang = new Rang($tmpRank,
					             "1", // national
					             $tmp->team_ID,
					             $tmp->Caption,
					             $tmp->NumberOfGames, 
					             $tmp->Points,
					             $tmp->SetsWon, 
					             $tmp->SetsLost,
					             $tmp->BallsWon, 
					             $tmp->BallsLost);
			$rangListe->neuerRang($rang);
			$tmpRank++;
		}
		
		return $rangListe;
	}
	

	public function getMannschaften() {
		

		$conf = new KHR_Conf();
		$nationaleVereine = $conf->getNationaleVereine();
		$nationaleLigen   = array("NLA", "NLB", "1L");
		
		$this->connect(SV_WSDL);
		$tmpListe = $this->client->getActiveTeams('NATIONAL');

		foreach ($tmpListe as $tmp) {
			if (in_array($tmp->club_ID,       $nationaleVereine) &&
          in_array($tmp->LeagueCaption, $nationaleLigen)) {
				echo   $tmp->club_ID 
				   . " " . $tmp->ID_team 
				   . " " . $tmp->Gender 
				   . " " . $tmp->LeagueCaption 
				   . " " . $tmp->Caption 
				   . "<br/>";
			}
		}
		
		return $tmpListe;
	}
	
	public function getTeam($teamNo) {
		
		$conf = new KHR_Conf();
		$teamRec = $conf->getNationalTeamRec($teamNo);
		
		$verein = new Verein($teamRec["vereinname"], $teamRec["vereinno"], null);
		$team = new Team($conf::NATIONAL, $verein, $teamNo, $teamRec["teamname"], $teamRec["liga"]);
		
		$this->connect(SV_WSDL);
		$spiele =  $this->client->getGamesTeam($teamNo);
		
		foreach($spiele as $tmp) {
			
			$gruppe = new Gruppe($team, 
					                 $tmp->league_ID,
					                 $tmp->LeagueCatCaption, //TODO
		                       $tmp->group_ID,
		                       $tmp->ModeCaption);     //TODO
			$team->addGruppe($gruppe);
			
			$spiel  = new Spiel("1",  // national
			                    $tmp->ID_game,
													getSVDatum($tmp->PlayDate),
													getSVZeit($tmp->PlayDate), //$tmp->Anspielzeit,
													$tmp->group_ID,
													$this->formatGroupName($tmp->LeagueCatCaption,
															$tmp->Gender,
															$tmp->ModeCaption,
															$tmp->GroupCaption),   //gruppe
													$tmp->HallCaption,
													$this->getSVHallAdr($tmp->hall_ID),
													$tmp->TeamHomeID,
													$tmp->TeamAwayID,
													$tmp->TeamHomeCaption,
													$tmp->TeamAwayCaption,
													$tmp->NumberOfWinsHome,
													$tmp->NumberOfWinsAway,
													$tmp->Set1PointsHome,
													$tmp->Set1PointsAway,
													$tmp->Set2PointsHome,
													$tmp->Set2PointsAway,
													$tmp->Set3PointsHome,
													$tmp->Set3PointsAway,
													$tmp->Set4PointsHome,
													$tmp->Set4PointsAway,
													$tmp->Set5PointsHome,
													$tmp->Set5PointsAway);
			$team->getGruppe($tmp->group_ID)->addSpiel($spiel);
		}
		
		foreach ($team->getGruppen()->getGruppen() as $gruppe) {
		  $tmpListe = $this->client->getTable($gruppe->getGruppeNo());
			$rangListe = new RangListe();
			$tmpRank = 1;
			foreach ($tmpListe as $tmp) {
				$rang = new Rang($tmpRank++,
					               "1", // national
					               $tmp->team_ID,
											   $tmp->Caption,
												 $tmp->NumberOfGames,
												 $tmp->Points,
												 $tmp->SetsWon,
												 $tmp->SetsLost,
												 $tmp->BallsWon,
												 $tmp->BallsLost);
				$rangListe->neuerRang($rang);
			}
  	  $gruppe->setRangListe($rangListe);
		}
		
		return $team;
	}
	
	
	/*
	public function getGroupDetailed($grpId){
		$l_ret = $this->ws_conn->getGroupDetailed($grpId);
		return $l_ret;
	}

	public function getRangListe($grpId){
		$l_ret = $this->ws_conn->getTable($grpId);
		return $l_ret;
	}

	public function getGamesTeam($teamId){
		$l_ret = $this->ws_conn->getGamesTeam($teamId);
		return $l_ret;
	}

	function getSVHallAdr($hallId) {
		$l_hall = $this->ws_conn->getHallDetailed($hallId);
		return $l_hall->Street . " " . $l_hall->Number . " " . $l_hall->AreaCode . " " .$l_hall->Place;
	}*/
	
} //SwissVolleyWS

?>
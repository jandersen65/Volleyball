<?php
  class NationalDataService implements IDataService {
  	
  	private $dataservice;
  	
  	public function __construct() {
  		$this->dataservice = new SwissVolleyWS();
  	}
  	
  	public function getTeamSpiele($teamNo) {
  		$spiele = $this->dataservice->getTeamSpiele($teamNo);
  		return $spiele;
  	} // getTeamSpiele
  	
  	
  	public function getRangListe($gruppe) {
  		$rangListe = $this->dataservice->getRangListe($gruppe);
  		return $rangListe;
  	} // getRangListe
  	
  	
  	public function naechsteGruppenSpiele($gruppe) {
  		
		  $datumAb  = date("Y-m-d", time() - NAECHSTESPIELE_MINUS_DAYS *24*60*60);
		  $datumBis = date("Y-m-d", time() + NAECHSTESPIELE_PLUS_DAYS  *24*60*60);
		  $november = date("Y-m-d", mktime(0, 0, 0, 11, 1));
		  if ($datumBis < $november) {
		  	$datumBis = $november;
		  }
  		$spiele = $this->dataservice->naechsteGruppenSpiele($gruppe, $datumAb, $datumBis);
  		return $spiele;
  	} // naechsteGruppenSpiele

  	public function getAktuelleSpiele() {
  		$datumAb  = date("Y-m-d", time() - AKTUELLESPIELE_MINUS_DAYS *24*60*60);
  		$datumBis = date("Y-m-d", time() + AKTUELLESPIELE_PLUS_DAYS  *24*60*60);
  		$november = date("Y-m-d", mktime(0, 0, 0, 11, 1));
		  if ($datumBis < $november) {
		  	$datumBis = $november;
		  }
  		$spiele = $this->dataservice->getAktuelleSpiele($datumAb, $datumBis);
  		return $spiele;
  	} // getAktuelleSpiele
  	

  	public function getAktuelleSpieleVerein($nationalVereinNo) {
  		$datumAb  = date("Y-m-d", time() - AKTUELLESPIELE_MINUS_DAYS *24*60*60);
  		$datumBis = date("Y-m-d", time() + AKTUELLESPIELE_PLUS_DAYS  *24*60*60);
  		$november = date("Y-m-d", mktime(0, 0, 0, 11, 1));
		  if ($datumBis < $november) {
		  	$datumBis = $november;
		  }
  		$spiele = $this->dataservice->getAktuelleSpieleVerein($nationalVereinNo, $datumAb, $datumBis);
  		return $spiele;
  	}

  	public function getAlleSpiele() {
  		$datumAb  = date("Y-m-d", mktime(0, 0, 0,  8, 1, 2015));
  		$datumBis = date("Y-m-d", mktime(0, 0, 0,  6, 1, 2016));
  		$spiele = $this->dataservice->getAktuelleSpiele($datumAb, $datumBis);
  		return $spiele;
  	} // getAlleSpiele
  	
  	public function getSpieleHeute($offset) {
  		
  		$datumAb  = date("Y-m-d", time() + $offset*24*60*60);
  		$datumBis = date("Y-m-d", time() + $offset*24*60*60);
  		$spiele = $this->dataservice->getSpieleHeute($datumAb, $datumBis);
  		return $spiele;
  	}
  	
  	
  	public function getMannschaften() {
  		$mannschaften = $this->dataservice->getMannschaften();
  		return $mannschaften;
  	}

  	public function getTeamsVerein($vereinNo) {
  		$conf = new KHR_Conf();
  		$teamListe = new TeamListe();
  		if (intval($vereinNo) > -1) {
	  	  foreach ($conf->getNationaleTeams() as $tmp) {
	  	  	if (   strcmp($tmp["vereinNo"], $vereinNo) == 0  
	  	  	    && strcmp($tmp["liga"],     "")        != 0) {
	  	  		$verband      = $conf::NATIONAL;
	  	  		$verein       = new Verein($tmp["vereinName"], $tmp["vereinNo"], null);
	  	  		$teamNo       = $tmp["teamNo"];
	  	  		$teamName     = $tmp["teamName"];
	  	  		$primaereLiga = $tmp["liga"];
	  	  		$team         = new Team($verband, $verein, $teamNo, $teamName, $primaereLiga);
	  	      $teamListe->addTeam($team);
	  	  	}
	  	  }
  		}
  	  return $teamListe;
  	}
  	
  	public function getTeam($teamNo) {
  		$team = $this->dataservice->getTeam($teamNo);
  		return $team;
  	}
  	
  } //NationalDataService
?>
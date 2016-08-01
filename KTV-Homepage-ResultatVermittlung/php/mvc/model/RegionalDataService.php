<?php
  class RegionalDataService implements IDataService {
  	
  	private $dataservice;
  	
  	public function __construct() {
  		$this->dataservice = new RegioBSVolleyWS();
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
  		$datumAb  = date("d.m.Y", time() - NAECHSTESPIELE_MINUS_DAYS *24*60*60);
  		$datumBis = date("d.m.Y", time() + NAECHSTESPIELE_PLUS_DAYS  *24*60*60);
  		
  		$bis      = date_create_from_format('d.m.Y', $datumBis);
  		$aug      = date_create_from_format('d.m.Y',   '01.08.' . date("Y", time()));
  		$nov      = date_create_from_format('d.m.Y',   '01.11.' . date("Y", time()));
  		
  		if ($bis > $aug && $bis < $nov) {
  			$datumBis = $nov->format('d.m.Y');
  		}
  		
  		$spiele = $this->dataservice->naechsteGruppenSpiele($gruppe, $datumAb, $datumBis);
  		return $spiele;
  	} // naechsteGruppenSpiele

  	public function getAktuelleSpiele() {
  		$datumAb  = date("d.m.Y", time() - NAECHSTESPIELE_MINUS_DAYS *24*60*60);
  		$datumBis = date("d.m.Y", time() + NAECHSTESPIELE_PLUS_DAYS  *24*60*60);
  		
  		$bis      = date_create_from_format('d.m.Y', $datumBis);
  		$aug      = date_create_from_format('d.m.Y',   '01.08.' . date("Y", time()));
  		$nov      = date_create_from_format('d.m.Y',   '01.11.' . date("Y", time()));
  		
  		if ($bis > $aug && $bis < $nov) {
  			$datumBis = $nov->format('d.m.Y');
  		}
  		
  		$spiele = $this->dataservice->getAktuelleSpiele($datumAb, $datumBis);
  		return $spiele;
  	} // getAktuelleSpiele

  	public function getAktuelleSpieleVerein($vereinNo) {
  		$datumAb  = date("d.m.Y", time() - NAECHSTESPIELE_MINUS_DAYS *24*60*60);
  		$datumBis = date("d.m.Y", time() + NAECHSTESPIELE_PLUS_DAYS  *24*60*60);
  	
  		$bis      = date_create_from_format('d.m.Y', $datumBis);
  		$aug      = date_create_from_format('d.m.Y',   '01.08.' . date("Y", time()));
  		$nov      = date_create_from_format('d.m.Y',   '01.11.' . date("Y", time()));
  	
  		if ($bis > $aug && $bis < $nov) {
  			$datumBis = $nov->format('d.m.Y');
  		}
  	
  		$spiele = $this->dataservice->getAktuelleSpieleVerein($vereinNo, $datumAb, $datumBis);
  		return $spiele;
  	} // getAktuelleSpiele
  	

  	public function getAlleSpiele() {
  		
  		$start      = date_create_from_format('d.m.Y',   '01.08.2015');
  		$end        = date_create_from_format('d.m.Y',   '01.06.2016');
  	
  		$spiele = $this->dataservice->getAktuelleSpiele($start, $end);
  		return $spiele;
  	} // getAlleSpiele

  	public function getSpieleHeute($offset) {
  		$datumAb  = date("d.m.Y", time() + $offset*24*60*60);
  		$datumBis = date("d.m.Y", time() + $offset*24*60*60);
  		$spiele = $this->dataservice->getSpieleHeute($datumAb, $datumBis);
  		return $spiele;
  	}
  	

  	public function getMannschaften() {
  		return ""; //TODO
  	}
  	
  	public function getTeamsVerein($vereinNo) {
  		$conf = new KHR_Conf();
  		$teamListe = new TeamListe();
  		if (intval($vereinNo) > -1) {
	  	  foreach ($conf->getRegionaleTeams() as $tmp) {
	  	  	if (   strcmp($tmp["vereinNo"], $vereinNo) == 0  
	  	  	    && strcmp($tmp["liga"],     "")        != 0) {
	  	  		$verband  = $conf::REGIONAL;
	  	  		$verein       = new Verein($tmp["vereinName"], null, $tmp["vereinNo"]);
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
  	
  } //RegionalDataService
?>
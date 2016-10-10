<?php


class ResultatController {

	private $teamListe;
	
	private $viewer;
	private $model;

	public function __construct($viewer) {
		$tmp = new KHR_Conf();
		$this->teamListe = $tmp->getTeamListe();
		$this->viewer = $viewer;
	}
	
	private function getVerband($team) {
		 $tmp = $this->teamListe[$team] ;
		 if ($tmp) {
		 	 return $tmp["verband"];
		 }
	}

	private function getTeamNo($team) {
		$tmp = $this->teamListe[$team] ;
		if ($tmp) {
			return $tmp["teamNo"];
		}
	}
	
	private function getTeamName($team) {
		$tmp = $this->teamListe[$team] ;
		if ($tmp) {
			return $tmp["teamName"];
		}
	}

	private function getGruppen($team) {
		$tmp = $this->teamListe[$team] ;
		if ($tmp) {
			return $tmp["gruppen"];
		}
	}
	
	private function getGruppeNo($team) {
		$tmp = $this->teamListe[$team] ;
		if ($tmp) {
			return $tmp["gruppen"][0]["gruppeNo"];
		}
	}
	
	private function getGruppeName($team) {
		$tmp = $this->teamListe[$team] ;
		if ($tmp) {
			return $tmp["gruppen"][0]["gruppeName"];
		}
	}

	private function setRegionalModel() {
		$this->model = new RegionalDataService();
	}

	private function setNationalModel() {
		$this->model = new NationalDataService();
	}
	
	private function setModel($team) {
		if ($this->getVerband($team) == KHR_Conf::NATIONAL) {
			$this->setNationalModel();
		}
		else {
			$this->setRegionalModel();
		}
	}
	

	public function getAktuelleSpieleVerein($regionalVereinNo, $nationalVereinNo) {
		
		$regionalDS = new RegionalDataService();
		$regional = $regionalDS->getAktuelleSpieleVerein($regionalVereinNo);
		
		$nationalDS = new NationalDataService();
		$national = $nationalDS->getAktuelleSpieleVerein($nationalVereinNo);
		
		$regional->append($national);
		
		$withGruppe = true;
		$aktuelleSpieleHTML = $this->viewer->formatSpiele($regional, $withGruppe);
		echo $this->viewer->printSpiele($aktuelleSpieleHTML);
	}
	
	public function getAktuelleSpiele() {
		
		$regionalDS = new RegionalDataService();
		$regional = $regionalDS->getAktuelleSpiele();

		$nationalDS = new NationalDataService();
		$national = $nationalDS->getAktuelleSpiele();
		
		$regional->append($national);

		$withGruppe = true;
		$aktuelleSpieleHTML = $this->viewer->formatSpiele($regional, $withGruppe);
		echo $this->viewer->printSpiele($aktuelleSpieleHTML);
	
	} 
	


	public function getAlleSpiele() {
	
		$regionalDS = new RegionalDataService();
		$regional = $regionalDS->getAlleSpiele();
	
		$nationalDS = new NationalDataService();
		$national = $nationalDS->getAlleSpiele();
	
		$regional->append($national);
	
		$withGruppe = true;
		$aktuelleSpieleHTML = $this->viewer->formatSpiele($regional, $withGruppe);
		echo $this->viewer->printSpiele($aktuelleSpieleHTML);
	
	}
	
	public function getRegionaleSpieleHeute($offset = 0) {
		$regionalDS = new RegionalDataService();
		$spiele = $regionalDS->getSpieleHeute($offset);

		$withGruppe = true;
		$withOffset = true;
		$regio      = true;
		$spieleHTML = $this->viewer->formatSpiele($spiele, $withGruppe, $withOffset, $offset, $regio);
		echo $this->viewer->printSpiele($spieleHTML);
	}

	public function getNationaleSpieleHeute($offset) {
		$nationalDS = new NationalDataService();
		$spiele = $nationalDS->getSpieleHeute($offset);

		$withGruppe = true;
		$withOffset = true;
		$regio      = false;
		$spieleHTML = $this->viewer->formatSpiele($spiele, $withGruppe, $withOffset, $offset, $regio);
		echo $this->viewer->printSpiele($spieleHTML);
	}
	
	public function getTeam($team) {
	  
		$this->setModel($team);
		
		$teamNo                   = $this->getTeamNo($team);
		
		$teamName                 = $this->getTeamName($team);
		$gruppeNo                 = $this->getGruppeNo($team);
		$gruppeName               = $this->getGruppeName($team);
		$gruppen                  = $this->getGruppen($team);

		if (empty($teamNo)) {
			echo $this->viewer->teamNichtKonf($teamName);
			return;
		}
		
		$menuHTML                 = $this->viewer->formatMenuTR($teamName, $team, $teamNo, $gruppeName, $gruppeNo, $gruppen);
			
		$rangListe                = $this->model->getRangListe($gruppeNo);
		$rangListeHTML            = $this->viewer->formatRangListe($rangListe);
		
		$naechsteGruppeSpiele     = $this->model->naechsteGruppenSpiele($gruppeNo);
		$naechsteGruppeSpieleHTML = $this->viewer->formatGruppeSpiele($naechsteGruppeSpiele);
		
		echo $this->viewer->setupTeamPage($menuHTML, $rangListeHTML, $naechsteGruppeSpieleHTML);
		
	}
	
	public function getNaechsteGruppeSpiele($verband, $gruppeNo) {
		
		$conf = new KHR_Conf;
		if ($verband == $conf::NATIONAL) {
			$this->setNationalModel();
		}
		else {
			$this->setRegionalModel();
		}
		
		$rangListe                = $this->model->getRangListe($gruppeNo);
		$rangListeHTML            = $this->viewer->formatRangListe($rangListe);
		
		$naechsteGruppeSpiele     = $this->model->naechsteGruppenSpiele($gruppeNo);
		$naechsteGruppeSpieleHTML = $this->viewer->formatGruppeSpiele($naechsteGruppeSpiele);

		echo $this->viewer->printGruppeSpieleRangliste($naechsteGruppeSpieleHTML, $rangListeHTML);
	}


	public function getTeamSpiele($team) {
		 
		$this->setModel($team);
		
		$teamNo                   = $this->getTeamNo($team);
		if (empty($teamNo)) {
			echo $this->viewer->teamNichtKonf($teamName);
			return;
		}

		$teamSpiele               = $this->model->getTeamSpiele($teamNo);
		$teamSpieleHTML           = $this->viewer->formatTeamSpiele($team, $teamNo, $teamSpiele);
		
		echo $this->viewer->printTeamSpiele($teamSpieleHTML);
		
	}

	public function getGruppeSpiele($gruppeNo, $team) {
			
		$this->setModel($team);
		
		$teamNo                   = $this->getTeamNo($team);
		if (empty($teamNo)) {
			echo $this->viewer->teamNichtKonf($teamName);
			return;
		}
		
		$rangListe                = $this->model->getRangListe($gruppeNo);
		$rangListeHTML            = $this->viewer->formatRangListe($rangListe);
		
		$naechsteGruppeSpiele     = $this->model->naechsteGruppenSpiele($gruppeNo);
		$naechsteGruppeSpieleHTML = $this->viewer->formatGruppeSpiele($naechsteGruppeSpiele);

		echo $this->viewer->printGruppeSpieleRangliste($naechsteGruppeSpieleHTML, $rangListeHTML);
	}
	
	public function getNationaleMannschaften() {
		$this->setNationalModel();
		$mannschaften =  $this->model->getMannschaften();
		return $mannschaften;
	}
	
	public function getRegioVereine() {
		$conf = new KHR_Conf();
		$vereinListe = $conf->getVolleyBaselVereine();
		echo $this->viewer->printVereine($vereinListe);
	}

	public function getNatVereine() {
		$conf = new KHR_Conf();
		$vereinListe = $conf->getNationaleVereine();
		echo $this->viewer->printVereine($vereinListe);
	}

	public function getTeamVerein($regionalVereinNo, $nationalVereinNo) {		
		$dataService    = new NationalDataService();
		$nationaleTeams = $dataService->getTeamsVerein($nationalVereinNo);
		$dataService    = new RegionalDataService();
		$regionaleTeams = $dataService->getTeamsVerein($regionalVereinNo);
		echo $this->viewer->printTeams($nationaleTeams, $regionaleTeams);
	}
	
	public function getGenTeam($verband, $teamNo) {
		$conf = new KHR_Conf;
		
		if ($verband == $conf::NATIONAL) {
			$this->setNationalModel();
		}
		else {
			$this->setRegionalModel();
		}
		
		$team = $this->model->getTeam($teamNo);

		echo $this->viewer->printTeam($team);
	}
	
	public function getKTVTeams() {
		$this->getTeamVerein(KTVRIEHEN_CLUB_NO_BS, KTVRIEHEN_CLUB_NO_SW);
	}
	
	public function setupVereinMainMenu() {
		
		$dataService    = new NationalDataService();
		$nationaleTeams = $dataService->getTeamsVerein(KTVRIEHEN_CLUB_NO_SW);
		$dataService    = new RegionalDataService();
		$regionaleTeams = $dataService->getTeamsVerein(KTVRIEHEN_CLUB_NO_BS);
		
		echo $this->viewer->printVereinMainMenu($nationaleTeams, $regionaleTeams);
	}
	
	public function setupRegionalMainMenu() {
		$conf = new KHR_Conf();
		$vereinListe = $conf->getVolleyBaselVereine();
		echo $this->viewer->printRegionalMainMenu($vereinListe);
	}

	public function setupNationalMainMenu() {
		$conf = new KHR_Conf();
		$vereinListe = $conf->getNationaleVereine();
		echo $this->viewer->printNationalMainMenu($vereinListe);
	}
	
} 

?>
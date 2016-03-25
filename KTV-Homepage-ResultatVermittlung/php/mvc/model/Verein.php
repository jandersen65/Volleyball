<?php


class Verein {

	private $vereinName;
	private $nationalVereinNo;
	private $regionalVereinNo;
	private $teamListe;
	
	function __construct($vereinName,
			                 $nationalVereinNo,
											 $regionalVereinNo) {
		$this->teamListe         = new TeamListe();
		$this->vereinName        = $vereinName;
		$this->nationalVereinNo  = $nationalVereinNo;
		$this->regionalVereinNo  = $regionalVereinNo;
	}

	public function getVereinName() {
		return $this->vereinName;
	}
	
	public function getNationalVereinNo() {
		return $this->nationalVereinNo;
	}
	
	public function getRegionalVereinNo() {
		return $this->regionalVereinNo;
	}

	public function getTeamListe() {
		return $this->teamListe;
	}
	
	public function addTeam(Team $team) {
	  $this->teamListe->addTeam($team);
		return $this->teamListe;
	}
	
	public function getTeam($teamNo) {
		return $this->teamListe->getTeam($teamNo);
	}
	
	public function getSpiele() {
		$spielListe = new SpielListe();
		foreach ($this->teamListe as $team) {
			$gruppeListe = $team->getGruppeListe();
			if (count($gruppeListe) > 0) {
				foreach ($gruppeListe as $gruppe) {
					if (count($gruppe->getSpielListe()) > 0) {
						$spielListe.append($gruppe->getSpielListe());
					}
				}
			}
		}
		return $spielListe;
	}
	
	
}
	
?>
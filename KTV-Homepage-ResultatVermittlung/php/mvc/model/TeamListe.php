<?php
class TeamListe {

	private $teamListe;
	
	function __construct() {
    $this->teamListe = array();
	}

	public function addTeam(Team $team) {
		if (is_null($this->getTeam($team->getTeamNo()))) {
		  array_push($this->teamListe, $team);
		}
		return $this;
	}
	
	public function getTeams() {
		return $this->teamListe;
	} 
	
	public function getTeam($teamNo)  {
		foreach($this->teamListe as $team) {
			if (strcmp($team->getTeamNo(), $teamNo) == 0) {
				return $team;
			}
		}
		return null;
	}
	
	private function compareByName(Team $t1, Team $t2) {
		$name1 = $t1->getTeamNameKurz();
		$name2 = $t2->getTeamNameKurz();
		//NLA NLB
		$nat1 = strcmp(substr($name1, 0, 1), "N") == 0;
		$nat2 = strcmp(substr($name2, 0, 1), "N") == 0;
		if ($nat1 || $nat2) {
			if ($nat1) return -1;
			if ($nat2) return 1;
		}
		$jun = (strcmp(substr($name1, 0, 1), "U") == 0) && (strcmp(substr($name2, 0, 1), "U") == 0);
		// Reverse Sortierung bei JuniorInnen
		return strcmp($jun ? $name2 : $name1, $jun ? $name1 : $name2);
	}
	
	public function sortByName() {
		uasort($this->teamListe, array($this, "compareByName"));
	}
	
}

?>
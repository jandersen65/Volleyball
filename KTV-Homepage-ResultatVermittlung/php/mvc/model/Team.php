<?php

class Team {

	private $verband;
	private $verein;
	private $teamNo;
	private $teamName;
	private $primaereLigaName;
	
	private $gruppeListe;
	

	function __construct($verband,
			                 $verein,
			                 $teamNo,
                       $teamName,
                       $primaereLigaName) {
		$this->gruppeListe      = new GruppeListe();
	  $this->verband          = $verband;
	  $this->verein           = $verein;
	  $this->teamNo           = $teamNo;
	  $this->teamName         = $teamName;
	  $this->primaereLigaName = $primaereLigaName;
	}

	public function dump() {
		echo "Team <br/>";
		echo ".  $this->teamNo  <br/>";
		echo ".    $this->teamName <br/>";
		echo ".    $this->primaereLigaName <br/>";
		foreach ($this->gruppeListe->getGruppen() as $gruppe) {
			$gruppe->dump();
		} 
	}

	public function getVerband() {
		return $this->verband;
	}
	
	public function getVerein() {
		return $this->verein;
	}
	
	public function getNationalVereinNo() {
		return $this->verein->getNationalVereinNo();
	}

	public function getRegionalVereinNo() {
		return $this->verein->getRegionalVereinNo();
	}
	
	public function getTeamNo() {
		return $this->teamNo;
	}

	public function getTeamName() {
		return $this->teamName;
	}
	
	public function getTeamNameKurz() {
		$replaceStrings = array("U15", "D U15", 
				                    "U17", "D U17", 
				                    "U19", "D U19", 
				                    "U23", 
				                    "2L-D", 
				                    "(", ")", "-", "\\", "\'", "\' ", "`", "` ");
    $ligaName   = str_replace(" ", "-", $this->primaereLigaName);
    $teamName   = str_replace($replaceStrings, "", $this->teamName);
    $vereinName = str_replace($replaceStrings, "", $this->verein->getVereinName());
		$tmp = trim(str_replace($vereinName, "", $teamName));
		return trim($ligaName) . (strcmp($tmp, "") == 0 ? "" : "(" . $tmp . ")");
	}
	
	public function getPrimaereLigaName() {
		return $this->primaereLigaName;
	}
	
	public function getGruppen() {
		return $this->gruppeListe;
	}

	public function getGruppe($gruppeNo) {
		return $this->gruppeListe->getGruppe($gruppeNo);
	}

	public function addGruppe(Gruppe $gruppe) {
		$this->gruppeListe->addGruppe($gruppe);
		return $this->gruppeListe;
	}
	
}

?>
<?php

class Rang {
	
	private $rang;
	private $verband;
	private $teamNo;
	private $teamName;
	private $anzahlSpiele;
	private $gewinnSaetze;
	private $verlustSaetze;
	private $gewinnBaelle;
	private $verlustBaelle;
	private $punkte;

	public function __construct($rang,         
			                        $verband, 
			                        $teamNo,   
			                        $teamName,
															$anzahlSpiele, 
			                        $punkte,
															$gewinnSaetze, 
			                        $verlustSaetze,
															$gewinnBaelle,
			                        $verlustBaelle) {
		$this->rang            = $rang;
		$this->verband         = $verband;
		$this->teamNo          = $teamNo;
		$this->teamName        = $teamName;
		$this->anzahlSpiele    = $anzahlSpiele;
		$this->punkte          = $punkte;
		$this->gewinnSaetze    = $gewinnSaetze;
		$this->verlustSaetze   = $verlustSaetze;
		$this->gewinnBaelle    = $gewinnBaelle;
		$this->verlustBaelle   = $verlustBaelle;
	}

	public function getRang() {
		return $this->rang;
	}

	public function getVerband() {
		return $this->verband;
	}
	
	public function getTeamNo() {
		return $this->teamNo;
	}
	
	public function getTeamName() {
		return $this->teamName;
	}
	
	public function getAnzahlSpiele() {
		return $this->anzahlSpiele;
	}
	
	public function getGewinnSaetze() {
		return $this->gewinnSaetze;
	}
	
	public function getVerlustSaetze() {
		return $this->verlustSaetze;
	}
	
	public function getGewinnBaelle() {
		return $this->gewinnBaelle;
	}
	
	public function getVerlustBaelle() {
		return $this->verlustBaelle;
	}
	
	public function getPunkte() {
		return $this->punkte;
	}
	
	

}  // class Rang

?>
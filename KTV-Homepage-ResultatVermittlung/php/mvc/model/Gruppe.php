<?php

class Gruppe {

	private $team;
	private $ligaNo;
	private $ligaType; // (Meisterschaft, Cup)
	private $ligaName;
	private $ligaNameKurz;
	private $gruppeNo;
	private $gruppeName;
	private $gruppeNameKurz;

	private $rangListe;
	private $spielListe;

	function __construct ($team,
												$ligaNo,
												$ligaName,
												$gruppeNo,
												$gruppeName) {
		$this->rangListe      = new RangListe();
		$this->spielListe     = new SpielListe();
		$this->team           = $team;
		$this->ligaNo         = $ligaNo;
		$this->ligaType       = ""; //$ligaType; //TODO
		$this->ligaName       = $ligaName;
		$this->ligaNameKurz   = $ligaName;
		$this->gruppeNo       = $gruppeNo;
		$this->gruppeName     = $gruppeName;
		$this->gruppeNameKurz = $gruppeName;
	}

	public function dump() {
		echo "Gruppe <br/>";
		echo ".  GruppeNo    $this->gruppeNo  <br/>";
		echo ".  GruppeName  $this->gruppeName <br/>";
		echo ".  LigaNo      $this->ligaNo <br/>";
		echo ".  LigaName    $this->ligaName <br/>";
		echo ".  isCup      " . ($this->isCup() ? 1 : 0) . "<br/>";
	}
	
	public function setRangliste(RangListe $rangListe) {
		$this->rangListe = $rangListe;
	}

	public function getRangliste() {
		return $this->rangListe;
	}
	
  public function getTeam() {
  	return $this->team;
  }
  
  public function isCup() {
  	return strcasecmp($this->ligaName, "Volley Cup") == 0;
  }
  
  public function getLigaNo() {
  	return $this->ligaNo;
  }
  
  public function getLigaType() {
  	return $this->ligaType;
  }
  
  public function getLigaName() {
  	return $this->ligaName;
  }
  
  public function getLigaNameKurz() {
  	return $this->ligaNameKurz;
  }
  
  public function getGruppeNo() {
  	return $this->gruppeNo;
  }
  
  public function getGruppeName() {
  	return $this->gruppeName;
  }

  public function getGruppeNameKurz() {
  	return $this->gruppeNameKurz;
  }
  
  public function getSpiele() {
  	return $this->spielListe;
  }

  public function getSpielListe() {
  	return $this->spielListe;
  }

  public function addSpiel(Spiel $spiel) {
  	return $this->spielListe->addSpiel($spiel);
  }
	
}

?>
<?php
class SpielListe {

  private $spielListe;

  function __construct() {
    $this->spielListe = array();
  }  
  
  public function addSpiel(Spiel $spiel) {
    array_push($this->spielListe, $spiel);
  }
  

  public function sortier($sortFunktion) {
    uasort($this->spielListe, $sortFunktion);
  }
  
  public function getSpiele() {
  	return $this->spielListe;
  }

  public function append(SpielListe $spielListe) {
  	foreach($spielListe->getSpiele() as $tmp) {
  		$this->addSpiel($tmp);
  	}
  }
  
}

?>
<?php

class Sammlungen {

	private $sammlungenRoot;
  private $sammlungen;
  
  public function __construct($root) {
  	$this->sammlungenRoot = new Verzeichnis($root);
  	$this->sammlungen = array();
  }
	
  private function sammlungPfad() {
  	return $this->sammlungenRoot->getPfad();
  }
  
  private function neueSammlung($sammlung) {
  	array_push($this->sammlungen, $sammlung);
  }
  
  public function getSammlungen() {
  	if (count($this->sammlungen) > 0) {
  		return $this->sammlungen;
  	}
  	foreach ($this->sammlungenRoot->getInhalt() as $sammlungRootName) {
  	  $this->neueSammlung(new Sammlung($this->sammlungPfad(), $sammlungRootName));
  	}
  	return $this->sammlungen;
  }
  
  public function debug() {
  	echo "sammlungenRoot "  . $this->sammlungPfad()  . "<br/>";
  	
  }
  
}

?>
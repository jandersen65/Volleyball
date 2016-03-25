<?php

class Verzeichnis {
	
  private $pfad;
  
  private function isJpg($file) {
  	$ext = pathinfo($file, PATHINFO_EXTENSION); 
  	$ret = (strcasecmp($ext, "jpg") == 0 || strcasecmp($ext, "jpeg") == 0);
  	return $ret;
  }
  
  public function __construct($pfad) {
  	$this->pfad  = $pfad;
  }
  
  public function getPfad() {
  	return $this->pfad;
  }
  
  public function getErsteJpgDatei() {
    $jpg = "";
  	if ($hebel = opendir($this->pfad)) { // Ref http://php.net/manual/de/function.readdir.php, Beispiel 2
  		while ($inhalt = readdir($hebel)) {
  			if ($this->isJpg($inhalt)) {
  			  $jpg = $inhalt;
  				break;
  			}
  		}
  		closedir($hebel);
  	}
  	return $jpg;
  } //getInhalt
  
  public function getInhalt() {
  	$inhaltListe = array();
  	if ($hebel = opendir($this->pfad)) { // Ref http://php.net/manual/de/function.readdir.php, Beispiel 2
  		while ($inhalt = readdir($hebel)) {
  			if ($inhalt != "." && $inhalt != ".." ) {
  				array_push($inhaltListe, $inhalt);
  			} 
  		} 
  		closedir($hebel);
  	} 
  	return $inhaltListe;
  } //getInhalt
  
  
  public function debug() {
  	return;
  	echo "pfad "  . $this->pfad   . "<br/>";
  	echo "";
  }
  
  
}


?>
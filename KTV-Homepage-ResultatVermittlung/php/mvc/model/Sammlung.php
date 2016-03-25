<?php

class Sammlung {
	
	private $galerieList;
	private $sammlungRoot;
	private $sammlungRootName;
	private $sammlungName;
	
	public function __construct($sammlungPfad, $sammlungRootName) {
		$this->galerieList      = array();
  	$this->sammlungName     = substr($sammlungRootName, 4);
  	$this->sammlungRootName = $sammlungRootName;
  	$this->sammlungRoot     = new Verzeichnis($sammlungPfad . '/' . $sammlungRootName);
		foreach ($this->sammlungRoot->getInhalt() as $galeriePathName) {
			array_push($this->galerieList, new Galerie($sammlungRootName, $galeriePathName));
		}
	}
	
	public function getSammlungName()  {
		return $this->sammlungName;
	}

	public function getSammlungRootName()  {
		return $this->sammlungRootName;
	}
	
	public function getGalerieList() {
		return $this->galerieList;
	}


	public function debug() {
		echo "sammlungRootName " . $this->sammlungRootName       . "<br>";
		echo "sammlungName "     . $this->sammlungName           . "<br>";
	}
	
	
}

?>
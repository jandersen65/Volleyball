<?php

class Galerie {

	private $galerieName;
	private $galeriePath;
	private $bildPath;
	private $bild;
	
	public function __construct($sammlungRootName, $galeriePathName) {
	  $this->galerieName    = substr($galeriePathName, 4);
		$this->galeriePath    = $sammlungRootName  . "/" . $galeriePathName;
		$this->bildPath       = $this->galeriePath . "/" . "images";
		$tmp = new Verzeichnis(GALERIEN_PHP_HOME . '/' . $this->bildPath);
		$this->bild = $tmp->getErsteJpgDatei();
	}

	public function getBildPath() {
		return $this->bildPath;
	}
	
	public function getWebPathBild() {
		return GALERIEN_WEB_HOME . '/' . $this->galeriePath . "/" . "images" . "/" . $this->bild;
	}

	public function getWebPath() {
		return GALERIEN_WEB_HOME . '/' . $this->galeriePath;
	}
	

	
	public function getGaleriePath() {
		return $this->galeriePath;
	}

	public function getGalerieName() {
		return $this->galerieName;
	}
	
	
	public function debug() {
		echo "galeriePath "   . $this->galeriePath   . "<br/>";
		echo "galerieName "   . $this->galerieName   . "<br/>";
	}
	
}

?>
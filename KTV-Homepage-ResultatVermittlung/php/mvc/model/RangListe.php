<?php
class RangListe {
	
	private $gruppeName;
	private $rangListe;

	public function __construct() {
		$this->rangListe = array();
	}

	public function neuerRang($rang) {
		array_push($this->rangListe, $rang);
	} // neuerRang
	
	public function getRangListe() {
		return $this->rangListe;
	}

	public function setGruppeName($gruppeName) {
		$this->gruppeName = $gruppeName;
	}
	
	public function getGruppeName() {
		return $this->gruppeName;
	}
}

?>
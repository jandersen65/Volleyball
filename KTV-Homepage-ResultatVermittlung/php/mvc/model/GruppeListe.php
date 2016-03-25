<?php
class GruppeListe {

	private $gruppeListe;
	
	function __construct() {
    $this->gruppeListe = array();
	}

	public function addGruppe(Gruppe $gruppe) {
		if (is_null($this->getGruppe($gruppe->getGruppeNo()))) {
		  array_push($this->gruppeListe, $gruppe);
		}
		return $this;
	}
	
	public function getGruppen() {
		return $this->gruppeListe;
	} 
	
	public function getGruppe($gruppeNo)  {
		foreach($this->gruppeListe as $gruppe) {
			if (strcmp($gruppe->getGruppeNo(), $gruppeNo) == 0) {
				return $gruppe;
			}
		}
		return null;
	}
	

	private function compare(Gruppe $g1, Gruppe $g2) {
		// Cup zuletzt
		if (!$g1->isCup() && $g2->isCup()) {
			return -1;
		}
		if ($g1->isCup() && !$g2->isCup()) {
			return 1;
		}
		$name1 = $g1->getGruppeName();
		$name2 = $g2->getGruppeName();

		
		// Etwas mit Qual kommt nach Nicht-Qual
		$qual1 = !(stristr($name1, "qual") === FALSE);
		$qual2 = !(stristr($name1, "qual") === FALSE);
		if ($qual1) return  1;
		if ($qual2) return -1;
		
		// Etwas mit Final kommt vor Qual
		$fin1 = !(stristr($name1, "final") === FALSE);
		$fin2 = !(stristr($name1, "final") === FALSE);
		if ($fin1) return -1;
		if ($fin2) return  1;

		if ($g1->isCup() && $g2->isCup()) {
			return strcmp($name2, $name1);
		}
		
		return strcmp($name1, $name2);
	}
	
	public function sort() {
		uasort($this->gruppeListe, array($this, "compare"));
	}
	
}

?>
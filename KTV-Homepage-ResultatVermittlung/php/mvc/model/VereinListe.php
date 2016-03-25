<?php
class VereinListe {

	private $vereinListe;
	
	function __construct() {
    $this->vereinListe = array();
	}

	public function addVerein(Verein $verein) {
		
		$tmp = $this->getVerein($verein->getRegionalVereinNo(), $verein->getNationalVereinNo());

		if (is_null($tmp)) {
		  array_push($this->vereinListe, $verein);
		}
		
		return $this;
	}
	
	public function getVereine() {
		return $this->vereinListe;
	} 
	
	public function getVerein($regionalVereinNo, $nationalVereinNo = null)  {
		foreach($this->vereinListe as $verein) {
			if (strlen($regionalVereinNo) > 0 && strcmp($verein->getRegionalVereinNo(), $regionalVereinNo) == 0) { 
				return $verein;
			}
			if (strlen($nationalVereinNo) > 0 && strcmp($verein->getNationalVereinNo(), $nationalVereinNo) == 0) { 
			  return $verein;
			}
		}
		return null;
	}
	
}

?>
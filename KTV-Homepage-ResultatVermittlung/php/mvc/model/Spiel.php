<?php

class Spiel {
	
	private $spielNo;
	private $datum;
	private $gruppenNo;
	private $gruppenName;
	private $gruppenNameKurz;
	private $halle;
	private $halleAdresse;
	private $heimTeamNo;
	private $auswTeamNo;
	private $heimTeamName;
	private $auswTeamName;
	private $heimTeamSaetze;
	private $auswTeamSaetze;
	private $heimTeamSaetzPunkte1;
	private $auswTeamSaetzPunkte1;
	private $heimTeamSaetzPunkte2;
	private $auswTeamSaetzPunkte2;
	private $heimTeamSaetzPunkte3;
	private $auswTeamSaetzPunkte3;
	private $heimTeamSaetzPunkte4;
	private $auswTeamSaetzPunkte4;
	private $heimTeamSaetzPunkte5;
	private $auswTeamSaetzPunkte5;


	private $wochenTage;

	function __construct(
			$verband,
			$spielNo,
			$datum,
			$zeit,
			$gruppenNo,
			$gruppenName,
			$halle,
			$halleAdresse,
			$heimTeamNo,
			$auswTeamNo,
			$heimTeamName,
			$auswTeamName,
			$heimTeamSaetze,
			$auswTeamSaetze,
			$heimTeamSaetzPunkte1,
			$auswTeamSaetzPunkte1,
			$heimTeamSaetzPunkte2,
			$auswTeamSaetzPunkte2,
			$heimTeamSaetzPunkte3,
			$auswTeamSaetzPunkte3,
			$heimTeamSaetzPunkte4,
			$auswTeamSaetzPunkte4,
			$heimTeamSaetzPunkte5,
			$auswTeamSaetzPunkte5) {
		$this->verband                   = $verband;
		$this->spielNo                   = $spielNo;
		$this->datum                     = "";
		$this->gruppenNo                 = $gruppenNo;
		$this->gruppenName               = $gruppenName;
		$this->halle                     = $halle;
		$this->halleAdresse              = $halleAdresse;
		$this->heimTeamNo                = $heimTeamNo;
		$this->auswTeamNo                = $auswTeamNo;
		$this->heimTeamName              = $heimTeamName;
		$this->auswTeamName              = $auswTeamName;
		$this->heimTeamSaetze            = $heimTeamSaetze;
		$this->auswTeamSaetze            = $auswTeamSaetze;
		$this->heimTeamSaetzPunkte1      = $heimTeamSaetzPunkte1;
		$this->auswTeamSaetzPunkte1      = $auswTeamSaetzPunkte1;
		$this->heimTeamSaetzPunkte2      = $heimTeamSaetzPunkte2;
		$this->auswTeamSaetzPunkte2      = $auswTeamSaetzPunkte2;
		$this->heimTeamSaetzPunkte3      = $heimTeamSaetzPunkte3;
		$this->auswTeamSaetzPunkte3      = $auswTeamSaetzPunkte3;
		$this->heimTeamSaetzPunkte4      = $heimTeamSaetzPunkte4;
		$this->auswTeamSaetzPunkte4      = $auswTeamSaetzPunkte4;
		$this->heimTeamSaetzPunkte5      = $heimTeamSaetzPunkte5;
		$this->auswTeamSaetzPunkte5      = $auswTeamSaetzPunkte5;
		
		$this->wochenTage = array("1" => "Mo",
															"2" => "Di",
															"3" => "Mi",
															"4" => "Do",
															"5" => "Fr",
															"6" => "Sa",
															"7" => "So");
		
		if (isset($datum) && (strlen($datum) > 0)) {
			$this->datum = date_create_from_format('Y-m-d H:i:s', $datum . " " . $zeit);
			if (!$this->datum) {
				$this->datum = date_create_from_format('Y-m-d H:i', $datum . " " . $zeit);
			}
			if (!$this->datum) {
				$this->datum = date_create_from_format('d.m.Y H:i', $datum . " " . $zeit);
			}
	  }
	  else {
	  	$this->datum = "";
	  }
	  
	} // __construct

	public function getVerband() {
		return $this->verband;
	}
	
	public function getSpielNo() {
		return $this->spielNo;
	}
	
	public function getDatum() {
		return $this->datum;
	}

	public function getSpielDatum() {
		
		if (is_string($this->datum)) {
			return "";
		}

		if (!isset($this->datum)) {
			return "";
		}
		
		$wochenTag = $this->wochenTage[$this->datum->format('N')];
		
		$festgelegt = true;
		if (strcmp($this->datum->format('H'), "00") == 0) {
			$festgelegt = false;
		}
		 
		return (!$festgelegt ? "(" : "")
		     . $wochenTag . " " . $this->datum->format('d.m H:i')
		     . (!$festgelegt ? ")" : "");
	}
	
	public function getHeimTeamNo() {
		return $this->heimTeamNo;
	}
	
	public function getAuswTeamNo() {
		return $this->auswTeamNo;
	}
	
	public function getHeimTeamName() {
		return $this->heimTeamName;
	}

	private function kurzName($name) {
		if (strlen($name) > 20) {
			return substr($name, 0, 15) . "...";
		}
		return $name;
	}
	
	public function getHeimTeamNameKurz() {
		return $this->kurzName($this->heimTeamName);
	}
	
	public function getAuswTeamNameKurz() {
		return $this->kurzName($this->auswTeamName);
	}

	public function getGruppenName() {
		return $this->gruppenName;
	}

	public function getGruppenNo() {
		return $this->gruppenNo;
	}
	
	public function isGespielt() {
		return $this->heimTeamSaetze + $this->auswTeamSaetze > 0 ;
	}
	
	public function getSaetzePunkte() {
		
	  $res =   "(" . $this->heimTeamSaetzPunkte1 . ":" . $this->auswTeamSaetzPunkte1
				    . ", " . $this->heimTeamSaetzPunkte2 . ":" . $this->auswTeamSaetzPunkte2;

	  if ($this->heimTeamSaetzPunkte3 + $this->auswTeamSaetzPunkte3 > 0) {
	  	$res .=  ", " .  $this->heimTeamSaetzPunkte3 . ":" . $this->auswTeamSaetzPunkte3;
	  }
	  
		if ($this->heimTeamSaetzPunkte4 + $this->auswTeamSaetzPunkte4 > 0) {
			$res .=  ", " .  $this->heimTeamSaetzPunkte4 . ":" . $this->auswTeamSaetzPunkte4;
		}
		
		if ($this->heimTeamSaetzPunkte5 + $this->auswTeamSaetzPunkte5 > 0) {
			$res .=  ", " .  $this->heimTeamSaetzPunkte5 . ":" . $this->auswTeamSaetzPunkte5;
		}
		
		$res  .=  ")" ;
		return $res;
	}

	public function getHeimSaetzePunkte() {
	
		$res =   "("  . ($this->heimTeamSaetzPunkte1  < 10 ? "&nbsp;&nbsp;" : "") . $this->heimTeamSaetzPunkte1
		       . ", " . ($this->heimTeamSaetzPunkte2  < 10 ? "&nbsp;&nbsp;" : "") . $this->heimTeamSaetzPunkte2;
	
		if ($this->heimTeamSaetzPunkte3 + $this->auswTeamSaetzPunkte3 > 0) {
			$res .=  ", " .  ($this->heimTeamSaetzPunkte3  < 10 ? "&nbsp;&nbsp;" : "") . $this->heimTeamSaetzPunkte3;
		}
		 
		if ($this->heimTeamSaetzPunkte4 + $this->auswTeamSaetzPunkte4 > 0) {
			$res .=  ", "  .  ($this->heimTeamSaetzPunkte4  < 10 ? "&nbsp;&nbsp;" : "") . $this->heimTeamSaetzPunkte4;
		}
	
		if ($this->heimTeamSaetzPunkte5 + $this->auswTeamSaetzPunkte5 > 0) {
			$res .=  ", "  .  ($this->heimTeamSaetzPunkte5  < 10 ? "&nbsp;&nbsp;" : "") . $this->heimTeamSaetzPunkte5;
		}
	
		$res  .=  ")" ;
		return $res;
	}
	

	public function getAuswSaetzePunkte() {
	
		$res =   "("  . ($this->auswTeamSaetzPunkte1  < 10 ? "&nbsp;&nbsp;" : "") . $this->auswTeamSaetzPunkte1
		       . ", " . ($this->auswTeamSaetzPunkte2  < 10 ? "&nbsp;&nbsp;" : "") . $this->auswTeamSaetzPunkte2;
	
		if ($this->heimTeamSaetzPunkte3 + $this->auswTeamSaetzPunkte3 > 0) {
			$res .=  ", " .  ($this->auswTeamSaetzPunkte3  < 10 ? "&nbsp;&nbsp;" : "") . $this->auswTeamSaetzPunkte3;
		}
		 
		if ($this->heimTeamSaetzPunkte4 + $this->auswTeamSaetzPunkte4 > 0) {
			$res .=  ", "  .  ($this->auswTeamSaetzPunkte4  < 10 ? "&nbsp;&nbsp;" : "") . $this->auswTeamSaetzPunkte4;
		}
	
		if ($this->heimTeamSaetzPunkte5 + $this->auswTeamSaetzPunkte5 > 0) {
			$res .=  ", "  .  ($this->auswTeamSaetzPunkte5  < 10 ? "&nbsp;&nbsp;" : "") . $this->auswTeamSaetzPunkte5;
		}
	
		$res  .=  ")" ;
		return $res;
	
	
	}
	
	
	public function getResultat() {
		$res = $this->heimTeamSaetze . ":" . $this->auswTeamSaetze . " " . $this->getSaetzePunkte();
		return $res;
	}
	
	

	public function getHeimTeamSaetze() {
		return $this->heimTeamSaetze;
	}
	
	public function getHeimTeamSaetzPunkte1() {
		return $this->heimTeamSaetzPunkte1 > 0 ? $this->heimTeamSaetzPunkte1 : "";
	}

	public function getHeimTeamSaetzPunkte2() {
		return $this->heimTeamSaetzPunkte2 > 0 ? $this->heimTeamSaetzPunkte2 : "";
	}

	public function getHeimTeamSaetzPunkte3() {
		return $this->heimTeamSaetzPunkte3 > 0 ? $this->heimTeamSaetzPunkte3 : "";
	}

	public function getHeimTeamSaetzPunkte4() {
		return $this->heimTeamSaetzPunkte4 > 0 ? $this->heimTeamSaetzPunkte4 : "";
	}

	public function getHeimTeamSaetzPunkte5() {
		return $this->heimTeamSaetzPunkte5 > 0 ? $this->heimTeamSaetzPunkte4 : "";
	}

	public function getAuswTeamSaetze() {
		return $this->auswTeamSaetze;
	}
	
	public function getAuswTeamSaetzPunkte1() {
		return $this->auswTeamSaetzPunkte1 ? $this->auswTeamSaetzPunkte1 : "";
	}
	
	public function getAuswTeamSaetzPunkte2() {
		return $this->auswTeamSaetzPunkte2 ? $this->auswTeamSaetzPunkte2 : "";
	}
	
	public function getAuswTeamSaetzPunkte3() {
		return $this->auswTeamSaetzPunkte3 ? $this->auswTeamSaetzPunkte3 : "";
	}
	
	public function getAuswTeamSaetzPunkte4() {
		return $this->auswTeamSaetzPunkte4 ? $this->auswTeamSaetzPunkte4 : "";
	}
	
	public function getAuswTeamSaetzPunkte5() {
		return $this->auswTeamSaetzPunkte5 ? $this->auswTeamSaetzPunkte5 : "";
	}
	
	public function getHalle() {
		return $this->halle;
	}

	public function getHalleAdresse() {
		return $this->halleAdresse;
	}
	
} // Spiel

?>
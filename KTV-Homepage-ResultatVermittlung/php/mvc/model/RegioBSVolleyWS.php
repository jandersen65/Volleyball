<?php

  
  class RegioBSVolleyWS {

  	private $client;
  	
  	private function connect($wsdlFile) {
  		try {
  			if ($this->client === NULL) {
  			  $this->client = new SOAPClient($wsdlFile, array('exceptions' => true)) ;
  			}
  		}
  		catch (Exception $e) {
  			echo "Tut uns Leid, aber ein Technisches Problem ist aufgetreten, die Daten konnten nicht bei VolleyBasel abgeholt werden.";
  		}
  	} // connect

  	private function formatGroup($groupName) {
  		$tmp = str_replace("Junioren ", "",   $groupName);
  		$tmp = str_replace("Damen",     "D.", $tmp);
  		$tmp = str_replace("Herren",    "H.", $tmp);
  		return $tmp;
  	}

  	private function getResultatList($args) {
  		
  		$spielListe = new SpielListe();
  		
  		$this->connect(VBS_WSDL);
  		$spieleXML = $this->client->__soapCall ("vbRequest", array($args));
  			
  		$spiele = simplexml_load_string($spieleXML);
  		
  		foreach ($spiele as $tmp) {
  		
  			$spiel =  new Spiel("2",  // regional
								  					(String)$tmp->spielNo,
								  					(String)$tmp->datum,
								  					(String)$tmp->uhrzeit,
								  					(String)$tmp->gruppeNo,
								  					$this->formatGroup((String)$tmp->gruppeName),
								  					(String)$tmp->halle,
								  					(String)$tmp->halleAdresse,
								  					(String)$tmp->teamNoHeim,
								  					(String)$tmp->teamNoGast,
								  					(String)$tmp->teamNameHeim,
								  					(String)$tmp->teamNameGast,
								  					(String)$tmp->matchHeim,
								  					(String)$tmp->matchGast,
								  					(String)$tmp->satz1Heim,
								  					(String)$tmp->satz1Gast,
								  					(String)$tmp->satz2Heim,
								  					(String)$tmp->satz2Gast,
								  					(String)$tmp->satz3Heim,
								  					(String)$tmp->satz3Gast,
								  					(String)$tmp->satz4Heim,
								  					(String)$tmp->satz4Gast,
								  					(String)$tmp->satz5Heim,
								  					(String)$tmp->satz5Gast);
  			$spielListe->addSpiel($spiel);
  		}
  		
  		return $spielListe;
  	}  
  	
  	public function getSpieleHeute($datumAb, $datumBis) {
  		$args = array('need'      => 'resultatList',
					  				'output'    => 'xml',
					  				'regional'  => 'Y',
					  				'noPlausch' => 'Y',
					  				'datumVon'  => $datumAb,
					  				'datumBis'  => $datumBis);
  		return $this->getResultatList($args);
  	}

  	public function getAktuelleSpieleVerein($vereinNo, $datumAb, $datumBis) {
  		
  		$args = array('need'      => 'resultatList',
					  				'output'    => 'xml',
					  				'vereinNo'  => $vereinNo,
					  				'regional'    => 'Y',
					  				'noPlausch'   => 'Y',
					  				'datumVon'  => $datumAb,
					  				'datumBis'  => $datumBis);
  		
  		return $this->getResultatList($args);
  	} //getAktuelleSpiele
  	
  	
  	public function getAktuelleSpiele($datumAb, $datumBis) {
  	
  		$args = array('need'      => 'resultatList',
	                  'output'    => 'xml',
  				          'vereinNo'  => KTVRIEHEN_CLUB_NO_BS,
										'regional'    => 'Y',
										'noPlausch'   => 'Y',
  				          'datumVon'  => $datumAb,
  				          'datumBis'  => $datumBis);
  		
  		return $this->getResultatList($args);
  		
  	} //getAktuelleSpiele
  	
  	
  	public function getSpieleTeamGruppe($teamNo, $gruppeNo) {
  		
  		$args = array('need'      => 'resultatList',
	                  'output'    => 'xml',
  				          'teamNo'    => $teamNo,
  				          'gruppeNo'  => $gruppeNo);
  		
  		return $this->getResultatList($args);
  	}
  	
  	
  	public function getTeamSpiele($teamNo) {
  		 
  		$args = array('need'      => 'resultatList',
	                  'output'    => 'xml',
  				          'teamNo'    => $teamNo);
  		
  		return $this->getResultatList($args);
  		
  	} //getTeamSpiele
  	
  	
  	public function getRangListe($gruppe) {
  	
  		$args = array("need"      => "rangliste",
	                  'output'    => 'xml',
  				          "gruppeNo"  => $gruppe);

  		$this->connect(VBS_WSDL);
  		$tabelleXML = $this->client->__soapCall ("vbRequest", array($args));

  		$rangListe = new RangListe();
  		
  		$tabelle = simplexml_load_string($tabelleXML);
  		$pos=1;
  		foreach ($tabelle->gruppe[0]->rangliste[0] as $tmp) {
  			$rang  = new Rang($pos++,
					                 "2", // regional
							  					(String)$tmp->teamNo,
							  					(String)$tmp->teamName,
							  					(String)$tmp->spiele,
							  					(String)$tmp->punkteS,
							  					(String)$tmp->saetzeS,
							  					(String)$tmp->saetzeN,
							  					(String)$tmp->spielPunkteS,
							  					(String)$tmp->spielPunkteN);
  			$rangListe->neuerRang($rang);
  		}
  		
  		return $rangListe;
  	} // getRangListe
  	
  	


  	public function naechsteGruppenSpiele($gruppe, $datumAb, $datumBis) {
  		
  		$args = array('need'      => 'resultatList',
	                  'output'    => 'xml',
  				          'datumVon'  => $datumAb,
  				          'datumBis'  => $datumBis,
					  				'gruppeNo'  => $gruppe);

  		return $this->getResultatList($args);
  		
  	}
  	
  	public function getTeam($teamNo) {
  	
  		$conf = new KHR_Conf();
  		$teamRec = $conf->getRegionaleTeamRec($teamNo);
  	
  		$verein = new Verein($teamRec["vereinName"], null, $teamRec["vereinNo"]);
  		$team = new Team($conf::REGIONAL, $verein, $teamNo, $teamRec["teamName"], $teamRec["liga"]);
  	
  		$args = array("need"      => "resultatList",
	                  'output'    => 'xml',
  				          "teamNo"    => $teamNo);
  		
  	  $this->connect(VBS_WSDL);
  	 	$spieleXML = $this->client->__soapCall ("vbRequest", array($args));  	 	
  		$spiele = simplexml_load_string($spieleXML);
  	
  		foreach($spiele as $tmp) {
  			
  			$gruppe = new Gruppe($team, 
  					                 (String)$tmp->ligaNo,
  	 	                       (String)$tmp->ligaName,
  	 	                       (String)$tmp->gruppeNo,
  	 	                       (String)$tmp->gruppeName);
  			$team->addGruppe($gruppe);
  				
  			$spiel  = new Spiel("2",  // regional
  			                    (String)$tmp->spielNo,
								  					(String)$tmp->datum,
								  					(String)$tmp->uhrzeit,
								  					(String)$tmp->gruppeNo,
								  					$this->formatGroup((String)$tmp->gruppeName),
								  					(String)$tmp->halle,
								  					(String)$tmp->halleAdresse,
								  					(String)$tmp->teamNoHeim,
								  					(String)$tmp->teamNoGast,
								  					(String)$tmp->teamNameHeim,
								  					(String)$tmp->teamNameGast,
								  					(String)$tmp->matchHeim,
								  					(String)$tmp->matchGast,
								  					(String)$tmp->satz1Heim,
								  					(String)$tmp->satz1Gast,
								  					(String)$tmp->satz2Heim,
								  					(String)$tmp->satz2Gast,
								  					(String)$tmp->satz3Heim,
								  					(String)$tmp->satz3Gast,
								  					(String)$tmp->satz4Heim,
								  					(String)$tmp->satz4Gast,
								  					(String)$tmp->satz5Heim,
								  					(String)$tmp->satz5Gast);
			$team->getGruppe((String)$tmp->gruppeNo)->addSpiel($spiel);
  		}

  		foreach ($team->getGruppen()->getGruppen() as $gruppe) {
    		$args = array("need"      => "rangliste",
	                    'output'    => 'xml',
  		  		          "gruppeNo"  => $gruppe->getGruppeNo());
   		  $tabelleXML = $this->client->__soapCall ("vbRequest", array($args));
  		  $rangListe = new RangListe();
	  		$tabelle = simplexml_load_string($tabelleXML);
	  		$pos=1;
	  		foreach ($tabelle->gruppe[0]->rangliste[0] as $tmp) {
	  			$rang  = new Rang($pos++,
					                  "2", // regional
								  					(String)$tmp->teamNo,
								  					(String)$tmp->teamName,
								  					(String)$tmp->spiele,
								  					(String)$tmp->punkteS,
								  					(String)$tmp->saetzeS,
								  					(String)$tmp->saetzeN,
								  					(String)$tmp->spielPunkteS,
								  					(String)$tmp->spielPunkteN);
	  			$rangListe->neuerRang($rang);
  			}
  	    $gruppe->setRangListe($rangListe);
  	  }
  			
  		return $team;
  	}
  	
  } // RegioBSVolleyWS

?>
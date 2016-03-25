<?php
  interface IDataService {
  	public function getTeamSpiele($teamNo);
  	public function getRangListe($gruppe);
  	public function naechsteGruppenSpiele($gruppe);
  	public function getAktuelleSpiele();
  	public function getAktuelleSpieleVerein($vereinNo);
  	public function getSpieleHeute($offset);
  	public function getMannschaften();
  	public function getTeamsVerein($vereinNo);
  }
?>
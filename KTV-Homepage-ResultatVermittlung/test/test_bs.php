


<?php



require_once("php/lib/khr_lib.php");
require_once("php/lib/khr_conf.php");
require_once("php/mvc/model/Spiel.php");
require_once("php/mvc/model/SpielListe.php");
require_once("php/mvc/model/Gruppe.php");
require_once("php/mvc/model/GruppeListe.php");
require_once("php/mvc/model/Team.php");
require_once("php/mvc/model/TeamListe.php");
require_once("php/mvc/model/Verein.php");
require_once("php/mvc/model/VereinListe.php");

function printVars($item, $key) {
	echo ".  " . str_pad($key, 30) . " " . htmlentities($item);
	echo "</br>";
}

function printResponse($item, $key) {
	echo $key;
	echo "</br>";
	array_walk($item, "printVars");
}

function format($response){
  print "<pre>";
  array_walk($response, "printResponse");
  print "</pre>";
}

function wscall($req) {
	$wsdl = 'http://www.mabest.net/VBVB/vbvb.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->__soapCall ("vbRequest", array($req));
	return $response;
	//return $response;
}


$teamList = array(
		"need"         => "vereinList",
		'output'       => "xml",
		'hasNoVerband' => "Y",
		'detail'       => "teamList,ligaList");


function calcTeamName($teamName, 
	      			        $vereinName, 
	      			        $ligaUID, 
	      			        $ligaName,
                      $vereinNo,
                      $teamNo,
                      $ligaNo) {
  $search = array($vereinName, "\\", " ");
	echo "<code>";
	echo "teamName   " . $teamName   . "<br/>" .
	     "vereinName " . $vereinName . "<br/>" .
	     "ligaUID    " . $ligaUID    . "<br/>" .
	     "ligaName   " . $ligaName   . "<br/>" .
	     "vereinNo   " . $vereinNo   . "<br/>" .
	     "teamNo     " . $teamNo     . "<br/>" .
	     "ligaNo     " . $ligaNo     . "<br/>" ;
	$rep = trim(str_replace ($search , "", $teamName));
	$calcName = trim(str_replace(" ", "-", $ligaUID))
	            . (strcmp($rep, "") == 0 ? "" : " (" . $rep .")");
	echo "calc team "  . $calcName ;
	echo "<br/>";
	echo "</code>";
	echo "<br/>";
}

$req=$teamList;
$response = simplexml_load_string(wscall($req));
$search = array("2L D", "3L D", "4L D", "5L D", "U23 D", "U19 D", "U17 D", "U15 D",
                "2L H", "3L H", "4L H", "5L H", "U23 H", "U19 H", "U17 H", "U15 H");
foreach ($response as $verein) {
	  // array(teamNo=>"25664", teamName=>"#Dragons Lugano", liga=>"NLA-H", vereinNo=>915140, vereinName=>"PV Lugano")
	  //echo "vereinNo   " . 	  	(String)$verein->vereinNo;
	  //echo "vereinName " . 	  	(String)$verein->vereinName;
	  //var_dump($verein);
	  echo "<br/> ";
    foreach ($verein->teamList->team as $team) {
    	if (count($team->ligaList->liga) > 0)
		  //echo ".  teamNo     " . 	  	(String)$team->teamNo;
		  //echo ".  teamName   " . 	  	(String)$team->teamName;
		  //echo "<br/>";
      foreach ($team->ligaList->liga as $liga) {
			  if (in_array((String)$liga->ligaUID, $search)) {
	      	//echo ". . " . (String)$liga->ligaNo;
	      	//echo ". . " . (String)$liga->ligaUID;
	      	//echo ". . " . (String)$liga->ligaName;
	      	//echo "<br/> ";
	      	calcTeamName((String)$team->teamName, 
	      			         (String)$verein->vereinName, 
	      			         (String)$liga->ligaUID, 
	      			         (String)$liga->ligaName,
                       (String)$verein->vereinNo,
                       (String)$team->teamNo,
                       (String)$liga->ligaNo);
	      }
      }
    }
	  echo "<br/> ";
	  		/*
	  		ligaList -> liga -> ligaNo
	  		ligaList -> liga -> ligaUID
	  		ligaList -> liga -> ligaUID
	  		ligaName
	  		*/
}
return;


$resultatList = array(
		"need"      => "resultatList",
		'output'    => 'xml',
		'hasSpiele'   => 'Y',
		'regional'    => 'Y',
		'noPlausch'   => 'Y',
    //'vereinNo'    => '1036',
		//"gruppeNo"  => '1009',
		"datumVon" => "01.11.2015",
		"datumBis" => "16.11.2015" );

$req=$resultatList;
$response = simplexml_load_string(wscall($req));
print_r($response);
return;

$vereinListe = new VereinListe();

foreach ($response->resultat as $tmp) {
	
	$heimVerein = new Verein((String)$tmp->vereinNameHeim, (String)$tmp->vereinNoHeim, (String)$tmp->vereinNoHeim);
	$gastVerein = new Verein((String)$tmp->vereinNameGast, (String)$tmp->vereinNoGast, (String)$tmp->vereinNoGast);

	$vereinListe->addVerein($heimVerein);
	$vereinListe->addVerein($gastVerein);
	
	$heimTeam   = new Team("R", $heimVerein, (String)$tmp->teamNoHeim, (String)$tmp->teamNameHeim);
	$gastTeam   = new Team("R", $gastVerein, (String)$tmp->teamNoGast, (String)$tmp->teamNameGast);
	
	$heimGruppe = new Gruppe($heimTeam, (String)$tmp->ligaNo, (String)$tmp->ligaName, (String)$tmp->gruppeNo, (String)$tmp->gruppeName);
	$gastGruppe = new Gruppe($gastTeam, (String)$tmp->ligaNo, (String)$tmp->ligaName, (String)$tmp->gruppeNo, (String)$tmp->gruppeName);

	$spiel      = new Spiel((String)$tmp->spielNo,
													(String)$tmp->datum,
													(String)$tmp->uhrzeit,
													(String)$tmp->gruppeNo,
													(String)$tmp->gruppeName,
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

	$vereinListe->getVerein($tmp->vereinNoHeim)
	                        ->addTeam($heimTeam)->getTeam($heimTeam->getTeamNo())
	                        ->addGruppe($heimGruppe)->getGruppe($heimGruppe->getGruppeNo())
	                        ->addSpiel($spiel);
	$vereinListe->getVerein($tmp->vereinNoGast)
	                        ->addTeam($gastTeam)->getTeam($gastTeam->getTeamNo())
	                        ->addGruppe($gastGruppe)->getGruppe($gastGruppe->getGruppeNo())
	                        ->addSpiel($spiel);
	
	
}

foreach($vereinListe->getVereine() as $verein) {
	echo "Verein " . $verein->getRegionalVereinNo() . " " . $verein->getVereinName() . "</br>";
	foreach($verein->getTeamListe()->getTeams() as $team) {
		echo ".  Team " . $team->getTeamNo(). " " . $team->getTeamName() . "</br>";
		foreach($team->getGruppen()->getGruppen() as $gruppe) {
			echo ". . Gruppe " . $gruppe->getGruppeNo() . " " . $gruppe->getGruppeName() . "</br>";
		  foreach($gruppe->getSpiele()->getSpiele() as $spiel) {
			  echo ". . . Spiel " . $spiel->getSpielNo() . "</br>";
		  }
		}
	}
} 

return;


$verein1 = new Verein("V1", 1, 11);
$verein2 = new Verein("V2", 2, 22);
$verein3 = new Verein("V3", 2, 22);
$vereinListe = new VereinListe();
$vereinListe->addVerein($verein1);
$vereinListe->addVerein($verein3);
$vereinListe->addVerein($verein3);

//print_r($vereinListe);


$team1 = new Team($verein1, 1, "Team 1");
$team2 = new Team($verein2, 2, "Team 2");
$team3 = new Team($verein2, 1, "Team 1");

$teamListe = new teamListe();
$teamListe->addTeam($team1);
$teamListe->addTeam($team2);
$teamListe->addTeam($team3);

print_r($teamListe);

?>
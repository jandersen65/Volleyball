


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
	echo ".  " . str_pad($key, 30) . " " . $item;
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

$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
$client = new SoapClient($wsdl);
function gamesByClub($vereinNo) {
  global $client;
	$response = $client->getGamesByClub($vereinNo); //getGamesByClubRequest // 909740 Therwil
	return $response;
}

function gamesTeamDetailed($teamId) {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getTeamDetailed($teamId);
	return $response;
}

function getActiveClubs() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getActiveClubs("NATIONAL");
	return $response;
}

/*
$a = array(-1 => null,907005 => "Aarberg Volero"
,913175 => "Appenzeller Bären"
,903140 => "AVGF Massongex"
,912505 => "Wädivolley"
);

var_dump($a);
echo $a[913175];
return;
*/

$conf = new KHR_Conf();
print_r($conf->getNationaleVereine());
return;


echo 'array(-1 => null';
foreach (getActiveClubs() as $verein) {
	echo ',' . $verein->ID_club               . ' => '  
		.  '"' . htmlentities($verein->Caption) . '"' . "<br/>";
}
echo ");";
return;
//var_dump(gamesByClub());
//$vereinName = "Therwil";
//format(gamesByClub());
//return;

function formatGroupName($league,
		$gender,
		$mode,
		$group) {
	$tmpGroup = strcmp($league, "Volley Cup") == 0 ? "" : $group;
	return (strcmp($gender, "f")                   == 0 ? "D."   : "H.")  . " " .
			(strcmp($league, "1L")                  == 0 ? "1. Liga" : $league)   . " " .
			//(strcmp($mode,   "Qualifikationsrunde") == 0 ? "Qual."   : $mode)     . " " .
	$tmpGroup;
}

$vereinListe = new VereinListe();

$vereinNo   = "909610"; //"909740";
foreach (gamesByClub($vereinNo) as $tmp) {
	
	$tmpHeimTeam = gamesTeamDetailed($tmp->TeamHomeID);
	$tmpGastTeam = gamesTeamDetailed($tmp->TeamAwayID);
	
	$heimVerein = new Verein($tmpHeimTeam->ClubCaption , $tmpHeimTeam->club_ID, null);
	$gastVerein = new Verein($tmpGastTeam->ClubCaption , $tmpGastTeam->club_ID, null);

	$vereinListe->addVerein($heimVerein);
	$vereinListe->addVerein($gastVerein);
	
	$heimTeam   = new Team("N", $heimVerein, $tmp->TeamHomeID, $tmpHeimTeam->Caption);
	$gastTeam   = new Team("N", $gastVerein, $tmp->TeamAwayID, $tmpGastTeam->Caption);
	
	$heimGruppe = new Gruppe($heimTeam, $tmp->league_ID, $tmp->LeagueCatCaption . $tmp->Gender, $tmp->group_ID, $tmp->GroupCaption);
	$gastGruppe = new Gruppe($gastTeam, $tmp->league_ID, $tmp->LeagueCatCaption . $tmp->Gender, $tmp->group_ID, $tmp->GroupCaption);

	$spiel      = new Spiel($tmp->ID_game,
													getSVDatum($tmp->PlayDate),
													getSVZeit($tmp->PlayDate), //$tmp->Anspielzeit,
													$tmp->group_ID,
					                formatGroupName($tmp->LeagueCatCaption,    
																					       $tmp->Gender,
																                 $tmp->ModeCaption,
																                 $tmp->GroupCaption),   //gruppe
													$tmp->HallCaption,
													null, //$this->getSVHallAdr($tmp->hall_ID),
													$tmp->TeamHomeID,
													$tmp->TeamAwayID,
													$tmp->TeamHomeCaption,
													$tmp->TeamAwayCaption,
													$tmp->NumberOfWinsHome,
													$tmp->NumberOfWinsAway,
													$tmp->Set1PointsHome,
													$tmp->Set1PointsAway,
													$tmp->Set2PointsHome,
													$tmp->Set2PointsAway,
													$tmp->Set3PointsHome,
													$tmp->Set3PointsAway,
													$tmp->Set4PointsHome,
													$tmp->Set4PointsAway,
													$tmp->Set5PointsHome,
													$tmp->Set5PointsAway);

	$vereinListe->getVerein($tmpHeimTeam->club_ID)
	                        ->addTeam($heimTeam)->getTeam($heimTeam->getTeamNo())
	                        ->addGruppe($heimGruppe)->getGruppe($heimGruppe->getGruppeNo())
	                        ->addSpiel($spiel);
	$vereinListe->getVerein($tmpGastTeam->club_ID)
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
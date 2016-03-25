


<?php


function printVars($item, $key) {
	echo ".  " . str_pad($key, 30) . htmlentities($item);
	echo "</br>";
}

function printResponse($item, $key) {
	echo $key;
	echo "</br>";
	array_walk(get_object_vars($item), "printVars");
}

function format($response){
  print "<pre>"; 
  array_walk($response, "printResponse");
  print "</pre>";
}

function leagues() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getLeagues("NATIONAL");
	return $response;
}

function phases() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getPhases("1285"); // league_ID
	return $response;
}


function groups() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getgroups("2428"); //phase_Id
	return $response;
}

function groupDetailed() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getGroupDetailed("9133"); //group_Id
	return $response;
}

function gameDetailed() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getGameDetailed("113094"); //game_Id
	return $response;
}

function table() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getTable("9133"); //group_Id
	return $response;
}

function results() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getResults("9396"); //group_Id
	return $response;
}

function games() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getGames("9133"); //group_Id
	return $response;
}

function gamesDateSpan() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$datumAb  = date("Y-m-d", time() - 10 *24*60*60);
	$datumBis = date("Y-m-d", time() + 60  *24*60*60);
	$response = $client->getGamesDateSpan("9396", $datumAb, $datumBis); //group_Id, str_dateStart, str_dateEnd
	return $response;
}


function gamesTeam() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getGamesTeam("24977"); //team_Id
	return $response;
}


function gamesByClub() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getGamesByClub("909740"); //getGamesByClubRequest // 909740 Therwil
	return $response;
}

function teamsByClub() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getTeamsByClub("909740"); //getTeamsByClubRequest // 909740 Therwil
	return $response;
}

function getHalls() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getHalls("NATIONAL"); 
	return $response;
}

function strip($str) {
	return str_replace(array('"', '\''), "", $str);
}

function hallen2php($hallen) {
	echo "<pre>";
	echo '$hallen = array(array("-2", null, null)' . '<br>';
	foreach($hallen as $halle) {
		
		$strasse = trim($halle->Street)
		         . (is_null(trim($halle->Number))   ? "" : " ") . trim($halle->Number);
		
		$stadt   = $halle->AreaCode
		         . (is_null(trim($halle->Place))    ? "" : " ") . trim($halle->Place);
		
		$halleAdresse =  trim($strasse) . (is_null(trim($strasse)) ? "" : ", ") . trim($stadt);

		echo '&nbsp;&nbsp;'
		  .  ',array(halleNo=>"'      .  $halle->ID_hall . '", '
		  .          'halleName=>"'    . utf8_decode(strip($halle->Caption)) . '", '
		  .          'halleAdresse=>"' . utf8_decode($halleAdresse)   . '") '
			.  '<br>';
	}
	echo ');';
	echo "</pre>";
}




function  getActiveTeams() {
	$search = array("NLA", "NLB", "1L");
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$ret = array();
	$teams = $client-> getActiveTeams("NATIONAL"); 
	foreach($teams as $tmp) {
		if (in_array($tmp->LeagueCaption, $search)) {
			array_push($ret, $tmp);
		}
	}
	echo '$nationaleTeams = array(array("-1", null, null, null, null, null)' . '<br>';
	foreach ($ret as $tmp) {
		$teamNo     = $tmp->ID_team;
		$teamName   = htmlentities($tmp->Caption);
		$liga       = $tmp->LeagueCaption . (strcmp($tmp->Gender, "f") == 0 ? "-D" : "-H");
		$vereinNo   = $tmp->club_ID;
		$vereinName = htmlentities($tmp->ClubCaption);
		echo ',array(teamNo=>"'     . $teamNo     . '", '
		          . 'teamName=>"'   . $teamName   . '", '
		          . 'liga=>"'       . $liga       . '", '
		          . 'vereinNo=>'    . $vereinNo   . ', '
		          . 'vereinName=>"' . $vereinName . '"' . ')'  . '<br>';
	}
	echo ');';
/*
	ID_team
	Caption
	Gender
	LeagueCaption
	club_ID
	ClubCaption,
*/	
	return $ret;
}

function phpClass($className, $object) {
	echo "<pre>";
	echo "class " . $className . " {" . "</br>";
	echo "</br>";
	$vars = get_object_vars($object);
	foreach($vars as $key => $value) {
		$var = lcfirst($key);
		echo "  private $$var;" . "</br>";
	}
	echo "</br>";
	foreach($vars as $key => $value) {
		$var = lcfirst($key);
		$getter = "get$key()";
		$setter = "set$key($$var)";
		echo "  public function $setter {"  . "</br>";
		echo "     \$this->$var = $$var;"   . "</br>";
		echo "  }"                          . "</br>";
		echo "  public function $getter {"  . "</br>";
		echo "     return \$this->$var;"    . "</br>";
		echo "  }"                          . "</br></br>";
	}
	echo "} // "  . $className  . "</br>"; 
	echo "</pre>";
}



//format(getHalls());
hallen2php(getHalls());

//phpClass("League", leagues()[0]);
//phpClass("Games", gamesTeam()[0]);
//format(gamesTeam());
//format(getActiveTeams());

//format(leagues());
//format(phases());
//format(groups());
//format(groupDetailed());
//format(gameDetailed());
//format(table());
//format(results()); //Leer bis gespielt?
//format(games());
//format(gamesDateSpan());
//format(gamesTeam());
//format(gamesByClub());
//format(teamsByClub());





?>
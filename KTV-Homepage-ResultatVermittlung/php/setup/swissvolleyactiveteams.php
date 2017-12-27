
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
	echo '$nationaleTeams = array(array("-1", null, null, null, null)' . '<br>';
	foreach ($ret as $tmp) {
		$teamNo     = $tmp->ID_team;
		$teamName   = htmlentities($tmp->Caption);
		$liga       = $tmp->LeagueCaption . (strcmp($tmp->Gender, "f") == 0 ? "-D" : "-H");
		$vereinNo   = $tmp->club_ID;
		$vereinName = htmlentities($tmp->ClubCaption);
		echo ',array(\'teamno\'=>"'   . $teamNo     . '", '
			 . '\'vereinno\'=>'         . $vereinNo   . ', '
			 . '\'liga\'=>"'            . $liga       . '", '
			 . '\'teamname\'=>"'        . $teamName   . '", '
			 . '\'vereinname\'=>"'      . $vereinName . '"' . ')'  . '<br>';
	}
	echo ');';
	return $ret;
}

getActiveTeams();
//format(getActiveTeams());

?>
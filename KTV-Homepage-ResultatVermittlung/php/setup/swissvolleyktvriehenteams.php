
<?php


function strip($str) {
	return str_replace(array('"', '\''), "", $str);
}

function getGamesTeam($teamNo) {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getGamesTeam($teamNo);
	return $response;
}

function dump($dump) {
	var_dump($dump);
}


function verein2php($teams) {
	echo "<pre>";
	
	foreach($teams as $team) {

		$games = getGamesTeam($team->ID_team);
		
		$gruppen = array();
		foreach($games as $game) {
		  $gruppen[$game->group_ID] = array("groupNo"   => strval($game->group_ID),
		  		                              "isCup"     => (strcmp($game->LeagueCatCaption, "Volley Cup") == 0),
					                              "groupName" => $game->ModeCaption);
		} // foreach game
		
		if (count($gruppen) == 0) {
			return;
		}
		
		echo  "array('teamNo'   => '" . $team->ID_team   . "'," . "<br>"
		   .  "      'verband'  => " . "self::NATIONAL"  . ","  . "<br>"
		   .  "      'teamName' => '" . (strcmp($team->Gender, "f") == 0 ? "Damen " : "Herren ") . $team->LeagueCaption . "'," . "<br>"
		   .  "      'gruppen'  => array(";
		
		$sep = "";
		foreach ($gruppen as $gruppe) {
			echo $sep;
			echo "array('gruppeNo'   => '" . $gruppe['groupNo']   . "',"
				 .       "'gruppeName' => '" . ($gruppe['isCup'] ? "Cup " : "") . $gruppe['groupName'] . "')";
			$sep = '<br/>                         ,';
		} // foreach gruppe
		
		echo  "));";
		
		echo "<br><br>";
	
	} //foreach team
	
				
	echo "</pre>";
}


function teamsByClub($vereinNo) {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getTeamsByClub($vereinNo); 
	return $response;
}

$teams=teamsByClub("909610"); //909610 KTV, 909740 Therwil
verein2php($teams);
//dump($teams);

?>
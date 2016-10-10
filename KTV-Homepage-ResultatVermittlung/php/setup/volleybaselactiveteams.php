


<?php


function wscall($req) {
	$wsdl = 'http://www.mabest.net/VBVB/vbvb.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->__soapCall ("vbRequest", array($req));
	return $response;
	//return $response;
}

$teamList = array("need"    => "vereinList",
									'output'    => 'xml',
									//'output'    => 'xml',
									//"vereinNo"  => "1018",
									"hasNoVerband" => "Y",
									//"target"  => "file",
									//"detail"  => "teamList,ligaList,resultatList"
									"detail"  => "teamList,ligaList"
);


$req=$teamList;
$result = wscall($req);
//print_r($result);
echo '$regionaleTeams = array(array("-1", null, null, null, null, null)' . '<br>';
foreach (simplexml_load_string($result) as $verein) {
  foreach ($verein->teamList->team as $team) {
		$teamNo     = (String)$team->teamNo;
		$teamName   = htmlentities((String)$team->teamName);
		$vereinNo   = (String)$verein->vereinNo;
		$vereinName = htmlentities((String)$verein->vereinName);
		$liga       = (String)$team->ligaList->liga[0]->ligaUID;
		foreach ($team->ligaList->liga as $liga) {
			$ligaUID = $liga->ligaUID;
		  if (!in_array($ligaUID, array("CEV", "1L D", "1L H", "NLB D", "NLB H", "NLA D", "NLA H", "CUP D", "CUP H"))) {
		  	echo ',array(teamNo=>"'   . $teamNo         . '", '
			          . 'teamName=>"'   . $teamName       . '", '
			          . 'liga=>"'       . $ligaUID         . '", '
			          . 'vereinNo=>'    . $vereinNo       . ', '
			          . 'vereinName=>"' . $vereinName     . '"' . ')'  . '<br>';
		  }
		}
	}
}
echo ');';
return;


?>
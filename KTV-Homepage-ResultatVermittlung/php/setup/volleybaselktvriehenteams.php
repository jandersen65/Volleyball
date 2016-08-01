
<?php


function dump($dump) {
	var_dump($dump);
}


function verein2php($verein) {
	echo "<pre>";

	//dump($verein->teamList);
	
	foreach($verein->teamList->team as $team) {
		
		$liga       = (String)$team->ligaList->liga[0]->ligaUID;
	  if (in_array($liga, array("", "CEV", "1L D", "1L H", "NLB D", "NLB H", "NLA D", "NLA H", "CUP D", "CUP H"))) {
			continue;
	  }
		
		echo "//" . (String)$team->ligaList->liga[0]->ligaUID;
		echo "<br/>";
		echo "//" . (String)$team->ligaList->liga[0]->ligaName;
		echo "<br/>";
		
		echo   "array('teamNo'   => '" . $team->teamNo    . "'," . "<br>"
				.  "      'verband'  => " . "self::REGIONAL"  . ","  . "<br>"
		 		.  "      'teamName' => '" . $team->teamName  . "'," . "<br>"
			  .  "      'gruppen'  => array(";

		$sep = "";
		foreach ($team->ligaList->liga as $liga) {
			foreach($liga->gruppeList->gruppe as $gruppe) {
			  echo $sep;
			  echo "array('gruppeNo'    => '" . $gruppe->gruppeNo   . "',"
				  	.       "'gruppeName' => '" . $gruppe->gruppeName . "')";
			}
		  $sep = '<br/>                         ,';
		} // foreach gruppe
		
		echo  "));";
		
		echo "<br/><br/>";
		
	} //foreach team
				
	echo "</pre>";
}


function wscall($req) {
	$wsdl = 'http://www.mabest.net/VBVB/vbvb.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->__soapCall ("vbRequest", array($req));
	return $response;
	//return $response;
}

function teamsByClub($vereinNo) {
	
  $teamList = array("need"         => "vereinList",
	  	              "output"       => 'xml',
		                "vereinNo"     => $vereinNo,
		                "hasNoVerband" => "N",
		                "detail"       => "teamList,ligaList");
  $req=$teamList;
  $result = wscall($req);
	return $result;
}

$result=teamsByClub("1036"); //1036 KTV

foreach (simplexml_load_string($result) as $verein) {
  verein2php($verein);
}
//dump($teams);

?>
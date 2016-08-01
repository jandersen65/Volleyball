
<?php


function dump($dump) {
	print_r($dump);
}


$vereinList = array("need"    => "vereinList",
		'output'    => 'xml',
		//'output'    => 'xml',
		//"vereinNo"  => "1036",
		"hasNoVerband" => "Y",
		//"target"  => "file",
		"detail"  => "teamList,ligaList"
);



function wscall($req) {
	$wsdl = 'http://www.mabest.net/VBVB/vbvb.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->__soapCall ("vbRequest", array($req));
	//format($response);
	return $response;
	//return $response;
}

$req=$vereinList;
$result = wscall($req);

echo "<pre>";
foreach (simplexml_load_string($result) as $verein) {
	
	$vereinNoSwissVolley = (String)$verein->vereinNoSwissVolley;
	if (strlen($vereinNoSwissVolley) == 5) {
		$vereinNoSwissVolley = substr($vereinNoSwissVolley, 0, 3) 
		                     . "0"
		                     . substr($vereinNoSwissVolley, 3, 2);   
	}

	if (count($verein->teamList->team) > 0) {
	  echo "->addVerein(new Verein("
		  	.     "'" . str_pad(htmlentities((String)trim($verein->vereinName) . "'"), 30) . ", "
		    .     "'', "
			  .     "'" . (String)$verein->vereinNo . "'))" . "  // Swiss Volley " . $vereinNoSwissVolley;
	  echo "<br>";
	}
	;	
}
echo "</pre>";


?>
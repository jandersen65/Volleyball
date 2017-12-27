
<?php


function strip($str) {
	return str_replace(array('"', '\''), "", $str);
}

function hallen2php($hallen) {
	echo "<pre>";
	echo '$hallen = array(array("-1", null, null)' . '<br>';
	foreach($hallen as $halle) {
		
		
		$strasse = trim($halle->Street)
		         . (trim($halle->Number) == FALSE   ? "" : " ") . trim($halle->Number);
		
		$stadt   = trim($halle->AreaCode)
		         . (trim($halle->Place) == FALSE    ? "" : " ") . trim($halle->Place);
		
		$halleAdresse =  trim($strasse) . ((trim($strasse) == FALSE) ? "" : ", ") . trim($stadt);

		echo '&nbsp;&nbsp;'
		  .  ',array(\'halleno\'=>"'       . str_pad($halle->ID_hall . '", ', 8)
		  .          '\'hallename\'=>"'    . str_pad(utf8_decode(strip($halle->Caption)). '", ', 40)
		  .          '\'halleadresse\'=>"' . utf8_decode($halleAdresse)   . '") '
			.  '<br>';
	}
	echo ');';
	echo "</pre>";
}


function getHalls() {
	$wsdl = 'http://myvolley.volleyball.ch/SwissVolley.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->getHalls("NATIONAL");
	return $response;
}

hallen2php(getHalls());

?>



<?php



require_once("php/mvc/model/Spiel.php");
require_once("php/mvc/model/SpielListe.php");
require_once("php/mvc/model/Gruppe.php");
require_once("php/mvc/model/GruppeListe.php");
require_once("php/mvc/model/Team.php");
require_once("php/mvc/model/TeamListe.php");
require_once("php/mvc/model/Verein.php");
require_once("php/mvc/model/VereinListe.php");

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
	print_r(simplexml_load_string($response));
  print "</pre>";
}


function wscall($req) {
	$wsdl = 'http://www.mabest.net/VBVB/vbvb.wsdl';
	$client = new SoapClient($wsdl);
	$response = $client->__soapCall ("vbRequest", array($req));
	//format($response);
	return $response;
	//return $response;
}

$vereinList = array("Need"    => "vereinList", 
		                "search"  => "1036",
		                "detail=teamList,ligaList,resultatList");


//$teamResult = array("Need" => "result",   "TeamNo"    => "1004", "Detail"    => 0);
$teamList   = array('need'        => 'ligaList', 
		                'output'      => 'xml', 
		                'hasSpiele'   => 'Y', 
		                'regional'    => 'Y', 
		                'noPlausch'   => 'Y', 
		                'detail'      => 'gruppeList,teamList');

$resultatList = array('need'        => 'ligaList',
											'output'      => 'xml',
                      'ligaNo'      => '1007',
											'hasSpiele'   => 'Y',
											'regional'    => 'Y',
											'noPlausch'   => 'Y',
											'detail'      => 'gruppeList,resultatList');


$resultatList = array('need'        => 'resultatList',
		'output'      => 'xml',
		"vereinNo"  => 1036,
		'gruppeNo'      => '1009');


$resultatList = array("need"      => "resultatList",
		'output'    => 'xml',
		"vereinNo"  => 1036,
		"datumVon" => "31.08.2015",
		"datumBis" => "06.11.2015", );


$rangliste =  array("need"     => "rangliste",
										'output'   => 'xml',
										//"datumVon" => "31.08.2015",
										//"datumBis" => "06.09.2015",
										//"ligaNo"   => "1007",
										'gruppeNo' => '1009');

$resultatList = array("need"      => "resultatList",
											'output'    => 'xml',
									    'hasSpiele'   => 'Y', 
			                'regional'    => 'Y', 
			                'noPlausch'   => 'Y', 
											//"gruppeNo"  => '1009',
											"datumVon" => "01.12.2015",
											"datumBis" => "06.12.2015" );



$teamList = array("need"    => "vereinList",
									'output'    => 'xml',
									//'output'    => 'xml',
									//"vereinNo"  => "1036",
									"hasNoVerband" => "Y",
									//"target"  => "file",
									//"detail"  => "teamList,ligaList,resultatList"
									"detail"  => "teamList,ligaList"
);

$vereinList = array("need"    => "vereinList",
											'output'    => 'xml',
									  //'output'    => 'xml',
										//"vereinNo"  => "1036",
		                "hasNoVerband" => "Y",
		                //"target"  => "file",
										//"detail"  => "teamList,ligaList,resultatList"
										"detail"  => ""
                    );

//array(array(teamNo=>"25664", teamName=>"#Dragons Lugano", liga=>"NLA-H", vereinNo=>915140, vereinName=>"PV Lugano")
			

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
		if (!in_array($liga, array("CEV", "1L D", "1L H", "NLB D", "NLB H", "NLA D", "NLA H", "CUP D", "CUP H"))) {
			echo ',array(teamNo=>"'     . $teamNo     . '", '
			          . 'teamName=>"'   . $teamName   . '", '
			          . 'liga=>"'       . $liga       . '", '
			          . 'vereinNo=>'    . $vereinNo   . ', '
			          . 'vereinName=>"' . $vereinName . '"' . ')'  . '<br>';
		}
	}
}
echo ');';
return;

$req=$vereinList;
$result = wscall($req);
//print_r($result);
foreach (simplexml_load_string($result) as $verein) {
	//var_dump($tmp);
	echo "->addVerein(new Verein(" 
			 .            "'" . str_pad(htmlentities((String)$verein->vereinName . "'"), 30) . ", "
	     .            "'" . (String)$verein->vereinNoSwissVolley      . "', "   
	     .            "'" . (String)$verein->vereinNo                 . "'))"     
	     . "</br>";
  //print_r($verein->teamList);
  foreach ($verein->teamList->team as $team) {
  	echo "<br/>";
  	print_r($team);
  	echo ".  x" . (String)$team->teamNo . "x y" . (String)$team->teamName . "y</br>";
  	//return;
  }
  return;
}

/*
print "<pre>";
var_dump(simplexml_load_string(wscall($req)));
print "</pre>";
*/

/*
need=ligaList
search=
sex=
hasSpiele=Y
regional=
noPlausch=
ligaNo=1007
detail=gruppeList,resultatList
output=xml
target=preview
*/
 


?>
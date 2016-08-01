<?php

define("KTVRIEHEN_CLUB_NO_BS",  "1036");   // KTV Riehen
define("KTVRIEHEN_CLUB_NO_SW",  "909610");

define("SV_WSDL",               "http://myvolley.volleyball.ch/SwissVolley.wsdl");
define("VBS_WSDL",              "http://www.mabest.net/VBVB/vbvb.wsdl");

define("AKTUELLESPIELE_MINUS_DAYS",  14);
define("AKTUELLESPIELE_PLUS_DAYS",   21);

define("NAECHSTESPIELE_MINUS_DAYS",  14);
define("NAECHSTESPIELE_PLUS_DAYS",   21);

class KHR_Conf {

	const NATIONAL = 1;
	const REGIONAL = 2;
	
	const AKTUELLESPIELE_MINUS_DAYS = 14;
	const AKTUELLESPIELE_PLUS_DAYS  = 21;
	const NAECHSTESPIELE_MINUS_DAYS = 14;
	const NAECHSTESPIELE_PLUS_DAYS  = 21;
	
	const KTVRIEHEN_CLUB_NO_BS      = 1036;
	const KTVRIEHEN_CLUB_NO_SW      = 909610;

	public function getRegionaleTeamRec($teamNo) {
		foreach ($this->getRegionaleTeams() as $rec) {
			if (strcmp($rec["teamNo"], $teamNo) == 0) {
				return $rec;
			}
		}
		return null;
	}


	public function getNationalHalleAdr($halleNo) {
		$halle = $this->getNationalHalleRec($halleNo);
	  return is_null($halle) ? "" : $halle["halleAdresse"] ;
	}
	
	public function getNationalHalleRec($halleNo) {
		foreach ($this->getNationaleHallen() as $rec) {
			if (strcmp($rec["halleNo"], $halleNo) == 0) {
				return $rec;
			}
		}
		return null;
	}
	
	public function getNationaleHallen() {
	$hallen = array(array("-1", null, null)
  ,array(halleNo=>"577",   halleName=>"99er-Sporthalle beim Mühleboden",       halleAdresse=>"Benkenstrasse 2, 4106 Therwil") 
  ,array(halleNo=>"24",    halleName=>"Arti + Mestieri",                       halleAdresse=>"Viale Stefano Franscini 25, 6500 Bellinzona") 
  ,array(halleNo=>"87",    halleName=>"Bahnhofhalle",                          halleAdresse=>"Robert-Zündstrasse 6, 6005 Luzern") 
  ,array(halleNo=>"314",   halleName=>"Baseltor",                              halleAdresse=>"Werkhofstrasse 52, 4500 Solothurn") 
  ,array(halleNo=>"1702",  halleName=>"BBC-Arena",                             halleAdresse=>"Schweizersbildstrasse 10, 8207 Schaffhausen") 
  ,array(halleNo=>"272",   halleName=>"Bethlehemacker",                        halleAdresse=>"Kornweg 108, 3027 Bern") 
  ,array(halleNo=>"111",   halleName=>"Beunden",                               halleAdresse=>"Beundenring, 2560 Nidau") 
  ,array(halleNo=>"1765",  halleName=>"BFO",                                   halleAdresse=>"alte Simplonstrasse, 3900 Brig") 
  ,array(halleNo=>"34",    halleName=>"Breitli",                               halleAdresse=>"Schulstrasse 15, 6374 Buochs") 
  ,array(halleNo=>"423",   halleName=>"Buchholz",                              halleAdresse=>"Hallenbadweg, 8610 Uster") 
  ,array(halleNo=>"1961",  halleName=>"Bündtmättli",                           halleAdresse=>"Schwarzenberstr, 6102 Malters") 
  ,array(halleNo=>"1381",  halleName=>"Centre omnisports Ecole Petit Lancy",   halleAdresse=>"Ch. de la Solitude, 1213 Petit-Lancy") 
  ,array(halleNo=>"813",   halleName=>"Centre scolaire des Mûriers",           halleAdresse=>"Rue des Mûriers 4, 2013 Colombier") 
  ,array(halleNo=>"1894",  halleName=>"Champagne",                             halleAdresse=>"rue Henri Baud, 74200 Thonon les Bains") 
  ,array(halleNo=>"61",    halleName=>"Charnot",                               halleAdresse=>"Rue de la Poste, 1926 Fully") 
  ,array(halleNo=>"796",   halleName=>"Collège des Tuillières",                halleAdresse=>"Ch. de la Tuillière 3, 1196 Gland") 
  ,array(halleNo=>"85",    halleName=>"CSC",                                   halleAdresse=>"Chemin de Monteiller 21, 1093 La Conversion-Corsy") 
  ,array(halleNo=>"1407",  halleName=>"DH Zentrum (Nord/Süd)",                 halleAdresse=>"Schulstrasse 21, 2540 Grenchen") 
  ,array(halleNo=>"586",   halleName=>"Doppelturnhalle Ebnet",                 halleAdresse=>"Oberarneggerstrasse 3, 9204 Andwil") 
  ,array(halleNo=>"1232",  halleName=>"Doppelturnhalle Säli",                  halleAdresse=>"Pilatusstrasse 61, 6003 Luzern") 
  ,array(halleNo=>"547",   halleName=>"Dorfhalle neu ",                        halleAdresse=>"Schwerzistrasse 9, 6017 Ruswil") 
  ,array(halleNo=>"719",   halleName=>"Dreifachturnhalle ",                    halleAdresse=>"Oberdorfstrasse 17, 5703 Seon") 
  ,array(halleNo=>"1506",  halleName=>"École de commerce ",                    halleAdresse=>"Route de base 24, 1228 Plan-les-Ouates") 
  ,array(halleNo=>"184",   halleName=>"Ecole de Culture Générale",             halleAdresse=>"Rue St-Michel 14, 2800 Delémont") 
  ,array(halleNo=>"232",   halleName=>"Ecole de mécanique",                    halleAdresse=>"Ch. Fort de l'Echuse 1, 1213 Petit-Lancy") 
  ,array(halleNo=>"804",   halleName=>"Erlimatt",                              halleAdresse=>"Erlimattstrasse 17, 4658 Däniken") 
  ,array(halleNo=>"126",   halleName=>"FZ Resch",                              halleAdresse=>"Zur Schule 10, 9494 Schaan") 
  ,array(halleNo=>"118",   halleName=>"Giroud-Olma-Halle",                     halleAdresse=>"Louis Giroud Strasse 29, 4600 Olten") 
  ,array(halleNo=>"252",   halleName=>"Grand-Vennes",                          halleAdresse=>"Ch. des Abeilles, 1010 Lausanne") 
  ,array(halleNo=>"72",    halleName=>"Grünfeld",                              halleAdresse=>"Grünfeldstrasse 8, 8645 Jona") 
  ,array(halleNo=>"169",   halleName=>"Gymnase cantonal Bois-Noir",            halleAdresse=>"Rue du Succès 45, 2300 La Chaux-de-Fonds") 
  ,array(halleNo=>"13",    halleName=>"Gymnasium Friedberg",                   halleAdresse=>"Friedbergstrasse, 9200 Gossau") 
  ,array(halleNo=>"810",   halleName=>"Halle des sports de la Riveraine",      halleAdresse=>"Rue du Littoral, 2000 Neuchâtel") 
  ,array(halleNo=>"2015",  halleName=>"Halle polyvalente du communal ",        halleAdresse=>"Route du communal 1, 2400 Le Locle") 
  ,array(halleNo=>"65",    halleName=>"Henry-Dunant",                          halleAdresse=>"Av. Edmond-Vaucher 20, 1203 Genève") 
  ,array(halleNo=>"575",   halleName=>"Im Birch",                              halleAdresse=>"Margrit-Rainer-Strasse 5, 8050 Zürich") 
  ,array(halleNo=>"563",   halleName=>"Im Sand",                               halleAdresse=>"Amselweg, 3930 Visp") 
  ,array(halleNo=>"824",   halleName=>"Isenringen",                            halleAdresse=>"Isenringenstrasse 12, 6375 Beckenried") 
  ,array(halleNo=>"160",   halleName=>"Kantihalle 4",                          halleAdresse=>"Lüssiweg 24, 6300 Zug") 
  ,array(halleNo=>"67",    halleName=>"Kantonsschule",                         halleAdresse=>"Winkelstrasse 1, 8750 Glarus") 
  ,array(halleNo=>"149",   halleName=>"Kantonsschule",                         halleAdresse=>"Näppisuelistrasse 11, 9630 Wattwil") 
  ,array(halleNo=>"152",   halleName=>"Kantonsschule  Zürcher Oberland (KZO)", halleAdresse=>"Kantonsschulstrasse, 8620 Wetzikon") 
  ,array(halleNo=>"1335",  halleName=>"Kantonsschule 2",                       halleAdresse=>"Schönaustrasse 3, 5400 Baden") 
  ,array(halleNo=>"422",   halleName=>"Kantonsschule Limmattal",               halleAdresse=>"In der Luberzen 34, 8902 Urdorf") 
  ,array(halleNo=>"66",    halleName=>"Kirchacker",                            halleAdresse=>"Schulzentrum, 4563 Gerlafingen") 
  ,array(halleNo=>"457",   halleName=>"Klosterturnhalle",                      halleAdresse=>"Burgstrasse, 8752 Näfels") 
  ,array(halleNo=>"1417",  halleName=>"Kreisschule Mittelgösgen ",             halleAdresse=>"Lostorferstrasse 55, 4653 Obergösgen") 
  ,array(halleNo=>"140",   halleName=>"Känelmatt 2",                           halleAdresse=>"Känelmattweg, 4106 Therwil") 
  ,array(halleNo=>"159",   halleName=>"La Marive",                             halleAdresse=>"Quai de Nogent 2, 1400 Yverdon") 
  ,array(halleNo=>"576",   halleName=>"Lambertenghi",                          halleAdresse=>"via Lambertenghi 4, 6900 Lugano") 
  ,array(halleNo=>"103",   halleName=>"Linthalle SGU",                         halleAdresse=>"Oberurnerstrasse 14, 8752 Näfels") 
  ,array(halleNo=>"562",   halleName=>"LP2 (Lycée Collège Planta 2)",          halleAdresse=>"Av. De la Gare 45, 1950 Sion") 
  ,array(halleNo=>"520",   halleName=>"Maladière",                             halleAdresse=>"Rue Maladière, 2000 Neuchâtel") 
  ,array(halleNo=>"20",    halleName=>"Margarethen",                           halleAdresse=>"Gempenstrasse 48, 4053 Basel") 
  ,array(halleNo=>"157",   halleName=>"Matte",                                 halleAdresse=>"Schifflaube 1, 3011 Bern") 
  ,array(halleNo=>"363",   halleName=>"Mehrzweckhalle",                        halleAdresse=>"Grubenweg 20, 4665 Oftringen") 
  ,array(halleNo=>"1818",  halleName=>"Mehrzweckhalle",                        halleAdresse=>"Schulhausstrasse, 7050 Arosa") 
  ,array(halleNo=>"534",   halleName=>"Mehrzweckhalle Flüematte",              halleAdresse=>"Flüematte, 6073 Flüeli Ranft") 
  ,array(halleNo=>"812",   halleName=>"MZH Löhrenacker",                       halleAdresse=>"Landskronstrasse 41, 4147 Aesch") 
  ,array(halleNo=>"1489",  halleName=>"Neue Halle",                            halleAdresse=>"3043 Uettligen") 
  ,array(halleNo=>"1084",  halleName=>"Neue Kanti Halle",                      halleAdresse=>"Munotstrasse 41, 8200 Schaffhausen") 
  ,array(halleNo=>"100",   halleName=>"Neue Turnhalle",                        halleAdresse=>"Bernstrasse 9, 3280 Murten") 
  ,array(halleNo=>"578",   halleName=>"Neumatt S2",                            halleAdresse=>"Reinacherstrasse 1, 4147 Aesch") 
  ,array(halleNo=>"584",   halleName=>"Novalishalle, Lintharena SGU",          halleAdresse=>"Oberurnerstrasse 14, 8752 Näfels") 
  ,array(halleNo=>"546",   halleName=>"Oberei",                                halleAdresse=>"Hellbühlstrasse, 6102 Malters") 
  ,array(halleNo=>"29",    halleName=>"Oberstufenzentrum",                     halleAdresse=>"Schwarzenburgstrasse 321, 3098 Köniz") 
  ,array(halleNo=>"1578",  halleName=>"Oberuster",                             halleAdresse=>"Aathalstrasse 33, 8610 Uster") 
  ,array(halleNo=>"583",   halleName=>"OZ Grünau",                             halleAdresse=>"Grünaustrasse 2, 9303 Wittenbach") 
  ,array(halleNo=>"114",   halleName=>"Primarschule",                          halleAdresse=>"Schulhausstrasse 20, 3672 Oberdiessbach") 
  ,array(halleNo=>"73",    halleName=>"Rain",                                  halleAdresse=>"Tägernaustrasse 40, 8645 Jona") 
  ,array(halleNo=>"38",    halleName=>"Rietstein",                             halleAdresse=>"Ebnaterstrasse 40, 9630 Wattwil") 
  ,array(halleNo=>"566",   halleName=>"Salle de Gym La Pépinière",             halleAdresse=>"Chemin de la Pepiniere 4, 2345 Les Breuleux") 
  ,array(halleNo=>"41",    halleName=>"Salle Derrière-la-Ville 5",             halleAdresse=>"Chemin de Derriere la Ville 5, 1033 Cheseaux") 
  ,array(halleNo=>"208",   halleName=>"Salle du Belluard",                     halleAdresse=>"Derrière-les-Remparts 9, 1700 Fribourg") 
  ,array(halleNo=>"549",   halleName=>"Salle du Centre Sportif Val-de-Travers", halleAdresse=>"Clos Pury 15, 2108 Couvet") 
  ,array(halleNo=>"53",    halleName=>"Salle du Croset",                       halleAdresse=>"Chemin du Parc, 1024 Ecublens") 
  ,array(halleNo=>"1926",  halleName=>"Salle Forum BIWI",                      halleAdresse=>"Au Copas de Sel, 2842 Rossemaison") 
  ,array(halleNo=>"1649",  halleName=>"Salle Polyvalente",                     halleAdresse=>"Rue des Sports, 1926 Fully") 
  ,array(halleNo=>"49",    halleName=>"Salle Pré-aux-Moines",                  halleAdresse=>"Rte de Morges, 1304 Cossonay") 
  ,array(halleNo=>"1662",  halleName=>"Salle Volta (Teilhallen)",              halleAdresse=>"rue Numa-Droz 189, 2300 La Chaux-de-Fonds") 
  ,array(halleNo=>"229",   halleName=>"Salles Ecole des Racettes",             halleAdresse=>"Ch. de la Pralée 14, 1213 Onex") 
  ,array(halleNo=>"83",    halleName=>"Sand",                                  halleAdresse=>"Birkenstrasse 7, 8716 Schmerikon") 
  ,array(halleNo=>"1800",  halleName=>"Schmittengässli",                       halleAdresse=>"Schulhausstrasse 7, 3210 Kerzers") 
  ,array(halleNo=>"9",     halleName=>"Schulzentrum Muesmatt",                 halleAdresse=>"Muesmattweg 6, 4123 Allschwil") 
  ,array(halleNo=>"26",    halleName=>"Schwellenmätteli",                      halleAdresse=>"Schwellenmattstrasse 1, 3005 Bern") 
  ,array(halleNo=>"1816",  halleName=>"SE Scuole Comunali",                    halleAdresse=>"Via Terriciuole 165, 6516 Cugnasco, Gerra Piano") 
  ,array(halleNo=>"30",    halleName=>"Seeland Gymnasium",                     halleAdresse=>"Ländtestrasse 12, 2503 Biel-Bienne") 
  ,array(halleNo=>"97",    halleName=>"Sekundarschule",                        halleAdresse=>"Quellenweg 6, 3053 Münchenbuchsee") 
  ,array(halleNo=>"313",   halleName=>"Seminar (Ost)",                         halleAdresse=>"Obere Sternengasse, 4500 Solothurn") 
  ,array(halleNo=>"270",   halleName=>"Seminar Muristalden=neu Campus Muristalden", halleAdresse=>"Muristrasse, 3006 Bern") 
  ,array(halleNo=>"110",   halleName=>"Sempach-Station",                       halleAdresse=>"6203 Sempach-Station") 
  ,array(halleNo=>"2011",  halleName=>"Spielhalle OS",                         halleAdresse=>"Bruchmatt, 1712 Tafers") 
  ,array(halleNo=>"1712",  halleName=>"Sportanlage Riet",                      halleAdresse=>"Pizolstrasse 15, 7320 Sargans") 
  ,array(halleNo=>"44",    halleName=>"Sportanlage Sand",                      halleAdresse=>"Sandstrasse 35, 7000 Chur") 
  ,array(halleNo=>"716",   halleName=>"Sporthalle 1",                          halleAdresse=>"Schulstrasse 6, 5707 Seengen") 
  ,array(halleNo=>"1918",  halleName=>"Sporthalle AARfit",                     halleAdresse=>"Aareweg 32, 3270 Aarberg") 
  ,array(halleNo=>"312",   halleName=>"Sporthalle Blauen ",                    halleAdresse=>"Bannweg 2, 5080 Laufenburg") 
  ,array(halleNo=>"536",   halleName=>"Sporthalle Brüel",                      halleAdresse=>"Etzelstrasse 2, 8840 Einsiedeln") 
  ,array(halleNo=>"1367",  halleName=>"Sporthalle Grünau",                     halleAdresse=>"Schulhausstrasse 5, 6206 Neuenkirch") 
  ,array(halleNo=>"80",    halleName=>"Sporthalle Gymnasium",                  halleAdresse=>"Steinackerweg 7, 4242 Laufen") 
  ,array(halleNo=>"589",   halleName=>"Sporthalle Hofstatt ",                  halleAdresse=>"Schulstrasse 5, 5082 Kaisten") 
  ,array(halleNo=>"204",   halleName=>"Sporthalle Leimacker",                  halleAdresse=>"Leimacker, 3186 Düdingen") 
  ,array(halleNo=>"1876",  halleName=>"Sporthalle Löhracker",                  halleAdresse=>"Schützenstrasse 42, 8355 Aadorf") 
  ,array(halleNo=>"122",   halleName=>"Sporthalle Niederholz",                 halleAdresse=>"Niederholzstrasse 95, 4125 Riehen") 
  ,array(halleNo=>"74",    halleName=>"Sporthalle Ruebisbach",                 halleAdresse=>"Talacherstrasse 2, 8302 Kloten") 
  ,array(halleNo=>"98",    halleName=>"Sporthalle Schlossmatt",                halleAdresse=>"Schlossmattstrasse 2, 3110 Münsingen") 
  ,array(halleNo=>"10",    halleName=>"Sporthalle Tellenfeld",                 halleAdresse=>"Grenzstrasse, 8580 Amriswil") 
  ,array(halleNo=>"1854",  halleName=>"Sporthalle Weissenstein",               halleAdresse=>"Könizstrasse 111, 3008 Bern") 
  ,array(halleNo=>"27",    halleName=>"Sporthalle ZSSW",                       halleAdresse=>"Bremgartenstrasse 145, 3012 Bern") 
  ,array(halleNo=>"1492",  halleName=>"Sporthalle Zug",                        halleAdresse=>"General Guisan Strasse, 6300 Zug") 
  ,array(halleNo=>"19",    halleName=>"SpZ Pfaffenholz",                       halleAdresse=>"Burgfeldergrenze (F), 4055 Basel") 
  ,array(halleNo=>"135",   halleName=>"Sunnegrund",                            halleAdresse=>"Blickensdorferstrasse 17, 6312 Steinhausen") 
  ,array(halleNo=>"532",   halleName=>"Turnhalle",                             halleAdresse=>"Giebelhüttenweg 18, 8917 Oberlunkhofen") 
  ,array(halleNo=>"533",   halleName=>"Turnhalle",                             halleAdresse=>"Hinterdorfstrasse 16, 8918 Unterlunkhofen") 
  ,array(halleNo=>"1509",  halleName=>"Turnhalle Amlehn",                      halleAdresse=>"Amlehnstrasse, 6010 Kriens") 
  ,array(halleNo=>"1460",  halleName=>"Turnhalle Brunnmatt ",                  halleAdresse=>"Brunnmattstrasse 16, 3007 Bern") 
  ,array(halleNo=>"484",   halleName=>"Turnhalle Burgerau",                    halleAdresse=>"Kreuzstrasse 43, 8640 Rapperswil") 
  ,array(halleNo=>"128",   halleName=>"Turnhalle Feld",                        halleAdresse=>"Weiermattstrasse 20, 5012 Schönenwerd") 
  ,array(halleNo=>"782",   halleName=>"Turnhalle Feldmatt",                    halleAdresse=>"Rankstrasse 2, 6030 Ebikon") 
  ,array(halleNo=>"1881",  halleName=>"Turnhalle Gersag",                      halleAdresse=>"Rüeggisingerstrasse 24, 6020 Emmenbrücke") 
  ,array(halleNo=>"1",     halleName=>"Turnhalle Guntershausen",               halleAdresse=>"Schulbergstrasse 18, 8357 Guntershausen") 
  ,array(halleNo=>"982",   halleName=>"Turnhalle Hatzenbühl",                  halleAdresse=>"Hatzenbühlstrasse 35, 8309 Nürensdorf") 
  ,array(halleNo=>"1076",  halleName=>"Turnhalle Hinter Gärten",               halleAdresse=>"Steingrubenweg 30, 4125 Riehen") 
  ,array(halleNo=>"1053",  halleName=>"Turnhalle Klosterweg ",                 halleAdresse=>"Klosterweg 15/18, 9500 Wil") 
  ,array(halleNo=>"1743",  halleName=>"Turnhalle OMS",                         halleAdresse=>"Alte Simplonstrasse 71, 3900 Brig") 
  ,array(halleNo=>"528",   halleName=>"Turnhalle Prehl",                       halleAdresse=>"Wilerweg 51, 3280 Murten") 
  ,array(halleNo=>"1750",  halleName=>"Turnhalle Primarschule Serafin",        halleAdresse=>"Baselstrasse 5, 4242 Laufen") 
  ,array(halleNo=>"77",    halleName=>"Turnhalle Remisberg",                   halleAdresse=>"Rothausstrasse 14, 8280 Kreuzlingen") 
  ,array(halleNo=>"1795",  halleName=>"Turnhalle Schule Euthal",               halleAdresse=>"Euthalerstrasse 36, 8844 Euthal") 
  ,array(halleNo=>"1713",  halleName=>"Turnhalle Schwarzenbach",               halleAdresse=>"Neuhausstrasse 15, 4953 Schwarzenbach") 
  ,array(halleNo=>"1594",  halleName=>"Vereinshalle Sarnen",                   halleAdresse=>"Rütistrasse, 6060 Sarnen") 
  ,array(halleNo=>"1525",  halleName=>"Wydenhof",                              halleAdresse=>"Schulhausstrasse 22, 6030 Ebikon") 
  ,array(halleNo=>"447",   halleName=>"Zimmerberghalle",                       halleAdresse=>"Zimmerberg 12, 8222 Beringen") 
  ,array(halleNo=>"1880",  halleName=>"Zinzikon",                              halleAdresse=>"Ruchwiesenstrasse 1, 8404 Winterthur") 
);
		return $hallen;
	}
	
	public function getRegionaleTeams() {
		$regionaleTeams = array(array("-1", null, null, null, null, null)
,array(teamNo=>"1152", teamName=>"VBC Allschwil", liga=>"2L H", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1154", teamName=>"VBC Allschwil D2", liga=>"3L D", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1156", teamName=>"VBC Allschwil D3", liga=>"4L D", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1333", teamName=>"VBC Allschwil D4", liga=>"5L D", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1153", teamName=>"VBC Allschwil H2", liga=>"3L H", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1292", teamName=>"VBC Allschwil U15", liga=>"U15 D", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1224", teamName=>"VBC Allschwil U17", liga=>"U17 D", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1223", teamName=>"VBC Allschwil U19", liga=>"U19 D", vereinNo=>1001, vereinName=>"VBC Allschwil")
,array(teamNo=>"1012", teamName=>"TV Arlesheim", liga=>"2L H", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1318", teamName=>"TV Arlesheim", liga=>"", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1348", teamName=>"TV Arlesheim", liga=>"", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1349", teamName=>"TV Arlesheim", liga=>"", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1043", teamName=>"TV Arlesheim D1", liga=>"3L D", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1213", teamName=>"TV Arlesheim D2", liga=>"3L D", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1308", teamName=>"TV Arlesheim H2", liga=>"3L H", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1042", teamName=>"TV Arlesheim H3", liga=>"4L H", vereinNo=>1002, vereinName=>"TV Arlesheim")
,array(teamNo=>"1081", teamName=>"VBC Bärschwil", liga=>"4L D", vereinNo=>1141, vereinName=>"VBC Bärschwil")
,array(teamNo=>"1096", teamName=>"ATV Basel Stadt", liga=>"3L H", vereinNo=>1004, vereinName=>"ATV Basel Stadt")
,array(teamNo=>"1073", teamName=>"KTV Basel ", liga=>"3L H", vereinNo=>1006, vereinName=>"KTV Basel ")
,array(teamNo=>"1009", teamName=>"KTV Basel", liga=>"2L D", vereinNo=>1006, vereinName=>"KTV Basel ")
,array(teamNo=>"1017", teamName=>"KTV Basel 1915", liga=>"2L H", vereinNo=>1006, vereinName=>"KTV Basel ")
,array(teamNo=>"1295", teamName=>"Traktor Basel", liga=>"", vereinNo=>1007, vereinName=>"Traktor Basel")
,array(teamNo=>"1352", teamName=>"Traktor Basel 1", liga=>"", vereinNo=>1007, vereinName=>"Traktor Basel")
,array(teamNo=>"1019", teamName=>"Traktor Basel 2", liga=>"2L H", vereinNo=>1007, vereinName=>"Traktor Basel")
,array(teamNo=>"1254", teamName=>"Traktor Basel 3", liga=>"2L H", vereinNo=>1007, vereinName=>"Traktor Basel")
,array(teamNo=>"1303", teamName=>"Traktor Basel 4", liga=>"4L H", vereinNo=>1007, vereinName=>"Traktor Basel")
,array(teamNo=>"1335", teamName=>"Traktor Basel Junioren U19", liga=>"", vereinNo=>1007, vereinName=>"Traktor Basel")
,array(teamNo=>"1350", teamName=>"Traktor Basel Junioren U23", liga=>"", vereinNo=>1007, vereinName=>"Traktor Basel")
,array(teamNo=>"1129", teamName=>"DR Binningen 1", liga=>"4L D", vereinNo=>1010, vereinName=>"DR Binningen")
,array(teamNo=>"1344", teamName=>"DR Binningen 2", liga=>"5L D", vereinNo=>1010, vereinName=>"DR Binningen")
,array(teamNo=>"1336", teamName=>"DR Binningen 3", liga=>"5L D", vereinNo=>1010, vereinName=>"DR Binningen")
,array(teamNo=>"1085", teamName=>"TV Bretzwil", liga=>"4L D", vereinNo=>1011, vereinName=>"TV Bretzwil")
,array(teamNo=>"1044", teamName=>"VBC Brislach", liga=>"4L D", vereinNo=>1012, vereinName=>"VBC Brislach")
,array(teamNo=>"1102", teamName=>"VBC Brislach", liga=>"MP 2L", vereinNo=>1012, vereinName=>"VBC Brislach")
,array(teamNo=>"1063", teamName=>"VBC Bubendorf 1", liga=>"2L H", vereinNo=>1103, vereinName=>"VBC Bubendorf")
,array(teamNo=>"1005", teamName=>"VBC Bubendorf D1", liga=>"2L D", vereinNo=>1103, vereinName=>"VBC Bubendorf")
,array(teamNo=>"1064", teamName=>"VBC Bubendorf D2", liga=>"3L D", vereinNo=>1103, vereinName=>"VBC Bubendorf")
,array(teamNo=>"1331", teamName=>"VBC Bubendorf D3", liga=>"4L D", vereinNo=>1103, vereinName=>"VBC Bubendorf")
,array(teamNo=>"1332", teamName=>"VBC Bubendorf H2", liga=>"4L H", vereinNo=>1103, vereinName=>"VBC Bubendorf")
,array(teamNo=>"1068", teamName=>"VBC Bubendorf Mixed", liga=>"MP 2L", vereinNo=>1103, vereinName=>"VBC Bubendorf")
,array(teamNo=>"1359", teamName=>"VBC Bubendorf U17 1", liga=>"", vereinNo=>1103, vereinName=>"VBC Bubendorf")
,array(teamNo=>"1075", teamName=>"VB Ettingen", liga=>"4L D", vereinNo=>1014, vereinName=>"VB Ettingen")
,array(teamNo=>"1078", teamName=>"FP Olympia", liga=>"", vereinNo=>1015, vereinName=>"FP Olympia")
,array(teamNo=>"1269", teamName=>"FP Olympia 1", liga=>"2L H", vereinNo=>1015, vereinName=>"FP Olympia")
,array(teamNo=>"1158", teamName=>"FP Olympia D1", liga=>"4L D", vereinNo=>1015, vereinName=>"FP Olympia")
,array(teamNo=>"1159", teamName=>"FP Olympia H2", liga=>"4L H", vereinNo=>1015, vereinName=>"FP Olympia")
,array(teamNo=>"1052", teamName=>"TV Frenkendorf", liga=>"", vereinNo=>1016, vereinName=>"TV Frenkendorf")
,array(teamNo=>"1247", teamName=>"TV Frenkendorf", liga=>"DP 2L", vereinNo=>1016, vereinName=>"TV Frenkendorf")
,array(teamNo=>"1016", teamName=>"VBC Gelterkinden", liga=>"2L H", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1135", teamName=>"VBC Gelterkinden D1", liga=>"3L D", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1136", teamName=>"VBC Gelterkinden D2", liga=>"4L D", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1137", teamName=>"VBC Gelterkinden D3", liga=>"4L D", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1206", teamName=>"VBC Gelterkinden DU17", liga=>"", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1138", teamName=>"VBC Gelterkinden DU23/1", liga=>"", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1134", teamName=>"VBC Gelterkinden H2", liga=>"3L H", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1289", teamName=>"VBC Gelterkinden HU23", liga=>"", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
,array(teamNo=>"1311", teamName=>"Volley Glaibasel", liga=>"", vereinNo=>1018, vereinName=>"Volley Glaibasel")
,array(teamNo=>"1243", teamName=>"VBC Kaiseraugst", liga=>"DP 2L", vereinNo=>1022, vereinName=>"VBC Kaiseraugst")
,array(teamNo=>"1070", teamName=>"VBC Kaiseraugst 1", liga=>"4L D", vereinNo=>1022, vereinName=>"VBC Kaiseraugst")
,array(teamNo=>"1351", teamName=>"VBC Laufen", liga=>"2L D", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1337", teamName=>"VBC Laufen 2", liga=>"3L D", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1341", teamName=>"VBC Laufen 3", liga=>"3L H", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1338", teamName=>"VBC Laufen 3", liga=>"4L D", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1339", teamName=>"VBC Laufen 4", liga=>"4L D", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1364", teamName=>"VBC Laufen D5", liga=>"5L D", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1372", teamName=>"VBC Laufen D6", liga=>"5L D", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1321", teamName=>"VBC Laufen H NLB", liga=>"", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1365", teamName=>"VBC Laufen H2", liga=>"3L H", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1357", teamName=>"VBC Laufen U17 1", liga=>"", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1358", teamName=>"VBC Laufen U17 2", liga=>"", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1342", teamName=>"VBC Laufen U23 1", liga=>"", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1356", teamName=>"VBC Laufen U23 2", liga=>"", vereinNo=>1024, vereinName=>"VBC Laufen")
,array(teamNo=>"1020", teamName=>"SV Lausen", liga=>"4L D", vereinNo=>1025, vereinName=>"SV Lausen")
,array(teamNo=>"1053", teamName=>"SV Lausen", liga=>"5L D", vereinNo=>1025, vereinName=>"SV Lausen")
,array(teamNo=>"1173", teamName=>"SC Gym Leonhard", liga=>"", vereinNo=>1026, vereinName=>"SC Gym Leonhard")
,array(teamNo=>"1176", teamName=>"SC Gym Leonhard", liga=>"", vereinNo=>1026, vereinName=>"SC Gym Leonhard")
,array(teamNo=>"1353", teamName=>"SC Gym Leonhard U23", liga=>"", vereinNo=>1026, vereinName=>"SC Gym Leonhard")
,array(teamNo=>"1076", teamName=>"VBC Liesberg", liga=>"5L D", vereinNo=>1052, vereinName=>"VBC Liesberg")
,array(teamNo=>"1196", teamName=>"VBC Gym Liestal", liga=>"", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
,array(teamNo=>"1195", teamName=>"VBC Gym Liestal 1", liga=>"", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
,array(teamNo=>"1355", teamName=>"VBC Gym Liestal 2", liga=>"", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
,array(teamNo=>"1087", teamName=>"VBC Gym Liestal D1", liga=>"3L D", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
,array(teamNo=>"1234", teamName=>"VBC Gym Liestal D2", liga=>"4L D", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
,array(teamNo=>"1038", teamName=>"VBC Münchenstein", liga=>"", vereinNo=>1029, vereinName=>"VBC Münchenstein")
,array(teamNo=>"1217", teamName=>"VBC Münchenstein", liga=>"", vereinNo=>1029, vereinName=>"VBC Münchenstein")
,array(teamNo=>"1250", teamName=>"VBC Münchenstein", liga=>"", vereinNo=>1029, vereinName=>"VBC Münchenstein")
,array(teamNo=>"1034", teamName=>"VBC Münchenstein 1", liga=>"2L D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
,array(teamNo=>"1035", teamName=>"VBC Münchenstein 2", liga=>"4L D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
,array(teamNo=>"1036", teamName=>"VBC Münchenstein 3", liga=>"4L D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
,array(teamNo=>"1300", teamName=>"VBC Münchenstein 4", liga=>"4L D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
,array(teamNo=>"1163", teamName=>"TV Muttenz", liga=>"3L H", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1162", teamName=>"TV Muttenz 1", liga=>"3L D", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1160", teamName=>"TV Muttenz 2", liga=>"4L D", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1167", teamName=>"TV Muttenz 3", liga=>"4L D", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1161", teamName=>"TV Muttenz 4", liga=>"5L D", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1168", teamName=>"TV Muttenz U15", liga=>"", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1166", teamName=>"TV Muttenz U17", liga=>"", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1165", teamName=>"TV Muttenz U19", liga=>"", vereinNo=>1030, vereinName=>"TV Muttenz")
,array(teamNo=>"1131", teamName=>"TV Neue Welt H1", liga=>"", vereinNo=>1032, vereinName=>"TV Neue Welt")
,array(teamNo=>"1055", teamName=>"SC Novartis D1", liga=>"4L D", vereinNo=>1023, vereinName=>"SC Novartis")
,array(teamNo=>"1054", teamName=>"TV Neue Welt", liga=>"4L H", vereinNo=>1023, vereinName=>"SC Novartis")
,array(teamNo=>"1072", teamName=>"DR Nunningen", liga=>"4L D", vereinNo=>1033, vereinName=>"DR Nunningen")
,array(teamNo=>"1345", teamName=>"NS Pratteln", liga=>"DP 1L", vereinNo=>1034, vereinName=>"TV Pratteln NS")
,array(teamNo=>"1121", teamName=>"TV Pratteln NS 1", liga=>"3L D", vereinNo=>1034, vereinName=>"TV Pratteln NS")
,array(teamNo=>"1122", teamName=>"TV Pratteln NS 2", liga=>"5L D", vereinNo=>1034, vereinName=>"TV Pratteln NS")
,array(teamNo=>"1123", teamName=>"TV Pratteln NS U23", liga=>"", vereinNo=>1034, vereinName=>"TV Pratteln NS")
,array(teamNo=>"1014", teamName=>"KTV Riehen", liga=>"2L H", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1215", teamName=>"KTV Riehen 1", liga=>"", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1237", teamName=>"KTV Riehen 2", liga=>"", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1004", teamName=>"KTV Riehen 2 (2L-D)", liga=>"2L D", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1112", teamName=>"KTV Riehen 3", liga=>"3L D", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1113", teamName=>"KTV Riehen 4", liga=>"4L D", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1362", teamName=>"KTV Riehen 5", liga=>"5L D", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1315", teamName=>"KTV Riehen A", liga=>"", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1316", teamName=>"KTV Riehen B", liga=>"", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1366", teamName=>"KTV Riehen Damen 6", liga=>"5L D", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1117", teamName=>"KTV Riehen U17A", liga=>"", vereinNo=>1036, vereinName=>"KTV Riehen")
,array(teamNo=>"1083", teamName=>"Volley Sissach", liga=>"MP 3L", vereinNo=>1039, vereinName=>"VRTV Sissach")
,array(teamNo=>"1110", teamName=>"VRTV Sissach", liga=>"5L D", vereinNo=>1039, vereinName=>"VRTV Sissach")
,array(teamNo=>"1314", teamName=>"VRTV Sissach", liga=>"", vereinNo=>1039, vereinName=>"VRTV Sissach")
,array(teamNo=>"1093", teamName=>"Cappuccinos", liga=>"MP 1L", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1202", teamName=>"Sm' Aesch Pfeffingen 1", liga=>"", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1197", teamName=>"Sm' Aesch Pfeffingen 2", liga=>"", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1008", teamName=>"Sm' Aesch Pfeffingen 3", liga=>"2L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1089", teamName=>"Sm' Aesch Pfeffingen 4", liga=>"2L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1090", teamName=>"Sm' Aesch Pfeffingen 5", liga=>"3L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1091", teamName=>"Sm' Aesch Pfeffingen 6", liga=>"4L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1304", teamName=>"Sm' Aesch Pfeffingen 7", liga=>"4L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1305", teamName=>"Sm' Aesch Pfeffingen 8", liga=>"4L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1363", teamName=>"Sm' Aesch Pfeffingen 9", liga=>"5L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1100", teamName=>"Sm' Aesch Pfeffingen U17-1", liga=>"", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1219", teamName=>"Sm' Aesch Pfeffingen U17-2", liga=>"", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1327", teamName=>"Sm' Aesch Pfeffingen U19", liga=>"", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1360", teamName=>"Sm' Aesch Pfeffingen U23", liga=>"U23 IL D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1104", teamName=>"Sm\' Aesch Pfeffingen U15-1", liga=>"", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
,array(teamNo=>"1302", teamName=>"TV St. Johann 2", liga=>"4L D", vereinNo=>1043, vereinName=>"TV St.Johann")
,array(teamNo=>"1301", teamName=>"TV St. Johann 3", liga=>"4L D", vereinNo=>1043, vereinName=>"TV St.Johann")
,array(teamNo=>"1024", teamName=>"TV St.Johann 1", liga=>"4L D", vereinNo=>1043, vereinName=>"TV St.Johann")
,array(teamNo=>"1194", teamName=>"TV St.Johann 4", liga=>"DP 2L", vereinNo=>1043, vereinName=>"TV St.Johann")
,array(teamNo=>"1045", teamName=>"VBC Tecknau", liga=>"4L H", vereinNo=>1044, vereinName=>"VBC Tecknau")
,array(teamNo=>"1046", teamName=>"VBC Tecknau", liga=>"4L D", vereinNo=>1044, vereinName=>"VBC Tecknau")
,array(teamNo=>"1170", teamName=>"VBC Tenniken", liga=>"3L D", vereinNo=>1045, vereinName=>"VBC Tenniken")
,array(teamNo=>"1324", teamName=>"VB Therwil D U15", liga=>"", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1208", teamName=>"VB Therwil D U17 A", liga=>"", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1354", teamName=>"VB Therwil D U17 B", liga=>"", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1235", teamName=>"VB Therwil D U23", liga=>"", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1002", teamName=>"VB Therwil D3", liga=>"2L D", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1183", teamName=>"VB Therwil D4", liga=>"3L D", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1307", teamName=>"VB Therwil D5", liga=>"4L D", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1180", teamName=>"VB Therwil H1", liga=>"2L H", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1361", teamName=>"VB Therwil H2", liga=>"3L H", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1270", teamName=>"VB Therwil H3", liga=>"3L H", vereinNo=>1046, vereinName=>"VB Therwil")
,array(teamNo=>"1086", teamName=>"SVKT Therwil", liga=>"DP 2L", vereinNo=>1047, vereinName=>"SVKT Therwil")
,array(teamNo=>"1007", teamName=>"SC Uni Basel 1", liga=>"2L D", vereinNo=>1048, vereinName=>"SC Uni Basel")
,array(teamNo=>"1051", teamName=>"SC Uni Basel 3", liga=>"4L D", vereinNo=>1048, vereinName=>"SC Uni Basel")
,array(teamNo=>"1107", teamName=>"VBC Volare", liga=>"DP 1L", vereinNo=>1138, vereinName=>"VBC Volare")
,array(teamNo=>"1125", teamName=>"VBC Zeiningen", liga=>"DP 1L", vereinNo=>1050, vereinName=>"VBC Zeiningen")
);
		 return $regionaleTeams;
	}
	
	public function getNationalTeamRec($teamNo) {
		foreach ($this->getNationaleTeams() as $rec) {
			if (strcmp($rec["teamNo"], $teamNo) == 0) {
				return $rec;
			}
		}
	}
	
	public function getNationaleTeams() {
		$nationaleTeams = array(array("-1", null, null, null, null)
,array(teamNo=>"30244", vereinNo=>915140, liga=>"1L-H", teamName=>"#Dragons Lugano II", vereinName=>"PV Lugano")
,array(teamNo=>"29479", vereinNo=>914190, liga=>"NLA-H", teamName=>"biogas volley näfels I", vereinName=>"Volley Näfels")
,array(teamNo=>"29356", vereinNo=>914130, liga=>"NLA-H", teamName=>"Burgerstein Vitamine Volley Jona", vereinName=>"TSV Jona Volleyball")
,array(teamNo=>"29467", vereinNo=>901060, liga=>"NLA-H", teamName=>"Chênois Genève Volleyball I", vereinName=>"Chênois Genève Volleyball")
,array(teamNo=>"29395", vereinNo=>904060, liga=>"NLB-H", teamName=>"Colombier Volley I", vereinName=>"Colombier Volley")
,array(teamNo=>"31421", vereinNo=>904060, liga=>"1L-H", teamName=>"Colombier Volley II", vereinName=>"Colombier Volley")
,array(teamNo=>"28444", vereinNo=>910147, liga=>"1L-D", teamName=>"Dynamo SeeWy ", vereinName=>"Dynamo SeeWy ")
,array(teamNo=>"26614", vereinNo=>911320, liga=>"NLB-D", teamName=>"FC Luzern II", vereinName=>"FC Luzern")
,array(teamNo=>"27604", vereinNo=>901085, liga=>"NLB-D", teamName=>"Genève Volley", vereinName=>"Genève Volley")
,array(teamNo=>"31084", vereinNo=>901105, liga=>"1L-H", teamName=>"Groupement Sportif du CERN", vereinName=>"Groupement Sportif du CERN")
,array(teamNo=>"27505", vereinNo=>915040, liga=>"NLB-D", teamName=>"GSGV Giubiasco", vereinName=>"GSGV Giubiasco")
,array(teamNo=>"27652", vereinNo=>905280, liga=>"NLA-D", teamName=>"Hôtel Cristal VFM", vereinName=>"VFM - Volleyball Franches-Montagnes")
,array(teamNo=>"27562", vereinNo=>909610, liga=>"1L-D", teamName=>"KTV Riehen", vereinName=>"KTV Riehen")
,array(teamNo=>"29476", vereinNo=>902250, liga=>"NLA-H", teamName=>"Lausanne UC I", vereinName=>"Lausanne UC")
,array(teamNo=>"29425", vereinNo=>902250, liga=>"NLB-H", teamName=>"Lausanne UC II", vereinName=>"Lausanne UC")
,array(teamNo=>"29296", vereinNo=>911630, liga=>"1L-H", teamName=>"LK Zug H1", vereinName=>"LK Zug Volleyball")
,array(teamNo=>"29662", vereinNo=>902290, liga=>"NLB-H", teamName=>"Lutry-Lavaux Volleyball I", vereinName=>"Lutry-Lavaux Volleyball")
,array(teamNo=>"27457", vereinNo=>913252, liga=>"1L-D", teamName=>"Pallavolo Kreuzlingen ", vereinName=>"Pallavolo Kreuzlingen")
,array(teamNo=>"29353", vereinNo=>913252, liga=>"1L-H", teamName=>"Pallavolo Kreuzlingen ", vereinName=>"Pallavolo Kreuzlingen")
,array(teamNo=>"27499", vereinNo=>911401, liga=>"1L-D", teamName=>"Raiffeisen Volleya Obwalden", vereinName=>"Raiffeisen Volleya Obwalden")
,array(teamNo=>"30172", vereinNo=>914220, liga=>"1L-D", teamName=>"Rätia Volley", vereinName=>"Rätia Volley")
,array(teamNo=>"29278", vereinNo=>908350, liga=>"1L-H", teamName=>"Regio Volleyteam ", vereinName=>"Regio Volleyteam")
,array(teamNo=>"27367", vereinNo=>915041, liga=>"1L-D", teamName=>"SAG Gordola", vereinName=>"SAG Gordola")
,array(teamNo=>"27640", vereinNo=>909660, liga=>"NLA-D", teamName=>"Sm`Aesch Pfeffingen I", vereinName=>"Sm`Aesch Pfeffingen")
,array(teamNo=>"27310", vereinNo=>909660, liga=>"1L-D", teamName=>"Sm`Aesch Pfeffingen II", vereinName=>"Sm`Aesch Pfeffingen")
,array(teamNo=>"29011", vereinNo=>907730, liga=>"1L-H", teamName=>"STB Volley", vereinName=>"STB Volley")
,array(teamNo=>"29302", vereinNo=>913570, liga=>"1L-H", teamName=>"STV Wil 1 ", vereinName=>"STV Wil")
,array(teamNo=>"29266", vereinNo=>908320, liga=>"NLB-H", teamName=>"SV Olten", vereinName=>"SV Olten")
,array(teamNo=>"31136", vereinNo=>908320, liga=>"1L-H", teamName=>"SV Olten", vereinName=>"SV Olten")
,array(teamNo=>"30574", vereinNo=>901200, liga=>"1L-H", teamName=>"Thonon Volleyball", vereinName=>"Thonon Volleyball")
,array(teamNo=>"29608", vereinNo=>909102, liga=>"1L-H", teamName=>"Traktor Basel 1", vereinName=>"Basel Traktor")
,array(teamNo=>"27595", vereinNo=>906100, liga=>"NLA-D", teamName=>"TS Volley Düdingen I", vereinName=>"TS Volley Düdingen")
,array(teamNo=>"27409", vereinNo=>906100, liga=>"1L-D", teamName=>"TS Volley Düdingen II", vereinName=>"TS Volley Düdingen")
,array(teamNo=>"30565", vereinNo=>914130, liga=>"1L-H", teamName=>"TSV Jona Volleyball", vereinName=>"TSV Jona Volleyball")
,array(teamNo=>"27343", vereinNo=>908150, liga=>"1L-D", teamName=>"TV Grenchen ", vereinName=>"TV Grenchen")
,array(teamNo=>"29446", vereinNo=>910292, liga=>"1L-H", teamName=>"TV Lunkhofen", vereinName=>"TV Lunkhofen")
,array(teamNo=>"27928", vereinNo=>910292, liga=>"1L-D", teamName=>"TV Lunkhofen 1", vereinName=>"TV Lunkhofen")
,array(teamNo=>"27574", vereinNo=>906260, liga=>"1L-D", teamName=>"TV Murten Volleyball", vereinName=>"TV Murten Volleyball")
,array(teamNo=>"29539", vereinNo=>912450, liga=>"1L-H", teamName=>"TV Uster H1", vereinName=>"TV Uster")
,array(teamNo=>"28984", vereinNo=>907458, liga=>"1L-H", teamName=>"U60 Muristalden", vereinName=>"U60 Muristalden")
,array(teamNo=>"27472", vereinNo=>911440, liga=>"NLB-D", teamName=>"VB Fides Ruswil", vereinName=>"VB Fides Ruswil")
,array(teamNo=>"27412", vereinNo=>911380, liga=>"1L-D", teamName=>"VB Neuenkirch 1", vereinName=>"Neuenkirch VB")
,array(teamNo=>"27631", vereinNo=>909740, liga=>"NLB-D", teamName=>"VB Therwil", vereinName=>"VB Therwil")
,array(teamNo=>"29335", vereinNo=>909740, liga=>"1L-D", teamName=>"VB Therwil 2", vereinName=>"VB Therwil")
,array(teamNo=>"27619", vereinNo=>913010, liga=>"NLB-D", teamName=>"VBC Aadorf I", vereinName=>"VBC Aadorf")
,array(teamNo=>"27559", vereinNo=>913010, liga=>"1L-D", teamName=>"VBC Aadorf II", vereinName=>"VBC Aadorf")
,array(teamNo=>"27478", vereinNo=>909020, liga=>"1L-D", teamName=>"VBC Allschwil", vereinName=>"VBC Allschwil")
,array(teamNo=>"27475", vereinNo=>913040, liga=>"1L-D", teamName=>"VBC Andwil-Arnegg", vereinName=>"VBC Andwil-Arnegg")
,array(teamNo=>"29722", vereinNo=>913040, liga=>"1L-H", teamName=>"VBC Andwil-Arnegg 2", vereinName=>"VBC Andwil-Arnegg")
,array(teamNo=>"27439", vereinNo=>907110, liga=>"1L-D", teamName=>"VBC Bern", vereinName=>"VBC Bern")
,array(teamNo=>"29383", vereinNo=>911050, liga=>"1L-H", teamName=>"VBC Buochs", vereinName=>"VBC Buochs")
,array(teamNo=>"27607", vereinNo=>902150, liga=>"NLA-D", teamName=>"VBC Cheseaux I", vereinName=>"VBC Cheseaux")
,array(teamNo=>"27556", vereinNo=>902150, liga=>"NLB-D", teamName=>"VBC Cheseaux II", vereinName=>"VBC Cheseaux")
,array(teamNo=>"31420", vereinNo=>902150, liga=>"1L-D", teamName=>"VBC Cheseaux III", vereinName=>"VBC Cheseaux")
,array(teamNo=>"27571", vereinNo=>902170, liga=>"1L-D", teamName=>"VBC Cossonay I", vereinName=>"VBC Cossonay")
,array(teamNo=>"29161", vereinNo=>905160, liga=>"1L-H", teamName=>"VBC Delémont", vereinName=>"VBC Delemont")
,array(teamNo=>"29665", vereinNo=>911080, liga=>"1L-H", teamName=>"VBC Ebikon 1", vereinName=>"VBC Ebikon")
,array(teamNo=>"27547", vereinNo=>902200, liga=>"1L-D", teamName=>"VBC Ecublens", vereinName=>"VBC Ecublens")
,array(teamNo=>"29359", vereinNo=>912150, liga=>"NLA-H", teamName=>"VBC Einsiedeln", vereinName=>"VBC Einsiedeln")
,array(teamNo=>"27847", vereinNo=>912150, liga=>"1L-D", teamName=>"VBC Einsiedeln ", vereinName=>"VBC Einsiedeln")
,array(teamNo=>"27550", vereinNo=>906150, liga=>"NLB-D", teamName=>"VBC Fribourg", vereinName=>"VBC Fribourg")
,array(teamNo=>"29410", vereinNo=>903060, liga=>"1L-H", teamName=>"VBC Fully", vereinName=>"VBC Fully")
,array(teamNo=>"27520", vereinNo=>914110, liga=>"NLB-D", teamName=>"VBC Galina", vereinName=>"VBC Galina")
,array(teamNo=>"27526", vereinNo=>908120, liga=>"1L-D", teamName=>"VBC Gerlafingen", vereinName=>"VBC Gerlafingen")
,array(teamNo=>"27616", vereinNo=>914120, liga=>"NLB-D", teamName=>"VBC Glaronia", vereinName=>"VBC Glaronia")
,array(teamNo=>"27544", vereinNo=>904230, liga=>"NLB-D", teamName=>"VBC Groupe E Greenwatt Val-de-Travers", vereinName=>"VBC Val-de-Travers")
,array(teamNo=>"29221", vereinNo=>903095, liga=>"1L-H", teamName=>"VBC Herren Oberwallis", vereinName=>"VBC Herren Oberwallis")
,array(teamNo=>"29452", vereinNo=>910054, liga=>"1L-H", teamName=>"VBC Kanti Baden", vereinName=>"VBC Kanti Baden")
,array(teamNo=>"27856", vereinNo=>912240, liga=>"1L-D", teamName=>"VBC Kanti Limmattal 1", vereinName=>"VBC Limmattal KS")
,array(teamNo=>"27046", vereinNo=>906205, liga=>"1L-D", teamName=>"VBC Kerzers", vereinName=>"VBC Kerzers")
,array(teamNo=>"29260", vereinNo=>902239, liga=>"1L-H", teamName=>"VBC La Côte", vereinName=>"VBC La Côte")
,array(teamNo=>"29230", vereinNo=>904050, liga=>"1L-H", teamName=>"VBC La-Chaux-de-Fonds", vereinName=>"VBC La Chaux-de-Fonds")
,array(teamNo=>"29437", vereinNo=>909340, liga=>"NLB-H", teamName=>"VBC Laufen", vereinName=>"VBC Laufen")
,array(teamNo=>"29227", vereinNo=>902240, liga=>"1L-H", teamName=>"VBC Lausanne", vereinName=>"VBC Lausanne")
,array(teamNo=>"29776", vereinNo=>911360, liga=>"NLB-H", teamName=>"VBC Malters ", vereinName=>"VBC Malters")
,array(teamNo=>"27580", vereinNo=>907450, liga=>"NLB-D", teamName=>"VBC Münchenbuchsee", vereinName=>"VBC Münchenbuchsee")
,array(teamNo=>"29443", vereinNo=>907450, liga=>"NLB-H", teamName=>"VBC Münchenbuchsee I", vereinName=>"VBC Münchenbuchsee")
,array(teamNo=>"27577", vereinNo=>907440, liga=>"1L-D", teamName=>"VBC Münsingen", vereinName=>"VBC Münsingen")
,array(teamNo=>"29329", vereinNo=>905270, liga=>"1L-H", teamName=>"VBC Nidau ", vereinName=>"Nidau Volleyballclub")
,array(teamNo=>"28378", vereinNo=>904140, liga=>"NLB-D", teamName=>"VBC NUC II", vereinName=>"VBC NUC")
,array(teamNo=>"31134", vereinNo=>904140, liga=>"1L-D", teamName=>"VBC NUC III", vereinName=>"VBC NUC")
,array(teamNo=>"28495", vereinNo=>910450, liga=>"1L-D", teamName=>"VBC Oftringen 1", vereinName=>"VBC Oftringen")
,array(teamNo=>"29140", vereinNo=>901170, liga=>"NLB-H", teamName=>"VBC Servette Star-Onex", vereinName=>"VBC Servette Star-Onex")
,array(teamNo=>"27553", vereinNo=>901170, liga=>"1L-D", teamName=>"VBC Servette Star-Onex", vereinName=>"VBC Servette Star-Onex")
,array(teamNo=>"27625", vereinNo=>903270, liga=>"1L-D", teamName=>"VBC Sion", vereinName=>"VBC Sion")
,array(teamNo=>"27613", vereinNo=>911570, liga=>"NLB-D", teamName=>"VBC Steinhausen", vereinName=>"VBC Steinhausen")
,array(teamNo=>"29338", vereinNo=>907820, liga=>"NLB-H", teamName=>"VBC Uni Bern ", vereinName=>"VBC Uni Bern ")
,array(teamNo=>"30877", vereinNo=>907820, liga=>"1L-H", teamName=>"VBC Uni Bern ", vereinName=>"VBC Uni Bern ")
,array(teamNo=>"27325", vereinNo=>903300, liga=>"1L-D", teamName=>"VBC Visp", vereinName=>"VBC Visp")
,array(teamNo=>"29473", vereinNo=>912470, liga=>"NLB-H", teamName=>"VBC Voléro Zürich I", vereinName=>"VBC Voléro Zürich")
,array(teamNo=>"29341", vereinNo=>912520, liga=>"1L-H", teamName=>"VBC Wetzikon", vereinName=>"VBC Wetzikon ")
,array(teamNo=>"27853", vereinNo=>912520, liga=>"1L-D", teamName=>"VBC Wetzikon D1", vereinName=>"VBC Wetzikon ")
,array(teamNo=>"27241", vereinNo=>913585, liga=>"1L-D", teamName=>"VBC Wittenbach 1", vereinName=>"VBC Wittenbach")
,array(teamNo=>"28999", vereinNo=>902500, liga=>"1L-H", teamName=>"VBC Yverdon ", vereinName=>"VBC Yverdon")
,array(teamNo=>"29458", vereinNo=>912220, liga=>"NLB-H", teamName=>"VBC züri unterland", vereinName=>"VBC Züri Unterland")
,array(teamNo=>"27589", vereinNo=>912220, liga=>"1L-D", teamName=>"VBC züri unterland", vereinName=>"VBC Züri Unterland")
,array(teamNo=>"29332", vereinNo=>913245, liga=>"NLB-H", teamName=>"VBG Klettgau ", vereinName=>"VBG Klettgau")
,array(teamNo=>"27649", vereinNo=>913310, liga=>"NLA-D", teamName=>"VC Kanti Schaffhausen I", vereinName=>"VC Kanti Schaffhausen")
,array(teamNo=>"29299", vereinNo=>913380, liga=>"NLB-H", teamName=>"VC Smash Winterthur ", vereinName=>"VC Smash Winterthur")
,array(teamNo=>"27334", vereinNo=>907810, liga=>"1L-D", teamName=>"VC Uettligen", vereinName=>"VC Uettligen")
,array(teamNo=>"27598", vereinNo=>904140, liga=>"NLA-D", teamName=>"Viteos NUC I", vereinName=>"VBC NUC")
,array(teamNo=>"29284", vereinNo=>907005, liga=>"1L-H", teamName=>"Volero Aarberg", vereinName=>"Aarberg Volero")
,array(teamNo=>"27658", vereinNo=>912470, liga=>"NLA-D", teamName=>"Volero Zürich I ", vereinName=>"VBC Voléro Zürich")
,array(teamNo=>"29464", vereinNo=>913030, liga=>"NLA-H", teamName=>"Volley Amriswil I", vereinName=>"Volley Amriswil")
,array(teamNo=>"29194", vereinNo=>913030, liga=>"1L-H", teamName=>"Volley Amriswil II", vereinName=>"Volley Amriswil")
,array(teamNo=>"29365", vereinNo=>911606, liga=>"1L-H", teamName=>"Volley Emmen-Nord ", vereinName=>"Volley Emmen-Nord")
,array(teamNo=>"30175", vereinNo=>907345, liga=>"NLA-D", teamName=>"Volley Köniz", vereinName=>"Volley Köniz")
,array(teamNo=>"30895", vereinNo=>907345, liga=>"NLB-D", teamName=>"Volley Köniz II", vereinName=>"Volley Köniz")
,array(teamNo=>"27352", vereinNo=>915038, liga=>"NLA-D", teamName=>"Volley Lugano I", vereinName=>"Volley Lugano")
,array(teamNo=>"29998", vereinNo=>915038, liga=>"1L-D", teamName=>"Volley Lugano II", vereinName=>"Volley Lugano")
,array(teamNo=>"27358", vereinNo=>911309, liga=>"1L-D", teamName=>"Volley Luzern Nachwuchs ", vereinName=>"Volley Luzern Nachwuchs")
,array(teamNo=>"27508", vereinNo=>907456, liga=>"1L-D", teamName=>"Volley Muri Bern", vereinName=>"Volley Muri Bern")
,array(teamNo=>"29386", vereinNo=>907452, liga=>"1L-H", teamName=>"Volley Muristalden", vereinName=>"Muristalden Volley")
,array(teamNo=>"29428", vereinNo=>914190, liga=>"1L-H", teamName=>"Volley Näfels II", vereinName=>"Volley Näfels")
,array(teamNo=>"29389", vereinNo=>907465, liga=>"NLB-H", teamName=>"Volley Oberdiessbach", vereinName=>"Volley Oberdiessbach")
,array(teamNo=>"30181", vereinNo=>910580, liga=>"1L-D", teamName=>"Volley Schönenwerd", vereinName=>"Volley Schönenwerd")
,array(teamNo=>"30178", vereinNo=>910580, liga=>"NLA-H", teamName=>"Volley Schönenwerd I", vereinName=>"Volley Schönenwerd")
,array(teamNo=>"29143", vereinNo=>910580, liga=>"NLB-H", teamName=>"Volley Schönenwerd II", vereinName=>"Volley Schönenwerd")
,array(teamNo=>"29590", vereinNo=>910250, liga=>"NLB-H", teamName=>"Volley Smash 05 Laufenburg-Kaisten", vereinName=>"Volley Smash 05 Laufenburg-Kaisten")
,array(teamNo=>"27454", vereinNo=>908450, liga=>"1L-D", teamName=>"Volley Solothurn", vereinName=>"Volley Solothurn")
,array(teamNo=>"28873", vereinNo=>908450, liga=>"1L-H", teamName=>"Volley Solothurn", vereinName=>"Volley Solothurn")
,array(teamNo=>"27523", vereinNo=>913510, liga=>"1L-D", teamName=>"Volley Toggenburg 2", vereinName=>"Volley Toggenburg")
,array(teamNo=>"27643", vereinNo=>913510, liga=>"NLB-D", teamName=>"Volley Toggenburg I", vereinName=>"Volley Toggenburg")
,array(teamNo=>"30865", vereinNo=>911330, liga=>"NLA-D", teamName=>"Volley Top Luzern", vereinName=>"Volley Top Luzern")
,array(teamNo=>"30868", vereinNo=>911330, liga=>"NLA-H", teamName=>"Volley Top Luzern", vereinName=>"Volley Top Luzern")
,array(teamNo=>"28960", vereinNo=>907620, liga=>"1L-H", teamName=>"Volleyball Papiermühle ", vereinName=>"Volleyball Papiermühle")
,array(teamNo=>"31137", vereinNo=>905090, liga=>"1L-H", teamName=>"Volleyboys Bienne", vereinName=>"Bienne Volleyboys")
);
		return $nationaleTeams;
	}
	
  function getVolleyBaselVereine() {
	  $vereine = new VereinListe();
		$vereine->addVerein(new Verein('VBC Allschwil'                , '909020', '1001'))  // Swiss Volley 909020
						->addVerein(new Verein('TV Arlesheim'                 , '', '1002'))  // Swiss Volley 909030
						->addVerein(new Verein('VBC Bärschwil'                , '', '1141'))  // Swiss Volley 909051
						->addVerein(new Verein('ATV Basel Stadt'              , '', '1004'))  // Swiss Volley 909070
						->addVerein(new Verein('KTV Basel'                    , '', '1006'))  // Swiss Volley 909090
						->addVerein(new Verein('Traktor Basel'                , '', '1007'))  // Swiss Volley 909102
						->addVerein(new Verein('DR Binningen'                 , '', '1010'))  // Swiss Volley 909120
						->addVerein(new Verein('TV Bretzwil'                  , '', '1011'))  // Swiss Volley 909177
						->addVerein(new Verein('VBC Brislach'                 , '', '1012'))  // Swiss Volley 909180
						->addVerein(new Verein('VBC Bubendorf'                , '', '1103'))  // Swiss Volley 909181
						->addVerein(new Verein('VB Ettingen'                  , '', '1014'))  // Swiss Volley 909200
						->addVerein(new Verein('FP Olympia'                   , '', '1015'))  // Swiss Volley 909210
						->addVerein(new Verein('TV Frenkendorf'               , '', '1016'))  // Swiss Volley 909220
						->addVerein(new Verein('VBC Gelterkinden'             , '909270', '1017'))  // Swiss Volley 909270
						->addVerein(new Verein('Volley Glaibasel'             , '', '1018'))  // Swiss Volley 909275
						->addVerein(new Verein('TV Itingen'                   , '', '1020'))  // Swiss Volley 909285
						->addVerein(new Verein('VBC Kaiseraugst'              , '', '1022'))  // Swiss Volley 909288
						->addVerein(new Verein('VBC Laufen'                   , '909340', '1024'))  // Swiss Volley 909340
						->addVerein(new Verein('SV Lausen'                    , '', '1025'))  // Swiss Volley 909350
						->addVerein(new Verein('SC Gym Leonhard'              , '', '1026'))  // Swiss Volley 909355
						->addVerein(new Verein('VBC Liesberg'                 , '', '1052'))  // Swiss Volley 909360
						->addVerein(new Verein('VBC Gym Liestal'              , '', '1027'))  // Swiss Volley 909370
						->addVerein(new Verein('VBC Münchenstein'             , '', '1029'))  // Swiss Volley 909430
						->addVerein(new Verein('TV Muttenz'                   , '', '1030'))  // Swiss Volley 909460
				//->addVerein(new Verein('TV Neue Welt'                 , '', '1032'))  // Swiss Volley 909480
						->addVerein(new Verein('SC Novartis'                  , '', '1023'))  // Swiss Volley 909330
						->addVerein(new Verein('DR Nunningen'                 , '', '1033'))  // Swiss Volley 909485
						->addVerein(new Verein('TV Pratteln NS'               , '', '1034'))  // Swiss Volley 909530
						->addVerein(new Verein('KTV Riehen'                   , '909610', '1036'))  // Swiss Volley 909610
						->addVerein(new Verein('VRTV Sissach'                 , '', '1039'))  // Swiss Volley 909640
						->addVerein(new Verein('SmAesch Pfeffingen'           , '909660', '1040'))  // Swiss Volley 909660
						->addVerein(new Verein('TV St.Johann'                 , '', '1043'))  // Swiss Volley 909710
						->addVerein(new Verein('VBC Tecknau'                  , '', '1044'))  // Swiss Volley 909730
						->addVerein(new Verein('VBC Tenniken'                 , '', '1045'))  // Swiss Volley 909735
						->addVerein(new Verein('VB Therwil'                   , '909740', '1046'))  // Swiss Volley 909740
						->addVerein(new Verein('SVKT Therwil'                 , '', '1047'))  // Swiss Volley 909745
						->addVerein(new Verein('SC Uni Basel'                 , '', '1048'))  // Swiss Volley 909750
						->addVerein(new Verein('VBC Volare'                   , '', '1138'))  // Swiss Volley 909760
          //->addVerein(new Verein('VBC Zeiningen'                , '', '1050'))  // Swiss Volley 909775
            ;
							  
	  return $vereine;
	}

	public function getNationaleVereine() {
		$vereine = new VereinListe();
		foreach ($this->getNationaleTeams() as $team) {
			$vereine->addVerein(new Verein($team['vereinName'], $team['vereinNo'], null));
		}
		return $vereine;
	}
	
	
	
	private $teamListe              = array(); 
	private $nationaleVereineAusDerRegion      
	                                = array('909610',  // KTV Riehen
	                                        '909740',  // VB Therwil
	                                        '909340',  // VBC Laufen
			                                    '909660',  // Sm`Aesch Pfeffingen
			                                    '909270',  // VBC Gelterkinden
			                                    '910175',  // TSV Frick Volleyball
			                                    '910250',  // Volley Smash 05 Laufenburg-Kaisten
			                                    '909020',  // VBC Allschwil
			                                    ''
		                                     );
	
	public function __construct() {
		
		$this->teamListe['D1']     = array('teamNo'   => '27562',
																 			 'verband'  => self::NATIONAL,
																			 'teamName' => 'Damen 1L',
																			 'gruppen'  => array(array('gruppeNo'   => '9739',  'gruppeName' => 'Qualifikationsrunde')
																				  	              ,array('gruppeNo'   => '10213', 'gruppeName' => 'Cup 2. Runde')));
		
		
		$this->teamListe['H1']    = array(teamNo    => '1014', 
				                              teamName  => 'Herren 1',
				                              verband   => self::REGIONAL,
				                              gruppen   => array(array(gruppeNo => '1039', gruppeName => 'Meisterschaft')));
		
		$this->teamListe['D2' ]   = array(teamNo    => '1004', 
				                              teamName  => 'Damen 2',
				                              verband   => self::REGIONAL,
				                              gruppen   => array(array(gruppeNo => '1009', gruppeName => 'Meisterschaft')));
		
		$this->teamListe['D3' ]   = array(teamNo    => '1112', 
				                              teamName  => 'Damen 3',
				                              verband   => self::REGIONAL,
				                              gruppen   => array(array(gruppeNo => '1011', gruppeName => 'Meisterschaft')));

		$this->teamListe['D4' ]   = array(teamNo    => '1113',
																			teamName  => 'Damen 4',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1017', gruppeName => 'Meisterschaft')));

		$this->teamListe['D5' ]   = array(teamNo    => '1362',
																			teamName  => 'Damen 5',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1023', gruppeName => 'Meisterschaft')));

		$this->teamListe['D6' ]   = array(teamNo    => '1366',
																			teamName  => 'Damen 6',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1024', gruppeName => 'Meisterschaft')));
		
		

		$this->teamListe['U23' ]  = array(teamNo    => '', //1114'
																			teamName  => 'U23',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1028', gruppeName => 'Meisterschaft')));
		
		$this->teamListe['U19A' ] = array(teamNo    => '1315',
																			teamName  => 'U19A',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1047', gruppeName => 'Finalrunde A')
																					              ,array(gruppeNo => '1032', gruppeName => 'Vorrunde')));
		
		$this->teamListe['U19B' ] = array(teamNo    => '1316',
																			teamName  => 'U19B',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1050', gruppeName => 'Finalrunde B')
																					              ,array(gruppeNo => '1031', gruppeName => 'Vorrunde')));
		
		$this->teamListe['U17A' ] = array(teamNo    => '1117',
																			teamName  => 'U17A',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1051', gruppeName => 'Finalrunde B')
																					              ,array(gruppeNo => '1034', gruppeName => 'Vorrunde')));
		
		//$this->teamListe['U17B' ] = array(teamNo    => '1237',
	  //  																teamName  => 'U17B',
		//																	verband   => self::REGIONAL,
		//																	gruppen   => array(array(gruppeNo => '1056', gruppeName => 'Finalrunde C')
		//																			              ,array(gruppeNo => '1035', gruppeName => 'Vorrunde')));

		$this->teamListe['U15' ]  = array(teamNo    => '1215',
															 			  teamName  => 'U15',
																 		  verband   => self::REGIONAL,
																	 	  gruppen   => array(array(gruppeNo => '1057', gruppeName => 'Meisterschaft')));
		
	}
	
	public function getTeamListe() {
		return $this->teamListe; 
	} // getTeamListe

	public function getNationaleVereineAusDerRegion() {
		return $this->nationaleVereineAusDerRegion;
   }      
   
} // KHR_Conf
	

?>
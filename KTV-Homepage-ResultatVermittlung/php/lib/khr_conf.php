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
			if (strcmp($rec["teamno"], $teamNo) == 0) {
				return $rec;
			}
		}
		return null;
	}


	public function getNationalHalleAdr($halleNo) {
		$halle = $this->getNationalHalleRec($halleNo);
	  return is_null($halle) ? "" : $halle['halleadresse'] ;
	}
	
	public function getNationalHalleRec($halleNo) {
		foreach ($this->getNationaleHallen() as $rec) {
			if (strcmp($rec['halleno'], $halleNo) == 0) {
				return $rec;
			}
		}
		return null;
	}
	
	public function getNationaleHallen() {
	$hallen = array(array('halleno'=>"577",   'hallename'=>"99er-Sporthalle beim Mühleboden",       'halleadresse'=>"Benkenstrasse 2, 4106 Therwil") 
  ,array('halleno'=>"134",   'hallename'=>"alte Kreuzbleiche (kleinere)",          'halleadresse'=>"Burgstrasse 40, 9000 St. Gallen") 
  ,array('halleno'=>"1817",  'hallename'=>"Altikofen",                             'halleadresse'=>"Fischrainweg 17, 3048 Ittigen") 
  ,array('halleno'=>"24",    'hallename'=>"Arti + Mestieri",                       'halleadresse'=>"Viale Stefano Franscini 25, 6500 Bellinzona") 
  ,array('halleno'=>"1281",  'hallename'=>"Auenfeld",                              'halleadresse'=>"Haubitzenstrasse 1, 8500 Frauenfeld") 
  ,array('halleno'=>"1050",  'hallename'=>"Bachfeld",                              'halleadresse'=>"Nelkenweg 12, 9403 Goldach") 
  ,array('halleno'=>"87",    'hallename'=>"Bahnhofhalle",                          'halleadresse'=>"Robert-Zündstrasse 6, 6005 Luzern") 
  ,array('halleno'=>"1702",  'hallename'=>"BBC-Arena",                             'halleadresse'=>"Schweizersbildstrasse 10, 8207 Schaffhausen") 
  ,array('halleno'=>"1621",  'hallename'=>"Berufsbildungszentrum",                 'halleadresse'=>"Waisenhausstrasse 6, 9100 Herisau") 
  ,array('halleno'=>"1279",  'hallename'=>"Berufsschule",                          'halleadresse'=>"3550 Langnau im Emmental") 
  ,array('halleno'=>"111",   'hallename'=>"Beunden",                               'halleadresse'=>"Beundenring, 2560 Nidau") 
  ,array('halleno'=>"1527",  'hallename'=>"Bezirkshalle",                          'halleadresse'=>"6422 Steinen") 
  ,array('halleno'=>"1765",  'hallename'=>"BFO",                                   'halleadresse'=>"alte Simplonstrasse, 3900 Brig") 
  ,array('halleno'=>"1732",  'hallename'=>"BFO Sporthalle Im Sand",                'halleadresse'=>"Kleegärtenweg, 3930 Visp") 
  ,array('halleno'=>"2099",  'hallename'=>"Bodenacker",                            'halleadresse'=>"Friedenstrasse 20, 4410 Liestal") 
  ,array('halleno'=>"37",    'hallename'=>"Breite",                                'halleadresse'=>"Grämigerstrasse 30, 9606 Bütschwil") 
  ,array('halleno'=>"34",    'hallename'=>"Breitli",                               'halleadresse'=>"Schulstrasse 15, 6374 Buochs") 
  ,array('halleno'=>"423",   'hallename'=>"Buchholz (Uster)",                      'halleadresse'=>"Hallenbadweg, 8610 Uster") 
  ,array('halleno'=>"279",   'hallename'=>"Buchsee",                               'halleadresse'=>"Lilienweg 11, 3098 Köniz") 
  ,array('halleno'=>"1961",  'hallename'=>"Bündtmättli",                           'halleadresse'=>"Schwarzenbergstrasse 16, 6102 Malters") 
  ,array('halleno'=>"813",   'hallename'=>"Centre scolaire des Mûriers",           'halleadresse'=>"Rue des Mûriers 4, 2013 Colombier") 
  ,array('halleno'=>"178",   'hallename'=>"Centre sportif de lOiselier",           'halleadresse'=>"Ch. de l'Oiselier 17, 2900 Porrentruy") 
  ,array('halleno'=>"39",    'hallename'=>"Centre Sportif Sous-Moulin",            'halleadresse'=>"Rue de Sous-Moulin 39, 1226 Thônex") 
  ,array('halleno'=>"82",    'hallename'=>"Centre Sportif Unil SOS II Dorigny",    'halleadresse'=>"Dorigny, Route Cantonale, 1015 Lausanne") 
  ,array('halleno'=>"501",   'hallename'=>"Centro Professionale Trevano (CPT)",    'halleadresse'=>"Via Trevano, 6952 Trevano-Canobbio") 
  ,array('halleno'=>"1915",  'hallename'=>"Centro sportivo alle Gerre",            'halleadresse'=>"alle Gerre 1, 6518 Gorduno") 
  ,array('halleno'=>"61",    'hallename'=>"Charnot",                               'halleadresse'=>"Rue de la Poste, 1926 Fully") 
  ,array('halleno'=>"2047",  'hallename'=>"CO Grandes-Communes",                   'halleadresse'=>"ch. Gérard-de-Ternier 20, 1213 Petit-Lancy") 
  ,array('halleno'=>"796",   'hallename'=>"Collège des Tuillières",                'halleadresse'=>"Ch. de la Tuillière 3, 1196 Gland") 
  ,array('halleno'=>"85",    'hallename'=>"CSC",                                   'halleadresse'=>"Chemin de Monteiller 21, 1093 La Conversion-Corsy") 
  ,array('halleno'=>"1407",  'hallename'=>"DH Zentrum (Nord/Süd)",                 'halleadresse'=>"Schulstrasse 21, 2540 Grenchen") 
  ,array('halleno'=>"586",   'hallename'=>"Doppelturnhalle Ebnet",                 'halleadresse'=>"Oberarneggerstrasse 3, 9204 Andwil") 
  ,array('halleno'=>"1232",  'hallename'=>"Doppelturnhalle Säli",                  'halleadresse'=>"Pilatusstrasse 61, 6003 Luzern") 
  ,array('halleno'=>"547",   'hallename'=>"Dorfhalle neu ",                        'halleadresse'=>"Schwerzistrasse 9, 6017 Ruswil") 
  ,array('halleno'=>"379",   'hallename'=>"Ebnet",                                 'halleadresse'=>"Oberdorf 67, 6403 Küssnacht") 
  ,array('halleno'=>"58",    'hallename'=>"Ebnet 1",                               'halleadresse'=>"Unt. Rainweg 35, 5070 Frick") 
  ,array('halleno'=>"184",   'hallename'=>"Ecole de Culture Générale",             'halleadresse'=>"Rue St-Michel 14, 2800 Delémont") 
  ,array('halleno'=>"804",   'hallename'=>"Erlimatt",                              'halleadresse'=>"Erlimattstrasse 17, 4658 Däniken") 
  ,array('halleno'=>"1722",  'hallename'=>"Erlimatt 2",                            'halleadresse'=>"Erliweg 12, 4133 Pratteln") 
  ,array('halleno'=>"429",   'hallename'=>"Freies Gymnasium, Halle ",              'halleadresse'=>"Arbenzstrasse 19, 8008 Zürich") 
  ,array('halleno'=>"11",    'hallename'=>"Freiestrasse",                          'halleadresse'=>"Freiestrasse, 8580 Amriswil") 
  ,array('halleno'=>"1001",  'hallename'=>"Freiestrasse",                          'halleadresse'=>"Freiestrasse 20, 8610 Uster") 
  ,array('halleno'=>"126",   'hallename'=>"FZ Resch",                              'halleadresse'=>"Zur Schule 10, 9494 Schaan") 
  ,array('halleno'=>"569",   'hallename'=>"Gartenstrasse",                         'halleadresse'=>"Gartenstrasse 11, 5303 Würenlingen") 
  ,array('halleno'=>"252",   'hallename'=>"Grand-Vennes",                          'halleadresse'=>"Ch. des Abeilles, 1010 Lausanne") 
  ,array('halleno'=>"72",    'hallename'=>"Grünfeld",                              'halleadresse'=>"Grünfeldstrasse 8, 8645 Jona") 
  ,array('halleno'=>"1073",  'hallename'=>"Gwatt",                                 'halleadresse'=>"Gwattstrasse, 3185 Schmitten") 
  ,array('halleno'=>"79",    'hallename'=>"Gymer",                                 'halleadresse'=>"Weststrasse 21, 4900 Langenthal") 
  ,array('halleno'=>"169",   'hallename'=>"Gymnase cantonal Bois-Noir",            'halleadresse'=>"Rue du Succès 45, 2300 La Chaux-de-Fonds") 
  ,array('halleno'=>"13",    'hallename'=>"Gymnasium Friedberg",                   'halleadresse'=>"Friedbergstrasse, 9200 Gossau") 
  ,array('halleno'=>"810",   'hallename'=>"Halle des sports de la Riveraine",      'halleadresse'=>"Rue du Littoral, 2000 Neuchâtel") 
  ,array('halleno'=>"2015",  'hallename'=>"Halle polyvalente du communal ",        'halleadresse'=>"Route du communal 1, 2400 Le Locle") 
  ,array('halleno'=>"65",    'hallename'=>"Henry-Dunant",                          'halleadresse'=>"Av. Edmond-Vaucher 20, 1203 Genève") 
  ,array('halleno'=>"1909",  'hallename'=>"HEP Lausanne",                          'halleadresse'=>"Cour 27, 1004 Lausanne") 
  ,array('halleno'=>"575",   'hallename'=>"Im Birch",                              'halleadresse'=>"Margrit-Rainer-Strasse 5, 8050 Zürich") 
  ,array('halleno'=>"563",   'hallename'=>"Im Sand",                               'halleadresse'=>"Amselweg, 3930 Visp") 
  ,array('halleno'=>"2043",  'hallename'=>"ISB ( international School of Bern)",   'halleadresse'=>"Allmedingenweg 7, 3073 Gümligen") 
  ,array('halleno'=>"824",   'hallename'=>"Isenringen",                            'halleadresse'=>"Isenringenstrasse 12, 6375 Beckenried") 
  ,array('halleno'=>"160",   'hallename'=>"Kantihalle 4",                          'halleadresse'=>"Lüssiweg 24, 6300 Zug") 
  ,array('halleno'=>"67",    'hallename'=>"Kantonsschule",                         'halleadresse'=>"Winkelstrasse 1, 8750 Glarus") 
  ,array('halleno'=>"149",   'hallename'=>"Kantonsschule",                         'halleadresse'=>"Näppisuelistrasse 11, 9630 Wattwil") 
  ,array('halleno'=>"469",   'hallename'=>"Kantonsschule",                         'halleadresse'=>"Karl-Völkerstrasse 11, 9435 Heerbrugg") 
  ,array('halleno'=>"152",   'hallename'=>"Kantonsschule  Zürcher Oberland (KZO)", 'halleadresse'=>"Kantonsschulstrasse, 8620 Wetzikon") 
  ,array('halleno'=>"1335",  'hallename'=>"Kantonsschule 2",                       'halleadresse'=>"Seminarstr. 3, 5400 Baden") 
  ,array('halleno'=>"422",   'hallename'=>"Kantonsschule Limmattal",               'halleadresse'=>"In der Luberzen 34, 8902 Urdorf") 
  ,array('halleno'=>"914",   'hallename'=>"Kantonsschule Wiedikon",                'halleadresse'=>"Schrennengasse 7, 8003 Zürich") 
  ,array('halleno'=>"942",   'hallename'=>"Kantonsschule Zürich Nord",             'halleadresse'=>"Birchstrasse 107, 8050 Zürich") 
  ,array('halleno'=>"66",    'hallename'=>"Kirchacker",                            'halleadresse'=>"Schulzentrum, 4563 Gerlafingen") 
  ,array('halleno'=>"1417",  'hallename'=>"Kreisschule Mittelgösgen ",             'halleadresse'=>"Lostorferstrasse 55, 4653 Obergösgen") 
  ,array('halleno'=>"344",   'hallename'=>"Kriegacker",                            'halleadresse'=>"Gründenstrasse 32, 4132 Muttenz") 
  ,array('halleno'=>"47",    'hallename'=>"La Fontenelle",                         'halleadresse'=>"Rue de Chasseral, 2053 Cernier") 
  ,array('halleno'=>"159",   'hallename'=>"La Marive",                             'halleadresse'=>"Quai de Nogent 2, 1400 Yverdon") 
  ,array('halleno'=>"45",    'hallename'=>"Lachen unten",                          'halleadresse'=>"Belmontstrasse 11, 7000 Chur") 
  ,array('halleno'=>"576",   'hallename'=>"Lambertenghi",                          'halleadresse'=>"via Lambertenghi 4, 6900 Lugano") 
  ,array('halleno'=>"108",   'hallename'=>"Le Mail",                               'halleadresse'=>"Rue de Bellevaux 52, 2000 Neuchâtel") 
  ,array('halleno'=>"1853",  'hallename'=>"Letten Turnhalle",                      'halleadresse'=>"Schulhausstr. 18, 8955 Oetwil an der Limmat") 
  ,array('halleno'=>"1837",  'hallename'=>"Lindenallee",                           'halleadresse'=>"Alpenstrasse 25, 3800 Interlaken") 
  ,array('halleno'=>"277",   'hallename'=>"Lindenfeld",                            'halleadresse'=>"Zähringerstrasse 37, 3400 Burgdorf") 
  ,array('halleno'=>"103",   'hallename'=>"Linthalle SGU",                         'halleadresse'=>"Oberurnerstrasse 14, 8752 Näfels") 
  ,array('halleno'=>"562",   'hallename'=>"LP2 (Lycée Collège Planta 2)",          'halleadresse'=>"Av. De la Gare 45, 1950 Sion") 
  ,array('halleno'=>"1852",  'hallename'=>"Ludretikon",                            'halleadresse'=>"8800 Thalwil") 
  ,array('halleno'=>"520",   'hallename'=>"Maladière",                             'halleadresse'=>"Rue Maladière, 2000 Neuchâtel") 
  ,array('halleno'=>"20",    'hallename'=>"Margarethen",                           'halleadresse'=>"Gempenstrasse 48, 4053 Basel") 
  ,array('halleno'=>"157",   'hallename'=>"Matte",                                 'halleadresse'=>"Schifflaube 1, 3011 Bern") 
  ,array('halleno'=>"1600",  'hallename'=>"Mattschulhaus",                         'halleadresse'=>"Glärnischstrasse 26, 9500 Wil") 
  ,array('halleno'=>"367",   'hallename'=>"Mehrzweckgebäude",                      'halleadresse'=>"Hinterdorfstrasse, 8917 Unterlunkhofen") 
  ,array('halleno'=>"63",    'hallename'=>"Mehrzweckhalle",                        'halleadresse'=>"Turnhallenstrasse, 4460 Gelterkinden") 
  ,array('halleno'=>"81",    'hallename'=>"Mehrzweckhalle",                        'halleadresse'=>"Seemättli 19, 4254 Liesberg") 
  ,array('halleno'=>"363",   'hallename'=>"Mehrzweckhalle",                        'halleadresse'=>"Grubenweg 20, 4665 Oftringen") 
  ,array('halleno'=>"1687",  'hallename'=>"Mehrzweckhalle",                        'halleadresse'=>"Gotthelfstrasse, 3427 Utzenstorf") 
  ,array('halleno'=>"1818",  'hallename'=>"Mehrzweckhalle",                        'halleadresse'=>"Schulhausstrasse, 7050 Arosa") 
  ,array('halleno'=>"788",   'hallename'=>"Menzo Halle",                           'halleadresse'=>"Turnplatzstrasse, 5737 Menziken") 
  ,array('halleno'=>"809",   'hallename'=>"Menzo Halle Oberstufe",                 'halleadresse'=>"Turnplatzstr. 10, 5737 Menziken") 
  ,array('halleno'=>"491",   'hallename'=>"MPS",                                   'halleadresse'=>"Äussere Bahnhofstrasse 45, 8854 Siebnen") 
  ,array('halleno'=>"295",   'hallename'=>"MZH Dünnenhof",                         'halleadresse'=>"4716 Welschenrohr") 
  ,array('halleno'=>"808",   'hallename'=>"MZH Engelwies",                         'halleadresse'=>"Engelwiesstrasse 1, 9014 St. Gallen") 
  ,array('halleno'=>"1031",  'hallename'=>"MZH Geeren",                            'halleadresse'=>"Kanzleiweg 3, 8536 Hüttwilen") 
  ,array('halleno'=>"812",   'hallename'=>"MZH Löhrenacker",                       'halleadresse'=>"Landskronstrasse 41, 4147 Aesch") 
  ,array('halleno'=>"1489",  'hallename'=>"Neue Halle",                            'halleadresse'=>"3043 Uettligen") 
  ,array('halleno'=>"100",   'hallename'=>"Neue Turnhalle",                        'halleadresse'=>"Bernstrasse 9, 3280 Murten") 
  ,array('halleno'=>"465",   'hallename'=>"Neuhof",                                'halleadresse'=>"Ahornstrasse, 9240 Uzwil") 
  ,array('halleno'=>"578",   'hallename'=>"Neumatt S2",                            'halleadresse'=>"Reinacherstrasse 1, 4147 Aesch") 
  ,array('halleno'=>"584",   'hallename'=>"Novalishalle, Lintharena SGU",          'halleadresse'=>"Oberurnerstrasse 14, 8752 Näfels") 
  ,array('halleno'=>"29",    'hallename'=>"Oberstufenzentrum",                     'halleadresse'=>"Schwarzenburgstrasse 321, 3098 Köniz") 
  ,array('halleno'=>"1578",  'hallename'=>"Oberuster",                             'halleadresse'=>"Aathalstrasse 33, 8610 Uster") 
  ,array('halleno'=>"583",   'hallename'=>"OZ Grünau",                             'halleadresse'=>"Grünaustrasse 2, 9303 Wittenbach") 
  ,array('halleno'=>"1797",  'hallename'=>"Palestra della Scuola Media Vignascia", 'halleadresse'=>"Via Vignascia, 6648 Minusio") 
  ,array('halleno'=>"1228",  'hallename'=>"Palestra Palamondo",                    'halleadresse'=>"Via Industria, 6814 Cadempino") 
  ,array('halleno'=>"871",   'hallename'=>"Primarschule Glärnisch",                'halleadresse'=>"Glärnischstrasse 3, 8820 Wädenswil") 
  ,array('halleno'=>"114",   'hallename'=>"Primarschule Oberdiessbach",            'halleadresse'=>"Schulhausstrasse 20, 3672 Oberdiessbach") 
  ,array('halleno'=>"73",    'hallename'=>"Rain",                                  'halleadresse'=>"Tägernaustrasse 40, 8645 Jona") 
  ,array('halleno'=>"1230",  'hallename'=>"Riedmatt",                              'halleadresse'=>"Riedmatt 41, 6300 Zug") 
  ,array('halleno'=>"38",    'hallename'=>"Rietstein",                             'halleadresse'=>"Ebnaterstrasse 40, 9630 Wattwil") 
  ,array('halleno'=>"1913",  'hallename'=>"Salle de Beau-Site",                    'halleadresse'=>"Beau-Site 1, 2610 St-Imier") 
  ,array('halleno'=>"566",   'hallename'=>"Salle de Gym La Pépinière",             'halleadresse'=>"Chemin de la Pepiniere 4, 2345 Les Breuleux") 
  ,array('halleno'=>"1723",  'hallename'=>"Salle de lEcole professionnelle",       'halleadresse'=>"Rue de Bellevue 4, 1920 Martigny") 
  ,array('halleno'=>"2100",  'hallename'=>"Salle de la Tatironne",                 'halleadresse'=>"1030 Bussigny") 
  ,array('halleno'=>"41",    'hallename'=>"Salle Derrière-la-Ville 5",             'halleadresse'=>"Chemin de Derriere la Ville 5, 1033 Cheseaux") 
  ,array('halleno'=>"208",   'hallename'=>"Salle du Belluard",                     'halleadresse'=>"Derrière-les-Remparts 9, 1700 Fribourg") 
  ,array('halleno'=>"549",   'hallename'=>"Salle du Centre Sportif Val-de-Travers", 'halleadresse'=>"Clos Pury 15, 2108 Couvet") 
  ,array('halleno'=>"1150",  'hallename'=>"Salle du Cheminet",                     'halleadresse'=>"ch. de Cheminet, 1400 Yverdon-de-Bains") 
  ,array('halleno'=>"1926",  'hallename'=>"Salle Forum BIWI",                      'halleadresse'=>"Au Copas de Sel, 2842 Rossemaison") 
  ,array('halleno'=>"2085",  'hallename'=>"Salle omnisports de Grand-Vennes",      'halleadresse'=>"chemin des Abeilles 11, 1010 Lausanne") 
  ,array('halleno'=>"1649",  'hallename'=>"Salle Polyvalente",                     'halleadresse'=>"Rue des Sports, 1926 Fully") 
  ,array('halleno'=>"49",    'hallename'=>"Salle Pré-aux-Moines",                  'halleadresse'=>"Rte de Morges, 1304 Cossonay") 
  ,array('halleno'=>"1662",  'hallename'=>"Salle Volta (Teilhallen)",              'halleadresse'=>"rue Numa-Droz 189, 2300 La Chaux-de-Fonds") 
  ,array('halleno'=>"229",   'hallename'=>"Salles Ecole des Racettes",             'halleadresse'=>"Ch. de la Pralée 14, 1213 Onex") 
  ,array('halleno'=>"83",    'hallename'=>"Sand",                                  'halleadresse'=>"Birkenstrasse 7, 8716 Schmerikon") 
  ,array('halleno'=>"1266",  'hallename'=>"Sappeten",                              'halleadresse'=>"Sonneckstrasse 16, 4416 Bubendorf") 
  ,array('halleno'=>"1800",  'hallename'=>"Schmittengässli",                       'halleadresse'=>"Schulhausstrasse 7, 3210 Kerzers") 
  ,array('halleno'=>"856",   'hallename'=>"Schulhaus Rietacker",                   'halleadresse'=>"Ohringerstrasse 16, 8472 Seuzach") 
  ,array('halleno'=>"26",    'hallename'=>"Schwellenmätteli",                      'halleadresse'=>"Schwellenmattstrasse 1, 3005 Bern") 
  ,array('halleno'=>"30",    'hallename'=>"Seeland Gymnasium",                     'halleadresse'=>"Ländtestrasse 12, 2503 Biel-Bienne") 
  ,array('halleno'=>"1622",  'hallename'=>"Seematt",                               'halleadresse'=>"6403 Küssnacht am Rigi") 
  ,array('halleno'=>"2086",  'hallename'=>"Seematt TH",                            'halleadresse'=>"Seematt 10, 4456 Tenniken") 
  ,array('halleno'=>"97",    'hallename'=>"Sekundarschule Münchenbuchsee",         'halleadresse'=>"Quellenweg 6, 3053 Münchenbuchsee") 
  ,array('halleno'=>"270",   'hallename'=>"Seminar Muristalden=neu Campus Muristalden", 'halleadresse'=>"Muristrasse, 3006 Bern") 
  ,array('halleno'=>"110",   'hallename'=>"Sempach-Station",                       'halleadresse'=>"6203 Sempach-Station") 
  ,array('halleno'=>"32",    'hallename'=>"Spielhalle",                            'halleadresse'=>"Fendringenstrasse 1, 3178 Bösingen") 
  ,array('halleno'=>"143",   'hallename'=>"Spiezwiler",                            'halleadresse'=>"Faulenbachweg 85, 3700 Spiez") 
  ,array('halleno'=>"44",    'hallename'=>"Sportanlage Sand",                      'halleadresse'=>"Sandstrasse 35, 7000 Chur") 
  ,array('halleno'=>"36",    'hallename'=>"Sporthalle",                            'halleadresse'=>"Schulhausplatz, 6463 Bürglen") 
  ,array('halleno'=>"2097",  'hallename'=>"Sporthalle Aarau Rohr",                 'halleadresse'=>"Kirchweg, 5032 Aarau") 
  ,array('halleno'=>"1918",  'hallename'=>"Sporthalle AARfit",                     'halleadresse'=>"Aareweg 32, 3270 Aarberg") 
  ,array('halleno'=>"1204",  'hallename'=>"Sporthalle Baldegg",                    'halleadresse'=>"Alte Klosterstrasse 15, 6283 Baldegg") 
  ,array('halleno'=>"312",   'hallename'=>"Sporthalle Blauen ",                    'halleadresse'=>"Bannweg 2, 5080 Laufenburg") 
  ,array('halleno'=>"536",   'hallename'=>"Sporthalle Brüel",                      'halleadresse'=>"Etzelstrasse 2, 8840 Einsiedeln") 
  ,array('halleno'=>"105",   'hallename'=>"Sporthalle Buchholz (Glarus)",          'halleadresse'=>"Buchholzstrasse 59, 8750 Glarus") 
  ,array('halleno'=>"1367",  'hallename'=>"Sporthalle Grünau",                     'halleadresse'=>"Schulhausstrasse 5, 6206 Neuenkirch") 
  ,array('halleno'=>"80",    'hallename'=>"Sporthalle Gymnasium",                  'halleadresse'=>"Steinackerweg 7, 4242 Laufen") 
  ,array('halleno'=>"556",   'hallename'=>"Sporthalle Hofmatt",                    'halleadresse'=>"Hofmatt, 4460 Gelterkinden") 
  ,array('halleno'=>"589",   'hallename'=>"Sporthalle Hofstatt ",                  'halleadresse'=>"Schulstrasse 5, 5082 Kaisten") 
  ,array('halleno'=>"204",   'hallename'=>"Sporthalle Leimacker",                  'halleadresse'=>"Leimacker, 3186 Düdingen") 
  ,array('halleno'=>"1876",  'hallename'=>"Sporthalle Löhracker",                  'halleadresse'=>"Schützenstrasse 42, 8355 Aadorf") 
  ,array('halleno'=>"122",   'hallename'=>"Sporthalle Niederholz",                 'halleadresse'=>"Niederholzstrasse 95, 4125 Riehen") 
  ,array('halleno'=>"1013",  'hallename'=>"Sporthalle Rietacker",                  'halleadresse'=>"Ohringerstrasse 16, 8472 Seuzach") 
  ,array('halleno'=>"74",    'hallename'=>"Sporthalle Ruebisbach",                 'halleadresse'=>"Talacherstrasse 2, 8302 Kloten") 
  ,array('halleno'=>"1673",  'hallename'=>"Sporthalle Schadau",                    'halleadresse'=>"Marienstrasse 34, 3604 Thun") 
  ,array('halleno'=>"98",    'hallename'=>"Sporthalle Schlossmatt",                'halleadresse'=>"Schlossmattstrasse 2, 3110 Münsingen") 
  ,array('halleno'=>"10",    'hallename'=>"Sporthalle Tellenfeld",                 'halleadresse'=>"Grenzstrasse, 8580 Amriswil") 
  ,array('halleno'=>"2057",  'hallename'=>"Sporthalle Weiden",                     'halleadresse'=>"8645 Jona") 
  ,array('halleno'=>"1854",  'hallename'=>"Sporthalle Weissenstein",               'halleadresse'=>"Könizstrasse 111, 3008 Bern") 
  ,array('halleno'=>"27",    'hallename'=>"Sporthalle ZSSW",                       'halleadresse'=>"Bremgartenstrasse 145, 3012 Bern") 
  ,array('halleno'=>"1492",  'hallename'=>"Sporthalle Zug",                        'halleadresse'=>"General Guisan Strasse, 6300 Zug") 
  ,array('halleno'=>"19",    'hallename'=>"SpZ Pfaffenholz",                       'halleadresse'=>"Burgfeldergrenze (F), 4055 Basel") 
  ,array('halleno'=>"2082",  'hallename'=>"SSK Cordast",                           'halleadresse'=>"Dorfstrasse 50, 1792 Cordast") 
  ,array('halleno'=>"135",   'hallename'=>"Sunnegrund",                            'halleadresse'=>"Blickensdorferstrasse 17, 6312 Steinhausen") 
  ,array('halleno'=>"532",   'hallename'=>"Turnhalle",                             'halleadresse'=>"Giebelhüttenweg 18, 8917 Oberlunkhofen") 
  ,array('halleno'=>"533",   'hallename'=>"Turnhalle",                             'halleadresse'=>"Hinterdorfstrasse 16, 8918 Unterlunkhofen") 
  ,array('halleno'=>"1263",  'hallename'=>"Turnhalle",                             'halleadresse'=>"Kirchweg, 8964 Rudolfstetten") 
  ,array('halleno'=>"1613",  'hallename'=>"Turnhalle",                             'halleadresse'=>"Schulweg, 4492 Tecknau") 
  ,array('halleno'=>"1619",  'hallename'=>"Turnhalle",                             'halleadresse'=>"Turnhallenstrasse 2, 4542 Luterbach") 
  ,array('halleno'=>"1803",  'hallename'=>"Turnhalle",                             'halleadresse'=>"Rottenbett, 3931 Lalden") 
  ,array('halleno'=>"2022",  'hallename'=>"Turnhalle B",                           'halleadresse'=>"4225 Brislach") 
  ,array('halleno'=>"1460",  'hallename'=>"Turnhalle Brunnmatt ",                  'halleadresse'=>"Brunnmattstrasse 16, 3007 Bern") 
  ,array('halleno'=>"128",   'hallename'=>"Turnhalle Feld",                        'halleadresse'=>"Weiermattstrasse 20, 5012 Schönenwerd") 
  ,array('halleno'=>"1881",  'hallename'=>"Turnhalle Gersag",                      'halleadresse'=>"Rüeggisingerstrasse 24, 6020 Emmenbrücke") 
  ,array('halleno'=>"1",     'hallename'=>"Turnhalle Guntershausen",               'halleadresse'=>"Schulbergstrasse 18, 8357 Guntershausen") 
  ,array('halleno'=>"1076",  'hallename'=>"Turnhalle Hinter Gärten",               'halleadresse'=>"Steingrubenweg 30, 4125 Riehen") 
  ,array('halleno'=>"1663",  'hallename'=>"Turnhalle HPS",                         'halleadresse'=>"Schorenstrasse 19, 4900 Langenthal") 
  ,array('halleno'=>"1053",  'hallename'=>"Turnhalle Klosterweg ",                 'halleadresse'=>"Klosterweg 15/18, 9500 Wil") 
  ,array('halleno'=>"1664",  'hallename'=>"Turnhalle Lerbermatte TH4",             'halleadresse'=>"Kirchstrasse 70, 3097 Liebefeld-Köniz") 
  ,array('halleno'=>"1419",  'hallename'=>"Turnhalle Mattli",                      'halleadresse'=>"Kastanienbaumstrasse 226, 6047 Kastanienbaum") 
  ,array('halleno'=>"528",   'hallename'=>"Turnhalle Prehl",                       'halleadresse'=>"Wilerweg 51, 3280 Murten") 
  ,array('halleno'=>"77",    'hallename'=>"Turnhalle Remisberg",                   'halleadresse'=>"Rothausstrasse 14, 8280 Kreuzlingen") 
  ,array('halleno'=>"1713",  'hallename'=>"Turnhalle Schwarzenbach",               'halleadresse'=>"Neuhausstrasse 15, 4953 Schwarzenbach") 
  ,array('halleno'=>"1901",  'hallename'=>"Turnhalle Spiegel",                     'halleadresse'=>"Spiegelstrasse 75-81, 3095 Spiegel") 
  ,array('halleno'=>"1594",  'hallename'=>"Vereinshalle Sarnen",                   'halleadresse'=>"Rütistrasse, 6060 Sarnen") 
  ,array('halleno'=>"1261",  'hallename'=>"Weid",                                  'halleadresse'=>"Weidstrasse 20, 8808 Pfäffikon") 
  ,array('halleno'=>"571",   'hallename'=>"Zelgli",                                'halleadresse'=>"6386 Wolfenschiessen") 
  ,array('halleno'=>"447",   'hallename'=>"Zimmerberghalle",                       'halleadresse'=>"Zimmerberg 12, 8222 Beringen") 
  ,array('halleno'=>"1880",  'hallename'=>"Zinzikon",                              'halleadresse'=>"Ruchwiesenstrasse 1, 8404 Winterthur") 
  ,array('halleno'=>"6",     'hallename'=>"Zweienhalle",                           'halleadresse'=>"4558 Heinrichswil") 
);
		return $hallen;
	}
	
	public function getRegionaleTeams() {
		$regionaleTeams = array(array('teamno'=>"1152", 'teamname'=>"VBC Allschwil", 'liga'=>"2L H", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1198", 'teamname'=>"VBC Allschwil", 'liga'=>"2L D", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1405", 'teamname'=>"VBC Allschwil", 'liga'=>"U23 D SK2", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1154", 'teamname'=>"VBC Allschwil D2", 'liga'=>"3L D", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1156", 'teamname'=>"VBC Allschwil D3", 'liga'=>"4L D", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1396", 'teamname'=>"VBC Allschwil D4", 'liga'=>"5L D", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1153", 'teamname'=>"VBC Allschwil H2", 'liga'=>"4L H", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1292", 'teamname'=>"VBC Allschwil U15", 'liga'=>"U15 D", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1223", 'teamname'=>"VBC Allschwil U17", 'liga'=>"U17 D", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1406", 'teamname'=>"VBC Allschwil U23 H", 'liga'=>"U23 H", 'vereinno'=>1001, 'vereinname'=>"VBC Allschwil")
,array('teamno'=>"1012", 'teamname'=>"TV Arlesheim", 'liga'=>"2L H", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1349", 'teamname'=>"TV Arlesheim", 'liga'=>"U19 D", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1318", 'teamname'=>"TV Arlesheim 1", 'liga'=>"U17 D", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1043", 'teamname'=>"TV Arlesheim D1", 'liga'=>"3L D", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1213", 'teamname'=>"TV Arlesheim D2", 'liga'=>"4L D", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1395", 'teamname'=>"TV Arlesheim D3", 'liga'=>"5L D", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1308", 'teamname'=>"TV Arlesheim H2", 'liga'=>"3L H", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1042", 'teamname'=>"TV Arlesheim H3", 'liga'=>"4L H", 'vereinno'=>1002, 'vereinname'=>"TV Arlesheim")
,array('teamno'=>"1081", 'teamname'=>"VBC Bärschwil", 'liga'=>"4L D", 'vereinno'=>1141, 'vereinname'=>"VBC Bärschwil")
,array('teamno'=>"1073", 'teamname'=>"KTV Basel ", 'liga'=>"3L H", 'vereinno'=>1006, 'vereinname'=>"KTV Basel ")
,array('teamno'=>"1009", 'teamname'=>"KTV Basel", 'liga'=>"3L D", 'vereinno'=>1006, 'vereinname'=>"KTV Basel ")
,array('teamno'=>"1017", 'teamname'=>"KTV Basel 1915", 'liga'=>"2L H", 'vereinno'=>1006, 'vereinname'=>"KTV Basel ")
,array('teamno'=>"1254", 'teamname'=>"Traktor Basel 3", 'liga'=>"3L H", 'vereinno'=>1007, 'vereinname'=>"Traktor Basel")
,array('teamno'=>"1303", 'teamname'=>"Traktor Basel 4", 'liga'=>"4L H", 'vereinno'=>1007, 'vereinname'=>"Traktor Basel")
,array('teamno'=>"1402", 'teamname'=>"Traktor Basel Junioren U17", 'liga'=>"U17 H", 'vereinno'=>1007, 'vereinname'=>"Traktor Basel")
,array('teamno'=>"1335", 'teamname'=>"Traktor Basel Junioren U19", 'liga'=>"U19 H", 'vereinno'=>1007, 'vereinname'=>"Traktor Basel")
,array('teamno'=>"1350", 'teamname'=>"Traktor Basel Junioren U23", 'liga'=>"U23 H", 'vereinno'=>1007, 'vereinname'=>"Traktor Basel")
,array('teamno'=>"1129", 'teamname'=>"VB Binningen 1", 'liga'=>"4L D", 'vereinno'=>1010, 'vereinname'=>"VB Binningen")
,array('teamno'=>"1344", 'teamname'=>"VB Binningen 2", 'liga'=>"DP 2L", 'vereinno'=>1010, 'vereinname'=>"VB Binningen")
,array('teamno'=>"1336", 'teamname'=>"VB Binningen 3", 'liga'=>"5L D", 'vereinno'=>1010, 'vereinname'=>"VB Binningen")
,array('teamno'=>"1404", 'teamname'=>"VB Binningen U17", 'liga'=>"U17 D", 'vereinno'=>1010, 'vereinname'=>"VB Binningen")
,array('teamno'=>"1085", 'teamname'=>"TV Bretzwil", 'liga'=>"5L D", 'vereinno'=>1011, 'vereinname'=>"TV Bretzwil")
,array('teamno'=>"1044", 'teamname'=>"VBC Brislach", 'liga'=>"3L D", 'vereinno'=>1012, 'vereinname'=>"VBC Brislach")
,array('teamno'=>"1102", 'teamname'=>"VBC Brislach", 'liga'=>"MP 3L", 'vereinno'=>1012, 'vereinname'=>"VBC Brislach")
,array('teamno'=>"1375", 'teamname'=>"VBC Brislach", 'liga'=>"5L D", 'vereinno'=>1012, 'vereinname'=>"VBC Brislach")
,array('teamno'=>"1388", 'teamname'=>" VBC Bubendorf U23 2", 'liga'=>"U23 H", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1063", 'teamname'=>"VBC Bubendorf 1", 'liga'=>"2L H", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1005", 'teamname'=>"VBC Bubendorf D1", 'liga'=>"3L D", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1064", 'teamname'=>"VBC Bubendorf D2", 'liga'=>"4L D", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1331", 'teamname'=>"VBC Bubendorf D3", 'liga'=>"4L D", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1332", 'teamname'=>"VBC Bubendorf H2", 'liga'=>"4L H", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1068", 'teamname'=>"VBC Bubendorf Mixed", 'liga'=>"MP 1L", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1359", 'teamname'=>"VBC Bubendorf U17 1", 'liga'=>"U17 D", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1389", 'teamname'=>"VBC Bubendorf U19", 'liga'=>"U19 D", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1414", 'teamname'=>"VBC Bubendorf U23 1", 'liga'=>"U23 H", 'vereinno'=>1103, 'vereinname'=>"VBC Bubendorf")
,array('teamno'=>"1075", 'teamname'=>"VB Ettingen", 'liga'=>"4L D", 'vereinno'=>1014, 'vereinname'=>"VB Ettingen")
,array('teamno'=>"1269", 'teamname'=>"FP Olympia 1", 'liga'=>"2L H", 'vereinno'=>1015, 'vereinname'=>"FP Olympia")
,array('teamno'=>"1158", 'teamname'=>"FP Olympia D1", 'liga'=>"4L D", 'vereinno'=>1015, 'vereinname'=>"FP Olympia")
,array('teamno'=>"1159", 'teamname'=>"FP Olympia H2", 'liga'=>"4L H", 'vereinno'=>1015, 'vereinname'=>"FP Olympia")
,array('teamno'=>"1247", 'teamname'=>"TV Frenkendorf", 'liga'=>"DP 1L", 'vereinno'=>1016, 'vereinname'=>"TV Frenkendorf")
,array('teamno'=>"1016", 'teamname'=>"VBC Gelterkinden", 'liga'=>"2L H", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1135", 'teamname'=>"VBC Gelterkinden D1", 'liga'=>"3L D", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1136", 'teamname'=>"VBC Gelterkinden D2", 'liga'=>"4L D", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1137", 'teamname'=>"VBC Gelterkinden D3", 'liga'=>"5L D", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1415", 'teamname'=>"VBC Gelterkinden DU15", 'liga'=>"U15 D", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1206", 'teamname'=>"VBC Gelterkinden DU17", 'liga'=>"U17 D", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1403", 'teamname'=>"VBC Gelterkinden DU23", 'liga'=>"U23 D SK2", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1403", 'teamname'=>"VBC Gelterkinden DU23", 'liga'=>"Quali CH-MS", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1134", 'teamname'=>"VBC Gelterkinden H2", 'liga'=>"3L H", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1392", 'teamname'=>"VBC Gelterkinden H3", 'liga'=>"4L H", 'vereinno'=>1017, 'vereinname'=>"VBC Gelterkinden")
,array('teamno'=>"1416", 'teamname'=>"Juniorinnen Volley Glaibasel", 'liga'=>"U17 D", 'vereinno'=>1018, 'vereinname'=>"Volley Glaibasel")
,array('teamno'=>"1311", 'teamname'=>"Volley Glaibasel", 'liga'=>"5L D", 'vereinno'=>1018, 'vereinname'=>"Volley Glaibasel")
,array('teamno'=>"1142", 'teamname'=>"Volley Glaibasel D1", 'liga'=>"2L D", 'vereinno'=>1018, 'vereinname'=>"Volley Glaibasel")
,array('teamno'=>"1143", 'teamname'=>"Volley Glaibasel D2", 'liga'=>"3L D", 'vereinno'=>1018, 'vereinname'=>"Volley Glaibasel")
,array('teamno'=>"1299", 'teamname'=>"TV Itingen", 'liga'=>"2L D", 'vereinno'=>1020, 'vereinname'=>"TV Itingen")
,array('teamno'=>"1243", 'teamname'=>"VBC Kaiseraugst", 'liga'=>"DP 2L", 'vereinno'=>1022, 'vereinname'=>"VBC Kaiseraugst")
,array('teamno'=>"1070", 'teamname'=>"VBC Kaiseraugst 1", 'liga'=>"4L D", 'vereinno'=>1022, 'vereinname'=>"VBC Kaiseraugst")
,array('teamno'=>"1341", 'teamname'=>"VBC Laufen 3", 'liga'=>"3L H", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1372", 'teamname'=>"VBC Laufen D2", 'liga'=>"4L D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1364", 'teamname'=>"VBC Laufen D3", 'liga'=>"4L D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1337", 'teamname'=>"VBC Laufen D4", 'liga'=>"3L D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1338", 'teamname'=>"VBC Laufen D5", 'liga'=>"4L D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1339", 'teamname'=>"VBC Laufen D6", 'liga'=>"4L D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1365", 'teamname'=>"VBC Laufen H2", 'liga'=>"2L H", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1387", 'teamname'=>"VBC Laufen HU23", 'liga'=>"U23 H", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1384", 'teamname'=>"VBC Laufen U17", 'liga'=>"U17 D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1385", 'teamname'=>"VBC Laufen U19-1", 'liga'=>"U19 D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1394", 'teamname'=>"VBC Laufen U19-2", 'liga'=>"U19 D", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1342", 'teamname'=>"VBC Laufen U23 1", 'liga'=>"U23 D SK2", 'vereinno'=>1024, 'vereinname'=>"VBC Laufen")
,array('teamno'=>"1020", 'teamname'=>"SV Lausen", 'liga'=>"4L D", 'vereinno'=>1025, 'vereinname'=>"SV Lausen")
,array('teamno'=>"1400", 'teamname'=>"SV Lausen", 'liga'=>"DP 2L", 'vereinno'=>1025, 'vereinname'=>"SV Lausen")
,array('teamno'=>"1411", 'teamname'=>"SC Gym Leonhard", 'liga'=>"U19 D", 'vereinno'=>1026, 'vereinname'=>"SC Gym Leonhard")
,array('teamno'=>"1410", 'teamname'=>"SC Gym Leonhard", 'liga'=>"U17 D", 'vereinno'=>1026, 'vereinname'=>"SC Gym Leonhard")
,array('teamno'=>"1412", 'teamname'=>"SC Gym Leonhard", 'liga'=>"U23 H", 'vereinno'=>1026, 'vereinname'=>"SC Gym Leonhard")
,array('teamno'=>"1413", 'teamname'=>"SC Gym Leonhard", 'liga'=>"U15 D", 'vereinno'=>1026, 'vereinname'=>"SC Gym Leonhard")
,array('teamno'=>"1413", 'teamname'=>"SC Gym Leonhard", 'liga'=>"Quali CH-MS", 'vereinno'=>1026, 'vereinname'=>"SC Gym Leonhard")
,array('teamno'=>"1076", 'teamname'=>"VBC Liesberg", 'liga'=>"5L D", 'vereinno'=>1052, 'vereinname'=>"VBC Liesberg")
,array('teamno'=>"1196", 'teamname'=>"VBC Gym Liestal", 'liga'=>"U17 D", 'vereinno'=>1027, 'vereinname'=>"VBC Gym Liestal")
,array('teamno'=>"1195", 'teamname'=>"VBC Gym Liestal 1", 'liga'=>"U19 D", 'vereinno'=>1027, 'vereinname'=>"VBC Gym Liestal")
,array('teamno'=>"1087", 'teamname'=>"VBC Gym Liestal D1", 'liga'=>"2L D", 'vereinno'=>1027, 'vereinname'=>"VBC Gym Liestal")
,array('teamno'=>"1234", 'teamname'=>"VBC Gym Liestal D2", 'liga'=>"5L D", 'vereinno'=>1027, 'vereinname'=>"VBC Gym Liestal")
,array('teamno'=>"1038", 'teamname'=>"VBC Münchenstein", 'liga'=>"Quali CH-MS", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1217", 'teamname'=>"VBC Münchenstein", 'liga'=>"U17 D", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1250", 'teamname'=>"VBC Münchenstein", 'liga'=>"U19 D", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1250", 'teamname'=>"VBC Münchenstein", 'liga'=>"Quali CH-MS", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1034", 'teamname'=>"VBC Münchenstein 1", 'liga'=>"3L D", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1035", 'teamname'=>"VBC Münchenstein 2", 'liga'=>"3L D", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1036", 'teamname'=>"VBC Münchenstein 3", 'liga'=>"4L D", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1300", 'teamname'=>"VBC Münchenstein 4", 'liga'=>"4L D", 'vereinno'=>1029, 'vereinname'=>"VBC Münchenstein")
,array('teamno'=>"1163", 'teamname'=>"TV Muttenz", 'liga'=>"3L H", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1162", 'teamname'=>"TV Muttenz 1", 'liga'=>"3L D", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1160", 'teamname'=>"TV Muttenz 2", 'liga'=>"4L D", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1167", 'teamname'=>"TV Muttenz 3", 'liga'=>"4L D", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1161", 'teamname'=>"TV Muttenz 4", 'liga'=>"4L D", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1168", 'teamname'=>"TV Muttenz U15", 'liga'=>"U15 D", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1166", 'teamname'=>"TV Muttenz U17", 'liga'=>"U17 D", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1165", 'teamname'=>"TV Muttenz U19", 'liga'=>"U19 D", 'vereinno'=>1030, 'vereinname'=>"TV Muttenz")
,array('teamno'=>"1055", 'teamname'=>"SC Novartis D1", 'liga'=>"3L D", 'vereinno'=>1023, 'vereinname'=>"SC Novartis")
,array('teamno'=>"1054", 'teamname'=>"SC Novartis H1", 'liga'=>"3L H", 'vereinno'=>1023, 'vereinname'=>"SC Novartis")
,array('teamno'=>"1072", 'teamname'=>"DR Nunningen", 'liga'=>"4L D", 'vereinno'=>1033, 'vereinname'=>"DR Nunningen")
,array('teamno'=>"1345", 'teamname'=>"NS Pratteln", 'liga'=>"DP 1L", 'vereinno'=>1034, 'vereinname'=>"TV Pratteln NS")
,array('teamno'=>"1121", 'teamname'=>"TV Pratteln NS 1", 'liga'=>"4L D", 'vereinno'=>1034, 'vereinname'=>"TV Pratteln NS")
,array('teamno'=>"1122", 'teamname'=>"TV Pratteln NS 2", 'liga'=>"5L D", 'vereinno'=>1034, 'vereinname'=>"TV Pratteln NS")
,array('teamno'=>"1123", 'teamname'=>"TV Pratteln NS U23", 'liga'=>"U23 D SK2", 'vereinno'=>1034, 'vereinname'=>"TV Pratteln NS")
,array('teamno'=>"1014", 'teamname'=>"KTV Riehen", 'liga'=>"2L H", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1215", 'teamname'=>"KTV Riehen 1", 'liga'=>"U15 D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1237", 'teamname'=>"KTV Riehen 2", 'liga'=>"U17 D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1004", 'teamname'=>"KTV Riehen 2 (2L-D)", 'liga'=>"2L D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1112", 'teamname'=>"KTV Riehen 3", 'liga'=>"3L D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1113", 'teamname'=>"KTV Riehen 4", 'liga'=>"4L D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1362", 'teamname'=>"KTV Riehen 5", 'liga'=>"5L D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1315", 'teamname'=>"KTV Riehen A", 'liga'=>"U19 D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1366", 'teamname'=>"KTV Riehen Damen 6", 'liga'=>"5L D", 'vereinno'=>1036, 'vereinname'=>"KTV Riehen")
,array('teamno'=>"1083", 'teamname'=>"Volley Sissach", 'liga'=>"MP 3L", 'vereinno'=>1039, 'vereinname'=>"VRTV Sissach")
,array('teamno'=>"1110", 'teamname'=>"VRTV Sissach", 'liga'=>"4L D", 'vereinno'=>1039, 'vereinname'=>"VRTV Sissach")
,array('teamno'=>"1314", 'teamname'=>"VRTV Sissach", 'liga'=>"U23 D SK2", 'vereinno'=>1039, 'vereinname'=>"VRTV Sissach")
,array('teamno'=>"1093", 'teamname'=>"Cappuccinos", 'liga'=>"MP 1L", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1008", 'teamname'=>"Sm' Aesch Pfeffingen 3", 'liga'=>"2L D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1089", 'teamname'=>"Sm' Aesch Pfeffingen 4", 'liga'=>"2L D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1090", 'teamname'=>"Sm' Aesch Pfeffingen 5", 'liga'=>"3L D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1091", 'teamname'=>"Sm' Aesch Pfeffingen 6", 'liga'=>"4L D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1304", 'teamname'=>"Sm' Aesch Pfeffingen 7", 'liga'=>"4L D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1305", 'teamname'=>"Sm' Aesch Pfeffingen 8", 'liga'=>"3L D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1363", 'teamname'=>"Sm' Aesch Pfeffingen 9", 'liga'=>"5L D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1100", 'teamname'=>"Sm' Aesch Pfeffingen U17-1", 'liga'=>"U17 D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1100", 'teamname'=>"Sm' Aesch Pfeffingen U17-1", 'liga'=>"Quali CH-MS", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1360", 'teamname'=>"Sm' Aesch Pfeffingen U23", 'liga'=>"Quali CH-MS", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1407", 'teamname'=>"Sm'Aesch Pfeffingen U19-1", 'liga'=>"U19 D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1407", 'teamname'=>"Sm'Aesch Pfeffingen U19-1", 'liga'=>"Quali CH-MS", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1408", 'teamname'=>"Sm'Aesch Pfeffingen U19-2", 'liga'=>"U19 D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1104", 'teamname'=>"Sm\' Aesch Pfeffingen U15-1", 'liga'=>"U15 D", 'vereinno'=>1040, 'vereinname'=>"Sm' Aesch Pfeffingen")
,array('teamno'=>"1096", 'teamname'=>"TV St. Johann", 'liga'=>"2L H", 'vereinno'=>1043, 'vereinname'=>"TV St.Johann")
,array('teamno'=>"1302", 'teamname'=>"TV St. Johann 2", 'liga'=>"4L D", 'vereinno'=>1043, 'vereinname'=>"TV St.Johann")
,array('teamno'=>"1301", 'teamname'=>"TV St. Johann 3", 'liga'=>"5L D", 'vereinno'=>1043, 'vereinname'=>"TV St.Johann")
,array('teamno'=>"1024", 'teamname'=>"TV St.Johann 1", 'liga'=>"4L D", 'vereinno'=>1043, 'vereinname'=>"TV St.Johann")
,array('teamno'=>"1194", 'teamname'=>"TV St.Johann 4", 'liga'=>"DP 1L", 'vereinno'=>1043, 'vereinname'=>"TV St.Johann")
,array('teamno'=>"1398", 'teamname'=>"TVSTJ Damen 5", 'liga'=>"DP 2L", 'vereinno'=>1043, 'vereinname'=>"TV St.Johann")
,array('teamno'=>"1045", 'teamname'=>"VBC Tecknau", 'liga'=>"4L H", 'vereinno'=>1044, 'vereinname'=>"VBC Tecknau")
,array('teamno'=>"1046", 'teamname'=>"VBC Tecknau", 'liga'=>"4L D", 'vereinno'=>1044, 'vereinname'=>"VBC Tecknau")
,array('teamno'=>"1170", 'teamname'=>"VBC Tenniken", 'liga'=>"4L D", 'vereinno'=>1045, 'vereinname'=>"VBC Tenniken")
,array('teamno'=>"1324", 'teamname'=>"VB Therwil D U15", 'liga'=>"U15 D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1208", 'teamname'=>"VB Therwil D U17 A", 'liga'=>"U17 D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1374", 'teamname'=>"VB Therwil D U19 A", 'liga'=>"U19 D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1409", 'teamname'=>"VB Therwil D U19 B", 'liga'=>"U19 D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1373", 'teamname'=>"VB Therwil D2", 'liga'=>"2L D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1002", 'teamname'=>"VB Therwil D3", 'liga'=>"2L D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1183", 'teamname'=>"VB Therwil D4", 'liga'=>"3L D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1307", 'teamname'=>"VB Therwil D5", 'liga'=>"4L D", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1180", 'teamname'=>"VB Therwil H1", 'liga'=>"2L H", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1361", 'teamname'=>"VB Therwil H2", 'liga'=>"3L H", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1270", 'teamname'=>"VB Therwil H3", 'liga'=>"3L H", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1393", 'teamname'=>"VB Therwil H4", 'liga'=>"4L H", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1386", 'teamname'=>"VB Therwil KU23", 'liga'=>"U23 H", 'vereinno'=>1046, 'vereinname'=>"VB Therwil")
,array('teamno'=>"1086", 'teamname'=>"SVKT Therwil", 'liga'=>"DP 2L", 'vereinno'=>1047, 'vereinname'=>"SVKT Therwil")
,array('teamno'=>"1007", 'teamname'=>"SC Uni Basel 1", 'liga'=>"2L D", 'vereinno'=>1048, 'vereinname'=>"SC Uni Basel")
,array('teamno'=>"1051", 'teamname'=>"SC Uni Basel 2", 'liga'=>"4L D", 'vereinno'=>1048, 'vereinname'=>"SC Uni Basel")
,array('teamno'=>"1125", 'teamname'=>"VBC Zeiningen", 'liga'=>"DP 2L", 'vereinno'=>1050, 'vereinname'=>"VBC Zeiningen")
);
		 return $regionaleTeams;
	}
	
	public function getNationalTeamRec($teamNo) {
		foreach ($this->getNationaleTeams() as $rec) {
			if (strcmp($rec["teamno"], $teamNo) == 0) {
				return $rec;
			}
		}
	}
	
	public function getNationaleTeams() {
		$nationaleTeams = array(array('teamno'=>"32814", 'vereinno'=>915155, 'liga'=>"1L-H", 'teamname'=>"#Dragons Lugano", 'vereinname'=>"#Dragons Lugano")
,array('teamno'=>"32993", 'vereinno'=>909102, 'liga'=>"1L-H", 'teamname'=>"Basel Traktor 2", 'vereinname'=>"Basel Traktor")
,array('teamno'=>"32583", 'vereinno'=>914190, 'liga'=>"NLA-H", 'teamname'=>"biogas volley näfels I", 'vereinname'=>"Volley Näfels")
,array('teamno'=>"32580", 'vereinno'=>901060, 'liga'=>"NLA-H", 'teamname'=>"Chênois Genève Volleyball I", 'vereinname'=>"Chênois Genève Volleyball")
,array('teamno'=>"33491", 'vereinno'=>901060, 'liga'=>"1L-H", 'teamname'=>"Chênois Genève Volleyball II", 'vereinname'=>"Chênois Genève Volleyball")
,array('teamno'=>"32559", 'vereinno'=>904060, 'liga'=>"NLB-H", 'teamname'=>"Colombier Volley I", 'vereinname'=>"Colombier Volley")
,array('teamno'=>"33339", 'vereinno'=>904060, 'liga'=>"1L-H", 'teamname'=>"Colombier Volley II", 'vereinname'=>"Colombier Volley")
,array('teamno'=>"32795", 'vereinno'=>907345, 'liga'=>"NLA-D", 'teamname'=>"Edelline Köniz", 'vereinname'=>"Volley Köniz")
,array('teamno'=>"31993", 'vereinno'=>901085, 'liga'=>"NLB-D", 'teamname'=>"Genève Volley", 'vereinname'=>"Genève Volley")
,array('teamno'=>"33492", 'vereinno'=>901085, 'liga'=>"1L-D", 'teamname'=>"Genève Volley II", 'vereinname'=>"Genève Volley")
,array('teamno'=>"33048", 'vereinno'=>901105, 'liga'=>"1L-H", 'teamname'=>"Groupement Sportif du CERN", 'vereinname'=>"Groupement Sportif du CERN")
,array('teamno'=>"31979", 'vereinno'=>909610, 'liga'=>"1L-D", 'teamname'=>"KTV Riehen", 'vereinname'=>"KTV Riehen")
,array('teamno'=>"31965", 'vereinno'=>914110, 'liga'=>"NLA-D", 'teamname'=>"KULAchange VBC Galina", 'vereinname'=>"VBC Galina")
,array('teamno'=>"32582", 'vereinno'=>902250, 'liga'=>"NLA-H", 'teamname'=>"Lausanne UC I", 'vereinname'=>"Lausanne UC")
,array('teamno'=>"32568", 'vereinno'=>902250, 'liga'=>"NLB-H", 'teamname'=>"Lausanne UC II", 'vereinname'=>"Lausanne UC")
,array('teamno'=>"32527", 'vereinno'=>911630, 'liga'=>"1L-H", 'teamname'=>"LK Zug H1", 'vereinname'=>"LK Zug Volleyball")
,array('teamno'=>"32642", 'vereinno'=>902290, 'liga'=>"NLB-H", 'teamname'=>"Lutry-Lavaux Volleyball I", 'vereinname'=>"Lutry-Lavaux Volleyball")
,array('teamno'=>"31695", 'vereinno'=>915112, 'liga'=>"1L-D", 'teamname'=>"Moesa Volley 1", 'vereinname'=>"Moesa Volley")
,array('teamno'=>"32546", 'vereinno'=>913252, 'liga'=>"NLB-H", 'teamname'=>"Pallavolo Kreuzlingen ", 'vereinname'=>"Pallavolo Kreuzlingen")
,array('teamno'=>"31946", 'vereinno'=>913252, 'liga'=>"1L-D", 'teamname'=>"Pallavolo Kreuzlingen ", 'vereinname'=>"Pallavolo Kreuzlingen")
,array('teamno'=>"31958", 'vereinno'=>911401, 'liga'=>"NLB-D", 'teamname'=>"Raiffeisen Volleya Obwalden", 'vereinname'=>"Raiffeisen Volleya Obwalden")
,array('teamno'=>"32794", 'vereinno'=>914220, 'liga'=>"1L-D", 'teamname'=>"Rätia Volley", 'vereinname'=>"Rätia Volley")
,array('teamno'=>"32521", 'vereinno'=>908350, 'liga'=>"1L-H", 'teamname'=>"Regio Volleyteam ", 'vereinname'=>"Regio Volleyteam")
,array('teamno'=>"31919", 'vereinno'=>915041, 'liga'=>"1L-D", 'teamname'=>"SAG Gordola", 'vereinname'=>"SAG Gordola")
,array('teamno'=>"32005", 'vereinno'=>909660, 'liga'=>"NLA-D", 'teamname'=>"Sm`Aesch Pfeffingen I", 'vereinname'=>"Sm`Aesch Pfeffingen")
,array('teamno'=>"31901", 'vereinno'=>909660, 'liga'=>"1L-D", 'teamname'=>"Sm`Aesch Pfeffingen II", 'vereinname'=>"Sm`Aesch Pfeffingen")
,array('teamno'=>"32440", 'vereinno'=>907730, 'liga'=>"1L-H", 'teamname'=>"STB Volley", 'vereinname'=>"STB Volley")
,array('teamno'=>"32529", 'vereinno'=>913570, 'liga'=>"1L-H", 'teamname'=>"STV Wil 1 ", 'vereinname'=>"STV Wil")
,array('teamno'=>"32624", 'vereinno'=>909102, 'liga'=>"NLB-H", 'teamname'=>"Traktor Basel 1", 'vereinname'=>"Basel Traktor")
,array('teamno'=>"31990", 'vereinno'=>906100, 'liga'=>"NLA-D", 'teamname'=>"TS Volley Düdingen I", 'vereinname'=>"TS Volley Düdingen")
,array('teamno'=>"31933", 'vereinno'=>906100, 'liga'=>"1L-D", 'teamname'=>"TS Volley Düdingen II", 'vereinname'=>"TS Volley Düdingen")
,array('teamno'=>"32547", 'vereinno'=>914130, 'liga'=>"NLA-H", 'teamname'=>"TSV Jona Volleyball", 'vereinname'=>"TSV Jona Volleyball")
,array('teamno'=>"31999", 'vereinno'=>914130, 'liga'=>"1L-D", 'teamname'=>"TSV Jona Volleyball (D1)", 'vereinname'=>"TSV Jona Volleyball")
,array('teamno'=>"33006", 'vereinno'=>914130, 'liga'=>"1L-H", 'teamname'=>"TSV Jona Volleyball (H2)", 'vereinname'=>"TSV Jona Volleyball")
,array('teamno'=>"31911", 'vereinno'=>908150, 'liga'=>"1L-D", 'teamname'=>"TV Grenchen ", 'vereinname'=>"TV Grenchen")
,array('teamno'=>"32575", 'vereinno'=>910292, 'liga'=>"1L-H", 'teamname'=>"TV Lunkhofen", 'vereinname'=>"TV Lunkhofen")
,array('teamno'=>"32099", 'vereinno'=>910292, 'liga'=>"1L-D", 'teamname'=>"TV Lunkhofen 1", 'vereinname'=>"TV Lunkhofen")
,array('teamno'=>"31983", 'vereinno'=>906260, 'liga'=>"1L-D", 'teamname'=>"TV Murten Volleyball", 'vereinname'=>"TV Murten Volleyball")
,array('teamno'=>"32570", 'vereinno'=>906260, 'liga'=>"1L-H", 'teamname'=>"TV Murten Volleyball", 'vereinname'=>"TV Murten Volleyball")
,array('teamno'=>"32431", 'vereinno'=>907458, 'liga'=>"1L-H", 'teamname'=>"U60 Muristalden", 'vereinname'=>"U60 Muristalden")
,array('teamno'=>"31951", 'vereinno'=>911440, 'liga'=>"NLB-D", 'teamname'=>"VB Fides Ruswil", 'vereinname'=>"VB Fides Ruswil")
,array('teamno'=>"31934", 'vereinno'=>911380, 'liga'=>"1L-D", 'teamname'=>"VB Neuenkirch 1", 'vereinname'=>"Neuenkirch VB")
,array('teamno'=>"32002", 'vereinno'=>909740, 'liga'=>"NLB-D", 'teamname'=>"VB Therwil", 'vereinname'=>"VB Therwil")
,array('teamno'=>"31998", 'vereinno'=>913010, 'liga'=>"NLB-D", 'teamname'=>"VBC Aadorf I", 'vereinname'=>"VBC Aadorf")
,array('teamno'=>"31978", 'vereinno'=>913010, 'liga'=>"1L-D", 'teamname'=>"VBC Aadorf II", 'vereinname'=>"VBC Aadorf")
,array('teamno'=>"32558", 'vereinno'=>908030, 'liga'=>"1L-H", 'teamname'=>"VBC Aeschi ", 'vereinname'=>"VBC Aeschi")
,array('teamno'=>"31952", 'vereinno'=>913040, 'liga'=>"1L-D", 'teamname'=>"VBC Andwil-Arnegg", 'vereinname'=>"VBC Andwil-Arnegg")
,array('teamno'=>"32661", 'vereinno'=>913040, 'liga'=>"1L-H", 'teamname'=>"VBC Andwil-Arnegg 2", 'vereinname'=>"VBC Andwil-Arnegg")
,array('teamno'=>"31941", 'vereinno'=>907110, 'liga'=>"1L-D", 'teamname'=>"VBC Bern", 'vereinname'=>"VBC Bern")
,array('teamno'=>"33493", 'vereinno'=>906040, 'liga'=>"1L-D", 'teamname'=>"VBC Bösingen", 'vereinname'=>"VBC Bösingen")
,array('teamno'=>"32555", 'vereinno'=>911050, 'liga'=>"1L-H", 'teamname'=>"VBC Buochs", 'vereinname'=>"VBC Buochs")
,array('teamno'=>"31994", 'vereinno'=>902150, 'liga'=>"NLA-D", 'teamname'=>"VBC Cheseaux I", 'vereinname'=>"VBC Cheseaux")
,array('teamno'=>"31977", 'vereinno'=>902150, 'liga'=>"1L-D", 'teamname'=>"VBC Cheseaux II", 'vereinname'=>"VBC Cheseaux")
,array('teamno'=>"31982", 'vereinno'=>902170, 'liga'=>"1L-D", 'teamname'=>"VBC Cossonay I", 'vereinname'=>"VBC Cossonay")
,array('teamno'=>"32484", 'vereinno'=>905160, 'liga'=>"1L-H", 'teamname'=>"VBC Delémont", 'vereinname'=>"VBC Delemont")
,array('teamno'=>"32548", 'vereinno'=>912150, 'liga'=>"NLA-H", 'teamname'=>"VBC Einsiedeln", 'vereinname'=>"VBC Einsiedeln")
,array('teamno'=>"31975", 'vereinno'=>906150, 'liga'=>"NLB-D", 'teamname'=>"VBC Fribourg", 'vereinname'=>"VBC Fribourg")
,array('teamno'=>"32563", 'vereinno'=>903060, 'liga'=>"1L-H", 'teamname'=>"VBC Fully", 'vereinname'=>"VBC Fully")
,array('teamno'=>"31967", 'vereinno'=>908120, 'liga'=>"NLB-D", 'teamname'=>"VBC Gerlafingen", 'vereinname'=>"VBC Gerlafingen")
,array('teamno'=>"31997", 'vereinno'=>914120, 'liga'=>"NLB-D", 'teamname'=>"VBC Glaronia", 'vereinname'=>"VBC Glaronia")
,array('teamno'=>"31973", 'vereinno'=>904230, 'liga'=>"NLB-D", 'teamname'=>"VBC Groupe E Val-de-Travers", 'vereinname'=>"VBC Val-de-Travers")
,array('teamno'=>"32503", 'vereinno'=>903095, 'liga'=>"1L-H", 'teamname'=>"VBC Herren Oberwallis", 'vereinname'=>"VBC Herren Oberwallis")
,array('teamno'=>"32576", 'vereinno'=>910054, 'liga'=>"1L-H", 'teamname'=>"VBC Kanti Baden", 'vereinname'=>"VBC Kanti Baden")
,array('teamno'=>"31986", 'vereinno'=>910054, 'liga'=>"1L-D", 'teamname'=>"VBC Kanti Baden 1", 'vereinname'=>"VBC Kanti Baden")
,array('teamno'=>"32076", 'vereinno'=>912240, 'liga'=>"1L-D", 'teamname'=>"VBC Kanti Limmattal 1", 'vereinname'=>"VBC Limmattal KS")
,array('teamno'=>"31820", 'vereinno'=>906205, 'liga'=>"1L-D", 'teamname'=>"VBC Kerzers", 'vereinname'=>"VBC Kerzers")
,array('teamno'=>"32515", 'vereinno'=>902239, 'liga'=>"1L-H", 'teamname'=>"VBC La Côte", 'vereinname'=>"VBC La Côte")
,array('teamno'=>"32506", 'vereinno'=>904050, 'liga'=>"1L-H", 'teamname'=>"VBC La-Chaux-de-Fonds", 'vereinname'=>"VBC La Chaux-de-Fonds")
,array('teamno'=>"32572", 'vereinno'=>909340, 'liga'=>"NLB-H", 'teamname'=>"VBC Laufen", 'vereinname'=>"VBC Laufen")
,array('teamno'=>"32003", 'vereinno'=>909340, 'liga'=>"1L-D", 'teamname'=>"VBC Laufen", 'vereinname'=>"VBC Laufen")
,array('teamno'=>"32505", 'vereinno'=>902240, 'liga'=>"1L-H", 'teamname'=>"VBC Lausanne", 'vereinname'=>"VBC Lausanne")
,array('teamno'=>"32675", 'vereinno'=>911360, 'liga'=>"NLB-H", 'teamname'=>"VBC Malters ", 'vereinname'=>"VBC Malters")
,array('teamno'=>"31985", 'vereinno'=>907450, 'liga'=>"NLB-D", 'teamname'=>"VBC Münchenbuchsee", 'vereinname'=>"VBC Münchenbuchsee")
,array('teamno'=>"31984", 'vereinno'=>907440, 'liga'=>"1L-D", 'teamname'=>"VBC Münsingen", 'vereinname'=>"VBC Münsingen")
,array('teamno'=>"32538", 'vereinno'=>905270, 'liga'=>"1L-H", 'teamname'=>"VBC Nidau ", 'vereinname'=>"Nidau Volleyballclub")
,array('teamno'=>"32242", 'vereinno'=>904140, 'liga'=>"NLB-D", 'teamname'=>"VBC NUC II", 'vereinname'=>"VBC NUC")
,array('teamno'=>"32280", 'vereinno'=>910450, 'liga'=>"1L-D", 'teamname'=>"VBC Oftringen 1", 'vereinname'=>"VBC Oftringen")
,array('teamno'=>"32478", 'vereinno'=>901170, 'liga'=>"NLB-H", 'teamname'=>"VBC Servette Star-Onex", 'vereinname'=>"VBC Servette Star-Onex")
,array('teamno'=>"31976", 'vereinno'=>901170, 'liga'=>"1L-D", 'teamname'=>"VBC Servette Star-Onex", 'vereinname'=>"VBC Servette Star-Onex")
,array('teamno'=>"32000", 'vereinno'=>903270, 'liga'=>"1L-D", 'teamname'=>"VBC Sion", 'vereinname'=>"VBC Sion")
,array('teamno'=>"31996", 'vereinno'=>911570, 'liga'=>"NLB-D", 'teamname'=>"VBC Steinhausen", 'vereinname'=>"VBC Steinhausen")
,array('teamno'=>"32541", 'vereinno'=>907820, 'liga'=>"NLA-H", 'teamname'=>"VBC Uni Bern ", 'vereinname'=>"VBC Uni Bern ")
,array('teamno'=>"32131", 'vereinno'=>907820, 'liga'=>"1L-D", 'teamname'=>"VBC Uni Bern", 'vereinname'=>"VBC Uni Bern ")
,array('teamno'=>"32991", 'vereinno'=>907820, 'liga'=>"1L-H", 'teamname'=>"VBC Uni Bern ", 'vereinname'=>"VBC Uni Bern ")
,array('teamno'=>"32762", 'vereinno'=>904220, 'liga'=>"1L-D", 'teamname'=>"VBC Val-de-Ruz Sport", 'vereinname'=>"VBC Val-de-Ruz Sport")
,array('teamno'=>"31906", 'vereinno'=>903300, 'liga'=>"1L-D", 'teamname'=>"VBC Visp", 'vereinname'=>"VBC Visp")
,array('teamno'=>"32581", 'vereinno'=>912470, 'liga'=>"NLB-H", 'teamname'=>"VBC Voléro Zürich I", 'vereinname'=>"VBC Voléro Zürich")
,array('teamno'=>"32542", 'vereinno'=>912520, 'liga'=>"1L-H", 'teamname'=>"VBC Wetzikon", 'vereinname'=>"VBC Wetzikon ")
,array('teamno'=>"31878", 'vereinno'=>913585, 'liga'=>"1L-D", 'teamname'=>"VBC Wittenbach 1", 'vereinname'=>"VBC Wittenbach")
,array('teamno'=>"32436", 'vereinno'=>902500, 'liga'=>"1L-H", 'teamname'=>"VBC Yverdon ", 'vereinname'=>"VBC Yverdon")
,array('teamno'=>"31988", 'vereinno'=>912220, 'liga'=>"NLB-D", 'teamname'=>"VBC züri unterland", 'vereinname'=>"VBC Züri Unterland")
,array('teamno'=>"32577", 'vereinno'=>912220, 'liga'=>"NLB-H", 'teamname'=>"VBC züri unterland", 'vereinname'=>"VBC Züri Unterland")
,array('teamno'=>"32174", 'vereinno'=>912220, 'liga'=>"1L-D", 'teamname'=>"VBC Züri Unterland D2", 'vereinname'=>"VBC Züri Unterland")
,array('teamno'=>"32008", 'vereinno'=>913310, 'liga'=>"NLA-D", 'teamname'=>"VC Kanti Schaffhausen I", 'vereinname'=>"VC Kanti Schaffhausen")
,array('teamno'=>"32528", 'vereinno'=>913380, 'liga'=>"NLB-H", 'teamname'=>"VC Smash Winterthur ", 'vereinname'=>"VC Smash Winterthur")
,array('teamno'=>"31909", 'vereinno'=>907810, 'liga'=>"1L-D", 'teamname'=>"VC Uettligen", 'vereinname'=>"VC Uettligen")
,array('teamno'=>"31902", 'vereinno'=>905280, 'liga'=>"1L-D", 'teamname'=>"VFM - Volleyball Franches-Montagnes II", 'vereinname'=>"VFM - Volleyball Franches-Montagnes")
,array('teamno'=>"31991", 'vereinno'=>904140, 'liga'=>"NLA-D", 'teamname'=>"Viteos NUC I", 'vereinname'=>"VBC NUC")
,array('teamno'=>"32523", 'vereinno'=>907005, 'liga'=>"1L-H", 'teamname'=>"Volero Aarberg", 'vereinname'=>"Aarberg Volero")
,array('teamno'=>"32011", 'vereinno'=>912471, 'liga'=>"NLA-D", 'teamname'=>"Volero Zürich I ", 'vereinname'=>"Volero Zürich")
,array('teamno'=>"32579", 'vereinno'=>913030, 'liga'=>"NLA-H", 'teamname'=>"Volley Amriswil I", 'vereinname'=>"Volley Amriswil")
,array('teamno'=>"32494", 'vereinno'=>913030, 'liga'=>"1L-H", 'teamname'=>"Volley Amriswil II", 'vereinname'=>"Volley Amriswil")
,array('teamno'=>"32549", 'vereinno'=>911606, 'liga'=>"1L-H", 'teamname'=>"Volley Emmen-Nord ", 'vereinname'=>"Volley Emmen-Nord")
,array('teamno'=>"32997", 'vereinno'=>907345, 'liga'=>"1L-D", 'teamname'=>"Volley Köniz II", 'vereinname'=>"Volley Köniz")
,array('teamno'=>"31914", 'vereinno'=>915038, 'liga'=>"NLA-D", 'teamname'=>"Volley Lugano I", 'vereinname'=>"Volley Lugano")
,array('teamno'=>"32741", 'vereinno'=>915038, 'liga'=>"1L-D", 'teamname'=>"Volley Lugano II", 'vereinname'=>"Volley Lugano")
,array('teamno'=>"32989", 'vereinno'=>911350, 'liga'=>"NLA-H", 'teamname'=>"Volley Luzern", 'vereinname'=>"Volley Luzern")
,array('teamno'=>"32988", 'vereinno'=>911350, 'liga'=>"NLB-D", 'teamname'=>"Volley Luzern", 'vereinname'=>"Volley Luzern")
,array('teamno'=>"31882", 'vereinno'=>911350, 'liga'=>"1L-D", 'teamname'=>"Volley Luzern II", 'vereinname'=>"Volley Luzern")
,array('teamno'=>"32689", 'vereinno'=>911350, 'liga'=>"1L-H", 'teamname'=>"Volley Luzern II", 'vereinname'=>"Volley Luzern")
,array('teamno'=>"31961", 'vereinno'=>907456, 'liga'=>"1L-D", 'teamname'=>"Volley Muri Bern", 'vereinname'=>"Volley Muri Bern")
,array('teamno'=>"33489", 'vereinno'=>907456, 'liga'=>"1L-H", 'teamname'=>"Volley Muri Bern", 'vereinname'=>"Volley Muri Bern")
,array('teamno'=>"32556", 'vereinno'=>907452, 'liga'=>"1L-H", 'teamname'=>"Volley Muristalden", 'vereinname'=>"Muristalden Volley")
,array('teamno'=>"32569", 'vereinno'=>914190, 'liga'=>"1L-H", 'teamname'=>"Volley Näfels II", 'vereinname'=>"Volley Näfels")
,array('teamno'=>"32557", 'vereinno'=>907465, 'liga'=>"NLB-H", 'teamname'=>"Volley Oberdiessbach", 'vereinname'=>"Volley Oberdiessbach")
,array('teamno'=>"32797", 'vereinno'=>910580, 'liga'=>"1L-D", 'teamname'=>"Volley Schönenwerd", 'vereinname'=>"Volley Schönenwerd")
,array('teamno'=>"32796", 'vereinno'=>910580, 'liga'=>"NLA-H", 'teamname'=>"Volley Schönenwerd I", 'vereinname'=>"Volley Schönenwerd")
,array('teamno'=>"32479", 'vereinno'=>910580, 'liga'=>"NLB-H", 'teamname'=>"Volley Schönenwerd II", 'vereinname'=>"Volley Schönenwerd")
,array('teamno'=>"33490", 'vereinno'=>910580, 'liga'=>"1L-H", 'teamname'=>"Volley Schönenwerd III", 'vereinname'=>"Volley Schönenwerd")
,array('teamno'=>"32618", 'vereinno'=>910250, 'liga'=>"NLB-H", 'teamname'=>"Volley Smash 05 Laufenburg-Kaisten", 'vereinname'=>"Volley Smash 05 Laufenburg-Kaisten")
,array('teamno'=>"31966", 'vereinno'=>913510, 'liga'=>"1L-D", 'teamname'=>"Volley Toggenburg 2", 'vereinname'=>"Volley Toggenburg")
,array('teamno'=>"32006", 'vereinno'=>913510, 'liga'=>"NLB-D", 'teamname'=>"Volley Toggenburg I", 'vereinname'=>"Volley Toggenburg")
,array('teamno'=>"32602", 'vereinno'=>912450, 'liga'=>"1L-H", 'teamname'=>"Volley Uster", 'vereinname'=>"Volley Uster")
,array('teamno'=>"32423", 'vereinno'=>907620, 'liga'=>"NLB-H", 'teamname'=>"Volleyball Papiermühle ", 'vereinname'=>"Volleyball Papiermühle")
,array('teamno'=>"31960", 'vereinno'=>915040, 'liga'=>"NLB-D", 'teamname'=>"Wolf Haus Giubiasco Volley", 'vereinname'=>"GSGV Giubiasco")
,array('teamno'=>"32009", 'vereinno'=>905280, 'liga'=>"NLA-D", 'teamname'=>"ZESAR-VFM", 'vereinname'=>"VFM - Volleyball Franches-Montagnes")
);
		return $nationaleTeams;
	}
	
  function getVolleyBaselVereine() {
	  $vereine = new VereinListe();
		$vereine->addVerein(new Verein('VBC Allschwil'                , '', '1001'))  // Swiss Volley 909020
->addVerein(new Verein('TV Arlesheim'                 , '', '1002'))  // Swiss Volley 909030
->addVerein(new Verein('VBC Bärschwil'           , '', '1141'))  // Swiss Volley 909051
->addVerein(new Verein('KTV Basel'                    , '', '1006'))  // Swiss Volley 909090
->addVerein(new Verein('Traktor Basel'                , '', '1007'))  // Swiss Volley 909102
->addVerein(new Verein('VB Binningen'                 , '', '1010'))  // Swiss Volley 909120
->addVerein(new Verein('TV Bretzwil'                  , '', '1011'))  // Swiss Volley 909177
->addVerein(new Verein('VBC Brislach'                 , '', '1012'))  // Swiss Volley 909180
->addVerein(new Verein('VBC Bubendorf'                , '', '1103'))  // Swiss Volley 909181
->addVerein(new Verein('VB Ettingen'                  , '', '1014'))  // Swiss Volley 909200
->addVerein(new Verein('FP Olympia'                   , '', '1015'))  // Swiss Volley 909210
->addVerein(new Verein('TV Frenkendorf'               , '', '1016'))  // Swiss Volley 909220
->addVerein(new Verein('VBC Gelterkinden'             , '', '1017'))  // Swiss Volley 909270
->addVerein(new Verein('Volley Glaibasel'             , '', '1018'))  // Swiss Volley 909275
->addVerein(new Verein('TV Itingen'                   , '', '1020'))  // Swiss Volley 909285
->addVerein(new Verein('VBC Kaiseraugst'              , '', '1022'))  // Swiss Volley 909288
->addVerein(new Verein('VBC Laufen'                   , '', '1024'))  // Swiss Volley 909340
->addVerein(new Verein('SV Lausen'                    , '', '1025'))  // Swiss Volley 909350
->addVerein(new Verein('SC Gym Leonhard'              , '', '1026'))  // Swiss Volley 909355
->addVerein(new Verein('VBC Liesberg'                 , '', '1052'))  // Swiss Volley 909360
->addVerein(new Verein('VBC Gym Liestal'              , '', '1027'))  // Swiss Volley 909370
->addVerein(new Verein('VBC Münchenstein'        , '', '1029'))  // Swiss Volley 909430
->addVerein(new Verein('TV Muttenz'                   , '', '1030'))  // Swiss Volley 909460
->addVerein(new Verein('SC Novartis'                  , '', '1023'))  // Swiss Volley 909330
->addVerein(new Verein('DR Nunningen'                 , '', '1033'))  // Swiss Volley 909485
->addVerein(new Verein('TV Pratteln NS'               , '', '1034'))  // Swiss Volley 909530
->addVerein(new Verein('KTV Riehen'                   , '', '1036'))  // Swiss Volley 909610
->addVerein(new Verein('VRTV Sissach'                 , '', '1039'))  // Swiss Volley 909640
->addVerein(new Verein('SmAesch Pfeffingen'         , '', '1040'))  // Swiss Volley 909660
->addVerein(new Verein('TV St.Johann'                 , '', '1043'))  // Swiss Volley 909710
->addVerein(new Verein('VBC Tecknau'                  , '', '1044'))  // Swiss Volley 909730
->addVerein(new Verein('VBC Tenniken'                 , '', '1045'))  // Swiss Volley 909735
->addVerein(new Verein('VB Therwil'                   , '', '1046'))  // Swiss Volley 909740
->addVerein(new Verein('SVKT Therwil'                 , '', '1047'))  // Swiss Volley 909745
->addVerein(new Verein('SC Uni Basel'                 , '', '1048'))  // Swiss Volley 909750
->addVerein(new Verein('VBC Zeiningen'                , '', '1050'))  // Swiss Volley 909775
;
							  
	  return $vereine;
	}

	public function getNationaleVereine() {
		$vereine = new VereinListe();
		foreach ($this->getNationaleTeams() as $team) {
			$vereine->addVerein(new Verein($team['vereinname'], $team['vereinno'], null));
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
		
		$this->teamListe['D1']     = array('teamno'   => '31979',
																 			 'verband'  => self::NATIONAL,
																			 'teamname' => 'Damen 1L',
																			 'gruppen'  => array(array('gruppeno'   => '10710',  'gruppename' => 'Qualifikationsrunde')));
		
		
		$this->teamListe['H1']    = array('teamno'    => '1014', 
				                              'teamname'  => 'Herren 1',
				                              'verband'   => self::REGIONAL,
				                              'gruppen'   => array(array('gruppeno' => '1039', 'gruppename' => 'Meisterschaft')));
		
		$this->teamListe['D2' ]   = array('teamno'    => '1004', 
				                              'teamname'  => 'Damen 2',
				                              'verband'   => self::REGIONAL,
				                              'gruppen'   => array(array('gruppeno' => '1009', 'gruppename' => 'Meisterschaft')));
		
		$this->teamListe['D3' ]   = array('teamno'    => '1112', 
				                              'teamname'  => 'Damen 3',
				                              'verband'   => self::REGIONAL,
				                              'gruppen'   => array(array('gruppeno' => '1011', 'gruppename' => 'Meisterschaft')));

		$this->teamListe['D4' ]   = array('teamno'    => '1113',
																			'teamname'  => 'Damen 4',
																			'verband'   => self::REGIONAL,
																			'gruppen'   => array(array('gruppeno' => '1017', 'gruppename' => 'Meisterschaft')));

		$this->teamListe['D5' ]   = array('teamno'    => '1362',
																			'teamname'  => 'Damen 5',
																			'verband'   => self::REGIONAL,
																			'gruppen'   => array(array('gruppeno' => '1023', 'gruppename' => 'Meisterschaft')));

		$this->teamListe['D6' ]   = array('teamno'    => '1366',
																			'teamname'  => 'Damen 6',
																			'verband'   => self::REGIONAL,
																			'gruppen'   => array(array('gruppeno' => '1024', 'gruppename' => 'Meisterschaft')));
		
		

		$this->teamListe['U23' ]  = array('teamno'    => '1376', //1114'
																			'teamname'  => 'U23',
																			'verband'   => self::REGIONAL,
																			'gruppen'   => array(array('gruppeno' => '1110', 'gruppename' => 'Meisterschaft')));
		
		$this->teamListe['U19' ]  = array('teamno'   => '1315',
																      'verband'  => self::REGIONAL,
																      'teamname' => 'KTV Riehen A',
																      'gruppen'  => array(array('gruppeno'    => '1031','gruppename' => 'Junioren Damen  U19 Gruppe A')));
		
		//$this->teamListe['U19B' ] = array('teamNo    => '',
		//																teamName  => 'U19B',
		//																	verband   => self::REGIONAL,
		//																	gruppen   => array(array(gruppeNo => '1032', gruppeName => 'Finalrunde B')));
		
		$this->teamListe['U17' ]  = array('teamno'   => '1237',
																      'verband'  => self::REGIONAL,
																      'teamname' => 'KTV Riehen 2',
																      'gruppen'  => array(array('gruppeno'    => '1034','gruppename' => 'Junioren Damen U17 Gruppe A')));
		
		//$this->teamListe['U17B' ] = array(teamNo    => '1237',
	  //  																teamName  => 'U17B',
		//																	verband   => self::REGIONAL,
		//																	gruppen   => array(array(gruppeNo => '1056', gruppeName => 'Finalrunde C')
		//																			              ,array(gruppeNo => '1035', gruppeName => 'Vorrunde')));

		$this->teamListe['U15' ]  = array('teamno'   => '1215',
																      'verband'  => self::REGIONAL,
																      'teamname' => 'KTV Riehen 1',
																      'gruppen'  => array(array('gruppeno'    => '1057','gruppename' => 'Junioren Damen U15')));

		$this->teamListe['U13' ]  = array('teamno'    => '',
																			'teamname'  => 'U13',
																			'verband'   => self::REGIONAL,
																			'gruppen'   => array(array('gruppeno' => '0', 'gruppename' => 'Meisterschaft')));
		
	}
	
	public function getTeamListe() {
		return $this->teamListe; 
	} // getTeamListe

	public function getNationaleVereineAusDerRegion() {
		return $this->nationaleVereineAusDerRegion;
   }      
   
} // KHR_Conf
	

?>
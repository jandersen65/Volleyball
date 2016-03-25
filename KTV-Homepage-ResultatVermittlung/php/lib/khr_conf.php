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
		$hallen = array(array("-2", null, null)
  ,array(halleNo=>"577", halleName=>"99er-Sporthalle beim Mühleboden", halleAdresse=>"Benkenstrasse 2, 4106 Therwil") 
  ,array(halleNo=>"381", halleName=>"Alpenquai (gross)", halleAdresse=>"Eisfeldstrasse, 6005 Luzern") 
  ,array(halleNo=>"505", halleName=>"Alte Kreuzbleiche (grössere)", halleAdresse=>"Burgstrasse 40, 9000 St. Gallen") 
  ,array(halleNo=>"271", halleName=>"Alte Uni Turnhalle", halleAdresse=>"Neubrückstrasse 155, 3012 Bern") 
  ,array(halleNo=>"1770", halleName=>"Altikofen", halleAdresse=>", Worblaufen") 
  ,array(halleNo=>"1817", halleName=>"Altikofen", halleAdresse=>"Fischrainweg 17, 3048 Ittigen") 
  ,array(halleNo=>"24", halleName=>"Arti + Mestieri", halleAdresse=>"Viale Stefano Franscini 25, 6500 Bellinzona") 
  ,array(halleNo=>"87", halleName=>"Bahnhofhalle", halleAdresse=>"Robert-Zündstrasse 6, 6005 Luzern") 
  ,array(halleNo=>"314", halleName=>"Baseltor", halleAdresse=>"Werkhofstrasse 52, 4500 Solothurn") 
  ,array(halleNo=>"1702", halleName=>"BBC-Arena", halleAdresse=>"Schweizersbildstrasse 10, 8207 Schaffhausen") 
  ,array(halleNo=>"101", halleName=>"Berikerhus 1", halleAdresse=>"Musperfeldstrasse, 8965 Berikon") 
  ,array(halleNo=>"272", halleName=>"Bethlehemacker", halleAdresse=>"Kornweg 108, 3027 Bern") 
  ,array(halleNo=>"111", halleName=>"Beunden", halleAdresse=>"Beundenring, 2560 Nidau") 
  ,array(halleNo=>"1732", halleName=>"BFO Sporthalle Im Sand", halleAdresse=>"Kleegärtenweg, 3930 Visp") 
  ,array(halleNo=>"338", halleName=>"Bodenacker", halleAdresse=>"Friedensstrasse 20, 4410 Liestal") 
  ,array(halleNo=>"1271", halleName=>"Bornblick", halleAdresse=>"Schulhausstrasse 4, 4616 Kappel") 
  ,array(halleNo=>"37", halleName=>"Breite", halleAdresse=>"Grämigerstrasse 30, 9606 Bütschwil") 
  ,array(halleNo=>"1902", halleName=>"Breitehalle", halleAdresse=>"Titlisstrasse 16, 5734 Reinach") 
  ,array(halleNo=>"34", halleName=>"Breitli", halleAdresse=>"Schulstr. 15, 6374 Buochs") 
  ,array(halleNo=>"1737", halleName=>"Brüel Turnhalle", halleAdresse=>"Etzelstrasse 2, 8840 Einsiedeln") 
  ,array(halleNo=>"279", halleName=>"Buchsee", halleAdresse=>"Lilienweg 11, 3098 Köniz") 
  ,array(halleNo=>"18", halleName=>"Burghalde 2 (Halle 4)", halleAdresse=>"Mellingerstrasse 20, 5400 Baden") 
  ,array(halleNo=>"1356", halleName=>"Burghalde 4 (neue Gewerbeschule)", halleAdresse=>"Burghaldenstrasse, 5400 Baden") 
  ,array(halleNo=>"1686", halleName=>"Campus Muristalden (kleine Halle)", halleAdresse=>"Muristrasse, 3006 Bern") 
  ,array(halleNo=>"813", halleName=>"Centre scolaire des Mûriers", halleAdresse=>"Rue des Mûriers 4, 2013 Colombier") 
  ,array(halleNo=>"178", halleName=>"Centre sportif de lOiselier", halleAdresse=>"Ch. de l'Oiselier 17, 2900 Porrentruy") 
  ,array(halleNo=>"1924", halleName=>"Centre sportif de la Vallée de Joux", halleAdresse=>"Rue de l'Orbe 8, 1347 Le Sentier") 
  ,array(halleNo=>"39", halleName=>"Centre Sportif Sous-Moulin", halleAdresse=>"Rue de Sous-Moulin 39, 1226 Thônex") 
  ,array(halleNo=>"82", halleName=>"Centre Sportif Unil SOS II Dorigny", halleAdresse=>"Dorigny, Route Cantonale, 1015 Lausanne") 
  ,array(halleNo=>"501", halleName=>"Centro Professionale Trevano (CPT)", halleAdresse=>"Via Trevano, 6952 Trevano-Canobbio") 
  ,array(halleNo=>"1915", halleName=>"Centro sportivo alle Gerre", halleAdresse=>"alle Gerre 1, 6518 Gorduno") 
  ,array(halleNo=>"1894", halleName=>"Champagne", halleAdresse=>"rue Henri Baud, 74200 Thonon les Bains") 
  ,array(halleNo=>"61", halleName=>"Charnot", halleAdresse=>"Rue de la Poste, 1926 Fully") 
  ,array(halleNo=>"129", halleName=>"Châteauneuf", halleAdresse=>"Rue de la Treille, 1950 Sion / Châteauneuf") 
  ,array(halleNo=>"518", halleName=>"Collège de la Gradelle", halleAdresse=>"Ch. Pré-du-Couvent, 1224 Chêne-Bougeries") 
  ,array(halleNo=>"796", halleName=>"Collège des Tuillières", halleAdresse=>"Ch. de la Tuillière 3, 1196 Gland") 
  ,array(halleNo=>"85", halleName=>"CSC", halleAdresse=>"Chemin de Monteiller 21, 1093 La Conversion-Corsy") 
  ,array(halleNo=>"1407", halleName=>"DH Zentrum (Nord/Süd)", halleAdresse=>"Schulstrasse 21, 2540 Grenchen") 
  ,array(halleNo=>"586", halleName=>"Doppelturnhalle Ebnet", halleAdresse=>"Oberarneggerstrasse 3, 9204 Andwil") 
  ,array(halleNo=>"1232", halleName=>"Doppelturnhalle Säli", halleAdresse=>"Pilatusstrasse 61, 6003 Luzern") 
  ,array(halleNo=>"547", halleName=>"Dorfhalle neu ", halleAdresse=>"Schwerzistrasse 9, 6017 Ruswil") 
  ,array(halleNo=>"1238", halleName=>"Dossenhalle Kerns", halleAdresse=>"Sidernstrasse, 6064 Kerns") 
  ,array(halleNo=>"719", halleName=>"Dreifachturnhalle ", halleAdresse=>"Oberdorfstrasse 17, 5703 Seon") 
  ,array(halleNo=>"1239", halleName=>"Dürrenast", halleAdresse=>"Schulstrasse, 3604 Thun") 
  ,array(halleNo=>"379", halleName=>"Ebnet", halleAdresse=>"Oberdorf 67, 6403 Küssnacht") 
  ,array(halleNo=>"58", halleName=>"Ebnet 1", halleAdresse=>"Unt. Rainweg 35, 5070 Frick") 
  ,array(halleNo=>"184", halleName=>"Ecole de Culture Générale", halleAdresse=>"Rue St-Michel 14, 2800 Delémont") 
  ,array(halleNo=>"530", halleName=>"Erlenhalle ", halleAdresse=>"Erlenmatte 80, 6020 Emmenbrücke") 
  ,array(halleNo=>"804", halleName=>"Erlimatt", halleAdresse=>"Erlimattstrasse 17, 4658 Däniken") 
  ,array(halleNo=>"429", halleName=>"Freies Gymnasium, Halle ", halleAdresse=>"Arbenzstrasse 19, 8008 Zürich") 
  ,array(halleNo=>"1001", halleName=>"Freiestrasse", halleAdresse=>"Freiestrasse 20, 8610 Uster") 
  ,array(halleNo=>"126", halleName=>"FZ Resch", halleAdresse=>"Zur Schule 10, 9494 Schaan") 
  ,array(halleNo=>"118", halleName=>"Giroud-Olma-Halle", halleAdresse=>"Louis Giroud Strasse 29, 4600 Olten") 
  ,array(halleNo=>"252", halleName=>"Grand-Vennes", halleAdresse=>"Ch. des Abeilles, 1010 Lausanne") 
  ,array(halleNo=>"72", halleName=>"Grünfeld", halleAdresse=>"Grünfeldstrasse 8, 8645 Jona") 
  ,array(halleNo=>"1168", halleName=>"Gulliver", halleAdresse=>"Pilgerweg 27, 8803 Rüschlikon") 
  ,array(halleNo=>"1073", halleName=>"Gwatt", halleAdresse=>"Gwattstrasse, 3185 Schmitten") 
  ,array(halleNo=>"79", halleName=>"Gymer", halleAdresse=>"Weststrasse 21, 4900 Langenthal") 
  ,array(halleNo=>"54", halleName=>"Gymnase", halleAdresse=>"Beau-Site 1, 2610 St.-Imier") 
  ,array(halleNo=>"169", halleName=>"Gymnase cantonal Bois-Noir", halleAdresse=>"Rue du Succès 45, 2300 La Chaux-de-Fonds") 
  ,array(halleNo=>"13", halleName=>"Gymnasium Friedberg", halleAdresse=>"Friedbergstrasse, 9200 Gossau") 
  ,array(halleNo=>"1900", halleName=>"Gymnasium Leonhard", halleAdresse=>"Leonhardstrasse 15, 4051 Basel") 
  ,array(halleNo=>"573", halleName=>"Gymnasium St. Antonius", halleAdresse=>"Hauptgasse 51, 9050 Appenzell") 
  ,array(halleNo=>"201", halleName=>"Halle des sports", halleAdresse=>"Ch. des Ecoliers 5, 1782 Belfaux") 
  ,array(halleNo=>"810", halleName=>"Halle des sports de la Riveraine", halleAdresse=>"Rue du Littoral, 2000 Neuchâtel") 
  ,array(halleNo=>"302", halleName=>"Hard", halleAdresse=>"Weststrasse 33, 4900 Langenthal") 
  ,array(halleNo=>"65", halleName=>"Henry-Dunant", halleAdresse=>"Av. Edmond-Vaucher 20, 1203 Genève") 
  ,array(halleNo=>"1909", halleName=>"HEP Lausanne", halleAdresse=>"Cour 27, 1004 Lausanne") 
  ,array(halleNo=>"5", halleName=>"Hofern", halleAdresse=>"Sonnenbergstrasse 30, 8134 Adliswil") 
  ,array(halleNo=>"575", halleName=>"Im Birch", halleAdresse=>"Margrit-Rainer-Strasse 5, 8050 Zürich") 
  ,array(halleNo=>"563", halleName=>"Im Sand", halleAdresse=>"Amselweg, 3930 Visp") 
  ,array(halleNo=>"824", halleName=>"Isenringen", halleAdresse=>"Isenringenstrasse 12, 6375 Beckenried") 
  ,array(halleNo=>"160", halleName=>"Kantihalle 4", halleAdresse=>"Lüssiweg 24, 6300 Zug") 
  ,array(halleNo=>"67", halleName=>"Kantonsschule", halleAdresse=>"Winkelstrasse 1, 8750 Glarus") 
  ,array(halleNo=>"149", halleName=>"Kantonsschule", halleAdresse=>"Näppisuelistrasse 11, 9630 Wattwil") 
  ,array(halleNo=>"152", halleName=>"Kantonsschule  Zürcher Oberland (KZO)", halleAdresse=>"Kantonsschulstrasse, 8620 Wetzikon") 
  ,array(halleNo=>"17", halleName=>"Kantonsschule 1", halleAdresse=>"Schönaustrasse, 5400 Baden") 
  ,array(halleNo=>"1335", halleName=>"Kantonsschule 2", halleAdresse=>"Schönaustrasse 3, 5400 Baden") 
  ,array(halleNo=>"1334", halleName=>"Kantonsschule 3", halleAdresse=>"Schönaustr., 5400 Baden") 
  ,array(halleNo=>"422", halleName=>"Kantonsschule Limmattal", halleAdresse=>"In der Luberzen 34, 8902 Urdorf") 
  ,array(halleNo=>"914", halleName=>"Kantonsschule Wiedikon", halleAdresse=>"Schrennengasse 7, 8003 Zürich") 
  ,array(halleNo=>"942", halleName=>"Kantonsschule Zürich Nord", halleAdresse=>"Birchstrasse 107, 8050 Zürich") 
  ,array(halleNo=>"1190", halleName=>"Kienholz", halleAdresse=>", 3855 Brienz") 
  ,array(halleNo=>"66", halleName=>"Kirchacker", halleAdresse=>"Schulzentrum, 4563 Gerlafingen") 
  ,array(halleNo=>"457", halleName=>"Klosterturnhalle", halleAdresse=>"Burgstrasse, 8752 Näfels") 
  ,array(halleNo=>"1417", halleName=>"Kreisschule Mittelgösgen ", halleAdresse=>"Lostorferstrasse 55, 4653 Obergösgen") 
  ,array(halleNo=>"344", halleName=>"Kriegacker", halleAdresse=>"Gründenstrasse 32, 4132 Muttenz") 
  ,array(halleNo=>"140", halleName=>"Känelmatt 2", halleAdresse=>"Känelmattweg, 4106 Therwil") 
  ,array(halleNo=>"171", halleName=>"La Combe", halleAdresse=>"Rue des Collèges 10, 2606 Corgémont") 
  ,array(halleNo=>"1612", halleName=>"La Corbière", halleAdresse=>"Rue des Corbes, 2065 Savagnier") 
  ,array(halleNo=>"502", halleName=>"La Gerra", halleAdresse=>"Via Trevano, 6900 Lugano") 
  ,array(halleNo=>"159", halleName=>"La Marive", halleAdresse=>"Quai de Nogent 2, 1400 Yverdon") 
  ,array(halleNo=>"45", halleName=>"Lachen unten", halleAdresse=>"Belmontstrasse 11, 7000 Chur") 
  ,array(halleNo=>"576", halleName=>"Lambertenghi", halleAdresse=>"via Lambertenghi 4, 6900 Lugano") 
  ,array(halleNo=>"108", halleName=>"Le Mail", halleAdresse=>"Rue de Bellevaux 52, 2000 Neuchâtel") 
  ,array(halleNo=>"1674", halleName=>"Liebefeld / Hessgut", halleAdresse=>"Jägerweg 19, 3097 Liebefeld") 
  ,array(halleNo=>"1837", halleName=>"Lindenallee", halleAdresse=>"Lindenallee, 3800 Interlaken") 
  ,array(halleNo=>"277", halleName=>"Lindenfeld", halleAdresse=>"Zähringerstrasse 37, 3400 Burgdorf") 
  ,array(halleNo=>"1906", halleName=>"Lindenhalle", halleAdresse=>"Schulhausweg 7, 3263 Büetigen") 
  ,array(halleNo=>"103", halleName=>"Linthalle SGU", halleAdresse=>"Oberurnerstrasse 14, 8752 Näfels") 
  ,array(halleNo=>"562", halleName=>"LP2 (Lycée Collège Planta 2)", halleAdresse=>"Av. De la Gare 45, 1950 Sion") 
  ,array(halleNo=>"1799", halleName=>"Lärchenstrasse", halleAdresse=>"Lärchenstr 56, 4142 Münchenstein") 
  ,array(halleNo=>"520", halleName=>"Maladière", halleAdresse=>"Rue Maladière, 2000 Neuchâtel") 
  ,array(halleNo=>"20", halleName=>"Margarethen", halleAdresse=>"Gempenstrasse 48, 4053 Basel") 
  ,array(halleNo=>"157", halleName=>"Matte", halleAdresse=>"Schifflaube 1, 3011 Bern") 
  ,array(halleNo=>"1600", halleName=>"Mattschulhaus", halleAdresse=>"Glärnischstrasse 26, 9500 Wil") 
  ,array(halleNo=>"510", halleName=>"Mehrzweckgebäude", halleAdresse=>", 3663 Gurzelen") 
  ,array(halleNo=>"81", halleName=>"Mehrzweckhalle", halleAdresse=>"Seemättli 19, 4254 Liesberg") 
  ,array(halleNo=>"296", halleName=>"Mehrzweckhalle", halleAdresse=>", 4554 Etziken") 
  ,array(halleNo=>"363", halleName=>"Mehrzweckhalle", halleAdresse=>"Grubenweg 20, 4665 Oftringen") 
  ,array(halleNo=>"494", halleName=>"Mehrzweckhalle", halleAdresse=>"Schulweg, 7204 Untervaz") 
  ,array(halleNo=>"792", halleName=>"Mehrzweckhalle", halleAdresse=>", 1737 Plasselb") 
  ,array(halleNo=>"1818", halleName=>"Mehrzweckhalle", halleAdresse=>"Schulhausstrasse, 7050 Arosa") 
  ,array(halleNo=>"6", halleName=>"Mehrzweckhalle Drei Höfe", halleAdresse=>", 4558 Heinrichswil") 
  ,array(halleNo=>"534", halleName=>"Mehrzweckhalle Flüematte", halleAdresse=>"Flüematte, 6073 Flüeli Ranft") 
  ,array(halleNo=>"491", halleName=>"MPS", halleAdresse=>"Äussere Bahnhofstrasse 45, 8854 Siebnen") 
  ,array(halleNo=>"461", halleName=>"Munot", halleAdresse=>"Munotstrasse, 8203 Schaffhausen") 
  ,array(halleNo=>"1156", halleName=>"Muoshof 1", halleAdresse=>"Muoshofstr., 6102 Malters") 
  ,array(halleNo=>"131", halleName=>"MZH AC-Zentrum", halleAdresse=>", 3700 Spiez") 
  ,array(halleNo=>"808", halleName=>"MZH Engelwies", halleAdresse=>"Engelwiesstrasse 1, 9014 St. Gallen") 
  ,array(halleNo=>"812", halleName=>"MZH Löhrenacker", halleAdresse=>"Landskronstrasse 41, 4147 Aesch") 
  ,array(halleNo=>"1084", halleName=>"Neue Kanti Halle", halleAdresse=>"Munotstrasse 41, 8200 Schaffhausen") 
  ,array(halleNo=>"1", halleName=>"Neue Turnhalle", halleAdresse=>"Schulbergstrasse 18, 8357 Guntershausen") 
  ,array(halleNo=>"100", halleName=>"Neue Turnhalle", halleAdresse=>"Bernstrasse 9, 3280 Murten") 
  ,array(halleNo=>"1489", halleName=>"Neue Turnhalle", halleAdresse=>", 3043 Uettligen") 
  ,array(halleNo=>"465", halleName=>"Neuhof", halleAdresse=>"Ahornstrasse, 9240 Uzwil") 
  ,array(halleNo=>"578", halleName=>"Neumatt S2", halleAdresse=>"Reinacherstrasse 1, 4147 Aesch") 
  ,array(halleNo=>"584", halleName=>"Novalishalle, Lintharena SGU", halleAdresse=>"Oberurnerstrasse 14, 8752 Näfels") 
  ,array(halleNo=>"546", halleName=>"Oberei", halleAdresse=>"Hellbühlstrasse, 6102 Malters") 
  ,array(halleNo=>"842", halleName=>"Oberstufenschulhaus Hungerbühl", halleAdresse=>"Hungerbühlstrasse 22, 8424 Embrach") 
  ,array(halleNo=>"29", halleName=>"Oberstufenzentrum", halleAdresse=>"Schwarzenburgstrasse 321, 3098 Köniz") 
  ,array(halleNo=>"1578", halleName=>"Oberuster", halleAdresse=>"Aathalstrasse 33, 8610 Uster") 
  ,array(halleNo=>"583", halleName=>"OZ Grünau", halleAdresse=>"Grünaustrasse 2, 9303 Wittenbach") 
  ,array(halleNo=>"1228", halleName=>"Palestra Palamondo", halleAdresse=>"Via Industria, 6814 Cadempino") 
  ,array(halleNo=>"114", halleName=>"Primarschule", halleAdresse=>"Schulhausstrasse 20, 3672 Oberdiessbach") 
  ,array(halleNo=>"871", halleName=>"Primarschule Glärnisch", halleAdresse=>"Glärnischstrasse 3, 8820 Wädenswil") 
  ,array(halleNo=>"73", halleName=>"Rain", halleAdresse=>"Tägernaustrasse 40, 8645 Jona") 
  ,array(halleNo=>"38", halleName=>"Rietstein", halleAdresse=>"Ebnaterstrasse 40, 9630 Wattwil") 
  ,array(halleNo=>"1545", halleName=>"Roggern", halleAdresse=>"Schlundstrasse, 6010 Kriens") 
  ,array(halleNo=>"1913", halleName=>"Salle de Beau-Site", halleAdresse=>"Beau-Site 1, 2610 St-Imier") 
  ,array(halleNo=>"566", halleName=>"Salle de Gym La Pépinière", halleAdresse=>"Chemin de la Pepiniere 4, 2345 Les Breuleux") 
  ,array(halleNo=>"1723", halleName=>"Salle de lEcole professionnelle", halleAdresse=>"Rue de Bellevue 4, 1920 Martigny") 
  ,array(halleNo=>"41", halleName=>"Salle Derrière-la-Ville 5", halleAdresse=>"Chemin de Derriere la Ville 5, 1033 Cheseaux") 
  ,array(halleNo=>"208", halleName=>"Salle du Belluard", halleAdresse=>"Derrière-les-Remparts 9, 1700 Fribourg") 
  ,array(halleNo=>"549", halleName=>"Salle du Centre Sportif Val-de-Travers", halleAdresse=>"Clos Pury 15, 2108 Couvet") 
  ,array(halleNo=>"53", halleName=>"Salle du Croset", halleAdresse=>"Chemin du Parc, 1024 Ecublens") 
  ,array(halleNo=>"1926", halleName=>"Salle Forum BIWI", halleAdresse=>"Au Copas de Sel, 2842 Rossemaison") 
  ,array(halleNo=>"185", halleName=>"Salle La Blancherie", halleAdresse=>"La Blancherie 4, 2800 Delémont") 
  ,array(halleNo=>"1711", halleName=>"Salle Lantses", halleAdresse=>"Rue des Lantses 5, 1907 Saxon") 
  ,array(halleNo=>"1649", halleName=>"Salle Polyvalente", halleAdresse=>"Rue des Sports, 1926 Fully") 
  ,array(halleNo=>"49", halleName=>"Salle Pré-aux-Moines", halleAdresse=>"Rte de Morges, 1304 Cossonay") 
  ,array(halleNo=>"1662", halleName=>"Salle Volta (Teilhallen)", halleAdresse=>"rue Numa-Droz 189, 2300 La Chaux-de-Fonds") 
  ,array(halleNo=>"229", halleName=>"Salles Ecole des Racettes", halleAdresse=>"Ch. de la Pralée 14, 1213 Onex") 
  ,array(halleNo=>"83", halleName=>"Sand", halleAdresse=>"Birkenstrasse 7, 8716 Schmerikon") 
  ,array(halleNo=>"1266", halleName=>"Sappeten", halleAdresse=>"Sonneckstrasse 16, 4416 Bubendorf") 
  ,array(halleNo=>"278", halleName=>"Schulhaus", halleAdresse=>", 3032 Hinterkappelen") 
  ,array(halleNo=>"993", halleName=>"Schulhaus Burg", halleAdresse=>"Burgstrasse 7, 8636 Wald") 
  ,array(halleNo=>"9", halleName=>"Schulzentrum Muesmatt", halleAdresse=>"Muesmattweg 6, 4123 Allschwil") 
  ,array(halleNo=>"478", halleName=>"Schulzentrum Unterland", halleAdresse=>", 9492 FL-Eschen") 
  ,array(halleNo=>"26", halleName=>"Schwellenmätteli", halleAdresse=>"Schwellenmattstrasse 1, 3005 Bern") 
  ,array(halleNo=>"1172", halleName=>"Schönau", halleAdresse=>"Lindenauweg 1, 3007 Bern") 
  ,array(halleNo=>"1816", halleName=>"SE Scuole Comunali", halleAdresse=>"Via Terriciuole 165, 6516 Cugnasco, Gerra Piano") 
  ,array(halleNo=>"30", halleName=>"Seeland Gymnasium", halleAdresse=>"Ländtestrasse 12, 2503 Biel-Bienne") 
  ,array(halleNo=>"97", halleName=>"Sekundarschule", halleAdresse=>"Quellenweg 6, 3053 Münchenbuchsee") 
  ,array(halleNo=>"313", halleName=>"Seminar (Ost)", halleAdresse=>"Obere Sternengasse, 4500 Solothurn") 
  ,array(halleNo=>"270", halleName=>"Seminar Muristalden=neu Campus Muristalden", halleAdresse=>"Muristrasse, 3006 Bern") 
  ,array(halleNo=>"110", halleName=>"Sempach-Station", halleAdresse=>", 6203 Sempach-Station") 
  ,array(halleNo=>"143", halleName=>"Spiezwiler", halleAdresse=>"Faulenbachweg 85, 3700 Spiez") 
  ,array(halleNo=>"1062", halleName=>"Sportanlage Rennweg", halleAdresse=>"Wartstrasse 71, 8400 Winterthur") 
  ,array(halleNo=>"44", halleName=>"Sportanlage Sand", halleAdresse=>"Sandstrasse 35, 7000 Chur") 
  ,array(halleNo=>"716", halleName=>"Sporthalle 1", halleAdresse=>"Schulstrasse 6, 5707 Seengen") 
  ,array(halleNo=>"1918", halleName=>"Sporthalle AARfit", halleAdresse=>"Aareweg 32, 3270 Aarberg") 
  ,array(halleNo=>"803", halleName=>"Sporthalle Badrieb", halleAdresse=>"Badriebweg, 7310 Bad Ragaz") 
  ,array(halleNo=>"789", halleName=>"Sporthalle BBZ", halleAdresse=>"Schlossfeldstrasse 10, 6130 Willisau") 
  ,array(halleNo=>"463", halleName=>"Sporthalle BBZ Mühlental", halleAdresse=>"Mühlentalstrasse 7, 8200 Schaffhausen") 
  ,array(halleNo=>"312", halleName=>"Sporthalle Blauen ", halleAdresse=>"Bannweg 2, 5080 Laufenburg") 
  ,array(halleNo=>"536", halleName=>"Sporthalle Brüel", halleAdresse=>"Etzelstrasse 2, 8840 Einsiedeln") 
  ,array(halleNo=>"105", halleName=>"Sporthalle Buchholz", halleAdresse=>", 8750 Glarus") 
  ,array(halleNo=>"992", halleName=>"Sporthalle Elba", halleAdresse=>"Tösstalstrasse 70, 8636 Wald") 
  ,array(halleNo=>"443", halleName=>"Sporthalle Gringel", halleAdresse=>"Unterrainstrasse 7, 9050 Appenzell") 
  ,array(halleNo=>"1367", halleName=>"Sporthalle Grünau", halleAdresse=>"Schulhausstrasse 5, 6206 Neuenkirch") 
  ,array(halleNo=>"80", halleName=>"Sporthalle Gymnasium", halleAdresse=>"Steinackerweg 7, 4242 Laufen") 
  ,array(halleNo=>"154", halleName=>"Sporthalle Hallenbad", halleAdresse=>"Schlossfeldstrasse 2, 6130 Willisau") 
  ,array(halleNo=>"556", halleName=>"Sporthalle Hofmatt", halleAdresse=>"Hofmatt, 4460 Gelterkinden") 
  ,array(halleNo=>"589", halleName=>"Sporthalle Hofstatt ", halleAdresse=>"Schulstrasse 5, 5082 Kaisten") 
  ,array(halleNo=>"204", halleName=>"Sporthalle Leimacker", halleAdresse=>"Leimacker, 3186 Düdingen") 
  ,array(halleNo=>"1876", halleName=>"Sporthalle Löhracker", halleAdresse=>"Schützenstrasse 42, 8355 Aadorf") 
  ,array(halleNo=>"1677", halleName=>"Sporthalle Mittelholz", halleAdresse=>"Mittelholzstrasse, 3360 Herzogenbuchsee") 
  ,array(halleNo=>"1685", halleName=>"Sporthalle Mühleholz 2", halleAdresse=>"Marianumstrasse 43, 9490 Vaduz") 
  ,array(halleNo=>"122", halleName=>"Sporthalle Niederholz", halleAdresse=>"Niederholzstrasse 95, 4125 Riehen") 
  ,array(halleNo=>"1013", halleName=>"Sporthalle Rietacker", halleAdresse=>"Ohringerstrasse 16, 8472 Seuzach") 
  ,array(halleNo=>"74", halleName=>"Sporthalle Ruebisbach", halleAdresse=>"Talacherstrasse 2, 8302 Kloten") 
  ,array(halleNo=>"98", halleName=>"Sporthalle Schlossmatt", halleAdresse=>"Schlossmattstrasse 2, 3110 Münsingen") 
  ,array(halleNo=>"1656", halleName=>"Sporthalle Schönenwegen", halleAdresse=>"Zürcherstrasse 67, 9000 St. Gallen") 
  ,array(halleNo=>"10", halleName=>"Sporthalle Tellenfeld", halleAdresse=>"Grenzstrasse, 8580 Amriswil") 
  ,array(halleNo=>"1854", halleName=>"Sporthalle Weissenstein", halleAdresse=>"Könizstrasse 111, 3008 Bern") 
  ,array(halleNo=>"69", halleName=>"Sporthalle Wühre", halleAdresse=>"Kaustrasse 3b, 9050 Appenzell") 
  ,array(halleNo=>"27", halleName=>"Sporthalle ZSSW", halleAdresse=>"Bremgartenstrasse 145, 3012 Bern") 
  ,array(halleNo=>"1492", halleName=>"Sporthalle Zug", halleAdresse=>"General Guisan Strasse, 6300 Zug") 
  ,array(halleNo=>"1869", halleName=>"St. Leonhard", halleAdresse=>"Chemin St-Leonard, 1700 Fribourg") 
  ,array(halleNo=>"1725", halleName=>"Steindler West", halleAdresse=>"Steindlerstrasse 3, 3800 Unterseen") 
  ,array(halleNo=>"548", halleName=>"Steinli", halleAdresse=>"Sportplatzweg 1, 4313 Möhlin") 
  ,array(halleNo=>"1912", halleName=>"Stockhorn", halleAdresse=>"Stockhornstrasse 8, 3510 Konolfingen") 
  ,array(halleNo=>"135", halleName=>"Sunnegrund", halleAdresse=>"Blickensdorferstrasse 17, 6312 Steinhausen") 
  ,array(halleNo=>"613", halleName=>"Tannegg 1", halleAdresse=>"Ländliweg 1, 5400 Baden") 
  ,array(halleNo=>"133", halleName=>"Turnhalle", halleAdresse=>"Schulhaus, 1713 St. Antoni") 
  ,array(halleNo=>"532", halleName=>"Turnhalle", halleAdresse=>"Giebelhüttenweg 18, 8917 Oberlunkhofen") 
  ,array(halleNo=>"533", halleName=>"Turnhalle", halleAdresse=>"Hinterdorfstrasse 16, 8918 Unterlunkhofen") 
  ,array(halleNo=>"1613", halleName=>"Turnhalle", halleAdresse=>"Schulweg, 4492 Tecknau") 
  ,array(halleNo=>"1460", halleName=>"Turnhalle Brunnmatt ", halleAdresse=>"Brunnmattstrasse 16, 3007 Bern") 
  ,array(halleNo=>"484", halleName=>"Turnhalle Burgerau", halleAdresse=>"Kreuzstrasse 43, 8640 Rapperswil") 
  ,array(halleNo=>"128", halleName=>"Turnhalle Feld", halleAdresse=>"Weiermattstrasse 20, 5012 Schönenwerd") 
  ,array(halleNo=>"782", halleName=>"Turnhalle Feldmatt", halleAdresse=>"Rankstrasse 2, 6030 Ebikon") 
  ,array(halleNo=>"982", halleName=>"Turnhalle Hatzenbühl", halleAdresse=>"Hatzenbühlstrasse 35, 8309 Nürensdorf") 
  ,array(halleNo=>"1076", halleName=>"Turnhalle Hinter Gärten", halleAdresse=>"Steingrubenweg 30, 4125 Riehen") 
  ,array(halleNo=>"1663", halleName=>"Turnhalle HPS", halleAdresse=>"Schorenstrasse 19, 4900 Langenthal") 
  ,array(halleNo=>"1053", halleName=>"Turnhalle Klosterweg ", halleAdresse=>"Klosterweg 15/18, 9500 Wil") 
  ,array(halleNo=>"1585", halleName=>"Turnhalle Matt", halleAdresse=>"Matthof, 6014 Luzern-Littau") 
  ,array(halleNo=>"1743", halleName=>"Turnhalle OMS", halleAdresse=>"Alte Simplonstrasse 71, 3900 Brig") 
  ,array(halleNo=>"528", halleName=>"Turnhalle Prehl", halleAdresse=>"Wilerweg 51, 3280 Murten") 
  ,array(halleNo=>"1750", halleName=>"Turnhalle Primarschule Serafin", halleAdresse=>"Baselstrasse 5, 4242 Laufen") 
  ,array(halleNo=>"77", halleName=>"Turnhalle Remisberg", halleAdresse=>"Rothausstrasse 14, 8280 Kreuzlingen") 
  ,array(halleNo=>"1726", halleName=>"Turnhalle Riggisberg neu", halleAdresse=>"Lindengässli 19, 3132 Riggisberg") 
  ,array(halleNo=>"1795", halleName=>"Turnhalle Schule Euthal", halleAdresse=>"Euthalerstrasse 36, 8844 Euthal") 
  ,array(halleNo=>"1713", halleName=>"Turnhalle Schwarzenbach", halleAdresse=>"Neuhausstrasse 15, 4953 Schwarzenbach") 
  ,array(halleNo=>"1901", halleName=>"Turnhalle Spiegel", halleAdresse=>"Spiegelstrasse 75-81, 3095 Spiegel") 
  ,array(halleNo=>"1594", halleName=>"Vereinshalle Sarnen", halleAdresse=>"Rütistrasse, 6060 Sarnen") 
  ,array(halleNo=>"504", halleName=>"Volksbad", halleAdresse=>"Volksbadstrasse 24, 9000 St. Gallen") 
  ,array(halleNo=>"447", halleName=>"Zimmerberghalle", halleAdresse=>"Zimmerberg 12, 8222 Beringen") 
  ,array(halleNo=>"1880", halleName=>"Zinzikon", halleAdresse=>"Ruchwiesenstrasse 1, 8404 Winterthur") 
);
		return $hallen;
	}
	
	public function getRegionaleTeams() {
		$regionaleTeams 
		 = array(array(teamNo=>"1152", teamName=>"VBC Allschwil", liga=>"2L H", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1154", teamName=>"VBC Allschwil D2", liga=>"3L D", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1156", teamName=>"VBC Allschwil D3", liga=>"4L D", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1333", teamName=>"VBC Allschwil D4", liga=>"5L D", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1153", teamName=>"VBC Allschwil H2", liga=>"4L H", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1292", teamName=>"VBC Allschwil U15", liga=>"U15 D", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1224", teamName=>"VBC Allschwil U17", liga=>"U17 D", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1223", teamName=>"VBC Allschwil U19", liga=>"U19 D", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1157", teamName=>"VBC Allschwil U23", liga=>"U23 D SK1", vereinNo=>1001, vereinName=>"VBC Allschwil")
						,array(teamNo=>"1012", teamName=>"TV Arlesheim", liga=>"2L H", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1318", teamName=>"TV Arlesheim", liga=>"U17 D", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1348", teamName=>"TV Arlesheim", liga=>"U17 H", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1349", teamName=>"TV Arlesheim", liga=>"U19 D", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1043", teamName=>"TV Arlesheim D1", liga=>"2L D", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1213", teamName=>"TV Arlesheim D2", liga=>"4L D", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1308", teamName=>"TV Arlesheim H2", liga=>"3L H", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1042", teamName=>"TV Arlesheim H3", liga=>"4L H", vereinNo=>1002, vereinName=>"TV Arlesheim")
						,array(teamNo=>"1081", teamName=>"VBC Bärschwil", liga=>"4L D", vereinNo=>1141, vereinName=>"VBC Bärschwil")
						,array(teamNo=>"1096", teamName=>"ATV Basel Stadt", liga=>"2L H", vereinNo=>1004, vereinName=>"ATV Basel Stadt")
						,array(teamNo=>"1073", teamName=>"KTV Basel ", liga=>"3L H", vereinNo=>1006, vereinName=>"KTV Basel ")
						,array(teamNo=>"1009", teamName=>"KTV Basel", liga=>"2L D", vereinNo=>1006, vereinName=>"KTV Basel ")
						,array(teamNo=>"1017", teamName=>"KTV Basel 1915", liga=>"2L H", vereinNo=>1006, vereinName=>"KTV Basel ")
						,array(teamNo=>"1295", teamName=>"Traktor Basel", liga=>"U17 H", vereinNo=>1007, vereinName=>"Traktor Basel")
						,array(teamNo=>"1019", teamName=>"Traktor Basel 2", liga=>"2L H", vereinNo=>1007, vereinName=>"Traktor Basel")
						,array(teamNo=>"1254", teamName=>"Traktor Basel 3", liga=>"3L H", vereinNo=>1007, vereinName=>"Traktor Basel")
						,array(teamNo=>"1303", teamName=>"Traktor Basel 4", liga=>"4L H", vereinNo=>1007, vereinName=>"Traktor Basel")
						,array(teamNo=>"1335", teamName=>"Traktor Basel Junioren U19", liga=>"U19 H", vereinNo=>1007, vereinName=>"Traktor Basel")
						,array(teamNo=>"1350", teamName=>"Traktor Basel Junioren U23", liga=>"U23 H", vereinNo=>1007, vereinName=>"Traktor Basel")
						,array(teamNo=>"1334", teamName=>"", liga=>"", vereinNo=>1009, vereinName=>"TV Bettingen")
						,array(teamNo=>"1011", teamName=>"punktschinder", liga=>"", vereinNo=>1009, vereinName=>"TV Bettingen")
						,array(teamNo=>"1006", teamName=>"TV Bettingen", liga=>"3L D", vereinNo=>1009, vereinName=>"TV Bettingen")
						,array(teamNo=>"1127", teamName=>"TV Bettingen", liga=>"", vereinNo=>1009, vereinName=>"TV Bettingen")
						,array(teamNo=>"1129", teamName=>"DR Binningen 1", liga=>"5L D", vereinNo=>1010, vereinName=>"DR Binningen")
						,array(teamNo=>"1344", teamName=>"DR Binningen 2", liga=>"DP 2L", vereinNo=>1010, vereinName=>"DR Binningen")
						,array(teamNo=>"1336", teamName=>"DR Binningen 3", liga=>"5L D", vereinNo=>1010, vereinName=>"DR Binningen")
						,array(teamNo=>"1085", teamName=>"TV Bretzwil", liga=>"4L D", vereinNo=>1011, vereinName=>"TV Bretzwil")
						,array(teamNo=>"1044", teamName=>"VBC Brislach", liga=>"3L D", vereinNo=>1012, vereinName=>"VBC Brislach")
						,array(teamNo=>"1102", teamName=>"VBC Brislach", liga=>"MP 2L", vereinNo=>1012, vereinName=>"VBC Brislach")
						,array(teamNo=>"1063", teamName=>"VBC Bubendorf 1", liga=>"2L H", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1005", teamName=>"VBC Bubendorf D1", liga=>"2L D", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1064", teamName=>"VBC Bubendorf D2", liga=>"3L D", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1331", teamName=>"VBC Bubendorf D3", liga=>"5L D", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1332", teamName=>"VBC Bubendorf H2", liga=>"4L H", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1068", teamName=>"VBC Bubendorf Mixed", liga=>"MP 2L", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1359", teamName=>"VBC Bubendorf U17 1", liga=>"U17 D", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1317", teamName=>"VBC Bubendorf U17 2", liga=>"", vereinNo=>1103, vereinName=>"VBC Bubendorf")
						,array(teamNo=>"1075", teamName=>"VB Ettingen", liga=>"4L D", vereinNo=>1014, vereinName=>"VB Ettingen")
						,array(teamNo=>"1078", teamName=>"FP Olympia", liga=>"", vereinNo=>1015, vereinName=>"FP Olympia")
						,array(teamNo=>"1269", teamName=>"FP Olympia 1", liga=>"2L H", vereinNo=>1015, vereinName=>"FP Olympia")
						,array(teamNo=>"1158", teamName=>"FP Olympia D1", liga=>"5L D", vereinNo=>1015, vereinName=>"FP Olympia")
						,array(teamNo=>"1159", teamName=>"FP Olympia H2", liga=>"4L H", vereinNo=>1015, vereinName=>"FP Olympia")
						,array(teamNo=>"1052", teamName=>"TV Frenkendorf", liga=>"4L D", vereinNo=>1016, vereinName=>"TV Frenkendorf")
						,array(teamNo=>"1247", teamName=>"TV Frenkendorf", liga=>"", vereinNo=>1016, vereinName=>"TV Frenkendorf")
						,array(teamNo=>"1016", teamName=>"VBC Gelterkinden 2", liga=>"2L H", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1136", teamName=>"VBC Gelterkinden D2", liga=>"4L D", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1137", teamName=>"VBC Gelterkinden D3", liga=>"5L D", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1206", teamName=>"VBC Gelterkinden DU17", liga=>"U17 D", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1138", teamName=>"VBC Gelterkinden DU23/1", liga=>"U23 D SK2", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1134", teamName=>"VBC Gelterkinden H3", liga=>"3L H", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1261", teamName=>"VBC Gelterkinden H4", liga=>"4L H", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1289", teamName=>"VBC Gelterkinden HU23", liga=>"U23 IL H", vereinNo=>1017, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"1311", teamName=>"Volley Glaibasel", liga=>"5L D", vereinNo=>1018, vereinName=>"Volley Glaibasel")
						,array(teamNo=>"1142", teamName=>"Volley Glaibasel D1", liga=>"3L D", vereinNo=>1018, vereinName=>"Volley Glaibasel")
						,array(teamNo=>"1143", teamName=>"Volley Glaibasel D2", liga=>"4L D", vereinNo=>1018, vereinName=>"Volley Glaibasel")
						,array(teamNo=>"1299", teamName=>"TV Itingen", liga=>"2L D", vereinNo=>1020, vereinName=>"TV Itingen")
						,array(teamNo=>"1070", teamName=>"VBC Kaiseraugst 1", liga=>"4L D", vereinNo=>1022, vereinName=>"VBC Kaiseraugst")
						,array(teamNo=>"1243", teamName=>"VBC Kaiseraugst 2", liga=>"DP 1L", vereinNo=>1022, vereinName=>"VBC Kaiseraugst")
						,array(teamNo=>"1340", teamName=>"VBC Laufen 2", liga=>"4L H", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1337", teamName=>"VBC Laufen 2", liga=>"3L D", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1341", teamName=>"VBC Laufen 3", liga=>"3L H", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1338", teamName=>"VBC Laufen 3", liga=>"4L D", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1339", teamName=>"VBC Laufen 4", liga=>"4L D", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1357", teamName=>"VBC Laufen U17 1", liga=>"U17 D", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1358", teamName=>"VBC Laufen U17 2", liga=>"U17 D", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1342", teamName=>"VBC Laufen U23 1", liga=>"U23 D SK2", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1356", teamName=>"VBC Laufen U23 2", liga=>"U23 D SK2", vereinNo=>1024, vereinName=>"VBC Laufen")
						,array(teamNo=>"1020", teamName=>"SV Lausen", liga=>"4L D", vereinNo=>1025, vereinName=>"SV Lausen")
						,array(teamNo=>"1053", teamName=>"SV Lausen 2", liga=>"5L D", vereinNo=>1025, vereinName=>"SV Lausen")
						,array(teamNo=>"1173", teamName=>"SC Gym Leonhard", liga=>"U17 D", vereinNo=>1026, vereinName=>"SC Gym Leonhard")
						,array(teamNo=>"1176", teamName=>"SC Gym Leonhard", liga=>"U15 H", vereinNo=>1026, vereinName=>"SC Gym Leonhard")
						,array(teamNo=>"1353", teamName=>"SC Gym Leonhard U23", liga=>"U23 D SK1", vereinNo=>1026, vereinName=>"SC Gym Leonhard")
						,array(teamNo=>"1076", teamName=>"VBC Liesberg", liga=>"5L D", vereinNo=>1052, vereinName=>"VBC Liesberg")
						,array(teamNo=>"1196", teamName=>"VBC Gym Liestal", liga=>"U17 D", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
						,array(teamNo=>"1195", teamName=>"VBC Gym Liestal 1", liga=>"U19 D", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
						,array(teamNo=>"1355", teamName=>"VBC Gym Liestal 2", liga=>"U19 D", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
						,array(teamNo=>"1234", teamName=>"VBC Gym Liestal D2", liga=>"4L D", vereinNo=>1027, vereinName=>"VBC Gym Liestal")
						,array(teamNo=>"1038", teamName=>"VBC Münchenstein", liga=>"U23 IL D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
						,array(teamNo=>"1217", teamName=>"VBC Münchenstein", liga=>"U17 D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
						,array(teamNo=>"1250", teamName=>"VBC Münchenstein", liga=>"U19 D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
						,array(teamNo=>"1035", teamName=>"VBC Münchenstein 2", liga=>"3L D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
						,array(teamNo=>"1036", teamName=>"VBC Münchenstein 3", liga=>"4L D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
						,array(teamNo=>"1300", teamName=>"VBC Münchenstein 4", liga=>"5L D", vereinNo=>1029, vereinName=>"VBC Münchenstein")
						,array(teamNo=>"1163", teamName=>"TV Muttenz", liga=>"3L H", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1162", teamName=>"TV Muttenz 1", liga=>"4L D", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1160", teamName=>"TV Muttenz 2", liga=>"4L D", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1167", teamName=>"TV Muttenz 3", liga=>"4L D", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1161", teamName=>"TV Muttenz 4", liga=>"5L D", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1168", teamName=>"TV Muttenz U15", liga=>"U15 D", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1166", teamName=>"TV Muttenz U17", liga=>"U17 D", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1165", teamName=>"TV Muttenz U19", liga=>"U19 D", vereinNo=>1030, vereinName=>"TV Muttenz")
						,array(teamNo=>"1131", teamName=>"TV Neue Welt H1", liga=>"", vereinNo=>1032, vereinName=>"TV Neue Welt")
						,array(teamNo=>"1055", teamName=>"SC Novartis D1", liga=>"3L D", vereinNo=>1023, vereinName=>"SC Novartis")
						,array(teamNo=>"1054", teamName=>"TV Neue Welt", liga=>"4L H", vereinNo=>1023, vereinName=>"SC Novartis")
						,array(teamNo=>"1072", teamName=>"DR Nunningen", liga=>"4L D", vereinNo=>1033, vereinName=>"DR Nunningen")
						,array(teamNo=>"1122", teamName=>"TV Pratteln NS 2", liga=>"5L D", vereinNo=>1034, vereinName=>"TV Pratteln NS")
						,array(teamNo=>"1345", teamName=>"TV Pratteln NS Sen", liga=>"DP 1L", vereinNo=>1034, vereinName=>"TV Pratteln NS")
						,array(teamNo=>"1271", teamName=>"TV Pratteln NS U17", liga=>"", vereinNo=>1034, vereinName=>"TV Pratteln NS")
						,array(teamNo=>"1123", teamName=>"TV Pratteln NS U23", liga=>"U23 D SK2", vereinNo=>1034, vereinName=>"TV Pratteln NS")
						,array(teamNo=>"1047", teamName=>"HduS Reinach", liga=>"", vereinNo=>1035, vereinName=>"HduS Reinach")
						,array(teamNo=>"1221", teamName=>"HduS Reinach", liga=>"", vereinNo=>1035, vereinName=>"HduS Reinach")
						,array(teamNo=>"1014", teamName=>"KTV Riehen", liga=>"2L H", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1215", teamName=>"KTV Riehen 1", liga=>"U15 D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1237", teamName=>"KTV Riehen 2", liga=>"U17 D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1004", teamName=>"KTV Riehen 2 (2L-D)", liga=>"2L D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1112", teamName=>"KTV Riehen 3", liga=>"3L D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1113", teamName=>"KTV Riehen 4", liga=>"4L D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1315", teamName=>"KTV Riehen A", liga=>"U19 D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1316", teamName=>"KTV Riehen B", liga=>"U19 D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1117", teamName=>"KTV Riehen U17A", liga=>"U17 D", vereinNo=>1036, vereinName=>"KTV Riehen")
						,array(teamNo=>"1083", teamName=>"Volley Sissach", liga=>"MP 2L", vereinNo=>1039, vereinName=>"VRTV Sissach")
						,array(teamNo=>"1110", teamName=>"VRTV Sissach", liga=>"5L D", vereinNo=>1039, vereinName=>"VRTV Sissach")
						,array(teamNo=>"1314", teamName=>"VRTV Sissach", liga=>"U19 D", vereinNo=>1039, vereinName=>"VRTV Sissach")
						,array(teamNo=>"1093", teamName=>"Cappuccinos", liga=>"MP 1L", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1008", teamName=>"Sm' Aesch Pfeffingen 3", liga=>"2L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1089", teamName=>"Sm' Aesch Pfeffingen 4", liga=>"3L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1090", teamName=>"Sm' Aesch Pfeffingen 5", liga=>"4L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1091", teamName=>"Sm' Aesch Pfeffingen 6", liga=>"4L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1304", teamName=>"Sm' Aesch Pfeffingen 7", liga=>"4L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1305", teamName=>"Sm' Aesch Pfeffingen 8", liga=>"4L D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1100", teamName=>"Sm' Aesch Pfeffingen U17-1", liga=>"U17 D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1219", teamName=>"Sm' Aesch Pfeffingen U17-2", liga=>"U17 D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1327", teamName=>"Sm' Aesch Pfeffingen U19", liga=>"U19 D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1360", teamName=>"Sm' Aesch Pfeffingen U23", liga=>"", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1104", teamName=>"Sm\' Aesch Pfeffingen U15-1", liga=>"U15 D", vereinNo=>1040, vereinName=>"Sm' Aesch Pfeffingen")
						,array(teamNo=>"1302", teamName=>"TV St. Johann 2", liga=>"4L D", vereinNo=>1043, vereinName=>"TV St.Johann")
						,array(teamNo=>"1301", teamName=>"TV St. Johann 3", liga=>"4L D", vereinNo=>1043, vereinName=>"TV St.Johann")
						,array(teamNo=>"1024", teamName=>"TV St.Johann 1", liga=>"4L D", vereinNo=>1043, vereinName=>"TV St.Johann")
						,array(teamNo=>"1194", teamName=>"TV St.Johann 4", liga=>"DP 2L", vereinNo=>1043, vereinName=>"TV St.Johann")
						,array(teamNo=>"1045", teamName=>"VBC Tecknau", liga=>"3L H", vereinNo=>1044, vereinName=>"VBC Tecknau")
						,array(teamNo=>"1046", teamName=>"VBC Tecknau", liga=>"4L D", vereinNo=>1044, vereinName=>"VBC Tecknau")
						,array(teamNo=>"1170", teamName=>"VBC Tenniken", liga=>"3L D", vereinNo=>1045, vereinName=>"VBC Tenniken")
						,array(teamNo=>"1181", teamName=>"VB Therwil 1", liga=>"2L H", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1324", teamName=>"VB Therwil D U15", liga=>"U15 D", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1208", teamName=>"VB Therwil D U17 A", liga=>"U17 D", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1354", teamName=>"VB Therwil D U17 B", liga=>"U17 D", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1002", teamName=>"VB Therwil D3", liga=>"2L D", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1183", teamName=>"VB Therwil D4", liga=>"2L D", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1307", teamName=>"VB Therwil D5", liga=>"4L D", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1180", teamName=>"VB Therwil H2", liga=>"3L H", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1270", teamName=>"VB Therwil H3", liga=>"4L H", vereinNo=>1046, vereinName=>"VB Therwil")
						,array(teamNo=>"1086", teamName=>"SVKT Therwil", liga=>"DP 2L", vereinNo=>1047, vereinName=>"SVKT Therwil")
						,array(teamNo=>"1007", teamName=>"SC Uni Basel 1", liga=>"3L D", vereinNo=>1048, vereinName=>"SC Uni Basel")
						,array(teamNo=>"1051", teamName=>"SC Uni Basel 3", liga=>"3L D", vereinNo=>1048, vereinName=>"SC Uni Basel")
						,array(teamNo=>"1107", teamName=>"VBC Volare", liga=>"DP 2L", vereinNo=>1138, vereinName=>"VBC Volare")
						,array(teamNo=>"1125", teamName=>"VBC Zeiningen", liga=>"DP 2L", vereinNo=>1050, vereinName=>"VBC Zeiningen")
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
		$nationaleTeams 
		 = array(array(teamNo=>"25664", teamName=>"#Dragons Lugano", liga=>"NLA-H", vereinNo=>915140, vereinName=>"PV Lugano")
						,array(teamNo=>"25949", teamName=>"#Dragons Lugano II", liga=>"1L-H", vereinNo=>915140, vereinName=>"PV Lugano")
						,array(teamNo=>"25657", teamName=>"Appenzeller Bären ", liga=>"NLB-H", vereinNo=>913175, vereinName=>"Appenzeller Bären")
						,array(teamNo=>"25667", teamName=>"biogas volley näfels I", liga=>"NLA-H", vereinNo=>914190, vereinName=>"Volley Näfels")
						,array(teamNo=>"25623", teamName=>"Burgerstein Vitamine Volley Jona", liga=>"NLA-H", vereinNo=>914130, vereinName=>"TSV Jona Volleyball")
						,array(teamNo=>"25663", teamName=>"Chênois Genève Volleyball I", liga=>"NLA-H", vereinNo=>901060, vereinName=>"Chênois Genève Volleyball")
						,array(teamNo=>"25636", teamName=>"Colombier Volley", liga=>"1L-H", vereinNo=>904060, vereinName=>"Colombier Volley")
						,array(teamNo=>"25296", teamName=>"Dynamo SeeWy ", liga=>"1L-D", vereinNo=>910147, vereinName=>"Dynamo SeeWy ")
						,array(teamNo=>"24638", teamName=>"FC Luzern II", liga=>"NLB-D", vereinNo=>911320, vereinName=>"FC Luzern")
						,array(teamNo=>"25108", teamName=>"FSG Savagnier", liga=>"1L-D", vereinNo=>904190, vereinName=>"FSG Savagnier")
						,array(teamNo=>"24992", teamName=>"Genève Volley", liga=>"NLB-D", vereinNo=>901085, vereinName=>"Genève Volley")
						,array(teamNo=>"24958", teamName=>"GSGV Giubiasco", liga=>"1L-D", vereinNo=>915040, vereinName=>"GSGV Giubiasco")
						,array(teamNo=>"25009", teamName=>"Hôtel Cristal VFM", liga=>"NLA-D", vereinNo=>905280, vereinName=>"VFM - Volleyball Franches-Montagnes")
						,array(teamNo=>"24977", teamName=>"KTV Riehen", liga=>"1L-D", vereinNo=>909610, vereinName=>"KTV Riehen")
						,array(teamNo=>"25666", teamName=>"Lausanne UC I", liga=>"NLA-H", vereinNo=>902250, vereinName=>"Lausanne UC")
						,array(teamNo=>"25646", teamName=>"Lausanne UC II", liga=>"NLB-H", vereinNo=>902250, vereinName=>"Lausanne UC")
						,array(teamNo=>"25602", teamName=>"LK Zug H1", liga=>"1L-H", vereinNo=>911630, vereinName=>"LK Zug Volleyball")
						,array(teamNo=>"25730", teamName=>"Lutry-Lavaux Volleyball I", liga=>"NLB-H", vereinNo=>902290, vereinName=>"Lutry-Lavaux Volleyball")
						,array(teamNo=>"24941", teamName=>"Pallavolo Kreuzlingen ", liga=>"1L-D", vereinNo=>913252, vereinName=>"Pallavolo Kreuzlingen")
						,array(teamNo=>"25622", teamName=>"Pallavolo Kreuzlingen ", liga=>"1L-H", vereinNo=>913252, vereinName=>"Pallavolo Kreuzlingen")
						,array(teamNo=>"24956", teamName=>"Raiffeisen Volleya Obwalden", liga=>"NLB-D", vereinNo=>911401, vereinName=>"Raiffeisen Volleya Obwalden")
						,array(teamNo=>"25925", teamName=>"Rätia Volley", liga=>"1L-D", vereinNo=>914220, vereinName=>"Rätia Volley")
						,array(teamNo=>"25596", teamName=>"Regio Volleyteam ", liga=>"1L-H", vereinNo=>908350, vereinName=>"Regio Volleyteam")
						,array(teamNo=>"24910", teamName=>"SAG Gordola", liga=>"1L-D", vereinNo=>915041, vereinName=>"SAG Gordola")
						,array(teamNo=>"25005", teamName=>"Sm`Aesch Pfeffingen I", liga=>"NLA-D", vereinNo=>909660, vereinName=>"Sm`Aesch Pfeffingen")
						,array(teamNo=>"24891", teamName=>"Sm`Aesch Pfeffingen II", liga=>"1L-D", vereinNo=>909660, vereinName=>"Sm`Aesch Pfeffingen")
						,array(teamNo=>"25499", teamName=>"STB Volley", liga=>"1L-H", vereinNo=>907730, vereinName=>"STB Volley")
						,array(teamNo=>"24966", teamName=>"STV St. Gallen ", liga=>"1L-D", vereinNo=>913420, vereinName=>"STV St. Gallen")
						,array(teamNo=>"25592", teamName=>"SV Mizuno Olten", liga=>"NLB-H", vereinNo=>908320, vereinName=>"SV Olten")
						,array(teamNo=>"26094", teamName=>"Thonon Volleyball", liga=>"1L-H", vereinNo=>901200, vereinName=>"Thonon Volleyball")
						,array(teamNo=>"25712", teamName=>"Traktor Basel 1", liga=>"1L-H", vereinNo=>909102, vereinName=>"Basel Traktor")
						,array(teamNo=>"24989", teamName=>"TS Volley Düdingen I", liga=>"NLA-D", vereinNo=>906100, vereinName=>"TS Volley Düdingen")
						,array(teamNo=>"24925", teamName=>"TS Volley Düdingen II", liga=>"1L-D", vereinNo=>906100, vereinName=>"TS Volley Düdingen")
						,array(teamNo=>"26091", teamName=>"TSV Jona Volleyball", liga=>"1L-H", vereinNo=>914130, vereinName=>"TSV Jona Volleyball")
						,array(teamNo=>"25654", teamName=>"TV Lunkhofen", liga=>"1L-H", vereinNo=>910292, vereinName=>"TV Lunkhofen")
						,array(teamNo=>"24982", teamName=>"TV Murten Volleyball", liga=>"1L-D", vereinNo=>906260, vereinName=>"TV Murten Volleyball")
						,array(teamNo=>"25648", teamName=>"TV Murten Volleyball", liga=>"1L-H", vereinNo=>906260, vereinName=>"TV Murten Volleyball")
						,array(teamNo=>"25488", teamName=>"U60 Muristalden", liga=>"1L-H", vereinNo=>907458, vereinName=>"U60 Muristalden")
						,array(teamNo=>"24946", teamName=>"VB Fides Ruswil", liga=>"NLB-D", vereinNo=>911440, vereinName=>"VB Fides Ruswil")
						,array(teamNo=>"25002", teamName=>"VB Therwil", liga=>"NLB-D", vereinNo=>909740, vereinName=>"VB Therwil")
						,array(teamNo=>"25616", teamName=>"VB Therwil 2", liga=>"1L-D", vereinNo=>909740, vereinName=>"VB Therwil")
						,array(teamNo=>"24998", teamName=>"VBC Aadorf I", liga=>"NLB-D", vereinNo=>913010, vereinName=>"VBC Aadorf")
						,array(teamNo=>"24976", teamName=>"VBC Aadorf II", liga=>"1L-D", vereinNo=>913010, vereinName=>"VBC Aadorf")
						,array(teamNo=>"25635", teamName=>"VBC Aeschi ", liga=>"1L-H", vereinNo=>908030, vereinName=>"VBC Aeschi")
						,array(teamNo=>"25655", teamName=>"VBC Andwil-Arnegg ", liga=>"NLB-H", vereinNo=>913040, vereinName=>"VBC Andwil-Arnegg")
						,array(teamNo=>"24947", teamName=>"VBC Andwil-Arnegg", liga=>"1L-D", vereinNo=>913040, vereinName=>"VBC Andwil-Arnegg")
						,array(teamNo=>"25752", teamName=>"VBC Andwil-Arnegg 2", liga=>"1L-H", vereinNo=>913040, vereinName=>"VBC Andwil-Arnegg")
						,array(teamNo=>"25574", teamName=>"VBC Belfaux", liga=>"1L-H", vereinNo=>906030, vereinName=>"VBC Belfaux")
						,array(teamNo=>"24935", teamName=>"VBC Bern", liga=>"1L-D", vereinNo=>907110, vereinName=>"VBC Bern")
						,array(teamNo=>"25632", teamName=>"VBC Buochs", liga=>"NLB-H", vereinNo=>911050, vereinName=>"VBC Buochs")
						,array(teamNo=>"24993", teamName=>"VBC Cheseaux I", liga=>"NLA-D", vereinNo=>902150, vereinName=>"VBC Cheseaux")
						,array(teamNo=>"24975", teamName=>"VBC Cheseaux II", liga=>"1L-D", vereinNo=>902150, vereinName=>"VBC Cheseaux")
						,array(teamNo=>"24981", teamName=>"VBC Cossonay I", liga=>"1L-D", vereinNo=>902170, vereinName=>"VBC Cossonay")
						,array(teamNo=>"25553", teamName=>"VBC Delémont", liga=>"1L-H", vereinNo=>905160, vereinName=>"VBC Delemont")
						,array(teamNo=>"24960", teamName=>"VBC Ebikon 1", liga=>"1L-D", vereinNo=>911080, vereinName=>"VBC Ebikon")
						,array(teamNo=>"24972", teamName=>"VBC Ecublens", liga=>"1L-D", vereinNo=>902200, vereinName=>"VBC Ecublens")
						,array(teamNo=>"25624", teamName=>"VBC Einsiedeln", liga=>"NLA-H", vereinNo=>912150, vereinName=>"VBC Einsiedeln")
						,array(teamNo=>"25077", teamName=>"VBC Einsiedeln ", liga=>"1L-D", vereinNo=>912150, vereinName=>"VBC Einsiedeln")
						,array(teamNo=>"25700", teamName=>"VBC Einsiedeln H2", liga=>"1L-H", vereinNo=>912150, vereinName=>"VBC Einsiedeln")
						,array(teamNo=>"24973", teamName=>"VBC Fribourg", liga=>"NLB-D", vereinNo=>906150, vereinName=>"VBC Fribourg")
						,array(teamNo=>"24954", teamName=>"VBC Fully", liga=>"1L-D", vereinNo=>903060, vereinName=>"VBC Fully")
						,array(teamNo=>"25641", teamName=>"VBC Fully", liga=>"1L-H", vereinNo=>903060, vereinName=>"VBC Fully")
						,array(teamNo=>"24963", teamName=>"VBC Galina", liga=>"NLB-D", vereinNo=>914110, vereinName=>"VBC Galina")
						,array(teamNo=>"25578", teamName=>"VBC Gelterkinden", liga=>"1L-H", vereinNo=>909270, vereinName=>"VBC Gelterkinden")
						,array(teamNo=>"24965", teamName=>"VBC Gerlafingen", liga=>"1L-D", vereinNo=>908120, vereinName=>"VBC Gerlafingen")
						,array(teamNo=>"24997", teamName=>"VBC Glaronia", liga=>"NLB-D", vereinNo=>914120, vereinName=>"VBC Glaronia")
						,array(teamNo=>"24971", teamName=>"VBC Groupe E Greenwatt Val-de-Travers", liga=>"NLB-D", vereinNo=>904230, vereinName=>"VBC Val-de-Travers")
						,array(teamNo=>"24985", teamName=>"VBC Kanti Baden ", liga=>"1L-D", vereinNo=>910054, vereinName=>"VBC Kanti Baden")
						,array(teamNo=>"25656", teamName=>"VBC Kanti Baden", liga=>"1L-H", vereinNo=>910054, vereinName=>"VBC Kanti Baden")
						,array(teamNo=>"25590", teamName=>"VBC La Côte", liga=>"1L-H", vereinNo=>902239, vereinName=>"VBC La Côte")
						,array(teamNo=>"25580", teamName=>"VBC La-Chaux-de-Fonds", liga=>"1L-H", vereinNo=>904050, vereinName=>"VBC La Chaux-de-Fonds")
						,array(teamNo=>"25650", teamName=>"VBC Laufen", liga=>"NLB-H", vereinNo=>909340, vereinName=>"VBC Laufen")
						,array(teamNo=>"25003", teamName=>"VBC Laufen", liga=>"1L-D", vereinNo=>909340, vereinName=>"VBC Laufen")
						,array(teamNo=>"25579", teamName=>"VBC Lausanne", liga=>"1L-H", vereinNo=>902240, vereinName=>"VBC Lausanne")
						,array(teamNo=>"25771", teamName=>"VBC Malters ", liga=>"1L-H", vereinNo=>911360, vereinName=>"VBC Malters")
						,array(teamNo=>"24984", teamName=>"VBC Münchenbuchsee", liga=>"1L-D", vereinNo=>907450, vereinName=>"VBC Münchenbuchsee")
						,array(teamNo=>"25652", teamName=>"VBC Münchenbuchsee I", liga=>"NLB-H", vereinNo=>907450, vereinName=>"VBC Münchenbuchsee")
						,array(teamNo=>"24983", teamName=>"VBC Münsingen", liga=>"NLB-D", vereinNo=>907440, vereinName=>"VBC Münsingen")
						,array(teamNo=>"25614", teamName=>"VBC Nidau ", liga=>"1L-H", vereinNo=>905270, vereinName=>"Nidau Volleyballclub")
						,array(teamNo=>"25269", teamName=>"VBC NUC II", liga=>"NLB-D", vereinNo=>904140, vereinName=>"VBC NUC")
						,array(teamNo=>"25314", teamName=>"VBC Oftringen 1", liga=>"1L-D", vereinNo=>910450, vereinName=>"VBC Oftringen")
						,array(teamNo=>"25522", teamName=>"VBC Riggisberg", liga=>"1L-H", vereinNo=>907520, vereinName=>"VBC Riggisberg")
						,array(teamNo=>"24949", teamName=>"VBC Schmitten", liga=>"1L-D", vereinNo=>906340, vereinName=>"VBC Schmitten")
						,array(teamNo=>"25546", teamName=>"VBC Servette Star-Onex", liga=>"NLB-H", vereinNo=>901170, vereinName=>"VBC Servette Star-Onex")
						,array(teamNo=>"24974", teamName=>"VBC Servette Star-Onex", liga=>"1L-D", vereinNo=>901170, vereinName=>"VBC Servette Star-Onex")
						,array(teamNo=>"25000", teamName=>"VBC Sion", liga=>"1L-D", vereinNo=>903270, vereinName=>"VBC Sion")
						,array(teamNo=>"24995", teamName=>"VBC Steinhausen", liga=>"NLB-D", vereinNo=>911570, vereinName=>"VBC Steinhausen")
						,array(teamNo=>"25617", teamName=>"VBC Uni Bern ", liga=>"NLB-H", vereinNo=>907820, vereinName=>"VBC Uni Bern ")
						,array(teamNo=>"26322", teamName=>"VBC Uni Bern ", liga=>"1L-H", vereinNo=>907820, vereinName=>"VBC Uni Bern ")
						,array(teamNo=>"24896", teamName=>"VBC Visp", liga=>"1L-D", vereinNo=>903300, vereinName=>"VBC Visp")
						,array(teamNo=>"25665", teamName=>"VBC Voléro Zürich I", liga=>"NLB-H", vereinNo=>912470, vereinName=>"VBC Voléro Zürich")
						,array(teamNo=>"25645", teamName=>"VBC Voléro Zürich II", liga=>"1L-H", vereinNo=>912470, vereinName=>"VBC Voléro Zürich")
						,array(teamNo=>"25618", teamName=>"VBC Wetzikon", liga=>"1L-H", vereinNo=>912520, vereinName=>"VBC Wetzikon ")
						,array(teamNo=>"25079", teamName=>"VBC Wetzikon D1", liga=>"1L-D", vereinNo=>912520, vereinName=>"VBC Wetzikon ")
						,array(teamNo=>"25625", teamName=>"VBC Willisau 1", liga=>"1L-H", vereinNo=>911610, vereinName=>"VBC Willisau")
						,array(teamNo=>"25495", teamName=>"VBC Yverdon Ancienne ", liga=>"1L-H", vereinNo=>902500, vereinName=>"VBC Yverdon Ancienne")
						,array(teamNo=>"25658", teamName=>"VBC züri unterland", liga=>"NLB-H", vereinNo=>912220, vereinName=>"VBC Züri Unterland")
						,array(teamNo=>"24987", teamName=>"VBC züri unterland", liga=>"1L-D", vereinNo=>912220, vereinName=>"VBC Züri Unterland")
						,array(teamNo=>"25615", teamName=>"VBG Klettgau ", liga=>"NLB-H", vereinNo=>913245, vereinName=>"VBG Klettgau")
						,array(teamNo=>"25008", teamName=>"VC Kanti Schaffhausen I", liga=>"NLA-D", vereinNo=>913310, vereinName=>"VC Kanti Schaffhausen")
						,array(teamNo=>"25603", teamName=>"VC Smash Winterthur ", liga=>"1L-H", vereinNo=>913380, vereinName=>"VC Smash Winterthur")
						,array(teamNo=>"24892", teamName=>"VFM - Volleyball Franches-Montagnes II", liga=>"1L-D", vereinNo=>905280, vereinName=>"VFM - Volleyball Franches-Montagnes")
						,array(teamNo=>"24990", teamName=>"Viteos NUC I", liga=>"NLA-D", vereinNo=>904140, vereinName=>"VBC NUC")
						,array(teamNo=>"25012", teamName=>"Volero Zürich I ", liga=>"NLA-D", vereinNo=>912470, vereinName=>"VBC Voléro Zürich")
						,array(teamNo=>"25661", teamName=>"Volley Amriswil I", liga=>"NLA-H", vereinNo=>913030, vereinName=>"Volley Amriswil")
						,array(teamNo=>"25567", teamName=>"Volley Amriswil II", liga=>"1L-H", vereinNo=>913030, vereinName=>"Volley Amriswil")
						,array(teamNo=>"25626", teamName=>"Volley Emmen-Nord ", liga=>"1L-H", vereinNo=>911606, vereinName=>"Volley Emmen-Nord")
						,array(teamNo=>"25100", teamName=>"Volley Fricktal 1-Frick", liga=>"1L-D", vereinNo=>910175, vereinName=>"TSV Frick Volleyball")
						,array(teamNo=>"25926", teamName=>"Volley Köniz", liga=>"NLA-D", vereinNo=>907345, vereinName=>"Volley Köniz")
						,array(teamNo=>"26330", teamName=>"Volley Köniz II", liga=>"NLB-D", vereinNo=>907345, vereinName=>"Volley Köniz")
						,array(teamNo=>"24905", teamName=>"Volley Lugano I", liga=>"NLB-D", vereinNo=>915038, vereinName=>"Volley Lugano")
						,array(teamNo=>"25851", teamName=>"Volley Lugano II", liga=>"1L-D", vereinNo=>915038, vereinName=>"Volley Lugano")
						,array(teamNo=>"24907", teamName=>"Volley Luzern Nachwuchs ", liga=>"NLB-D", vereinNo=>911309, vereinName=>"Volley Luzern Nachwuchs")
						,array(teamNo=>"24959", teamName=>"Volley Muri Bern", liga=>"1L-D", vereinNo=>907456, vereinName=>"Volley Muri Bern")
						,array(teamNo=>"25633", teamName=>"Volley Muristalden", liga=>"1L-H", vereinNo=>907452, vereinName=>"Muristalden Volley")
						,array(teamNo=>"25647", teamName=>"Volley Näfels II", liga=>"1L-H", vereinNo=>914190, vereinName=>"Volley Näfels")
						,array(teamNo=>"25634", teamName=>"Volley Oberdiessbach", liga=>"NLB-H", vereinNo=>907465, vereinName=>"Volley Oberdiessbach")
						,array(teamNo=>"24961", teamName=>"Volley Oberdiessbach", liga=>"1L-D", vereinNo=>907465, vereinName=>"Volley Oberdiessbach")
						,array(teamNo=>"25928", teamName=>"Volley Schönenwerd", liga=>"1L-D", vereinNo=>910580, vereinName=>"Volley Schönenwerd")
						,array(teamNo=>"25939", teamName=>"Volley Schönenwerd 3", liga=>"1L-H", vereinNo=>910580, vereinName=>"Volley Schönenwerd")
						,array(teamNo=>"25927", teamName=>"Volley Schönenwerd I", liga=>"NLA-H", vereinNo=>910580, vereinName=>"Volley Schönenwerd")
						,array(teamNo=>"25547", teamName=>"Volley Schönenwerd II", liga=>"NLB-H", vereinNo=>910580, vereinName=>"Volley Schönenwerd")
						,array(teamNo=>"25704", teamName=>"Volley Smash 05 Laufenburg-Kaisten", liga=>"NLB-H", vereinNo=>910250, vereinName=>"Volley Smash 05 Laufenburg-Kaisten")
						,array(teamNo=>"24940", teamName=>"Volley Solothurn", liga=>"1L-D", vereinNo=>908450, vereinName=>"Volley Solothurn")
						,array(teamNo=>"25450", teamName=>"Volley Solothurn", liga=>"1L-H", vereinNo=>908450, vereinName=>"Volley Solothurn")
						,array(teamNo=>"24964", teamName=>"Volley Toggenburg 2", liga=>"1L-D", vereinNo=>913510, vereinName=>"Volley Toggenburg")
						,array(teamNo=>"25006", teamName=>"Volley Toggenburg I", liga=>"NLA-D", vereinNo=>913510, vereinName=>"Volley Toggenburg")
						,array(teamNo=>"26317", teamName=>"Volley Top Luzern", liga=>"NLA-D", vereinNo=>911330, vereinName=>"Volley Top Luzern")
						,array(teamNo=>"26318", teamName=>"Volley Top Luzern", liga=>"NLA-H", vereinNo=>911330, vereinName=>"Volley Top Luzern")
						,array(teamNo=>"25480", teamName=>"Volleyball Papiermühle ", liga=>"1L-H", vereinNo=>907620, vereinName=>"Volleyball Papiermühle")
						);
		return $nationaleTeams;
	}
	
  function getVolleyBaselVereine() {
	  $vereine = new VereinListe();
		$vereine->addVerein(new Verein('KTV Riehen',                         '909610', '1036'))
						->addVerein(new Verein('VBC Allschwil',                      null,     '1001')) // '909020'
						->addVerein(new Verein('TV Arlesheim' ,                      null,     '1002')) // '909030'
						->addVerein(new Verein('VBC Bärschwil',                      null,     '1141')) // '909051'
						//->addVerein(new Verein('ATV Basel Stadt', '90970', '1004'))
						->addVerein(new Verein('KTV Basel',                          null,     '1006')) // '909090'
						->addVerein(new Verein('Traktor Basel',                      '909102', '1007'))
						->addVerein(new Verein('TV Bettingen',                       null,     '1009')) // '909110'
						->addVerein(new Verein('DR Binningen',                       null,     '1010')) // '909120'
						->addVerein(new Verein('TV Bretzwil',                        null,     '1011')) //'909177
						->addVerein(new Verein('VBC Brislach' ,                      null,     '1012')) //'909180'
						->addVerein(new Verein('VBC Bubendorf' ,                     null,     '1103')) // '909181'
						//->addVerein(new Verein('VB Ettingen',                      '909200', '1014'))
						->addVerein(new Verein('FP Olympia',                         null,     '1015')) // '909210'
						//->addVerein(new Verein('TV Frenkendorf',                   '909220', '1016'))
						->addVerein(new Verein('VBC Gelterkinden',                   '909270', '1017'))
						->addVerein(new Verein('Volley Glaibasel',                   null,     '1018')) // '909275'
						//->addVerein(new Verein('VBC Zoll Hopp 88',                 '909287', '1021'))
						->addVerein(new Verein('TV Itingen',                         null,     '1020')) // '909285'
						->addVerein(new Verein('VBC Kaiseraugst',                    null,     '1022')) // '909288'
						->addVerein(new Verein('VBC Laufen' ,                        '909340', '1024'))
						->addVerein(new Verein('Volley Smash 05 Laufenburg-Kaisten', '910250', null))
						->addVerein(new Verein('SV Lausen',                          null,     '1025')) // '909350'
						->addVerein(new Verein('SC Gym Leonhard',                    null,     '1026')) // '909355'
						->addVerein(new Verein('VBC Liesberg',                       null,     '1052')) // '909360'
						->addVerein(new Verein('VBC Gym Liestal',                    null,     '1027')) // '909370'
						->addVerein(new Verein('VBC Münchenstein',                   null,     '1029')) // '909430'
						->addVerein(new Verein('TV Muttenz',                         null,     '1030')) // '909460'
						//->addVerein(new Verein('VB Neubad',                        '909470', '1031'))
						//->addVerein(new Verein('TV Neue Welt',                     '909480', '1032'))
						->addVerein(new Verein('SC Novartis',                        null,     '1023')) // '909330'
						->addVerein(new Verein('DR Nunningen',                       null,     '1033')) // '909485'
						->addVerein(new Verein('TV Pratteln NS',                     null,     '1034')) // '909530'
						//->addVerein(new Verein('HduS Reinach',                     '909560', '1035'))
						->addVerein(new Verein('VRTV Sissach',                       null,     '1039')) // '909640'
						->addVerein(new Verein('Sm\'Aesch Pfeffingen',               '909660', '1040'))
						//->addVerein(new Verein('TV St. Clara',                     '909690', '1042'))
						->addVerein(new Verein('TV St.Johann',                       null,     '1043')) // '909710'
						->addVerein(new Verein('VBC Tecknau',                        null,     '1044')) // '909730'
						->addVerein(new Verein('VBC Tenniken',                       null,     '1045')) // '909735'
						->addVerein(new Verein('VB Therwil',                         '909740', '1046'))
						//->addVerein(new Verein('SVKT Therwil',                     '909745', '1047'))
						//->addVerein(new Verein('VBC Volare',                       '909760', '1138'))
						//->addVerein(new Verein('VBC Zeiningen',                    '909775', '1050'))
						->addVerein(new Verein('SC Uni Basel',                       null,     '1048'));// '909750'
							  
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
		$this->teamListe['D1']     = array(teamNo    => '24977', 
				                               verband   => self::NATIONAL,
				                               teamName  => 'Damen 1',
				                               gruppen   => array(array(gruppeNo => '9133', gruppeName => 'Qualification')
		                                                     ,array(gruppeNo => '9416', gruppeName => 'Cup 3. Runde')
		                                                     ,array(gruppeNo => '9396', gruppeName => 'Cup 2. Runde')));
		
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
		
		$this->teamListe['U17B' ] = array(teamNo    => '1237',
																			teamName  => 'U17B',
																			verband   => self::REGIONAL,
																			gruppen   => array(array(gruppeNo => '1056', gruppeName => 'Finalrunde C')
																					              ,array(gruppeNo => '1035', gruppeName => 'Vorrunde')));

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
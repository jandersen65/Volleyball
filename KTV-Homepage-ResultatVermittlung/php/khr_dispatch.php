
<?php
  require_once("lib/khr_server.php");
  require_once("lib/khr_conf.php");
  require_once("lib/khr_lib.php");  
  
  require_once("mvc/model/IDataService.php");
  require_once("mvc/model/RegionalDataService.php");
  require_once("mvc/model/NationalDataService.php");

  require_once("mvc/model/Rang.php");
  require_once("mvc/model/RangListe.php");

  require_once("mvc/model/Team.php");
  require_once("mvc/model/TeamListe.php");

  require_once("mvc/model/Gruppe.php");
  require_once("mvc/model/GruppeListe.php");

  require_once("mvc/model/Verein.php");
  require_once("mvc/model/VereinListe.php");

  require_once("mvc/model/Spiel.php");
  require_once("mvc/model/SpielListe.php");

  require_once("mvc/model/RegioBSVolleyWS.php");
  require_once("mvc/model/SwissVolleyWS.php");

  require_once("mvc/controller/KTVRequest.php");
  require_once("mvc/controller/ResultatController.php");
  
  require_once("mvc/view/Viewer.php");
  require_once("mvc/view/JQViewer.php");
  require_once("mvc/view/JandersenViewer.php");
  
  //$viewer = (isForJQuery) ? new JQViewer() : new Viewer();
  $viewer     = new JandersenViewer();
  $controller = new ResultatController($viewer);

  $request    = new KTVRequest();
  $action = $request->getAction();
  //echo $action;
  //return;
  switch ($action) {
    case "2000": // aktuelle Spiele, KTV
    	$controller->getAktuelleSpiele();
    	break;
    case "2001": // aktuelle Spiele, Verein
      $regionalVereinNo = $request->getParameter("regionalvereinno");
      $nationalVereinNo = $request->getParameter("nationalvereinno");
    	$controller->getAktuelleSpieleVerein($regionalVereinNo, $nationalVereinNo);
    	break;
    case "2010": // alle Spiele
    	$controller->getAlleSpiele();
    	break;
    case "3000": // team
      $team = $request->getParameter("team");
      $controller->getTeam($team);
    	break;
    case "4000": // team spiele
      $team = $request->getParameter("team");
      $controller->getTeamSpiele($team);
    	break;
    case "4001": // team spiele - auch non-KTV
      $team    = $request->getParameter("teamno");
      $verband = $request->getParameter("verband");
      $controller->getTeamGenSpiele($team, $verband);
    	break;
    case "5000": // gruppe spiele
      $team     = $request->getParameter("team");
      $gruppeNo = $request->getParameter("gruppeno");
    	$controller->getGruppeSpiele($gruppeNo, $team);
    	break;
    case "5010": // nächste gruppe spiele
      $verband  = $request->getParameter("verband");
      $gruppeNo = $request->getParameter("gruppeno");
    	$controller->getNaechsteGruppeSpiele($verband, $gruppeNo);
    	break;
    case "6000": // regionale spiele heute
      $offset = $request->getParameter("offset");
    	$controller->getRegionaleSpieleHeute($offset);
    	break;
    case "6010": // nationale spiele heute
      $offset = $request->getParameter("offset");
    	$controller->getNationaleSpieleHeute($offset);
    	break;
    case "7001": // Regio Vereine
    	$controller->getRegioVereine();
    	break;
    case "7002": // verein
      $regionalVereinNo = $request->getParameter("regionalvereinno");
      $nationalVereinNo = $request->getParameter("nationalvereinno");
    	$controller->getTeamVerein($regionalVereinNo, $nationalVereinNo);
    	break;
    case "7010": // nationale mannschaften;
    	$controller->getNationaleMannschaften();
    	break;
    case "7020": // team generel
      $verband = $request->getParameter("verband");
      $teamNo  = $request->getParameter("teamno");
    	$controller->getGenTeam($verband, $teamNo);
    	break;
    case "7025": // KTV teams
    	$controller->getKTVTeams();
    	break;
    case "7030": // Regio Vereine
    	$controller->getRegioVereine();
    	break;
    case "7032": // Regio Vereine
    	$controller->getNatVereine();
    	break;
    case "9000": // Verein Main Menu
    	$controller->setupVereinMainMenu();
    	break;
    case "9010": // Regional Main Menu
    	$controller->setupRegionalMainMenu();
    	break;
    case "9020": // National Main Menu
    	$controller->setupNationalMainMenu();
    	break;
    default; // TODO codebug
      break;
  } // switch ($action)
  
?>
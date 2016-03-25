<?php

  require_once("lib/khr_server.php");
  require_once("lib/khr_conf.php");
  
  require_once("mvc/model/Galerie.php");
  require_once("mvc/model/Verzeichnis.php");
  require_once("mvc/model/Sammlungen.php");
  require_once("mvc/model/Sammlung.php");

  //require_once("mvc/view/EmbedViewer.php");
  //require_once("mvc/view/ModalViewer.php");
  require_once("mvc/view/GalerieViewer.php");
  
  require_once("mvc/controller/GalerieController.php");
  
  $viewer = new GalerieViewer();
  //$viewer = new ModalViewer();
  //$viewer = new EmbedViewer();
  $controller = new GalerieController($viewer);

  $controller->dispatch($_REQUEST["action"]);
  

?>
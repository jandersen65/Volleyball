<?php

class GalerieViewer {

	public function printSammlungen($sammlungen) {
		echo "<ul class='uk-nav uk-nav-side uk-nav-parent-icon' data-uk-nav='{multiple:true}'>";
		foreach ($sammlungen as $sammlung) {
			echo "<li class='uk-parent'>";
			echo "<a href='#'>"  . $sammlung->getSammlungName() . "</a>";
			$this->printGalerieList($sammlung);
			echo "</li>";
		}
		echo "</ul>";
	}
	
	
	
	private function printGalerieList($sammlung) {

		echo "<ul class='uk-nav-sub'>";
			echo "<li>" ;
		foreach($sammlung->getGalerieList() as $galerie) {
			$href = "javascript:viewNewWindow('". $galerie->getWebPath() . "/index.html');";
			echo   "<div class='khr-img-overlay'>";
			echo   "<a href='#' onclick=\"$href\">" ;
	    echo     "<figure>";
			echo       "<img src='" . $galerie->getWebPathBild() . "' style='width:200px;height:140px;'>";
			echo       "<div class='khr-text-overlay'>" . $galerie->getGalerieName() . "</div>";
	    echo   "</figure>";
			echo   "</a>";
			echo   "</div>";
		}
			echo "</li>" ;
		echo "</ul>";
	}
	
	
	
}

?>
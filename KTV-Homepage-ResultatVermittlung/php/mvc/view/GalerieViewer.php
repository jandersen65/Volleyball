<?php

class GalerieViewer {

	public function printSammlungen($sammlungen) {
		foreach ($sammlungen as $sammlung) {
			$this->printGalerieList($sammlung);
		}
	}
	
	
	private function printGalerieList($sammlung) {
		foreach($sammlung->getGalerieList() as $galerie) {
			$href = "javascript:viewNewWindow('". $galerie->getWebPath() . "/index.html');";
			echo "<div class='uk-flex uk-flex-wrap'>";
			echo   "<a href='#' onclick=\"$href\">" ;
			echo     "<div class='khr-img-overlay'>";
			echo       "<img src='" . $galerie->getWebPathBild() . "'>";
			echo       "<div class='khr-text-overlay'>" . $galerie->getGalerieName() . "</div>";
			echo     "</div>";
			echo   "</a>";
			echo "</div>";
		}
	}
	
	
}

?>
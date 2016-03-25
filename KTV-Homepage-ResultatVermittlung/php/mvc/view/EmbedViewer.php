<?php

class EmbedViewer {

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
		
		echo "<ul class='uk-nav-sub' data-uk-observe>";
		foreach($sammlung->getGalerieList() as $galerie) {
			echo "<li>";
			
			echo "<div id='" . $galerie->getId() . "' style='display:none;'>". $galerie->getFullPath() . "/index.html" . "</div>";
			echo "<a href='javascript:viewEmbedded(\"" . $galerie->getId() . "\");'>" . $galerie->getGalerieName() . "</a>";
			
			echo "</li>";
		}
		echo "</ul>";
	}
	
}

?>
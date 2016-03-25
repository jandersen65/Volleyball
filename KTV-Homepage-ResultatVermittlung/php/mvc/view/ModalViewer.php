<?php

class ModalViewer {

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
		foreach($sammlung->getGalerieList() as $galerie) {
			echo "<li>";
			
			echo "<a href='#" . $galerie->getId() . "' data-uk-modal>" . $galerie->getGalerieName() . "</a>";
			
			echo "<div id='" . $galerie->getId() . "' class='uk-modal data-uk-observe'>";
			echo   "<div class='uk-modal-dialog' style='width:850px; height:650px;'>"; 
			echo     "<a class='uk-modal-close uk-close'></a>";
			echo     "<iframe src='" . $galerie->getFullPath() . "/index.html'" 
					   .        " style='width:800px; height:600px;'"
					   . ">" 
					   . "</iframe>";
			echo   "</div>";
			echo "</div>";
			
			echo "</li>";
		}
		echo "</ul>";
	}
	
}

?>
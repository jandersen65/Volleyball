<?php


class GalerieController {
	
	private $viewer;

	public function __construct($viewer) {
		$this->viewer = $viewer;
	}
	
	public function dispatch($action) {
		switch ($action) {
			case "sammlungen":
				$this->viewer->printSammlungen($this->getSammlungen());
				break;
			default; // TODO codebug
			echo "default";
			break;
		}
	}
	

	private function getSammlungen() {
		
		$sammlungen = new Sammlungen(GALERIEN_PHP_HOME);
		$sammlungen = $sammlungen->getSammlungen();
		return $sammlungen;
	}

}

?>
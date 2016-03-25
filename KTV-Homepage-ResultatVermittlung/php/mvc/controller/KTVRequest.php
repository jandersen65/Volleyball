<?php

class KTVRequest {
	
  private $request;

  public function __construct()  {
    if ($this->request == null) {
  	  $this->request = $_REQUEST;
  	}
  } // __construct
  
  public function getAction() {
  	return $this->request["action"];
  } //getAction
  
  public function getParameter($param) {
  	$value=$this->request[$param];
  	if (is_null($value)) {
  		$value=$this->request[strtolower($param)];
  	}
  	return $value;
  } //getParameter
	
} // KTV_Request
 
?>
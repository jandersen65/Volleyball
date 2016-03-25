<?php

  function spielListeDatumSort($spiel1, $spiel2) {
  	if (isset($spiel1) && isset($spiel2)) {
  		$td1 = $spiel1->getDatum();
  		$td2 = $spiel2->getDatum();
  		if (($td1 != NULL) && ($td2 != NULL)) {
  	    $tmp1 = 0 + $td1->format('U'); // 0 - Zahlkonvertierung
  	    $tmp2 = 0 + $td2->format('U');
        return $tmp1 < $tmp2 ? -1 : ($tmp1 == tmp2 ? 0 : 1);
  		}
  	}
  	return 0;
  }

  function getSVDatum($SVDatumZeit) {
  	if (isset($SVDatumZeit)) {
  	  $l_tmp1 = explode(" ", $SVDatumZeit);
  	  $l_tmp2 = explode("-", $l_tmp1[0]);
    	return $l_tmp2[0] . "-" . $l_tmp2[1] . "-" . $l_tmp2[2] ;
  	}
  	return "";
  }
  
  function getSVZeit($SVDatumZeit) {
  	if (isset($SVDatumZeit)) {
	  	$l_tmp1 = explode(" ", $SVDatumZeit);
	  	$l_tmp2 = explode(":", $l_tmp1[1]);
	  	return $l_tmp2[0] . ":" . $l_tmp2[1] ;
  	}
  	return "";
  }
  
?>
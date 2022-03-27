


function getGalerieList(pId) {
  xmlHttp = getRequest(pId); 
  xmlHttp.open("GET", 'php/khg_dispatch.php?'
		              + 'action=sammlungen');
  xmlHttp.send();
}




function viewEmbedded(elemId) {
  galeriePath   = document.getElementById(elemId).innerHTML;
  galerieElem   = document.getElementById("id_galerie");
  galerieElem.innerHTML = "<iframe src='" + galeriePath + "' width='800px' height='500px'></iframe>";
}

function viewNewWindow(galeriePath) {
  window.open(galeriePath, "KTVGalerieFenster");
}

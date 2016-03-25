
var gSyncron   = true;
var gAsyncron  = true;

function getRequest(elemId) {
  elem  = document.getElementById(elemId);
  xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function() {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
      elem.innerHTML = xmlHttp.responseText;
    }
  }
  return xmlHttp;
} //getRequest


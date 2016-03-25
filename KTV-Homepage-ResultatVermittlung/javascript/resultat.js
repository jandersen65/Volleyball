


function getAktuelleSpiele(pElem) {
  xmlHttp = getRequest(pElem);
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=2000', gSyncron);
  xmlHttp.send();
}

function getAlleSpiele(pElem) {
  xmlHttp = getRequest(pElem);
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=2010', gSyncron);
  xmlHttp.send();
}


function getTeam(pTeam, pElem) {
  xmlHttp = getRequest(pElem);
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=3000' + '&team=' + pTeam, gSyncron);
  xmlHttp.send();
}

function getTeamSpiele(pDocId, pTeam) {
  //docElem  = document.getElementById(pDocId);
  //docElem.checked = !docElem.checked;
  xmlHttp = getRequest("id_khr_teampage_data");
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=4000' + '&team=' + pTeam, gSyncron);
  xmlHttp.send();
}

function getGruppeSpiele(pDocId, pGruppeNo, pTeam) {
  //docElem  = document.getElementById(pDocId);
  //docElem.checked = !docElem.checked;
  xmlHttp = getRequest("id_khr_teampage_data");
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=5000' 
                                               + '&team='     + pTeam
		                                       + '&gruppeno=' + pGruppeNo,
		                                       gSyncron);
  xmlHttp.send();
}

function getRegioSpiele(pOffset, pElem) {
  xmlHttp = getRequest(pElem);
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=6000' 
		                                       + '&offset=' + pOffset, gSyncron);
  xmlHttp.send();
}


function getNatSpiele(pOffset, pElem) {
  xmlHttp = getRequest(pElem);
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=6010' 
		                                       + '&offset=' + pOffset, gSyncron);
  xmlHttp.send();
}

function getMannschaftenNational() {
  xmlHttp = getRequest("id_khr_einhalt"); 
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=7010', gSyncron);
  xmlHttp.send();
}

function getVereine(pElem) {
  xmlHttp = getRequest(pElem); 
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=7001', gSyncron);
  xmlHttp.send();
}

function getVerein(regionalVereinNo, nationalVereinNo) {
  xmlHttp = getRequest('id_verein'); 
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=7002'
		                                      + '&regionalVereinNo=' + regionalVereinNo
		                                      + '&nationalVereinNo=' + nationalVereinNo, gSyncron);
  xmlHttp.send();
}

function getGenTeam(docId, verband, teamNo) {
  xmlHttp = getRequest(docId); 
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=7020'
                                              + '&verband=' + verband
                                              + '&teamNo='  + teamNo, gSyncron);
  xmlHttp.send();
}

function getKTVTeams(docId) {
  xmlHttp = getRequest(docId); 
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=7025', gSyncron);
  xmlHttp.send();
}

function getRegioVereine(docId) {
  xmlHttp = getRequest(docId); 
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=7030', gSyncron);
  xmlHttp.send();
}

function getNatVereine(docId) {
  xmlHttp = getRequest(docId); 
  xmlHttp.open("GET", 'php/khr_dispatch.php?' + 'action=7032', gSyncron);
  xmlHttp.send();
}


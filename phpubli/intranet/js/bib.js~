function parseBib(){
	var bib = new BibtexDisplay().displayBibtex3($("#bibtex_input").val());
	go(bib);
}

function getXhr(){
    var xhr = null;
    if(window.XMLHttpRequest) // Firefox et autres
	xhr = new XMLHttpRequest();
    else if(window.ActiveXObject){ // Internet Explorer
	try {
	    xhr = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	    xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
    }
    else { // XMLHttpRequest non supporté par le navigateur
	alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	xhr = false;
    }
    return xhr
}

function go(entries){
    var xhr = getXhr()
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
	    // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
	    if(xhr.readyState == 4 && xhr.status == 200){
		   alert(xhr.responseText);
	    }
    }
    xhr.open("POST","envoi.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    var req ="";

    for (var entryKey in entries) {
	var entry = entries[entryKey];
	//console.log(entryKey);
	// find all keys in the entry
	var keys = [];
	for (var key in entry) {
	    keys.push(key.toUpperCase());
	}

	// fill in remaining fields
	for (var index in keys) {
	    var key = keys[index];
	    var value = entry[key] || "";
	    req += key+"="+value+"&";
	}
    }
    xhr.send(req);
}
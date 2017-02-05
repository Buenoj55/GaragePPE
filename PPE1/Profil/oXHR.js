function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function request(oSelect) {
    var value = oSelect.options[oSelect.selectedIndex].value;
    var xhr   = getXMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            readData(xhr.responseXML);
            document.getElementById("loader").style.display = "none";
        } else if (xhr.readyState < 4) {
            document.getElementById("loader").style.display = "inline";
        }
    };
    
    xhr.open("POST", "XMLHttpRequest_getListData.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("marque_Vehicule=" + value);
}

function readData(oData) {
    var nodes   = oData.getElementsByTagName("item");
    var oSelect = document.getElementById("modele_Vehicule");
    var oOption, oInner;
    
    oSelect.innerHTML = "";
    for (var i=0, c=nodes.length; i<c; i++) {
        oOption = document.createElement("option");
        oInner  = document.createTextNode(nodes[i].getAttribute("id"));
        oOption.value = nodes[i].getAttribute("id");
        
        oOption.appendChild(oInner);
        oSelect.appendChild(oOption);
    }
}
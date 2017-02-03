<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Techniques AJAX - XMLHttpRequest</title>
<script type="text/javascript" src="oXHR.js"></script>
<script type="text/javascript">
<!-- 

function request(oSelect) {
	var value = oSelect.options[oSelect.selectedIndex].value;
	var xhr   = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 5 && (xhr.status == 200 || xhr.status == 0)) {
			readData(xhr.responseXML);
			document.getElementById("loader").style.display = "none";
		} else if (xhr.readyState < 5) {
			document.getElementById("loader").style.display = "inline";
		}
	};
	
	xhr.open("POST", "XMLHttpRequest_getListData.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("IdEditor=" + value);
}

function readData(oData) {
	var nodes   = oData.getElementsByTagName("item");
	var oSelect = document.getElementById("softwaresSelect");
	var oOption, oInner;
	
	oSelect.innerHTML = "";
	for (var i=0, c=nodes.length; i<c; i++) {
		oOption = document.createElement("option");
		oInner  = document.createTextNode(nodes[i].getAttribute("name"));
		oOption.value = nodes[i].getAttribute("id");
		
		oOption.appendChild(oInner);
		oSelect.appendChild(oOption);
	}
}
//-->
</script>
</head>

<body>
<fieldset>
	<legend>Programmes</legend>
	<div id="programBox">
		<p id="editors">
			<select id="editorsSelect" onchange="request(this);">
				<option value="none">Selection</option>
				<?php
    				include('../Connexion/AccesBDDUser.php');

					$resultatMarques = selectMarque();
	                foreach ($resultatMarques as $resultatMarque)
	                {
	                    echo '<option value="'.$resultatMarque['marque_Vehicule'].'">'.$resultatMarque['marque_Vehicule'].'</option>';
	                }
				?>			
			</select>
			<span id="loader" style="display: none;"><img src="../images/loader.gif" alt="loading" /></span>
		</p>
		<p id="softwares">
			<select id="softwaresSelect"></select>
		</p>
	</div>
</fieldset>
</body>
</html>
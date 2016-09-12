<html>
<head>
</head>
<body>
<h1>Test</h1>
<div id="zonetest"></div>
<script>
var zt = document.getElementById("zonetest");
var att_name = 'att_name';
var nb_comp = "333";
var nb_xp = "444";
var quoi = "quoi";
var lieu = "lieu";

var in_lines = [
	['Du :','<input type="date" name="" id="' + att_name + 'datedebut_' + (parent.id == "com" ? nb_comp : nb_xp) + '" />','Au :','<input type="date" name="" id="' + att_name + 'datefin_' + (parent.id == "com" ?	nb_comp : nb_xp) + '" />'],
	[quoi,'<input type="text" name="" id="' + att_name + 'prequoi_' + (parent.id == "com" ?	nb_comp : nb_xp) + '" />',lieu,'<input type="text" name="" id="' + att_name + 'nomou_' + (parent.id == "com" ?	nb_comp : nb_xp) + '" />'],
	['Ville :','<input type="text" name="" id="' + att_name + 'ville_' + (parent.id == "com" ?	nb_comp : nb_xp) + '" />','CP :','<input type="text" name="" id="' + att_name + 'codedep_' + (parent.id == "com" ?	nb_comp : nb_xp) + '" />']
];

var newSousT, newSousTR, newSousTD;
newSousT = document.createElement("table");
for (var i = 0; i < 3; i++) {
	newSousTR = document.createElement("tr");
	for (var j = 0; j < 4; j++) {
		newSousTD = document.createElement("td");
		newSousTD.innerHTML = in_lines[i][j];
		newSousTR.appendChild(newSousTD);
	}
	newSousT.appendChild(newSousTR);
}


zt.appendChild(newSousT);
</script>
</body>
</html>

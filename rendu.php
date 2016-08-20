<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Générateur CVs Lettres de motivation</title>
</head>

<body>

<h1>Générateur de Cvs et de Lettres de motivation</h1>

<div id="milieu">
<p><a href="index.php">Retour contenu CV</a> <a href="pdf.php">Générer le PDF</a></p>



<div id="menu_gauche">
<p>Modifications...</p>
<ul>
	
	<li>Modèle (mise en page)</li>
		
	<li>Couleur du texte<br>
		<select id="couleurs">
			<option selected="selected">Black</option>
			<option>Blue</option>
		</select>
	</li>

	<li>Police<br>
		<select id="police">
			<option>Arial</option>
			<option>Courrier</option>
			<option>Times New Roman</option>
			<option>Georgia</option>
			<option>Verdana</option>
			<option>Palatino</option>
			<option>Arial Black</option>
			<option>Times</option>
			<option>Helvetica</option>
			<option>Gadget</option>
			<option>Comic Sans MS</option>
			<option>Cursive</option>
			<option>Impact</option>
			<option>Lucida Sans Unicode</option>
			<option>Tahoma</option>
			<option>Trebuchet MS</option>		
		</select>
	</li>
	
	<li>Position du titre</li>
	
	<li>Style de titre</li>
	
	<li>Couleur du titre</li>
	
	<li>Police du titre</li>
	
	<li>Couleur des bandeaux<br>
		<select id="couleur_bandeaux">
			<option>None</option>
			<option>Yellow</option>
			<option>Green</option>
		</select>
	</li>
	
	<li>Couleur du texte des bandeaux</li>
	
	<li>Police des bandeaux<br>
		<select id="police_titres">
			<option>Arial</option>
			<option>Courrier</option>
			<option>Times New Roman</option>
			<option>Georgia</option>
			<option>Verdana</option>
			<option>Palatino</option>
			<option>Arial Black</option>
			<option>Times</option>
			<option>Helvetica</option>
			<option>Gadget</option>
			<option>Comic Sans MS</option>
			<option>Cursive</option>
			<option>Impact</option>
			<option>Lucida Sans Unicode</option>
			<option>Tahoma</option>
			<option>Trebuchet MS</option>		
		</select>
	</li>
	
	<li>Epaisseur des bandeaux</li>
		<select id="epaisseur_bandeaux">
			<option>0</option>
			<option>5</option>
			<option>10</option>
		</select>
		
	
	
	<li>Mise en page des colonnes</li>
	<li>Afficher les durées des expériences</li>
	<li>Supprimer une ligne, une expérience, une formation (ne pas la faire apparaître)</li>
	<li>...</li>
</ul>
</div>

<div id="rendu_cv">

<div id="coordonnees">
BILLETTE Benjamin<br />
17 rue Capron, Bat D, Appt 063<br />
75018 PARIS<br />
06 74 22 43 22<br />
benjamin.billette@hotmail.fr<br />
</div>

<div id="titre_objectif">
<span id="titre">CISP</span>
<span id="objectif">Trouver un poste dans le domaine de...</span>
</div>

<div id="competences" class="partie">
<span class="titre_partie">Compétences</span>
<ul>
	<li>Manger</li>
	<li>Boire</li>
	<li>Dormir</li>
</ul>
</div>

<div id="experiences" class="partie">
<span class="titre_partie">Expériences professionnelles</span>
	<table class="tableau">
		<tr>
			<td>2014-2016</td>
			<td>CISP</td>
			<td>ML Seinoise, Deuil (95)</td>
		</tr>
		<tr>
			<td>2013</td>
			<td>CISP</td>
			<td>ML Seinoise, Deuil (95)</td>
		</tr>
		<tr>
			<td>Aout-Octobre 2012</td>
			<td>Conseiller bilan stagiaire</td>
			<td>FOVEA, Paris (75)</td>
		</tr>
		<tr>
			<td>Avril-Juillet 2012</td>
			<td>Psychologue - Conseiller d'orientation stagiaire</td>
			<td>SNCF - COSP, Paris (75)</td>
		</tr>
		<tr>
			<td>2010-2012</td>
			<td>Chargé de recrutement stagiaire</td>
			<td>AURA, Poissy (78)</td>
		</tr>
	</table>
	
</div>

<div id="formation" class="partie">
<span class="titre_partie">Formation</span>
		<table class="tableau">
		<tr>
			<td>2006/2012</td>
			<td>Psychologie</td>
			<td>Paris X, Nanterre (92)</td>
		</tr>
		<tr>
			<td>2005/2006</td>
			<td>Première année de Médecine</td>
			<td>Université de Poitiers (86)</td>
		</tr>
		<tr>
			<td>2004/2005</td>
			<td>Bac S</td>
			<td>Lycée Condorcet, Limay (78)</td>
		</tr>
	</table>
</div>

<div id="informations" class="partie">
<span class="titre_partie">Informations complémentaires</span>
<p>Informatique : Développement web</p>
<p>Langues : Anglais (niveau universitaire), Allemand (notions)</p>
<p>Centres d'intérêt : Musique</p>
<p>Loisirs : Ecriture</p>
</div>


</div>
</div>



<script type="text/javascript">

//DRAG AND DROP



var parties = document.getElementsByTagName('div');
for (var i = 0; i < parties.length; i++) {
	if (parties[i].className == "partie") {
		console.log("trouvé !");
		console.log(this.offsetParent);
		console.log(this.offsetTop);
	}
}


var rendu_cv = document.getElementById("rendu_cv");
var bandeaux = document.getElementsByClassName("titre_partie");

		var couleurs = document.getElementById("couleurs");
	couleurs.addEventListener("change", function() {
		rendu_cv.style.color = couleurs.value;
	});
	
	var police = document.getElementById("police");
	police.addEventListener("change", function() {
		rendu_cv.style.fontFamily = police.value;
	});
	
	var couleur_b = document.getElementById("couleur_bandeaux");
	couleur_b.addEventListener("change", function() {
		for (var i = 0; i < bandeaux.length; i++) {
		bandeaux[i].style.backgroundColor = couleur_b.value;
		}
	});
	
	var police_titres = document.getElementById("police_titres");
	police_titres.addEventListener("change", function() {
		for (var i = 0; i < bandeaux.length; i++) {
		bandeaux[i].style.fontFamily = police_titres.value;
		}
	});
	
	var epaisseur_bandeaux = document.getElementById("epaisseur_bandeaux");
	epaisseur_bandeaux.addEventListener("change", function() {
		for (var i = 0; i < bandeaux.length; i++) {
		bandeaux[i].style.padding = epaisseur_bandeaux.value + "px 0px";
		}
	});

</script>

</body>
</html>
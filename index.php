<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Générateur CVs Lettres de motivation</title>
</head>

<body>

<h1>Générateur de Cvs et de Lettres de motivation</h1>

<div id="haut">
<h2>Haut</h2>
<p><a href="rendu.php">CVs</a> | Lettres de motivation</p>

<p><a href="">Identité</a> > <a href="">Titre</a> > <a href="">Compétences</a> > <a href="">Expériences</a> > <a href="">Formation</a> > <a href="">Informations complémentaires</a> > <a href="">Finalisation</a></p>

</div>

<div id="milieu">
<h2>Milieu</h2>


<div class="rubrique">
<p>Quelles parties souhaitez-vous intégrer à votre CV ?</p>

<ul>
	<li><input type="checkbox">titre</li>
	<li><input type="checkbox">objectif</li>
	<li><input type="checkbox">compétences</li>
	<li><input type="checkbox">qualités</li>
	<li><input type="checkbox">expériences professionnelles</li>
	<li><input type="checkbox">formation</li>
	<li><input type="checkbox">informations complémentaires</li>
</ul>

<p>Drag & Drop pour organisation du CV...</p>
<p>Modèle de CV</p>
<p>Publier mon CV en ligne... anonymement...</p>
<p>Être corrigé par un conseiller (payant)</p>

</div>

<form method="post" action="rendu.php" id="form">

<div class="rubrique" id="ide">
	<h3>Identité</h3>
		<p>Sexe : <input type="radio" name="sexe" id="homme"> <label for="homme">Homme</label> <input type="radio" name="sexe" id="femme"> <label for="femme">Femme</label></p>

	<p><label for="nom">NOM :</label> <input type="text" id="nom"> <label for="prenom" >Prénom :</label> <input type="text" id="prenom"></p>
	<p><label for="adresse">Adresse :</label> <input type="text" size="50%" id="adresse"></p>
	<p><label for="ville">Ville :</label> <input type="text" id="ville"> <label for="codepostal">Code Postal :</label> <input type="text" id="codepostal"></p>
	<p><label for="datenaissance">Date de naissance :</label> <input type="date" id="datenaissance"></p>
	<p><label for="permis">Permis de conduire :</label> <select id="permis"><option>Pas de permis</option><option>Permis B</option><option>Permis D</option></select></p>
	<p><label for="vehicule">Véhicule :</label> <select id="vehicule"><option>Non</option><option>Oui</option><option>Moto / Scooter</option></select></p>
</div>




<div class="rubrique_hidden" id="tit">
<h3>Titre</h3>
	<p>Titre du CV (poste recherché) : <input type="text"></p>
</div>

<div class="rubrique_hidden" id="obj">
<h3>Objectif</h3>
	<p>Objectif : <select><option>Emploi</option><option>Stage</option></select></p>
	<p>Mon objectif :<br><textarea cols="50" rows="5"></textarea></p>
</div>

<div class="rubrique_hidden" id="com">
<h3>Compétences</h3>
	<p><input type="button" id="bouton_competences" value="Ajouter une compétence"></p>
</div>

<div class="rubrique_hidden" id="qua">
<h3>Qualités</h3>
	<p>Choisissez 3 qualités vous correspondant :</p>
	<p style="-moz-column-count: 4;">
	<input type="checkbox"> Dynamique<br>
	<input type="checkbox"> Consciencieux<br>
	<input type="checkbox"> Motivé<br>
	<input type="checkbox"> Sociable<br>
	<input type="checkbox"> Ponctuel<br>
	<input type="checkbox"> Sens du contact<br>
	<input type="checkbox"> Bon relationnel<br>
	<input type="checkbox"> Sérieux<br>
	<input type="checkbox"> A l'écoute<br>
	<input type="checkbox"> Créatif<br>
	<input type="checkbox"> Sang-froid<br>
	<input type="checkbox"> Bienveillance<br>
	<input type="checkbox"> Patient<br>
	<input type="checkbox"> Appliqué<br>
	<input type="checkbox"> Soigné<br>
	<input type="checkbox"> Minutieux
	</p>
	
</div>

<div class="rubrique_hidden" id="exp">
<h3>Expériences professionnelles</h3>
	<p><input type="button" id="bouton_experiences" value="Ajouter une expérience professionnelle"></p>
</div>

<div class="rubrique_hidden" id="for">
<h3>Formation</h3>
	<p><input type="button" id="bouton_formations" value="Ajouter une formation"></p>
</div>

<div class="rubrique_hidden" id="inf">
<h3>Informations complémentaires</h3>
	<p>Bientôt...</p>
</div>

<input type="submit" value="Générer le CV" id="envoi"> <input type="reset" value="Recommencer">

<?php include('competences.php'); ?>



</form>

</div>

<script type="text/javascript">

//SELECTION DES RUBRIQUES ET AFFICHAGE OU MASQUAGE
function affiche(elem) {
	var tempo = document.getElementById(elem);
	console.log(tempo.className);
	if (tempo.className == "rubrique") {
			tempo.className = "rubrique_hidden";
	}
	else {
		tempo.className = "rubrique";
	}
	console.log(tempo.className);
	
};

// VERIFICATION FORMULAIRE
function Verif(form) {
		
		form.preventDefault();
		
		//console.log("fonction Verif !");
		
		
		function laVerif(elm) {
				
			//input_rub_ide[elm.li].value = "JUZIERS";
			console.log(elm.lareg);
			console.log(elm.laval);
			
	//		if (/(elm.lareg)/.test(elm.laval)) { console.log("miracle");}
	//		else { console.log("horreur");}
			
		}
		
		
//FONCTION DE VERIFICATION DU CHAMP SAISI
		function leTest(rege, champ) {
			//console.log(rege);
			//console.log(champ);
			
			var testreg = new RegExp(rege);
			//console.log(rege.test(champ));
			var reretest = testreg.test(champ);
			console.log(reretest);
			/*
			if (rege.test(champ) == false) { console.log("reg ok"); console.log(champ);}
			else { console.log("reg pas ok");}
			*/
		}
		
		
//CONSTRUCTEUR D'OBJET
		function Elmt(li, lid, laval, lareg) {
			this.li = li;
			this.lid = lid;
			this.laval = laval;
			this.lareg = lareg;
			this.letest = leTest(lareg, laval);
			this.laVerif = laVerif(this);			
			}
		
//TABLEAU POUR STOCKER LES CONSTRUCTEURS D'OBJET AVEC NOM VARIABLE // DONC APPEL : ListElmt[0].letest;
		var ListElmt = { };
		

		
//TABLEAU DES EXPRESSIONS REGULIERS DU FORMULAIRE
		var tabregs = {
			nom: '[A-Z]{2,}',
			prenom: '[A-Z][a-z]{2,}',
			adresse: '[1-9][0-9]*\s[a-z]*\s[A-za-z]*',
			ville: '[A-Z]{2,}',
			codepostal: '^\d{5}$',
			datenaissance: '^\d{2}\/\d{2}\/\d{4}$',
		};
		
		
//SELECTION DE TOUS LES INPUTS
		var rub_ide = document.getElementById("ide");
		var input_rub_ide = rub_ide.getElementsByTagName("input");
			//TESTS AVEC UN ELEMENT
			/*
			var pourtest = "[A-Z]{2}";
			var testi = new Elmt(5, input_rub_ide[5].id, input_rub_ide[5].value, pourtest);
			testi.laVerif;
			//letest("[A-Z]", "COCU");
			*/
				
		for (var i = 0; i < input_rub_ide.length; i++) {
			//console.log(input_rub_ide[i].value);
			var chi = input_rub_ide[i];
			var par = input_rub_ide[i].parentNode;
			
			for (var boite in tabregs) { 
				if (chi.id == boite) {
					console.log (chi.id + " == " + boite + " trouvé !");
					ListElmt[i] = new Elmt(i, chi.id, chi.value, tabregs[boite]); //Lance le truc auto !?!?
					}
				}
			
			
			//ListElmt[0].letest;
			
			
			/*
			if (chi.id == "nom")
				{
				if (/[A-Z]{2,}/.test(chi.value)
				) { chi.style.border = "1px green solid"; par.style.border = "0px red solid";}
				else { par.style.border = "3px red solid";}
				}
				
			if (chi.id == "prenom")
				{
				if (/[A-Z][a-z]{2,}/.test(chi.value)
				) { chi.style.border = "1px green solid"; par.style.border = "0px red solid";}
				else { par.style.border = "3px red solid";}
				}
			
			if (chi.id == "adresse")
				{
				
				if (/[1-9][0-9]*\s[a-z]*\s[A-za-z]/.test(chi.value) //rajouter une étoile ici avant la barre /
				
				) { chi.style.border = "1px green solid"; par.style.border = "0px red solid";}
				else { par.style.border = "3px red solid";}
				}
			*/
			
				
			}
		};
		
		
		


	var form = document.getElementById('form');
	
	form.addEventListener("submit", Verif, false);		
		
//-----------------------------------------------------------------------------------------------------------------------------------

//SELECTION DES INPUTS boutons et checkboxes
var boutons = document.getElementsByTagName("input");

var i;
for (i = 0; i < boutons.length; i++) {
    

	
	if (boutons[i].type == "checkbox") {
		boutons[i].checked = false;
		
		boutons[i].addEventListener("change", function() {
			affiche(this.nextSibling.nodeValue.substr(0,3)); // FONCTION POUR LA SELECTION DES RUBRIQUES ET L'AFFICHAGE OU NON
	});
	}
	
	if (boutons[i].type == "button") {
		//alert("Bouton trouvé !");
		boutons[i].addEventListener("click", function() {
			
			var newP = document.createElement("p");
			newP.innerText = "Date : ";
			
			var newInput = document.createElement("input");
			newInput.type = "text";
			newInput.size = "8";
			newP.appendChild(newInput);
			
			var newText = document.createTextNode(" Poste occupé : ");
			newP.appendChild(newText);
			
			var newInput = document.createElement("input");
			newInput.type = "text";
			newP.appendChild(newInput);
			
			var newText = document.createTextNode(" Entreprise : ");
			newP.appendChild(newText);
			
			var newInput = document.createElement("input");
			newInput.type = "text";
			newP.appendChild(newInput);
			
			var newText = document.createTextNode(" Ville : ");
			newP.appendChild(newText);
			
			var newInput = document.createElement("input");
			newInput.type = "text";
			newP.appendChild(newInput);
			
			var newText = document.createTextNode(" Département : ");
			newP.appendChild(newText);
			
			var newInput = document.createElement("input");
			newInput.type = "text";
			newInput.size = "2";
			newP.appendChild(newInput);
			
			var parent = this.parentNode.parentNode;
			parent.appendChild(newP);
			
			
			
		});

	}
	
}


/*
var newText = document.createTextNode("Hello World : ");
var newInput = document.createElement("input");
newInput.type = "text";
boutons[i].parentNode.appendChild(newText);
boutons[i].appendChild(newInput);
*/


</script>

</body>
</html>

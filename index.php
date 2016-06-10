<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Générateur CVs Lettres de motivation</title>
</head>

<body>

<header>
	<h1>Générateur de Cvs et de Lettres de motivation</h1>

		<nav id="haut">
			<p>
				<a href="rendu.php">CVs</a> | Lettres de motivation
			</p>
		
			<p>
				<a href="">Identité</a> > 
				<a href="">Titre</a> > 
				<a href="">Compétences</a> > 
				<a href="">Expériences</a> > 
				<a href="">Formation</a> > 
				<a href="">Informations complémentaires</a> > 
				<a href="">Finalisation</a>
			</p>
		</nav>
</header>

<aside class="rubrique">
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
		
			<ul>
				<li>Améliorations possibles :</li>
					<ul>
						<li>Drag & Drop pour organisation du CV...</li>
						<li>Modèle de CV</li>
						<li>Publier mon CV en ligne... anonymement...</li>
						<li>Être corrigé par un conseiller (payant)</li>
						<li>Boutons de suppression des expériences/formation/compétences en trop</li>
					</ul>
			</ul>
			
			<div id="compteur">
				0 compétences, 0 expériences et 0 formations
			</div>
			<p><a href='#' id="comptage">Compter</a></p>
	</aside>

<section id="milieu">

<form method="post" action="rendu.php" id="form">

	<div class="rubrique" id="ide">
		<h3>Identité</h3>
			<p>Sexe : <input type="radio" name="sexe" id="homme"> <label for="homme">Homme</label> <input type="radio" name="sexe" id="femme"> <label for="femme">Femme</label><span class="lerreur">Champ à renseigner...</span></p>

		<p><label for="nom">NOM :</label> <input type="text" id="nom"><span class="lerreur">Votre nom doit être écrit en majuscules et contenir au moins 2 lettres...</span></p>
		<p><label for="prenom" >Prénom :</label> <input type="text" id="prenom"><span class="lerreur">Votre prénom doit commencer par une majuscule et contenir au moins 2 lettres...</span></p>
		<p><label for="adresse">Adresse :</label> <input type="text" size="50%" id="adresse"><span class="lerreur">Votre adresse doit être du type : "13 rue des Lavandières"...</span></p>
		<p><label for="ville">Ville :</label> <input type="text" id="ville"><span class="lerreur">Votre ville doit être écrite en majuscules...</span></p>
		<p><label for="codepostal">Code Postal :</label> <input type="text" id="codepostal"><span class="lerreur">Votre code postal doit être composé de 5 chiffres...</span></p>
		<p><label for="datenaissance">Date de naissance :</label> <input type="date" id="datenaissance"><span class="lerreur">Votre date de naissance doit être indiquée au format 26/03/1987...</span></p>
		<p><label for="permis">Permis de conduire :</label> <select id="permis"><option>Pas de permis</option><option>Permis B</option><option>Permis D</option></select><span class="lerreur">Champ à renseigner...</span></p>
		<p><label for="vehicule">Véhicule :</label> <select id="vehicule"><option>Non</option><option>Oui</option><option>Moto / Scooter</option></select><span class="lerreur">Champ à renseigner...</span></p>
	</div>

	<div class="rubrique_hidden" id="tit">
		<h3>Titre</h3>
			<p>Titre du CV (poste recherché) : <input type="text"></p>
	</div>

	<div class="rubrique_hidden" id="obj">
		<h3>Objectif</h3>
			<p>Objectif : <select><option>Emploi</option><option>Stage</option></select></p>
			<p>Mon objectif :<br><textarea cols="50" rows="5">Candidature pour un poste en tant que... Demande de stage en tant que...</textarea></p>
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
			<p>
				Loisirs / Centres d'intérêt : <input type="text">
			</p>
			<p>
				Autre(s) :<br><textarea cols="50" rows="5"></textarea>
			</p>
	</div>

	<nav>
		<input type="submit" value="Générer le CV" id="envoi"> <input type="reset" value="Recommencer">
	</nav>
	


</form>

</section>

<script type="text/javascript">

//DECLARATION DES VARIABLES GLOBALES
var milieu = document.getElementById("milieu");


//FUNCTION DE SUPPRESSION DES PARAGRAPHES COMP, XP, FORMATIONS = OK
function suppression(to_suppr) {
	var found = false;
	while (found == false) {
		to_suppr = to_suppr.parentNode;
		if (to_suppr.nodeName == "P") {
			to_suppr.parentNode.removeChild(to_suppr);
			console.log("Suppression ok");
			found = true;
		}
	}
}


//FUNCTION DE COMPTAGE DES P des inputs affichés
function comptage_p(e) {
		var lesdivs_aff = comptage();
		var lesps_par_div = { };
		for (var i = 0, c = lesdivs_aff.length; i < c; i++) {
			var lesps = lesdivs_aff[i].getElementsByTagName('p');
			lesps_par_div[lesdivs_aff[i].id] = lesps.length; // POUR L'INSTANT ENREGISTRE JUSTE LE NOMBRE DE P
			}		
					
		for (var lire in lesps_par_div) {
			console.log(lire + " : " + lesps_par_div[lire] + "\n");
			}
		e.preventDefault();
	}

// FUNCTION DE COMPTAGE DES INPUTS AFFICHES
function comptage() {
		var results_comptage = [ ];
		var lesdivs = milieu.getElementsByTagName("div");
		
		for (var i = 0, j = 0, c = lesdivs.length; i < c; i++) {
				if (lesdivs[i].getAttribute("class") == "rubrique") {
					results_comptage[j] = lesdivs[i];
					j++;
					
					}
				}
				
		
		console.log(results_comptage);
		return results_comptage;
		}


document.getElementById('comptage').addEventListener("click", comptage_p, false);

//SELECTION DES RUBRIQUES ET AFFICHAGE OU MASQUAGE
function affiche(elem) {
	var tempo = document.getElementById(elem);
	if (tempo.className == "rubrique") {
		tempo.className = "rubrique_hidden";
		}
	else {
		tempo.className = "rubrique";
		}
}

//-----------------------------------------------


//TABLEAU DES EXPRESSIONS REGULIERS DU FORMULAIRE = FIXE
		var tabregs = {
			nom: '[A-Z]{2,}',
			prenom: '[A-Z][a-z]{2,}',
			adresse: '[1-9][0-9]*\\s[a-z]*\\s[A-za-z]*',
			ville: '[A-Z]{2,}',
			codepostal: '^\\d{5}$',
			datenaissance: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
			date: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		};

//FONCTION DE VERIFICATION DU CHAMP SAISI REGHEX... 
		function leTest(rege, champ) {
		//console.log(rege);
		//console.log(champ);
			var testreg = new RegExp(rege);
		//console.log(rege.test(champ));
			var resultat = testreg.test(champ);
			console.log(resultat);
			return resultat;
			/*
			if (rege.test(champ) == false) { console.log("reg ok"); console.log(champ);}
			else { console.log("reg pas ok");}
			*/
		}


//CONSTRUCTEUR D'OBJET ET VERIFICATION
		function Elmt(li, lid, laval, lareg) {
			this.li = li;
			this.lid = lid;
			this.laval = laval;
			this.lareg = lareg;
			this.letest = leTest(lareg, laval);
			//this.laVerif = laVerif(this); //enlevé car enlevé plus haut et pas utile;
			}

		
//TABLEAU POUR STOCKER LES CONSTRUCTEURS D'OBJET AVEC NOM VARIABLE // DONC APPEL : ListElmt[0].letest;
		var ListElmt = [ ];

//FUNCTION TROUVER LE SPAN D'ERREUR
		function span_erreur(linput) {
			var pfound = false;
			var spanfound = false;
			while (pfound == false) {
				linput = linput.parentNode;
				if (linput.nodeName == "P") {
					while (spanfound == false) {
						linput = linput.lastChild;
						if (linput.nodeName == "SPAN") {
						console.log("span erreur trouvé");
						spanfound = true;
						}
					pfound = true;
				}
			}
		}
		return linput;
	}
		
// VERIFICATION FORMULAIRE FONCTION GENERALE
function Verif(form) {
		
		form.preventDefault();
	
		//NE SERT PAS
		/*
		function laVerif(elm) {	
			console.log(elm.lareg);
			console.log(elm.laval);
		}
		*/
		
	
//SELECTION DE TOUS LES INPUTS DANS PARTIE IDENTITE
		var a_verifier = comptage(); //RENVOI LE TABLEAU DES ADRESSES DES DIV AFFICHEES
		
		//PARCOURS DE CE TABLEAU
		for (var i = 0, c = a_verifier.length; i < c; i++) { // ON BOUCLE LES DIVS
			var inputs_a_verifier = a_verifier[i].getElementsByTagName("input");
			for (var j = 0, d = inputs_a_verifier.length; j < d; j++) { //ON BOUCLE LES INPUTS
						
						var chi = inputs_a_verifier[j];
						
						for (var boite in tabregs) { 
							if (chi.id.substr(0,3) == boite.substr(0,3)) {
								console.log ("Une expression régulière trouvée pour : " + chi.id + " == " + boite);
								var temp = new Elmt(i, chi.id, chi.value, tabregs[boite]); //Lance le truc auto !?!?
								ListElmt.push(temp);
							
								if (temp.letest == true) {
									chi.classList.add("correct");
									chi.classList.remove("error");
									var lerreur = span_erreur(chi);
									lerreur.style.display = "none";
									}
								else {
									chi.classList.add("error");
									chi.classList.remove("correct");
									var lerreur = span_erreur(chi);
									lerreur.style.display = "inline-block";
									}
							
							}
						}
		
				}
			}
		
		};
		
//FIN FONCTION VERIF...		
		

//APPEL DE LA FONCTION VERIF
	var form = document.getElementById('form');
	
	form.addEventListener("submit", Verif, false);		

//REPRENDRE ICI !!
//-----------------------------------------------------------------------------------------------------------------------------------

//SELECTION DES INPUTS boutons et checkboxes
var boutons = document.getElementsByTagName("input");

//VARIABLES POUR ATTRIBUER LES IDS
var nb_xp = 0;
var nb_for = 0;
var nb_comp = 0;

//AFFICHAGE DES RUBRIQUES AVEC CASES A COCHER
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
			
			var parent = this.parentNode.parentNode;
						
			if(parent.id == "exp") {
				nb_xp += 1;
				var att_name = "xp" + nb_xp;
				var caption = "Expérience n°" + nb_xp;
				var quoi = "Poste occupé";
				var lieu = "Entreprise";
			}
			
			if(parent.id == "for") {
				nb_for += 1;
				var att_name = "for" + nb_for;
				var caption = "Formation n°" + nb_for;
				var quoi = "Intitulé";
				var lieu = "Organisme";
			}
			
			
			var newP = document.createElement("p");		
			
			
			if(parent.id == "com") {
				nb_comp += 1;		
				
				var newM = document.createElement("mark");
				
				newM.innerHTML = "-";
				var text1 = document.createTextNode('Compétence n°' + nb_comp + ' :');
				var newInput = document.createElement("input");
				newInput.id = newInput.name = 'comp_' + nb_comp;
				newInput.type = "text";
				
				newP.appendChild(newM);
				newP.appendChild(text1);
				newP.appendChild(newInput);
				
				//newP.innerHTML = '<mark onclick="suppression(this)">-</mark>Compétence n°' + nb_comp + ' : <input id="comp_' + nb_comp + '" name=="comp_' + nb_comp + '" type="text" />';
				
				newM.addEventListener("click", function() {
					suppression(this)
				}); // CHELOU MAIS ça FONCTIONNE
				
			}
			else {			
			
				newP.innerHTML = '<table><caption>' + caption + '</caption><tr><td rowspan="3"><mark onclick="suppression(this.parentNode)">-</mark></td><td class="' + att_name + '">Du :</td><td class="' + att_name + '"><input type="date" id="date_deb_' + att_name + '" name="date_deb_' + att_name +'" /></td><td class="' + att_name + '">Au :</td><td class="' + att_name + '"><input type="date" id="date_fin_' + att_name + '" name="date_fin_' + att_name +'" /></td></tr><tr><td class="' + att_name + '">' + quoi + ' :</td><td class="' + att_name + '"><input type="text" id="pre_quoi_' + att_name + '" name="pre_quoi_' + att_name +'" /></td><td class="' + att_name + '">' + lieu + ' :</td><td class="' + att_name + '"><input type="text" id="nom_ou_' + att_name + '" name="nom_ou_' + att_name +'" /></td></tr><tr><td class="' + att_name + '">Ville :</td><td class="' + att_name + '"><input type="text" id="ville_' + att_name + '" name="ville_' + att_name +'" /></td><td class="' + att_name + '">Département :</td><td class="' + att_name + '"><input type="text" id="code_dep_' + att_name + '" name="code_dep_' + att_name +'" /></td></tr><tr><td colspan="5"><span class="lerreur" margin="10px">Votre ville doit être écrite en majuscules...</span></td></table>';
			}	
			
		
			parent.appendChild(newP);
			
			
			
			
		});

	}
	
}



</script>

<footer>
	<h2>Propulsé par Dr. B.</h2>
</footer>

</body>
</html>

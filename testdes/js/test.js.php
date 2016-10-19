<script type="text/javascript">

// DECLARATION DES VARIABLES
var milieu = document.getElementById("milieu");
var envoi; // variable finale de verif
var ListElmt = [ ]; //TABLEAU POUR STOCKER LES CONSTRUCTEURS D'OBJET AVEC NOM VARIABLE // DONC APPEL : ListElmt[0].letest;



// TABLEAU DES EXPRESSIONS REGULIERS DU FORMULAIRE
// Mode de fonctionnement : utilise l'id de l'input pour y associer une regexp
var tabregs = {
	nom: '[A-Z]{2,}',
	prenom: '[A-Z][a-z]{2,}',
	datenaissance: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
	adresse: '[1-9][0-9]*\\s[a-z]*\\s[A-za-z]*',
	complement: '.*',
	codepostal: '^\\d{5}$',
	ville: '[A-Z]{2,}',
	tel: '0\\d \\d{2} \\d{2} \\d{2} \\d{2}',
	mail: '.+@.+\\..+',
			
	titre: '[A-Z].+',
	
	prquoi: '[A-Z].+',
			
	langues: '[A-Z].+',
	loisirs: '[A-Z].+',
	texte: '[A-Z].+',
		
	date: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
	competence: '[A-Z].+',
		
	libelle: '[A-Z].*',
	contenu: '[A-Z].*' 
	};


		
// FONCTIONS

// FONCTION DE SELECTION DES RUBRIQUES ET AFFICHAGE OU MASQUAGE
function affiche(elem)
{
	var tempo = document.getElementById(elem);
	if (tempo.className == "rubrique")
	{
		tempo.className = "rubrique_hidden";
	}
	else
	{
		tempo.className = "rubrique";
	}
}

// FONCTION DE SUPPRESSION DES PARAGRAPHES COMP, XP, FORMATIONS
function suppression(to_suppr, id_parent)
{
	// console.log(parentNode);
	// console.log(id_parent);
	var found = false;
	while (found == false)
	{
		to_suppr = to_suppr.parentNode;
		// console.log('to_suppr.nodeName : ' + to_suppr.className);
		if (to_suppr.nodeName == "P" || to_suppr.className == "one_item")
		{
			to_suppr.parentNode.removeChild(to_suppr);
			// console.log("Suppression ok");
			/*if (id_parent == 'exp') { nb_xp -= 1; cpteur_exp.innerHTML = nb_xp;}
			else if (id_parent == 'for') { nb_for -= 1; cpteur_for.innerHTML = nb_for;}
			else if (id_parent == 'inf') { nb_inf -= 1;}
			else { }*/
			found = true;
		}
	}
}

// FONCTION DE COMPTAGE DES DIVS AFFICHES ET NON-AFFICHES
function comptage_divs()
{
	var results_comptage = {
		aff: [ ],
		nonaff: [ ]
		};
	var lesdivs = milieu.getElementsByTagName("div");
	for (var i = 0, j = 0, c = lesdivs.length; i < c; i++)
	{
		if (lesdivs[i].getAttribute("class") == "rubrique")
		{
			results_comptage.aff.push(lesdivs[i]);
		}
		else if (lesdivs[i].getAttribute("class") == "rubrique_hidden")
		{
			results_comptage.nonaff.push(lesdivs[i]);
		}
	}
	return results_comptage; // renvoie un tableau référençant toutes les divs
}

// ATTENTION NE SERT APPAREMENT PAS...
//FONCTION DE COMPTAGE DES INPUTS DES CATEGORIES AFFICHEES (divs)
/*
function comptage_inputs(e)
{
	var lesdivs_aff = comptage_divs();
	var divs_aff = lesdivs_aff['aff'];
	var inputs_par_div = { };
	for (var i = 0, c = divs_aff.length; i < c; i++)
	{
		var lesdivs = divs_aff[i].getElementsByTagName('input');
		inputs_par_div[divs_aff[i].id] = lesdivs.length; // POUR L'INSTANT ENREGISTRE JUSTE LE NOMBRE D'INPUTS
	}		
	// ne sert à rien ???
	/*
	for (var lire in inputs_par_div)
	{
		console.log(lire + " : " + inputs_par_div[lire] + "\n");
	}
	*/
	/*
	e.preventDefault();
}
*/
//document.getElementById('comptage').addEventListener("click", comptage_inputs, false);
// fonction ci-dessus désactivée

//FONCTION DE VERIFICATION DU CHAMP SAISI REGHEX... 
function leTest(rege, champ)
{
	// console.log('rege : ' + rege);
	// console.log('champ : ' + champ);
	var testreg = new RegExp(rege);
	// console.log(rege.test(champ));
	var resultat = testreg.test(champ);
	// console.log('resultat : ' + resultat);
	return resultat;
	/*
	if (rege.test(champ) == false) { console.log("reg ok"); console.log(champ);}
	else { console.log("reg pas ok");}
	*/
}

// FONCTION CONSTRUCTEUR DE L'ELEMENT A VERIFIER ET VERIFICATION
function Elmt(li, lid, laval, lareg)
{
	this.li = li;
	this.lid = lid;
	this.laval = laval;
	this.lareg = lareg;
	this.letest = leTest(lareg, laval);
	//this.laVerif = laVerif(this); //enlev?ar enlev?lus haut et pas utile;
}

// FONCTION POUR TROUVER LE SPAN D'ERREUR
function span_erreur(linput)
{
	do
	{
	linput = linput.parentNode;	
	// console.log("l'input : " + linput + ", sa classe : " + linput.className);
	} while (linput.className != "td_stop");
	num_cell = linput.cellIndex;
	line_cell = linput.parentNode.rowIndex;
	//console.log('ligne : ' + line_cell + ', cellule : ' + num_cell);
	var td_final = linput.parentNode.cells[num_cell+1];
	// console.log(td_final.lastChild);
	return td_final.lastChild; // renvoie l'elem à afficher
}
		
// FONCTION DE VERIFICATION DU FORMULAIRE
function Verif(form)
{
	form.preventDefault();
	//NE SERT PAS
	/*function laVerif(elm)
	{	
		console.log(elm.lareg);
		console.log(elm.laval);
	}*/
	envoi = true; // on initialise envoi
	
	var a_verifier = comptage_divs(); // puis, sélection de tous les divs affichés
	var avirer = a_verifier.nonaff; // variable stockant les éléments non-affichés donc à enlever du form en supprimant le name
	// console.log(avirer);
	var a_verifier = a_verifier.aff;
	
	// ??? why = 'bool_table' ???
	var bool_table = 'bool_table'; // variable pour gesiton des spans d'erreurs de for et de exp
	// remplissage de ce tableau
	for (var i = 0, c = a_verifier.length; i < c; i++)  // on boucle les divs
	{
		var inputs_a_verifier = a_verifier[i].getElementsByTagName("input"); // on cible tous les inputs
		for (var j = 0, d = inputs_a_verifier.length; j < d; j++) // on boucle sur les inputs
		{					
			var chi = inputs_a_verifier[j];
			chi.name = chi.id; // ajout de l'attribut name pour ces inputs
			for (var boite in tabregs) // on cherche si une regexp existe et correspond
			{ 
				if (chi.id.substr(4,3) == boite.substr(0,3)) // se base sur les 3 premières lettres
				{
					// console.log ("Une expression régulière trouvée pour : " + chi.id + " == " + boite);
					var temp = new Elmt(i, chi.id, chi.value, tabregs[boite]); // Lance le truc auto !?!?
					ListElmt.push(temp); // on stocke l'élement et le résultat du test dans la variable prévue pour
					chi.classList.remove("normal_input");
					if ((chi.id.substr(0,3) == 'exp') || (chi.id.substr(0,3) == 'for')) // savoir si chi fait parti des spéciaux... exp ou for... car un seul span d'erreur pour plusieurs inputs
					{
						var res = temp.letest;
						// console.log('RESULTAAAAAAAAAAAAAAAT : ');
						// console.log(res);
						if (chi.id.substr(4,9) == 'datedebut') 	// si datedebut initialisation de bool_table à true sinon prend la valeur du résultat de la regexp
						{
							bool_table = res; // on met ce premier resultat dans la variable bool_table
						}
						else
						{
							bool_table = (bool_table && res);
							// console.log('BOOOOOOOOOOOOOOL : ');
							// console.log(bool_table);
						}
					
						if (res == true) // si regexp true alors on enleve la bordure rouge
						{
							// console.log('iciiiiiiiiiiiiiiiiiiiiiiiiiiiiiii');
							// console.log(bool_table);
							chi.classList.add("correct");
							chi.classList.remove("error");
							if (bool_table != false) // si par ailleurs les autres machines sont toutes bonnes on efface le span d'erreur
							{
								var lerreur = span_erreur(chi);
								lerreur.style.display = "none";
							}	
							else
							{
								// on laisse afficher le span d'erreur
							}
						}
						else // on affiche le span d'erreur
						{
							// console.log('laaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
							// console.log(bool_table);
							chi.classList.add("error");
							chi.classList.remove("correct");
							var lerreur = span_erreur(chi);
							// console.log(lerreur);
							// console.log(chi.id.substr(4,9));
							lerreur.style.display = "inline-block";
							envoi = false; //VARIABLE POUR SAVOIR SI ENVOI OU NON DU FORMULAIRE
						}
					}
					else // cas pour les champs or exp et for...
					{
						if (temp.letest == true)
						{
							chi.classList.add("correct");
							chi.classList.remove("error");
							var lerreur = span_erreur(chi);
							lerreur.style.display = "none";
						}
						else
						{
							chi.classList.add("error");
							chi.classList.remove("correct");
							var lerreur = span_erreur(chi);
							// console.log(lerreur);
							// console.log(chi.id.substr(4,9));
							lerreur.style.display = "inline-block";
							envoi = false; //VARIABLE POUR SAVOIR SI ENVOI OU NON DU FORMULAIRE
						}
					}
				}
			}
		}
	}
		
	if (envoi == true) // aucune erreur n'a été notée
	{
		// console.log("c'est tout bon");
		for (var i = 0, c = avirer.length; i < c; i++) // on boucle pour enlever tous les inputs à virer
		{
			var lesinputs = avirer[i].getElementsByTagName("input");
			for (var j = 0, d = lesinputs.length; j < d; j++)
			{
				lesinputs[j].name = ""; // on supprime le name pour pas qu'ils soient transmis
			}
		}
		leform.submit();
	}
	else
	{
		console.log("c'est pas bon");
	}
};

// MISE EN PLACE DE L'APPEL DE LA FONCTION VERIF
var leform = document.getElementById('form');
leform.addEventListener("submit", Verif, false);
// MISE EN PLACE DU BOUTON EN DEHORS DU FORMULAIRE (MENU EN HAUT)
var linkgenerer = document.getElementById('linkgenerer');
if (linkgenerer != null) { linkgenerer.addEventListener("click", Verif, false);}

//-----------------------------------------------------------------------------------------------------------------------------------
// PARTIE POUR LA GESTION DE L'AFFICHAGE DU FORMULAIRE

// SELECTION DES INPUTS boutons et checkboxes
var boutons = document.getElementsByTagName("input");

// VARIABLES POUR ATTRIBUER LES IDS
var nb_xp = <?php echo $nb_xp_session; ?>;
var nb_for = <?php echo $nb_for_session; ?>;
var nb_inf = <?php echo $nb_inf_session; ?>;
var nb_comp = 0;

for (var i = 0, i_max = boutons.length; i < i_max; i++) //MISE EN PLACE DES CASES A COCHER POUR L'AFFICHAGE DES RUBRIQUES
{
	if (boutons[i].type == "checkbox" && boutons[i].className == "foraff")
	{
		//boutons[i].checked = false;
		//console.log(boutons[i].nextSibling + ' <- est-ce un label ?');
		var lelabel = boutons[i].nextSibling;
		//console.log(lelabel.innerHTML);
		lelabel.addEventListener("click", function() {
			affiche(this.innerHTML.substr(0,3)); // FONCTION GERANT AFFICHAGE ET LE MASQUAGE DES PARTIES
			});
		/*boutons[i].addEventListener("change", function() {
			affiche(this.nextSibling.nodeValue.substr(0,3)); // FONCTION GERANT AFFICHAGE ET LE MASQUAGE DES PARTIES
			});	*/
	}
	//cpteur_exp = document.getElementById('nbre_de_xp');
	//cpteur_for = document.getElementById('nbre_de_for');
	//POUR AJOUT DE COMPETENCES, D'EXPERIENCES OU DE FORMATIONS
	if (boutons[i].type == "button")
	{
		boutons[i].addEventListener("click", function() {
		var parent = this.parentNode.parentNode;
		if(parent.id == "exp")
		{
			nb_xp += 1;
			//cpteur_exp.innerHTML = nb_xp;
			var att_name = "exp_";
			var caption = "" //Expérience n°" + nb_xp;
			var quoi = "Poste occupé : ";
			var lieu = "Entreprise : ";
		}
		if(parent.id == "for")
		{
			nb_for += 1;
			//cpteur_for.innerHTML = nb_for;
			var att_name = "for_";
			var caption = ""; //Formation n°" + nb_for;
			var quoi = "Intitulé : ";
			var lieu = "Organisme : ";
		}
			
		// préparation des élements à insérer dans le formulaire
		var newP = document.createElement("p");		
		var newM = document.createElement("mark");
			newM.innerHTML = "X";
			newM.addEventListener("click", function() {
				suppression(this, parent.id);
				}); // CHELOU MAIS ?FONCTIONNE
			
		//AJOUT DE COMPETENCE A REVOIR...
			
		var newT, newC, newTR, newTD;
		var newSousT, newSousTR, newSousTD;
		
		//AJOUT D'INFOS COMP :
		if(parent.id == "inf")
		{
			nb_inf += 1;
			var parties = [
				['<table class="table_type3"><tr><td class="col1"><mark onclick="suppression(this, \'inf\')">X</mark></td><td class="td_stop"><table><tr><td class="td01-t3">Libellé :<br /></td>'],
				['<td class="td02-t3"><input type="text" class="normal_input" placeholder="Loisirs, Langues..." id="inf_libelle_'+nb_inf+'" name="" /></td>'],
				['</tr><tr><td class="td01-t3">Contenu :</td><td class="td02-t3"><input type="text" class="normal_input"  id="inf_contenu_'+nb_inf+'" name="" /></td>'],
				['</tr></table></td><td class="col3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>'],
				[],
				['</tr></table>']
				];
			newP.innerHTML = parties[0] + parties[1] + parties[2] + parties[3] + parties[4] + parties[5];
		}
		else // si exp ou for
		{	
			var nm_long, nm_court, nb, nomou, nomlieu;
			if (parent.id == "for") {
				nm_long = "Formation";
				nm_court ="For";
				nb = nb_for;
				nomou = "Intitulé";
				nomlieu = "Organisme";
			}
			else {
				nm_long = "Expérience";
				nm_court ="exp";
				nb = nb_xp;
				nomou = "Poste occupé";
				nomlieu = "Entreprise";
			}
						
			var parties = [];
			parties[0] = '<table class="table_type3"><caption>'+nm_long+'</caption><tr><td class="col1"><mark onclick="suppression(this, \''+nm_court+'\')">X</mark></td><td class="td_stop">';
			parties[1] = '<table><tr><td class="sscol1">Du :</td><td class="sscol2"><input name="" id="'+nm_court+'_datedebut_'+nb+'" type="date" class="normal_input"></td><td class="sscol3">Au :</td>';
			parties[2] = '<td class="sscol4"><input name="" id="'+nm_court+'_datefin_'+nb+'" type="date" class="normal_input"></td></tr><tr><td class="sscol1">'+nomou+' :</td><td class="sscol2">';
			parties[3] = '<input name="" id="'+nm_court+'_prquoi_'+nb+'" type="text" class="normal_input"></td><td class="sscol3">'+nomlieu+' :</td><td class="sscol4"><input name="" id="';
			parties[4] = nm_court+'_nomou_'+nb+'" type="text" class="normal_input"></td></tr><tr><td class="sscol1">Ville :</td><td class="ssco2"><input name="" id="'+nm_court+'_ville_'+nb;
			parties[5] = '" type="text" class="normal_input"></td><td class="ssco3">Département :</td><td class="ssco4"><input name="" id="'+nm_court+'_codedep_'+nb+'" type="text" class="normal_input"></td></tr>';
			parties[6] = '</table></td><td class="col3"><span width="97%" class="lerreur lerreurstyle2">Erreur dans la saisie...<span class="info_bulle">Les dates doivent être indiquées au format 26/03/1987 et correspondrent, l\'intitulé doit être renseigné, l\'entreprise et la ville écrites en majuscules, enfin le département au format 75018.</span></td></tr></table>';
		
			newP.innerHTML = parties[0] + parties[1] + parties[2] + parties[3] + parties[4] + parties[5] + parties[6];							
		}	
		parent.appendChild(newP);
		});
	}
}

</script>
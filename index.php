<?php
session_start();

echo '<a href="destroy.php">Destroy</a>';
var_dump($_SESSION);
if (isset($_SESSION['data']['inf'])) var_dump($_SESSION['data']['inf']);



function addField($rub, $name, $error)
{
	$lname = strtolower($name); //low_name
	
	echo '<tr><td><label for="' . $name . '">' . ucfirst($name) . ' :</label></td>';
	echo '<td class="td_stop"><input type="text" class="normal_input" name="" id="' . $rub . '_' . str_replace(' ','',$lname) . '"';
			
	if (isset($_SESSION['data'][$rub][substr($lname,0,3)]) AND !empty($_SESSION['data'][$rub][substr($lname,0,3)])) 
	{
			echo ' value="' . $_SESSION['data'][$rub][substr($lname,0,3)] . '"';
			
	}
	
	echo '></td><td><span class="lerreur lerreurstyle1">' . $error . '</span></td></tr>';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>Générateur CVs Lettres de motivation</title>
</head>

<body>


<?php include('header.php'); ?>
<div id="main">

<div class="warning">Attention, le site est prévu pour être utilisé sur un écran large !</div>

<?php include('menu_nav.php'); ?>



<aside>
	
	<div>
		<p>Quelles parties souhaitez-vous intégrer dans votre CV ?</p>

			<ul class="li_menu">
				<?php
				
				?>
				<li><input type="checkbox" class="foraff" checked="checked" id="ch_titre"><label for="ch_titre">titre</label></li>
				<li><input type="checkbox" class="foraff" checked="checked" id="ch_obj"><label for="ch_obj">objectif</label></li>
				<li><input type="checkbox" class="foraff" disabled="disabled" id="ch_com"><label for="ch_com">compétences</label></li>
				<li><input type="checkbox" class="foraff" id="ch_qua"><label for="ch_qua">qualités</label></li>
				<li><input type="checkbox" class="foraff" checked="checked" id="ch_exp"><label for="ch_exp">expériences professionnelles</label></li>
				<li><input type="checkbox" class="foraff" checked="checked" id="ch_for"><label for="ch_for">formation</label></li>
				<li><input type="checkbox" class="foraff" checked="checked" id="ch_inf"><label for="ch_inf">informations complémentaires</label></li>
			</ul>
	

			<!--
			<div id="compteur">
				0 compétnces, 0 expériences et 0 formations
			</div>
			<p><a href='#' id="comptage">Compter</a></p>
			-->
	</div>
	
	<div>
		<p>Zone membre</p>
		Vous devez être connecté pour accéder à ces fonctionnalités...
	</div>
		
</aside>



<section id="milieu">


<form method="post" action="testsphp.php" id="form">
	
	<!-- RUBRIQUE IDENTITE -->
	<div class="rubrique" id="ide">
		<h3>Identité</h3>
			<!--<p>Sexe : <input type="radio" name="sexe" id="homme"> <label for="homme">Homme</label> <input type="radio" name="sexe" id="femme"> <label for="femme">Femme</label><span class="lerreur lerreurstyle1">Champ à renseigner...</span></p>-->
		<table class="table_type2">
		
		<?php
		addField('ide','nom','Votre nom doit être écrit en majuscules et contenir au moins 2 lettres...');
		addField('ide','prenom','Votre prénom doit commencer par une majuscule et contenir au moins 2 lettres...');
		addField('ide','date de naissance','Votre date de naissance doit être indiquée au format 26/03/1987...');
		addField('ide','adresse','Votre adresse doit être du type : "13 rue des Lavandières"...');
		addField('ide','code postal','Votre code postal doit être composé de 5 chiffres...');
		addField('ide','ville','Votre ville doit être écrite en majuscules...');
		addField('ide','telephone','Votre numéro de téléphone n\'est pas au bon format... Il doit être de la forme : 06 07 08 09 10. Pensez aux espaces !');
		addField('ide','mail','Votre mail n\'est pas au bon format...');
		?>
		
		<tr>
			<td><label for="permis">Permis de conduire :</label></td>
			<td><select name="ide_permis" id="ide_permis"><option selected="selected">Pas de permis</option><option>Permis B</option><option>Permis D</option></select></td>
			<td><span class="lerreur lerreurstyle1">Champ à renseigner...</span></td>
		</tr>
		
		<tr>
			<td><label for="vehicule">Véhicule :</label></td>
			<td><select name="ide_vehicule" id="ide_vehicule"><option selected="selected">Non</option><option>Oui</option><option>Moto / Scooter</option></select></td>
			<td><span class="lerreur lerreurstyle1">Champ à renseigner...</span></td>
		</tr>
		
		</table>
	</div>


	
	<!-- RUBRIQUE TITRE -->
	<div class="rubrique" id="tit">
		<h3>Titre<span class="help">?<span class="cache-help">Le titre du CV doit correspondre à l'intitulé du poste recherché ou à votre demande.</span></span></h3>
		<table class="table_type2">
		<?php
		addField('tit','titre du CV','Votre titre doit commencer par une majuscule et contenir au moins 2 lettres...');
		?>
		</table>
	</div>

	
	
	<!-- RUBRIQUE OBJECTIF -->
	<div class="rubrique" id="obj">
		<h3>Objectif<span class="help">?<span class="cache-help">L'objectif permet de clarifier votre CV en résumant succintement votre demande...</span></span></h3>
		
		<table class="table_type2">
		<tr>
		<td>Objectif :</td>
		<td>
				<select name="obj_objectif" id="obj_objectif">
					<option value="Emploi" selected="selected">Emploi</option>
					<option value="Stage">Stage</option>
					<option value="Perso" disabled="disabled">Personnalisé</option>
				</select>
				
				<!--
				<p><br /><textarea cols="" rows="5" id="objectif" name="" disabled="disabled">Veuillez écrire ici votre objectif...</textarea></p>
				-->
		</td>
		<td><span></span></td>
		</tr>
		</table>
	</div>

	<div class="rubrique_hidden" id="com">
		<h3>Compétences</h3>
			<p><input type="button" id="bouton_competences" value="Ajouter une compétence"></p>
	</div>

	<div class="rubrique_hidden" id="qua">
		<h3>Qualités</h3>
			<p>Choisissez 3 qualités vous correspondant :</p>
			<div id="zonedequals">
			<?php
			$lesquals = array("Dynamique", "Consciencieux", "Motivé", "Sociable", "Ponctuel", "Sens du contact", "Bon relationnel", "Sérieux", "A l'écoute", "Créatif", "Sang-froid", "Bienveillance", "Patient", "Appliqué", "Soigné", "Minutieux");
			$nbqual = 0;
			foreach ($lesquals as $onequal) {
				echo '<input type="checkbox" id="qua_' . $nbqual . '" name="qua_' . $nbqual . '" value="' . $onequal . '" /> ' . $onequal . '<br />';
				$nbqual++;
			}
			?>
			</div>
			
			
	</div>

	<div class="rubrique" id="exp">
		<h3>Expériences professionnelles<span class="help">?<span class="cache-help">Indiquez dans cette partie toutes vos expériences de travail (emplois, stage...).</span></span></h3>
			
			<p class="commandes">
				<!--<span class="compte_el"><span id="nbre_de_xp">0</span> expérience(s)</span>-->
				<input type="button" id="bouton_experiences" value="Ajouter une expérience" class="bouton_add">				
			</p>
			
			<?php
			$nb_xp_session = 0;
			if (isset($_SESSION['data']['exp']) AND !empty($_SESSION['data']['exp']))
			{				
				foreach($_SESSION['data']['exp'] as $one_xp)
				{
					//var_dump($one_xp);
					$nb_xp_session++;
					echo '<p><table class="rubrique_table">
						<caption>Expérience<!-- n°'.$nb_xp_session.'--></caption>
						<tr>
						<td><mark onclick="suppression(this, \'exp\')">X</mark></td>
						<td class="td_stop">';
					echo '<table>
						<tr>
						<td>Du :</td>
						<td><input name="" id="exp_datedebut_'.$nb_xp_session.'" type="date" class="normal_input" value="'.$one_xp['datedebut'].'"></td>
						<td>Au :</td>
						<td><input name="" id="exp_datefin_'.$nb_xp_session.'" type="date" class="normal_input" value="'.$one_xp['datefin'].'"></td>
						</tr>';
					echo '<tr>
						<td>Poste occupé :</td>
						<td><input name="" id="exp_prquoi_'.$nb_xp_session.'" type="text" class="normal_input" value="'.$one_xp['prquoi'].'"></td>
						<td>Entreprise :</td>
						<td><input name="" id="exp_nomou_'.$nb_xp_session.'" type="text" class="normal_input" value="'.$one_xp['nomou'].'"></td>
						</tr>';
					echo '<tr>
					<td>Ville :</td>
					<td><input name="" id="exp_ville_'.$nb_xp_session.'" type="text" class="normal_input" value="'.$one_xp['ville'].'"></td>
					<td>Département :</td>
					<td><input name="" id="exp_codedep_'.$nb_xp_session.'" type="text" class="normal_input" value="'.$one_xp['codedep'].'"></td>
					</tr>
					</table>';
					echo '</td>
					<td>
					<span width="97%" class="lerreur lerreurstyle2">Erreur dans la saisie...<span class="info_bulle">Les dates doivent être indiquées au format 26/03/1987 et correspondrent, l\'intitulé doit être renseigné, l\'entreprise et la ville écrites en majuscules, enfin le département au format 75018.</span>
					</td>
					</tr>
					</table></p>';
					
				}
			}
			?>
			
			
		
		
		
	</div>
	

	<div class="rubrique" id="for">
		<h3>Formation<span class="help">?<span class="cache-help">Indiquez ici toutes les formations que vous avez effectuées (cursus scolaire, formations continues...).</span></span></h3>
			<p class="commandes">
				<!--<span class="compte_el"><span id="nbre_de_for">0</span> expérience(s)</span>-->
				<input type="button" id="bouton_formations" value="Ajouter une formation" class="bouton_add">
				
			</p>
			
			<?php
			$nb_for_session = 0;
			if (isset($_SESSION['data']['for']) AND !empty($_SESSION['data']['for']))
			{				
				foreach($_SESSION['data']['for'] as $one_for)
				{
					//var_dump($one_xp);
					$nb_for_session++;
					echo '<p><table class="rubrique_table">
						<caption>Formation<!-- n°'.$nb_for_session.'--></caption>
						<tr>
						<td><mark onclick="suppression(this, \'for\')">X</mark></td>
						<td class="td_stop">';
					echo '<table>
						<tr>
						<td>Du :</td>
						<td><input name="" id="for_datedebut_'.$nb_for_session.'" type="date" class="normal_input" value="'.$one_for['datedebut'].'"></td>
						<td>Au :</td>
						<td><input name="" id="for_datefin_'.$nb_for_session.'" type="date" class="normal_input" value="'.$one_for['datefin'].'"></td>
						</tr>';
					echo '<tr>
						<td>Intitulé :</td>
						<td><input name="" id="for_prquoi_'.$nb_for_session.'" type="text" class="normal_input" value="'.$one_for['prquoi'].'"></td>
						<td>Organisme :</td>
						<td><input name="" id="for_nomou_'.$nb_for_session.'" type="text" class="normal_input" value="'.$one_for['nomou'].'"></td>
						</tr>';
					echo '<tr>
					<td>Ville :</td>
					<td><input name="" id="for_ville_'.$nb_for_session.'" type="text" class="normal_input" value="'.$one_for['ville'].'"></td>
					<td>Département :</td>
					<td><input name="" id="for_codedep_'.$nb_for_session.'" type="text" class="normal_input" value="'.$one_for['codedep'].'"></td>
					</tr>
					</table>';
					echo '</td>
					<td>
					<span width="97%" class="lerreur lerreurstyle2">Erreur dans la saisie...<span class="info_bulle">Les dates doivent être indiquées au format 26/03/1987 et correspondrent, l\'intitulé doit être renseigné, l\'entreprise et la ville écrites en majuscules, enfin le département au format 75018.</span>
					</td>
					</tr>
					</table></p>';
					
				}
			}
			?>
	</div>

	<div class="rubrique" id="inf">
		<h3>Informations complémentaires<span class="help">?<span class="cache-help">Vous pouvez mentionner ici des éléments qui vous semblent importants (exemple : Langues -> Anglais (niveau scolaire)).</span></span></h3>
		<p class="commandes"><input type="button" id="bouton_informations" value="Ajouter une information" class="bouton_add"></p>
		
		<?php
			$nb_inf_session = 0;
			
			if (isset($_SESSION['data']['inf']) AND !empty($_SESSION['data']['inf']))
			{				
				foreach($_SESSION['data']['inf'] as $one_inf)
				{
					//var_dump($one_xp);
					$nb_inf_session++;
					echo '<p><table class="table_type3"><tr>
							<td class="td01-t3"><mark onclick="suppression(this, \'inf\')">X</mark></td>
							<td>
							<table><tr><td class="td02-t3">Libellé :<br /></td>
								<td class="td_stop"><input type="text" name="" id="inf_libelle_' . $nb_inf_session . '" class="normal_input" placeholder="Loisirs, Langues..." value="' . $one_inf['libelle'] . '" /></td>
								<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>
								</tr><tr>
								<td class="td02-t3">Contenu :</td>
								<td class="td_stop"><input type="text" name="" id="inf_contenu_' . $nb_inf_session . '" class="normal_input" value="' . $one_inf['contenu'] . '" /></td>
								<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>
							</tr></table>
						</td></tr></table></p>';							
				}
			}
			?>
		
		
		<!--
		<p>
		<table class="table_type3">
			<tr>
				<td class="td01-t3"><mark onclick="suppression(this, 'inf');">X</mark></td>
				<td>
					<table><tr>
						<td class="td02-t3">Libellé :<br /></td>
						<td class="td_stop"><input type="text" class="normal_input" placeholder="Loisirs, Langues..." /></td>
						<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>
					</tr>
					<tr>
						<td class="td02-t3">Contenu :</td>
						<td class="td_stop"><input type="text" class="normal_input" /></td>
						<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>
					</tr>
					</table>
				</td>
			</tr>
		</table>
		</p>
		-->
		
			
	</div>
	
	
	
	<nav>
		<input type="submit" value="Générer le CV" id="envoi" class="btn-form-p1" /> <input type="reset" value="Recommencer"  class="btn-form-p1" />
	</nav>
	


</form>

</section>

<script type="text/javascript">

//DECLARATION DES VARIABLES GLOBALES
var milieu = document.getElementById("milieu");
var envoi; // variable finale de verif

//FUNCTION DE SUPPRESSION DES PARAGRAPHES COMP, XP, FORMATIONS = OK
function suppression(to_suppr, id_parent) {
	console.log(to_suppr.parentNode);
	console.log(id_parent);
	var found = false;
	while (found == false) {
		to_suppr = to_suppr.parentNode;
		if (to_suppr.nodeName == "P") {
			to_suppr.parentNode.removeChild(to_suppr);
			console.log("Suppression ok");
			/*if (id_parent == 'exp') { nb_xp -= 1; cpteur_exp.innerHTML = nb_xp;}
			else if (id_parent == 'for') { nb_for -= 1; cpteur_for.innerHTML = nb_for;}
			else if (id_parent == 'inf') { nb_inf -= 1;}
			else { }*/
			found = true;
		}
	}
}


//FUNCTION DE COMPTAGE DES INPUTS DES CATEGORIES AFFICHEES (divs)
function comptage_inputs(e) {
		var lesdivs_aff = comptage_divs();
		var divs_aff = lesdivs_aff['aff'];
		
		var inputs_par_div = { };
		for (var i = 0, c = divs_aff.length; i < c; i++) {
			var lesdivs = divs_aff[i].getElementsByTagName('input');
			inputs_par_div[divs_aff[i].id] = lesdivs.length; // POUR L'INSTANT ENREGISTRE JUSTE LE NOMBRE D'INPUTS
			
			}		
					
		for (var lire in inputs_par_div) {
			console.log(lire + " : " + inputs_par_div[lire] + "\n");
			}
		e.preventDefault();
	}

// FUNCTION DE COMPTAGE DES INPUTS AFFICHES ET NON-AFFICHES
function comptage_divs() {
		var results_comptage = {
			aff: [ ],
			nonaff: [ ]
			};
		var lesdivs = milieu.getElementsByTagName("div");
		
		for (var i = 0, j = 0, c = lesdivs.length; i < c; i++) {
				if (lesdivs[i].getAttribute("class") == "rubrique") {
					results_comptage.aff.push(lesdivs[i]);
					}
				else if (lesdivs[i].getAttribute("class") == "rubrique_hidden") {
					results_comptage.nonaff.push(lesdivs[i]);
					}
				}
				
		
		return results_comptage;
		}


//document.getElementById('comptage').addEventListener("click", comptage_inputs, false);
// fonction ci-dessus désactivée

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

//FONCTION DE VERIFICATION DU CHAMP SAISI REGHEX... 
		function leTest(rege, champ) {
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


//CONSTRUCTEUR D'OBJET ET VERIFICATION
		function Elmt(li, lid, laval, lareg) {
			this.li = li;
			this.lid = lid;
			this.laval = laval;
			this.lareg = lareg;
			this.letest = leTest(lareg, laval);
			//this.laVerif = laVerif(this); //enlev?ar enlev?lus haut et pas utile;
			}
		
//TABLEAU POUR STOCKER LES CONSTRUCTEURS D'OBJET AVEC NOM VARIABLE // DONC APPEL : ListElmt[0].letest;
		var ListElmt = [ ];

//FUNCTION TROUVER LE SPAN D'ERREUR
		function span_erreur(linput) {
				
				do {
				linput = linput.parentNode;	
				// console.log("l'input : " + linput + ", sa classe : " + linput.className);
				} while (linput.className != "td_stop");
				
					num_cell = linput.cellIndex;
					line_cell = linput.parentNode.rowIndex;
					
					//console.log('ligne : ' + line_cell + ', cellule : ' + num_cell);
					
					var td_final = linput.parentNode.cells[num_cell+1];
					// console.log(td_final.lastChild);
					
					return td_final.lastChild;
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
		envoi = true; //ON INITIALISE ENVOI
	
//SELECTION DE TOUS LES INPUTS DANS PARTIE IDENTITE
		var a_verifier = comptage_divs(); //RENVOI LE TABLEAU DES ADRESSES DES DIV AFFICHEES
		var avirer = a_verifier.nonaff;
		console.log(avirer);
				
		var a_verifier = a_verifier.aff;
		
		var bool_table = 'bool_table'; // variable pour gesiton des spans d'erreurs de for et de exp
		//PARCOURS DE CE TABLEAU
		for (var i = 0, c = a_verifier.length; i < c; i++) { // ON BOUCLE LES DIVS
			var inputs_a_verifier = a_verifier[i].getElementsByTagName("input");
			for (var j = 0, d = inputs_a_verifier.length; j < d; j++) { //ON BOUCLE LES INPUTS
						
						var chi = inputs_a_verifier[j];
						chi.name = chi.id;
						
						
						for (var boite in tabregs) { 
							if (chi.id.substr(4,3) == boite.substr(0,3)) {
								console.log ("Une expression régulière trouvée pour : " + chi.id + " == " + boite);
								var temp = new Elmt(i, chi.id, chi.value, tabregs[boite]); //Lance le truc auto !?!?
								ListElmt.push(temp);
								chi.classList.remove("normal_input");
								
								// savoir si chi fait parti des spéciaux... exp ou for...
								if ((chi.id.substr(0,3) == 'exp') || (chi.id.substr(0,3) == 'for'))
								{
									var res = temp.letest;
									// console.log('RESULTAAAAAAAAAAAAAAAT : ');
									// console.log(res);
									// si datedebut initialisation de bool_table à true sinon prend la valeur du résultat de la regexp
									if (chi.id.substr(4,9) == 'datedebut') { bool_table = res;}
									else
									{
										bool_table = (bool_table && res);
										// console.log('BOOOOOOOOOOOOOOL : ');
										// console.log(bool_table);
									}
									
									// si regexp true alors on enleve la bordure rouge
									if (res == true)
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
									else
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
								// cas pour les champs or exp et for...
								else
								{
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
		
			if (envoi == true) {
				console.log("c'est tout bon");
				
					for (var i = 0, c = avirer.length; i < c; i++) {
						var lesinputs = avirer[i].getElementsByTagName("input");
						for (var j = 0, d = lesinputs.length; j < d; j++) {
						
						lesinputs[j].name = "";
						
						}
					}
				
				leform.submit();
				}
			else { console.log("c'est pas bon");}
		
		};
		
//FIN FONCTION VERIF...		
		

//APPEL DE LA FONCTION VERIF
	var leform = document.getElementById('form');
	
	leform.addEventListener("submit", Verif, false);

	var linkgenerer = document.getElementById('linkgenerer');
	linkgenerer.addEventListener("click", Verif, false);
	

	
//REPRENDRE ICI !!
//-----------------------------------------------------------------------------------------------------------------------------------

//SELECTION DES INPUTS boutons et checkboxes
var boutons = document.getElementsByTagName("input");

//VARIABLES POUR ATTRIBUER LES IDS
var nb_xp = <?php echo $nb_xp_session; ?>;
var nb_for = <?php echo $nb_for_session; ?>;
var nb_inf = <?php echo $nb_inf_session; ?>;
var nb_comp = 0;


for (var i = 0, i_max = boutons.length; i < i_max; i++) {
	
	//MISE EN PLACE DES CASES A COCHER POUR L'AFFICHAGE DES RUBRIQUES
	if (boutons[i].type == "checkbox" && boutons[i].className == "foraff") {
		
		//boutons[i].checked = false;
		//console.log(boutons[i].nextSibling + ' <- est-ce un label ?');
		var lelabel = boutons[i].nextSibling;
		//console.log(lelabel.innerHTML);
		lelabel.addEventListener("click", function() {
			affiche(this.innerHTML.substr(0,3)); // FONCTION GERANT AFFICHAGE ET LE MASQUAGE DES PARTIES
			
			});
		/*
		boutons[i].addEventListener("change", function() {
			affiche(this.nextSibling.nodeValue.substr(0,3)); // FONCTION GERANT AFFICHAGE ET LE MASQUAGE DES PARTIES
			
			});
			*/
	}
	
	//cpteur_exp = document.getElementById('nbre_de_xp');
	//cpteur_for = document.getElementById('nbre_de_for');
	//POUR AJOUT DE COMPETENCES, D'EXPERIENCES OU DE FORMATIONS
	if (boutons[i].type == "button") {
		boutons[i].addEventListener("click", function() {
			
			var parent = this.parentNode.parentNode;
					
			if(parent.id == "exp") {
				nb_xp += 1;
				//cpteur_exp.innerHTML = nb_xp;
				var att_name = "exp_";
				var caption = "" //Expérience n°" + nb_xp;
				var quoi = "Poste occupé : ";
				var lieu = "Entreprise : ";
			}
			
			if(parent.id == "for") {
				nb_for += 1;
				//cpteur_for.innerHTML = nb_for;
				var att_name = "for_";
				var caption = ""; //Formation n°" + nb_for;
				var quoi = "Intitulé : ";
				var lieu = "Organisme : ";
			}
			
			
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
			if(parent.id == "inf") {
				
				nb_inf += 1;
				var parties = [
					['<table class="table_type3"><tr><td class="td01-t3"><mark onclick="suppression(this, \'inf\')">X</mark></td><td><table><tr><td class="td02-t3">Libellé :<br /></td>'],
					['<td class="td_stop"><input type="text" class="normal_input" placeholder="Loisirs, Langues..." id="inf_libelle_'+nb_inf+'" name="" /></td>'],
					['<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>'],
					['</tr><tr><td class="td02-t3">Contenu :</td><td class="td_stop"><input type="text" class="normal_input"  id="inf_contenu_'+nb_inf+'" name="" /></td>'],
					['<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>'],
					['</tr></table></td></tr></table>']
				];
				
				newP.innerHTML = parties[0] + parties[1] + parties[2] + parties[3] + parties[4] + parties[5];
				
			}
			else {			
				
				/*var newT, newC, newTR, newTD;*/
				
				newT = document.createElement("table");
				newT.setAttribute("class", "rubrique_table");
				newC = document.createElement("caption");
				newC.innerHTML = caption;
				newT.appendChild(newC);
								
				newTR = document.createElement("tr");
				
				newTD = document.createElement("td");
				
				newTD.appendChild(newM);
				newTR.appendChild(newTD);
								
				newTD = document.createElement("td");
				newTD.setAttribute("class", "td_stop");
				
				var in_lines = [
					['Du :','<input type="date" class="normal_input" name="" id="' + att_name + 'datedebut_' + (parent.id == "for" ? nb_for : nb_xp) + '" />','Au :','<input type="date" class="normal_input" name="" id="' + att_name + 'datefin_' + (parent.id == "for" ?	nb_for : nb_xp) + '" />'],
					[quoi,'<input type="text" class="normal_input" name="" id="' + att_name + 'prquoi_' + (parent.id == "for" ?	nb_for : nb_xp) + '" />',lieu,'<input type="text" class="normal_input" name="" id="' + att_name + 'nomou_' + (parent.id == "for" ?	nb_for : nb_xp) + '" />'],
					['Ville :','<input type="text" class="normal_input" name="" id="' + att_name + 'ville_' + (parent.id == "for" ?	nb_for : nb_xp) + '" />','CP :','<input type="text" class="normal_input" name="" id="' + att_name + 'codedep_' + (parent.id == "for" ?	nb_for : nb_xp) + '" />']
				];

				/*var newSousT, newSousTR, newSousTD;*/
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
				
				newTD.appendChild(newSousT);
				
				newTR.appendChild(newTD);
				
				// REPRISE...
				
				newTD = document.createElement("td");
				var newSpan = document.createElement("span");
				newSpan.className = "lerreur lerreurstyle2";
				newSpan.setAttribute("width", "97%"); // NE MARCHE PAS
				newSpan.innerHTML = "Erreur dans la saisie...<span class='info_bulle'>Les dates doivent être indiquées au format 26/03/1987 et correspondrent, l'intitulé doit être renseigné, l'entreprise et la ville écrites en majuscules, enfin le département au format 75018.</span>"
				newTD.appendChild(newSpan);
				newTR.appendChild(newTD);
				
				newT.appendChild(newTR);
				
				//INSERTION FINALE DANS LE PARAGRAPHE
				newP.appendChild(newT);
							
			}	
					
			parent.appendChild(newP);
					
		});

	}
	
}



</script>



</div>

<footer>
	<div class="colonnes">
	<h2>Curriculum Vite Fait</h2>
	Un CV en 2 secondes
	<h2>Propulsé par</h2>
	Dr. B
	<h2>Contact</h2>
	curriculum@vite-fait.fr
	
	
	</div>
</footer>

</body>
</html>

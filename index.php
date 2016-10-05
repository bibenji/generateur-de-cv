<?php
session_start();

require('consttes.php');

/* AIDE EN DEVELOPPEMENT */
if (DEVMODE)
{
	echo '<a href="destroy.php">Destroy</a><br />';
	var_dump($_SESSION);	
}

/* VARIABLES */
$nb_xp_session = 0;
$nb_for_session = 0;
$nb_inf_session = 0;

/* FONCTIONS */
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

function addFieldTwo($one, $nb, $for = true)
{	
	$to_echo = '<table class="rubrique_table">
			<caption>'.($type=($for)?'Formation':'Experience').'<!-- n°'.$nb.'--></caption>
			<tr>
			<td><mark onclick="suppression(this, \''.($type=($for)?'for':'exp').'\')">X</mark></td><td class="td_stop">
				<table>
				<tr>
					<td>Du :</td>
					<td><input name="" id="'.($type=($for)?'for':'exp').'_datedebut_'.$nb.'" type="date" class="normal_input" value="'.$one['datedebut'].'"></td>
					<td>Au :</td>
					<td><input name="" id="'.($type=($for)?'for':'exp').'_datefin_'.$nb.'" type="date" class="normal_input" value="'.$one['datefin'].'"></td>
				</tr>
				<tr>
					<td>'.($nomou=($for)?'Intitulé':'Poste occupé').' :</td><td><input name="" id="'.($type=($for)?'for':'exp').'_prquoi_'.$nb.'" type="text" class="normal_input" value="'.$one['prquoi'].'"></td>
					<td>'.($nomou=($for)?'Organisme':'Entreprise').' :</td><td><input name="" id="'.($type=($for)?'for':'exp').'_nomou_'.$nb.'" type="text" class="normal_input" value="'.$one['nomou'].'"></td>
				</tr>
				<tr>
					<td>Ville :</td><td><input name="" id="'.($type=($for)?'for':'exp').'_ville_'.$nb.'" type="text" class="normal_input" value="'.$one['ville'].'"></td>
					<td>Département :</td>
					<td><input name="" id="'.($type=($for)?'for':'exp').'_codedep_'.$nb.'" type="text" class="normal_input" value="'.$one['codedep'].'"></td>
				</tr>
				</table>
			</td>
			<td>
				<span width="97%" class="lerreur lerreurstyle2">Erreur dans la saisie...<span class="info_bulle">Les dates doivent être indiquées au format 26/03/1987 et correspondrent, l\'intitulé doit être renseigné, l\'entreprise et la ville écrites en majuscules, enfin le département au format 75018.</span>
			</td>
			</tr>
			</table>';
	
	echo '<div class="one_item">'.$to_echo.'</div>';
}

function addFieldThree($nb, $one)
{
	echo '<div class="one_item"><table class="table_type3"><tr>
		<td class="td01-t3"><mark onclick="suppression(this, \'inf\')">X</mark></td>
		<td>
			<table><tr><td class="td02-t3">Libellé :<br /></td>
				<td class="td_stop"><input type="text" name="" id="inf_libelle_' . $nb . '" class="normal_input" placeholder="Loisirs, Langues..." value="' . $one['libelle'] . '" /></td>
				<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>
			</tr><tr>
				<td class="td02-t3">Contenu :</td>
				<td class="td_stop"><input type="text" name="" id="inf_contenu_' . $nb . '" class="normal_input" value="' . $one['contenu'] . '" /></td>
				<td class="td03-t3"><span class="lerreur lerreurstyle1">Les données saisies ne peuvent être traitées...</span></td>
			</tr></table>
		</td></tr></table></div>';
}
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/styles.css">
		<title>Générateur CVs Lettres de motivation</title>
	</head>

	<body>
		<?php include('includes/header.php'); ?>
		<div id="main">
			<!-- affiché pour les mobiles -->
			<div class="warning">Attention, le site est prévu pour être utilisé sur un écran large !</div>
		<?php include('includes/menu_nav.php'); ?>
			
			<aside>
				<div>
					<p>Quelles parties souhaitez-vous intégrer dans votre CV ?</p>
					<ul class="li_menu">
						<li><input type="checkbox" class="foraff" checked="checked" id="ch_titre"><label for="ch_titre">titre</label></li>
						<li><input type="checkbox" class="foraff" checked="checked" id="ch_obj"><label for="ch_obj">objectif</label></li>
						<li><input type="checkbox" class="foraff" disabled="disabled" id="ch_com"><label for="ch_com">compétences</label></li>
						<li><input type="checkbox" class="foraff" disabled="disabled" id="ch_qua"><label for="ch_qua">qualités</label></li>
						<li><input type="checkbox" class="foraff" checked="checked" id="ch_exp"><label for="ch_exp">expériences professionnelles</label></li>
						<li><input type="checkbox" class="foraff" checked="checked" id="ch_for"><label for="ch_for">formation</label></li>
						<li><input type="checkbox" class="foraff" checked="checked" id="ch_inf"><label for="ch_inf">informations complémentaires</label></li>
					</ul>
					
				<?php if (DEVMODE) { ?>
				<div id="compteur">0 compétnces, 0 expériences et 0 formations</div>
				<p><a href='#' id="comptage">Compter</a></p>
				<?php } ?>
				</div>
	
				<div>
					<p>Zone membre</p>
					Vous devez être connecté pour accéder à ces fonctionnalités...
				</div>
			</aside>

		<section id="milieu">
		
		<form method="post" action="disposition.php" id="form">
		
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


		
		<!-- RUBRIQUE TITRE "ACTIVE" -->
		<div class="rubrique" id="tit">
			<h3>Titre<span class="help">?<span class="cache-help">Le titre du CV doit correspondre à l'intitulé du poste recherché ou à votre demande.</span></span></h3>
			<table class="table_type2">
				<?php
				addField('tit','titre du CV','Votre titre doit commencer par une majuscule et contenir au moins 2 lettres...');
				?>
			</table>
		</div>

		
		
		<!-- RUBRIQUE OBJECTIF "ACTIVE" -->
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
		
		
		
		<!-- RUBRIQUE COMPETENCES "INACTIVE" -->
		<div class="rubrique_hidden" id="com">
			<h3>Compétences</h3>
			<p><input type="button" id="bouton_competences" value="Ajouter une compétence"></p>
		</div>
		<!-- RUBRIQUE QUALITES "INACTIVE" -->
		<div class="rubrique_hidden" id="qua">
			<h3>Qualités</h3>
			<p>Choisissez 3 qualités vous correspondant :</p>
			<div id="zonedequals">
				<?php
					$lesquals = array("Dynamique", "Consciencieux", "Motivé", "Sociable", "Ponctuel", "Sens du contact", "Bon relationnel", "Sérieux", "A l'écoute", "Créatif", "Sang-froid", "Bienveillance", "Patient", "Appliqué", "Soigné", "Minutieux");
					$nbqual = 0;
					foreach ($lesquals as $onequal)
					{
						echo '<input type="checkbox" id="qua_' . $nbqual . '" name="qua_' . $nbqual . '" value="' . $onequal . '" /> ' . $onequal . '<br />';
						$nbqual++;
					}
				?>
			</div>
		</div>
		
		
		
		<!-- RUBRIQUE EXPERIENCE PROFESSIONNELLE "ACTIVE" -->
		<div class="rubrique" id="exp">
			<h3>Expériences professionnelles<span class="help">?<span class="cache-help">Indiquez dans cette partie toutes vos expériences de travail (emplois, stage...).</span></span></h3>
			<p class="commandes">
				<!--<span class="compte_el"><span id="nbre_de_xp">0</span> expérience(s)</span>-->
				<input type="button" id="bouton_experiences" value="Ajouter une expérience" class="bouton_add">				
			</p>
			<?php
				if (isset($_SESSION['data']['exp']) AND !empty($_SESSION['data']['exp']))
				{				
					foreach($_SESSION['data']['exp'] as $one_xp)
					{
						//var_dump($one_xp);
						$nb_xp_session++;
						addFieldTwo($one_xp, $nb_xp_session, null);					
					}
				}
			?>
		</div>
		
		
		
		<!-- RUBRIQUE FORMATION "ACTIVE" -->
		<div class="rubrique" id="for">
			<h3>Formation<span class="help">?<span class="cache-help">Indiquez ici toutes les formations que vous avez effectuées (cursus scolaire, formations continues...).</span></span></h3>
			<p class="commandes">
				<!--<span class="compte_el"><span id="nbre_de_for">0</span> expérience(s)</span>-->
				<input type="button" id="bouton_formations" value="Ajouter une formation" class="bouton_add">
			</p>
			<?php
				if (isset($_SESSION['data']['for']) AND !empty($_SESSION['data']['for']))
				{				
					foreach($_SESSION['data']['for'] as $one_for)
					{
						//var_dump($one_xp);
						$nb_for_session++;
						addFieldTwo($one_for, $nb_for_session, true);
					}
				}
			?>
		</div>
		
		
		
		<!-- RUBRIQUE INFOS COMPLEMENTAIRES "ACTIVE" -->
		<div class="rubrique" id="inf">
			<h3>Informations complémentaires<span class="help">?<span class="cache-help">Vous pouvez mentionner ici des éléments qui vous semblent importants (exemple : Langues -> Anglais (niveau scolaire)).</span></span></h3>
			<p class="commandes"><input type="button" id="bouton_informations" value="Ajouter une information" class="bouton_add"></p>
			<?php
				if (isset($_SESSION['data']['inf']) AND !empty($_SESSION['data']['inf']))
				{				
					foreach($_SESSION['data']['inf'] as $one_inf)
					{
						//var_dump($one_xp);
						$nb_inf_session++;
						addFieldThree($nb_inf_session, $one_inf);					
					}
				}
			?>
		</div>
		
		
		
		<nav class="go-dispo">
			<input type="submit" value="Générer le CV" id="envoi" class="btn-form-p1" /> <input type="reset" value="Recommencer"  class="btn-form-p1" />
		</nav>
		
		</form>

		</section>

		<?php require ('js/test.js.php'); ?>

		</div>

		<?php include('includes/bas.php'); ?>

	</body>
	
</html>
<?php
session_start();
var_dump($_POST);

$_SESSION['data'] = array();

//METTRE UNE VARIABLE ALL...
$ide = array();
$tit;
$obj;
$all_qual = array();
$all_exp = array();
$all_for = array();
$inf = array();

foreach ($_POST as $key => $val) {
	
	switch (substr($key, 0, 3)) {
		case 'ide' : {
			$ide[substr($key, 4, 3)] = $val;
		}
		break;
		
		case 'tit' : {
			$tit = $val;
			$_SESSION['data']['tit']['tit'] = $tit;
		}
		break;
		
		case 'obj' : {
			if ($val == "Emploi") {
				if (isset($_POST['tit_titreducv']) AND ($_POST['tit_titreducv'] != '')) {
					$obj = 'Actuellement à la recherche d\'un emploi, je vous fais part de ma candidature pour un poste au sein de votre structure.';	
				}
				else {
					$obj = "Demande d'emploi";
					$_SESSION['data']['tit']['tit'] = $obj;
				}
			}
			if ($val == "Stage") {
					if (isset($_POST['tit_titreducv']) AND ($_POST['tit_titreducv'] != '')) {
					$obj = 'Dans le cadre d\'une démarche de ré-orientation professionnelle, je souhaiterais effectuer un stage au sein de votre structure.';
				}
				else {
					$obj = "Demande de stage";
					$_SESSION['data']['tit']['tit'] = $obj;
				}
			} 
			$_SESSION['data']['obj']['obj'] = $obj;
			
		}
		break;
		
		case 'qua' : {
			$all_qual[] = $val;
		}
		
		case 'exp' : {
			$n = substr(substr($key, 0, -2), 4);
			$all_exp[substr($key, strlen($key)-1, strlen($key))][$n] = $val;
		}
		break;
		
		case 'for' : {
			$n = substr(substr($key, 0, -2), 4);
			$all_for[substr($key, strlen($key)-1, strlen($key))][$n] = $val;
		}
		break;
		
		case 'inf' : {
			$n = substr(substr($key, 0, -2), 4);
			$inf[substr($key, 4, 3	)] = $val;
		}
		break;
	}
}

$_SESSION['data']['ide'] = $ide;
$_SESSION['data']['qual'] = $all_qual;
$_SESSION['data']['exp'] = $all_exp;
$_SESSION['data']['for'] = $all_for;
$_SESSION['data']['inf'] = $inf;


//TRAITEMENTS EN BDD	
/*
define('TEST_ON', 0);
if (TEST_ON) {
	
	$q = $bdd->prepare('INSERT INTO users (user_id, prenom, nom, adresse, ville, code_postal) VALUE (1, :prenom, :nom, :adresse, :ville, :code_postal)');
	$q->execute(array(
		':prenom' => $_POST['ide_prenom'],
		':nom' => $_POST['ide_nom'],
		':adresse' => $_POST['ide_adresse'],
		':ville' => $_POST['ide_ville'],
		':code_postal' => $_POST['ide_codepo'],
		
	));
	
}
*/



?>


<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="style_rendu.css" />
<title>Rendu CV - Tests</title>
<head>
<body>



<?php
/*
try
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; //pour récup les erreurs
		$bdd = new PDO('mysql:host=localhost;dbname=cvs', 'root', '1987arqfwv', $pdo_options);
		//$bdd = new PDO('mysql:host=rdbms.strato.de;dbname=DB1603210', 'U1603210', '1987aaeqdwcxsz', $pdo_options);
	}
catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

function insertXP(array $donnees, $bdd)
	{
		$q = $bdd->prepare('INSERT INTO experiences (user_id, experience_id, date_debut, date_fin, poste, entreprise, ville, code_postal)
		VALUE (1, 1, :date_debut, :date_fin, :poste, :entreprise, :ville, :code_postal)');
		$q->execute(array(
		':date_debut' => $donnees['datedebut'],
		':date_fin' => $donnees['datefin'],
		':poste' => $donnees['prequoi'],
		':entreprise' => $donnees['nomou'],
		':ville' => $donnees['ville'],
		':code_postal' => $donnees['codedep']
		));
	}
*/

//$q = $bdd->query('SELECT * FROM users');

/*
while ($donnees = $q->fetch()) {
	print_r($donnees);
}
*/

?>

<div id="main">

<?php include('header.php'); ?>

<?php include('menu_nav.php'); ?>
	
<div class="flex">
	
<aside class="conteneur1">
	
	<?php include('menu_modifs.php'); ?>

	<hr />


	<p><a href="pdf.php">Tenter le PDF</a></p>
	<p><a href="lm.php">Tenter aussi la LM</a></p>
	
	
	<?php
	//PETIT TEST AVEC LES EXP
if (1 == 2) {
foreach ($all_exp as $m => $xp)
{
	echo '<p>';
	foreach ($xp as $nom => $item)
	{
		echo 'La valeur pour ' . $nom . ' est : ' . $item . '<br />';
	}
	echo '</p>';
	$newdate = date_parse($all_exp[1]['datedebut']);
	echo $newdate['year'] . '/' . $newdate['month'] . '/' . $newdate['day'];
	//insertXP($xp, $bdd);
}
}
	?>
	
</aside>

<section class="conteneur2">

	<div id="lecv" class="cv_type1">

		<div id="zonecv">

			<div id="ide">
				<span class="lenom"><?php echo $ide['nom'] . ' ' . $ide['pre']; ?></span><br />
				<?php echo $ide['adr']; ?><br />
				<?php echo $ide['cod'] . ' ' . $ide['vil']; ?><br />
				<?php echo $ide['tel']; ?><br />
				<?php echo $ide['mai']; ?><br />
				Né(e) le : <?php echo $ide['dat']; ?>
			</div>

			<div id="tit_sstit">		
				<div id="tit">
					<?php
					if (!empty($tit)) echo $tit;
					else echo $obj;
					?>
				</div>
				<div id="soustit">
					<?php 
						if (!empty($tit)) echo $obj;
					?>
				</div>
			</div>
			
			<div id="space_top"></div>
			<div id="exp">
			<h3 class="bandeau"><img src="ressources\png\experiences.png" />Expérience professionnelle</h3>
				<?php
				foreach ($all_exp as $xp)
				{
					echo '<table><tr>';
					echo '<td class="first_td">Du ' . $xp['datedebut'] . ' au ' . $xp['datefin'] . '</td>';
					echo '<td><span class="intitu">' . $xp['prequoi'] . '</span>';
					echo $xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')</td>';
					echo '</tr></table>';
				}
				?>
			</div>

			<div id="for">
			<h3 class="bandeau"><img src="ressources\png\formations.png" />Formation</h3>
				<?php
				foreach ($all_for as $for)
				{
					echo '<table><tr>';
					echo '<td class="first_td">Du ' . $for['datedebut'] . ' au ' . $for['datefin'] . '</td>';
					echo '<td><span class="intitu">' . $for['prequoi'] . '</span>';
					echo $for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')</td>';
					echo '</tr></table>';
				}
				?>
			</div>

			<div id="inf">
			<h3 class="bandeau">Informations complémentaires</h3>
				<?php
				foreach ($inf as $inf_key => $one_inf)
				{
					if ($inf_key == "loi") $new_inf_key = "Loisirs";
					if ($inf_key == "lan") $new_inf_key = "Langues";
					echo '<p>' . $new_inf_key . ' : ' . $one_inf . '</p>';
				}
				?>
			</div>

		</div>

	</div>
	
</section>

</div>

<footer>
	<h2>Propulsé par Dr. B.</h2>
</footer>
</div>

<?php
var_dump($_SESSION);
?>

<script type="text/javascript">
var aside = document.getElementsByTagName('aside');
var all_select = aside[0].getElementsByTagName('select');
var i_max = all_select.length;

for (var i = 0; i < i_max; i++) {
		if(all_select[i].id != 'modeleCV') {
		
			all_select[i].addEventListener("change", function() {
				var fin_attribut = this.id.search("_");
				var attribut_cible = this.id.substr(0, fin_attribut);
				var id_cible = this.id.substr(fin_attribut + 1, this.id.length);
				//var cible = document.getElementById(id_cible);
				var cible = document.querySelectorAll(id_cible);
				//console.log(cible.length);
				
				//console.log('hidden_' + this.id)
				var hidden_champ = document.getElementById('hidden_' + this.id);
				hidden_champ.value = this.value;
				console.log(hidden_champ.value);
				
				var j_max = cible.length
				for (var j = 0; j < j_max; j++) {
					console.log(cible[j]);
					cible[j].style[attribut_cible] = this.value;
				}
				
			});
		}
		else {
			all_select[i].addEventListener("change", function () {
					//console.log(document.getElementById('lecv') + ' et ' + this.value);
					document.getElementById('lecv').className = this.value;
					document.getElementById('hidden_modeleCV').value = this.value;
			});
		}
}
</script>

</body>
</html>
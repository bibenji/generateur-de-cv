<?php
session_start();
$_SESSION['data'] = array();
?>

<html>
<head>
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

<div class="flex">

<div class="conteneur1">

<p><a href="pdf.php">Tenter le PDF</a></p>

<pre>
<?php
print_r($_POST);
?>
</pre>

<?php

//METTRE UNE VARIABLE ALL...
$ide = array();
$tit;
$obj;
$all_exp = array();
$all_for = array();
$all_inf = array();

foreach ($_POST as $key => $val) {
	
	switch (substr($key, 0, 3)) {
		case 'ide' : {
			$ide[substr($key, 4, 3)] = $val;
		}
		break;
		
		case 'tit' : {
			$tit = $val;
			$_SESSION['data']['tit'] = $tit;
		}
		break;
		
		case 'obj' : {
			if ($val = "Stage") $obj = 'Dans le cadre d\'une démarche de ré-orientation professionnelle, je souhaiterais effectuer un stage au sein de votre structure afin de découvrir concrètement le métier de ' . $_POST['tit_prenom'] . '.';
			if ($val = "Emploi") $obj = 'A la recherche d\'un emploi de ' . $_POST['tit_prenom'] . ', je vous fais pars de ma candidature pour un poste au sein de votre structure.';
			
			$_SESSION['data']['obj'] = $obj;
		}
		break;
		
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
			$all_inf[] = $val;
		}
		break;
	}
}

$_SESSION['data']['ide'] = $ide;
$_SESSION['data']['exp'] = $all_exp;
$_SESSION['data']['for'] = $all_for;
$_SESSION['data']['inf'] = $all_inf;

//PETIT TEST AVEC LES EXP
foreach ($all_exp as $m => $xp) {
	echo '<p>';
	foreach ($xp as $nom => $item) {
		echo 'La valeur pour ' . $nom . ' est : ' . $item . '<br />';
	}
	echo '</p>';
	$newdate = date_parse($all_exp[1]['datedebut']);
	echo $newdate['year'] . '/' . $newdate['month'] . '/' . $newdate['day'];
	//insertXP($xp, $bdd);
}








	
	
	
	
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



//GENERATION DU BEAU CV :
?>

</div>

<div class="conteneur2">

<div id="lecv">
<div id="zonecv">

<div id="ide">
	<?php echo $ide['nom'] . ' ' . $ide['pre']; ?><br />
	<?php echo $ide['adr']; ?><br />
	<?php echo $ide['cod'] . ' ' . $ide['vil']; ?><br />
	<?php echo $ide['tel']; ?><br />
	<?php echo $ide['mai']; ?><br />
	Né(e) le : <?php echo $ide['dat']; ?>
</div>

<div id="tit">
	<?php if (!empty($tit)) echo $tit; ?>
</div>

<div id="soustit">
	<?php 
		echo $obj;
	?>
</div>

<div id="exp">
<h3>Expérience professionnelle</h3>
	<?php
	foreach ($all_exp as $xp)
	{
		echo '<table><tr>';
		echo '<td class="first_td">Du ' . $xp['datedebut'] . ' au ' . $xp['datefin'] . '</td>';
		echo '<td>' . $xp['prequoi'] . '<br />';
		echo $xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')</td>';
		echo '</tr></table>';
	}
	?>
</div>

<div id="for">
<h3>Formation</h3>
	<?php
	foreach ($all_for as $for)
	{
		echo '<table><tr>';
		echo '<td class="first_td">Du ' . $for['datedebut'] . ' au ' . $for['datefin'] . '</td>';
		echo '<td>' . $for['prequoi'] . '<br />';
		echo $for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')</td>';
		echo '</tr></table>';
	}
	?>
</div>

<div id="inf">
<h3>Informations complémentaires</h3>
</div>

</div>

</div>
</div>

</div>

</body>
</html>
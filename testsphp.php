<html>
<head>
<link rel="stylesheet" type="text/css" href="style_rendu.css" />
<title>Rendu CV - Tests</title>
<head>
<body>

<?php

try	{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; //pour récup les erreurs
	$bdd = new PDO('mysql:host=localhost;dbname=cvs', 'root', '1987arqfwv', $pdo_options);
	//$bdd = new PDO('mysql:host=rdbms.strato.de;dbname=DB1603210', 'U1603210', '1987aaeqdwcxsz', $pdo_options);
	}
catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
	}

function insertXP(array $donnees, $bdd) {
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
?>

<pre>
<?php
print_r($_POST);
?>
</pre>

<?php

//METTRE UNE VARIABLE ALL...

$id = array();
$allxp = array();
$allfor = array();


foreach ($_POST as $key => $val) {
	
	switch (substr($key, 0, 3)) {
		case 'ide' : {
		$id[substr($key, 4, 3)] = $val;
		}
		break;
	
		case 'exp' : {
		$n = substr(substr($key, 0, -2), 4);
		$allxp[substr($key, strlen($key)-1, strlen($key))][$n] = $val;
		}
		break;
		
		case 'for' : {
		$n = substr(substr($key, 0, -2), 4);
		$allfor[substr($key, strlen($key)-1, strlen($key))][$n] = $val;
		}
		break;
		
}
}

/*
foreach ($id as $key => $one_id) {
	echo '<p>' . $key . ' donne : ' . $one_id;
	}
*/

foreach ($allxp as $m => $xp) {
	echo '<p>';
	foreach ($xp as $nom => $item) {
		echo 'La valeur pour ' . $nom . ' est : ' . $item . '<br />';
	}
	echo '</p>';
	$newdate = date_parse($allxp[1]['datedebut']);
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

$q = $bdd->query('SELECT * FROM users');

/*
while ($donnees = $q->fetch()) {
	print_r($donnees);
}
*/

//GENERATION DU BEAU CV :
?>
<div id="lecv">

<div id="ide">
	<?php echo $id['nom'] . ' ' . $id['pre']; ?><br />
	<?php echo $id['adr']; ?><br />
	<?php echo $id['cod'] . ' ' . $id['vil']; ?><br />
	Né(e) le : <?php echo $id['dat']; ?>
</div>

<div id="tit">
	<?php echo $_POST['tit_prenom']; ?>
</div>

<div id="exp">
<h3>Expérience professionnelle</h3>
	<?php
	foreach ($allxp as $xp) {
	echo '<table><tr>';
	
	echo '<td>Du ' . $xp['datedebut'] . ' au ' . $xp['datefin'] . '</td>';
	echo '<td>' . $xp['prequoi'] . '</td>';
	echo '<td>' . $xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')</td>';
	
	echo '</tr></table>';
	}
	?>
</div>

<div id="for">
<h3>Formation</h3>
	<?php
	foreach ($allfor as $for) {
	echo '<table><tr>';
	
	echo '<td>Du ' . $for['datedebut'] . ' au ' . $for['datefin'] . '</td>';
	echo '<td>' . $for['prequoi'] . '</td>';
	echo '<td>' . $for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')</td>';
	
	echo '</tr></table>';
	}
	?>
</div>

<div id="inf">
<h3>Informations complémentaires</h3>
</div>

</div>

</body>
</html>
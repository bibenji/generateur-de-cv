<?php
session_start();

require('consttes.php');

/* AIDE EN DEVELOPPEMENT */
if (DEVMODE)
{
	echo '<pre>';
	var_dump($_POST);
	echo '</pre>';
}

/* RECUPERATION DES DONNEES POSTEES */
// tout stocker dans la variable $_SESSION['DATA']
$_SESSION = array(); // pour éviter les problèmes
$spe = array('exp','for','inf');
foreach ($_POST as $key => $val)
{
	$key1 = substr($key, 0, 3);
	$key2 = substr($key, 4, 3);
	if (!in_array($key1, $spe))	$_SESSION['data'][$key1][$key2] = $val;
	else $_SESSION['data'][$key1][substr($key, strlen($key)-1, strlen($key))][substr(substr($key, 0, -2), 4)] = $val;
}

// détermination de l'objet du CV
// voir les cas où pas de titre au CV...
if (isset($_SESSION['data']['obj']['obj']))
{
	if ($_SESSION['data']['obj']['obj'] == 'Emploi')
	{
		$_SESSION['data']['obj']['obj'] = 'Actuellement à la recherche d\'un emploi, je vous fais part de ma candidature pour un poste au sein de votre structure.';
	}
	else
	{
		$_SESSION['data']['obj']['obj'] = 'Dans le cadre d\'une démarche de ré-orientation professionnelle, je souhaiterais effectuer un stage au sein de votre structure.';
	}
}

if (isset($_SESSION['data']['ide'])) $ide = $_SESSION['data']['ide'];
if (isset($_SESSION['data']['tit']['tit'])) $tit = $_SESSION['data']['tit']['tit'];
else $_SESSION['data']['tit']['tit'] = '';
if (isset($_SESSION['data']['obj']['obj'])) $obj = $_SESSION['data']['obj']['obj'];
else $_SESSION['data']['obj']['obj'] = '';
if (isset($_SESSION['data']['exp'])) $all_exp = $_SESSION['data']['exp'];
else $_SESSION['data']['exp'] = array();
if (isset($_SESSION['data']['for'])) $all_for = $_SESSION['data']['for'];
else $_SESSION['data']['for'] = array();
if (isset($_SESSION['data']['inf'])) $all_inf = $_SESSION['data']['inf'];
else $_SESSION['data']['inf'] = array();





?>

<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<link rel="stylesheet" type="text/css" href="style_rendu.css" />
		<title>Rendu CV - Tests</title>
	<head>
	
	<body>

	<?php include('includes/header.php'); ?>

	<div id="main">

		<?php include('includes/menu_nav.php'); ?>
	
		<div class="flex">
			<aside class="conteneur1">
				<?php include('includes/menu_modifs.php'); ?>
			</aside>

			<section class="conteneur2">
				<div id="lecv" class="cv_type1">
					<div id="zonecv" class="alltxt">

						<div id="ide">
							<span class="lenom"><?php echo $ide['nom'] . ' ' . $ide['pre']; ?></span><br />
							<span class="adr1"><?php echo $ide['adr']; ?></span><br />
							<span class="adr2"><?php echo $ide['cod'] . ' ' . $ide['vil']; ?></span><br />
							<span class="coordos1"><?php echo $ide['tel']; ?></span><br />
							<span class="coordos2"><?php echo $ide['mai']; ?></span><br />
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
							if (isset($all_exp))
							foreach ($all_exp as $xp)
							{
								echo '<table class="alltxt"><tr>';
								echo '<td class="first_td">Du ' . $xp['datedebut'] . ' au ' . $xp['datefin'] . '</td>';
								echo '<td class="second_td"><span class="intitu">' . $xp['prquoi'] . '</span>';
								echo $xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')</td>';
								echo '</tr></table>';
							}							
							?>
						</div>

						<div id="for">
						<h3 class="bandeau"><img src="ressources\png\formation.png" />Formation</h3>
							<?php
							if (isset($all_for))
							foreach ($all_for as $for)
							{
								echo '<table class="alltxt"><tr>';
								echo '<td class="first_td">Du ' . $for['datedebut'] . ' au ' . $for['datefin'] . '</td>';
								echo '<td class="second_td"><span class="intitu">' . $for['prquoi'] . '</span>';
								echo $for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')</td>';
								echo '</tr></table>';
							}
							?>
						</div>

						<div id="inf">
						<h3 class="bandeau"><img src="ressources\png\infos.jpg" />Informations complémentaires</h3>
							<?php
							if (isset($all_inf))
							foreach ($all_inf as $one_inf)
							{
								echo '<p>' . $one_inf['libelle'] . ' : ' . $one_inf['contenu'] . '</p>';
							}
							?>
						</div>

					</div>

				</div>
			</section>
		</div>
	</div>

	<?php include('includes/bas.php'); ?>

	<script type="text/javascript" src="js/disposition.js"></script>
	
	<?php
	if(DEVMODE)
	{
		echo '<pre>';
		print_r($_SESSION);
		echo '</pre>';
	}		
	?>
	
	</body>

</html>
<?php
session_start();

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
		// $_SESSION['data']['obj']['obj'] = 'Actuellement à la recherche d\'un emploi, je vous fais part de ma candidature pour un poste au sein de votre structure.';
		$_SESSION['data']['obj']['obj'] = 'Demande d\'emploi';
	}
	else
	{
		// $_SESSION['data']['obj']['obj'] = 'Dans le cadre d\'une démarche de ré-orientation professionnelle, je souhaiterais effectuer un stage au sein de votre structure.';$_SESSION['data']['obj']['obj'] = 'Dans le cadre d\'une démarche de ré-orientation professionnelle, je souhaiterais effectuer un stage au sein de votre structure.';
		$_SESSION['data']['obj']['obj'] = 'Demande de stage';
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

// --------------------------------------------------------------------------------

if (1 == 2)
{	
	echo basename($_SERVER['PHP_SELF']);
	
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
}

// --------------------------------------------------------------------------------

else // génération du pdf
{
	include('lib-gencv/config-gencv.php'); // fichier de configuration, index et valeurs de base
	
	foreach($_POST as $key => $val) // analyse des variables de mise en page transmises par le formulaire
	{
		if ( (substr($key,0,1) == '_') && (!empty($val)) )
		{	
			if (substr($key,1,1) == 't') // on cherche les tailles
			{
				$key = str_replace('_taille', '', $key); // on coupe 'taille'
				$tailles[strtolower($key)] = $tailles_px[$val]; // ex : $taile['coordos'] = $val de _tailleCoordos
			}
			elseif (substr($key,1,1) == 'c') // on cherche les couleurs
			{
				$key = str_replace('_color', '', $key); // on coupe 'color'
				$colors[strtolower($key)] = explode(',', $codes_couleur[$val]);				
			}
			elseif (substr($key,1,1) == 'e') // on cherche les espaces
			{
				$key = str_replace('_espaces', '', $key); // on 'coupe' espaces
				$espaces[strtolower($key)] = $espaces_pdf[$val];				
			}
			elseif (substr($key,1,1) == 'p') // on cherche les polices
			{				
				$key = str_replace('_police', '', $key); // on 'coupe' police
				$lespolices[strtolower($key)] = $val;				
			}
		}
	}

// --------------------------------------------------------------------------------	
	
	/* variables pour faciliter l'utilisation */
	$taille_coordos = $tailles['texte']*1.1;
	$taille_titre = $tailles['texte']*2;
	$taille_ss_titre = $tailles['texte'];
	$taille_bandeaux = $tailles['texte']*1.1;
	$taille_texte = $tailles['texte'];
	
	$espaces_g = $espaces['cv'];	
	
	$police_titre = $lespolices['titre'];		
	$police_texte = "Arial";	
	$police_bandeau = "Arial";

// --------------------------------------------------------------------------------	

	if ($_SESSION['data']['ide']['nom'] == '') $_SESSION['data']['ide']['nom'] = 'DOE';
	if ($_SESSION['data']['ide']['pre'] == '') $_SESSION['data']['ide']['pre'] = 'John';
	if ($_SESSION['data']['ide']['adr'] == '') $_SESSION['data']['ide']['adr'] = '1, rue de Nulle Part';
	if ($_SESSION['data']['ide']['cod'] == '') $_SESSION['data']['ide']['cod'] = '12345';
	if ($_SESSION['data']['ide']['tel'] == '') $_SESSION['data']['ide']['tel'] = '01 23 45 67 89';
	if ($_SESSION['data']['ide']['mai'] == '') $_SESSION['data']['ide']['mai'] = 'john@doe.com';
	if ($_SESSION['data']['ide']['vil'] == '') $_SESSION['data']['ide']['vil'] = 'NOWHERE';
	if ($_SESSION['data']['tit']['tit'] == '') $_SESSION['data']['tit']['tit'] = utf8_decode('Expert en Vie privée');
	
	foreach ($_SESSION['data'] as $one_rub) {
		foreach ($one_rub as $one_elem) {
			if (is_string($one_elem)) {
				$one_elem = utf8_decode($one_elem);				
			}			
			else {
				foreach ($one_elem as $one) {
					$one = utf8_decode($one);					
				}
			}
		}
	}

// --------------------------------------------------------------------------------	

	// début de génération du pdf
	
	define('FPDF_FONTPATH','/font');
	require('lib-gencv/fpdf.php');
	
	if ($_POST['_modeleCV'] == 'cv_type1')
	{
		require('lib-gencv/classpdf/pdf1.php');
	}
	else if ($_POST['_modeleCV'] == 'cv_type2')
	{
		require('lib-gencv/classpdf/pdf2.php');
	}
	else if ($_POST['_modeleCV'] == 'cv_type3')
	{
		require('lib-gencv/classpdf/pdf3.php');
	}
	else
	{
		require('lib-gencv/classpdf/pdf0.php');
	}

	$pdf = new PDF();
	$pdf->SetTitle($_SESSION['data']['ide']['nom'].' '.$_SESSION['data']['ide']['pre'].' CV - '.$_SESSION['data']['tit']['tit']);
	

	/* AJOUT DE FONTS */ // fonction à créer pour simplifier...
	$pdf->AddFont('comic','','comic.php');
	$pdf->AddFont('comic','B','comicbd.php');
	$pdf->AddFont('comic','I','comici.php');
	$pdf->AddFont('impact','','impact.php');
	$pdf->AddFont('impact','B','impact.php');
	$pdf->AddFont('impact','I','impact.php');

	$pdf->AddPage();
	$pdf->setAutoPageBreak(false);
	
	if ($_POST['_bordureCV'] == 'black solid 1px') $pdf->Rect(5,5,200,287);

	$pdf->SetTextColor($colors['texte'][0],$colors['texte'][1],$colors['texte'][2]);

	$pdf->AjouterCoordos($taille_coordos, $_SESSION['data']['ide'], $police_texte, $espaces_g);

	$pdf->AjouterTitre($espaces_g, $taille_titre, utf8_decode($_SESSION['data']['tit']['tit']),
		$taille_ss_titre, $_SESSION['data']['obj']['obj'], $police_titre,
		$colors['titre'], $colors['soustitre']);

	$pdf->AjouterRu("EXPERIENCE PROFESSIONNELLE", $espaces_g, $taille_bandeaux,
		$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
		$colors['texte'], $police_bandeau);

	foreach ($_SESSION['data']['exp'] as $xp)
	{
		$pdf->AjouterItem($xp['ddb'] . ' - ' . $xp['ddf'],
			utf8_decode($xp['int']),
			$xp['str'] . ', ' . $xp['vil'] . ' (' . $xp['cod'] . ')',
			$taille_texte, $police_texte, $espaces_g
			);
	}

	$pdf->AjouterRu("FORMATION", $espaces_g, $taille_bandeaux,
		$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
		$colors['texte'], $police_bandeau);

	foreach ($_SESSION['data']['for'] as $for)
	{
		$pdf->AjouterItem($for['ddb'] . ' - ' . $for['ddf'],
			utf8_decode($for['int']),
			$for['str'] . ', ' . $for['vil'] . ' (' . $for['cod'] . ')',
			$taille_texte, $police_texte, $espaces_g
			);
	}

	$pdf->AjouterRu("INFORMATIONS COMPLEMENTAIRES", $espaces_g, $taille_bandeaux,
		$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
		$colors['texte'], $police_bandeau);
					
	$pdf->SetFont($police_texte, '', $taille_texte);

	foreach ($_SESSION['data']['inf'] as $inf)
	{
		$pdf->Ln($espaces_g); //4 et 8 pour en bas...
		$pdf->SetLeftMargin(30);
		$pdf->Cell(0,$espaces_g,utf8_decode($inf['int']).' : '.utf8_decode($inf['con']),0,1);
		$pdf->SetLeftMargin(10);
	}

	// $pdf->Output('D', $_SESSION['data']['ide']['nom'].' '.$_SESSION['data']['ide']['pre'].' CV - '.$_SESSION['data']['tit']['tit'].'.pdf', true);
	$pdf->Output('I', $_SESSION['data']['ide']['nom'].' '.$_SESSION['data']['ide']['pre'].' CV - '.$_SESSION['data']['tit']['tit'].'.pdf', true);
	
}

?>
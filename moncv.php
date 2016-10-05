<?php
session_start();

if (1 == 2)
{
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
}

else // la génération du pdf
{
	$tailles_px = array( // échelle de tailles
		'70%' => 10,
		"80%" => 12,
		"90%" => 14,
		"100%" => 16,
		"110%" => 18,
		"120%" => 22,
		"130%" => 30
		);
	
	$tailles = array( // tailles de base
		"coordos" => 16,
		"titre" => 30,
		"sstitre" => 16,
		"bandeau" => 18,
		"texte" => 14
		);

	$codes_couleur = array(
		"Black" => '0,0,0',
		"White" => '255,255,255',
		"2574A9" => '37,116,169',
		"6C7A89" => '108,122,137',
		"F9BF3B" => '249,191,59',
		"D35400" => '211,84,0',
		"D64541" => '214,69,65',
		"CF000F" => '207,0,15',
		"049372" => '4,147,114',
		"663399" => '102,51,153'
		);
	
	$colors = array( // couleurs de base
		"texte" => array(0,0,0),
		"titre" => array(0,0,0),
		"soustitre" => array(0,0,0),
		"bandeau" => array(0,0,0),
		"fondbandeau" => array(255,255,255),
		"bordurebandeau" => array(0,0,0)		
		);
	
	$polices = array( // polices définies
		"Arial" => "Arial",
		"Cursive" => "comic",
		"Courier" => "Courier",
		"Georgia" => "Georgia",		
		"Impact" => "impact",
		"Tahoma" => "Tahoma",
		"Times" => "Times",
		"Trebuchet" => "Trebuchet",
		"Verdana" => "Verdana"
		);
		
	if ($_POST['hidden_modeleCV'] == "cv_type1")
	{
		$colors['fondbandeau'] = array(0,0,0);
		$colors['bandeau'] = array(255,255,255);
	}

	// $lespolices = array(); // pas utile de le définir
	// $espaces = array(); // pour stocker la variable espaces // idem
	
	foreach($_POST as $key => $val) // analyse des variables transmises par le formulaire
	{
		if (!empty($val))
		{
			$key = str_replace('hidden_', '', $key); // on vire hidden_
			
			if (substr($key,0,1) == 't') // on cherche les tailles
			{
				$key = str_replace('taille', '', $key); // on vire taille
				$tailles[strtolower($key)] = $tailles_px[$val]; // ex : $taile['coordos'] = $val de hidden_tailleCoordos
			}
			elseif (substr($key,0,1) == 'c') // on cherche les couleurs
			{
				$key = str_replace('color', '', $key); // on vire color
				$colors[strtolower($key)] = explode(',', $codes_couleur[$val]);				
			}
			elseif (substr($key,0,1) == 'e') // on cherche les espaces
			{
				$key = str_replace('espaces', '', $key); // on vire espaces
				$espaces[strtolower($key)] = $val . "px";				
			}
			elseif (substr($key,0,1) == 'p') // on cherche les polices
			{
				$key = str_replace('police', '', $key); // on vire police
				$lespolices[strtolower($key)] = $polices[$val];				
			}
		}
	}

	/* variables pour faciliter utilisation */
	$taille_coordos = $tailles['coordos'];
	$taille_titre = $tailles['titre'];
	$taille_ss_titre = $tailles['sstitre'];
	$taille_bandeaux = $tailles['bandeau'];
	$taille_texte = $tailles['texte'];
	$espaces_g = $espaces['cv'];
	$police_titre = $lespolices['titre'];
	$police_texte = $lespolices['textcv'];
	$police_bandeau = $lespolices['bandeau'];
	//espaces :
	// $espaces_g = 6;
	// $espace_coordos_titre = 10;

	// début de génération du pdf
	define('FPDF_FONTPATH','/font');
	require('fpdf.php');

	if ($_POST['hidden_modeleCV'] == 'cv_type1')
	{
		require('classpdf/pdf1.php');
	}
	else if ($_POST['hidden_modeleCV'] == 'cv_type2')
	{
		require('classpdf/pdf2.php');
	}
	else
	{
		require('classpdf/pdf3.php');
	}

	$pdf = new PDF();

	/* FONCTION POUR AJOUTER DES FONTS */ // fonction à créer pour simplifier...
	$pdf->AddFont('comic');
	$pdf->AddFont('comic','B','comicbd.php');
	$pdf->AddFont('comic','I','comici.php');
	$pdf->AddFont('impact');
	$pdf->AddFont('impact','B','impact.php');
	$pdf->AddFont('impact','I','impact.php');

	$pdf->AddPage();

	$pdf->SetTextColor($colors['texte'][0],$colors['texte'][1],$colors['texte'][2]);

	$pdf->AjouterCoordos($taille_coordos, $_SESSION['data']['ide'], $police_texte);

	$pdf->AjouterTitre($espaces_g, $taille_titre, utf8_decode($_SESSION['data']['tit']['tit']),
		$taille_ss_titre, $_SESSION['data']['obj']['obj'], $police_titre,
		$colors['titre'], $colors['soustitre']);

	$pdf->AjouterRu("EXPERIENCE PROFESSIONNELLE", $espaces_g, $taille_bandeaux,
		$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
		$colors['texte'], $police_bandeau);

	foreach ($_SESSION['data']['exp'] as $xp)
	{
		$pdf->AjouterItem('Du ' . $xp['datedebut']  . ' au ' . $xp['datefin'],
			utf8_decode($xp['prquoi']),
			$xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')',
			$taille_texte, $police_texte
			);
	}

	$pdf->AjouterRu("FORMATION", $espaces_g, $taille_bandeaux,
		$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
		$colors['texte'], $police_bandeau);

	foreach ($_SESSION['data']['for'] as $for)
	{
		$pdf->AjouterItem('Du ' . $for['datedebut']  . ' au ' . $for['datefin'],
			utf8_decode($for['prquoi']),
			$for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')',
			$taille_texte, $police_texte
			);
	}

	$pdf->AjouterRu("INFORMATIONS COMPLEMENTAIRES", $espaces_g, $taille_bandeaux,
		$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
		$colors['texte'], $police_bandeau);
					
	$pdf->SetFont($police_texte, '', $taille_texte);

	foreach ($_SESSION['data']['inf'] as $inf)
	{
		$pdf->Ln($espaces_g-2); //4 et 8 pour en bas...
		$pdf->Cell(0,$espaces_g+2,utf8_decode($inf['libelle']).' : '.utf8_decode($inf['contenu']),0,1);
	}

	$pdf->Output();
}

?>
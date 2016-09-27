<?php
session_start();
if (1 == 2) {
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	//params :
// tailles :
/*
$tailles_px = array(
		'xx-small' => 6,
		"x-small" => 8,
		"small" => 10,
		"medium" => 12,
		"large" => 14,
		"x-large" => 16,
		"xx-large" => 20
	);
	
$tailles = array(
		"coordos" => 16,
		"titre" => 30,
		"sstitre" => 14,
		"bandeau" => 16,
		"texte" => 12
	);
	// couleurs :
$codes_couleur = array(
		"Black" => '0,0,0',
		"White" => '255,255,255',
		"4183D7" => '65,131,215',
		"6C7A89" => '108,122,137',
		"F7CA18" => '247,202,24',
		"D35400" => '211,84,0',
		"D2527F" => '210,82,127',
		"CF000F" => '207,0,15',
		"019875" => '1,152,117',
		"663399" => '6,99,57'
	);
	
$colors = array(
		"texte" => array(0,0,0),
		"titre" => array(0,0,0),
		"bandeau" => array(0,0,0),
		"fondbandeau" => array(0,0,0),
		"bordurebandeau" => array(0,0,0)
	);
*/
	
foreach($_POST as $key => $val)
{
	if (!empty($val))
	{
		$key = str_replace('hidden_', '', $key); // on vire hidden_
		if (substr($key,0,1) == 't') // on cherche les tailles
		{
			$key = str_replace('taille', '', $key); // on vire taille
			// echo '$key : ' . strtolower($key) . '<br />';
			// echo '$val : ' . $val . '<br />';
			$tailles[strtolower($key)] = $tailles_px[$val]; // ex : $taile['coordos'] = $val de hidden_tailleCoordos
		}
		elseif (substr($key,0,1) == 'c')
		{
			$key = str_replace('color', '', $key); // on vire color
			$colors[strtolower($key)] = explode(',', $codes_couleur[$val]);
			
		}
	}
}

echo '<pre>';
print_r($colors);
echo '</pre>';

	
}
else
{
/*
unset($_SESSION);
*/
/*
$_SESSION['data']['inf']['lan'] = "Langues : Anglais (bon niveau), Allemand (niveau scolaire)";
$_SESSION['data']['inf']['loi'] = "Loisirs : musique, �criture";
*/

/* keep that pour le moment */

//params :
// tailles :
/*
$tailles_px = array(
		'xx-small' => 6,
		"x-small" => 8,
		"small" => 10,
		"medium" => 12,
		"large" => 14,
		"x-large" => 16,
		"xx-large" => 20
	);
*/
$tailles_px = array(
		'70%' => 10,
		"80%" => 12,
		"90%" => 14,
		"100%" => 16,
		"110%" => 18,
		"120%" => 22,
		"130%" => 30
	);
	
$tailles = array(
		"coordos" => 16,
		"titre" => 30,
		"sstitre" => 16,
		"bandeau" => 18,
		"texte" => 14
	);

// couleurs :
$codes_couleur = array(
		"Black" => '0,0,0',
		"White" => '255,255,255',
		"4183D7" => '65,131,215',
		"6C7A89" => '108,122,137',
		"F7CA18" => '247,202,24',
		"D35400" => '211,84,0',
		"D2527F" => '210,82,127',
		"CF000F" => '207,0,15',
		"019875" => '1,152,117',
		"663399" => '6,99,57'
	);
	
$colors = array(
		"texte" => array(0,0,0),
		"titre" => array(0,0,0),
		"bandeau" => array(0,0,0),
		"fondbandeau" => array(255,255,255),
		"bordurebandeau" => array(0,0,0)		
	);
	
$polices = array(
		"Arial" => "Arial",
		"Cursive" => "comic",
		"Courrier" => "Courrier",
		//"Helvetica" => "Helvetica" // idem Arial
		"Impact" => "impact",
		"Times" => "Times"
	);

if ($_POST['hidden_modeleCV'] == "cv_type1")
{
	$colors['fondbandeau'] = array(0,0,0);
	$colors['bandeau'] = array(255,255,255);
}

$lespolices = array();
$espaces = array(); // pour stocker la variable espaces
	
foreach($_POST as $key => $val)
{
	if (!empty($val))
	{
		$key = str_replace('hidden_', '', $key); // on vire hidden_
		if (substr($key,0,1) == 't') // on cherche les tailles
		{
			$key = str_replace('taille', '', $key); // on vire taille
			// echo '$key : ' . strtolower($key) . '<br />';
			// echo '$val : ' . $val . '<br />';
			$tailles[strtolower($key)] = $tailles_px[$val]; // ex : $taile['coordos'] = $val de hidden_tailleCoordos
		}
		elseif (substr($key,0,1) == 'c') // on cherche les couleurs
		{
			$key = str_replace('color', '', $key); // on vire color
			$colors[strtolower($key)] = explode(',', $codes_couleur[$val]);
			
		}
		elseif (substr($key,0,1) == 'e') // on cherche les espaces
		{
			$key = str_replace('espaces', '', $key); // on vire color
			$espaces[strtolower($key)] = $val . "px";
			
		}
		elseif (substr($key,0,1) == 'p') // on cherche les polices
		{
			$key = str_replace('police', '', $key); // on vire police
			$lespolices[strtolower($key)] = $polices[$val];
			
		}
	}
}



// fonts :
//polices :
/*$polices = array('Arial', 'Times', 'Courier');*/

	/*
	[hidden_tailleTextCV] => 
	[hidden_tailleCoordos] =>
	[hidden_tailleTitre] => 
	[hidden_tailleTextBandeau] => )
	
	[hidden_modeleCV] => 
    [hidden_policeTextCV] => 
    [hidden_colorTextCV] => 
    
     
    [hidden_policeTitre] => 
    [hidden_colorTitre] => 
    [hidden_borduresTitre] => 
    
    [hidden_policeBandeau] => 
    [hidden_colorBandeau] => 
    [hidden_couleurFondBandeau] => 
    [hidden_bordureBandeau] => 
    
	*/

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
//$espace_coordos_titre = 10;


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

/* FONCTION POUR AJOUTER DES FONTS */ // fonction � cr�er pour simplifier...
$pdf->AddFont('comic');
$pdf->AddFont('comic','B','comicbd.php');
$pdf->AddFont('comic','I','comici.php');
$pdf->AddFont('impact');
$pdf->AddFont('impact','B','impact.php');
$pdf->AddFont('impact','I','impact.php');

$pdf->AddPage();

$pdf->SetTextColor($colors['texte'][0],$colors['texte'][1],$colors['texte'][2]);

$pdf->AjouterCoordos($taille_coordos, $_SESSION['data']['ide'], $police_texte);

$pdf->AjouterTitre($espaces_g, $taille_titre, utf8_decode($_SESSION['data']['tit']['tit']), $taille_ss_titre, $_SESSION['data']['obj']['obj'], $police_titre);

$pdf->AjouterRu("EXPERIENCE PROFESSIONNELLE", $espaces_g, $taille_bandeaux,
					$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
					$colors['texte'], $police_bandeau);

foreach ($_SESSION['data']['exp'] as $xp) {
$pdf->AjouterItem('Du ' . $xp['datedebut']  . ' au ' . $xp['datefin'],
					utf8_decode($xp['prquoi']),
					$xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')',
					$taille_texte, $police_texte
					);
}


$pdf->AjouterRu("FORMATION", $espaces_g, $taille_bandeaux,
					$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
					$colors['texte'], $police_bandeau);

foreach ($_SESSION['data']['for'] as $for) {
$pdf->AjouterItem('Du ' . $for['datedebut']  . ' au ' . $for['datefin'],
					utf8_decode($for['prquoi']),
					$for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')',
					$taille_texte, $police_texte
					);
}



$pdf->AjouterRu("INFORMATIONS COMPLEMENTAIRES", $espaces_g, $taille_bandeaux,
					$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
					$colors['texte'], $police_bandeau);
					
$pdf->SetFont('Arial','',$taille_texte);

foreach ($_SESSION['data']['inf'] as $inf) {
$pdf->Ln(4);
$pdf->Cell(0,8,utf8_decode($inf['libelle']).' : '.utf8_decode($inf['contenu']),0,1);
}

/*
$pdf->Cell(0,10,'Langues : Anglais (top), Allemand (super)',0,1);
$pdf->Cell(0,10,'Informatique : G�n�ration de PDFs (trop fort)',0,1);
$pdf->Cell(0,10,'Permis B et v�hicule',0,1);
$pdf->Cell(0,10,'Loisirs : musique (guitare), tennis, cin�ma, litt�rature',0,1);
*/

$pdf->Output();

}

?>

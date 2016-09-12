<?php
session_start();
if (1 == 2) {
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
	//params :
// tailles :
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
		"D2527F" => '210,82,27',
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

$_SESSION['data']['inf']['lan'] = "Langues : Anglais (bon niveau), Allemand (niveau scolaire)";
$_SESSION['data']['inf']['loi'] = "Loisirs : musique, écriture";
/* keep that pour le moment */

//params :
// tailles :
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
		"D2527F" => '210,82,27',
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



// fonts :
//polices :
$polices = array('Arial', 'Times', 'Courier');

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

//espaces :
$espaces_g = 6;
//$espace_coordos_titre = 10;



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
$pdf->AddPage();

$pdf->SetTextColor($colors['texte'][0],$colors['texte'][1],$colors['texte'][2]);

$pdf->AjouterCoordos($taille_coordos, $_SESSION['data']['ide']);

$pdf->AjouterTitre($espaces_g, $taille_titre, $_SESSION['data']['tit']['tit'], $taille_ss_titre, $_SESSION['data']['obj']['obj']);

$pdf->AjouterRu("EXPERIENCE PROFESSIONNELLE", $espaces_g, $taille_bandeaux,
					$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
					$colors['texte']);

foreach ($_SESSION['data']['exp'] as $xp) {
$pdf->AjouterItem('Du ' . $xp['datedebut']  . ' au ' . $xp['datefin'],
					$xp['prequoi'],
					$xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')',
					$taille_texte
					);
}


$pdf->AjouterRu("FORMATION", $espaces_g, $taille_bandeaux,
					$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
					$colors['texte']);

foreach ($_SESSION['data']['for'] as $for) {
$pdf->AjouterItem('Du ' . $for['datedebut']  . ' au ' . $for['datefin'],
					$for['prequoi'],
					$for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')',
					$taille_texte
					);
}



$pdf->AjouterRu("INFORMATIONS COMPLEMENTAIRES", $espaces_g, $taille_bandeaux,
					$colors['fondbandeau'], $colors['bandeau'], $colors['bordurebandeau'],
					$colors['texte']);
					
$pdf->SetFont('Arial','',$taille_texte);

foreach ($_SESSION['data']['inf'] as $inf) {
$pdf->Ln(4);
$pdf->Cell(0,8,$inf,0,1);
}

/*
$pdf->Cell(0,10,'Langues : Anglais (top), Allemand (super)',0,1);
$pdf->Cell(0,10,'Informatique : Génération de PDFs (trop fort)',0,1);
$pdf->Cell(0,10,'Permis B et véhicule',0,1);
$pdf->Cell(0,10,'Loisirs : musique (guitare), tennis, cinéma, littérature',0,1);
*/

$pdf->Output();

}

?>

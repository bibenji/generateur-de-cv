<?php
class PDF extends FPDF
{

function AjouterRuSpe($rub, $espaces_g, $taille_b, $align)
{
    $this->Ln($espaces_g);
	$this->SetFont('Arial','B',$taille_b);
	$this->SetTextColor(0,0,0);
	$this->SetFillColor(255,255,255);
	$this->SetDrawColor(255,255,255);
	$ex_rub = explode('-', $rub);
	$this->Cell(80,10,$ex_rub[0],1,1,$align,true);
	$this->Cell(80,10,$ex_rub[1],1,1,$align,true);
	$this->SetFillColor(0,0,0);
	//$this->Cell(80,1,'',1,1,'',true);
	// Saut de ligne
	$this->Ln(1);
	$this->SetTextColor(0,0,0);
}

function AjouterRu($rub, $espaces_g, $taille_b, $align) // faire un héritage ou un trait... à voir demain !!!
{
	$this->Ln($espaces_g);
	$this->SetFont('Arial','B',$taille_b);
	$this->SetTextColor(0,0,0);
	$this->SetFillColor(255,255,255);
	$this->SetDrawColor(255,255,255);
	$this->Cell(0,10,$rub,1,1,$align,true);
	$this->SetFillColor(0,0,0);
	//$this->Cell(0,1,'',1,1,'',true);
	// Saut de ligne
	$this->Ln(1);
	$this->SetTextColor(0,0,0);
}

function AjouterItem($quand, $quoi, $ou, $taille_t, $align)
{
	$this->Ln(4);
	$this->SetFont('Arial','',$taille_t);
	$this->Cell(80,6,$quand,0,1,$align);
	$this->SetFont('Arial','B',$taille_t);
	$this->Cell(80,6,$quoi,0,1,$align);
	$this->SetFont('Arial','',$taille_t);
	$this->Cell(80,6,$ou,0,1,$align);
}

function AjouterrrRu($rub, $espaces_g, $taille_b, $align)
{
    //$this->AddPage();
    $this->TitreRu($rub, $espaces_g, $taille_b, $align);
    //$this->CorpsChapitre($fichier);
}

}

$pdf = new PDF();
$pdf->AddPage();


$pdf->SetFont( 'Arial','B',$taille_coordos+2);
$pdf->Cell(0,6,$_SESSION['data']['ide']['nom'] . ' ' .  $_SESSION['data']['ide']['pre'],0,1,'C');
$pdf->SetFont('Arial','',$taille_coordos);
$pdf->Cell(0,6,$_SESSION['data']['ide']['adr'] . ', ' . $_SESSION['data']['ide']['cod'] . ' ' . $_SESSION['data']['ide']['vil'],0,1,'C');

$pdf->Cell(0,6,'06 74 22 43 22 - benjamin.billette@hotmail.fr',0,1,'C');
$pdf->Cell(0,6,'Né le : ' . $_SESSION['data']['ide']['dat'] . ' (29 ans)',0,1,'C');

$pdf->Ln($espaces_g);
$pdf->Cell(0,0.5,'',1,1,'',true);

//$pdf->Cell(0,$espace_coordos_titre,'',0,1); //espace_coordos_titre
$pdf->Ln($espaces_g+2);
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(0,8,'Candidature pour un poste de',0,1,'C');
$pdf->SetFont('Arial','B',$taille_titre);
$pdf->Cell(0,8,$_SESSION['data']['tit'],0,1,'C');
$pdf->Cell(0,3,'',0,1,'C');
$pdf->SetFont('Arial','I',$taille_ss_titre);

$pdf->SetLeftMargin(30);
$pdf->MultiCell(150,5,$_SESSION['data']['obj']);



$pdf->SetLeftMargin(10);
$pdf->Ln($espaces_g);

$pdf->Cell(0,0.5,'',1,1,'',true);

$pdf->Ln($espaces_g-4);


$save_y = $pdf->GetY();

$pdf->AjouterRuSpe("EXPERIENCE-PROFESSIONNELLE", $espaces_g, $taille_bandeaux, 'R');

foreach ($_SESSION['data']['exp'] as $xp) {
$pdf->AjouterItem('Du ' . $xp['datedebut']  . ' au ' . $xp['datefin'],
					$xp['prequoi'],
					$xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')',
					$taille_texte, 'R'
					);
}


$pdf->SetLeftMargin(110);
$save_xp_y = $pdf->GetY();
$pdf->setY($save_y);

$pdf->AjouterRu("FORMATION", $espaces_g, $taille_bandeaux, 'L');

foreach ($_SESSION['data']['for'] as $for) {
$pdf->AjouterItem('Du ' . $for['datedebut']  . ' au ' . $for['datefin'],
					$for['prequoi'],
					$for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')',
					$taille_texte, 'L'
					);
}

$save_for_y = $pdf->GetY();
if($save_xp_y >= $save_for_y) {
	$pdf->setY($save_xp_y+10);
} else {
	$pdf->setY($save_for_y+10);
}
$pdf->SetLeftMargin(10);

$pdf->Cell(0,0,'',1,1,'',true);
$pdf->Cell(0,0.5,'',1,1,'',true);

$pdf->AjouterRu("INFORMATIONS COMPLEMENTAIRES", $espaces_g, $taille_bandeaux, 'C');
$pdf->SetFont('Arial','',$taille_texte);

foreach ($_SESSION['data']['inf'] as $inf) {
$pdf->Ln(4);
$pdf->Cell(0,8,$inf,0,1,'C');
}

/*
$pdf->Cell(0,10,'Langues : Anglais (top), Allemand (super)',0,1);
$pdf->Cell(0,10,'Informatique : Génération de PDFs (trop fort)',0,1);
$pdf->Cell(0,10,'Permis B et véhicule',0,1);
$pdf->Cell(0,10,'Loisirs : musique (guitare), tennis, cinéma, littérature',0,1);
*/

$pdf->Output();

?>

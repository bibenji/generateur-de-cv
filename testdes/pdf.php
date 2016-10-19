<?php
session_start();

require('fpdf.php');

class PDF extends FPDF
{

function TitreRu($rub)
{
	$this->Ln(6);
	$this->SetFont('Arial','B',14);
	$this->SetFillColor(194, 194, 214);
	$this->Cell(0,10,$rub,1,1,'C',true);
	// Saut de ligne
	$this->Ln(1);
}

function AjouterItem($quand, $quoi, $ou)
{
	$this->SetFont('Arial','',12);
	$this->Cell(70,10,$quand,0,0);
	$this->Cell(60,10,$quoi,0,0);
	$this->Cell(60,10,$ou,0,1);
}

function AjouterRu($rub)
{
    //$this->AddPage();
    $this->TitreRu($rub);
    //$this->CorpsChapitre($fichier);
}

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont( 'Arial','B',16);
$pdf->Cell(50,8,$_SESSION['data']['ide']['nom'] . ' ' .  $_SESSION['data']['ide']['pre'],0,1);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,6,$_SESSION['data']['ide']['adr'],0,1);
$pdf->Cell(50,6,$_SESSION['data']['ide']['cod'] . ' ' . $_SESSION['data']['ide']['vil'],0,1);
$pdf->Cell(50,6,'06 74 22 43 22',0,1);
$pdf->Cell(50,6,'benjamin.billette@hotmail.fr',0,1);
$pdf->Cell(50,6,'Né le : ' . $_SESSION['data']['ide']['dat'] . ' (29 ans)',0,1);

$pdf->Cell(50,6,$_POST['hidden_policeTextCV'],0,1);


$pdf->Cell(0,10,'',0,1);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,8,'Candidature pour un poste de',0,1,'C');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,8,$_SESSION['data']['tit'],0,1,'C');
$pdf->Cell(0,10,'',0,1);
$pdf->SetFont('Arial','I',12);
$pdf->MultiCell(0,5,$_SESSION['data']['obj']);

$pdf->AjouterRu("EXPERIENCE PROFESSIONNELLE");

foreach ($_SESSION['data']['exp'] as $xp) {
$pdf->AjouterItem('Du ' . $xp['datedebut']  . ' au ' . $xp['datefin'],
					$xp['prequoi'],
					$xp['nomou'] . ', ' . $xp['ville'] . ' (' . $xp['codedep'] . ')');
}


$pdf->AjouterRu("FORMATION");

foreach ($_SESSION['data']['for'] as $for) {
$pdf->AjouterItem('Du ' . $for['datedebut']  . ' au ' . $for['datefin'],
					$for['prequoi'],
					$for['nomou'] . ', ' . $for['ville'] . ' (' . $for['codedep'] . ')');
}



$pdf->AjouterRu("INFORMATIONS COMPLEMENTAIRES");
$pdf->SetFont('Arial','',11);

foreach ($_SESSION['data']['inf'] as $inf) {
$pdf->Cell(0,10,$inf,0,1);
}

/*
$pdf->Cell(0,10,'Langues : Anglais (top), Allemand (super)',0,1);
$pdf->Cell(0,10,'Informatique : Génération de PDFs (trop fort)',0,1);
$pdf->Cell(0,10,'Permis B et véhicule',0,1);
$pdf->Cell(0,10,'Loisirs : musique (guitare), tennis, cinéma, littérature',0,1);
*/

$pdf->Output();

?>

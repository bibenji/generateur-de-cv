<?php
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
$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,8,'BILLETTE Benjamin',0,1);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,6,'17 rue Capron',0,1);
$pdf->Cell(50,6,'75018 PARIS',0,1);
$pdf->Cell(50,6,'06 74 22 43 22',0,1);
$pdf->Cell(50,6,'benjamin.billette@hotmail.fr',0,1);
$pdf->Cell(50,6,'Né le : 26/03/1987 (29 ans)',0,1);

$pdf->Cell(0,10,'',0,1);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,8,'Candidature pour un poste de',0,1,'C');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,8,'DEVELOPPEUR WEB',0,1,'C');
$pdf->Cell(0,10,'',0,1);
$pdf->SetFont('Arial','I',12);
$pdf->MultiCell(0,5,'Dans le cadre d\'une reconversion professionnelle, je recherche une première expérience dans le domaine du développement web.');

$pdf->AjouterRu("EXPERIENCE PROFESSIONNELLE");

$pdf->AjouterItem("Du 01/01/2015 au 17/08/2016","C.I.S.P.","ML Seinoise, DEUIL (95)");
$pdf->AjouterItem("Du 01/01/2014 au 31/12/2015","C.I.S.P.","ML Cergy, PONTOISE (95)");




//$titre = 'Vingt mille lieues sous les mers';
//$pdf->SetTitle($titre);
//$pdf->SetAuthor('Jules Verne');
$pdf->AjouterRu("FORMATION");
//$pdf->AjouterChapitre(2,'LE POUR ET LE CONTRE','yoyo 2');
$pdf->AjouterItem("Du 01/01/2016 au 01/01/2017","Développeur Web","CNAM, PARIS (75)");
$pdf->AjouterItem("Du 01/09/2014 au 01/07/2015","M2 Psychologie","Paris X, NANTERRE (92)");


$pdf->AjouterRu("INFORMATIONS COMPLEMENTAIRES");
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,'Langues : Anglais (top), Allemand (super)',0,1);
$pdf->Cell(0,10,'Informatique : Génération de PDFs (trop fort)',0,1);
$pdf->Cell(0,10,'Permis B et véhicule',0,1);
$pdf->Cell(0,10,'Loisirs : musique (guitare), tennis, cinéma, littérature',0,1);

$pdf->Output();
?>
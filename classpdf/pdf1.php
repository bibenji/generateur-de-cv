<?php
class PDF extends FPDF
{
function AjouterCoordos($taille_c, $data_ide)
{
	$this->SetFont( 'Arial','B',$taille_c+2);
	$this->Cell(80,6,$data_ide['nom'] . ' ' .  $data_ide['pre'],0,1);
	$this->SetFont('Arial','',$taille_c);
	$this->Cell(80,6,$data_ide['adr'],0,1);
	$this->Cell(80,6,$data_ide['cod'] . ' ' . $data_ide['vil'],0,1);
	$this->Cell(80,6,'06 74 22 43 22',0,1);
	$this->Cell(80,6,'benjamin.billette@hotmail.fr',0,1);
	$this->Cell(80,6,'Né le : ' . $data_ide['dat'] . ' (29 ans)',0,1);
}

function AjouterTitre($espaces_g, $taille_t, $titre, $taille_ss_t, $objectif)
{
	//$this->Cell(0,$espace_coordos_titre,'',0,1); //espace_coordos_titre
	$this->Ln($espaces_g+2);
	//$this->SetFont('Arial','B',16);
	//$this->Cell(0,8,'Candidature pour un poste de',0,1,'C');
	$this->SetFont('Arial','B',$taille_t);
	$this->Cell(0,8,$titre,0,1);
	$this->Cell(0,3,'',0,1,'C');
	$this->SetFont('Arial','I',$taille_ss_t);
	$this->MultiCell(0,5,$objectif);
}


function AjouterRu($rub, $espaces_g, $taille_b, $colband, $coltxtband, $colbdrband, $coltexte) // faire un héritage ou un trait... à voir demain !!!
{
	$this->Ln($espaces_g);
	$this->SetFont('Arial','B',$taille_b);
	$this->SetTextColor($coltxtband[0],$coltxtband[1],$coltxtband[2]);
	// $test = '0,200,100';
	// $test = explode(',', $test);
	$this->SetFillColor($colband[0],$colband[1],$colband[2]);
	$this->Cell(0,10,$rub,1,1,'C',true);
	// Saut de ligne
	$this->Ln(1);
	$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);
}

function AjouterItem($quand, $quoi, $ou, $taille_t)
{
	$this->Ln(4);
	$this->SetFont('Arial','',$taille_t);
	$this->Cell(85,8,$quand,0,0);
	$this->SetFont('Arial','B',$taille_t+2);
	$this->Cell(0,8,$quoi,0,1);
	$this->SetFont('Arial','',$taille_t);
	$this->Cell(85,8,'',0,0);
	$this->Cell(0,8,$ou,0,1);
}


}

<?php
class PDF extends FPDF
{
	function AjouterCoordos($taille_c, $data_ide, $police)
	{
		$this->SetFont($police,'B',$taille_c+2);
		$this->Cell(80,6,$data_ide['nom'] . ' ' .  $data_ide['pre'],0,1);
	
		$this->SetFont($police,'',$taille_c);
		$this->Cell(80,6,utf8_decode($data_ide['adr']),0,1);
		$this->Cell(80,6,$data_ide['cod'] . ' ' . $data_ide['vil'],0,1);
		$this->Cell(80,6,$data_ide['tel'],0,1);
		$this->Cell(80,6,$data_ide['mai'],0,1);
		$this->Cell(80,6,'Né le ' . $data_ide['dat'],0,1);
	}

	function AjouterTitre($espaces_g, $taille_t, $titre, $taille_ss_t, $objectif, $police, $coltitre, $colsoustitre)
	{
		//$this->Cell(0,$espace_coordos_titre,'',0,1); //espace_coordos_titre
		$this->Ln($espaces_g+2);
		
		$this->SetFont($police,'B',$taille_t);
		$this->SetTextColor($coltitre[0],$coltitre[1],$coltitre[2]);
		$this->Cell(0,8,$titre,0,1);
		$this->Cell(0,3,'',0,1,'C');
		
		$this->SetFont($police,'I',$taille_ss_t);
		$this->SetTextColor($colsoustitre[0],$colsoustitre[1],$colsoustitre[2]);
		$this->MultiCell(0,5,utf8_decode($objectif));
	}

	function AjouterRu($rub, $espaces_g, $taille_b, $colband, $coltxtband, $colbrdband, $coltexte, $police) // faire un héritage ou un trait... à voir demain !!!
	{
		$this->Ln($espaces_g);
		$this->SetFont($police,'B',$taille_b);
		$this->SetTextColor($coltxtband[0],$coltxtband[1],$coltxtband[2]);
		// $test = '0,200,100';
		// $test = explode(',', $test);
		$this->SetFillColor($colband[0],$colband[1],$colband[2]);
		$this->SetDrawColor($colbrdband[0],$colbrdband[1],$colbrdband[2]);
		$this->Cell(0,10,$rub,1,1,'C',true);
		// Saut de ligne
		$this->Ln(1);
		$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);
	}

	function AjouterItem($quand, $quoi, $ou, $taille_t, $police)
	{
		$this->Ln(4);
		$this->SetFont($police,'',$taille_t);
		$this->Cell(85,8,$quand,0,0);
		$this->SetFont($police,'B',$taille_t+2);
		$this->Cell(0,8,$quoi,0,1);
		$this->SetFont($police,'',$taille_t);
		$this->Cell(85,8,'',0,0);
		$this->Cell(0,8,$ou,0,1);
	}
}

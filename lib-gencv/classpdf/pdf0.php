<?php
class PDF extends FPDF
{
	function AjouterCoordos($taille_c, $data_ide, $police, $esp_g)
	{
		$this->SetFont($police,'B',$taille_c+2);
		$this->Cell(80,$esp_g,$data_ide['nom'] . ' ' . $data_ide['pre'],0,1);	
		$this->SetFont($police,'',$taille_c);
		$this->Cell(80,$esp_g,$data_ide['adr'],0,1);
		$this->Cell(80,$esp_g,$data_ide['cod'] . ' ' . $data_ide['vil'],0,1);
		$this->Cell(80,$esp_g,$data_ide['tel'],0,1);
		$this->Cell(80,$esp_g,$data_ide['mai'],0,1);
		$this->Cell(80,$esp_g,'Né(e) le ' . $data_ide['nai'],0,1);
	}

	function AjouterTitre($esp_g, $taille_t, $titre, $taille_ss_t, $objectif, $police, $coltitre, $colsoustitre)
	{		
		$this->Ln($esp_g*1.5);
		
		$this->SetFont($police,'B',$taille_t);
		$this->SetTextColor($coltitre[0],$coltitre[1],$coltitre[2]);
		$this->Cell(0,$esp_g,$titre,0,1,'C');
		$this->Cell(0,($esp_g*0.75),'',0,1,'C');
		
		$this->SetFont($police,'I',$taille_ss_t);
		$this->SetTextColor($colsoustitre[0],$colsoustitre[1],$colsoustitre[2]);
		$this->MultiCell(0,$esp_g,$objectif,'','C');
	}

	function AjouterRu($rub, $espaces_g, $taille_b, $colband, $coltxtband, $colbrdband, $coltexte, $police) // faire un héritage ou un trait... à voir demain !!!
	{
		$this->Ln($espaces_g);
		$this->SetFont($police,'BU',$taille_b+2);
		$this->SetTextColor($coltxtband[0],$coltxtband[1],$coltxtband[2]);		
		$this->SetFillColor($colband[0],$colband[1],$colband[2]);
		$this->SetDrawColor($colbrdband[0],$colbrdband[1],$colbrdband[2]);
				
		$this->Cell('',$espaces_g*1.5,ucfirst(strtolower(utf8_decode($rub))),'',1,'L',true);
		// $underline = $this->Cell('',0.5,'',1,1,'',true);
				
		$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);
	}

	function AjouterItem($quand, $quoi, $ou, $taille_t, $police, $esp_g)
	{
		$this->Ln($esp_g);
		$this->SetFont($police,'',$taille_t);
		$this->Cell(80,$esp_g,$quand,0,0);
		$this->SetFont($police,'B',$taille_t+2);
		$this->Cell(0,$esp_g,$quoi,0,1);
		$this->SetFont($police,'',$taille_t);
		$this->Cell(80,$esp_g,'',0,0);
		$this->Cell(0,$esp_g,utf8_decode($ou),0,1);		
	}	
}

<?php
class PDF extends FPDF
{
	function AjouterCoordos($taille_c, $data_ide, $police, $esp_g)
	{
		$this->SetFont( $police,'B',$taille_c+2);
		$this->Cell(80,$esp_g,$data_ide['nom'] . ' ' .  $data_ide['pre'],0,1);
		
		$this->SetFont($police,'',$taille_c);
		$this->Cell(80,$esp_g,utf8_decode($data_ide['adr']),0,1);
		$this->Cell(80,$esp_g,$data_ide['cod'] . ' ' . $data_ide['vil'],0,1);
		$this->Cell(80,$esp_g,$data_ide['tel'],0,1);
		$this->Cell(80,$esp_g,$data_ide['mai'],0,1);
		$this->Cell(80,$esp_g,'Né le ' . $data_ide['nai'],0,1);
	}

	function AjouterTitre($espaces_g, $taille_t, $titre, $taille_ss_t, $objectif, $police, $coltitre, $colsoustitre)
	{
		$save_y = $this->GetY();
		$this->setY(5);
		$this->SetLeftMargin(80);
		
		$this->Ln($espaces_g*1.5);
		
		$this->SetFont($police,'B',$taille_t);
		$this->SetTextColor($coltitre[0],$coltitre[1],$coltitre[2]);
		$this->Cell(0,$espaces_g,$titre,0,1,'C');
		$this->Cell(0,$espaces_g*0.5,'',0,1,'C');
		$this->SetFont($police,'I',$taille_ss_t);
		$this->SetTextColor($colsoustitre[0],$colsoustitre[1],$colsoustitre[2]);
		$this->MultiCell(0,$espaces_g,$objectif,'','C');
		
		$this->setY($save_y);
		$this->SetLeftMargin(10);
		$this->Ln($espaces_g);
	}

	function AjouterRu($rub, $espaces_g, $taille_b, $colband, $coltxtband, $colbrdband, $coltexte, $police) // faire un héritage ou un trait... à voir demain !!!
	{
		// déterminer l'icone à afficher
		$icones = array(
			"EXPERIENCE PROFESSIONNELLE" => "images/experiences.png",
			"FORMATION" => "images/formation.png",
			"INFORMATIONS COMPLEMENTAIRES" => "images/infos.jpg"
		);
			
		$this->Ln($espaces_g);
		$this->Image($icones[$rub],null,null,$taille_b*0.40);
		
		$this->setY($this->getY()-5);
		$this->setX($this->getX()+13);
		
		
		$this->SetFont($police,'B',$taille_b);
		$this->SetTextColor($coltxtband[0],$coltxtband[1],$coltxtband[2]);		
		$this->SetFillColor($colband[0],$colband[1],$colband[2]);
		$this->SetDrawColor(255,255,255);
			
		$this->Cell(0,$espaces_g,ucfirst(strtolower($rub)),1,1,'',true);
		$this->SetFillColor($colbrdband[0],$colbrdband[1],$colbrdband[2]);
		$this->Cell(0,1,'',1,1,'',true);
		// Saut de ligne
		// $this->Ln($espaces_g);
		$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);
		
		$this->setX($this->getX()-14);
		// $this->setY($this->getY()+10);
	}

	function AjouterItem($quand, $quoi, $ou, $taille_t, $police, $esp_g)
	{
		$this->Ln($esp_g);
		$this->SetFont($police,'',$taille_t);
		$this->SetLeftMargin(20);
		$this->Cell(85,$esp_g,$quand,0,0);
		$this->SetFont($police,'B',$taille_t);
		$this->Cell(0,$esp_g,$quoi,0,1);
		$this->SetFont($police,'',$taille_t);
		$this->Cell(85,$esp_g,'',0,0);
		$this->Cell(0,$esp_g,$ou,0,1);
		$this->SetLeftMargin(10);
	}

}
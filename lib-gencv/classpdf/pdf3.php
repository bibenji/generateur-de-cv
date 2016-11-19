<?php
class PDF extends FPDF
{
	public $align, $save_y, $save_xp_y;

	function AjouterCoordos($taille_c, $data_ide, $police, $esp_g)
	{
		$this->SetFont( $police,'B',$taille_c+2);
		$this->Cell(0,$esp_g,$data_ide['nom'] . ' ' .  $data_ide['pre'],0,1,'C');		
		$this->SetFont($police,'',$taille_c);
		$this->Cell(0,$esp_g,$data_ide['adr'] . ', ' . $data_ide['cod'] . ' ' . $data_ide['vil'],0,1,'C');
		$this->Cell(0,$esp_g,$data_ide['tel'].' - '.$data_ide['mai'],0,1,'C');
		$this->Cell(0,$esp_g,'Né(e) le ' . $data_ide['nai'],0,1,'C');
	}

	function AjouterTitre($espaces_g, $taille_t, $titre, $taille_ss_t, $objectif, $police, $coltitre, $colsoustitre)
	{
		global $save_y;
	
		$this->Ln($espaces_g);
		$this->Cell(0,0.5,'',1,1,'',true);
		$this->Ln($espaces_g*1.5);
		
		$this->SetFont($police,'B',$taille_t);
		$this->SetTextColor($coltitre[0],$coltitre[1],$coltitre[2]);
		$this->Cell(0,$espaces_g,$titre,0,1,'C');
		$this->Cell(0,$espaces_g*0.5,'',0,1,'C');
		$this->SetFont($police,'I',$taille_ss_t);
		$this->SetTextColor($colsoustitre[0],$colsoustitre[1],$colsoustitre[2]);
		$this->SetLeftMargin(30);
		$this->MultiCell(150,$espaces_g,$objectif,'','C');
		$this->SetLeftMargin(10);
		$this->Ln($espaces_g);
		$this->Cell(0,0.5,'',1,1,'',true);
		
		$save_y = $this->GetY();
	}

	function AjouterRuSpe($rub, $espaces_g, $taille_b, $colband, $coltxtband, $colbrdband, $coltexte, $align, $police)
	{		
		$this->Ln($espaces_g);
		$this->SetFont($police,'B',$taille_b);		
		$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);		
		$this->SetFillColor($colband[0],$colband[1],$colband[2]);
		$this->SetDrawColor(255,255,255);		
		$ex_rub = explode('-', strtoupper($rub));
		$this->Cell(80,$espaces_g,$ex_rub[0],1,1,$align,true);
		$this->Cell(80,$espaces_g,$ex_rub[1],1,1,$align,true);
		$this->SetFillColor(0,0,0);		

		$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);
		
		global $align;
		$align = 'R';
	}

	function AjouterRu($rub, $espaces_g, $taille_b, $colband, $coltxtband, $colbrdband, $coltexte, $police) // faire un héritage ou un trait... à voir demain !!!
	{	
		global $align, $save_y, $save_xp_y;
		if (substr($rub,0,3) == 'exp')
		{
			$this->AjouterRuSpe("expériences-professionnelles", $espaces_g, $taille_b, $colband, $coltxtband, $colbrdband, $coltexte, 'R', $police);
		}
		else
		{
		if (substr($rub,0,3) == 'for')
		{
			$this->SetLeftMargin(110);
			$save_xp_y = $this->GetY();
			$this->setY($save_y);
			$align = 'L';
		}
		else // si $rub == info comp
		{
			/*befor info com*/
			$save_for_y = $this->GetY();
			if($save_xp_y >= $save_for_y)
			{
				$this->setY($save_xp_y+10);
			}
			else 
			{
				$this->setY($save_for_y+10);
			}
			$this->SetLeftMargin(10);
			$this->Cell(0,0,'',1,1,'',true);
			$this->Cell(0,1,'',1,1,'',true);
			
			$align = 'C';
		}
		$this->Ln($espaces_g);
		$this->SetFont($police,'B',$taille_b);		
		$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);		
		$this->SetDrawColor($colbrdband[0],$colbrdband[1],$colbrdband[2]);
		$this->SetFillColor(255,255,255);
		$this->SetDrawColor(255,255,255);
		$this->Cell(0,$espaces_g,strtoupper(utf8_decode($rub)),1,1,$align,true);
		$this->SetFillColor($colband[0],$colband[1],$colband[2]);
		$this->SetFillColor(0,0,0);				
		$this->SetTextColor(0,0,0);
		}
	}

	function AjouterItem($quand, $quoi, $ou, $taille_t, $police, $esp_g)
	{
		global $align;
		$this->Ln($esp_g);
		$this->SetFont($police,'',$taille_t);
		$this->Cell(80,$esp_g,$quand,0,1,$align);
		$this->SetFont($police,'B',$taille_t);
		$this->Cell(80,$esp_g,$quoi,0,1,$align);
		$this->SetFont($police,'',$taille_t);
		$this->MultiCell(80,$esp_g,utf8_decode($ou),0,$align);
		
	}

	function AjouterrrRu($rub, $espaces_g, $taille_b, $align, $police)
	{		
		$this->TitreRu($rub, $espaces_g, $taille_b, $align);	
	}
}
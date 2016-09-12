<?php
class PDF extends FPDF
{
public $align, $save_y, $save_xp_y;

function AjouterCoordos($taille_c, $data_ide)
{
	$this->SetFont( 'Arial','B',$taille_c+2);
	$this->Cell(0,6,$data_ide['nom'] . ' ' .  $data_ide['pre'],0,1,'C');
	$this->SetFont('Arial','',$taille_c);
	$this->Cell(0,6,$data_ide['adr'] . ', ' . $data_ide['cod'] . ' ' . $data_ide['vil'],0,1,'C');

	$this->Cell(0,6,'06 74 22 43 22 - benjamin.billette@hotmail.fr',0,1,'C');
	$this->Cell(0,6,'Né le : ' . $data_ide['dat'] . ' (29 ans)',0,1,'C');
}

function AjouterTitre($espaces_g, $taille_t, $titre, $taille_ss_t, $objectif)
{
	global $save_y;
	
	$this->Ln($espaces_g);
	$this->Cell(0,0.5,'',1,1,'',true);
		
	//$this->Cell(0,$espace_coordos_titre,'',0,1); //espace_coordos_titre
	$this->Ln($espaces_g+2);
	//$this->SetFont('Arial','B',16);
	//$this->Cell(0,8,'Candidature pour un poste de',0,1,'C');
	$this->SetFont('Arial','B',$taille_t);
	$this->Cell(0,8,$titre,0,1,'C');
	$this->Cell(0,3,'',0,1,'C');
	$this->SetFont('Arial','I',$taille_ss_t);
	$this->SetLeftMargin(30);
	$this->MultiCell(150,5,$objectif);
	$this->SetLeftMargin(10);
	$this->Ln($espaces_g);
	$this->Cell(0,0.5,'',1,1,'',true);
	$this->Ln($espaces_g-4);
	$save_y = $this->GetY();
}


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

function AjouterRu($rub, $espaces_g, $taille_b) // faire un héritage ou un trait... à voir demain !!!
{	
	global $align, $save_y, $save_xp_y;
	if ($rub == 'EXPERIENCE PROFESSIONNELLE')
	{
		$this->AjouterRuSpe("EXPERIENCE-PROFESSIONNELLE", $espaces_g, $taille_b, 'R');
	}
	else
	{
	if ($rub == 'FORMATION')
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
		$this->Cell(0,0.5,'',1,1,'',true);
		
		$align = 'C';
	}
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
}

function AjouterItem($quand, $quoi, $ou, $taille_t)
{
	global $align;
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

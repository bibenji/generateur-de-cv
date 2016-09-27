<?php
class PDF extends FPDF
{
function AjouterCoordos($taille_c, $data_ide, $police)
{
	$this->SetFont( $police,'B',$taille_c+2);
	$this->Cell(80,6,$data_ide['nom'] . ' ' .  $data_ide['pre'],0,1);
	$this->SetFont($police,'',$taille_c);
	$this->Cell(80,6,utf8_decode($data_ide['adr']),0,1);
	$this->Cell(80,6,$data_ide['cod'] . ' ' . $data_ide['vil'],0,1);
	$this->Cell(80,6,'06 74 22 43 22',0,1);
	$this->Cell(80,6,'benjamin.billette@hotmail.fr',0,1);
	$this->Cell(80,6,'Né le : ' . $data_ide['dat'] . ' (29 ans)',0,1);
	
	
}

function AjouterTitre($espaces_g, $taille_t, $titre, $taille_ss_t, $objectif, $police)
{
	$save_y = $this->GetY();
	$this->setY(5);
	$this->SetLeftMargin(100);

	//$this->Cell(0,$espace_coordos_titre,'',0,1); //espace_coordos_titre
	$this->Ln($espaces_g+2);
	//$this->SetFont($police,'B',16);
	//$this->Cell(0,8,'Candidature pour un poste de',0,1,'C');
	$this->SetFont($police,'B',$taille_t);
	$this->Cell(0,8,$titre,0,1);
	$this->Cell(0,3,'',0,1,'C');
	$this->SetFont($police,'I',$taille_ss_t);
	$this->MultiCell(0,5,utf8_decode($objectif));
	
	$this->setY($save_y);
	$this->SetLeftMargin(10);
	$this->Ln($espaces_g);
}



function AjouterRu($rub, $espaces_g, $taille_b, $colband, $coltxtband, $colbrdband, $coltexte, $police) // faire un héritage ou un trait... à voir demain !!!
{
	// déterminer l'icone à afficher
	$icones = array(
		"EXPERIENCE PROFESSIONNELLE" => "ressources/png/experiences.png",
		"FORMATION" => "ressources/png/formation.png",
		"INFORMATIONS COMPLEMENTAIRES" => "ressources/png/infos.jpg"
	);
		
	$this->Ln($espaces_g);
	$this->Image($icones[$rub],null,null,10);
	
	$this->setY($this->getY()-7);
	$this->setX($this->getX()+11);
	
	
	$this->SetFont($police,'B',$taille_b);
	$this->SetTextColor($coltxtband[0],$coltxtband[1],$coltxtband[2]);
	// $this->SetFillColor($colband[0],$colband[1],$colband[2]);
	// $this->SetDrawColor($colbrdband[0],$colbrdband[1],$colbrdband[2]);
	$this->SetFillColor($colband[0],$colband[1],$colband[2]);
	$this->SetDrawColor(255,255,255);
		
	$this->Cell(0,10,$rub,1,1,'',true);
	$this->SetFillColor($colbrdband[0],$colbrdband[1],$colbrdband[2]);
	$this->Cell(0,1,'',1,1,'',true);
	// Saut de ligne
	$this->Ln(1);
	$this->SetTextColor($coltexte[0],$coltexte[1],$coltexte[2]);
	
	$this->setX($this->getX()-14);
	// $this->setY($this->getY()+10);
}

function AjouterItem($quand, $quoi, $ou, $taille_t, $police)
{
	$this->Ln(4);
	$this->SetFont($police,'',$taille_t);
	$this->Cell(85,8,$quand,0,0);
	$this->SetFont($police,'B',$taille_t);
	$this->Cell(0,8,$quoi,0,1);
	$this->SetFont($police,'',$taille_t);
	$this->Cell(85,8,'',0,0);
	$this->Cell(0,8,$ou,0,1);
}

}







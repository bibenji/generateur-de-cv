<?php

	$tailles_px = array( // échelle de tailles
		'70%' => 10,
		'75%' => 11,
		"80%" => 12,
		"85%" => 13,
		"90%" => 14,
		"95%" => 15,
		"100%" => 16,
		"105%" => 17,
		"110%" => 18,
		"115%" => 19,
		"120%" => 20,
		"125%" => 21,
		"130%" => 22
		);
	
	$tailles = array( // tailles de base
		// "coordos" => 18,
		// "titre" => 32,
		// "sstitre" => 16,
		// "bandeaux" => 18,
		// à rajouter pour modifier les tailles respectives de chaque elem
		"texte" => 16
		);
		
	$codes_couleur = array(
		"Black" => '0,0,0',
		"White" => '255,255,255',
		"2574A9" => '37,116,169',
		"6C7A89" => '108,122,137',
		"F9BF3B" => '249,191,59',
		"D35400" => '211,84,0',
		"D64541" => '214,69,65',
		"CF000F" => '207,0,15',
		"049372" => '4,147,114',
		"663399" => '102,51,153'
		);
	
	$colors = array( // couleurs de base
		"texte" => array(0,0,0),
		"titre" => array(0,0,0),
		"soustitre" => array(0,0,0),
		"bandeau" => array(0,0,0),
		"fondbandeau" => array(255,255,255),
		"bordurebandeau" => array(0,0,0)		
		);
	
	$polices = array( // polices définies
		"Arial" => "Arial",
		"Cursive" => "comic",
		"Courier" => "Courier",
		"Georgia" => "Georgia",		
		"Impact" => "impact",
		"Tahoma" => "Tahoma",
		"Times" => "Times",
		"Trebuchet" => "Trebuchet",
		"Verdana" => "Verdana"
		);
	
	$lespolices = array( // polices de base
		"titre" => "Arial",
		"textcv" => "Arial",
		"bandeau" => "Arial"
	);
	
	$espaces_pdf = array( // mise à l'échelle des espaces_cv
		"10pt" => 4.5,
		"12pt" => 5,
		"14pt" => 5.5,
		"16pt" => 6,
		"18pt" => 6.5,
		"20pt" => 7,
		"22pt" => 7.5,
		"24pt" => 8,
		"26pt" => 8.5,
		"28pt" => 9,
		"30pt" => 9.5
	);
	
	/* valeurs de base pour le modèle 1 */
	if ($_POST['_modeleCV'] == "cv_type1")
	{
		$colors['fondbandeau'] = array(0,0,0);
		$colors['bandeau'] = array(255,255,255);
	}
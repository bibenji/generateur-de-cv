<?php
session_start();
// var_dump($_SESSION);

// initialiser ici les $_SESSION si ils n'existent pas...

?>

<!DOCTYPE html>
<html>
<head>
<title>CURRICULUM vite fait - Le générateur de CVs</title>
<meta charset="UTF-8">
	
	<link rel="stylesheet" href="stylesheets/styles.css" />	

	<!--
	<link href="/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<link href="/stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
	-->
	
	<!--[if IE]>
		<link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<![endif]-->


<script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
	<!--
	<div id="img-help">
	<img src="ecrire.png" /><br /><img src="disposer.png" /><br /><img src="generer.png" /><br /><img src="help.png" />
	</div>
	<img src="crayons.png" id="img-crayons" /><img src="mug.png" id="img-mug" /><img src="smartphone2.png" id="img-smartphone" />
	<img src="glasses1.png" id="img-glasses" />-->
	<div id="manuel">		
		<div id="texte-manuel">
		<img class="affmanuel" src="images/close.png" />
		<h1>Bienvenue sur Curriculum Vite Fait !</h1>
		<p>Ici, vous pouvez réaliser un CV en moins de cinq minutes !</p>
		<p>Pour cela, cliquez sur le texte. Vous aurez alors la possibilité de modifier les différents champs qui vont composer votre nouveau CV !</p>
		<p>Vous pouvez facilement rajouter des expériences, des formations ou des informations complémentaires à l'aide du menu situé sur votre droite (onglet réglages).</p>
		<p>Vous avez également la possibilité (onglet disposition) de sélectionner différents modèles de CV ainsi que de paramétrer la mise en page de votre CV.</p>
		<p>Les champs qui ne sont pas correctement remplis s'affichent en rouge. Cette indication disparaît dès lors que votre saisie est correcte !</p>
		<p>Lorsque vous avez terminé, le petit icône situé en haut à droite de votre CV vous permet d'en télécharger une version au format PDF...</p>
		<p>Plus besoin de savoir utiliser un traitement de texte, créer un CV n'a jamais été aussi facile!</p>
		<span class="affmanuel">Reprendre la création du CV</span>
		</div>
	</div>
	
	<form method="post" action="moncv.php" id="main-form" target="_blank">
	
	<div id="main">
	
	<div id="top">
	<img src="images/logo-cvf.png" />
	<!--<h1>Curriculum Vite Fait - Saisie du CV</h1>-->
	</div>
	
	
			
	<div id="gauche">
	<div id="lesronds"><span class="rd-rose"></span><span class="rd-bleu"></span><span class="rd-noir"></div>
	<div id="reset"><img src="images/reset2.png" /></div>
	<div id="download"><img src="images/download2.png" /></div>
	
	<div id="lecv" class="cv_type0">
	<div id="ide">
		<span id="ide-nom" class=''><?php echo ((isset($_SESSION['data']['ide']['nom'])) ? $_SESSION['data']['ide']['nom'] : 'NOM'); ?></span><input type="hidden" id="inp-ide-nom" name="ide-nom" value="" />
		<span id="ide-pre" class=''><?php echo ((isset($_SESSION['data']['ide']['pre'])) ? $_SESSION['data']['ide']['pre'] : 'Prénom'); ?></span><input type="hidden" id="inp-ide-pre" name="ide-pre" /><br />
		<span id="ide-adr"><?php echo ((isset($_SESSION['data']['ide']['adr'])) ? $_SESSION['data']['ide']['adr'] : 'Adresse'); ?></span><input type="hidden" id="inp-ide-adr" name="ide-adr" /><br />
		<span id="ide-cod"><?php echo ((isset($_SESSION['data']['ide']['cod'])) ? $_SESSION['data']['ide']['cod'] : '00000'); ?></span><input type="hidden" id="inp-ide-cod" name="ide-cod" />  
		<span id="ide-vil"><?php echo ((isset($_SESSION['data']['ide']['vil'])) ? $_SESSION['data']['ide']['vil'] : 'VILLE'); ?></span><input type="hidden" id="inp-ide-vil" name="ide-vil" /><br />
		<span id="ide-tel"><?php echo ((isset($_SESSION['data']['ide']['tel'])) ? $_SESSION['data']['ide']['tel'] : '00 00 00 00 00'); ?></span><input type="hidden" id="inp-ide-tel" name="ide-tel" /><br />
		<span id="ide-mai"><?php echo ((isset($_SESSION['data']['ide']['mai'])) ? $_SESSION['data']['ide']['mai'] : 'adresse@adresse.xx'); ?></span><input type="hidden" id="inp_ide_mai" name="ide-mai" /><br />
		Né(e) le : <span id="ide-nai"><?php echo ((isset($_SESSION['data']['ide']['nai'])) ? $_SESSION['data']['ide']['nai'] : '00/00/0000'); ?></span><input type="hidden" id="inp_ide_nai" name="ide-nai" /><br />
	</div>
	
	<div id="titetsous">
	<div id="tit">
		<span id="tit-tit"><?php echo ((isset($_SESSION['data']['tit']['tit'])) ? $_SESSION['data']['tit']['tit'] : 'Titre du CV'); ?></span><input type="hidden" id="inp-tit-tit" name="tit-tit" />	
	</div>
	
	<div id="obj">
		Objectif : Trouver un <select id="obj-obj" name="obj-obj">
			<option>Emploi</option>
			<option<?php if (isset($_SESSION['data']['obj']['obj']) AND $_SESSION['data']['obj']['obj'] == 'Stage') echo ' selected="selected"'; ?>>Stage</option>
		</select>
	</div>
	</div>
		
	<div id="exp">
	<h3><img src="images/experiences.png" /> Expériences professionnelles</h3>
	<?php
		$nb_xp = 0;
		if (isset($_SESSION['data']['exp'][0])) {
			foreach ($_SESSION['data']['exp'] as $xp) {
				?>
					<table><tr>
						<td class="col1"><mark onclick="suppr(this);">X</mark></td>
						<td class="col2"><span id="exp-ddb-<?php echo $nb_xp; ?>" class="cl-ddb" contenteditable="true"><?php echo $xp['ddb']; ?></span><input name="exp-ddb-<?php echo $nb_xp; ?>" id="inp-exp-ddb-<?php echo $nb_xp; ?>" type="hidden"> - <span id="exp-ddf-<?php echo $nb_xp; ?>" class="cl-ddf" contenteditable="true"><?php echo $xp['ddf']; ?></span><input name="exp-ddf-<?php echo $nb_xp; ?>" id="inp-exp-ddf-<?php echo $nb_xp; ?>" type="hidden"></td>
						<td class="col3"><span id="exp-int-<?php echo $nb_xp; ?>" class="cl-int" contenteditable="true"><?php echo $xp['int']; ?></span><input name="exp-int-<?php echo $nb_xp; ?>" id="inp-exp-int-<?php echo $nb_xp; ?>" type="hidden"></td>
					</tr><tr>
						<td class="col1"></td>
						<td class="col2"></td>
						<td class="col3"><span id="exp-str-<?php echo $nb_xp; ?>" class="cl-str" contenteditable="true"><?php echo $xp['str']; ?></span><input name="exp-str-<?php echo $nb_xp; ?>" id="inp-exp-str-<?php echo $nb_xp; ?>" type="hidden">, <span id="exp-vil-<?php echo $nb_xp; ?>" class="cl-vil" contenteditable="true"><?php echo $xp['vil']; ?></span><input name="exp-vil-<?php echo $nb_xp; ?>" id="inp-exp-vil-<?php echo $nb_xp; ?>" type="hidden"> (<span id="exp-cod-0" class="cl-cod" contenteditable="true"><?php echo $xp['cod']; ?></span><input name="exp-cod-<?php echo $nb_xp; ?>" id="inp-exp-cod-<?php echo $nb_xp; ?>" type="hidden">)</td>
					</tr></table>				
				<?php
				$nb_xp++;
			}
		}
		
	?>
	<input type="hidden" id="compte_xp" value="<?php echo $nb_xp; ?>" />
	</div>
	
	
	
	
	<div id="for">
	<h3><img src="images/formation.png" /> Formation</h3>
	</div>
	
	<div id="inf">
	<h3><img src="images/infos.jpg" /> Informations complémentaires</h3>	
	</div>
	
	</div>
	
	
	
	
	
	</div>

	
	</div>
	
	<div id="droite">
	
	<div id="onglets">
	<div id="haut-lesreglages"><!-- > -->Réglages</div>
	<div id="haut-disposition"><!-- > -->Disposition</div>
	</div>
	
	<div id="cols-droite">
	
	<div id="lesreglages">
	<div id="lesreglages-content" class="droite-content">
	
	<!--
	<div class="one-reglage">
	<p>
	Quelles parties souhaitez-vous intégrer à votre CV ?
	<ul>				
		<li><input type="checkbox" checked="checked" id="check_obj" class="to_check" /><label for="check_obj"> Objectif</label></li>		
		<li><input type="checkbox" checked="checked" id="check_exp" class="to_check" /><label for="check_exp"> Expériences professionnelles</label></li>
		<li><input type="checkbox" checked="checked" id="check_for" class="to_check" /><label for="check_for"> Formation</label></li>
		<li><input type="checkbox" checked="checked" id="check_inf" class="to_check" /><label for="check_inf"> Informations complémentaires</label></li>
		<li><input type="checkbox" disabled="disabled" /> Qualités (LM) (à venir)</li>
	</ul>
	</p>
	</div>
	-->
	
	<div class="one-reglage">
	<p>
	1) Editez votre CV<br /><br />
	Commencez à éditer de suite votre nouveau CV en le modifiant directement dans la partie de gauche comme vous le feriez dans un logiciel de traitement de texte normal.
	</p>
	</div>
	
	<div class="one-reglage">
	<p>
	2) Ajoutez des éléments à votre CV<br /><br />
		<span id="exp-but-more" class="but-more"><img src="images/plus.png" />Expérience</span>
		<span id="for-but-more" class="but-more"><img src="images/plus.png" />Formation</span>
		<span id="inf-but-more" class="but-more"><img src="images/plus.png" />Information</span>
		<!--<span class="but-more"><img src="plus.png" />Générer</span>-->
		<div class="one-clear"></div>
	</p>
	</div>
	
	<div class="one-reglage">
	<p>3) Choisissez un modèle de CV dans l'onglet disposition</p>
	</div>
	
	
	<div class="one-reglage">
	<p>4) Générez votre CV</p>
	<span id="genlecv">Générer le CV</span>
	</div>
	
	<div class="one-reglage">
		<div class="module-affmanuel">
			<!--<span><img class="affmanuel" src="images/manual.png" /></span>-->
			<p class="affmanuel">Perdu ? Consultez le mode d'emploi !</p>		
		</div>
	</div>
	
	</div>
	</div>
	
	<div id="ladisposition">
	<div id="disposition-content" class="droite-content">
	<p>Choisir un modèle de CV :</p>
	<ul>
		<li>Modèle de CV<br />
			<div class="bloc-select">
			<select id="sel-modcv-#lecv-className" name="_modeleCV" class="testselectstyle">
				<option value="cv_type0">-</option>
				<option value="cv_type1">Modèle 1</option>
				<option value="cv_type2">Modèle 2</option>
				<option value="cv_type3">Modèle 3</option>
			</select>
			</div>
		</li>
		<!--
		<li>Sous-modèle<br />
			<select>
				<option>-</option>
			</select>
		</li>
		-->
	</ul>
	<p>Réglages spécifiques :</p>
	<ul>
		<li>Espacement du CV<br />
			<select id="sel-espcv-#lecv-style.lineHeight" name="_espacesCV">
				<option value="16pt">-</option>
				<?php for($i = 10; $i < 31; $i += 2) { ?>
				<option value="<?php echo $i; ?>pt"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</li>
		<li>Taille de police<br />
			<select id="sel-taicv-#lecv-style.fontSize" name="_tailleTexte">
				<option value="100%">-</option>
				<?php for($i = 70; $i < 131; $i += 5) { ?>
				<option value="<?php echo $i; ?>%"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</li>
		<li>Bordures du CV<br />
			<select id="sel-borcv-#lecv-style.border" name="_bordureCV">
				<option value="white solid 1px">-</option>
				<option value="black solid 1px">Oui</option>
			</select>
		</li>
	</ul>
	</div>
	</div>
	
	</div>
	</div>
	</form>
	
	<script>var sid = "<?php echo session_id(); ?>";</script>
	<script type="text/javascript" src="js/mainjs.js"></script>
	<script type="text/javascript" src="js/jqueryjs.js"></script>
	
</body>
</html>

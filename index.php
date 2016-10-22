<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	
	<link rel="stylesheet" href="stylesheets/styles.css" />	

	<link href="/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<link href="/stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
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
	<div id="download"><img src="images/download2.png" /></div>
	
	<div id="lecv" class="cv_type0">
	<div id="ide">
		<span id="ide-nom" class=''>NOM</span><input type="hidden" id="inp-ide-nom" name="ide-nom" /> 
		<span id="ide-pre" class=''>Prénom</span><input type="hidden" id="inp-ide-pre" name="ide-pre" /><br />
		<span id="ide-adr">Adresse</span><input type="hidden" id="inp-ide-adr" name="ide-adr" /><br />
		<span id="ide-cod">75001</span><input type="hidden" id="inp-ide-cod" name="ide-cod" />  
		<span id="ide-vil">PARIS</span><input type="hidden" id="inp-ide-vil" name="ide-vil" /><br />
		<span id="ide-tel">06 00 00 00 00</span><input type="hidden" id="inp-ide-tel" name="ide-tel" /><br />
		<span id="ide-mai">john.doe@gmail.com</span><input type="hidden" id="inp_ide_mai" name="ide-mai" /><br />
		<span id="ide-nai">26/03/1987</span><input type="hidden" id="inp_ide_nai" name="ide-nai" /><br />
	</div>
	
	<div id="titetsous">
	<div id="tit">
		<span id="tit-tit">Titre du CV</span><input type="hidden" id="inp-tit-tit" name="tit-tit" />	
	</div>
	
	<div id="obj">
		Objectif : Trouver un <select id="obj-obj" name="obj-obj"><option>Emploi</option><option>Stage</option></select>
	</div>
	</div>
	
	
	<div id="exp">
	<h3><img src="images/experiences.png" /> Expériences professionnelles</h3>
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
	
	<div class="one-reglage">
	<p>
	Quelles parties souhaitez-vous intégrer à votre CV ?
	<ul>
		<li><input type="checkbox" /> Identité</li>
		<li><input type="checkbox" /> Titre</li>
		<li><input type="checkbox" /> Objectif</li>
		<li><input type="checkbox" /> Compétences</li>
		<li><input type="checkbox" /> Expériences professionnelles</li>
		<li><input type="checkbox" /> Formation</li>
		<li><input type="checkbox" /> Informations complémentaires</li>
		<li><input type="checkbox" /> Qualités (LM)</li>
	</ul>
	</p>
	</div>
	
	<div class="one-reglage">
	<p>
		Cliquez ici pour ajouter des éléments :<br /><br />
		<span id="exp-but-more" class="but-more"><img src="images/plus.png" />Expérience</span>
		<span id="for-but-more" class="but-more"><img src="images/plus.png" />Formation</span>
		<span id="inf-but-more" class="but-more"><img src="images/plus.png" />Information</span>
		<!--<span class="but-more"><img src="plus.png" />Générer</span>-->
		<div class="one-clear"></div>
	</p>
	</div>
	
	
	
	<div class="one-reglage">
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
		<li>Sous-modèle<br />
			<select>
				<option>-</option>
			</select>
		</li>
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
	
	<script type="text/javascript" src="js/mainjs.js"></script>
	<script type="text/javascript" src="js/jqueryjs.js"></script>
	
</body>
</html>

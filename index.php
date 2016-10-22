<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css" />
<link rel="stylesheet" href="css/styles-cv.css" />
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
	<div id="lesreglages-content">
	
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
	<div id="disposition-content">
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
			<select id="sel-borcv-#lecv-style.border">
				<option value="solid white 1px">-</option>
				<option value="solid black 1px">Oui</option>
			</select>
		</li>
	</ul>
	</div>
	</div>
	
	</div>
	</div>
	</form>
	
	<script type="text/javascript">
	
	// TABLEAU DES EXPRESSIONS REGULIERES
	var tabregs = {
		nom: '[A-Z]{2,}',
		pre: '[A-Z][a-z]{2,}',
		dat: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		adr: '[1-9][0-9]*\\s[a-z]*\\s[A-za-z]*',
		com: '.*',
		cod: '^\\d{5}$',
		vil: '[A-Z]{2,}',
		tel: '0\\d \\d{2} \\d{2} \\d{2} \\d{2}',
		mai: '.+@.+\\..+',
		nai: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		tit: '[A-Z].+',
		
		//ddb: this.dat,
		//ddf: this.dat,
		ddb : '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		ddf: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		int: '[A-Z].+', // ATTENTION !
		str: '[A-Z].+', 
		
		con: '[A-Z].+'
		};
		
	// fonction vérifiant la saisie en direct
	function verifSaisie(elem, val) {
		var unereg = tabregs[elem.id.substr(4,3)];
		if (unereg) {
			console.log(elem.className.substr(0,6));
			if(elem.className.substr(0,6) == 'cl-int') elem.className = 'cl-int ';
			else elem.className = '';
						
			var testreg = new RegExp(unereg);
			var resultat = testreg.test(val);
			if (!resultat) elem.className += 'error';
			
			
			
		}
	}
		
	
	
	// INITIALISE LES SPANS ET LE MODE DE SAISIE
	function forEvent(elem, valatstart) {
		elem.setAttribute('contenteditable', 'true');
		elem.addEventListener('keypress', function(event) {
			// console.log(event.charCode);
			if ((this.innerText == valatstart) && (event.charCode != 0)) { this.innerText = '';}
		});
		elem.addEventListener('keyup', function() {
			this.nextSibling.value = this.innerText;
			verifSaisie(this, this.innerText);
			if (this.nextSibling.value == '') { this.innerText = valatstart;}
		});
	}
	// INITIALISATION DES CHAMPS INITIAUX (ide, tit, obj)
	var lecv = document.getElementById('lecv');
	var lesspans = lecv.getElementsByTagName('span');
	var atstart = [];
	for (var i = 0, imax = lesspans.length; i < imax; i++) {
		atstart[i] = lesspans[i].innerText;		
		forEvent(lesspans[i], atstart[i]);
	}
	
	// FONCTION D'AJOUT DE FONCTION DE SUPPRESSION
	function addSuppr(elem) {
		elem.addEventListener('click', function() {
			var found = false;
			while (found == false) {
				elem = elem.parentNode;
				console.log(elem.nodeName);
				if (elem.nodeName == 'TABLE') {
					found = true;
					elem.parentNode.removeChild(elem);
				}
			}
		});
	}
	
	
	// INITIALISE LES BOUTONS D'AJOUT
	function addOneInf(cat, nb) {
		var newTable = document.createElement('table');
		var newTr = document.createElement('tr');
		var newTd = document.createElement('td');
		var newMark = document.createElement('mark');
		newMark.innerText = 'X';
		addSuppr(newMark);
		newTd.appendChild(newMark);
		newTd.className = 'col1';
		newTr.appendChild(newTd);
		newTd = document.createElement('td');
		var newSpan = document.createElement('span');
		newSpan.id = cat+'-int-'+nb;
		newSpan.innerText = 'Design';
		forEvent(newSpan, newSpan.innerText);
		newTd.appendChild(newSpan);
		var newInput = document.createElement('input');
		newInput.type = "hidden";
		newInput.name = cat+'-int-'+nb;
		newInput.id = 'inp-'+cat+'-int-'+nb;
		newTd.appendChild(newInput);
		newTd.appendChild(document.createTextNode(' : '));
		
		newSpan = document.createElement('span');
		newSpan.id = cat+'-con-'+nb;
		newSpan.innerText = 'Pas très très bon encore LOL !';
		forEvent(newSpan, newSpan.innerText);
		newTd.appendChild(newSpan);
		newInput = document.createElement('input');
		newInput.type = "hidden";
		newInput.name = cat+'-con-'+nb;
		newInput.id = 'inp-'+cat+'-con'+nb;
		newTd.appendChild(newInput);		
		
		newTr.appendChild(newTd);
		newTable.appendChild(newTr);
		document.getElementById(cat).appendChild(newTable);
		
		// <span id="inf-1-con">Pas très très bon encore LOL !</span><input type="text" id="inp-inf-1-con"></p>
	}
	function addOne(cat, nb) {
		var base = [
			['ddb', '01/01/2016'],
			['ddf', '31/12/2016'],
			['int', 'Intitulé'],
			['str', 'Structure'],
			['vil', 'VILLE'],
			['cod', '00000']];
		lesnewspans = [], lesnewinputs = [];
		for (i = 0, imax = base.length; i < imax; i++) {
			lesnewspans[i] = document.createElement('span');
			lesnewspans[i].id = cat+'-'+base[i][0]+'-'+nb;
			lesnewspans[i].className = 'cl-'+base[i][0];
			lesnewspans[i].innerHTML = base[i][1];
			lesnewinputs[i] = document.createElement('input');
			lesnewinputs[i].type = 'hidden';
			lesnewinputs[i].name = cat+'-'+base[i][0]+'-'+nb;
			lesnewinputs[i].id = 'inp-'+cat+'-'+base[i][0]+'-'+nb;
			forEvent(lesnewspans[i], lesnewspans[i].innerText);
		}
		var newTable = document.createElement('table');
		
		var newTr = document.createElement('tr');
		
		var newTd = document.createElement('td');
		newTd.className = 'col1';
		var newMark = document.createElement('mark');
		newMark.innerText = 'X';
		addSuppr(newMark);
		newTd.appendChild(newMark);
		newTr.appendChild(newTd);
		
		newTd = document.createElement('td');
		newTd.className = 'col2';
		newTd.appendChild(lesnewspans[0]);
		newTd.appendChild(lesnewinputs[0]);
		newTd.appendChild(document.createTextNode(' - '));
		newTd.appendChild(lesnewspans[1]);
		newTd.appendChild(lesnewinputs[1]);
		newTr.appendChild(newTd);
		
		newTd = document.createElement('td');
		newTd.className = 'col3';
		newTd.appendChild(lesnewspans[2]);
		newTd.appendChild(lesnewinputs[2]);
		newTr.appendChild(newTd);
		
		newTable.appendChild(newTr);
		
		newTr = document.createElement('tr');
		newTd = document.createElement('td');
		newTd.className = 'col1';
		newTr.appendChild(newTd);
		newTd = document.createElement('td');
		newTd.className = 'col2';
		newTr.appendChild(newTd);
		newTd = document.createElement('td');
		newTd.className = 'col3';
		newTd.appendChild(lesnewspans[3]);
		newTd.appendChild(lesnewinputs[3]);
		newTd.appendChild(document.createTextNode(', '));
		newTd.appendChild(lesnewspans[4]);
		newTd.appendChild(lesnewinputs[4]);
		newTd.appendChild(document.createTextNode(' ('));
		newTd.appendChild(lesnewspans[5]);
		newTd.appendChild(lesnewinputs[5]);
		newTd.appendChild(document.createTextNode(')'));
		newTr.appendChild(newTd);
		
		newTable.appendChild(newTr);
		document.getElementById(cat).appendChild(newTable);
	}
	
	var nb_xp = 0;
	var nb_for = 0;
	var nb_inf = 0;
	var add_exp = document.getElementById('exp-but-more');
	add_exp.addEventListener('click', function() {
			addOne('exp', nb_xp);
			nb_xp++;
		});
	var add_for = document.getElementById('for-but-more');
	add_for.addEventListener('click', function() {
			addOne('for', nb_for);
			nb_for++;
		});
	var add_inf = document.getElementById('inf-but-more');
	add_inf.addEventListener('click', function() {
			addOneInf('inf', nb_inf);
			nb_inf++;
		});
	
	

	// INITIALISE LES RONDS DE COULEUR	
	var lesronds = document.querySelectorAll("#lesronds span");
	// console.log(lesronds.length);
	for (var i = 0, imax = lesronds.length; i < imax; i++) {
		// console.log(lesronds[i]);
		lesronds[i].addEventListener('click', function() {
			var bg_ref = this.className.substr(3, this.className.length);
			document.body.style.backgroundImage = "url('images/"+bg_ref+".png')";
		});
	}
	
	// INITIALISE LE BOUTON DE DOWNLOAD
	var down = document.getElementById('download');
	down.addEventListener('click', function() {
			document.getElementById('main-form').submit();
	});
	// INITIALISE LE BOUTON GENLECV
	var genlecv = document.getElementById('genlecv');
	genlecv.addEventListener('click', function() {
			document.getElementById('main-form').submit();
	});

	// INITIALISE LES SELECTS DE DISPOSITION MISE EN PAGE
	var zone_cv = document.getElementById('gauche');
	var zone_dispo = document.getElementById('disposition-content');
	var lesselects = zone_dispo.getElementsByTagName('select');	
	for (var i = 0, imax = lesselects.length; i < imax; i++) {
		lesselects[i].selectedIndex = "0";
		lesselects[i].addEventListener('change', function() {
			var init_cible = this.id.split("-");
			var cibles = document.querySelectorAll(init_cible[2]);
			var prop = init_cible[3];
			for (var i = 0, imax = cibles.length; i < imax; i++) {
					
				// cibles[i].className = this.value;
				console.log(prop);
				eval('cibles['+i+'].'+prop+' = "'+this.value+'"');
			}
			
			
			
			
			
			// console.log('ça change' + cible);
			
		});
	}
	

		
/*
<span id="ide-pre">Prénom</span><input type="text" id="inp-ide-pre" /><br />
		<td width='50%' >01/01/2016 - 01/07/2017</td>
		<td>Chanteur de blues</td>
		<tr>
		<td></td>
		<td>CNAM, PARIS (75)</td>
	*/
	
		function leswitch(elem) {
				// console.log("test");
				var em_name = elem.id.substr(5, elem.id.length)+'_content'; // calcule le nom de l'em
				var style = window.getComputedStyle(eval(em_name)).getPropertyValue("z-index");
				// console.log(style);
				eval(em_name).style.zIndex = style+2;
		}
		
		var reglages = document.getElementById('haut-lesreglages');
		var lesreglages_content = document.getElementById('lesreglages');
		var disposition = document.getElementById('haut-disposition');
		var disposition_content = document.getElementById('ladisposition');
		
		disposition.addEventListener('click', function() {
			leswitch(this);
		});
		reglages.addEventListener('click', function() {
			leswitch(this);
		});
		

		
		
		
	</script>
	
	<!-- PARTIE jQUERY -->
	<script>
		$(function() {
			console.log( "ready!" );
		});

		$( ".affmanuel" ).click(function() {
			if($("#manuel").is(":hidden")) {
				$("#manuel").slideDown("slow", function() {
					//Anim complete.
					});
			} else {
				$( "#manuel" ).slideUp( "slow", function() {
				// Animation complete.
				});
			}
		});
	</script>
	
</body>
</html>
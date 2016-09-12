<?php
const OPTIONS_COULEUR = '<option value="Black">Noir</option>
						<option value="White">Blanc</option>
						<option value="4183D7">Bleu</option>
						<option value="6C7A89">Gris</option>
						<option value="F7CA18">Jaune</option>
						<option value="D35400">Orange</option>
						<option value="D2527F">Rose</option>
						<option value="CF000F">Rouge</option>
						<option value="019875">Vert</option>
						<option value="663399">Violet</option>';
						
const OPTIONS_POLICE = '<option value="Arial">Arial</option>
						<option value="Arial Black">Arial Black</option>
						<option value="Cursive">Comic Sans MS, Cursive</option>
						<option value="Courrier">Courrier, Palatino, Times New Roman</option>
						<!--<option>Gadget</option>-->
						<option>Georgia</option>
						<option>Helvetica</option>
						<option>Impact</option>
						<option>Lucida Sans Unicode</option>
						<option>Tahoma</option>
						<!--<option>Times</option>-->
						<option>Trebuchet MS</option>
						<option>Verdana</option>';

const OPTIONS_TAILLE = '<option value="xx-small">1</option>
						<option value="x-small">2</option>
						<option value="small">3</option>
						<option value="medium" selected="selected">4</option>
						<option value="large">5</option>
						<option value="x-large">6</option>
						<option value="xx-large">7</option>';

function policeSelect($name, $namejs, $ref_pdf)
{
	echo '<li>' . $name . '<br /><div class="styled-select"><select id="fontFamily_' . $namejs . '">' . OPTIONS_POLICE . '</select></div></li>';
	echo '<input type="hidden" id="hidden_fontFamily_' . $namejs . '" name="hidden_' . $ref_pdf . '" />';
}

function tailleSelect($name, $namejs, $ref_pdf)
{
	echo '<li>' . $name . '<br /><div class="styled-select"><select id="fontSize_' . $namejs . '">' . OPTIONS_TAILLE . '</select></div></li>';
	echo '<input type="hidden" id="hidden_fontSize_' . $namejs . '" name="hidden_' . $ref_pdf . '" />';
}

function textColor($name, $namejs, $ref_pdf) {
	echo '<li>' . $name . '<br /><div class="styled-select"><select id="color_' . $namejs . '">' . OPTIONS_COULEUR . '</select></div></li>';
	echo '<input type="hidden" id="hidden_color_' . $namejs . '" name="hidden_' . $ref_pdf . '" />';
}

function fondColor($name, $namejs, $ref_pdf) {
	echo '<li>' . $name . '<br /><div class="styled-select"><select id="backgroundColor_' . $namejs . '">' . OPTIONS_COULEUR . '</select></div></li>';
	echo '<input type="hidden" id="hidden_backgroundColor_' . $namejs . '" name="hidden_' . $ref_pdf . '" />';
}

function borderColor($name, $namejs, $ref_pdf) {
	echo '<li>' . $name . '<br /><div class="styled-select"><select id="borderColor_' . $namejs . '">' . OPTIONS_COULEUR . '</select></div></li>';
	echo '<input type="hidden" id="hidden_borderColor_' . $namejs . '" name="hidden_' . $ref_pdf . '" />';
}

?>
	
	<form action="new_pdf.php" method="post" target="_blank" />
	<!--<form action="tests/hidden_post.php" method="post" target="_blank" />-->
	<ul class="menu_modifs">
		
		<li>Modèle de CV<br /><div class="styled-select"><select id="modeleCV"><option value="cv_type1">Modèle 1</option><option value="cv_type2">Modèle 2</option><option value="cv_type3">Modèle 3</option></select></div></li>
		<input type="hidden" id="hidden_modeleCV" name="hidden_modeleCV" />
		
		<?php policeSelect("Police", "#lecv", "policeTextCV"); ?>
		<?php textColor("Couleur du texte", "#lecv", "colorTexte"); ?>
		<?php tailleSelect("Taille générale du texte", "#lecv", "tailleTexte"); ?>
		
		<?php tailleSelect("Taille coordonnées", "#ide", "tailleCoordos"); ?>
				
		<?php policeSelect("Police du titre", "#tit", "policeTitre"); ?>
		<?php textColor("Couleur du titre", "#tit", "colorTitre"); ?>
		<?php borderColor("Couleur des bordures du titre", "#tit", "borduresTitre"); ?>
		<?php tailleSelect("Taille du titre", "#tit", "tailleTitre"); ?>
		
		
		<?php policeSelect("Police des bandeaux", ".bandeau", "policeBandeau"); ?>
		<?php textColor("Couleur du texte des bandeaux", ".bandeau", "colorBandeau"); ?>
		<?php fondColor("Couleur des bandeaux", ".bandeau", "colorFondBandeau"); ?>
		<?php borderColor("Couleur des bordures des bandeaux", ".bandeau", "colorBordureBandeau"); ?>
		<?php tailleSelect("Taille des bandeaux", ".bandeau", "tailleBandeau"); ?>
	
	<input type="submit" value="Générer le CV" class="btn-gen"/>
	</form>
	
		
		
		<!--
		<li>Longueur du titre</li>
		
		
		<li>Style de titre</li>
				
		<li>Police du titre</li>
		
		<li>Couleur des bandeaux<br>
			<select id="couleur_bandeaux">
				<option>None</option>
				<option>Yellow</option>
				<option>Green</option>
			</select>
		</li>
		
		<li>Couleur du texte des bandeaux</li>
		
		
		
		
		<li>Epaisseur des bandeaux</li>
			<select id="epaisseur_bandeaux">
				<option>0</option>
				<option>5</option>
				<option>10</option>
			</select>
			
		
		
		<li>Mise en page des colonnes</li>
		<li>Afficher les durées des expériences</li>
		<li>Supprimer une ligne, une expérience, une formation (ne pas la faire apparaître)</li>
		<li>...</li>
		-->
	
	</ul>
	
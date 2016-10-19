<?php
const OPTIONS_COULEUR = '<option value="Black">Noir</option>
						<option value="White">Blanc</option>
						<option value="2574A9">Bleu</option>
						<option value="6C7A89">Gris</option>
						<option value="F9BF3B">Jaune</option>
						<option value="D35400">Orange</option>
						<option value="D64541">Rose</option>
						<option value="CF000F">Rouge</option>
						<option value="049372">Vert</option>
						<option value="663399">Violet</option>';
						
const OPTIONS_POLICE = '<option value="Arial">Arial, Helvetica</option>
						<option value="Cursive">Comic Sans MS, Cursive</option>
						<option>Courier</option>
						<option>Georgia *</option>
						<option>Impact</option>						
						<option>Tahoma *</option>
						<option>Times</option>						
						<option>Trebuchet MS *</option>
						<option>Verdana *</option>';

const OPTIONS_TAILLE = '<option value="70%">1</option>
						<option value="80%">2</option>
						<option value="90%">3</option>
						<option value="100%" selected="selected">4</option>
						<option value="110%">5</option>
						<option value="120%">6</option>
						<option value="130%">7</option>';
						
const OPTIONS_ALIGN = '<option value="" selected="selected"> </option>
						<option value="left">Gauche</option>
						<option value="center">Centré</option>
						<option value="right">Droite</option>';

function policeSelect($name, $namejs, $ref_pdf)
{
	echo '<li>' . $name . '<br /><div class="styled-select"><select id="fontFamily_' . $namejs . '">' . OPTIONS_POLICE . '</select></div></li>';
	echo '<input type="hidden" id="hidden_fontFamily_' . $namejs . '" name="hidden_' . $ref_pdf . '" value="Arial" />';
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
	
	<form action="moncv.php" method="post" target="_blank" id="leform" />	
	<ul class="menu_modifs">
		
		<li>Modèle de CV<br /><div class="styled-select"><select id="modeleCV"><option value="cv_type1">Modèle 1</option><option value="cv_type2">Modèle 2</option><option value="cv_type3">Modèle 3</option></select></div></li>
		<input type="hidden" id="hidden_modeleCV" name="hidden_modeleCV" value="cv_type1" />
		<hr />
		<li>Taille des espaces du CV<br /><div class="styled-select"><select id="marginTop_.bandeau">
				<option value="0">0</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="15" selected="selected">15</option>
				<option value="20">20</option>
				<option value="25">25</option>
				<option value="30">30</option>				
				</select></div></li>
		<input type="hidden" id="hidden_marginTop_.bandeau" name="hidden_espacesCV" value="6" />
		<hr />
		<?php policeSelect("Police", "#lecv", "policeTextCV"); ?>
		<?php textColor("Couleur du texte", ".alltxt", "colorTexte"); ?>
		<?php tailleSelect("Taille générale du texte", ".alltxt", "tailleTexte"); ?>
		<hr />
		<?php tailleSelect("Taille coordonnées", "#ide", "tailleCoordos"); ?>
		<hr />		
		<?php policeSelect("Police du titre et du sous-titre", "#tit_sstit", "policeTitre"); ?>
		<?php textColor("Couleur du titre", "#tit", "colorTitre"); ?>
		<?php borderColor("Couleur des bordures du titre", "#tit", "borduresTitre"); ?>
		<?php tailleSelect("Taille du titre", "#tit", "tailleTitre"); ?>
		<hr />
		<?php textColor("Couleur du sous-titre", "#soustit", "colorSousTitre"); ?>
		<?php tailleSelect("Taille du sous-titre", "#soustit", "tailleSousTitre"); ?>
		<hr />
		<?php policeSelect("Police des bandeaux", ".bandeau", "policeBandeau"); ?>
		<?php textColor("Couleur du texte des bandeaux", ".bandeau", "colorBandeau"); ?>
		<?php fondColor("Couleur des bandeaux", ".bandeau", "colorFondBandeau"); ?>
		<?php borderColor("Couleur des bordures des bandeaux", ".bandeau", "colorBordureBandeau"); ?>
		<?php tailleSelect("Taille des bandeaux", ".bandeau", "tailleBandeau"); ?>
		<hr />
	<input type="submit" value="Générer le CV" class="btn-gen"/>
	</form>
		
	</ul>
	
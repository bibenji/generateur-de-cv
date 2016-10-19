	<nav class="top_navigation">
		<ul>
			
			
			<li><a href="index.php" class="
			<?php echo $class = (strpos($_SERVER['REQUEST_URI'], "index")) ? 'nav-active' : 'nav-inactive'; ?>
			"><img src="ressources\png\ecrire.png" /><br />Saisie du CV</a></li>
			
			<?php if (strpos($_SERVER['REQUEST_URI'], "index")) { ?>
			<li class="nav-inactive" id="linkgenerer"><img src="ressources\png\disposer.png" /><br />Disposition</li>
			<?php } else { ?>
			<li class="nav-active"><img src="ressources\png\disposer.png" /><br />Disposition</li>
			<?php } ?>
			
			<?php if (strpos($_SERVER['REQUEST_URI'], "disposition")) { ?>
			<li class="nav-inactive" id="linkgenererpdf"><img src="ressources\png\generer.png" /><br />Génération CV</li>
			<?php } else { ?>
			<li class="nav-inactive"><img src="ressources\png\generer-w.png" /><br />Génération CV</li>
			<?php } ?>
			
			<li class="nav-inactive"><img src="ressources\png\genlm-w.png" /><br />Génération LM</li>
		</ul>
		
	</nav>
	
	<div class="to_clear"></div>
	
	
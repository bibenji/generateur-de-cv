	<nav class="top_navigation">
		<ul>
						
			<li><a href="index.php"><img src="ressources\png\ecrire.png" /><br />Saisie du CV</a></li>
			
			<?php if (strpos($_SERVER['REQUEST_URI'], "index")) { ?>
			<li><a href="" id="linkgenerer"><img src="ressources\png\disposer.png" /><br />Disposition</a></li>
			<?php } else { ?>
			<li><img src="ressources\png\disposer-w.png" /><br />Disposition</li>
			<?php } ?>
			
			<?php if (strpos($_SERVER['REQUEST_URI'], "testsphp")) { ?>
			<li><a href="" id="linkgenererpdf"><img src="ressources\png\generer.png" /><br />Génération CV</a></li>
			<?php } else { ?>
			<li><a href=""><img src="ressources\png\generer-w.png" /><br />Génération CV</a></li>
			<?php } ?>
			
			<li><a href=""><img src="ressources\png\genlm.png" /><br />Génération LM</a></li>
		</ul>
		
	</nav>
	
	<div class="to_clear"></div>
	
	
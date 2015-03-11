<h1>Actualités</h1>
<br/>
<br/>


        <?php foreach ($contenu_actualites as $contenu_actualite): ?>
		
			<div class="une-actu">
				<h3><?php echo $contenu_actualite->getFrTitre() ?></h3>
				<p><?php echo $contenu_actualite->getRawValue()->getFrResumeHtml() ?></p>
				<p class="suite"><a href="<?php echo url_for('actualite/view?id_actualite=' . $contenu_actualite->getIdActualite()) ?>">Voir la suite</a></p>
			</div>	
			<br class="clear"/>
		<div class="spacer shadow-actu"></div>
        <?php endforeach; ?>
	
		

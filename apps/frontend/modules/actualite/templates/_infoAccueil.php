<?php if ($actualite != null): ?>
<div class="two-thirds column">
	<div class="actualite remove-bottom">
		<h2><?php echo $actualite['fr_titre'] ?></h2>
		<?php echo $actualite->getCheminPhotoActualite(ESC_RAW) ?>
		<h3><?php echo $actualite['fr_resume_html'] ?></h3>
		
		<p class="suite" ><a href="<?php echo url_for('actualite/view?id_actualite='.$actualite->getIdActualite()) ?>">Lire la suite</a></p>
		<br class="clear"/>
		
	</div>
	<p class="voir-tout" ><a href="<?php echo url_for('actualite/index') ?>">Voir toutes les actus</a></p>
</div>
<?php endif; ?>

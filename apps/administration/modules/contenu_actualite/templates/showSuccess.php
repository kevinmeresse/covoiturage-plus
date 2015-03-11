<div class="front-view-actu">

<h1><?php echo $contenu_actualite->getFrTitre() ?></h1>
<br/>
<br/>
<div class="actu-chapo ten columns"><p><?php echo $contenu_actualite->getRawValue()->getFrResumeHtml() ?></p></div>
<div class="actu-contenu ten columns"><p class="remove-bottom"><?php echo $contenu_actualite->getRawValue()->getFrContenuHtml() ?></p></div>
<div id="actu-images"><h3>Images : </h3><?php echo $contenu_actualite->getCheminPhotoActualite(ESC_RAW) ?></div>

</div>
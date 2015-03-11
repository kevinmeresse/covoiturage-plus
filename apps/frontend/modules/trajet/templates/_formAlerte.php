<p>Vous désirez déposer une alerte pour le trajet : </p>
<form action="<?php echo url_for('alerte/create') ?>" method="post" >
    <?php echo $formAlerte->renderHiddenFields(false) ?>
    <?php echo $formAlerte->renderGlobalErrors() ?>
    <?php echo $formAlerte['mail_utilisateur']->renderError() ?>
    <?php echo $formAlerte['mail_utilisateur'] ?>
    <input type="submit" id="submit-alerte" value="valider"/>
</form>

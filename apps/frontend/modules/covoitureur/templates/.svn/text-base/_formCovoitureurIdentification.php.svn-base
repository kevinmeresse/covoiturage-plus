<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>


<h2>Espace personnel</h2>


<?php
echo jq_form_remote_tag(array(
    'update' => 'espacepersonnel',
    'url' => 'covoitureur/testIdent',
))
?>

<?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>  

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields(false) ?>


<p><?php echo $form['mail']->renderError() ?>
    <?php echo $form['mail'] ?>
</p>
<p><?php echo $form['mot_de_passe']->renderError() ?>
<?php echo $form['mot_de_passe'] ?>
</p>
<p class="motdepasseoublie"><a href="<?php echo url_for('covoitureur/formMdpOublie') ?>">Mot de passe ?</a></p>
<p class="submit"><input type="submit" value="OK"><br class="clear" /></p>


</form>

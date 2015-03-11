<?php use_stylesheets_for_form($addCcForm) ?>
<?php use_javascripts_for_form($addCcForm) ?>



<form action="<?php echo url_for('communaute_commune/addVille') ?>" method="post" >

<div id="communaute-ajout-form">
      <?php echo $addCcForm->renderGlobalErrors() ?>


        <?php echo $addCcForm['nom_ville']->renderLabel() ?>

          <?php echo $addCcForm['nom_ville']->renderError() ?>
          <?php
                    echo jq_input_auto_complete_tag(
                            'ville_fr[nom_ville]', '', url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>
	</div>				
	<br/>
          <?php echo $addCcForm->renderHiddenFields(false) ?>
            <input id="ville_fr_id_communaute" type="hidden" name="ville_fr[id_communaute]" value="<?php echo $id_cc ?>">
          <input type="submit" value="Ajout" />

</form>
<br class="clear"/>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('mail/createNewMailAction') ?>" method="post" >

<div id="mail-form">
  <table>
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['mail_subject']->renderLabel() ?></th>
        <td>
          <?php echo $form['mail_subject']->renderError() ?>
          <?php echo $form['mail_subject'] ?>
        </td>
      </tr>
      
      <tr>
        <th><?php echo $form['texte']->renderLabel() ?></th>
        <td>
          <?php echo $form['texte']->renderError() ?>
          <?php echo $form['texte'] ?>
        </td>
      </tr>
      
    </tbody>
  </table>
  </div>
  

          <?php echo $form->renderHiddenFields(false) ?>


          <input type="submit" value="Envoyer" />

	<br class="clear"/>	  
</form>
<br> <br>

<form action="<?php echo url_for('mail/createNewMailActionAnnul') ?>" method="post" >
    <input type="submit" value="Annuler" />
<?php echo $form->renderHiddenFields(false) ?>
<br class="clear"/>		  
</form>

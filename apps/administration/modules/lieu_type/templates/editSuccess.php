
<?php if($form->getDefault('evenement') == 0): ?>
    <h1>Edition du type de Lieu</h1>
<?php else: ?>
    <h1>Edition du  type d'évènement</h1>
<?php endif; ?>

<?php include_partial('form', array('form' => $form)) ?>

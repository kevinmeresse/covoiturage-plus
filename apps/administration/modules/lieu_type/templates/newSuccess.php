<?php if($form->getDefault('evenement') == 0): ?>
    <h1>Nouveau type de lieu</h1>
<?php else: ?>
    <h1>Nouveau type d'évènement</h1>
<?php endif; ?>

<?php include_partial('form', array('form' => $form)) ?>

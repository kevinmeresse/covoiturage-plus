<?php if(isset($message_erreur) && $message_erreur != ''):  ?>
    <div id="ident_mesg_erreur">
        <?php echo  $message_erreur?>
    </div>
<?php else: ?>
    <script type="text/javascript">
        $('#deposerTrajetsmall').show(300);
        $('#jeminscris').hide(300);
        $('#userIdentified').show(300);
        $('#userNotIdentified').hide(300);
    </script>
<?php endif; ?>

<?php include_component('covoitureur', 'covoitureurIdentification',array('form' => $form)) ?>

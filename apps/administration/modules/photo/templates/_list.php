<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="<?php echo url_for('photo/list') ?>" method="post" <?php print 'enctype="multipart/form-data" ' ?>>


    <table class="covoitureurs-photo liste">

        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <input id="photo_page" type="hidden" value="<?php echo $page ?>" name="photo[page]">

                    <input type="submit" value="Valider" />
                </td>
            </tr>
        </tfoot>

        <thead>
            <tr>
                <th>Covoitureur</th>
                <th>photo</th>
                <th>Etat global
                    <input id="photo_etat_general_1" type="radio" value="1" name="photo[etat_general]">
                    <label for="photo_etat_general_0">désactiver tous</label>
                    &nbsp;
                    <input id="photo_etat_general_2" type="radio" value="2" name="photo[etat_general]">
                    <label for="photo_etat_general_1">activer tous</label>
                </th>

                <th>Action 
                </th>
				


            </tr>
        </thead>


        <?php foreach ($covoitureurs as $i => $covoitureur): ?>
            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
                <td class="location">
                    <?php echo $covoitureur->getNom() ?>
                    &nbsp;
                    <?php echo $covoitureur->getPrenom() ?>
                    &nbsp;
                    (<?php echo $covoitureur->getMail() ?>)
                </td>
                <td><?php echo $covoitureur->getThumbnailPhotoCovoitureur(ESC_RAW) ?></td>
                <td>

                    <?php if ($covoitureur->getEtatPhoto() == 1): ?>  
                        <input id="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_1" type="radio" value="1" name="photo[id_<?php echo $covoitureur->getIdUtilisateur() ?>]" checked>
                        <label for="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_1">désactivée</label>
                        &nbsp;
                        <input id="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_2" type="radio" value="2" name="photo[id_<?php echo $covoitureur->getIdUtilisateur() ?>]">
                        <label for="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_2">activée</label>
                    <?php elseif ($covoitureur->getEtatPhoto() == 2): ?>

                        <input id="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_1" type="radio" value="1" name="photo[id_<?php echo $covoitureur->getIdUtilisateur() ?>]" >
                        <label for="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_1">désactivée</label>
                        &nbsp;
                        <input id="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_2" type="radio" value="2" name="photo[id_<?php echo $covoitureur->getIdUtilisateur() ?>]" checked>
                        <label for="photo_id_<?php echo $covoitureur->getIdUtilisateur() ?>_2">activée</label>
                    <?php endif; ?>

                </td>

                <td class="tab-center"><a href="<?php echo url_for('covoitureur/edit?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>"><?php echo $covoitureur->getIdUtilisateur() ?></a></td>

            </tr>

        <?php endforeach; ?>
    </table>
</form>

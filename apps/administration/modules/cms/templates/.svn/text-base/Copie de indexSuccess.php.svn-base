
<?php echo "NB RUBE :".$nb_rubrique ; ?><br>
<br/>Contenu<br/>
<table class="cms">
    <?php $menu_init = ''; //menu initial pourrupture sur menu ?>
    <?php $cmpt_menu = 0; //compteur de menu pour affichage des fleche de positionnment?>
    <?php foreach ($contenus as $contenu): ?>
        <?php if ($contenu->getContenuRubrique()->getFrTitre() != $menu_init): ?>
            <?php $cmpt = 1; ?>
            <?php $cmpt_menu++; ?>
            <tr> 
                <td colspan="6"></td>
            </tr>        
            <tr> 
                <td colspan="3">
                    <span class="expander" style="margin-left: -19px; padding-left: 19px"></span>
                    <span class="folder"> <?php echo $contenu->getContenuRubrique(); ?> </span>
                    
                    <?php if ($nb_rubrique != 1): ?>
                    <?php if ($cmpt_menu != 1): ?>
                        <a href="<?php echo url_for('cms/menuUp?id_rubrique=' . $contenu->getIdRubriqueParente() . '&priorite=' . $contenu->getContenuRubrique()->getPriorite()) ?> " class="lien-cms-up"></a>
                    <?php endif; ?>
                    <?php if ($cmpt_menu != $nb_rubrique): ?>
                        <a href="<?php echo url_for('cms/menuDown?id_rubrique=' . $contenu->getIdRubriqueParente() . '&priorite=' . $contenu->getContenuRubrique()->getPriorite()) ?> " class="lien-cms-down"></a>
                    <?php endif; ?>
                <?php endif; ?>

                </td>
                <td colspan="3"></td>
            </tr>
            <?php $menu_init = $contenu->getContenuRubrique()->getFrTitre(); ?>
                
        <?php endif; ?>
        <tr> 
            <td >&nbsp;</td>
            <td colspan="2">
                <span class="file"> <?php echo $contenu->getFrTitre(); ?> </span>
                <?php if ($tab_count[$contenu->getIdRubriqueParente()] != 1): ?>
                    <?php if ($cmpt != 1): ?>
                        <a href="<?php echo url_for('cms/pageUp?id_contenu=' . $contenu->getIdContenu() . '&id_rubrique=' . $contenu->getIdRubriqueParente() . '&priorite=' . $contenu->getPriorite()) ?> " class="lien-cms-up"></a>
                    <?php endif; ?>
                    <?php if ($cmpt != $tab_count[$contenu->getIdRubriqueParente()]): ?>
                        <a href="<?php echo url_for('cms/pageDown?id_contenu=' . $contenu->getIdContenu() . '&id_rubrique=' . $contenu->getIdRubriqueParente() . '&priorite=' . $contenu->getPriorite()) ?> " class="lien-cms-down"></a>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
            <td>
                
                <?php
                echo link_to('Visualiser', 'contenu/show?id_contenu=' . $contenu->getIdContenu(), array(
                    'class' => '',
                    'target' => '_blank'
                ))
                ?>
            </td>
            <td>
                <a href="<?php echo url_for('contenu/edit?id_contenu=' . $contenu->getIdContenu()) ?> " >Editer</a>
            </td>
            <td>
        <?php echo link_to('Supprimer', 'contenu/delete?id_contenu=' . $contenu->getIdContenu(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
            </td>
        </tr>
    <?php $cmpt++; ?>
<?php endforeach; ?>
</table>
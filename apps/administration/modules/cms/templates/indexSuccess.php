<h1>Gestion des pages et des menus</h1>

<h2>Gestion de l'arborescence</h2>



<div class="cms">
    <span class="folder"><a href="<?php echo url_for('contenu_rubrique/new') ?>">Nouveau menu</a></span>
    &nbsp;
    <span class="file"><a href="<?php echo url_for('contenu/new') ?>">Nouvelle page</a></span>
</div>

<table class="cms">
    <?php $menu_init = ''; //menu initial pourrupture sur menu ?>
    <?php $cmpt_menu = 0; //compteur de menu pour affichage des fleche de positionnment?>

    <?php foreach ($rubriques as $rubrique): ?>

        <?php if ($rubrique->getFrTitre() != $menu_init): ?>
            <?php $cmpt = 1; ?>
            <?php $cmpt_menu++; ?>

            <tr class="menu">
                <td colspan="6"></td>
            </tr>
            <tr class="menu">
                <td colspan="3">
                    <span class="expander" style="margin-left: -19px; padding-left: 19px"></span>
                    <span class="folder"> <?php echo $rubrique->getFrTitre(); ?> </span>


                    <?php if ($nb_rubrique != 1): ?>
                        <?php if ($cmpt_menu != 1): ?>
                            <a href="<?php echo url_for('cms/menuUp?id_rubrique=' . $rubrique->getIdRubrique() . '&priorite=' . $rubrique->getPriorite()) ?> " class="lien-cms-up"></a>
                        <?php endif; ?>
                        <?php if ($cmpt_menu != $nb_rubrique): ?>
                            <a href="<?php echo url_for('cms/menuDown?id_rubrique=' . $rubrique->getIdRubrique() . '&priorite=' . $rubrique->getPriorite()) ?> " class="lien-cms-down"></a>
                        <?php endif; ?>
                    <?php endif; ?>

                </td>
                <td colspan="3"  class="edit"><a href="<?php echo url_for('contenu_rubrique/edit?id_rubrique=' . $rubrique->getIdRubrique()) ?> " >Editer</a></td>
            </tr>
            <?php $menu_init = $rubrique->getFrTitre(); ?>

        <?php endif; ?>

        <?php if ($tab_count[$rubrique->getIdRubrique()] != 0): ?>

            <?php foreach ($rubrique->getContenu() as $contenu): ?>
                <tr class="page">


                    <td >&nbsp;</td>
                    <td colspan="2">
                        <span class="file"> <?php echo $contenu->getFrTitre(); ?> </span>
                        <?php if ($tab_count[$contenu->getIdRubriqueParente()] != 1 && $tab_count[$contenu->getIdRubriqueParente()] != 0): ?>
                            <?php if ($cmpt != 1): ?>
                                <a href="<?php echo url_for('cms/pageUp?id_contenu=' . $contenu->getIdContenu() . '&id_rubrique=' . $contenu->getIdRubriqueParente() . '&priorite=' . $contenu->getPriorite()) ?> " class="lien-cms-up"></a>
                            <?php endif; ?>
                            <?php if ($cmpt != $tab_count[$contenu->getIdRubriqueParente()]): ?>
                                <a href="<?php echo url_for('cms/pageDown?id_contenu=' . $contenu->getIdContenu() . '&id_rubrique=' . $contenu->getIdRubriqueParente() . '&priorite=' . $contenu->getPriorite()) ?> " class="lien-cms-down"></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td class="view">

                        <?php
                        echo link_to('Visualiser', 'contenu/visualisation?id_contenu=' . $contenu->getIdContenu(), array(
                            'popup' => array('Covoiturage Plus', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0')
                        ))
                        ?>
                    </td>
                    <td class="edit">
                        <a href="<?php echo url_for('contenu/edit?id_contenu=' . $contenu->getIdContenu()) ?> " >Editer</a>
                    </td>
                    <td class="suppr">
                <?php echo link_to('Supprimer', 'contenu/delete?id_contenu=' . $contenu->getIdContenu(), array('method' => 'delete', 'confirm' => 'Etes vous sür?')) ?>
                    </td>
                </tr>
                <?php $cmpt++; ?>
            <?php endforeach; ?>

        <?php endif; ?>

<?php endforeach; ?>
</table>
<br/>
<?php include_component('contenu', 'listeContenuNonLie') ?>
<br/>
<?php include_component('contenu_actualite', 'listeContenuActualite', array('ind_include' => $ind_include)) ?>

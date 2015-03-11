<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    public function setup() {
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
        $this->enablePlugins('sfEasyGMapPlugin');
        $this->enablePlugins('sfTCPDFPlugin');
        $this->enablePlugins('sfJqueryReloadedPlugin');
        $this->enablePlugins('sfImageTransformPlugin');
        $this->enablePlugins('sfCkPlugin');
        $this->enablePlugins('sfFormExtraPlugin');
        $this->enablePlugins('sfFeed2Plugin');
        $this->enablePlugins('sfPhpExcelPlugin');
        sfValidatorBase::setDefaultMessage('required', 'Champ obligatoire');
        sfValidatorBase::setDefaultMessage('invalid', 'Valeur non valide');
    }

}

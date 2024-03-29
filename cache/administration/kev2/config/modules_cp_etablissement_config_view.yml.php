<?php
// auto-generated by sfViewConfigHandler
// date: 2012/10/11 19:05:39
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'signinSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'autocompleteSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'statAccueilCsvSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'editSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'newSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'editFromRsSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'newFromRsSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'signinSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == 'login-layout' ? false : 'login-layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
}
else if ($templateName.$this->viewName == 'autocompleteSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == '' ? false : ''.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
}
else if ($templateName.$this->viewName == 'statAccueilCsvSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'application/msexcel', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
}
else if ($templateName.$this->viewName == 'editSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
  $response->addJavascript('http://maps.google.com/maps/api/js?sensor=false', '', array ());
  $response->addJavascript('jquery.ui.addresspicker.js', '', array ());
}
else if ($templateName.$this->viewName == 'newSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
  $response->addJavascript('http://maps.google.com/maps/api/js?sensor=false', '', array ());
  $response->addJavascript('jquery.ui.addresspicker.js', '', array ());
}
else if ($templateName.$this->viewName == 'editFromRsSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
  $response->addJavascript('http://maps.google.com/maps/api/js?sensor=false', '', array ());
  $response->addJavascript('jquery.ui.addresspicker.js', '', array ());
}
else if ($templateName.$this->viewName == 'newFromRsSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
  $response->addJavascript('http://maps.google.com/maps/api/js?sensor=false', '', array ());
  $response->addJavascript('jquery.ui.addresspicker.js', '', array ());
}
else
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main-bo.css', '', array ());
  $response->addStylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.3.custom.css', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('/sfCkPlugin/js/sfCkPlugin.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('/sfJqueryReloadedPlugin/js/plugins/jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('menu-horizontal.js', '', array ());
  $response->addJavascript('jquery.ui.datepicker-fr.js', '', array ());
  $response->addJavascript('back.js', '', array ());
}


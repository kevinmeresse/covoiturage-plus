<?php

require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeSignin($request)
  {
    $user = $this->getUser();
    
    if ($user->isAuthenticated() )
    {
      //if ($user->isAdmin() || ($user->getProfile()->getIdSite()== sfConfig::get('sf_id_site_client')))
        if ( $user->getIsSuperAdmin()==1 ||($user->getProfile()->getIdSite()== sfConfig::get('sf_id_site_client')))
      {
        return $this->redirect('@homepage');  
      }else {
          $user->signOut();
          $this->redirect('' != $signoutUrl ? $signoutUrl : '@homepage');
      }
        
    }

    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->form = new $class();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('signin'));
      if ($this->form->isValid())
      {
        $values = $this->form->getValues(); 
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);
        
        //test de la validité du user sur le site (le user doit etre associé au site ou superAdmin)
        //sinon il est déconnecté
        //if (!$this->getUser()->isAdmin() && ($this->getUser()->getProfile()->getIdSite()!= sfConfig::get('sf_id_site_client')))
        //$user = $this->getUser();
        if (($user->getGuardUser()->getIsSuperAdmin()!=1) && ($this->getUser()->getProfile()->getIdSite()!= sfConfig::get('sf_id_site_client')))
        {
          $this->getUser()->signOut();
          $this->redirect('' != $signoutUrl ? $signoutUrl : '@homepage');
        
         } 
        
        

        // always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage
        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));

        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
      }
    }
    else
    {
      if ($request->isXmlHttpRequest())
      {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);

        return sfView::NONE;
      }

      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }
  }
}

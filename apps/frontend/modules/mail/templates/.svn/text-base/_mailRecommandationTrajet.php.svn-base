<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Covoiturage</title>
    </head>
    <body bgcolor="#FFFFFF" style="font-family:Arial, Helvetica, sans-serif;font-size:11px">
        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td><img src="http://<?php echo $params["urlApplication"] ?>/images/mail_bandeau_haut.gif" /></td>
            </tr>
        </table>

        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial, Helvetica, sans-serif;font-size:11px">
            <tr>
                <td width="80">&nbsp;</td>
                <td height="40">&nbsp;</td>
                <td width="80">&nbsp;</td>
            </tr>
            <tr>
                <td width="80">&nbsp;</td>
                <td>
                    <p>
                        Bonjour,<br/>
                        <br/>
                        Lors de son passage sur le site de <?php echo sfConfig::get('sf_organization_name') ?>, <?php echo $params["senderName"] ?> a pensé que vous pourriez être intéressé par un des trajets de covoiturage partant de <?php echo $params["depart"] ?> pour aller à <?php echo $params["destination"] ?>.<br/>
                        Pour le visualiser, il suffit de vous rendre à cette adresse :<br/>
                        <a href="<?php echo $params["urlApplication"].url_for('trajet/view?id_trajet='.$params["idTrajet"]) ?>"><?php echo $params["urlApplication"].url_for('trajet/view?id_trajet='.$params["idTrajet"]) ?></a><br/>
                        <br/>
                        A bientôt sur <?php echo sfConfig::get('sf_site_name') ?> !<br/>
                        <br/>
                        Cordialement,<br/>
                        L'équipe de <?php echo sfConfig::get('sf_organization_name') ?><br/>
                        <br/>
                    </p>
                </td>
                <td width="80">&nbsp;</td> 
            </tr>
        </table>
<br/><br/>
        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td><img src="http://<?php echo $params["urlApplication"] ?>/images/mail_bandeau_bas.gif" /></td>
            </tr>
        </table>
    </body>
</html>	

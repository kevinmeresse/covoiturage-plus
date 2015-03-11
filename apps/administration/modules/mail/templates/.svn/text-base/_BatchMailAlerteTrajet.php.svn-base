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

                    <p>Bonjour,
                        <br/>
                    <br/>
                    Une ou plusieurs nouvelles annonces de covoiturage correspond à vos critères enregistrés sur le site www.covoiturage.asso.fr.
                    <?php foreach ($params["trajets"] as $trajet): ?>
                        Depart: <?php echo $trajet[1] ?> - Destination: <?php echo $trajet[2] ?> - Lien  <a href="http://<?php echo $params["urlApplication"] ?>"><?php echo $trajet[0] ?></a>
                    <?php endforeach; ?>
                    


                    Merci de votre collaboration

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

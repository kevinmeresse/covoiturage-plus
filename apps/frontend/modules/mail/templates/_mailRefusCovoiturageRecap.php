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
                    <p>Bonjour,<br/>
                        <br/> 
                        Vous venez de refuser la demande de covoiturage ci-dessous :</p>
                    <p>- D&eacute;part : <?php echo $params["depart"] ?><br />
                        - Arriv&eacute;e : <?php echo $params["arrivee"] ?><br />
                        - Date ou fr&eacute;quence: <?php echo $params["date"] ?><br />
                        - Nombre de place(s) demand&eacute;e(s) : <?php echo $params["places"] ?><br />
                        - Message : <?php echo $params["message"] ?><br />
                        - Demandeur : <?php echo $params["demandeur"] ?><br />
                        - Coordonn&eacute;es du demandeur : <?php echo $params["coordonneeDemandeur"] ?></p>
                    <p>A bientôt sur <a href="http://<?php echo $params["urlApplication"] ?>"><?php echo $params["urlApplication"] ?></a>.<br />
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

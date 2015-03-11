<div id="eco-calcul">
        
        <h2> Eco-calculateur</h2>
<form method="post" name="form_eco_calcul" id="form_eco_calcul">

					<div class="five columns">
                    <label>Longueur du trajet aller (km) :</label>
                    <input type="text" name="nb_km" id="nb_km"/>
                    <input type="submit" id="submit_annu" value="Co&ucirc;t annuel aller/retour" />
					<p>Source ADEME</p>
                    </div>
                    <div class="five columns"> 
                    <label>Nombre de personnes dans la voiture :</label>
                    <input type="text" name="nb_pers" id="nb_pers"/>
					<input type="submit" id="submit_trajet" value="Co&ucirc;t ponctuel aller/retour" />
					<p>A titre indicatif<p>
                    </div>    
                <br/>
                

                <table border="0" width="498" class="texte">
                    <thead>

                        <tr>
                            <th >Mode de transport </th>
                            <th >Co&ucirc;t </th>
                            <th >Effet de serre </th>
                            <th >Energie </th>
                        </tr>
					</thead>
                    <tbody>
                        <tr >
                            <td>Par voiture personnelle </td>
                            <td><input name="perso_cout" size="5" disabled="disabled" id="perso_cout" class="disabled"/> &euro; </td>
                            <td><input name="perso_effet_serre" size="5" disabled="disabled" id="perso_effet_serre" class="disabled"/> kg &eacute;q. CO2 </td>
                            <td><input name="perso_energie" size="5" disabled="disabled" id="perso_energie" class="disabled"/> l &eacute;q. p&eacute;trole </td>

                        </tr>
                        <tr >
                            <td>Par covoitureur </td>
                            <td><input name="coov_cout" size="5" disabled="disabled" id="coov_cout" class="disabled"/> &euro; </td>
                            <td><input name="coov_effet_serre" size="5" disabled="disabled" id="coov_effet_serre" class="disabled"/> kg &eacute;q. CO2 </td>
                            <td><input name="coov_energie" size="5" disabled="disabled" id="coov_energie" class="disabled"/> l &eacute;q. p&eacute;trole </td>

                        </tr>
                    </tbody>
                </table>
             
                <span class="texte2">Pour plus d'informations, rendez-vous sur la <a target="_blank" href="http://www.ademe.fr/eco-deplacements/calculette/">calculette &eacute;co-d&eacute;placements</a> du site de l'ADEME.<br/>


                </span>
            </form>
        </div>
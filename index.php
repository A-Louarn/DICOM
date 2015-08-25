<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form>
            <table cellspacing="10px"><tbody><tr>
                <td><div style="width:400px; height:400px;border-radius:20px 20px 20px 20px; -moz-border-radius: 50px;box-shadow:1px 0px 5px gray;-moz-box-shadow:Gray 1px 0px 5px;padding-left:10px; padding-top:10px">
            <div id="reglagesPatient">
                <label for="id-patient">ID patient :</label><input type="text" id="id-patient" name="id-patient" placeholder="ID patient" /><br />
                <label for="nom-patient">Nom du patient :</label><input type="text" id="nom-patient" name="nom-patient" placeholder="nom du patient" /><br />
                <label for="prenom-patient">Pr&eacute;nom du patient :</label><input type="text" id="prenom-patient" name="prenom-patient" placeholder="pr&eacute;nom du patient" /><br />
                <label for="insee-patient">Num&eacute;ro INSEE :</label><input type="text" id="insee-patient" name="insee-patient" placeholder="Num&eacute;ro INSEE" /><br />
                <label>Sexe :</label>   <input type="radio" name="sexe-patient" id="sexe-patient-F" value="F" /><label for="sexe-patient-F">Femme</label>
                                        <input type="radio" name="sexe-patient" id="sexe-patient-H" value="H" /><label for="sexe-patient-H">Homme</label>
                                        <input type="radio" name="sexe-patient" id="sexe-patient-A" value="A" /><label for="sexe-patient-A">Autre</label><br />
                <label for="age-patient">&acirc;ge :</label><input type="number" id="age-patient" name="age-patient" placeholder="&acirc;ge"/><br />
                <label for="poids-patient">Poids :</label><input type="number" id="poids-patient" name="poids-patient" placeholder="Poids"/><br />
                <label for="taille-patient">Taille :</label><input type="number" id="taille-patient" name="taille-patient" placeholder="taille"/><br />
                <input type="button" value="suivant"/>
                <input type="button" value="charger patient"/>
            </div>
                </div></td>
                <td><div style="width:400px; height:400px;border-radius:20px 20px 20px 20px; -moz-border-radius: 50px;box-shadow:1px 0px 5px gray;-moz-box-shadow:Gray 1px 0px 5px;padding-left:10px; padding-top:10px">
            <div id="reglagesExamen">
                <label for="position-examen">Position de l'examen :</label>
                    <input type="text" id="position-examen" list="liste-positions-examen" placeholder="Position"/>
                    <datalist id="liste-positions-examen">
                       <option>Debout</option>
                       <option>Allong&eacute;</option>
                    </datalist>
                    <br />
                <label for="activite-examen">&Eacute;tat du muscle / activit&eacute; demand&eacute;e :</label>
                    <input type="text" id="activite-examen" list="liste-activites-examen" placeholder="Activit&eacute;"/>
                    <datalist id="liste-activites-examen">
                        <option>Repos</option>
                        <option>Contraction</option>
                        <option>Extension</option>
                    </datalist>
                    <br />
                <label for="localisation-examen">Localisation de l'examen :</label>
                    <input type="text" id="localisation-examen" list="liste-localisations-examen" placeholder="Localisation"/>
                    <datalist id="liste-localisations-examen">
                        <option>Bras</option>
                        <option>Mollet</option>
                        <option>Ventre</option>
                    </datalist>
                    <br />
                <input type="button" value="suivant"/>
            </div>
                </div></td></tr>
                <tr><td><div style="width:400px; height:400px;border-radius:20px 20px 20px 20px; -moz-border-radius: 50px;box-shadow:1px 0px 5px gray;-moz-box-shadow:Gray 1px 0px 5px;padding-left:10px; padding-top:10px">
            <div id="reglagesMedecins">
                <label for="operateur">Op&eacute;rateur :</label>
                    <input type="text" id="operateur" list="liste-operateur" placeholder="Op&eacute;rateur"/>
                    <datalist id="liste-operateur">
                        <option>Monsieur Stark</option>
                        <option>Madame Potts</option>
                    </datalist>
                    <br />
                <label for="prescripteur">Prescripteur :</label>
                    <input type="text" id="prescripteur" list="liste-prescripteur" placeholder="Prescripteur"/>
                    <datalist id="liste-prescripteur">
                        <option>Monsieur Wayne</option>
                        <option>Madame Kyle</option>
                    </datalist>
                <br />
                <label for="realisateur">R&eacute;alisateur :</label>
                    <input type="text" id="realisateur" list="liste-realisateur" placeholder="R&eacute;alisateur"/>
                    <datalist id="liste-realisateur">
                        <option>Monsieur Rogers</option>
                        <option>Madame Carter</option>
                    </datalist>
                    <br />
                <input type="button" value="suivant"/>
            </div>
                </div></td>
                <td><div style="width:400px; height:400px;border-radius:20px 20px 20px 20px; -moz-border-radius: 50px;box-shadow:1px 0px 5px gray;-moz-box-shadow:Gray 1px 0px 5px;padding-left:10px; padding-top:10px">
            <div id="sauvegarder">
                <input type="button" value="charger configuration"/>
                <input type="button" value="sauvegarder"/>
            </div>
                </div></td></tr></tbody></table>
        </form>
    </body>
</html>

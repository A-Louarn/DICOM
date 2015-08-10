<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form>
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
            </div>
        </form>
    </body>
</html>

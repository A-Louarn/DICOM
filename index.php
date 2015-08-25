<?php
    $page_number = 3;
    if(!isset($_GET['page']) || !is_numeric($_GET['page']))
        $page = 0;
    else
        $page = $_GET['page']%$page_number;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DICOM - utilisateur</title>
        <link rel="stylesheet" href="./UI.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <form>
            <div id="reglagesPatient" class="<?php echo ($page == 0)? "":'disabled'?> reglagebox leftcolumn toprow">
                <label for="id-patient">ID patient :</label>
                    <input type="text" id="id-patient" name="id-patient" placeholder="ID patient" <?php echo ($page == 0)? "":'disabled'?> />
                <br />
                <label for="nom-patient">Nom du patient :</label>
                    <input type="text" id="nom-patient" name="nom-patient" placeholder="nom du patient" <?php echo ($page == 0)? "":'disabled'?> />
                <br />
                <label for="prenom-patient">Pr&eacute;nom du patient :</label>
                    <input type="text" id="prenom-patient" name="prenom-patient" placeholder="pr&eacute;nom du patient" <?php echo ($page == 0)? "":'disabled'?> />
                <br />
                <label for="insee-patient">Num&eacute;ro INSEE :</label>
                    <input type="text" id="insee-patient" name="insee-patient" placeholder="Num&eacute;ro INSEE" <?php echo ($page == 0)? "":'disabled'?> />
                <br />
                <label>Sexe :</label>   <input type="radio" name="sexe-patient" id="sexe-patient-F" value="F" <?php echo ($page == 0)? "":'disabled'?> />
                                            <label for="sexe-patient-F">Femme</label>
                                        <input type="radio" name="sexe-patient" id="sexe-patient-H" value="H" <?php echo ($page == 0)? "":'disabled'?> />
                                            <label for="sexe-patient-H">Homme</label>
                                        <input type="radio" name="sexe-patient" id="sexe-patient-A" value="A" <?php echo ($page == 0)? "":'disabled'?> />
                                            <label for="sexe-patient-A">Autre</label>
                <br />
                <label for="age-patient">&acirc;ge :</label>
                    <input type="number" id="age-patient" name="age-patient" placeholder="&acirc;ge" <?php echo ($page == 0)? "":'disabled'?> />
                <br />
                <label for="poids-patient">Poids :</label>
                    <input type="number" id="poids-patient" name="poids-patient" placeholder="Poids" <?php echo ($page == 0)? "":'disabled'?> />
                <br />
                <label for="taille-patient">Taille :</label>
                    <input type="number" id="taille-patient" name="taille-patient" placeholder="taille" <?php echo ($page == 0)? "":'disabled'?> />
                <br />
                <input type="button" value="suivant" <?php echo ($page == 0)? "":'disabled'?> />
                <input type="button" value="charger patient" <?php echo ($page == 0)? "":'disabled'?> />
            </div>
            <div id="reglagesExamen" class="<?php echo ($page == 1)? "":'disabled'?> reglagebox rightcolumn toprow">
                <label for="position-examen">Position de l'examen :</label>
                    <input type="text" id="position-examen" list="liste-positions-examen" placeholder="Position" <?php echo ($page == 1)? "":'disabled'?> />
                    <datalist id="liste-positions-examen">
                       <option>Debout</option>
                       <option>Allong&eacute;</option>
                    </datalist>
                    <br />
                <label for="activite-examen">&Eacute;tat du muscle / activit&eacute; demand&eacute;e :</label>
                    <input type="text" id="activite-examen" list="liste-activites-examen" placeholder="Activit&eacute;" <?php echo ($page == 1)? "":'disabled'?> />
                    <datalist id="liste-activites-examen">
                        <option>Repos</option>
                        <option>Contraction</option>
                        <option>Extension</option>
                    </datalist>
                    <br />
                <label for="localisation-examen">Localisation de l'examen :</label>
                    <input type="text" id="localisation-examen" list="liste-localisations-examen" placeholder="Localisation" <?php echo ($page == 1)? "":'disabled'?> />
                    <datalist id="liste-localisations-examen">
                        <option>Bras</option>
                        <option>Mollet</option>
                        <option>Ventre</option>
                    </datalist>
                    <br />
                <input type="button" value="suivant" <?php echo ($page == 1)? "":'disabled'?> />
            </div>
            <div id="reglagesMedecins" class="<?php echo ($page == 2)? "":'disabled'?> reglagebox leftcolumn bottomrow">
                <label for="operateur">Op&eacute;rateur :</label>
                    <input type="text" id="operateur" list="liste-operateur" placeholder="Op&eacute;rateur" <?php echo ($page == 2)? "":'disabled'?> />
                    <datalist id="liste-operateur">
                        <option>Monsieur Stark</option>
                        <option>Madame Potts</option>
                    </datalist>
                    <br />
                <label for="prescripteur">Prescripteur :</label>
                    <input type="text" id="prescripteur" list="liste-prescripteur" placeholder="Prescripteur" <?php echo ($page == 2)? "":'disabled'?> />
                    <datalist id="liste-prescripteur">
                        <option>Monsieur Wayne</option>
                        <option>Madame Kyle</option>
                    </datalist>
                <br />
                <label for="realisateur">R&eacute;alisateur :</label>
                    <input type="text" id="realisateur" list="liste-realisateur" placeholder="R&eacute;alisateur" <?php echo ($page == 2)? "":'disabled'?> />
                    <datalist id="liste-realisateur">
                        <option>Monsieur Rogers</option>
                        <option>Madame Carter</option>
                    </datalist>
                    <br />
                <input type="button" value="suivant" <?php echo ($page == 2)? "":'disabled'?> />
            </div>
            <div id="sauvegarder" class="reglagebox rightcolumn bottomrow">
                <input type="button" value="charger configuration"/>
                <input type="button" value="sauvegarder"/>
            </div>
        </form>
    </body>
</html>

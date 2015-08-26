<?php
    $page_number = 3;
    $current_building_page = 0;
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
        <div id="reglagesPatient" class="<?php echo ($page == $current_building_page)? "":"disabled"; ?> reglagebox leftcolumn toprow">
            <div>
                <input type="text" id="chargerPatient" list="liste-charger-patient" placeholder="Nom du patient &agrave; charger" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <datalist id="liste-charger-patient">
                    <?php
                        //TODO: load list from DB
                    ?>
                </datalist>
                <input type="button" id="boutonChargerPatient" value="Charger patient" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
            </div>
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <label for="id-patient">ID patient :</label>
                    <input type="text" id="id-patient" name="id-patient" placeholder="ID patient" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <br />
                <label for="nom-patient">Nom du patient :</label>
                    <input type="text" id="nom-patient" name="nom-patient" placeholder="nom du patient" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <br />
                <label for="prenom-patient">Pr&eacute;nom du patient :</label>
                    <input type="text" id="prenom-patient" name="prenom-patient" placeholder="pr&eacute;nom du patient" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <br />
                <label for="insee-patient">Num&eacute;ro INSEE :</label>
                    <input type="text" id="insee-patient" name="insee-patient" placeholder="Num&eacute;ro INSEE" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <br />
                <label>Sexe :</label>   <input type="radio" name="sexe-patient" id="sexe-patient-F" value="F" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                                            <label for="sexe-patient-F">Femme</label>
                                        <input type="radio" name="sexe-patient" id="sexe-patient-H" value="H" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                                            <label for="sexe-patient-H">Homme</label>
                                        <input type="radio" name="sexe-patient" id="sexe-patient-A" value="A" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                                            <label for="sexe-patient-A">Autre</label>
                <br />
                <label for="age-patient">&acirc;ge :</label>
                    <input type="number" id="age-patient" name="age-patient" placeholder="&acirc;ge" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <br />
                <label for="poids-patient">Poids :</label>
                    <input type="number" id="poids-patient" name="poids-patient" placeholder="Poids" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <br />
                <label for="taille-patient">Taille :</label>
                    <input type="number" id="taille-patient" name="taille-patient" placeholder="taille" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
                <br />
                <input type="submit" value="suivant" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesExamen" class="<?php echo ($page == $current_building_page)? "":"disabled"; ?> reglagebox rightcolumn toprow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <label for="position-examen">Position de l'examen :</label>
                    <select id="position-examen" name="position-examen" <?php echo ($page == $current_building_page)? "":"disabled"; ?>>
                       <option value="0">Debout</option>
                       <option value="1">Allong&eacute;</option>
                    </select>
                    <br />
                <label for="activite-examen">&Eacute;tat du muscle / activit&eacute; demand&eacute;e :</label>
                    <select id="activite-examen" name="activites-examen" <?php echo ($page == $current_building_page)? "":"disabled"; ?>>
                        <option value="0">Repos</option>
                        <option value="1">Contraction</option>
                        <option value="2">Extension</option>
                    </select>
                    <br />
                <label for="localisation-examen">Localisation de l'examen :</label>
                    <select id="localisation-examen" name="localisation-examen" <?php echo ($page == $current_building_page)? "":"disabled"; ?>>
                        <option value="0">Bras</option>
                        <option value="1">Mollet</option>
                        <option value="2">Ventre</option>
                    </select>
                    <br />
                <input type="submit" value="suivant" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesMedecins" class="<?php echo ($page == $current_building_page)? "":"disabled"; ?> reglagebox leftcolumn bottomrow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <label for="operateur">Op&eacute;rateur :</label>
                    <select id="operateur" name="operateur" <?php echo ($page == $current_building_page)? "":"disabled"; ?>>
                        <option>Monsieur Stark</option>
                        <option>Madame Potts</option>
                    </select>
                    <br />
                <label for="prescripteur">Prescripteur :</label>
                    <select id="prescripteur" name="prescripteur" <?php echo ($page == $current_building_page)? "":"disabled"; ?>>
                        <option>Monsieur Wayne</option>
                        <option>Madame Kyle</option>
                    </select>
                <br />
                <label for="realisateur">R&eacute;alisateur :</label>
                    <select id="realisateur" name="realisateur" <?php echo ($page == $current_building_page)? "":"disabled"; ?>>
                        <option>Monsieur Rogers</option>
                        <option>Madame Carter</option>
                    </select>
                    <br />
                <input type="submit" value="suivant" <?php echo ($page == $current_building_page)? "":"disabled"; ?> />
            </form>
        </div>
        <div id="sauvegarder" class="reglagebox rightcolumn bottomrow">
            <input type="button" value="charger configuration"/>
            <input type="button" value="sauvegarder"/>
        </div>
    </body>
</html>

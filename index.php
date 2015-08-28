<?php
    session_start();
    $page_number = 4;
    $current_building_page = 0;
    if(!isset($_GET['page']) || !is_numeric($_GET['page']))
        $page = 0;
    else
        $page = $_GET['page']%$page_number;
    //TODO: load everything from DB

    include_once('convenience_functions.php');
    $db = openDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DICOM - utilisateur</title>
        <link rel="stylesheet" href="./UI.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div id="reglagesPatient" class="<?php disable() ?> reglagebox leftcolumn toprow">
            <div>
                <input type="text" id="chargerPatient" list="liste-charger-patient" placeholder="Nom du patient &agrave; charger" <?php disable() ?> />
                <datalist id="liste-charger-patient">
                    <?php
                        //TODO: load list from DB
                    ?>
                </datalist>
                <input type="button" id="boutonChargerPatient" value="Charger patient" <?php disable() ?> />
            </div>
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printInput("number", "patient_insee", "Numéro INSEE");?>
                <?php printInput("text", "patient_LastName", "Prénom du patient");?>
                <?php printInput("text", "patient_firstName", "Nom du patient");?>
                <?php printInput("date", "patient_dateOfBirth", "Date de naissance"); ?>
                <?php printRadioButton("patient_sex", "Sexe", array("F"=>"Femme","M"=>"Homme","O"=>"Autre")); ?>
                <?php printInput("number", "patient_size", "Taille"); ?>
                <?php printInput("number", "patient_weight", "Poids"); ?>
                <?php printCountryDropDownList("patient_countryOfResidence","Pays de résidence"); ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesExamen" class="<?php disable() ?> reglagebox rightcolumn toprow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printDropDownMenu("position-examen","Position de l'examen",array(0=>"Debout",1=>"Allongé")); ?>
                <?php printDropDownMenu("activite-examen","État du muscle / activité demandée",array(0=>"Repos",1=>"Contraction",2=>"Extension")); ?>
                <?php printDropDownMenu("localisation-examen","Localisation de l'examen",array(0=>"Bras",1=>"Mollet",2=>"Ventre")); ?>
                <?php printPreviousButton() ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesMedecins" class="<?php disable() ?> reglagebox leftcolumn bottomrow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printDropDownMenu("operateur","Opérateur",loadOperateurs($db)); ?>
                <?php printDropDownMenu("prescripteur","Prescripteur",loadPrescripteurs($db)); ?>
                <?php printDropDownMenu("realisateur","Réalisateur",loadRealisateurs($db)); ?>
                <?php printPreviousButton() ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="sauvegarder" class="<?php disable() ?> reglagebox rightcolumn bottomrow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <? printSubmitButton("save","sauvegarder") ?>
            </form>
        </div>
    </body>
</html>

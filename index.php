<?php
    session_start();
    $page_number = 4;
    $current_building_page = 0;
    if(!isset($_GET['page']) || !is_numeric($_GET['page']))
        $page = 0;
    else
        $page = $_GET['page']%$page_number;

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
            <form action="load_patient.php" method="post">
                <input type="text" id="chargerPatient" name="patient_loading" list="liste-charger-patient" placeholder="Nom du patient &agrave; charger" <?php disable() ?> />
                <?php printDatalist("liste-charger-patient",loadPatients($db)) ?>
                <input type="submit" id="boutonChargerPatient" value="Charger patient" <?php disable() ?> />
            </form>
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printInput("number", "patient_insee", "Numéro INSEE", true);?>
                <?php printInput("text", "patient_firstName", "Prénom du patient", true);?>
                <?php printInput("text", "patient_lastName", "Nom du patient", true);?>
                <?php printInput("date", "patient_dateOfBirth", "Date de naissance", true); ?>
                <?php printRadioButton("patient_sex", "Sexe", array("F"=>"Femme","M"=>"Homme","O"=>"Autre"), true); ?>
                <?php printInput("number", "patient_size", "Taille", true); ?>
                <?php printInput("number", "patient_weight", "Poids", true); ?>
                <?php printCountryDropDownList("patient_countryOfResidence","Pays de résidence", true); ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesExamen" class="<?php disable() ?> reglagebox rightcolumn toprow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printDropDownMenu("examen_anatomicOrientation","Position de l'examen",loadAnatomicOrientation($db)); ?>
                <?php printDropDownMenu("examen_posture","État du muscle / activité demandée",loadPosture($db)); ?>
                <?php printDropDownMenu("examen_bodyPart","Localisation de l'examen", loadBodyparts($db)); ?>
                <?php printPreviousButton() ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesMedecins" class="<?php disable() ?> reglagebox leftcolumn bottomrow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printDropDownMenu("medic_operateur", "Opérateur", loadOperateurs($db)); ?>
                <?php printDropDownMenu("medic_prescripteur", "Prescripteur", loadPrescripteurs($db)); ?>
                <?php printDropDownMenu("medic_realisateur", "Réalisateur", loadRealisateurs($db)); ?>
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

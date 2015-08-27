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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DICOM - utilisateur</title>
        <link rel="stylesheet" href="./UI.css" />
        <meta charset="utf-8" />
<!--        <?php print_r($_SESSION); ?>-->
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
                <?php printInput("text", "id-patient", "ID patient");?>
                <?php printInput("text", "nom-patient", "Nom du patient");?>
                <?php printInput("text", "prenom-patient", "Prénom du patient");?>
                <?php printInput("text", "insee-patient", "Numéro INSEE");?>
                <?php printRadioButton("sexe-patient", "Sexe", array("F"=>"Femme","H"=>"Homme","A"=>"Autre")); ?>
                <?php printInput("number", "age-patient", "Âge"); ?>
                <?php printInput("number", "poids-patient", "Poids"); ?>
                <?php printInput("number", "taille-patient", "Taille"); ?>
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
                <?php printDropDownMenu("operateur","Opérateur",array("Monsieur Stark", "Madame Potts")); ?>
                <?php printDropDownMenu("prescripteur","Prescripteur",array("Monsieur Wayne", "Madame Kyle")); ?>
                <?php printDropDownMenu("realisateur","Réalisateur",array("Monsieur Rogers", "Madame Carter")); ?>
                <?php printPreviousButton() ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="sauvegarder" class="<?php disable() ?> reglagebox rightcolumn bottomrow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <? printSubmitButton("save","sauvegarder") //TODO ?>
            </form>
        </div>
    </body>
</html>

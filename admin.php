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
        <title>DICOM - admin</title>
        <link rel="stylesheet" href="./UI.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div id="reglagesGeneraux" class="reglagebox leftcolumn toprow">
            <form action="process_admin.php?page=1" method="post">
                <?php printDoubleAddableCombobox('site', "Site", "Nom", "Adresse", loadSite($db)); ?>
                <?php printAddableCombobox('operateur', "Opérateur", loadOperateurs($db)); ?>
                <?php printAddableCombobox('prescripteur', "Prescripteur", loadPrescripteurs($db)); ?>
                <?php printAddableCombobox('realisateur', "Réalisateur", loadRealisateurs($db)); ?>
                <?php printAddableCombobox('position-examen', "Position de l'examen", loadPosture($db)); ?>
                <?php printAddableCombobox('activite-examen', "Activité demandée", loadAnatomicOrientation($db)); ?>
                <?php printDoubleAddableCombobox('localisation-examen',"Localisation de l'examen", "region sequence", "nom", loadBodyparts($db)); ?>
            </form>
        </div>
<!--
<?php print_r(loadDicom($db)); ?>
-->
        <div id="reglagesDicom" class="reglagebox rightcolumn toprow">
            <form action="process_admin.php?page=2" method="post">
                <?php printDropDownMenu('histo-dicom', 'Historique du Dicom', loadDicom($db)); ?>
                <?php printSubmitButton('load-histo', 'Charger'); ?>
                <br />
            </form>
            <form action="process_admin.php?page=2" method="post">
                <?php loadCurrentDicomValue($db); ?>
                <?php printInput('text','adresse-ip','Adresse IP',true); ?>
                <?php printInput('number','port-dicom','Port DICOM',true); ?>
                <?php printDropDownMenu('syntaxe-transfert','Syntaxe de transfert', array(
                        'Implicit little endian' => 'Implicit little endian',
                        'Explicit little endian' => 'Explicit little endian',
                        'Implicit big endian' => 'Implicit big endian',
                        'Explicit big endian' => 'Explicit big endian')) ?>
                <?php printDefaultSubmitButton(); ?>
            </form>
        </div>
        <div id="Logs" class="reglagebox leftcolumn bottomrow">
            <textarea rows="4" cols="50">Ceci est un test pour les logs.</textarea>
            <br />
        </div>
        <div id="sauvegarder" class="reglagebox rightcolumn bottomrow">
            <form action="process_admin.php?page=4" method="post">
                <input type="submit" name="load" value="charger configuration"/>
                <input type="button" name="save" value="sauvegarder"/>
            </form>
        </div>
    </body>
</html>

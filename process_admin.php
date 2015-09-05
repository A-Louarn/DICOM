<?php
session_start();
include_once('convenience_functions.php');

if(!isset($_GET['page']) || !is_numeric($_GET['page']))
{
    header('Location:admin.php');
    exit;
}

$db = openDB();

if($_GET['page'] == 1)
{
    $db = openDB();
    if(isset($_POST['add-site']))
        writeSite($db, $_POST['site-1'], $_POST['site-2']);
    else if(isset($_POST['add-operateur']))
        writeOperateur($db, $_POST['operateur']);
    else if(isset($_POST['add-prescripteur']))
        writePrescripteur($db, $_POST['prescripteur']);
    else if(isset($_POST['add-realisateur']))
        writeRealisateur($db, $_POST['realisateur']);
    else if(isset($_POST['add-position-examen']))
        writePosture($db, $_POST['position-examen']);
    else if(isset($_POST['add-activite-examen']))
        writeAnatomicOrientation($db, $_POST['activite-examen']);
    else if(isset($_POST['add-localisation-examen']))
        writeBodypart($db, $_POST['localisation-examen-1'], $_POST['localisation-examen-2']);
}
else if($_GET['page'] == 2)
{
    if(isset($_POST['load-histo']))
    {
        $vals = explode(', ',$_POST['histo-dicom'],3);
        $_SESSION['adresse-ip'] = $vals[0];
        $_SESSION['port-dicom'] = $vals[1];
        $_SESSION['syntaxe-transfert'] = $vals[2];
    }
    else
    {
        writeDicom($db, $_POST['adresse-ip'], $_POST['port-dicom'], $_POST['syntaxe-transfert']);

        unset($_SESSION['adresse-ip']);
        unset($_SESSION['port-dicom']);
        unset($_SESSION['syntaxe-transfert']);
    }
}
else if($_GET['page'] == 4)
{
    //TODO
}

header('Location:admin.php');
?>

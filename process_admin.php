<?php
session_start();
include_once('convenience_functions.php');

if(!isset($_GET['page']) || !is_numeric($_GET['page']))
{
    header('Location:admin.php');
    exit;
}

if($_GET['page'] == 1)
{
    $db = openDB();
    if(isset($_POST['add-nom-site']))
    {
        writeSite($db, $_POST['nom-site'], $_POST['adresse']);
    }
    else if(isset($_POST['add-adresse-site']))
    {
        //TODO
    }
    else if(isset($_POST['add-operateur']))
    {
        writeOperateur($db, $_POST['operateur']);
    }
    else if(isset($_POST['add-prescripteur']))
    {
        writePrescripteur($db, $_POST['prescripteur']);
    }
    else if(isset($_POST['add-realisateur']))
    {
        writeRealisateur($db, $_POST['realisateur']);
    }
    else if(isset($_POST['add-position-examen']))
    {
        writePosture($db, $_POST['position-examen']);
    }
    else if(isset($_POST['add-activite-examen']))
    {
        writeAnatomicOrientation($db, $_POST['activite-examen']);
    }
    else if(isset($_POST['add-localisation-examen']))
    {
        writeBodypart($db, $_POST['localisation-examen'], $_POST['localisation-examen']);
    }
    header('Location:admin.php');
}
else if($_GET['page'] == 2)
{
    //TODO
}
else if($_GET['page'] == 4)
{
    //TODO
}
?>

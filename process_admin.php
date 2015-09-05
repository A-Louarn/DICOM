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
    if(isset($_POST['add-site']))
    {
        writeSite($db, $_POST['site-1'], $_POST['site-2']);
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
        writeBodypart($db, $_POST['localisation-examen-1'], $_POST['localisation-examen-2']);
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

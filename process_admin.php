<?php
session_start();

if(!isset($_GET['page']) || !is_numeric($_GET['page']))
{
    header('Location:admin.php');
    exit;
}

if($_GET['page'] == 1)
{
    if(isset($_POST['add-nom-site']))
    {
        //TODO
    }
    else if(isset($_POST['add-adresse-site']))
    {
        //TODO
    }
    else if(isset($_POST['add-operateur']))
    {
        //TODO
    }
    else if(isset($_POST['add-prescripteur']))
    {
        //TODO
    }
    else if(isset($_POST['add-realisateur']))
    {
        //TODO
    }
    else if(isset($_POST['add-position-examen']))
    {
        //TODO
    }
    else if(isset($_POST['add-activite-examen']))
    {
        //TODO
    }
    else if(isset($_POST['add-localisation-examen']))
    {
        //TODO
    }
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

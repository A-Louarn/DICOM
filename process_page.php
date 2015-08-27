<?php
session_start();
$page_number = 3;
if(!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] >= $page_number)
{
    header('Location:./');
    exit;
}
else
    $page = $_GET['page'];

switch($page)
{
    case 0:
        $vars = array("id-patient", "nom-patient", "prenom-patient", "insee-patient",
                      "sexe-patient","age-patient","poids-patient", "taille-patient");
        break;
    case 1:
        //TODO
        break;
    case 2:
        //TODO
        break;
    default:
        header('Location:./');
        exit;
}

foreach($vars as $var)
    putToSession($var);

$nextpage = $page + ((isset($_POST['previous']))? -1 : +1) % $page_number;

header('Location:./?page='.$nextpage);
exit;

function putToSession($varName)
{
    $_SESSION[$varName] = htmlspecialchars($_POST[$varName]);
}
?>

<?php
session_start();
include_once("convenience_functions.php");
$page_number = 4;
if(!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] >= $page_number)
{
    header('Location:./');
    exit;
}
else
    $page = $_GET['page'];

if($page == $page_number - 1)
    saveToDB();
else
    foreach($_POST as $varName => $value)
        $_SESSION[$varName] = htmlspecialchars($value);


$nextpage = $page + ((isset($_POST['previous']))? -1 : +1) % $page_number;

header('Location:./?page='.$nextpage);
exit;

function saveToDB()
{
    //TODO
    $db = openDB();
}
?>

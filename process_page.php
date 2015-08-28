<?php
session_start();
$page_number = 4;
if(!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] >= $page_number)
{
    header('Location:./');
    exit;
}
else
    $page = $_GET['page'];

foreach($_POST as $varName => $value)
{
    $_SESSION[$varName] = htmlspecialchars($value);
}


$nextpage = $page + ((isset($_POST['previous']))? -1 : +1) % $page_number;

header('Location:./?page='.$nextpage);
exit;

?>

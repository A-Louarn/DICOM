<?php
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
        //TODO
        break;
    case 1:
        //TODO
        break;
    case 2:
        //TODO
        break;
}

header('Location:./?page='.($page+1));
exit;
?>

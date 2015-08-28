<?php
session_start();
include_once('convenience_functions.php');

$db = openDB();

$sql = $db->prepare('SELECT * FROM Patient WHERE patient_insee=?');
$sql->execute(array($_POST['patient_loading']));

$data = $sql->fetch();

foreach($data as $key=>$value)
    if(is_string($key))
        $_SESSION[$key] = $value;

header('Location:./?page=0');
?>

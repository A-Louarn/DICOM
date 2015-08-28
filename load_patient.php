<?php
include_once('convenience_functions.php');

$db = openDB();

$sql = $db->prepare('SELECT * FROM Patient WHERE patient_insee=?');
$sql->execute(array($_POST['patient_loading']));

//TODO
?>

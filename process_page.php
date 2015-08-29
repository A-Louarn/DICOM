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
{
    saveToDB();
    session_destroy();
}
else
    writePOSTtoSESSION();


$nextpage = $page + ((isset($_POST['previous']))? -1 : +1) % $page_number;

header('Location:./?page='.$nextpage);
exit;

function saveToDB()
{
    $db = openDB();

    //Patient table
    $patientSQL = $db->prepare('INSERT INTO Patient (
            patient_insee, patient_firstName, patient_lastName, patient_dateOfBirth, patient_sex, patient_size, patient_weight,
            patient_typeOfID, patient_insurancePlanIdentification, patient_countryOfResidence)
            VALUES (
            :insee, :firstName, :lastName, :dateOfBirth, :sex, :size, :weight,
            \'INSEE\', \'INSEE\', :countryOfResidence)
            ON DUPLICATE KEY UPDATE
            patient_firstName=:firstName,
            patient_lastName=:lastName,
            patient_dateOfBirth=:dateOfBirth,
            patient_sex=:sex,
            patient_size=:size,
            patient_weight=:weight,
            patient_countryOfResidence=:countryOfResidence;');

    $patientSQL->execute(array(
        'insee'=>$_SESSION['patient_insee'],
        'firstName'=>$_SESSION['patient_firstName'],
        'lastName'=>$_SESSION['patient_lastName'],
        'dateOfBirth'=>$_SESSION['patient_dateOfBirth'],
        'sex'=>$_SESSION['patient_sex'],
        'size'=>$_SESSION['patient_size'],
        'weight'=>$_SESSION['patient_weight'],
        'countryOfResidence'=>$_SESSION['patient_countryOfResidence']
    ));

    $patientSQL->closeCursor();


    //TODO: save to DB for examen
    $examenSQL = $db->prepare('INSERT INTO Examen (
            examen_instanceCreationDateTime,
            examen_procedureCodeSequence,
            examen_institutionalDepartementName,
            examen_protocolName,
            examen_performedProcedureStepID,
            examen_performedProcedureStepDescription,
            examen_contentDateTime,
            examen_instanceCreatorUID,
            bodyPart_anatomicRegionSequence,
            anatomicOrientation_name,
            posture_name,
            operateur_name,
            realisateur_performingPhysicianName,
            prescripteur_referringPhysicianName,
            patient_insee)
        VALUES (
            :time,
            \'DEFAULT PROCEDURE CODE SEQUENCE\',
            \'//TODO\',
            \'DEFAULT PROTOCOL\',
            \'DEFAULT PROCEDURE STEP ID\',
            \'DEFAULT PROCEDURE STEP DESCRIPTION\',
            :time,
            \'DEFAULT INSTANCE CREATOR UID\',
            :bodyPart,
            :anatomicOrientation,
            :posture,
            :operateur,
            :realisateur,
            :prescipteur,
            :insee
        );');

    $examenSQL->execute(array(
        'time'=>date("Y-m-d H:i:s"),
        'bodyPart'=>$_SESSION['examen_bodyPart'],
        'anatomicOrientation'=>$_SESSION['examen_anatomicOrientation'],
        'posture'=>$_SESSION['examen_posture'],
        'operateur'=>$_SESSION['medic_operateur'],
        'realisateur'=>$_SESSION['medic_prescripteur'],
        'prescipteur'=>$_SESSION['medic_realisateur'],
        'insee'=>$_SESSION['patient_insee']
    ));

    $examenSQL->closeCursor();
}
?>

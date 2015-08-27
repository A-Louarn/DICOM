<?php
    session_start();
    $page_number = 3;
    $current_building_page = 0;
    if(!isset($_GET['page']) || !is_numeric($_GET['page']))
        $page = 0;
    else
        $page = $_GET['page']%$page_number;
    //TODO: load everything from DB
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DICOM - utilisateur</title>
        <link rel="stylesheet" href="./UI.css" />
        <meta charset="utf-8" />
<!--        <?php print_r($_SESSION); ?>-->
    </head>
    <body>
        <div id="reglagesPatient" class="<?php disable() ?> reglagebox leftcolumn toprow">
            <div>
                <input type="text" id="chargerPatient" list="liste-charger-patient" placeholder="Nom du patient &agrave; charger" <?php disable() ?> />
                <datalist id="liste-charger-patient">
                    <?php
                        //TODO: load list from DB
                    ?>
                </datalist>
                <input type="button" id="boutonChargerPatient" value="Charger patient" <?php disable() ?> />
            </div>
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printInput("text", "id-patient", "ID patient");?>
                <?php printInput("text", "nom-patient", "Nom du patient");?>
                <?php printInput("text", "prenom-patient", "Prénom du patient");?>
                <?php printInput("text", "insee-patient", "Numéro INSEE");?>
                <?php printRadioButton("sexe-patient", "Sexe", array("F"=>"Femme","H"=>"Homme","A"=>"Autre")); ?>
                <?php printInput("number", "age-patient", "Âge"); ?>
                <?php printInput("number", "poids-patient", "Poids"); ?>
                <?php printInput("number", "taille-patient", "Taille"); ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesExamen" class="<?php disable() ?> reglagebox rightcolumn toprow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printDropDownMenu("position-examen","Position de l'examen",array(0=>"Debout",1=>"Allongé")); ?>
                <?php printDropDownMenu("activite-examen","État du muscle / activité demandée",array(0=>"Repos",1=>"Contraction",2=>"Extension")); ?>
                <?php printDropDownMenu("localisation-examen","Localisation de l'examen",array(0=>"Bras",1=>"Mollet",2=>"Ventre")); ?>
                <?php printPreviousButton() ?>
                <?php printNextButton() ?>
            </form>
        </div>
        <?php ++$current_building_page; ?>
        <div id="reglagesMedecins" class="<?php disable() ?> reglagebox leftcolumn bottomrow">
            <form action="./process_page.php?page=<?php echo $current_building_page ?>" method="post">
                <?php printDropDownMenu("operateur","Opérateur",array("Monsieur Stark", "Madame Potts")); ?>
                <?php printDropDownMenu("prescripteur","Prescripteur",array("Monsieur Wayne", "Madame Kyle")); ?>
                <?php printDropDownMenu("realisateur","Réalisateur",array("Monsieur Rogers", "Madame Carter")); ?>
                <?php printPreviousButton() ?>
            </form>
        </div>
        <div id="sauvegarder" class="reglagebox rightcolumn bottomrow">
            <input type="button" value="charger configuration"/>
            <input type="button" value="sauvegarder"/>
        </div>
    </body>
</html>
<?php
exit;

/**
 * @brief writes "disabled" if the current page is the page that is being built
 * it is used to disable the form inputs where necessary
 */
function disable()
{
    if($GLOBALS['page'] != $GLOBALS['current_building_page'])
        echo "disabled";
}

/**
 * @brief prints an <input> tag
 * @param $type the type of the <input> (text, number, mail...)
 * @param $id the ID of the <input> (must be unique in the page)
 * @param $label the label associated with the field (will also be used as placeholder)
 */
function printInput($type,$id,$label)
{
    $label = htmlentities($label);

    echo '<label for="'.$id.'">'.$label.' :</label>'."\n";

    echo '                    <input type="'.$type.'" id="'.$id.'" name="'.$id.'" placeholder="'.strtolower($label).'" ';
    if(isset($_SESSION[$id]))
        echo 'value="'.$_SESSION[$id].'" ';
    disable();
    echo '/>'."\n";

    echo '                <br />'."\n";
}

/**
 * @brief prints a serie of radio buttons
 * @param $id the ID of the radio button serie (must be unique in the page)
 * @param $label the label associated with the buttons
 * @param $buttons an associative array (button value => button name) of the buttons value and label
 */
function printRadioButton($id,$label,$buttons)
{
    $label = htmlentities($label);

    echo '<label>'.$label.' :</label>'."\n";

    foreach($buttons as $value => $buttonLabel)
    {
        $buttonLabel = htmlentities($buttonLabel);
        echo '<input type="radio" name="'.$id.'" id="'.$id.'-'.$value.'" value="'.$value.'" ';
        if($_SESSION[$id] == $value)
            echo "checked ";
        disable();
        echo ' />'."\n";
        echo '<label for="'.$id.'-'.$value.'">'.$buttonLabel.'</label>'."\n";
    }
    echo '<br />';
}

/**
 * @brief prints a drop-down menu
 * @param $id the ID of the menu (must be unique in the page)
 * @param $label the label associated with the menu
 * @param $contents an associative array (value => text) containing the list of elements to be put on the drop-down menu
 */
function printDropDownMenu($id,$label,$contents)
{
    echo '<label for="'.$id.'">'.htmlentities($label).' :</label>'."\n";
    echo '                    <select id="'.$id.'" name="'.$id.'" ';
    disable();
    echo '>'."\n";
    foreach($contents as $value => $text)
    {
        echo '                       <option value="'.$value.'" ';
        if(isset($_SESSION[$id]) && $_SESSION[$id] == $value)
            echo 'selected';
        echo '>'.htmlentities($text).'</option>'."\n";
    }
    echo '                    </select>';
    echo '                    <br />';
}

/**
 * @brief prints a "next" submit button
 */
function printNextButton(){printSubmitButton("next","suivant");}

/**
 * @brief prints a "previous" submit button
 */
function printPreviousButton(){printSubmitButton("previous","précedent");}

/**
 * @brief prints a submit button
 * @param $name the name of the button
 * @param $value the value of the button (will also be used as the text showing on the button)
 */
function printSubmitButton($name, $value)
{
    echo '<input type="submit" name="'.$name.'" value="'.htmlentities($value).'" ';
    disable();
    echo '/>';
}
?>

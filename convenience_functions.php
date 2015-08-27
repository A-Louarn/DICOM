<?php
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
function printPreviousButton(){printSubmitButton("previous","précédent");}

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

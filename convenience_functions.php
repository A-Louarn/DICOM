<?php
/**
 * @brief opens the database and returns a handler to interact with
 * @return a handler to the database
 */
function openDB()
{
    try
    {
        //FUTURE: change this to the production database
        $dbh = new PDO("mysql:host=localhost;dbname=dicom;charset=utf8",'root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $dbh;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

/**
 * @brief loads a list of medics from the database
 * @param $db a database handler
 * @param $tableName the name of the table where are the medics
 * @param $columnName the name of the column where the medics' names are
 */
function loadMedics($db, $tableName, $columnName)
{

    $sql = $db->query('SELECT * FROM '.$tableName.';');

    while($data = $sql->fetch())
        $medics[$data[$columnName]] = $data[$columnName];

    $sql->closeCursor();

    return $medics;
}

function loadOperateurs($db){return loadMedics($db,"Operateur", "operateur_name");}
function loadPrescripteurs($db){return loadMedics($db,"Realisateur", "realisateur_performingPhysicianName");}
function loadRealisateurs($db){return loadMedics($db,"Prescripteur", "prescripteur_referringPhysicianName");}

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
        if(isset($_SESSION[$id]) && $_SESSION[$id] == $value)
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
    echo '                    </select>'."\n";
    echo '                    <br />'."\n";
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

/**
 * @brief prints country drop-down list
 * @param $id the ID of the form (must be unique in the page)
 * @param $label the label associated to the drop-down list
 */
function printCountryDropDownList($id,$label)
{
    $countries = array( "AF"=>"Afghanistan",
                        "AL"=>"Albania",
                        "DZ"=>"Algeria",
                        "AS"=>"American Samoa",
                        "AD"=>"Andorra",
                        "AO"=>"Angola",
                        "AI"=>"Anguilla",
                        "AQ"=>"Antarctica",
                        "AG"=>"Antigua and Barbuda",
                        "AR"=>"Argentina",
                        "AM"=>"Armenia",
                        "AW"=>"Aruba",
                        "AU"=>"Australia",
                        "AT"=>"Austria",
                        "AZ"=>"Azerbaijan",
                        "BS"=>"Bahamas",
                        "BH"=>"Bahrain",
                        "BD"=>"Bangladesh",
                        "BB"=>"Barbados",
                        "BY"=>"Belarus",
                        "BE"=>"Belgium",
                        "BZ"=>"Belize",
                        "BJ"=>"Benin",
                        "BM"=>"Bermuda",
                        "BT"=>"Bhutan",
                        "BO"=>"Bolivia",
                        "BA"=>"Bosnia and Herzegovina",
                        "BW"=>"Botswana",
                        "BV"=>"Bouvet Island",
                        "BR"=>"Brazil",
                        "IO"=>"British Indian Ocean Territory",
                        "BN"=>"Brunei",
                        "BG"=>"Bulgaria",
                        "BF"=>"Burkina Faso",
                        "BI"=>"Burundi",
                        "KH"=>"Cambodia",
                        "CM"=>"Cameroon",
                        "CA"=>"Canada",
                        "CV"=>"Cape Verde",
                        "KY"=>"Cayman Islands",
                        "CF"=>"Central African Republic",
                        "TD"=>"Chad",
                        "CL"=>"Chile",
                        "CN"=>"China",
                        "CX"=>"Christmas Island",
                        "CC"=>"Cocos (Keeling) Islands",
                        "CO"=>"Colombia",
                        "KM"=>"Comoros",
                        "CG"=>"Congo",
                        "CK"=>"Cook Islands",
                        "CR"=>"Costa Rica",
                        "CI"=>"Côte d'Ivoire",
                        "HR"=>"Croatia (Hrvatska)",
                        "CU"=>"Cuba",
                        "CY"=>"Cyprus",
                        "CZ"=>"Czech Republic",
                        "CD"=>"Congo (DRC)",
                        "DK"=>"Denmark",
                        "DJ"=>"Djibouti",
                        "DM"=>"Dominica",
                        "DO"=>"Dominican Republic",
                        "TP"=>"East Timor",
                        "EC"=>"Ecuador",
                        "EG"=>"Egypt",
                        "SV"=>"El Salvador",
                        "GQ"=>"Equatorial Guinea",
                        "ER"=>"Eritrea",
                        "EE"=>"Estonia",
                        "ET"=>"Ethiopia",
                        "FK"=>"Falkland Islands (Islas Malvinas)",
                        "FO"=>"Faroe Islands",
                        "FJ"=>"Fiji Islands",
                        "FI"=>"Finland",
                        "FR"=>"France",
                        "GF"=>"French Guiana",
                        "PF"=>"French Polynesia",
                        "TF"=>"French Southern and Antarctic Lands",
                        "GA"=>"Gabon",
                        "GM"=>"Gambia",
                        "GE"=>"Georgia",
                        "DE"=>"Germany",
                        "GH"=>"Ghana",
                        "GI"=>"Gibraltar",
                        "GR"=>"Greece",
                        "GL"=>"Greenland",
                        "GD"=>"Grenada",
                        "GP"=>"Guadeloupe",
                        "GU"=>"Guam",
                        "GT"=>"Guatemala",
                        "GN"=>"Guinea",
                        "GW"=>"Guinea-Bissau",
                        "GY"=>"Guyana",
                        "HT"=>"Haiti",
                        "HM"=>"Heard Island and McDonald Islands",
                        "HN"=>"Honduras",
                        "HK"=>"Hong Kong SAR",
                        "HU"=>"Hungary",
                        "IS"=>"Iceland",
                        "IN"=>"India",
                        "ID"=>"Indonesia",
                        "IR"=>"Iran",
                        "IQ"=>"Iraq",
                        "IE"=>"Ireland",
                        "IL"=>"Israel",
                        "IT"=>"Italy",
                        "JM"=>"Jamaica",
                        "JP"=>"Japan",
                        "JO"=>"Jordan",
                        "KZ"=>"Kazakhstan",
                        "KE"=>"Kenya",
                        "KI"=>"Kiribati",
                        "KR"=>"Korea",
                        "KW"=>"Kuwait",
                        "KG"=>"Kyrgyzstan",
                        "LA"=>"Laos",
                        "LV"=>"Latvia",
                        "LB"=>"Lebanon",
                        "LS"=>"Lesotho",
                        "LR"=>"Liberia",
                        "LY"=>"Libya",
                        "LI"=>"Liechtenstein",
                        "LT"=>"Lithuania",
                        "LU"=>"Luxembourg",
                        "MO"=>"Macao SAR",
                        "MK"=>"Macedonia, Former Yugoslav Republic of",
                        "MG"=>"Madagascar",
                        "MW"=>"Malawi",
                        "MY"=>"Malaysia",
                        "MV"=>"Maldives",
                        "ML"=>"Mali",
                        "MT"=>"Malta",
                        "MH"=>"Marshall Islands",
                        "MQ"=>"Martinique",
                        "MR"=>"Mauritania",
                        "MU"=>"Mauritius",
                        "YT"=>"Mayotte",
                        "MX"=>"Mexico",
                        "FM"=>"Micronesia",
                        "MD"=>"Moldova",
                        "MC"=>"Monaco",
                        "MN"=>"Mongolia",
                        "MS"=>"Montserrat",
                        "MA"=>"Morocco",
                        "MZ"=>"Mozambique",
                        "MM"=>"Myanmar",
                        "NA"=>"Namibia",
                        "NR"=>"Nauru",
                        "NP"=>"Nepal",
                        "NL"=>"Netherlands",
                        "AN"=>"Netherlands Antilles",
                        "NC"=>"New Caledonia",
                        "NZ"=>"New Zealand",
                        "NI"=>"Nicaragua",
                        "NE"=>"Niger",
                        "NG"=>"Nigeria",
                        "NU"=>"Niue",
                        "NF"=>"Norfolk Island",
                        "KP"=>"North Korea",
                        "MP"=>"Northern Mariana Islands",
                        "NO"=>"Norway",
                        "OM"=>"Oman",
                        "PK"=>"Pakistan",
                        "PW"=>"Palau",
                        "PA"=>"Panama",
                        "PG"=>"Papua New Guinea",
                        "PY"=>"Paraguay",
                        "PE"=>"Peru",
                        "PH"=>"Philippines",
                        "PN"=>"Pitcairn Islands",
                        "PL"=>"Poland",
                        "PT"=>"Portugal",
                        "PR"=>"Puerto Rico",
                        "QA"=>"Qatar",
                        "RE"=>"Reunion",
                        "RO"=>"Romania",
                        "RU"=>"Russia",
                        "RW"=>"Rwanda",
                        "WS"=>"Samoa",
                        "SM"=>"San Marino",
                        "ST"=>"São Tomé and Príncipe",
                        "SA"=>"Saudi Arabia",
                        "SN"=>"Senegal",
                        "YU"=>"Serbia and Montenegro",
                        "SC"=>"Seychelles",
                        "SL"=>"Sierra Leone",
                        "SG"=>"Singapore",
                        "SK"=>"Slovakia",
                        "SI"=>"Slovenia",
                        "SB"=>"Solomon Islands",
                        "SO"=>"Somalia",
                        "ZA"=>"South Africa",
                        "GS"=>"South Georgia and the South Sandwich Islands",
                        "ES"=>"Spain",
                        "LK"=>"Sri Lanka",
                        "SH"=>"St. Helena",
                        "KN"=>"St. Kitts and Nevis",
                        "LC"=>"St. Lucia",
                        "PM"=>"St. Pierre and Miquelon",
                        "VC"=>"St. Vincent and the Grenadines",
                        "SD"=>"Sudan",
                        "SR"=>"Suriname",
                        "SJ"=>"Svalbard and Jan Mayen",
                        "SZ"=>"Swaziland",
                        "SE"=>"Sweden",
                        "CH"=>"Switzerland",
                        "SY"=>"Syria",
                        "TW"=>"Taiwan",
                        "TJ"=>"Tajikistan",
                        "TZ"=>"Tanzania",
                        "TH"=>"Thailand",
                        "TG"=>"Togo",
                        "TK"=>"Tokelau",
                        "TO"=>"Tonga",
                        "TT"=>"Trinidad and Tobago",
                        "TN"=>"Tunisia",
                        "TR"=>"Turkey",
                        "TM"=>"Turkmenistan",
                        "TC"=>"Turks and Caicos Islands",
                        "TV"=>"Tuvalu",
                        "UG"=>"Uganda",
                        "UA"=>"Ukraine",
                        "AE"=>"United Arab Emirates",
                        "UK"=>"United Kingdom",
                        "US"=>"United States",
                        "UY"=>"Uruguay",
                        "UZ"=>"Uzbekistan",
                        "VU"=>"Vanuatu",
                        "VA"=>"Vatican City",
                        "VE"=>"Venezuela",
                        "VN"=>"Viet Nam",
                        "VG"=>"Virgin Islands (British)",
                        "VI"=>"Virgin Islands",
                        "WF"=>"Wallis and Futuna",
                        "YE"=>"Yemen",
                        "ZM"=>"Zambia",
                        "ZW"=>"Zimbabwe");
    echo '<label for="'.$id.'">'.htmlentities($label).' :</label>'."\n";
    echo '<select id="'.$id.'" name="'.$id.'" ';
    disable();
    echo '>'."\n";
    foreach($countries as $countryid => $name)
    {
        echo '<option value="'.$countryid.'" ';
        if((isset($_SESSION[$id]))? ($_SESSION[$id] == $countryid) : (strtolower($countryid) == "fr"))
            echo 'selected';
        echo '>'.$name.'</option>'."\n";
    }
    echo '</select>'."\n";
    echo '<br />'."\n";
}
?>

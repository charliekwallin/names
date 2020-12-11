<?php

/**
 * Function that accepts a text file, then loops through the
 * file and creates an array
 *
 * @param   String  $fileName  Text file
 *
 * @return  Array             An array of names
 */
function load_array($fileName) {

    $lineNumber = 0;
    $fullName = [];

    $FH = fopen("$fileName", "r");
    $nextName = fgets($FH);

    while(!feof($FH)) {
        if($lineNumber % 2 == 0) {
            $fullNames[] = substr($nextName, 0, strpos($nextName, " --"));
        }
    
    $lineNumber++;
    $nextName = fgets($FH);
    }

    return $fullNames;
}

/**
 * Function that receives names from an array. It returns only
 * names that are considered valid, for instance, no non-alpha characters
 *
 * @param   Array  $fullNames  List of names that may contain non-alpha characters
 *
 * @return  Array              An array of names that contain only alpha-characters
 */
function get_valid_names($fullNames) {

    for($i = 0; $i < sizeof($fullNames); $i++) {
        if(preg_match("/^([A-Z][a-zA-Z']+), ([A-Z][a-zA-Z']+)/", $fullNames[$i] )) {
        $validNames[] = $fullNames[$i];
        }
    }
    return $validNames;
}    

// ~.~.~.~.~.~.~.~.~.~. Display Functions  ~.~.~.~.~.~.~.~.~.~.  //

/**
 * Function that displays a list of valid names
 *
 * @param   Array  $validNames  An array of names that contains only alpha characters
 *
 * @return  Nothing               
 */
function display_valid_names($validNames) {
    echo "<p>There are " . sizeof($validNames) . " valid names</p>";
    loop_array($validNames);
}

/**
 * Function that displays a list of names that are valid and unique
 *
 * @param   Array  $validNames  Array of names that contains only alpha characters
 *
 * @return  Nothing               
 */
function display_unique_names($validNames) {
    $uniqueValidNames = (array_unique($validNames));
    echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
    loop_array($uniqueValidNames); 
} 

/**
 * Function that loops through an array and displays its reult
 * in an unordered list
 *
 * @param   Array  $ary  Any array of string, numeric, or date data types
 *
 * @return  Nothing        
 */
function loop_array($ary) {        
    echo '<ul style="list-style-type:none">';    
    foreach($ary as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
}





<?php

include_once('functions/name-functions.php');

$fullNames = load_array('names-short-list.txt');
$validNames = get_valid_names($fullNames);

?>

<h1>Names - Results</h1>

<?php 

echo '<h2>All Names</h2>';
display_valid_names($validNames);
echo "<hr>";

echo '<h2>Unique Names</h2>';
display_unique_names($validNames);

?>









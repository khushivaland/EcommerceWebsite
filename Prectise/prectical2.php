<?php
$text = "aabbbbcc";


//echo "max used character: i and number of times: 12";


$characterCount = array_count_values(str_split($text));


$Count = max($characterCount);
$Character = array_search($Count, $characterCount);

echo "<strong>Most Frequent Character: </strong>" . $Character ;
echo "<br>";
echo "<strong>Count: </strong>" . $Count ;


$array1 = ["India", "China", "Srilanka"];
$array2 = ["UK", "USA", "UAE"];


?>
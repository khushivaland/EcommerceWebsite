<?php
$a = "Pratikkumar Arvindbhai Parekh";

$parts = explode(" ", $a);
$firstName = $parts[0];
$middleName = $parts[1];
$surname =$parts[2];

$name = "NAME: ";
$fname = "FATHER NAME: ";
$lname = "SURNAME: ";

echo "<strong>$name</strong>$firstName<br>"; 
echo  "<strong>$fname</strong>$middleName<br>";
echo "<strong>$lname</strong>$surname<br>"; 
echo "<br>";
echo "<br>";

// ----------------------------------------
$total = [30,44,99,67,54,87,45,12,26];

//echo "Ascending: ";
//echo "Descending: ";

sort($total);
echo "Ascending Order: " . implode(", ", $total) ;
echo "<br>";


rsort($total);
echo "Descending Order: " . implode(", ", $total);
echo "<br>";
echo "<br>";


//echo "Max number";
//echo "Min number";

$max = max($total);
echo "Maximum Number: " . $max ;
echo "<br>";
$min = min($total);
echo "Minimum Number: " . $min ;


?>
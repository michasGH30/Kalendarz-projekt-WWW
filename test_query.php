<?php
// echo $_REQUEST["numberR"] . " " . $_REQUEST["dateR"] . " " . $_REQUEST["dataR"] . " " . $_REQUEST["checked"];
var_dump($_REQUEST);
// for ($i = 0; $i < count($_REQUEST["dataR"]); $i++) {
//     if ($_REQUEST["checked"][$i] == true) {
//         echo $_REQUEST["dataR"][$i] . " jest zaznaczony<br>";
//     } else {
//         echo $_REQUEST["dataR"][$i] . " nie jest zaznaczony<br>";
//     }
// }
$arr = array_values(json_decode($_REQUEST["dataR"], true));
$arr2 = array_values(json_decode($_REQUEST["checked"], true));
print_r($arr);
print_r($arr2);

if ($arr2[0] == null) {
    echo "jest";
}

<?php
include("session.php");
require("db.php");
$ID_USER = $_REQUEST["ID_USER"];
$ID = $_SESSION["ID"];

$sql = "INSERT INTO friends_request VALUES (NULL, $ID_USER, $ID)";
if ($conn->query($sql) !== TRUE) {
    echo "Nie udało się dodać znajomego do ciebie, po usunięciu zaproszenia. Dane: $ID_USER";
    echo $conn->errno;
}
echo "success";

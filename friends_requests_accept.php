<?php
include("session.php");
require("db.php");
$ID_USER = $_REQUEST["ID_USER"];
$ACTION = $_REQUEST["ACTION"];
$ID = $_SESSION["ID"];

$sql = "DELETE FROM friends_request WHERE ID_user = $ID AND ID_friend = $ID_USER";
if ($conn->query($sql) !== TRUE) {
    echo "Nie udało się usunąć zaproszenia. Dane: $ID_USER, $ACTION";
}
$sql = "INSERT INTO friends VALUES (NULL, $ID, $ID_USER)";
if ($conn->query($sql) !== TRUE) {
    echo "Nie udało się dodać znajomego do ciebie, po usunięciu zaproszenia. Dane: $ID_USER, $ACTION";
    echo $conn->errno;
}
$sql = "INSERT INTO friends VALUES (NULL, $ID_USER, $ID)";
if ($conn->query($sql) !== TRUE) {
    echo "Nie udało się dodać znajomego do znajomego, po usunięciu zaproszenia. Dane: $ID_USER, $ACTION";
    echo $conn->errno;
}
echo "success";

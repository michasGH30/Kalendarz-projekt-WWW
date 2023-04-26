<?php
include("session.php");
require("db.php");
$ID_USER = $_REQUEST["ID_USER"];
$ACTION = $_REQUEST["ACTION"];
$ID = $_SESSION["ID"];

$success = TRUE;

$sql = "DELETE FROM friends_requests WHERE ID_user = $ID AND ID_friend = $ID_USER";
if ($conn->query($sql) !== TRUE) {
    $success = FALSE;
}
if ($ACTION == "accept") {
    $sql = "INSERT INTO friends (ID, ID_user, ID_friend) VALUES (NULL, $ID, $ID_USER)";
    if ($conn->query($sql) !== TRUE) {
        $success = FALSE;
    }
}


if (!$success) {
    echo "Nie udało się wykonać zapytań";
} else {
    echo "success";
}

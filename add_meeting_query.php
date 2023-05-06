<?php
include("session.php");
include("db.php");
$title = $_REQUEST["numberR"];
$date = $_REQUEST["dateR"];
$ID = $_SESSION["ID"];
$arr = array_values(json_decode($_REQUEST["dataR"], true));
$arr2 = array_values(json_decode($_REQUEST["checked"], true));

$sql = "INSERT INTO meetings(ID, title, date) VALUES(NULL, '$title', '$date')";
if ($conn->query($sql) === NULL) {
    echo "Nie udało się dodać spotkania. $conn->error\n";
} else {
    $last = $conn->insert_id;
    $sql = "INSERT INTO meetings_members(ID, ID_meeting, ID_user) VALUES(NULL, $last, $ID)";
    if ($conn->query($sql) === NULL) {
        echo "Nie udało się dodać cię jako uczestnika spotkania. $conn->error\n";
    } else {
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr2[$i] != null) {
                $ID_m = $arr[$i];
                $sql = "INSERT INTO meetings_members(ID, ID_meeting, ID_user) VALUES (NULL, $last, $ID_m)";
                if ($conn->query($sql) === NULL) {
                    echo "Nie udało się dodać członka o ID: $ID_m. $conn->error\n";
                }
            }
        }
    }
}

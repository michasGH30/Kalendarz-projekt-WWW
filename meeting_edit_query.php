<?php
// include("session.php");
include("db.php");
$mID = $_REQUEST["IDSend"];
$title = $_REQUEST["numberR"];
$date = $_REQUEST["dateR"];
// $ID = $_SESSION["ID"];
$arr = array_values(json_decode($_REQUEST["dataR"], true));
$arr2 = array_values(json_decode($_REQUEST["checked"], true));

// $sql = "UPDATE meetings(ID, title, date) VALUES(NULL, '$title', '$date')";
$sql = "UPDATE meetings SET title = '$title', date = '$date' WHERE meetings.ID = $mID";
if ($conn->query($sql) === NULL) {
    echo "Nie udało się edytować spotkania. $conn->error\n";
} else {
    for ($i = 0; $i < count($arr); $i++) {
        $ID_m = $arr[$i];
        if ($arr2[$i] != null) {
            $sql = "INSERT INTO meetings_members(ID, ID_meeting, ID_user) VALUES (NULL, $mID, $ID_m)";
            if ($conn->query($sql) === NULL) {
                echo "Nie udało się dodać członka o ID: $ID_m. $conn->error\n";
            }
        } else {
            $sql = "DELETE FROM meetings_members WHERE ID_meeting = $mID AND ID_user = $ID_m";
            if ($conn->query($sql) === NULL) {
                echo "Nie udało się usunąć członka o ID: $ID_m. $conn->error\n";
            }
        }
    }
}

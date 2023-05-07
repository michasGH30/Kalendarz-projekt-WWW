<?php
include("session.php");
include("db.php");
$IDm = $_REQUEST["IDm"];
$ID = $_SESSION["ID"];
$arr = array_values(json_decode($_REQUEST["usersID"], true));

$sql = "DELETE FROM meetings WHERE ID = $IDm";
if ($conn->query($sql) === NULL) {
    echo "Nie udało się usunąć spotkania. $conn->error\n";
} else {
    $sql = "DELETE FROM meetings_members WHERE meetings_members.ID_meeting = $IDm AND meetings_members.ID_user = $ID";
    if ($conn->query($sql) === NULL) {
        echo "Nie udało się usunąć cię jako uczestnika spotkania. $conn->error\n";
    } else {
        for ($i = 0; $i < count($arr); $i++) {
            $ID_m = $arr[$i];
            $sql = "DELETE FROM meetings_members WHERE meetings_members.ID_meeting = $IDm AND meetings_members.ID_user = $ID_m";
            if ($conn->query($sql) === NULL) {
                echo "Nie udało się usunąć członka o ID: $ID_m. $conn->error\n";
            }
        }
    }
}

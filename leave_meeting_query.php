<?php
include("session.php");
include("db.php");
$ID = $_SESSION["ID"];
$mID = $_REQUEST["IDmeeting"];
$sql = "DELETE FROM meetings_members WHERE ID_meeting = $mID AND ID_user = $ID";
if ($conn->query($sql) === NULL) {
    echo "Nie udało się opuścić spotkania. $conn->error\n";
}

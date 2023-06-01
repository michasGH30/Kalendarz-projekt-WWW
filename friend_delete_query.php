<?php
include("session.php");
require("db.php");
$ID_USER = $_REQUEST["ID_USER"];
$ID = $_SESSION["ID"];
$sql = "DELETE FROM friends WHERE ID_friend = $ID_USER AND ID_user = $ID";
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "DELETE FROM friends WHERE ID_friend = $ID AND ID_user = $ID_USER";
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "success";

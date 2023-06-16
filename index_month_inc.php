<?php
include("session.php");
if ($_SESSION["mm"] + 1 > 12) {
    $_SESSION["mm"] = 1;
    $_SESSION["yy"] =  $_SESSION["yy"] + 1;
} else {
    $_SESSION["mm"] = $_SESSION["mm"] + 1;
}

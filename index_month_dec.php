<?php
include("session.php");
if ($_SESSION["mm"] - 1 < 1) {
    $_SESSION["mm"] = 12;
    $_SESSION["yy"] = $_SESSION["yy"] - 1;
} else {
    $_SESSION["mm"] = $_SESSION["mm"] - 1;
}

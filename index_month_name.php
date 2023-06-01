<?php
include("session.php");
include("db.php");
$months = array("Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień");
// $sql = 'SET @@lc_time_names = "pl_PL"';
// $conn->query($sql);
// $yy = $_SESSION["yy"];
$mm = $_SESSION["mm"];
$month_name = $months[$mm - 1];
// $date = $yy . "-" . $mm . "-1";
// $sql = "SELECT MONTHNAME('$date') as month_name FROM meetings";
// $result = $conn->query($sql);
// $row = $result->fetch_object();

// ucfirst Zamiana Pierwszej Litery Na Dużą
// https://stackoverflow.com/a/29166736
// $month_name = ucfirst($row->month_name);
echo $month_name;

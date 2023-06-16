<?php
include("session.php");
include("db.php");
if (!isset($_SESSION["mm"]) || !isset($_SESSION["yy"])) {
    $currentDate = getdate();
    $_SESSION["mm"] = $currentDate["mon"];
    $_SESSION["yy"] = $currentDate["year"];
}
$currentDate = getdate();
$day_names = [1 => "Poniedziałek", 2 => "Wtorek", 3 => "Środa", 4 => "Czwartek", 5 => "Piątek", 6 => "Sobota", 0 => "Niedziela"];
$day_names_query = [0 => "Poniedziałek", 1 => "Wtorek", 2 => "Środa", 3 => "Czwartek", 4 => "Piątek", 5 => "Sobota", 6 => "Niedziela"];
$ID = $_SESSION["ID"];
$mm = $_SESSION["mm"];
$yy = $_SESSION["yy"];
$day_count = cal_days_in_month(CAL_GREGORIAN, $mm, $yy);
// $sql = 'SET @@lc_time_names = "pl_PL"';
// $conn->query($sql);
for ($i = 1; $i <= $day_count; $i++) {
    $sql = "SELECT meetings.ID, meetings.title, meetings.date, WEEKDAY(meetings.date) AS day_name FROM meetings, meetings_members WHERE meetings_members.ID_user = $ID AND meetings_members.ID_meeting = meetings.ID AND DAY(meetings.date) = $i AND MONTH(meetings.date) = $mm ORDER BY meetings.ID";
    $day_to_add;
    $month_to_add;
    $year_to_add;

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();

        $day_to_add = explode("-", $row->date)[2];
        $month_to_add = explode("-", $row->date)[1];
        $year_to_add = explode("-", $row->date)[0];
        echo "<div class='day";
        if ($currentDate["mday"] == explode("-", $row->date)[2] && $currentDate["mon"] == explode("-", $row->date)[1] && $currentDate["year"] == explode("-", $row->date)[0]) {
            echo " currentDate";
        }
        echo "'>";
        if ($row->day_name == 5 || $row->day_name == 6) {
            echo "<div class='day_name_weekend";
        } else {
            echo "<div class='day_name";
        }
        echo "'>";
        echo $day_names_query[$row->day_name] . "<br>" . $row->date . "</div>";
        echo "<div class='meetings'>";
        echo "<a class='meeting_details' href='meeting.php?mID=$row->ID'><div class='meeting'>" . $row->title . "</div></a>";
        for ($j = 1; $j < $result->num_rows; $j++) {
            $row = $result->fetch_object();
            echo "<a class='meeting_details' href='meeting.php?mID=$row->ID'><div class='meeting'>" . $row->title . "</div></a>";
        }
        echo "</div>";
    } else {
        $d = date_create($yy . "-" . $mm . "-" . $i);
        echo "<div class='day";
        if ($currentDate["mday"] == $i && $currentDate["mon"] == $mm && $currentDate["year"] == $yy) {
            echo " currentDate";
        }
        echo "'>";
        if (date_format($d, "w") == 6 || date_format($d, "w") == 0) {
            echo "<div class='day_name_weekend'>";
        } else {
            echo "<div class='day_name'>";
        }
        echo $day_names[date_format($d, "w")] . "<br>" . date_format($d, "Y-m-d") . "</div>";
        $day_to_add = date_format($d, 'd');
        $month_to_add = date_format($d, 'm');
        $year_to_add = date_format($d, 'Y');
    }
    echo "<form action='add_meeting.php' method='post'><button class='add_meeting_button'>Dodaj spotkanie</button><input type='hidden' value='$day_to_add' name='day'><input type='hidden' value='$month_to_add' name='month'><input type='hidden' value='$year_to_add' name='year'></form></div>";
}
